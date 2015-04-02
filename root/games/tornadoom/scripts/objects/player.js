/**
 * Created by Devin on 2015-01-16.
 */

function Player() {

    // Player characteristics -------------------------------------------------

    var windspeed = 10.0;
    var massDensity = 4.82;    // 1.205; Normal for air?

    var contactScale = 2.5;
    var drawScale = 1.05;
    var maxForceMagSqr = 750.0 * 750.0;
    this.captureRadius = 0.75;

    //var springConstant = 3.0;
    //var restLength = contactScale / 4.0;

    var LAUNCH_SCALAR_MIN = 400;
    var LAUNCH_SCALAR_MAX = 650;
    var launchScalarDiffMaxInv = 1.0 / (LAUNCH_SCALAR_MAX - LAUNCH_SCALAR_MIN);
    var launchScalar = LAUNCH_SCALAR_MIN;

    var massMax = 200;
    var massHeld = 0.0;

    var ammoCont = [];
    var ammoIdx = 0;
    var ammoTypeCount = 0;
    var AmmoSelectionCallback = function(){},
        AmmoCountChangeCallback = function(){},
        PowerChangeCallback = function(){};

    // The X and Y are just the mouses screen coords, assuming (0,0) at the centre
    // The Z and scalar are values used to try to control how steep the new direction becomes
    var mouseAimX = 0;
    var mouseAimY = 0;
    var mouseAimZ = -50;
    var mouseAimScalar = 0.1;
    var crosshairLength = 5.0;

    var that = this;

    // Basic player obj visual -------------------------------------------------

    this.obj = new GameObject('Player', Labels.player);
    var modelObj = new GameObject("Player model", Labels.none);
    modelObj.SetModel(GameMngr.assets.models['playerTornado']);
    modelObj.mdlHdlr.SetTexture(GameMngr.assets.textures['funnelTex'], TextureFilters.linear);

    this.obj.AddChild(modelObj);

    // Just to help in a few functions below
    var playerPos = this.obj.trfmGlobal.pos;
    this.height = modelObj.shapeData.radii.y * modelObj.trfmBase.scale.y * 2;

    this.obj.AddComponent(Components.rigidBody);
    this.obj.rigidBody.SetMass(100.0);
    this.obj.rigidBody.dampening = 0.2;

    // Tornado collisions -------------------------------------------------

    this.obj.AddComponent(Components.collisionSystem);
    this.obj.collider.ResizeBoundingShapes(modelObj.shapeData);
    this.obj.collider.ScaleSphere(contactScale);

    // Set capsule collider around funnel
    var funnelCapsuleCollider = new CollisionCapsule(modelObj);
    this.obj.collider.AddCollisionShape(BoundingShapes.capsule, funnelCapsuleCollider);

    // Add particle effects -------------------------------------------------

    this.obj.AddComponent(Components.particleSystem);

    var effects = new PtclSpiralEffects();
    effects.travelTime = 2.5;
    effects.startDist = 1.0;
    effects.dir = new Vector3(0.0, -1.0, 0.0);
    effects.range = 15.0;
    effects.scaleAngle = 5.0;
    effects.scaleDiam = 0.5;
    effects.scaleLen = 0.2;
    effects.colourBtm = new Vector3(0.5, 0.5, 0.5);
    effects.colourTop = new Vector3(0.5, 0.8, 0.8);
    effects.lineLength = 0.0;
    effects.size = 40.0;
    effects.texture = GameMngr.assets.textures['dustPtcl'];
    effects.alphaStart = 0.5;
    effects.fadePoint = 0.75;
    effects.alphaEnd = 0.0;

    // Inner dust effect
    var dustVisual1 = new ParticleFieldAutomated(40, true, null, effects);
    this.obj.ptclSys.AddAutoField(dustVisual1);
    dustVisual1.Run();

    // Outer dust effect
    effects.travelTime = 3.0;
    effects.scaleAngle = 2.5;
    effects.scaleDiam = 0.85;
    effects.scaleLen = 0.1;
    effects.size = 20.0;
    var dustVisual2 = new ParticleFieldAutomated(30, true, null, effects);
    this.obj.ptclSys.AddAutoField(dustVisual2);
    dustVisual2.Run();

    effects = new PtclPhysicsEffects();
    effects.travelTime = 0.5;
    effects.startDist = 0.5;
    effects.dir.SetValues(0.0, 1.0, 0.0);
    effects.range = 360.0;
    effects.speed = 1.5;
    effects.acc.SetValues(0.0, 0.0, 0.0);
    effects.dampening = 0.25;
    effects.colourBtm.SetValues(0.0, 0.5, 0.25);
    effects.colourTop.SetValues(0.0, 1.0, 1.0);
    effects.lineLength = 0.0;
    effects.alphaStart = 1.0;
    effects.fadePoint = 0.5;
    effects.alphaEnd = 0.0;
    effects.size = 5.0;
    var collectionVisual = new ParticleFieldAutomated(50, false, 0.25, effects);
    this.obj.ptclSys.AddAutoField(collectionVisual);

    effects = new PtclSimpleEffects();
    effects.colourBtm.SetValues(0.0, 0.0, 0.0);
    effects.colourTop.SetValues(0.0, 0.0, 0.0);
    effects.lineLength = 0.0;
    effects.size = 30.0;
    effects.texture = GameMngr.assets.textures['crosshair'];
    effects.alphaStart = 1.0;
    var aimDirVisual = new ParticleFieldControlled(10, effects);
    this.obj.ptclSys.AddCtrlField(aimDirVisual);


    // Add controls -------------------------------------------------

    this.obj.AddComponent(Components.camera);
    this.obj.camera.trfmAxes.SetPosAxes(0.0, 4.0, 8.0);
    this.obj.camera.trfmAxes.RotateLocalViewX(-15);
    ViewMngr.SetActiveCamera(this.obj.camera);

    var ctrl = new TopDownController(this.obj, "Top-down player controls");
    ctrl.SetActive(true);
    var controlActive = true;

    var playerCtrlName = "PlayerCtrl";
    Input.RegisterControlScheme(playerCtrlName, true, InputTypes.keyboard);

    var btnShoot = Input.CreateInputController(playerCtrlName, KeyMap.Shift);
    var btnAmmoScrollLeft = Input.CreateInputController(playerCtrlName, KeyMap.BracketOpen);
    var btnAmmoScrollRight = Input.CreateInputController(playerCtrlName, KeyMap.BracketClose);

    // Mouse controls
    var playerMouseCtrlName = "PlayerMouse";
    Input.RegisterControlScheme(playerMouseCtrlName, true, InputTypes.mouse);
    var playerMouse = Input.CreateInputController(playerMouseCtrlName);
    playerMouse.SetCursor(CursorTypes.none);

    // Allow player to hold Ctrl (spacebar drop to bottom of html page) to go into a view where they use the mouse
    // to aim within a given window around the direction they are facing.
    var aimToggle = Input.CreateInputController(playerCtrlName, KeyMap.Ctrl);
    function AimTogglePressed() {
        that.obj.camera.trfmAxes.SetPosAxes(1.0, -0.25, 2.25);
        that.obj.camera.trfmAxes.RotateLocalViewX(25);
        playerMouse.SetLeftBtnCalls(null, ChargeShotReleased);
        aimDirVisual.Run();
    }
    function AimToggleReleased() {
        that.obj.camera.trfmAxes.SetPosAxes(0.0, 4.0, 8.0);
        that.obj.camera.trfmAxes.RotateLocalViewX(-25);
        playerMouse.SetLeftBtnCalls(null, function(){});
        aimDirVisual.Stop();
        DropLaunchPower();
    }
    aimToggle.SetBtnCalls(AimTogglePressed, AimToggleReleased);

    // When in this mode, the left mouse button can also be held to charge up the shot.
    // Shoot when released
    var aimDir = new Vector3();
    function ChargeShotReleased() {
        Shoot(aimDir);
    }

    // HELPER FUNCTIONS -------------------------------------------------

    var PrepAmmo = function(gameObj, isVisible) {
        if(gameObj.mdlHdlr)
            gameObj.mdlHdlr.active = isVisible;
        for (var i in gameObj.components)
            gameObj.components[i].SetActive(isVisible);
    };
    // Pop captured object from it's list and shoot forward from right on Tornado
    var RaiseLaunchPower = function() {
        launchScalar += 2.0;
        if(launchScalar > LAUNCH_SCALAR_MAX)
            launchScalar = LAUNCH_SCALAR_MAX;

        PowerChangeCallback((launchScalar - LAUNCH_SCALAR_MIN) * launchScalarDiffMaxInv);
    };
    var DropLaunchPower = function() {
        launchScalar = LAUNCH_SCALAR_MIN;
        PowerChangeCallback((launchScalar - LAUNCH_SCALAR_MIN) * launchScalarDiffMaxInv);
    };
    var Shoot = function(dir) {
        var gameObj = ammoCont[ammoIdx].pop();
        if(gameObj) {
            gameObj.trfmBase.SetPosByVec(playerPos.GetAdd(dir.SetScaleByNum(contactScale + 2.0)));
            AmmoCountChangeCallback(ammoIdx, ammoCont[ammoIdx].length);
            PrepAmmo(gameObj, true);
            gameObj.rigidBody.AddForce(dir.GetScaleByNum(windspeed * launchScalar));
        }
        DropLaunchPower();
    };

    // PLAYER METHODS -------------------------------------------------
    var angle = 0.0;

    this.AddAmmoContainer = function(index) {
        ammoCont[index] = [];
        ammoTypeCount++;
    };
    this.RemoveAmmoContainer = function(index) {
        ammoCont[index] = null;
        ammoTypeCount--;
    };
    this.GetAmmoIdx = function(ammoTypeIdx, gameObj) {
        return ammoCont[ammoTypeIdx].indexOf(gameObj);
    };
    this.GetAmmoCount = function(ammoTypeIdx) {
        return ammoCont[ammoTypeIdx].length;
    };
    this.SetAmmoSelectionCallback = function(Callback) {
        AmmoSelectionCallback = Callback;
        AmmoSelectionCallback(ammoIdx);
    };
    this.SetAmmoCountChangeCallback = function(Callback) {
        AmmoCountChangeCallback = Callback;
    };
    this.SetPowerChangeCallback = function(Callback) {
        PowerChangeCallback = Callback;
    };
    this.GetAimToggleHeld = function() {
        if(controlActive)
            return aimToggle.pressed;

        return false;
    };
    this.Capture = function(index, gameObj) {
        // Small particle visual
        collectionVisual.Run();
        // Determine object captured
        ammoCont[index].push(gameObj);
        AmmoCountChangeCallback(index, ammoCont[index].length);
        PrepAmmo(gameObj, false);
    };
    this.ReleaseAmmoAbove = function(ammoContIdx, ammoIdx) {
        var gameObj = (ammoCont[ammoContIdx].splice(ammoIdx, 1)).pop();
        if(gameObj) {
            gameObj.trfmBase.SetPosByVec(playerPos.GetAdd(VEC3_UP.GetScaleByNum(this.height / 2.0)));
            AmmoCountChangeCallback(ammoContIdx, ammoCont[ammoContIdx].length);
            PrepAmmo(gameObj, true);
        }
    };
    this.ClearAmmo = function() {
        for(var i = 0; i < ammoCont.length; i++)
            ammoCont[i].splice(0, ammoCont[i].length);
    };
    this.SetControlActive = function(isActive) {
        controlActive = isActive;
        ctrl.SetActive(isActive);
        Input.SetActive(playerMouseCtrlName, isActive);
    };
    this.Twister = function(rigidBody, objToEyeVec, objToEyeDistSqr) {
        // Have objs keep relative velocity with tornado.
        //rigidBody.AddForce(this.obj.rigidBody.GetForceFromVelocity().SetScaleByNum(0.5));
        rigidBody.ApplyTornadoMotion(objToEyeVec, objToEyeDistSqr, windspeed, massDensity, drawScale, maxForceMagSqr);
        //rigidBody.ApplySpring(playerPos, springConstant, restLength);
        // Perfect lift right away, slowing once obj's gravity is re-applied.
        rigidBody.ApplyGravity(VEC3_GRAVITY.GetNegative());
    };
    this.ResetMotion = function() {
        this.obj.trfmBase.SetDefault();
        GameUtils.RaiseToGroundLevel(this.obj);
        this.obj.rigidBody.Reset();
        ctrl.Reset();
    };
    this.ResetAll = function() {
        ammoCont = [];
        ammoIdx = 0;
        ammoTypeCount = 0;
        AmmoSelectionCallback(ammoIdx);
        this.ResetMotion();
    };
    this.Update = function() {
        angle++;
        if(angle > 360.0)
            angle = 0.0;

        modelObj.trfmBase.SetUpdatedRot(VEC3_UP, angle * 7.5);
        this.obj.trfmBase.SetPosY(this.height * 0.5);

        if(controlActive) {
            ctrl.Update();

            // Shooting mechanics
            if (btnShoot.pressed) {
                Shoot(this.obj.trfmBase.GetFwd());
                btnShoot.Release();
            }
            // Trade-off here, more difficult control, but power can be built
            if (aimToggle.pressed) {
                mouseAimX = playerMouse.pos.x - ViewMngr.wndWidth / 2.0;
                mouseAimY = (playerMouse.pos.y - ViewMngr.wndHeight / 2.0) * -1;

                aimDir.SetValues(mouseAimX * mouseAimScalar, mouseAimY * mouseAimScalar, mouseAimZ);
                aimDir.SetNormalized();
                // Send these positions, as obj's model matrix is used to achieve pos and rot
                aimDirVisual.ApplyEvenLine(aimDir.GetScaleByNum(crosshairLength), VEC3_ZERO);
                // Finish aim adjustment for local force application
                aimDir = that.obj.trfmGlobal.rot.GetMultiplyVec3(aimDir);

                if (playerMouse.leftPressed)
                    RaiseLaunchPower();
            }
            // Change ammo type
            if (btnAmmoScrollLeft.pressed) {
                ammoIdx = (ammoIdx > 0) ? ammoIdx - 1 : ammoTypeCount - 1;
                AmmoSelectionCallback(ammoIdx);
                btnAmmoScrollLeft.Release();
            }
            if (btnAmmoScrollRight.pressed) {
                ammoIdx = (ammoIdx + 1) % ammoTypeCount;
                AmmoSelectionCallback(ammoIdx);
                btnAmmoScrollRight.Release();
            }
        }

        // Keep all ammo positioned on player
        for (var i = 0; i < ammoCont.length; i++) {
            for (var j = 0; j < ammoCont[i].length; j++) {
                ammoCont[i][j].trfmBase.SetPosByAxes(playerPos.x, playerPos.y, playerPos.z);
            }
        }

    }
}
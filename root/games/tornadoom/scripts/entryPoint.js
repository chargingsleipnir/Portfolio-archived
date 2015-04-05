/**
 * Created by Devin on 2015-04-02.
 */

/* Entry point for engine user.
 * This function must be called by
 * the body's onload function within
 * EL.PreLoad(). */
function Initialize(Callback) {

    var textureNamesFilepaths = [
        ['title', 'games/tornadoom/assets/images/title.png'],
        ['endWin', 'games/tornadoom/assets/images/barn6Sized.png'],
        ['endLose', 'games/tornadoom/assets/images/ufo5Sized.png'],
        ['skyTexXPos', 'games/tornadoom/assets/images/skyTexXPosInv.png'],
        ['skyTexXNeg', 'games/tornadoom/assets/images/skyTexXNegInv.png'],
        ['skyTexYPos', 'games/tornadoom/assets/images/skyTexYPos.png'],
        ['skyTexYNeg', 'games/tornadoom/assets/images/skyTexYNeg.png'],
        ['skyTexZPos', 'games/tornadoom/assets/images/skyTexZPosInv.png'],
        ['skyTexZNeg', 'games/tornadoom/assets/images/skyTexZNegInv.png'],
        ['funnelTex', 'games/tornadoom/assets/images/tornadoFunnel.jpg'],
        ['dustPtcl', 'games/tornadoom/assets/images/smokeParticle2.png'],
        ['starPtcl', 'games/tornadoom/assets/images/star.png'],
        ['cowTex', 'games/tornadoom/assets/images/cowTexture.jpg'],
        ['hayBaleTex', 'games/tornadoom/assets/images/hayBaleTex.png'],
        ['fenceTex', 'games/tornadoom/assets/images/wood.png'],
        ['wagonTex', 'games/tornadoom/assets/images/woodVaried.png'],
        ['barnTex', 'games/tornadoom/assets/images/redBarnTex.png'],
        ['groundTex', 'games/tornadoom/assets/images/ground6Dark10.png'],
        ['cowIcon', 'games/tornadoom/assets/images/iconCow2.png'],
        ['baleIcon', 'games/tornadoom/assets/images/iconHayBale.png'],
        ['abductIcon', 'games/tornadoom/assets/images/iconAbduction2.png'],
        ['rescueIcon', 'games/tornadoom/assets/images/iconRescue2.png'],
        ['crosshair', 'games/tornadoom/assets/images/crosshair.png'],
        ['switchUnlit', 'games/tornadoom/assets/images/buttonUnlit64.png'],
        ['switchLit', 'games/tornadoom/assets/images/buttonLit64.png'],
        ['cowBorderEnter', 'games/tornadoom/assets/images/cowBorderEnter.png']
    ];
    var modelNamesFilepaths = [
        ['playerTornado', 'games/tornadoom/assets/models/GameObjects_Funnel01.json'],
        ['cow', 'games/tornadoom/assets/models/GameObjects_Cow.json'],
        ['hayBale', 'games/tornadoom/assets/models/GameObjects_HayBale.json'],
        ['ufoSaucer', 'games/tornadoom/assets/models/GameObjects_UFOSaucer.json'],
        ['ufoCore', 'games/tornadoom/assets/models/GameObjects_UFOCore.json'],
        ['probe', 'games/tornadoom/assets/models/GameObjects_Probe.json'],
        ['crosshair', 'games/tornadoom/assets/models/GameObjects_CrossHair.json'],
        ['wagon', 'games/tornadoom/assets/models/LevelCommon_Wagon.json'],
        ['barn', 'games/tornadoom/assets/models/LevelCommon_Barn.json'],
        ['ground', 'games/tornadoom/assets/models/LevelCommon_Ground.json'],
        ['lvl01Fence', 'games/tornadoom/assets/models/Environment_fenceLvl1.json'],
        ['lvl02Fence', 'games/tornadoom/assets/models/Environment_fenceLvl2.json'],
        ['lvl03Fence', 'games/tornadoom/assets/models/Environment_fenceLvl3.json'],
        ['horizon', 'games/tornadoom/assets/models/Environment_Horizon.json']
    ];
    var audioNamesFilepaths = [
        ['tick', "games/tornadoom/assets/sounds/Tick.ogg"],
        ['moo', "games/tornadoom/assets/sounds/cowMoo.ogg"],
        ['probeExplosion', "games/tornadoom/assets/sounds/probeExplosion.ogg"],
        ['bgMusicLight', "games/tornadoom/assets/sounds/songLightCold.ogg"]
    ];

    DebugMngr.active = true;
    ViewMngr.SetLightProperties(true, LightModels.phong);

    // Initialize the Game Manager, passing the canvas to do much of the startup
    GameMngr.Initialize(document.getElementById('canvasWebGL'));
    GameMngr.LoadExternal(textureNamesFilepaths, modelNamesFilepaths, audioNamesFilepaths, Callback);
}
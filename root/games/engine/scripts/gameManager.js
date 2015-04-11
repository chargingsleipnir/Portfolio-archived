
var GameMngr = {
    canvas: null,
    assets: {
        textures: {},
        models: {},
        sounds: {}
    },
    paused: false,
    UserUpdate: function() {},
    Begin: function(canvasID, GameCallback, textureNamesFilepaths, modelNamesFilepaths, audioNamesFilepaths) {
        var that = this;
        var canvas = document.getElementById(canvasID);
        this.canvas = canvas.cloneNode(true);
        var ctx2D = canvas.getContext("2d");

        function UserContentLoadComplete() {
            ctx2D.fillRect(0, 0, 800, 800);

            // Clone the canvas for webGL implementation and destroy the old one
            canvas.parentNode.replaceChild(that.canvas, canvas);
            that.canvas.style.backgroundImage = "none";
            that.canvas.style.backgroundColor = "white";

            console.log("GAME STARTUP");
            GL.Initialize(that.canvas.getContext('webgl'));
            ViewMngr.Initialize();
            Input.Initialize();
            DebugMngr.Initialize();

            GameCallback();
        }

        function LoadModels() {
            FileUtils.LoadModels(modelNamesFilepaths, that.assets.models, UserContentLoadComplete);
        }
        function EngineLoadComplete() {
            console.log("LOADING GAME CONTENT");

            // Load up audio quick and easy first
            for(var i = 0; i < audioNamesFilepaths.length; i++) {
                that.assets.sounds[audioNamesFilepaths[i][0]] = new Audio(audioNamesFilepaths[i][1]);
            }
            console.log("Loading Audio Complete");

            FileUtils.LoadTextures(textureNamesFilepaths, that.assets.textures, LoadModels);
        }

        // Show loading animation components
        function RunLoadScreen() {
            canvas.removeEventListener("click", RunLoadScreen);
            ctx2D.clearRect(0, 0, 800, 800);
            ctx2D.fillText("Loading...", 500, 650);

            EL.PreLoad(EngineLoadComplete);
        }
        function ShowTornadoomTitle() {
            ctx2D.font = "30px Arial";
            ctx2D.fillStyle = "#FFFFFF";
            ctx2D.fillText("Click to load", 500, 650);
        }

        canvas.addEventListener("click", RunLoadScreen);
        ShowTornadoomTitle();
    },
    SetPaused: function(bePaused) {
        this.paused = bePaused;
    },
    BeginLoop: function() {
        var time_LastFrame;
        var that = this;

        function LoopGame() {
            requestAnimationFrame(LoopGame);
            var time_ThisFrame = new Date().getTime();
            var time_Delta = time_ThisFrame - (time_LastFrame || time_ThisFrame);
            time_LastFrame = time_ThisFrame;
            Time.deltaMilli = time_Delta / 1000;
            Time.fps = 1000 / time_Delta;

            // The time increment goes crazy when the window is out of focus.
            if(Time.deltaMilli > 0.018)
                Time.deltaMilli = 0.018;

            if(!that.paused) {
                Time.counter += Time.deltaMilli;
                // Updating Game World and Draw Calls
                SceneMngr.Update();
                DebugMngr.Update();
                ViewMngr.Update();
            }

            that.UserUpdate();
            GL.RenderScene(ViewMngr.activeCam.mtxCam);
            GL.RenderGUI();
        }
        LoopGame();
        //window.setInterval(function() {LoopGame()}, 16);
    }
};
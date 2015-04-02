
var EL = {
    assets: {
        shaderStrings: [],
        shaderPrograms: {},
        textures: {},
        models: {}
    },
    PreLoad: function (Callback) {
        console.log("ENGINE STARTUP");
        document.getElementById('canvasWebGL').removeAttribute("onmouseup");

        /********* Load other components *********/

        function InitEngineComponents() {

            // The font map is not dynamic - very specific to spritesheet I made.
            FontMap.Initialize();

            Callback();
        }

        /********* Load external files *********/

        // SHADERS
        var shaderNamesFilepaths = [
            // Specialty shaders
            ['ray', 'games/engine/assets/shaders/ray.vshdr', 'games/engine/assets/shaders/ray.fshdr'],
            ['guiBoxTint', 'games/engine/assets/shaders/guiBoxTint.vshdr', 'games/engine/assets/shaders/guiBoxTint.fshdr'],
            ['guiBoxTintTex', 'games/engine/assets/shaders/guiBoxTintTex.vshdr', 'games/engine/assets/shaders/guiBoxTintTex.fshdr'],
            ['guiText', 'games/engine/assets/shaders/guiText.vshdr', 'games/engine/assets/shaders/guiText.fshdr'],
            ['pntCol', 'games/engine/assets/shaders/pntCol.vshdr', 'games/engine/assets/shaders/pntCol.fshdr'],
            ['pntColTex', 'games/engine/assets/shaders/pntColTex.vshdr', 'games/engine/assets/shaders/pntColTex.fshdr'] // Special for textured particles

            /*
            ['col', 'engine/assets/shaders/col.vshdr', 'engine/assets/shaders/col.fshdr'],
            ['tex', 'engine/assets/shaders/tex.vshdr', 'engine/assets/shaders/tex.fshdr'],
            ['colTex', 'engine/assets/shaders/colTex.vshdr', 'engine/assets/shaders/colTex.fshdr']
            ['colTex', 'engine/assets/shaders/colTex.vshdr', 'engine/assets/shaders/colTex.fshdr']
            ['lightVert', 'engine/assets/shaders/vertLighting.vshdr', 'engine/assets/shaders/vertLighting.fshdr'],
            ['lightFrag', 'engine/assets/shaders/fragLighting.vshdr', 'engine/assets/shaders/fragLighting.fshdr'],
            ['colLightVert', 'engine/assets/shaders/colVertLighting.vshdr', 'engine/assets/shaders/colVertLighting.fshdr'],
            ['colLightFrag', 'engine/assets/shaders/colFragLighting.vshdr', 'engine/assets/shaders/colFragLighting.fshdr'],
            ['texLightVert', 'engine/assets/shaders/texVertLighting.vshdr', 'engine/assets/shaders/texVertLighting.fshdr'],
            ['texLightFrag', 'engine/assets/shaders/texFragLighting.vshdr', 'engine/assets/shaders/texFragLighting.fshdr'],
            ['colTexLightVert', 'engine/assets/shaders/colTexVertLighting.vshdr', 'engine/assets/shaders/colTexVertLighting.fshdr'],
            ['colTexLightFrag', 'engine/assets/shaders/colTexFragLighting.vshdr', 'engine/assets/shaders/colTexFragLighting.fshdr'],
            */
        ];
        // TEXTURE ASSETS
        var textureNamesFilepaths = [
            ['logo', 'games/engine/assets/images/logo.png'],
            ['starfield', 'games/engine/assets/images/starfield.jpg'],
            ['questionBlock', 'games/engine/assets/images/questionBlock.jpg'],
            ['lava', 'games/engine/assets/images/lavaTexture.jpg'],
            ['ice', 'games/engine/assets/images/iceTexture.jpg'],
            ['purply', 'games/engine/assets/images/purplePlanet.jpg'],
            ['star', 'games/engine/assets/images/star.png'],
            ['flower', 'games/engine/assets/images/flower.png'],
            ['fontMapBasic', 'games/engine/assets/images/FontSheetBasic.png'],
            ['fontMapBasicBold', 'games/engine/assets/images/FontSheetBasicBold.png']
        ];
        // JSON ASSETS
        var modelNamesFilepaths = [
            ['dimensionBox', 'games/engine/assets/models/DimensionTest_PositiveCube.json'],
            ['litUpCube', 'games/engine/assets/models/LightTestModels_MatCube.json']
        ];

        var that = this;
        function LoadModels() {
            FileUtils.LoadModels(modelNamesFilepaths, that.assets.models, InitEngineComponents);
        }
        function LoadTextures() {
            FileUtils.LoadTextures(textureNamesFilepaths, that.assets.textures, LoadModels);
        }

        // Load up everything first
        FileUtils.LoadShaders(shaderNamesFilepaths, this.assets.shaderStrings, LoadTextures);
    }
};

var EL = {
    assets: {
        shaderStrings: [],
        shaderPrograms: {},
        textures: {},
        models: {}
    },
    PreLoad: function (Callback) {
        console.log("ENGINE STARTUP");

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
        ];
        // TEXTURE ASSETS
        var textureNamesFilepaths = [
            ['fontMapBasic', 'games/engine/assets/images/FontSheetBasic.png'],
            ['fontMapBasicBold', 'games/engine/assets/images/FontSheetBasicBold.png']
        ];
        // JSON ASSETS
        var modelNamesFilepaths = [
            ['dimensionBox', 'games/engine/assets/models/DimensionTest_PositiveCube.json']
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
<?php
/**
 * Created by Odin
 * Date: 2015-05-07
 * Time: 9:38 PM
 */
?>

<div>
    <h3 class="centered">Tornadoom</h3>
    <div id="canvasContainer">
        <canvas id="gameCanvas" width="800" height="800"></canvas>
        <script>
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
                ['chickenTex', 'games/tornadoom/assets/images/chickenTexture.png'],
                ['hayBaleTex', 'games/tornadoom/assets/images/hayBaleTex.png'],
                ['fenceTex', 'games/tornadoom/assets/images/wood.png'],
                ['wagonTex', 'games/tornadoom/assets/images/woodVaried.png'],
                ['barnTex', 'games/tornadoom/assets/images/redBarnTex.png'],
                ['groundTex', 'games/tornadoom/assets/images/ground6Dark30.jpg'],
                ['cowIcon', 'games/tornadoom/assets/images/iconCow2.png'],
                ['baleIcon', 'games/tornadoom/assets/images/iconHayBale.png'],
                ['abductIcon', 'games/tornadoom/assets/images/iconAbduction2.png'],
                ['rescueIcon', 'games/tornadoom/assets/images/iconRescue2.png'],
                ['crosshair', 'games/tornadoom/assets/images/crosshair.png'],
                ['switchUnlit', 'games/tornadoom/assets/images/buttonUnlit64.png'],
                ['switchLit', 'games/tornadoom/assets/images/buttonLit64.png'],
                ['cowBorderClick', 'games/tornadoom/assets/images/cowBorderClick.png'],
                ['barkTex', 'games/tornadoom/assets/images/bark.jpg'],
                ['foliageTexDark', 'games/tornadoom/assets/images/ground4.png'],
                ['foliageTexBright', 'games/tornadoom/assets/images/foliageTexBright.jpg']
            ];
            var modelNamesFilepaths = [
                ['playerTornado', 'games/tornadoom/assets/models/min_GameObjects_Funnel01.json'],
                ['cow', 'games/tornadoom/assets/models/min_GameObjects_Cow.json'],
                ['chicken', 'games/tornadoom/assets/models/min_GameObjects_Chicken.json'],
                ['sheep', 'games/tornadoom/assets/models/min_GameObjects_Sheep.json'],
                ['hayBale', 'games/tornadoom/assets/models/min_GameObjects_HayBale.json'],
                ['ufoSaucer', 'games/tornadoom/assets/models/min_GameObjects_UFOSaucer.json'],
                ['ufoCore', 'games/tornadoom/assets/models/min_GameObjects_UFOCore.json'],
                ['probe', 'games/tornadoom/assets/models/min_GameObjects_Probe.json'],
                ['wagon', 'games/tornadoom/assets/models/min_LevelCommon_Wagon.json'],
                ['barn', 'games/tornadoom/assets/models/min_LevelCommon_Barn.json'],
                ['lvl01Fence', 'games/tornadoom/assets/models/min_Environment_fenceLvl1.json'],
                ['lvl02Fence', 'games/tornadoom/assets/models/min_Environment_fenceLvl2.json'],
                ['pen', 'games/tornadoom/assets/models/min_Environment_PenSmall.json'],
                ['horizon', 'games/tornadoom/assets/models/min_Environment_Horizon.json'],
                ['treeTrunk', 'games/tornadoom/assets/models/min_Environment_TreeTruck.json'],
                ['treeBranches', 'games/tornadoom/assets/models/min_Environment_TreeBranches.json'],
                ['treeBranches2', 'games/tornadoom/assets/models/min_Environment_TreeBranches2.json']
            ];
            var audioNamesFilepaths = [
                ['tick', "games/tornadoom/assets/sounds/Tick.ogg"],
                ['cowMoo', "games/tornadoom/assets/sounds/cowMoo.ogg"],
                ['cowCry', "games/tornadoom/assets/sounds/cowCry.ogg"],
                ['cattleMoo', "games/tornadoom/assets/sounds/cattleMoo.ogg"],
                ['probeExplosion', "games/tornadoom/assets/sounds/probeExplosion.ogg"],
                ['thud', "games/tornadoom/assets/sounds/thud.ogg"],
                ['wind', "games/tornadoom/assets/sounds/wind.ogg"],
                ['windSoft', "games/tornadoom/assets/sounds/windSoft.ogg"],
                ['abduction', "games/tornadoom/assets/sounds/alienAbduction2.ogg"],
                ['fail', "games/tornadoom/assets/sounds/fail.ogg"],
                ['bgMusic', "games/tornadoom/assets/sounds/cowboyTheme.ogg"]
            ];

            // Optional settings
            DebugMngr.active = true;
            ViewMngr.SetLightProperties(true, LightModels.phong);

            GameMngr.Begin("gameCanvas", BuildGame, textureNamesFilepaths, modelNamesFilepaths, audioNamesFilepaths);
        </script>
    </div>
    <iframe class="subHeaderDispElem" src="https://www.youtube.com/embed/yxV5FFod7A8" width="800" height="480" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
</div>

<br><strong>About Tornadoom:</strong><br>
<p>
    Tornadoom is more-or-less a tech demo, meant to show off some of the features of Engine von Doom.
    It's a fun little cow-chuckin' romp that'll give you a good laugh if you're sense of humour is as twisted as mine!
</p>

<br><strong>About the Engine:</strong><br>
<p>
    Tornadoom is built with Engine von Doom, a webGL engine of my own design and build.<br>
    Notable features include:
</p>
<ul class="sliderList">
    <?php for($i = 0; $i < count($xml->Component); $i++) { ?>
        <li id="slideLaunchElem<?= $i ?>">
            <script>
                var imgCount = 0,
                    imgElems = [],
                    imgSrcs = [];
            </script>
            <?= $xml->Component[$i]['title']; ?>
            <div class="engineDescWindow" id="slidingElem<?= $i ?>">
                <?php for($j = 0; $j < count($xml->Component[$i]->Block); $j++) {
                    echo $xml->Component[$i]->Block[$j];
                    if (isset($xml->Component[$i]->Block[$j]['imgSrc'])) { ?>
                        <img src="#" id="slidingElemImg<?= $i . $j ?>" />
                        <script>
                            imgElems[imgCount] = document.getElementById("slidingElemImg<?= $i . $j ?>");
                            imgSrcs[imgCount] = "<?php echo $xml->Component[$i]->Block[$j]['imgSrc']; ?>";
                            imgCount++;
                        </script>
                    <?php }
                } ?>
            </div>
        </li>
        <script>
            function ImagesLoaded() {
                SetSlideCall(
                    document.getElementById("slideLaunchElem<?= $i ?>"),
                    document.getElementById("slidingElem<?= $i ?>")
                );
            }
            LoadImages(imgElems, imgSrcs, imgCount, ImagesLoaded);
        </script>
    <?php } ?>
</ul>
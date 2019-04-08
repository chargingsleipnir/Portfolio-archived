<?php
/**
 * Created by Odin
 * Date: 2015-05-07
 * Time: 9:38 PM
 */
?>

<div>
    <h3 class="centered">Tornadoom</h3>
    <div class="centred">
        <iframe class="subHeaderDispElem" src="./games/tornadoom/index.php" width="800" height="800" frameborder="0" scrolling="no" allowfullscreen="allowfullscreen"></iframe>
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
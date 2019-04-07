<?php
/**
 * Created by Odin
 * Date: 2019-03-29
 * Time: 21:13
 */
?>

<h3 class="centered">Flippin' Tables</h3>

<p>WebGL version:</p>
<div class="centered">
    <canvas class="emscripten" id="canvas" oncontextmenu="event.preventDefault()" height="600px" width="960px"></canvas>
    <script type='text/javascript'>
    var Module = {
        TOTAL_MEMORY: 268435456,
        errorhandler: null,			// arguments: err, url, line. This function must return 'true' if the error is handled, otherwise 'false'
        compatibilitycheck: null,
        dataUrl: "Release/webGLExport.data",
        codeUrl: "Release/webGLExport.js",
        memUrl: "Release/webGLExport.mem",
    };
    </script>
    <script src="Release/UnityLoader.js"></script>
</div>

<p>Mobile promo, highlights social features:</p>
<iframe class="subHeaderDispElem" src="https://www.youtube.com/embed/qZxfv07rqfM" width="800" height="480" frameborder="0" allowfullscreen="allowfullscreen"></iframe>

<br>
<p>
    <strong>About Flippin' Tables</strong>&nbsp;&nbsp;&nbsp;
    <a class="standoutLink" href="downloads/FlippinTables.apk">.apk file</a>
</p>
<p>Just a quick-make game to test the android and ios publishing processes.</p>
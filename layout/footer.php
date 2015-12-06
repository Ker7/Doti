<?php

if (defined('DEBUG_MODE') == true) {
    echo '<div class="debug-bottom">GET<pre>';
    print_r($_GET);
    echo '</pre> </div>';
    echo '<div class="debug-bottom">POST<pre>';
    print_r($_POST);
    echo '</pre> </div>';
    echo '<div class="debug-bottom">_SERVER<pre>';
    print_r($_SERVER);
    echo '</pre> </div>';
}
?>

</body>
</html>
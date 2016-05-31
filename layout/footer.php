<?php

if (defined('DEBUG_MODE') == true) {
    echo '<div class="col-md-4 debug-bottom">SESSION<pre>';
    print_r($_SESSION);
    echo '</pre> </div>';
    echo '<div class="col-md-4 debug-bottom">GET<pre>';
    print_r($_GET);
    echo '</pre> </div>';
    echo '<div class="col-md-4 debug-bottom">POST<pre>';
    print_r($_POST);
    echo '</pre> </div>';
    echo '<div class="col-md-4 debug-bottom">_SERVER<pre>';
    print_r($_SERVER);
    echo '</pre> </div>';
    
}
?>

</body>
</html>
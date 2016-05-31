<?php
/* @todo eralid faili menüü */
echo '
        <div class="main-menu">
          <p class="btn btn-default" ><a class="bluecol" href="#">Add Fields</a></p>
          <p class="btn btn-default" ><a class="bluecol" href="#">Mess with Habits</a></p>
          <p class="btn btn-default" ><a class="bluecol" href="#">Settings</a></p>
          <p class="btn btn-default" ><a class="bluecol" href="' . $Keskus->getSubPage("logout.php") . '">Logout</a></p>
          <hr>
        </div>';
?>

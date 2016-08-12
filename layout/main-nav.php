<?php
/* @todo eralid faili menüü */
echo '
        <div class="main-menu" style="float: left;">
          <!--a href="' . $Keskus->getSubPageParams("memberpage.php", array(
                  $Keskus->_field_ADD => 1)) . '" title="Add Field!">
            <p class="btn btn-default" >Add Fields</p>
          </a-->';
          include('layout/form-field-add-menubutton.php');
          
    echo '<a class="bluecol" href="#"><p class="btn btn-default" >Mess with Habits</p></a>
          <a class="bluecol" href="#"><p class="btn btn-default" >Settings</p></a>
          <a class="bluecol" href="' . $Keskus->getSubPage("logout.php") . '"><p class="btn btn-default" >Logout</p></a>
          <hr>
        </div>';
?>

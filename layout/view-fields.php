<?php 

/* View main-view
 *
 * Sector Data
 *
 * @input Member Database ID
 */

$myfields = $user->getFieldsPersonal($_SESSION['memberID']);


echo '<div class="field-table">';

foreach($myfields as $ef) {
//print_r($ef);
  echo '<div class="field-line">';
  
    // Miski funktsioon, mis loob vastavaid linke, kustutamisel tuleb seda tegevust logida jne
    echo '<div class="field-remove">';
    /*echo '<a href="'
          . $Keskus->getSubPageParams(
                                      "memberpage.php",
                                      array(
                                        $Keskus->_field_DELETE => $ef["FieldId"], "asd" => 123, "rs" => 32))
          . '" title="Delete Field!">[x]</a>'; */


echo '  <!-- Trigger the modal with a button -->
<!--button type="button" class="btn btn-doti btn-lg" data-toggle="modal" data-target="#removeField">Open Modal</button-->
<a data-toggle="modal" data-target="#removeField'.$ef["FieldId"].'" href="#'
          . /* Proovine modalisse see panna!
             *
             *$Keskus->getSubPageParams(
                                      "memberpage.php",
                                      array(
                                        $Keskus->_field_DELETE => $ef["FieldId"], "asd" => 123, "rs" => 32))
          . */'" title="Delete Field!">[x!]</a>

<!-- Modal -->
<div id="removeField'.$ef["FieldId"].'" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Removing a Field. You sure?</h4>
      </div>
      <div class="modal-body">
        
      <!-- ################ FROM BEGIN ################ -->
        <form class="form-inline" action="#'./*$Keskus->getSubPageParams(
                                      "memberpage.php",
                                      array(
                                        $Keskus->_field_DELETE => $ef["FieldId"])) .*/ '" method="post" role="form">
        
          <input type="hidden" name="'.$Keskus->_field_DELETE.'" value="'.$ef["FieldId"].'">
          
          <button type="submit" class="btn btn-warning">Remove <b>'. $ef["FieldName"] .'</b></button>
          
        </form>
      <!-- ################ FROM END ################ -->
      
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>';

    echo   '</div> <!-- div field-remove -->';
    echo '
      <a class="bluecol" href="' . $Keskus->getSubPage("memberpage.php", "/?of=" . $ef["FieldId"]) . '" title="Open">
      <div class="field-name" data-id="' . $ef["FieldId"] . '">' . $ef['FieldName'] . '</div>
      <div class="field-open" > ';
      
      for ($i=0; $i<rand(1,10); $i++){
        echo "#";
        }
      
      echo '</a> ';
    echo '</div>';
    
  echo '</div>';
}
echo '</div>';

//if ()

//echo 'Count fields: '.count($myfields);
//echo '<pre>';
////print_r($myfields);
//echo '</pre>';
?>

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
  echo '<div class="field-line">';
  
    // Miski funktsioon, mis loob vastavaid linke, kustutamisel tuleb seda tegevust logida jne
    //echo '<a href="' . $Keskus->getSubPage("memberpage.php", "/?" . $Keskus->_field_DELETE . "=" . $ef["FieldId"]) . '" title="Delete Field!">[x]</a>';
    //@todo GET params lisada nii arrayna!
    echo '<div class="field-remove">';
      echo '<a href="'
          . $Keskus->getSubPageParams(
                                      "memberpage.php",
                                      array(
                                        $Keskus->_field_DELETE => $ef["FieldId"], "asd" => 123, "rs" => 32))
          . '" title="Delete Field!">[x]</a>';
    echo   '</div>
      <a class="bluecol" href="' . $Keskus->getSubPage("memberpage.php", "/?of=" . $ef["FieldId"]) . '" title="Open">
      <div class="field-name" data-id="' . $ef["FieldId"] . '">' . utf8_encode($ef['FieldName']) . '</div>
      <div class="field-open" > ';
      
      for ($i=0; $i<rand(1,10); $i++){
        echo '¤';
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

<?php 

/* View main-view
 *
 * Sector Data
 *
 * @input Member Database ID
 */

$myfields = $user->getFieldsPersonal($_SESSION['memberID']);

echo '<table class="field-table">
        <tbody>';
foreach($myfields as $ef) {
  echo '<tr>';
    echo '<td>';
    
    // Miski funktsioon, mis loob vastavaid linke, kustutamisel tuleb seda tegevust logida jne
    //echo '<a href="' . $Keskus->getSubPage("memberpage.php", "/?" . $Keskus->_field_DELETE . "=" . $ef["FieldId"]) . '" title="Delete Field!">[x]</a>';
    //@todo GET params lisada nii arrayna!
    echo '<a href="'
        . $Keskus->getSubPageParams(
                                    "memberpage.php",
                                    array(
                                      $Keskus->_field_DELETE => $ef["FieldId"], "asd" => 123, "rs" => 32))
        . '" title="Delete Field!">[x]</a>';
    
    echo   '</td>
      <td class="field-row" data-id="' . $ef["FieldId"] . '">' . utf8_encode($ef['FieldName']) . '</td>
      <td> <a class="bluecol" href="' . $Keskus->getSubPage("memberpage.php", "/?of=" . $ef["FieldId"]) . '" title="Open">¤¤¤¤¤¤¤¤¤¤</a> ';
    echo '</td>';
    
  echo '</tr>';
}
echo '</tbody>';
echo '</table>';

//if ()

//echo 'Count fields: '.count($myfields);
//echo '<pre>';
////print_r($myfields);
//echo '</pre>';
?>

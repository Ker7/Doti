<?php 

/* View main-view
 *
 * Sector Data
 *
 */


$myfields = $user->getFieldsPersonal();

echo '<table class="field-table">
        <tbody>';
foreach($myfields as $ef) {
  echo '<tr>';
  
    echo '<td>';
    // Miski funktsioon, mis loob vastavaid linke, kustutamisel tuleb seda tegevust logida jne
    echo '<a href="' . $Keskus->getSubPage("memberpage.php", "/?df=" . $ef["FieldId"]) . '" title="Delete Field!">[x]</a>
      </td>
      <td class="field-row" data-id="' . $ef["FieldId"] . '">' . utf8_encode($ef['FieldName']) . '</td>
      <td> <a class="bluecol" href="' . $Keskus->getSubPage("memberpage.php", "/?of=" . $ef["FieldId"]) . '" title="Open">¤¤¤¤¤¤¤¤¤¤</a> ';
    echo '</td>';
    
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';

echo 'Count fields: '.count($myfields);
echo '<pre>';
//print_r($myfields);
echo '</pre>';
?>

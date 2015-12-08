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
    echo '<a href="memberpage.php/?q=123" title="Delete">[x]</a>
      </td>
      <td class="field-row" data-id="' . $ef["FieldId"] . '">' . utf8_encode($ef['FieldName']) . '</td><td> <a class="bluecol" href="#" title="Delete">#></a> ';
    echo '</td>';
    
  echo '</tr>';
}

echo '</tbody>';
echo '</table>';

echo 'Count fields: '.count($myfields);
echo '<pre>';
print_r($myfields);
echo '</pre>';
?>

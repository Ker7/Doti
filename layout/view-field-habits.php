<?php 

/* View main-view
 *
 * Sector Data
 *
 * @input Member Database ID
 */
$fieldhabits = "";
if (!isset($_GET[ $Keskus->_field_OPEN ])) {
  
} else {
  
  $fieldhabits = $user->getHabits($_GET[ $Keskus->_field_OPEN ]);
  
//echo "Getting Field habits for: ".$_GET[ $Keskus->_field_OPEN ];
  
echo '<div class="habits-table">';

foreach($fieldhabits as $fh) {

  echo '<div class="habit-title">';
    // Miski funktsioon, mis loob vastavaid linke, kustutamisel tuleb seda tegevust logida jne
    //echo '<a href="' . $Keskus->getSubPage("memberpage.php", "/?" . $Keskus->_field_DELETE . "=" . $ef["FieldId"]) . '" title="Delete Field!">[x]</a>';
    //@todo GET params lisada nii arrayna!
    echo '<p>';
    echo '<span class="pealkiri">'.utf8_encode($fh['HabitName']) . '</span> - <sup>' . utf8_encode($fh['SpecName']) .'</sup>';
    echo '</p>';
  echo '</div>';
}
echo '</div';

}

//echo 'Count habits: '.count($fieldhabits);
//echo '<pre>';
//print_r($fieldhabits);
//echo '</pre>';


?>

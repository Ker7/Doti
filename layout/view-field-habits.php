<?php 

/* View main-view
 *
 * Sector Data
 *
 * Kui GET parameetsin on _field_OPEN key, ehk soovitakse mingi fieldi sisu näha, siis see vaade kuvab selle. Ehk siin toimub kontroll... Paha, see peaks toimuma eraldi
 *
 * @input Member Database ID
 */
$fieldhabits = "";
$fieldhabits = $user->getHabits($_GET[ $Keskus->_field_OPEN ]);
  
//echo "Getting Field habits for: ".$_GET[ $Keskus->_field_OPEN ];
  

foreach($fieldhabits as $fh) {
  echo '<div class="habit-pane">';
    echo '<div class="habit-title">';
      // Miski funktsioon, mis loob vastavaid linke, kustutamisel tuleb seda tegevust logida jne
      echo '<h4>';
        echo '<span class="">'.utf8_encode($fh['HabitName']) . ' </span>';
      echo '</h4>';
    echo '</div>';
  echo '</div>';
}

if (count($fieldhabits)==0) {
  echo '<div class="empty-habits">No Goal habits here...
  
  <a href="' . $Keskus->getSubPageParams("memberpage.php",
    array(
      $Keskus->_habit_ADD => 1))
          . '" title="Add Field!">Add Habits</p></a>
          
          </div>';
} else {
  echo '<a style="float: left; width: calc(100%-250px);" href="' . $Keskus->getSubPageParams("memberpage.php",
    array(
      $Keskus->_habit_ADD => 1))
          . '" title="Add Field!">Add Habits</p></a>';
}


//echo '<h1>Count habits: '.count($fieldhabits).'</h1>';
//echo '<pre>';
//print_r($fieldhabits);
//echo '</pre>';


?>

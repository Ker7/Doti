<?php


// For programmed test values
$a = 40;
$ap = (rand(-15, 15))/10;


echo '
<div id="chartdiv" style="height:400px;width:300px; "></div>

<script>
$.jqplot("chartdiv", [[';

// Hard coded test values
//[1, '.rand(20,80).'],[2, '.rand(20,80).'],[3, '.rand(20,80).'],[4, '.rand(20,80).'],[5, '.rand(20,80).'],[6, '.rand(20,80).'],[7, '.rand(20,80).'],[8, '.rand(20,80).'],[9, '.rand(20,80).'],[10, '.rand(20,80).'],
//[11, '.rand(20,80).'],[12, '.rand(20,80).'],[13, '.rand(20,80).'],[14, '.rand(20,80).'],[15, '.rand(20,80).'],[16, '.rand(20,80).'],[17, '.rand(20,80).'],[18, '.rand(20,80).'],[19, '.rand(20,80).'],[20, '.rand(20,80).'],
//[21, '.rand(20,80).'],[22, '.rand(20,80).'],[23, '.rand(20,80).'],[24, '.rand(20,80).'],[25, '.rand(20,80).'],[26, '.rand(20,80).'],[27, '.rand(20,80).'],[28, '.rand(20,80).'],[29, '.rand(20,80).'],[30, '.rand(20,80).'],

// Programmed test values
for($i=1; $i<31; $i++) {
  echo '['. $i .', '. $a .']';
  $a += $ap;
  $ap += (rand(-20, 20))/30;
  if ($i<30) {
    echo ',';
  }
}

echo '
]],
{ title:"Last 30 days",
  axes:{yaxis:{min:0, max:100},xaxis:{min:0, max:31}},
  series:[{color:"#5FAB78"}]
});
</script>

';
?>

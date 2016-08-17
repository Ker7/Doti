
  console.log("JS Loaded");
  
//Vajalik?
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

// Koos alumisega, värvide valikul!
function invertColor(hexTripletColor) {
    var color = hexTripletColor;
    color = color.substring(1);           // remove #
    color = parseInt(color, 16);          // convert to integer
    color = 0xFFFFFF ^ color;             // invert three bytes
    color = color.toString(16);           // convert to hex
    color = ("000000" + color).slice(-6); // pad with leading zeros
    color = "#" + color;                  // prepend #
    return color;
}

function colourFunction() {
var myselect = document.getElementById("inputSelectFieldColor");
var mfname = document.getElementById("inputFieldName");
//colourn = myselect.options[myselect.selectedIndex].className;
var colourv = myselect.options[myselect.selectedIndex].value;
var volourvopposite = invertColor(colourv);

//console.log("cn"+colourn);
console.log("cv"+colourv);  // ÕIGE!!!
console.log("co"+volourvopposite);  // ÕIGE!!!
$(mfname).css('background', colourv);
$(mfname).css('color', volourvopposite);
//myselect.className = colour;
//myselect.blur(); //This just unselects the select list without having to click
//////somewhere else on the page
}
// Suggestions No use yet!!!
function showResult(str) {
  if (str.length==0) { 
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
        var response=xmlhttp.responseHTML;
        var original=xmlhttp.responseText;
        console.log(xmlhttp);
      document.getElementById("livesearch").innerHTML=original;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  console.log("showResult()");
  xmlhttp.open("GET","http://localhost/doti/livesearch.php?q="+str,true);   // suhtelise raja jama, kui lihtsalt livesearch panna, otsib ta seda algse lehe peale, tänu millele ta saadab ka tolle lehe htmli...
  xmlhttp.send();
}

// A $( document ).ready() block.
$( document ).ready(function() {
    console.log( "JQ Document ready!" );
});
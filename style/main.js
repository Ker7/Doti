
  console.log("Algus~?");
  
//Vajalik?
$('#confirm-delete').on('show.bs.modal', function(e) {
    $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
});

// Suggestions
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
  console.log("somethinggg");
  xmlhttp.open("GET","http://localhost/doti/livesearch.php?q="+str,true);   // suhtelise raja jama, kui lihtsalt livesearch panna, otsib ta seda algse lehe peale, tänu millele ta saadab ka tolle lehe htmli...
  xmlhttp.send();
}
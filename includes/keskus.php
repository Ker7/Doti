<?php

class Keskus {
 
 /* Pärignute töötlemine
  *
  *
  *
  *
  *
  *
  */
 
 public function getDotiPage($string = "", $add = ""){
   return "http://" . DIR . $string;
 }
 
 public function getPageURL($page) {
   //kui see leht on olemas, KONTROLL
   //
   
   return WEB_DIR . $page . '.php';
 }
 
}

?>

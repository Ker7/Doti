<?php

require('includes/Klogger.php');        // Log asjad

 /* HTTP Pärignute töötlemine, URL'id
  *
  */
class Keskus {

  //Get KEY's for actions!
  public $_field_DELETE = "df";
  public $_field_OPEN = "of";

  private $_logger;
 
  function __construct(){
    //Set up logger capabillityes
    /*  Loggings
      *
      *  LogLevel::EMERGENCY;
         LogLevel::ALERT;
         LogLevel::CRITICAL;
         LogLevel::ERROR;
         LogLevel::WARNING;
         LogLevel::NOTICE;
         LogLevel::INFO;
         LogLevel::DEBUG;
         
         $log->info('Returned a million search results'); //Prints to the log file
         $log->error('Printttttt'); //Prints to the log file
         $log->debug('x = 5'); //Prints nothing due to current severity threshhold
      */
    $this->_logger = new Katzgrau\KLogger\Logger('log/', Psr\Log\LogLevel::DEBUG);
  }
  
  /* For building links
   */
  public function getSubPage($string = "", $add = ""){
  
    //$this->logi('Keskus->getSubPage() - '.$string, 2);
    
    //return "http://" . WEB_DIR . $string;
    return "http://" . WEB_DIR . $string . $add;
  
  }
  
  /* For building links with params v2!
   *
   * @var $add array Get parameetrid
   */
  public function getSubPageParams($string = "", $add){
  
    $url_string = "/?";
    
    //$addstr = implode($add);
    //print_r($add);
    
    $c = 0; //silmple counter, so first no additional &'s in URL
    foreach ($add as $ukey => $uval) {
      $url_string .= ($c > 0 ? "&" : "");
      $c++;
      
      $url_string .= $ukey."=".$uval;
    
    }
    
    //$this->logi('Keskus->getSubPage() - '.$string, 2);
    return "http://" . WEB_DIR . $string . $url_string;
  
  }
  
  /* Level 1-8
   */
  public function logi($msg = "", $level = 1) {
    if (strlen($msg) == 0) return;
    
    $msg .= "\t\t\t\t".__FILE__;  //Lisan lõppu faili, aga see vist pointless @todo remove line
    
    try{
      switch($level) {
        case(1):$this->_logger->debug($msg); break;
        case(2):$this->_logger->info($msg); break;
        case(3):$this->_logger->notice($msg); break;
        case(4):$this->_logger->warning($msg); break;
        case(5):$this->_logger->error($msg); break;
        case(6):$this->_logger->critical($msg); break;
        case(7):$this->_logger->alert($msg); break;
        case(8):$this->_logger->emergency($msg); break;
        default:$this->_logger->debug('Keskus->logi called with a strange level code. Message: ' . $msg . '.'); break;
      }
    } catch (Exception $exc) {
      return ;
    }
  }
 
 
  // . . .

}

?>

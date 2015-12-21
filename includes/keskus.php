<?php

require('includes/Klogger.php');        // Log asjad

 /* HTTP Pärignute töötlemine, URL'id
  *
  */
class Keskus {

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
  
    $this->logi('Keskus->getSubPage() - '.$string, 2);
    $this->logi("--> http://" . WEB_DIR . $string, 2);
    
    return "http://" . WEB_DIR . $string;
  
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

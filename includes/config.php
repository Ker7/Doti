<?php
ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
define('DBHOST','localhost');
define('DBUSER','root');
define('DBPASS','');
define('DBNAME','doti');
// Kui on DEBUGIMINE!
define('DEBUG_MODE', "midaiganes");//error_reporting(E_ALL);
//application address       //define('ABS_DIR','C:\\xampp\\htdocs\\reglo\\'); OUT
define('DIR','localhost/reglo/');    //define('DIR','http://domain.com/');
define('SITEEMAIL','noreply@domain.com');
CONST WEB_DIR = 'localhost/reglo/';
// END conf


try {

	//create PDO connection
	//$db = new PDO("mysql:host=".DBHOST.";port=8889;dbname=".DBNAME, DBUSER, DBPASS);
	$db = new PDO("mysql:host=".DBHOST.";port=3306;dbname=".DBNAME, DBUSER, DBPASS);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
	//show error
    echo '<p class="bg-danger">'.$e->getMessage().'</p>';
    exit;
}

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
require '/../vendor/autoload.php';      // Autoloading   "!composer install"
require('includes/Klogger.php');        // Log asjad
require('includes/Keskus.php');         // Pohiasjad

/* Page URL'id
 *
 */
$Keskus = new Keskus();

$user = new User($db);

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
$log = new Katzgrau\KLogger\Logger('log/', Psr\Log\LogLevel::DEBUG);


?>

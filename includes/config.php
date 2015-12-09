<?php

//include the user class, pass in the database connection
include('classes/user.php');
include('classes/phpmailer/mail.php');
require '/../vendor/autoload.php';      // Autoloading   "!composer install"
require('includes/Keskus.php');         // Pohiasjad

ob_start();
session_start();

//set timezone
date_default_timezone_set('Europe/London');

//database credentials
CONST DBHOST = 'localhost';
CONST DBUSER = 'root';
CONST DBPASS = '';
CONST DBNAME = 'doti';
// Kui on DEBUGIMINE!
CONST DEBUG_MODE =  "midaiganes";
error_reporting(E_ALL);

//application address       //CONST ABS_DIR = 'C:\\xampp\\htdocs\\reglo\\'; OUT
CONST DIR = 'localhost/reglo/';    //CONST DIR = 'http://domain.com/';
CONST SITEEMAIL = 'noreply@domain.com';
CONST WEB_DIR = 'localhost/doti/';
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


/* Page URL'id
 *
 */
$Keskus = new Keskus();

$user = new User($db);



?>

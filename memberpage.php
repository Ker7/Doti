<?php require('includes/config.php'); 

/*if not logged in redirect to login page
 * - Kui on sisse logitud, siis on ka Session muutujad kaasas...
 *
 * MemberPage tähendab Defaultis Fieldid...
 * Siin saab avada Fielde ja näha habiteid, hinnata? jms?
 *
 */
if(!$user->is_logged_in()){ header('Location: login.php'); } 

// Process POST requests "todo rem kuhugi?
/*	Field lisati vormi kaudu POST parameetrise
 */
if (isset($_POST[ $Keskus->_field_ADDED ])) {
	/*
	 *	$_POST $Keskus->_field_ADDED is set
	 *
	 *	@var String inputFieldName
	 *	@var String inputSelectFieldColor
	 */
        $Keskus->logi('User '.$_SESSION["username"].'(id:'.$_SESSION["memberID"].') added a field "'. $_POST["inputFieldName"] .'"',3);
		//include('layout/view-field-habits.php');
		
		
		/* Logic here:
		 * 	- Check if field name already doesn't exist (Duplicate post submit)
		 *	- IF true -> Prompt message!
		 *	- IF false -> Add new field!
		 *
		 *
		 */
		
		$fields = $user->getFieldsAuthor($_SESSION['memberID']);	//Kõik Fieldid süsteemist
		//$fields = $user->getFieldsPersonal($_SESSION['memberID']);
		
		//print_r($fields);
		
		$foundYet = false;		//Has founf a duplicate yet?!
		$matching = "";
		
		//Hakkan võrdlema kas juba äkki eksisteerib selline Field.
		// @todo Kui on lahti lingitud on ikkagi tema loodud. seega peaks uuesti linkimiseks mingi süsteem olema...
		foreach($fields as $f) {
				$var1 = mb_strtolower($_POST['inputFieldName']);
				$var2 = mb_strtolower($f['FieldName']);
				if ($var1 == $var2) {
						$foundYet = true;
						$matching = $f['FieldName'];
				}
		}

		//echo ( $foundYet? "Duplikaat!" : "Uus!");
		
		if (!$foundYet) {
				// Now add field!!!
				
			$user->setFieldAdd( $_SESSION['memberID'], $_POST['inputFieldName'], $_POST['inputSelectFieldColor'] );
                
				//////$Keskus->alerti("Field creation failed for: ".$_POST['inputFieldName'], 3);
				//////$Keskus->alerti("Field added: ".$_POST['inputFieldName'], 2);
		} else {
				$Keskus->alerti("Field (".$_POST['inputFieldName'].") already exists: ".$matching, 3);
				}
			
		//echo "<pre>";
		//print_r($fields);
		//echo "</pre>";
}
if (isset($_POST[ $Keskus->_field_DELETE ])) {

	$removeFieldValue = $user->unlinkField($_SESSION["memberID"], $_POST[ $Keskus->_field_DELETE ]);
	
	if ($removeFieldValue==0) {
		$Keskus->alerti("Field removal failed for some reason.", 3);
	} else {
		$Keskus->alerti("Field removed!", 2);
	}
	
	$Keskus->logi('User '.$_SESSION["username"].'(id:'.$_SESSION["memberID"].') unlinked a field "'. $_POST["df"] .'"',3);
	//include('layout/view-field-habits.php');
}


//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>

<div class="container">
	<div class="row">
		<div class="" style="overflow: auto;">
		<a style="width: 96px; float: left; margin: 16px;" href="<?php echo $Keskus->getSubPage("memberpage.php"); ?>"><img src="<?php echo $Keskus->getSubPage('style/logo.png'); ?>"/></a>
		<h2 style="width: 100%; float: left;">Welcome, <?php echo $_SESSION['username']; ?>!</h2>
		
		<?php require('layout/main-nav.php'); ?>
		<?php require('layout/view-fields.php'); ?>
		<?php if (isset($_GET[ $Keskus->_field_OPEN ])) { include('layout/view-field-habits.php'); } ?>
		<?php if (isset($_GET[ $Keskus->_field_ADD ])) { include('layout/form-field-add.php'); } ?>
		<?php //include(''); ?>
		</div>
	</div>
	
	<div class="row">
          <?php require('layout/x-test-view-plotter.php'); ?>
	</div>
</div>
  
	<!-- Start Footer -->
	
<?php 
//include header template
require('layout/footer.php'); 
?>

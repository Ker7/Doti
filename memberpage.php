<?php require('includes/config.php'); 

/*if not logged in redirect to login page
 * - Kui on sisse logitud, siis on ka Session muutujad kaasas...
 *
 * MemberPage tähendab Defaultis Fieldid...
 * Siin saab avada Fielde ja näha habiteid, hinnata? jms?
 *
 */
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="" style="overflow: auto;">
			
				<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
				
          <?php require('layout/main-nav.php'); ?>
				
          <?php require('layout/view-fields.php'); ?>
          <?php if (isset($_GET[ $Keskus->_field_OPEN ])) { include('layout/view-field-habits.php'); } ?>
          <?php if (isset($_GET[ $Keskus->_field_ADD ])) { include('layout/form-field-add.php'); } ?>
		  </div>
			
	</div>
	
	<div class="row">
          <?php require('layout/view-plotter-test.php'); ?>
	</div>


</div>
  
	<!-- Start Footer -->
	
<?php 
//include header template
require('layout/footer.php'); 
?>

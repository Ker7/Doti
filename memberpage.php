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

	    <div class="col-sm-offset-2">
			
				<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
				
          <?php require('layout/main-nav.php'); ?>
				
          <?php require('layout/view-fields.php'); ?>
          <?php require('layout/view-field-habits.php'); ?>
		  </div>

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		  </div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>

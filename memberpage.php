<?php require('includes/config.php'); 

//if not logged in redirect to login page
if(!$user->is_logged_in()){ header('Location: login.php'); } 

//define page title
$title = 'Members Page';

//include header template
require('layout/header.php'); 
?>

<div class="container">

	<div class="row">

	    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
			
				<h2>Welcome <?php echo $_SESSION['username']; ?></h2>
				<!-- /* @todo eralid faili menüü */ -->
        <div class="main-menu">
          <p class="btn btn-default" ><a class='bluecol' href='#'>Add a Field</a></p>
          <p class="btn btn-default" ><a class='bluecol' href='#'>Track an Event</a></p>
          <p class="btn btn-default" ><a class='bluecol' href='#'>Settings</a></p>
          <p class="btn btn-default" ><a class='bluecol' href='<?php echo $Keskus->getSubPage('logout.php'); ?>'>Logout</a></p>
          <hr>
        </div>
          
          <?php require('layout/main-view.php'); ?>
		</div>
	</div>


</div>

<?php 
//include header template
require('layout/footer.php'); 
?>

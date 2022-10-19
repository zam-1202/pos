<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
    <!-- <?php echo display_msg($msg); ?> -->
  </div>
 <div class="col-md-12">
    <div class="panel-banner">
      <div class="jumbotron text-center">
         <h1>Welcome User <hr> Inventory Management System</h1>
         <p>Sorry, you don't have permission to view this page</p>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>

<?php
  ob_start();
  require_once('includes/load.php');
  if($session->isUserLoggedIn(true)) { redirect('home.php', false);}
?>

<?php include_once('layouts/header.php'); ?>
<!-- <body style = "background:url(libs/images/gradientbg.png);
            background-repeat: no-repeat;
            background-size: cover";> -->


<div class="login-page">
    <div class = "ironlogo">
         <img src="libs/images/IronMedLogo.png" alt="HTML5 Icon">
    </div>
    <div class = "side">
        <img src="libs/images/diamond.png">
    </div>
<!-- 
    <div class="text-right">
       <h1>Login</h1>
     </div> -->
     <?php echo display_msg($msg); ?>
      <form method="post" action="auth.php" class="clearfix">

        <div class="form-group">
              <!-- <label for="username" class="control-label">Username</label> -->
              <input type="name" class="form-control" name="username" placeholder="Username">
        </div>

        <div class="form-group">
            <!-- <label for="Password" class="control-label">Password</label> -->
            <input type="password" name= "password" class="form-control" placeholder="Password">
        </div>
        <div class="form-group">
                <button type="submit" class="btn btn-primary" style="border-radius:0%">Login</button>
        </div>
    </form>
    
    <div class="footnote">
      <h8>&copy; Copyright 2022 Inventory Management System</h8>
     </div>
     
</div>
</body>

<?php include_once('layouts/footer.php'); ?>
<?php $user = current_user(); ?>
<!DOCTYPE html>
  <html lang="en">
    <head>
    <meta charset="UTF-8">
    <title><?php if (!empty($page_title))
           echo remove_junk($page_title);
            elseif(!empty($user))
           echo ucfirst($user['name']);
            else echo "Inventory Management System";?>
    </title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/ picker3.min.css" />
    <link rel="stylesheet" href="libs/css/main.css?v=<?php echo time(); ?>" />
  </head>
  <!-- ADMIN MENU --- PAGPIPILIAN -->
  <?php  if ($session->isUserLoggedIn(true)): ?>
    <header id="header">
      <div class = "menu-words">
      <div class = "logoheader">
          <img src="libs/images/IronMedHeader.png" alt="HTML5 Icon"> 
          
      </div>
      <div class="header-content">
        

<?php 

// $sql_get = "SELECT * FROM alert WHERE status = 1";
// return find_by_sql($sql);
// $count = num_rows($sql_get);


?>


<div class = "header-text">  
            <a href="alert.php" class="badge text-bg-secondary"> <i class="fa-solid fa-envelope" id = "count"></i></a>
            <!-- <span > <?php echo $$sql_get; ?></span> -->
        
      <tr>
    <a href="admin.php">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-home"></i>
      <span>Home</span>
    </a>
 <tr>
    <a href="users.php" >
    &nbsp;&nbsp;&nbsp;   <i class="glyphicon glyphicon-user"></i>
      <span>Admin</span>
    </a>
  </tr>
  <tr>
    <a href="categorie.php" >
    &nbsp;&nbsp;&nbsp;   <i class="glyphicon glyphicon-indent-left"></i>
      <span>Categories</span>
    </a>
  </tr>


  <div class="dropdown">
  &nbsp;&nbsp;&nbsp;   <i class="glyphicon glyphicon-duplicate"></i>
 <span class="dropbtn">Product Management</span></a>

  <div class="dropdown-content">
    <a href="product.php">Manage Products</a>
    <a href="add_product.php">Add Products</a>
    
  </div>
</div>

 <tr>
    <a href="sales.php" >
    &nbsp;&nbsp;&nbsp;   <i class="glyphicon glyphicon-credit-card"></i>
      <span>Manage Sales</span>
    </a>
  </tr>
  
  
<div class="dropdown">
  &nbsp;&nbsp;&nbsp;   <i class="glyphicon glyphicon-duplicate"></i>
 <span class="dropbtn">Sales Report</span></a>

  <div class="dropdown-content">
    <a href="sales_report.php">Date-to-date</a>
    <a href="monthly_sales.php">Monthly Sales</a>
    <a href="daily_sales.php">Daily Sales</a>
    
  </div>
</div>
<a href="add_sale.php" >
    &nbsp;&nbsp;&nbsp;  <i class="glyphicon glyphicon-credit-card"></i>
      <span>POS</span>
    </a>

  </div>
  </div>

  
<!-- PROFILE MENU -->
      <div class="pull-right clearfix">
        <ul class="info-menu list-inline list-unstyled">
          <li class="profile">
            <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
              <img src="uploads/users/<?php echo $user['image'];?>" alt="user-image" class="img-circle img-inline">
              <span><?php echo remove_junk(ucfirst($user['name'])); ?> <i class="caret"></i></span>
            </a>
            

            <ul class="dropdown-menu">
              
              <li>
                  <a href="profile.php?id=<?php echo (int)$user['id'];?>">
                      <i class="glyphicon glyphicon-user"></i>
                      Profile
                  </a>
              </li>
             <li>
                 <a href="edit_account.php" title="edit account">
                     <i class="glyphicon glyphicon-cog"></i>
                     Settings
                 </a>
             </li>
             <li class="last">
                 <a href="logout.php">
                     <i class="glyphicon glyphicon-off"></i>
                     Logout
                 </a>
             </li>
           </ul>
          </li>
        </ul>
      </div>
     </div>
    </header>

<?php endif;?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/112ff842ea.js" crossorigin="anonymous"></script>
<div class="page">
  <div class="container-fluid">

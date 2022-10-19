<?php
  $page_title = 'Alert';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
   $products = join_product_table();
   $alerts = join_alert_table();

?>


<!-- 
// if(isset($_POST['send']))
// {
//   $prod_name = $_POST['name'];
//   $exp_Date = $_POST['expiredDate'];
//   $exp_String = $_POST['expiredString'];
//   $quantity = $_POST['quantity'];

//   $sql_insert = "INSERT INTO alert(product_name,alert_date,alert_expire,alert_stock) VALUES ('$prod_name', '$exp_Date', '$exp_String', '$quantity')";
//   if($sql_insert)
//   { -->
<!-- //     echo "<script>alert('UGHHHHHHHH');</script>"; -->
<!-- //   }
//   else
//   {
//     echo "WALA WALAAAAAAAAAAA";
//     exit;
//   }
// } --> -->



<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span>Alert</span>
       </strong>
       <!-- <div class="panel-heading clearfix"> -->

      </div>
        <div class="panel-body-product">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 5%;">No.</th>
                <th class="text-center" style="width: 10%;"> Product Name </th>
                <th class="text-center" style="width: 10%;"> Expiration Date </th>
                <th class="text-center" style="width: 10%;"> Type </th>
                <th class="text-center" style="width: 10%;"> Stock Status </th>

              </tr>
            </thead>

          
            <tbody>
              <?php foreach ($products as $product):
                $today_date = date("Y-m-d");                
                $exp = strtotime($product['expiration_date']);
                $td = strtotime($today_date);
              
                if ($td>=$exp || $product['quantity'] <= 5 || $product['quantity'] == 0 || $product['quantity'] > 500){
              ?>
              <tr>
              <form method="post">
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center" name="name"> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center" name="expiredDate"> <?php echo ($product['expiration_date']); ?></td>
                <td class="text-center" name="expiredString"> <?php echo expired($product['expiration_date']); ?></td> 
                <td class="text-center" name="quantity"> <?php echo stock($product['quantity']); ?></td>
                <!-- <button type="submit" name="send">GOOOOOOOOOOOO</button> -->
                </form>              
              </tr>
              <?php } endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/112ff842ea.js" crossorigin="anonymous"></script>
<div class="page">
  <div class="container-fluid">
  <?php include_once('layouts/footer.php'); ?>
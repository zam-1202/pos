<?php
  $page_title = 'Admin Home Page';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(1);
?>
<?php
 $c_categorie     = count_by_id('categories');
 $c_product       = count_by_id('products');
 $c_sale          = count_by_id('sales');
 $c_user          = count_by_id('users');
//  $status          = count_by_id('status');
 $products_sold   = find_higest_saleing_product('10');
 $recent_products = find_recent_product_added('5');
 $recent_sales    = find_recent_sale_added('5')
?>
<?php include_once('layouts/header.php'); ?>

<!-- <div class="row">
   <div class="col-md-6">
     <?php echo display_msg($msg); ?>
   </div>
</div> -->
  <div class = "greetings">
    <h1>Good Day!</h1>
  </div>


	
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
       <div class="date">
        <strong><?php 
        date_default_timezone_set("Asia/Singapore");
          echo date("F j");?>
        </div>
        <div class="year">
        <strong><?php 
          echo date("Y");?>
        </div>
        <br> 
        <div class="time">
          <?php 
          echo date("g:i a ");?></strong>
        </div>      
    
        </div>
        <div class="panel-value">
          <!-- <h2 class="margin-top"> <?php  echo $c_categorie['total']; ?> </h2> -->
          <p class="text-muted">Categories</p>
        <!-- </div> -->
       </div>
    </div>
	<!-- </a> -->
	
	<a href="product.php">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
        
        </div>
        <div class="panel-value">
          <h2 class="total_products"> <?php  echo $c_product['total']; ?> </h2>
          <p class="products">Products</p>
        <!-- </div> -->
       </div>
    </div>
	</a>
	
	<a href="sales.php">
    <div class="col-md-3">
       <div class="panel panel-box clearfix">
        </div>
         <div class="panel-value"> <!--" pull-right" -->
          <h2 class="total_sales"> <?php  echo $c_sale['total']; ?></h2>
          <p class="sales">Sales</p>
       </div>
    </div>
	</a>
</div>
  
   <div class="col-md-4">
      <div class="container">
        <div class="panel-heading">
          <strong>
            <span>FORECAST</span>
          </strong>
        </div>
        <div class="panel-body">
          <table class="table table-striped table-bordered table-condensed">
       <thead>
         <tr>
           <th class="text-center" style="width: 50px;">#</th>
           <th>Product Name</th>
           <th>Date</th>
           <th>Total Sale</th>
         </tr>
       </thead>
       <tbody>
         <?php foreach ($recent_sales as  $recent_sale): ?>
         <tr>
           <td class="text-center"><?php echo count_id();?></td>
           <td>
            <a href="edit_sale.php?id=<?php echo (int)$recent_sale['id']; ?>">
             <?php echo remove_junk(first_character($recent_sale['name'])); ?>
           </a>
           </td>
           <td><?php echo remove_junk(ucfirst($recent_sale['date'])); ?></td>
           <td>₱<?php echo remove_junk(first_character($recent_sale['price'])); ?></td>
        </tr>

       <?php endforeach; ?>
       </tbody>
     </table>
    </div>
   </div>
  </div>
  </div>
 </div>
</div>
 </div>
  <div class="row">

</div>


<?php include_once('layouts/footer.php'); ?>

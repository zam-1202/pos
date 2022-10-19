<?php
  $page_title = 'All Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(2);
  $products = join_product_table();

?>
<?php include_once('layouts/header.php'); ?>
  <div class="row">
     <div class="col-md-12">
       <?php echo display_msg($msg); ?>
     </div>
    <div class="col-md-12">
      <div class="panel panel-default">
      <div class="panel-heading">
        <strong>
          <span>Products</span>
       </strong>
       <!-- <div class="panel-heading clearfix"> -->
         <div class="pull-right">
           <a href="add_product.php" class="btn btn-primary">Add New</a>
          <!-- </div> -->
        </div>
      </div>
        <div class="panel-body-product">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="text-center" style="width: 50px;">No.</th>
                <th class="text-center"> Product Name </th>
                <th class="text-center" style="width: 10%;"> Category </th>
                <th class="text-center" style="width: 10%;"> Barcode </th>
                <th class="text-center" style="width: 10%;"> In-Stock </th>
                <th class="text-center" style="width: 10%;"> Buying Price </th>
                <th class="text-center" style="width: 10%;"> Selling Price </th>
                <th class="text-center" style="width: 10%;"> Date Added </th>
                <th class="text-center" style="width: 10%;"> Expiration Date </th>
                <th class="text-center" style="width: 10%;"> Status </th>
                <th class="text-center" style="width: 10%;"> Actions </th>
              </tr>
            </thead>

          
            <tbody>
              <?php foreach ($products as $product):?>
              <tr>
                <td class="text-center"><?php echo count_id();?></td>
                <td class="text-center"> <?php echo remove_junk($product['name']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['categorie']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['barcode']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['quantity']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['buy_price']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['sale_price']); ?></td>
                <td class="text-center"> <?php echo read_date($product['date']); ?></td>
                <td class="text-center"> <?php echo ($product['expiration_date']); ?></td>
                <td class="text-center"> <?php echo remove_junk($product['status']); ?></td>

                
                <td class="text-center">
                  <div class="btn-group">
                    <a href="edit_product.php?id=<?php echo (int)$product['id'];?>" class="btn btn-info btn-xs"  title="Edit" data-toggle="tooltip">
                      <span class="glyphicon glyphicon-edit"></span>
                    </a>

                

                </td> 
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <?php include_once('layouts/footer.php'); ?>
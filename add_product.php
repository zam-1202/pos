<?php
  $page_title = 'Add Product';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
  page_require_level(2);
  $all_categories = find_all('categories');
  // $all_photo = find_all('media');
?>
<?php
 if(isset($_POST['add_product'])){
   $req_fields = array('product-title','product-categorie','product-quantity','buying-price', 'saleing-price',
  'product-status','product-expiration');
   validate_fields($req_fields);
   if(empty($errors)){
     $p_name  = remove_junk($db->escape($_POST['product-title']));
     $p_barcode  = remove_junk($db->escape($_POST['product-barcode']));
     $p_cat   = remove_junk($db->escape($_POST['product-categorie']));
     $p_qty   = remove_junk($db->escape($_POST['product-quantity']));
     $p_buy   = remove_junk($db->escape($_POST['buying-price']));
     $p_sale  = remove_junk($db->escape($_POST['saleing-price']));
     $date    = make_date();
     $p_exp = ($db->escape($_POST['product-expiration']));
     $status = ($db->escape($_POST['product-status']));
     $query  = "INSERT INTO products (";
     $query .=" barcode,name,quantity,buy_price,sale_price,categorie_id,date,status,expiration_date";
     $query .=") VALUES (";
     $query .=" '{$p_barcode}','{$p_name}', '{$p_qty}', '{$p_buy}', '{$p_sale}', '{$p_cat}', '{$date}', '{$status}', '{$p_exp}'";
     $query .=")";
     $query .=" ON DUPLICATE KEY UPDATE name='{$p_name}'";
     if($db->query($query)){
       $session->msg('s',"Product added ");
       redirect('add_product.php', false);
     } else {
       $session->msg('d',' Failed to add product');
       redirect('add_product.php', false);
     }

   } else{
     $session->msg("d", $errors);
     redirect('add_product.php',false);
   }

 }

?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-10">
    <?php echo display_msg($msg); ?>
  </div>
</div>
  <div class="add-new-product">
  <div class="col-md-8">
      <div class="panel panel-default">
        <div class="panel-heading">
          <strong>
            <span>Add New Product</span>
         </strong>
        </div>
        <div class="panel-body-add">
         <div class="col-md-12">
          <form method="post" action="add_product.php" class="clearfix">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-title" placeholder="Product Name">
               </div>
              </div>

              <div class="form-group">
                <div class="row2">
                  <div class="col-md-12">
                    <select class="form-control" name="product-categorie">
                      <option value="">Select Product Category</option>
                    <?php  foreach ($all_categories as $cat): ?>
                      <option value="<?php echo (int)$cat['id'] ?>">
                        <?php echo $cat['name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                  </div>
                </div>
              </div>
              
              <div class="form-group">
               <div class="row1">
                 <div class="col-md-12">
                   <div class="input-group">
                     <span class="input-group-addon">
                      <i class="glyphicon glyphicon-shopping-cart"></i>
                     </span>
                     <input type="number" class="form-control" name="product-quantity" placeholder="Product Quantity">
                  </div>
                 </div>
                 <br><br>
                 <div class="col-md-12">
                   <div class="input-group">
                     <span class="input-group-addon">
                     <i>Php</i>
                     </span>
                     <input type="number" class="form-control" name="buying-price" placeholder="Buying Price">
                     <span class="input-group-addon">.00</span>
                  </div>
                 </div>
                 <br><br>
                  <div class="col-md-12">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i>Php</i>
                      </span>
                      <input type="number" class="form-control" name="saleing-price" placeholder="Selling Price">
                      <span class="input-group-addon">.00</span>
                   </div>
                  </div>
               </div>
              </div>
              
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="text" class="form-control" name="product-barcode" placeholder="Product Barcode">
               </div>
              </div>

              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <input type="date" name="product-expiration" placeholder="Expration Date">
                      <!-- <a href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css"></a> -->
                    </input>
               </div>
              </div>


              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon">
                   <i class="glyphicon glyphicon-th-large"></i>
                  </span>
                  <select class="form-control" name="product-status" placeholder="Product Status">
                    <option value="Active" name="product-status">Active</option>
                  </select>
               </div>
              </div>


              <button type="submit" name="add_product" class="btn-add-product btn-info">Add product</button>
          </form>
         </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once('layouts/footer.php'); ?>

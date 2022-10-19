<?php
  $page_title = 'POS';
  require_once('includes/load.php');
  // Checkin What level user has permission to view this page
   page_require_level(3);
?>
<?php

  if(isset($_POST['add_sale'])){
    // for ($x = 0; $x <= 6; $x++){
    // $req_fields = array('s_id','quantity','price','total', 'date' );
    // validate_fields($req_fields);
        if(empty($errors)){
          $p_id      = $db->escape((int)$_POST['s_id']);
          $s_qty     = $db->escape((int)$_POST['quantity']);
          $s_total   = $db->escape($_POST['total']);
          $date      = $db->escape($_POST['date']);
          $s_date    = make_date();
          $query  = "INSERT INTO sales (";
          $query .= " product_id,qty,price,date";
          $query .= ") VALUES (";
          $query .= "'{$p_id}','{$s_qty}','{$s_total}','{$s_date}'";
          $query .= ")";

          if($db->query($query)){
          update_product_qty($s_qty,$p_id);
          $session->msg('s',"Sale added. ");
          redirect('sales.php', false);
          } 
          else {
          $session->msg('d',' Failed to add!');
          redirect('add_sale.php', false);
          }
      } else {
         $session->msg("d", $errors);
         redirect('add_sale.php',false);
      }
    }
  // }


?>
<?php include_once('layouts/header.php'); ?>

<!-- <script>
    function myFunction() {
  //alert("ok");
  document.getElementById("theForm").reset();
}
    </script>

<form id="theForm">
    <input type="text"/>
</form>
<button  class="form-control btn btn-primary reset" onclick="myFunction()">Reset</button>
 -->



<div class="row">
  <div class="col-md-6">
    <?php echo display_msg($msg); ?>
    <form method="post" action="ajax.php" autocomplete="off" id="sug-form">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
            </span>
            <input type="text" id = "sug_input" class="form-control" name="title"  placeholder="Search for product barcode" class="clearfix" autofocus>
            <button type="submit" name = "submit" class="btn btn-success" id="btn-submit" sty;e="width 130px; height:40px; margin-top:-8px;">
              <i class="icon icon-plus-sign"></i>RAVAANN</button>
          </div>
         <div id="result" class="list-group" ></div>
        </div>
    </form>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading clearfix">
        <strong>
          <span>Point of Sale</span>
       </strong>
      </div>
      <div class="panel-body-new">
        <form method="post" action="add_sale.php">
         <table class="table table-bordered">
           <thead>
            <th> Item </th>
            <th> Price </th>
            <th> Quantity </th>
            <th> Total </th>
            <th> Date</th>
            <th> Action</th>
           </thead>
             <tbody id="product_info"></tbody>
         </table>
         <button type="submit" name="add_sale" class="btn btn-primary">Generate Receipt</button>
       </form>
      </div>
    </div>
  </div>
</div>

<?php include_once('layouts/footer.php'); ?>

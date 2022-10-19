<?php
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>

<?php
 // Auto suggestion
    $html = '';
   if(isset($_POST['product_name']) && strlen($_POST['product_name']))
   {
     $products = find_product_by_title($_POST['product_name']);
     if($products){
        foreach ($products as $product): 
           $html .= "<li class=\"list-group-item\">";
           $html .= $product['name'];
           $html .= "</li>";

         endforeach;
      } else {

        $html .= '<li onClick=\"fill(\''.addslashes().'\')\" class=\"list-group-item\">';
        $html .= 'Not found';
        $html .= "</li>";

      }

      echo json_encode($html);
   }
 ?>

 <?php
 // find all product
  if(isset($_POST['p_name']) && strlen($_POST['p_name']))
  {
    $product_title = remove_junk($db->escape($_POST['p_name']));
    if($results = find_all_product_info_by_barcode($product_title)){
        
        foreach ($results as $result) {
            $html .= "<tr>";
            $html .= "<td id=\"s_name\">".$result['name']."</td>";
            $html .= "<input type=\"hidden\" name=\"s_id\" value=\"{$result['id']}\">";
            $html .= "<td>";
            $html .= "<input type=\"text\" disabled=\"disabled\" id=\"price\" value=\"{$result['sale_price']}\" style=\"border-top-style: hidden;
            // border-right-style: hidden;
            // border-left-style: hidden;
            // border-bottom-style: hidden;
            // background-color: #eee;\">";
            $html  .= "</td>";
            $html .= "<td id=\"s_qty\">";
            $html .= "<input type=\"text\" class=\"form-control\" id=\"quantity\" name=\"quantity\" value=\"1\">";
            $html  .= "</td>";
            $html  .= "<td>";
            $html  .= "<input type=\"text\" class=\"form-control\" id=\"total\" name=\"total\" value=\"{$result['sale_price']}\">";
            $html  .= "</td>";
            $html  .= "<td>";
            $html  .= $datetime = date_create()->format('Y-m-d');
            $html  .= "</td>";
            $html  .= "<td>";
            $html  .= "<button type=\"submit\" name=\"add_sale\" class=\"btn btn-primary\">Add sale</button>";
            $html  .= "</td>";
            $html  .= "<td>";
            $html  .= "<button type=\"submit\" name=\"add_sale\" class=\"btn btn-primary\">Generate Receipt</button>";
            $html  .= "</td>";
            $html  .= "</tr>";
        }
        
    } 
    else {
        $html ='<tr><td>Product is not registered</td></tr>';
    }
    
    echo json_encode($html);
  }

 ?>






<?php

@include '../config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){

   $product_name = $_POST['product_name'];
   $product_description = $_POST['product_description'];
   $product_price = $_POST['product_price'];

   // Check if any of the fields are not empty and need to be updated
   $update_data = array();
   if (!empty($product_name)) {
      $update_data[] = "product_name = '$product_name'";
   }
   if (!empty($product_description)) {
      $update_data[] = "product_description = '$product_description'";
   }
   if (!empty($product_price)) {
      $update_data[] = "product_price = '$product_price'";
   }

   if (!empty($update_data)) {
      // Construct the SQL query for updating the specified fields
      $update_query = "UPDATE product_details SET " . implode(', ', $update_data) . " WHERE product_id = '$id'";
      $upload = mysqli_query($conn, $update_query);

      if($upload){
         $message[] = 'Product updated successfully!';
         header('location: admin_page.php'); 
      } else {
         $message[] = 'Failed to update the product!';
      }
   } else {
      $message[] = 'No fields to update!';
   }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href=assets/css/admin-style.css>
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

<div class="container">


<div class="admin-product-form-container centered">

   <?php
      
      $select = mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = '$id'");
      while($row = mysqli_fetch_assoc($select)){

   ?>
   
   <form action="" method="post" enctype="multipart/form-data">
      <h3 class="title">update the product</h3>
      <input type="text" class="box" name="product_name" value="<?php echo $row['product_name']; ?>" placeholder="enter the product name">
      <input type="text" class="box" name="product_description" value="<?php echo $row['product_description']; ?>" placeholder="enter the product description">
      <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['product_price']; ?>" placeholder="enter the product price">
      <input type="file" class="box" name="product_image"  accept="image/png, image/jpeg, image/jpg">
      <input type="submit" value="update product" name="update_product" class="btn">
      <a href="admin_page.php" class="btn">go back!</a>
   </form>
   


   <?php }; ?>

   

</div>

</div>

</body>
</html>
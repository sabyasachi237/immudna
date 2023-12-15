<?php
include_once '../../../config.php';

$id = $_GET['edit'];

if(isset($_POST['update_product'])){
   $product_name = $_POST['product_name'];
   $product_description = $_POST['product_description'];
   $product_price = $_POST['product_price'];
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
   $product_image_folder = '../../../uploaded_img/' . $product_image;

   // Construct the SQL query for updating the specified fields
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
   if (!empty($product_image)) {
      $update_data[] = "product_image = '$product_image'";
   }

   if (!empty($update_data)) {
      $update_query = "UPDATE product_details SET " . implode(', ', $update_data) . " WHERE product_id = '$id'";
      $upload = mysqli_query($conn, $update_query);

      if($upload){
         if (!empty($product_image)) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
         }
         $message[] = 'Product updated successfully!';
      } else {
         $message[] = 'Failed to update the product!';
      }
   } else {
      $message[] = 'No fields to update!';
   }
}
?>

<?php include 'header.php'; ?>

<?php
if(isset($message)){
   foreach($message as $msg){
      echo '<span class="message">'.$msg.'</span>';
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
         <h3 class="title">Update the product</h3>
         <input type="text" class="box" name="product_name" value="<?php echo $row['product_name']; ?>" placeholder="Enter the product name">
         <input type="text" class="box" name="product_description" value="<?php echo $row['product_description']; ?>" placeholder="Enter the product description">
         <input type="number" min="0" class="box" name="product_price" value="<?php echo $row['product_price']; ?>" placeholder="Enter the product price">
         <label for="product_image">Choose Product Image</label>
         <input type="file" class="box" name="product_image" accept="image/png, image/jpeg, image/jpg">
         <input type="submit" value="Update Product" name="update_product" class="btn">
         <a href="index.php" class="btn">Go back!</a>
      </form>
      <?php }; ?>
   </div>
</div>

<?php include 'footer.php'; ?>

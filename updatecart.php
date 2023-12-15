<?php
include 'config.php';

if (isset($_POST['product_id']) && isset($_POST['quantity'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    $user_id = $_SESSION['user_id'];

    $update_quantity_query = mysqli_query($conn, "UPDATE `cart_items` SET quantity = '$quantity' WHERE product_id = '$product_id' and user_id = '$user_id'");

    if ($update_quantity_query) {
        echo 'Quantity updated successfully';
    } else {
        echo 'Error updating quantity';
    }
} else {
    echo 'Invalid request';
}
?>

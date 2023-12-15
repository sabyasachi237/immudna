<?php
include_once '../../../config.php';
include_once 'header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

// if (isset($_GET['order_id']) && isset($_GET['user_id'])) {
    $orderId = $_GET['order_id'];
    $userId = $_GET['user_id'];

    echo $selectOrder = mysqli_query($conn, "SELECT orders.id, orders.user_id, orders.payment_id, 
        orders.invoice_number, orders.method, orders.payment_status, orders.created_at,
        shippingdetails.shipping_first_name, shippingdetails.shipping_last_name, shippingdetails.shipping_country,
        shippingdetails.shipping_address, shippingdetails.shipping_city, shippingdetails.shipping_state,
        shippingdetails.shipping_pin, shippingdetails.shipping_email, shippingdetails.shipping_phone,
        users.first_name AS user_first_name, users.last_name AS user_last_name, users.email_id AS user_email
        FROM orders
        JOIN shippingdetails ON orders.shipping_id = shippingdetails.id
        JOIN users ON orders.user_id = users.id
        WHERE orders.id = '$orderId' AND users.id = '$userId'");
?>


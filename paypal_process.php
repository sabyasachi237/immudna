<?php
include 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);



if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $country = $_POST['country'];
    $company_name = $_POST['company_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];
    $email = $_POST['email_id'];
    $phone = $_POST['phone'];

      $updateUserQuery = "UPDATE users 
        SET first_name = '".$first_name."', last_name = '".$last_name."', country = '".$country."', company_name = '".$company_name."', address = '".$address."', city = '".$city."', state = '".$state."', pin = '".$pin."', email_id = '".$email."', phone = '".$phone."'
        WHERE id = '".$user_id."'";

    mysqli_query($conn, $updateUserQuery);

    $orderID = mysqli_insert_id($conn);

    $shipping_last_name = $_POST['shipping_last_name'];
    $shipping_country = $_POST['shipping_country'];
    $shipping_address = $_POST['shipping_address'];
    $shipping_city = $_POST['shipping_city'];
    $shipping_first_name = $_POST['shipping_first_name'];
    $shipping_state = $_POST['shipping_state'];
    $shipping_pin = $_POST['shipping_pin'];
    $shipping_email = $_POST['shipping_email'];
    $shipping_phone = $_POST['shipping_phone'];
    $shipping_company_name = $_POST['shipping_company_name'];

     $insertShippingQuery = "INSERT INTO shippingdetails 
        (user_id, shipping_first_name, shipping_last_name, shipping_country, shipping_address, shipping_city, shipping_state, shipping_pin, shipping_email, shipping_phone, shipping_company_name)
        VALUES 
        ('".$user_id."', '".$shipping_first_name."', '".$shipping_last_name."', '".$shipping_country."', '".$shipping_address."', '".$shipping_city."', '".$shipping_state."', '".$shipping_pin."', '".$shipping_email."', '".$shipping_phone."', '".$shipping_company_name."')";

    mysqli_query($conn, $insertShippingQuery);

     $shippingID = mysqli_insert_id($conn);

    $method = $_POST['method'];
    $payment_id = $_POST['payment_id'];
    $payment_status = $_POST['payment_status'];
    $invoice_number = mt_rand(100000, 999999);
    $orderNotes = $_POST['orderNotes'];
    $created_at = date('Y-m-d H:i:s');
    $insertOrdersQuery = "INSERT INTO orders 
        (user_id, shipping_id, invoice_number, method, payment_status, payment_id, created_at) 
        VALUES 
        ('".$user_id."', '".$shippingID."', '".$invoice_number."', '".$method."', '".$payment_status."', '".$payment_id."', '".$created_at ."')";

    mysqli_query($conn, $insertOrdersQuery);

    $query_cartlist = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '".$user_id."'");

    while ($row = mysqli_fetch_assoc($query_cartlist)) {
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $created_at = date('Y-m-d H:i:s');


         $insertPurchaseQuery = "INSERT INTO purchase_details 
            (userid, orderid, product_id, quantity, created_at) 
            VALUES 
            ('".$user_id."', '".$shippingID."', '".$product_id."', '".$quantity."', '".$created_at."')";

        mysqli_query($conn, $insertPurchaseQuery);
    }

    $deleteCartItemQuery = "DELETE FROM cart_items WHERE user_id = '".$user_id."' ";
    mysqli_query($conn, $deleteCartItemQuery);
    // header('Location: thank_you_page.php');
    exit();
}
?>
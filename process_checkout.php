<?php
if (isset($_POST['order_btn'])) {
    include 'config.php';

    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $country = $_POST['country'];
    $companyName = $_POST['company_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postcode = $_POST['pin'];
    $email = $_POST['email_id'];
    $phone = $_POST['phone'];
    $orderNotes = $_POST['notes'];
    $method = $_POST['payment_mode'];
    $payment_id = $_POST['payment_id'];

    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        echo "User ID not found. Please log in and try again.";
        exit;
    }

    $insertOrderQuery = "INSERT INTO orders (user_id, first_name, last_name, country, company_name, address, city, state, pin, email_id, phone, notes, method, payment_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmtOrder = mysqli_prepare($conn, $insertOrderQuery);
    mysqli_stmt_bind_param($stmtOrder, 'isssssssssssss', $user_id, $firstName, $lastName, $country, $companyName, $address, $city, $state, $postcode, $email, $phone, $orderNotes, $method, $payment_id);
    mysqli_stmt_execute($stmtOrder);

    $orderID = mysqli_insert_id($conn);

    if (isset($_POST['ship-different-address'])) {
        $shippingFirstName = $_POST['shipping_first_name'];
        $shippingLastName = $_POST['shipping_last_name'];
        $shippingCountry = $_POST['shipping_country'];
        $shippingAddress = $_POST['shipping_address'];
        $shippingCity = $_POST['shipping_city'];
        $shippingState = $_POST['shipping_state'];
        $shippingPin = $_POST['shipping_pin'];
        $shippingEmail = $_POST['shipping_email'];
        $shippingPhone = $_POST['shipping_phone'];
        $shippingCompany = $_POST['shipping_compny_name'];

        $insertShippingQuery = "INSERT INTO shippingdetails (user_id, order_id, shipping_first_name, shipping_last_name, shipping_country, shipping_address, shipping_city, shipping_state, shipping_pin, shipping_email, shipping_phone, shipping_compny_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmtShipping = mysqli_prepare($conn, $insertShippingQuery);
        mysqli_stmt_bind_param($stmtShipping, 'iissssssssis', $user_id, $orderID, $shippingFirstName, $shippingLastName, $shippingCountry, $shippingAddress, $shippingCity, $shippingState, $shippingPin, $shippingEmail, $shippingPhone, $shippingCompany);
        mysqli_stmt_execute($stmtShipping);
    }

    $deleteQuery = "DELETE FROM cart_items WHERE user_id = ?";
    $stmtDelete = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmtDelete, 'i', $user_id);
    $success = mysqli_stmt_execute($stmtDelete);

    if ($success) {
        if ($method === 'COD') {
            session_destroy();
            header('Location: thank_you.php');
            exit;
        } else {
            
        }
    } else {
        echo "Failed to delete cart items. Please try again.";
    }
} else {
    header('Location: checkout.php');
    exit;
}
?>

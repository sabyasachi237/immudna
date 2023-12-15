<?php
include_once '../../../config.php';
include_once 'header.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);


// if (isset($_SESSION['user_id'])) {
//     $user_id = $_SESSION['user_id']; // Fetching user ID from session

    if (isset($_GET['order_id']) && isset($_GET['user_id'])) {
        $orderId = $_GET['order_id'];
        $userId = $_GET['user_id'];

        $selectOrder = mysqli_prepare($conn, "SELECT * 
        FROM purchase_details 
        JOIN product_details ON purchase_details.product_id = product_details.product_id 
        JOIN users ON purchase_details.userid = users.id
        WHERE purchase_details.orderid = ? AND purchase_details.userid = ?");

        mysqli_stmt_bind_param($selectOrder, "ii", $orderId, $userId);
        mysqli_stmt_execute($selectOrder);

        $result = mysqli_stmt_get_result($selectOrder);

        if ($row = mysqli_fetch_assoc($result)) {
            // Display the order details here
            ?>
<div class="order-details-container">
        <h3 class="text-center mb-4">Order Details</h3>

        <!-- Shipping Details -->
        <div class="shipping-details">
            <h4 class="mb-3">Shipping Details</h4>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="shippingFirstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="shippingFirstName" value="<?= $shippingDetails['shipping_first_name']; ?>" readonly>
                </div>
                <!-- Add other shipping details as needed -->
            </form>
        </div>

        <!-- Billing Details -->
        <div class="billing-details">
            <h4 class="mt-5 mb-3">Billing Details</h4>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" value="<?= $billingDetails['first_name']; ?>" readonly>
                </div>
                <!-- Add other billing details as needed -->
            </form>
        </div>

        <!-- Payment Details -->
        <div class="payment-details">
            <h4 class="mt-5 mb-3">Payment Details</h4>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="invoiceNumber" class="form-label">Invoice Number</label>
                    <input type="text" class="form-control" id="invoiceNumber" value="<?= $paymentDetails['invoice_number']; ?>" readonly>
                </div>
                <div class="col-md-6">
                    <label for="method" class="form-label">Method</label>
                    <input type="text" class="form-control" id="method" value="<?= $paymentDetails['method']; ?>" readonly>
                </div>
                <!-- Add other payment details as needed -->
            </form>
        </div>

        <!-- Back Button -->
        <div class="col-12 mt-4">
            <a href="javascript:history.back()" class="btn btn-primary">Back</a>
        </div>
    </div>
            <?php
        } else {
            echo "Order not found!";
        }

        mysqli_stmt_close($selectOrder);
//     } else {
//         echo "Invalid parameters!";
//     }
// } else {
//     // Redirect to login or handle unauthorized access
//     header("Location: login.php");
//     exit();
}

include 'footer.php';
?>

<?php
include_once '../../../config.php';
include_once 'header.php';

$selectOrders = mysqli_query($conn, "SELECT CONCAT(users.first_name, ' ', users.last_name) AS full_name, 
    purchase_details.orderid, 
    purchase_details.product_id, 
    purchase_details.quantity, 
    purchase_details.created_at, 
    product_details.product_name, 
    product_details.product_price,
    (purchase_details.quantity * product_details.product_price) AS total_price,
    purchase_details.userid AS user_id
    FROM purchase_details 
    JOIN product_details ON purchase_details.product_id = product_details.product_id 
    JOIN users ON purchase_details.userid = users.id");

?>

<div class="order-management-container">
    <h3 style="text-align: center;">Order Management</h3>

    <div class="order-display">
        <h3 style="text-align: center;">Order List</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User Name</th>
                    <th>Order ID</th>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($orderRow = mysqli_fetch_assoc($selectOrders)) : ?>
                    <tr>
                        <td><?= $orderRow['full_name']; ?></td>
                        <td><?= $orderRow['orderid']; ?></td>
                        <td><?= $orderRow['product_name']; ?></td>
                        <td><?= $orderRow['product_price']; ?></td>
                        <td><?= $orderRow['quantity']; ?></td>
                        <td><?= $orderRow['total_price']; ?></td>
                        <td><?= $orderRow['created_at']; ?></td>
                        <td>
                            <a href="order-view.php?order_id=<?= $orderRow['orderid']; ?>&user_id=<?= $orderRow['user_id']; ?>" class="btn btn-info">
                                View All
                            </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
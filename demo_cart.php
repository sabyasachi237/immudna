<?php
include 'config.php';
include 'header.php';

if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header('Location: login.php'); // Replace 'login.php' with the actual login page URL
    exit;
}

$user_id = $_SESSION['user_id'];

// Retrieve cart items
$select_cart = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id='$user_id'");

if (mysqli_num_rows($select_cart) > 0) {
    // Cart has products
    $cartResult = mysqli_fetch_all($select_cart, MYSQLI_ASSOC);
    $grandTotal = 0;
?>

    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form>
                    <div data-aos="fade-up" data-aos-duration="1200" class="cart-wraps">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Total</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    foreach ($cartResult as $row) {
                                        $product_id = $row['product_id'];
                                        $product_name = $row['product_name'];
                                        $product_image = $row['product_image'];
                                        $product_price = $row['product_price'];
                                        $quantity = $row['quantity'];
                                        $subtotal = $product_price * $quantity;
                                        $grandTotal += $subtotal;
                                    ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="uploaded_img/<?php echo $product_image; ?>" alt="Image">
                                                </a>
                                            </td>
                                            <td class="product-name">
                                                <a href="#"><?php echo $product_name; ?></a>
                                            </td>
                                            <td class="product-price">
                                                <span class="unit-amount">$<?php echo $product_price; ?></span>
                                            </td>
                                            <td class "product-quantity">
                                                <div class="input-counter">
                                                    <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                                    <input type="text" value="<?php echo $quantity; ?>">
                                                    <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                <span class="subtotal-amount">$<?php echo $subtotal; ?></span>
                                            </td>
                                            <td>
                                                <a href="cart.php?remove=<?php echo $product_id; ?>" onclick="return confirm('Are you sure you want to remove this product?');">
                                                    <i class="bx bx-x-circle"></i> Remove
                                                </a>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr class="table-bottom">
                                        <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
                                        <td colspan="3">Grand Total</td>
                                        <td><span class="subtotal-amount">$<?php echo number_format($grandTotal, 2); ?></span></td>
                                        <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All </a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php
} else {
    // Cart is empty
    echo '<div class="container">';
    echo '<div class="row">';
    echo '<div class="col-lg-12 col-md-12">';
    echo '<h1>Your cart is empty</h1>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
}

include 'footer.php';
?>

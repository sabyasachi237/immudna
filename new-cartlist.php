<?php
include 'config.php';
include 'header.php';

// No need to check for user authentication in this case

// Fetch cart items
$select_cart = mysqli_query($conn, "SELECT * FROM `cart_items`");

if (mysqli_num_rows($select_cart) > 0) {
    echo '<h1>Products in your cart</h1>';
} else {
    echo '<h1>Your cart is empty</h1>';
}
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
                                </tr>
                            </thead>

                            <tbody>
                                <?php while ($row = mysqli_fetch_assoc($select_cart)) { ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#">
                                                <img src="uploaded_img/<?php echo $row['product_image']; ?>" alt="Image">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="#"><?php echo $row['product_name']; ?></a>
                                        </td>
                                        <td class "product-price">
                                            <span class="unit-amount">$<?php echo $row['product_price']; ?></span>
                                        </td>
                                        <td class="product-quantity">
                                            <div class="input-counter">
                                                <span class="minus-btn"><i class='bx bx-minus'></i></span>
                                                <input type="text" value="<?php echo $row['quantity']; ?>">
                                                <span class="plus-btn"><i class='bx bx-plus'></i></span>
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">$<?php echo $row['product_price'] * $row['quantity']; ?></span>
                                            <a href="cart.php?remove=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure you want to remove this product?');" class="remove">
                                                <i class="bx bx-x-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <tr class="table-bottom">
                                    <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
                                    <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all items in your cart?');" class="delete-btn"> <i class="fas fa-trash"></i> Delete All </a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>

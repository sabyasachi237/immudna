<?php
include 'config.php';

$url = $_SERVER['REQUEST_URI'];

if (strpos($url, 'product_id') !== false) {
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $product_id = $params['product_id'];
    if ($product_id) {
        $user_id = $_SESSION['user_id'];
        $quantity = 1;
        $grandTotal = 0;

        $select_cart = mysqli_query($conn, "SELECT * FROM `cart_items` WHERE product_id = '$product_id' and user_id='$user_id'");

        if (mysqli_num_rows($select_cart) > 0) {
            $update_value = 3;
            $update_quantity_query = mysqli_query($conn, "UPDATE `cart_items` SET quantity = '$update_value' WHERE product_id = '$product_id' and user_id='$user_id'");
            if ($update_quantity_query) {
                header('location:cartlist.php');
            };
        } else {
            $insertQuery = "INSERT INTO cart_items (user_id, product_id, quantity, created_at) VALUES (?, ?, ?, NOW())";
            $stmt = mysqli_prepare($conn, $insertQuery);
            mysqli_stmt_bind_param($stmt, 'iii', $user_id, $product_id, $quantity);
            $success = mysqli_stmt_execute($stmt);
            if ($success) {
                $cartQuery = "SELECT ci.*, p.product_name, p.product_price, p.product_image FROM cart_items ci
                    JOIN product_details p ON ci.product_id = p.product_id
                    WHERE ci.user_id = ?";

                $stmt = mysqli_prepare($conn, $cartQuery);
                mysqli_stmt_bind_param($stmt, 'i', $user_id);
                mysqli_stmt_execute($stmt);
                $cartResult = mysqli_stmt_get_result($stmt);
                echo 'success message - product added to cart succesfully';
            }
        }
    }
} elseif (strpos($url, 'remove') !== false) {
    $url_components = parse_url($url);
    parse_str($url_components['query'], $params);
    $remove_id = $params['remove'];
    $user_id = $_SESSION['user_id'];
    echo $remove_id;
    $success = mysqli_query($conn, "DELETE FROM `cart_items` WHERE product_id = '$remove_id' and user_id=$user_id");
    if ($success) {
        header('location:cart.php', $remove_id);
    }
} elseif (strpos($url, 'delete_all') !== false) {
    $user_id = $_SESSION['user_id'];
    $deleteQuery = "DELETE FROM `cart_items` where user_id=?";
    $stmt = mysqli_prepare($conn, $deleteQuery);
    mysqli_stmt_bind_param($stmt, 'i', $user_id);
    $success = mysqli_stmt_execute($stmt);
    if ($success) {
        header('location:shop-list.php');
    }
}






?>




<?php include('header.php'); ?>

<!-- START CART AREA -->
<section class="cart-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <form>
                    <div class="cart-wraps">
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
                                    <?php while ($row = mysqli_fetch_assoc($cartResult)) { ?>
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="#">
                                                    <img src="uploaded_img/<?php echo $row['product_image']; ?>" alt="Image">
                                                </a>
                                            </td>

                                            <td class="product-name">
                                                <a href="#"><?php echo $row['product_name']; ?></a>
                                            </td>

                                            <td class="product-price">
                                                <span class="unit-amount">$<?php echo $row['product_price']; ?></span>
                                            </td>

                                            <td class="product-quantity">
                                                <div class="input-counter">
                                                    <span class="minus-btn">
                                                        <i class='bx bx-minus' data-product-id="<?php echo $row['product_id']; ?>"></i>
                                                    </span>
                                                    <input type="text" value="<?php echo $row['quantity']; ?>">
                                                    <span class="plus-btn">
                                                        <i class='bx bx-plus' data-product-id="<?php echo $row['product_id']; ?>"></i>
                                                    </span>
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="subtotal-amount">$<?php echo $row['product_price'] * $row['quantity']; ?></span>
                                                <a href="cart.php?remove=<?php echo $row['product_id']; ?>" onclick="return confirm('Are you sure you want to remove this product?');">
                                                    <i class="bx bx-x-circle"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-buttons">
                            <div class="row align-items-center">
                                <div class="col-lg-7 col-sm-7 col-md-7">
                                    <a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all items from your cart?');" class="default-btn page-btn">
                                        Delete All
                                    </a>
                                </div>

                                <div class="col-lg-5 col-sm-5 col-md-5 text-right">
                                    <a href="#" class="default-btn page-btn">
                                        Update Cart
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="cart-totals">
                            <h3>Cart Totals</h3>
                            <ul>
                                <li>Subtotal <span>$<?php echo number_format($totalAmount, 2); ?></span></li>
                                <!-- You can add additional lines for shipping, tax, or discounts if needed -->
                                <li>Total <span><b>$<?php echo number_format($totalAmount, 2); ?></b></span></li>
                            </ul>
                            <a href="checkout.php" class="default-btn page-btn">
                                Proceed to Checkout
                            </a>
                        </div>

                </form>
            </div>
        </div>
    </div>
</section>
<!-- END CART AREA -->
<?php include('footer.php'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function () {
    $(".plus-btn, .minus-btn").on("click", function () {
        var productId = $(this).data("product-id");
        var quantity = parseInt($(this).closest("tr").find("input").val());

        if ($(this).hasClass("plus-btn")) {
            quantity += 1;
        } else if ($(this).hasClass("minus-btn") && quantity > 1) {
            quantity -= 1;
        }

        updateCartItemQuantity(productId, quantity);
    });

    function updateCartItemQuantity(productId, quantity) {
        $.ajax({
            url: "update_cart.php", // Replace with the actual URL of your update script
            method: "POST",
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                // Handle the response if needed
                location.reload(); // Reload the page to reflect the updated cart
            }
        });
    }
});
</script>

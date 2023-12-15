<?php
// Start or resume a session
include 'config.php';


$query = "SELECT * FROM product_details";
$result = mysqli_query($conn, $query);

 include('header.php');

// if (isset($_GET['product_id'])) {
//     // Get the product ID from the URL
//     $product_id = $_GET['product_id'];

//     // Initialize the cart session variable if it doesn't exist
//     if (!isset($_SESSION['cart_prodid'])) {
//         $_SESSION['cart_prodid'] = array();
//     }

//     // Add the product ID to the cart array
//     $_SESSION['cart_prodid'][] = $product_id;

// }
?>

<div class="container">
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <div class="product-list col-lg-12">
                <div class="single-shop row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <a href="shop-details.php">
                            <div class="shop-img">
                                <div class="shop-img-1">
                                    <img src="uploaded_img/<?php echo $row['product_image']; ?>" alt="Image">
                                    <div class="shop-img-2">
                                        <img src="uploaded_img/<?php echo $row['product_image']; ?>" alt="Image">
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12">
                        <div class="shop-content">
                            <span class="title"><?php echo $row['product_description']; ?></span>
                            <h3><?php echo $row['product_name']; ?></h3>
                            <span class="price">$<?php echo $row['product_price']; ?></span>
                        </div>

                        <div class="purchase-bar">
                            <ul>
                                <li>
                                    <a href="#">
                                        <i class="bx bx-search-alt"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bx bx-heart"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bx bx-loader"></i>
                                    </a>
                                </li>
                            </ul>
                            <a href="cart.php?product_id=<?php echo $row['product_id']; ?>" class="default-btn">Add To Cart</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>

</body>
</html>

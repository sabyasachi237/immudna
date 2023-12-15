<?php
include_once '../../../config.php';


if (!isset($_SESSION['admin'])) {
    header('Location: signup.php');
    exit();
}

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = '../../../uploaded_img/' . $product_image;

    if (empty($product_name) || empty($product_price) || empty($product_image)) {
        $message[] = 'please fill out all';
    } else {
        $insert = "INSERT INTO product_details(product_name, product_description, product_price, product_image) VALUES('$product_name','$product_description', '$product_price', '$product_image')";
        $upload = mysqli_query($conn, $insert);

        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'new product added successfully';
        } else {
            $message[] = 'could not add the product';
        }
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM product_details WHERE product_id = $id");
    header('location:index.php');
}

$select = mysqli_query($conn, "SELECT * FROM product_details");
?>

<?php include 'header.php'; ?>

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-lg-12">
                <div class="container">
                    <div class="admin-product-form-container">
                        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                            <h3 style="text-align: center;">Add a New Product</h3>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Product Name" name="product_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Product Description" name="product_description" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="number" placeholder="Enter Product Price" name="product_price" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="product_image">Choose Product Image</label>
                                <input type="file" accept="image/png, image/jpeg, image/jpg" name="product_image" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_product" value="Add Product">
                            </div>
                        </form>
                    </div>

                    <div class="product-display">
                        <h3 style="text-align: center;">Product List</h3>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <?php while ($row = mysqli_fetch_assoc($select)) : ?>
                                <tr>
                                    <td><img src="../../../uploaded_img/<?= $row['product_image']; ?>" height="100" alt="Product Image"></td>
                                    <td><?= $row['product_name']; ?></td>
                                    <td><?= $row['product_description']; ?></td>
                                    <td>$<?= $row['product_price']; ?>/-</td>
                                    <td>
                                        <a href="admin_update.php?edit=<?= $row['product_id']; ?>" class="btn btn-secondary">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="index.php?delete=<?= $row['product_id']; ?>" class="btn btn-danger">
                                            <i class="fas fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
</body>

<?php
include 'config.php';


$product_id = $_GET['product_id'];
 if(!empty($_SESSION['user_id']))
{		
	$res_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT product_price,product_id FROM product_details WHERE product_id = '".$product_id."'"));
	$price = $res_product['product_price'];
	
	$query_sel_search = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '".$_SESSION['user_id']."' AND product_id = '".$res_product['product_id']."'");
	$findCnt = mysqli_num_rows($query_sel_search);
	$res_seldata = mysqli_fetch_assoc($query_sel_search);
	if($findCnt > 0)
	{		
		$prices = $res_seldata['price']+$res_product['price'];
		$quantity = $res_seldata['quantity']+1;
		$query_update_data = mysqli_query($conn, "UPDATE cart_items SET quantity = '".$quantity."'  WHERE user_id = '".$_SESSION['user_id']."' AND product_id = '".$res_product['product_id']."'");
	}
	else
	{
		$create_date = date("Y-m-d");
		$quantity = 1;
		$query_ins_data = mysqli_query($conn, "INSERT INTO cart_items SET user_id = '$_SESSION[user_id]', product_id = '".$res_product['product_id']."', quantity = '".$quantity."', created_at = '".$create_date."'");
	}
	header("location:cartlist.php");
	exit();
}
else
{
	if(isset($_SESSION['cart_prodid']) && !empty($_SESSION['cart_prodid']))
	{
		$product_id = $_SESSION['cart_prodid'];
		$cartitems = explode(",", $product_id);
		$product_id .= "," . $_GET['product_id'];
	    $_SESSION['cart_prodid'] = $product_id;
	
		header("location:cartlist.php");
		exit();
	}
	else
	{
		$_SESSION['cart_prodid'] = $product_id;
		
		header("location:cartlist.php");
		exit();
	}
}

    // If you want to remove a product from the cart, you can unset it from the session
    if (strpos($url, 'remove') !== false) {
        $url_components = parse_url($url);
        parse_str($url_components['query'], $params);
        $remove_id = $params['remove'];

        if (array_key_exists($remove_id, $_SESSION['cart'])) {
            unset($_SESSION['cart'][$remove_id]);
        }
    }
if (isset($_GET['remove'])) {
    $remove_id = $_GET['remove'];
    if (!empty($_SESSION['user_id'])) {
        // If the user is logged in, remove the product from the database and cart_items table
        $user_id = $_SESSION['user_id'];
        $success = mysqli_query($conn, "DELETE FROM cart_items WHERE product_id = '$remove_id' AND user_id = $user_id");
        if ($success) {
            header('location:cartlist.php');
            exit();
        }
    } else {
        // Handle removing a product when the user is not logged in (using session data)
        if (isset($_SESSION['cart_prodid']) && !empty($_SESSION['cart_prodid'])) {
            $product_id = $_SESSION['cart_prodid'];
            $cartitems = explode(",", $product_id);
            if (($key = array_search($remove_id, $cartitems)) !== false) {
                unset($cartitems[$key]);
                $product_id = implode(",", $cartitems);
                $_SESSION['cart_prodid'] = $product_id;
                header("location:cartlist.php");
                exit();
            }
        }
    }
}

// 




?>

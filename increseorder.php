<?php
include("config.php");

$plus_minus = $_GET['plus_minus'];
$p_id = $_GET['p_id'];

if(!empty($_SESSION['cart_prodid']))
{
	if($plus_minus == 'plus')
	{
		$product_id = $_SESSION['cart_prodid'];
		$cartitems = explode(",", $product_id);
		$product_id .= "," . $_GET['p_id'];
		$_SESSION['cart_prodid'] = $product_id;
		
		$items = $_SESSION['cart_prodid'];
		$cartitems = explode(",", $items);
		$numofprodmod_added = array_count_values($cartitems);
		$cnt_pro = count($cartitems);
		$total_price = '';
		foreach ($numofprodmod_added as $key => $prod_id) {
			$res_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = '".$key."'"));
			$price = $res_product['product_price'] * $numofprodmod_added[$key];
			$total_price = (float)$total_price + (float)$price;
		}
		echo number_format((float)$total_price, 2, '.', '') . "||" . $cnt_pro;
	}
	if($plus_minus == 'minus')
	{
		$cartsession = explode(",", $_SESSION['cart_prodid']);
		$prodid = array($_GET['p_id']);
		$match_value = array_intersect($cartsession, $prodid);
		$cnt = count($match_value);
		$array = '';
		for ($i = 1; $i <= $cnt - 1; $i++)
		{
			$array = $array . $_GET['p_id'] . ",";
		}
		$trim_val = rtrim($array, ',');
		$exp_val = explode(',', $trim_val);
		$notmatch_value = array_diff($cartsession, $prodid);
		$marge_val = array_merge($exp_val, $notmatch_value);
		$final_val = implode(',', $marge_val);
		unset($_SESSION['cart_prodid']);
		$_SESSION['cart_prodid'] = $final_val;
		
		$items = $_SESSION['cart_prodid'];
		$cartitems = explode(",", $items);
		$numofprodmod_added = array_count_values($cartitems);
		$cnt_pro = count($cartitems);
		$total_price = '';
		foreach ($numofprodmod_added as $key => $prod_id) {
			$res_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = '".$key."'"));
			$price = $res_product['product_price'] * (int)$numofprodmod_added[$key];
			$total_price = (float)$total_price + (float)$price;
		}
		echo number_format((float)$total_price, 2, '.', '') . "||" . $cnt_pro;
	}
}
else if(!empty($_SESSION['user_id']))
{
	$res_product = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM product_details WHERE product_id = '".$p_id."' "));
	$res_add_cart = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM cart_items WHERE product_id = '".$p_id."' AND user_id = '".$_SESSION['user_id']."'"));
	
	if($plus_minus == 'plus')
	{	
		$qty = $res_add_cart['quantity'] + 1;
		$tot_price = $res_product['product_price'] * $qty;
		$query_update_data = mysqli_query($conn, "UPDATE cart_items SET quantity = '".$qty."', product_price = '".$tot_price."' WHERE user_id = '".$_SESSION['user_id']."' AND product_id = '".$p_id."'");
		$total_price = '';
		$cnt_pro = '';
		$query_add_cart = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '".$_SESSION['user_id']."'");
		while($res_add = mysqli_fetch_assoc($query_add_cart))
		{
			$total_price = $total_price + $res_add['product_price'];
			$cnt_pro = $cnt_pro + $res_add['quantity'];
		}
		echo number_format((float)$total_price, 2, '.', '') . "||" . $cnt_pro;
	}
	if($plus_minus == 'minus')
	{
		$qty = $res_add_cart['quantity'] - 1;
		$tot_price = $res_product['product_price'] * $qty;
		$query_update_data = mysqli_query($conn, "UPDATE cart_items SET quantity = '".$qty."', product_price = '".$tot_price."' WHERE user_id = '".$_SESSION['user_id']."' AND product_id = '".$p_id."'");
		$total_price = '';
		$cnt_pro = '';
		$query_add_cart = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '".$_SESSION['user_id']."'");
		while($res_add = mysqli_fetch_assoc($query_add_cart))
		{
			$total_price = $total_price + $res_add['product_price'];
			$cnt_pro = $cnt_pro + $res_add['quantity'];
		}
		echo number_format((float)$total_price, 2, '.', '') . "||" . $cnt_pro;
	}
}
?>

<?php
include("config.php");
$product_id = $_GET['product_id'];
if(!empty($_SESSION['user_id']))
{ 
	$query_add_cart = mysqli_query($conn, "SELECT * FROM cart_items WHERE user_id = '".$_SESSION['user_id']."'");
	if(mysqli_num_rows($query_add_cart)>0)
	{
		mysqli_query($conn, "DELETE FROM cart_items WHERE product_id='".$product_id."' ");
		header("location:cartlist.php");
	}
	else
	{
		header("location:index.php");
	}
}
else if(!empty($_SESSION['cart_prodid']))
{
	
	$items = $_SESSION['cart_prodid'];
	$cartitems = explode(",", $items);
	foreach($cartitems as $key=> $prod_id)
	{
		if($prod_id == $_GET['product_id']){
			unset($cartitems[$key]);
			$itemids = implode(",", $cartitems);
			$_SESSION['cart_prodid'] = $itemids;
		}
	}
	if(!empty($_SESSION['cart_prodid']))
	{
		header('location:cartlist.php');
	}
	else
	{
		header('location:index.php');
	}
	
}
?>
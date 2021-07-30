<?php
ob_start();
session_start();
include "../app/packages/shopping-cart/cart_item.class.php";
include "../app/packages/shopping-cart/shopping_cart.class.php";
include "../_CORE/index.php";
include "../app/config/config.php";
$db    =  new  lg_mysql($host, $dbuser, $dbpass, $csdl);
include("../app/start/func.php");
$id = $_GET['id'];
$so_luong = $_GET['so_luong'];
$cart = ShoppingCart::getInstance();
$cart->updateQuantity($id, $so_luong);
ShoppingCart::updateInstance($cart);
exit();

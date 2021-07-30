<?php
ob_start();
session_start();
include "../app/packages/shopping-cart/cart_item.class.php";
include "../app/packages/shopping-cart/shopping_cart.class.php";
include "../_CORE/index.php";
include "../app/config/config.php";
$db  =  new  lg_mysql($host, $dbuser, $dbpass, $csdl);
include("../app/start/func.php");
isset($_POST['langCode']) ? $langCode = $_POST['langCode'] : $langCode = 0;
isset($_POST['id']) ? $id = $_POST['id'] + 0 : $id = 0;
isset($_POST['soLuong']) ? $soLuong = $_POST['soLuong'] : $soLuong = 0;
isset($_POST['size']) ? $size = $_POST['size'] : $size = -1;
isset($_POST['color']) ? $color = $_POST['color'] : $color = -1;
if (!$id) {
  return;
}
$q = $db->selectjoin(
  "post",
  "post_lang",
  "post.id=post_lang.post_id",
  " post.hien_thi=1 and post_lang.post_id='" . $id . "' and post_lang.lang_id='" . $langCode . "' ",
  ""
);
if ($r = $db->fetch($q)) {
  $hinhAnh = get_single_image($r['post_id'], "post", "avatar");
  $cart = ShoppingCart::getInstance();
  $price = 0;
  if ($r['new_price'] != '' || $r['new_price'] != 0) {
    $price = $r['new_price'];
  }
  // Get size name
  $sizeResult = '';
  if ($size != -1) {
    $qSize = $db->selectjoin(
      "post",
      "post_lang",
      "post.id=post_lang.post_id",
      " post.hien_thi=1 and post_lang.post_id='" . $size . "' and post_lang.lang_id='" . $langCode . "' ",
      ""
    );
    if ($db->num_rows($qSize) != 0) {
      $rSize = $db->fetch($qSize);
      $sizeResult = $rSize['chu_thich'];
    }
  }
  $colorResult = '';
  if ($color != -1) {
    $qColor = $db->selectjoin(
      "post",
      "post_lang",
      "post.id=post_lang.post_id",
      " post.hien_thi=1 and post_lang.post_id='" . $color . "' and post_lang.lang_id='" . $langCode . "' ",
      ""
    );
    if ($db->num_rows($qColor) != 0) {
      $rColor = $db->fetch($qColor);
      $colorResult = $rColor['chu_thich'];
    }
  }


  $item = new CartItem($r['post_id'].$sizeResult, $r['ten'], $hinhAnh, "", $r['chu_thich'], $price, 1, $r['slug'], $sizeResult, $colorResult);
  $cart->addItem($item);
  ShoppingCart::updateInstance($cart);
  $cart->updateQuantity($r['post_id'].$sizeResult, $soLuong);
  ShoppingCart::updateInstance($cart);
  echo $cart->countItems() . "$$$$" . numberFormatVN($cart->getTotal());
}

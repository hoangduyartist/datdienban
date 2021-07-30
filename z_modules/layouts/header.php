<?php
include "app/packages/shopping-cart/cart_item.class.php";
include "app/packages/shopping-cart/shopping_cart.class.php";
$cart = ShoppingCart::getInstance();
$total = $cart->getTotal();
$_SESSION["total"] = $cart->getTotal();
$so_luong = $cart->countItems();
$_SESSION["so_luong7"] = $cart->countItems();
?>
<section class="menu-wrapper">
  <div class="container">
    <div class="menu-home-pond">
      <div class="menu-home">
        <?php echo show_menu(1, false, "") ?>
      </div>
      <h1 class="header-logo">
        <?php echo get_bien("title") ?>
        <a href="<?php echo $root ?>"><?php echo get_single_image(1, "gallery", "gallery", "html") ?></a>
      </h1>
      <div class="menu-home">
        <?php echo show_menu(2, false, "home-right-menu") ?>
      </div>
    </div>
  </div>
  <div class="header-nav-items">
    <button class="menu-display" type="button">Menu</button>
  </div>
  <div class="cart-mobile">
    <a href="<?php echo $root ?>/<?php echo get_page_lang(8, 'slug') ?>">
      <span class="icon icon-cart"></span>
      <span class="cart-mobile-total" id="totalAmount"><?php echo ($_SESSION["total"]) ? $_SESSION["so_luong7"] : '0'; ?></span>
    </a>
  </div>
</section>

<div class="fix-menu">
  <div class="container">
    <!-- <div class="header-nav-items">
      <button class="menu-display" type="button">Menu</button>
    </div> -->
    <div class="nav-main">
      <span class="nav-close"><i class="fa fa-times" aria-hidden="true"></i></span>
      <a class="logo-mobile" href="<?php echo $root ?>">
        <?php echo get_single_image(1, "gallery", "gallery", "html") ?>
      </a>
      <div class="menu-mobile">
        <?php echo show_menu(1, false, "") ?>
        <?php echo show_menu(2, false, "") ?>
      </div>
      <?php echo get_languages('code', $lang_code, "mobile-lang") ?>
    </div>
    <div class="translucent-layer"></div>
  </div>
</div>
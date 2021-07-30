<?php
$titlePage = get_page_lang(8, 'ten');
$UrlOrder = $root . "/" . get_page_lang(11, 'slug');
?>
<div class="container pt40 pb10">
  <h1 class="title-page-list"><?php echo $titlePage ?></h1>
  <div class="page page-cart">
    <?php
    $cart = ShoppingCart::getInstance();
    if (isset($_POST['update'])) {
      foreach ($cart->getItems() as $item) {
        $id = $item->getId();
        $qty = $_POST['qty_' . $id] + 0;
        $cart->updateQuantity($id, $qty);
      }
      ShoppingCart::updateInstance($cart);
      admin_load("Updating cart", $root, 1);
      exit();
    } elseif (isset($_POST['delete'])) {
      isset($_POST['tik']) ? $tik = $_POST['tik'] : $tik = [];
      for ($i = 0; $i < count($tik); $i++) {
        $id = $tik[$i];
        $cart->deleteItem($id);
      }
      ShoppingCart::updateInstance($cart);
      // admin_load("Removing product", $root, 1);
      // exit();
    }
    if (!$cart->countItems()) {
      admin_load($translate_cart["Giỏ hàng rỗng"][$lang_code], $root, 1);
    } else { ?>
      <h2><?php echo $translate_cart['Giỏ hàng của bạn'][$lang_code] ?> (<?php echo $cart->countItems() ?> <?php echo $translate_cart['Sản phẩm'][$lang_code] ?>)</h2>
      <form action="" method="post" id="cart" onSubmit="if(!confirm('Click OK to continue?')){return false;}">
        <div class="table-responsive">
          <table id="cart" class="table table-hover table-bordered table-cart">
            <thead>
              <tr>
                <th style="width:35%" colspan="2"><?php echo $translate_cart['Tên sản phẩm'][$lang_code] ?></th>
                <th style="width:10%"><?php echo $translate_cart['Giá'][$lang_code] ?></th>
                <th style="width:8%"><?php echo $translate_cart['Số lượng'][$lang_code] ?></th>
                <th style="width:12%" class="text-center"><?php echo $translate_cart['Thành tiền'][$lang_code] ?></th>
                <th style="width:2%" class="text-center"><?php echo $translate_cart['Xóa'][$lang_code] ?></th>
              </tr>
            </thead>
            <tbody>
              <?php
              $totalAmount = 0;
              foreach ($cart->getItems() as $item) {
                $id      = $item->getId();
                $name    = $item->getName();
                $hinh    = $item->getHinh();
                $code     = $item->getCode();
                $desc    = $item->getDesc();
                $price    = $item->getPrice();
                $quantity  = $item->getQuantity();
                $itemAmount  = $price * $quantity;
                $slug      = $item->getSlug();
                $size      = $item->getSize();
                $color      = $item->getColor();
                $totalAmount += $itemAmount;
                $readonly = "";
                if ($price == 0) {
                  $readonly = "readonly";
                }
              ?>
                <tr class="cartlist<?php echo $id ?>">
                  <td colspan="2">
                    <div class="car-product">
                      <div class="car-product-column">
                        <div class="img car-product-column-item">
                          <span><?php echo $hinh ?></span>
                        </div>
                        <div class="caption car-product-column-item">
                          <h4>
                            <a href="<?php echo $root ?>/<?php echo $slug ?>" target="_blank"><?php echo $name ?></a>
                          </h4>
                          <?php if ($size || $color) { ?>
                            <ul class="cart-libry">
                              <?php if ($size) { ?><li>Size: <span><?php echo $size ?></span></li><?php } ?>
                              <?php if ($color) { ?><li class="color">Colour: <span style="background-color: <?php echo $color ?>"></span></li><?php } ?>
                            </ul>
                          <?php } ?>
                        </div>
                      </div>
                      <?php if ($desc != '') { ?><p class="summary"><?php echo lg_string::crop($desc, 14) ?></p><?php } ?>
                    </div>
                  </td>
                  <td class="cart_price">
                    <?php
                    if ($price == 0) {
                      echo "Call";
                    } else {
                    ?>
                      <?php echo numberFormatVN($price) ?> <sup><?php echo $translate_cart['đ'][$lang_code] ?>/<?php echo $translate_cart['sp'][$lang_code] ?></sup>
                    <?php } ?>
                  </td>
                  <td>
                    <?php if ($readonly == "") { ?>
                      <input type="number" <?php echo $readonly ?> min="1" name="qty_<?php echo $id ?>" class="text-center input-number" value="<?php echo $quantity; ?>" onchange="getprice(<?php echo $price ?>,'<?php echo $id ?>')" onkeyup="getprice(<?php echo $price ?>,'<?php echo $id ?>')" id="quatity<?php echo $id ?>" />
                    <?php } ?>
                  </td>

                  <td class="cart_price text-center">
                    <?php
                    if ($price == 0) {
                      echo "Call";
                    } else {
                    ?>
                      <input class="input-price" id="tong<?php echo $id ?>" readonly type="text" value="<?php echo numberFormatVN($itemAmount) ?>" /><sup><?php echo $translate_cart['đ'][$lang_code] ?></sup>
                    <?php } ?>
                  </td>

                  <td class="actions text-center">
                    <div class="custom-checkbox">
                      <input type="checkbox" name="tik[]" value="<?php echo $id ?>" id="<?php echo $id ?>" />
                      <label for="<?php echo $id ?>"></label>
                    </div>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
            <tfoot>
              <tr style="text-align: center">
                <td colspan="2">-</td>
                <td>-</td>
                <td>-
                  <!-- <button name="update" type="submit" class="btn btn-info btn-sm" title="Cập nhật giỏ hàng"><i class="fa fa-pencil-square"></i></button> -->
                </td>
                <td>-</td>
                <td><button name="delete" type="submit" class="btn btn-danger btn-sm deleter" title="Xóa sản phẩm"><i class="fa fa-trash-o" aria-hidden="true"></i></button></td>
              </tr>
              <tr style="text-align: center">
                <td colspan="2">-</td>
                <td colspan="4" class="text-center tottal_text">
                  <?php echo $translate_cart['Tổng tiền'][$lang_code] ?>:
                  <input class="input-total" id="tongfix" value="<?php echo numberFormatVN($totalAmount) ?>" readonly="" />
                  <sup><?php echo $translate_cart['đ'][$lang_code] ?></sup>
                </td>
              </tr>
            </tfoot>
          </table>
        </div>
        <div class="cart-checkout">
          <div class="cart-checkout-item cart-checkout-left">
            <a href="<?php echo $root ?>" class="btn cart-continue"><i class="fa fa-caret-left" aria-hidden="true"></i> <?php echo $translate_cart['Tiếp tục mua hàng'][$lang_code] ?></a>
          </div>
          <div class="cart-checkout-item cart-checkout-right">
            <a href="<?php echo $UrlOrder ?>" class="btn cart-order"><?php echo $translate_cart['Đặt hàng'][$lang_code] ?> <i class="fa fa-caret-right"></i></a>
          </div>
        </div>
      </form>
    <?php } ?>
  </div>
</div>
<?php
$titleOrder = get_page_lang(11, 'ten');
$urlOrder = get_page_lang(11, 'slug');
$urlCart = get_page_lang(8, 'slug');
include "cart/sendEmailCart.php";
isset($_POST['txtName']) ? $txtName = $_POST['txtName'] : $txtName = "";
isset($_POST['txtEmail']) ? $txtEmail = $_POST['txtEmail'] : $txtEmail = "";
isset($_POST['txtTel']) ? $txtTel = $_POST['txtTel'] : $txtTel = "";
isset($_POST['txtAddress']) ? $txtAddress = $_POST['txtAddress'] : $txtAddress = "";
isset($_POST['txtContent']) ? $txtContent = $_POST['txtContent'] : $txtContent = "";
isset($_POST['txtCongty']) ? $txtCongty = $_POST['txtCongty'] : $txtCongty = "";
isset($_POST['payment']) ? $payment = $_POST['payment'] : $payment = "";
isset($_POST['func']) ? $func = $_POST['func'] : $func = "";
$cart = ShoppingCart::getInstance();
if (!$cart->countItems()) {
  admin_load($translate_cart["Giỏ hàng rỗng"][$lang_code], $root, 1);
}
if ($func == 'checkout') {
  $thongbao = '';
  $hasError = false;
  if (!preg_match("/^(84|0)(1\d{9}|9\d{8})$/", $txtTel)) {
    $hasError = true;
    $thongbao = 'Số điện thoại không đúng';
  } elseif ($txtName == '') {
    $hasError = true;
    $thongbao = 'Bạn chưa nhập tên';
  }
  if (!$hasError) {
    $cartContent = '<table>' .
      '<tr>' .
      '<th style="padding:10px;border: 1px solid #ccc">Tên</th>' .
      '<th style="padding:10px;border: 1px solid #ccc">Giá</th>' .
      '<th style="padding:10px;border: 1px solid #ccc">Số lượng</th>' .
      '<th style="padding:10px;border: 1px solid #ccc">Tổng cộng</th>' .
      '</tr>';
    $totalAmount = 0;
    foreach ($cart->getItems() as $item) {
      $id      = $item->getId();
      $name    = $item->getName();
      $hinh    = $item->getHinh();
      $code    = $item->getCode();
      $desc    = $item->getDesc();
      $price    = $item->getPrice();
      $quantity  = $item->getQuantity();
      $itemAmount  = $price * $quantity;
      $slug      = $item->getSlug();
      $size      = $item->getSize();
      $color      = $item->getColor();
      $totalAmount += $itemAmount;
      $giaHienThiGuiEmail = "Call";
      $tongGiaHienThiGuiEmail = "";
      if ($price != 0) {
        $giaHienThiGuiEmail = numberFormatVN($price) . " <sup>đ/sp</sup>";
        $tongGiaHienThiGuiEmail = numberFormatVN($itemAmount) . " <sup>đ</sup>";
      }
      $thongTinSanPham = '<div>';
      $thongTinSanPham .= '<p style="text-transform: uppercase;display: block;margin-bottom: 10px;">' . $name . '</p>';
      if ($size || $color) {
        $thongTinSanPham .= '<ul>';
        if ($size) {
          $thongTinSanPham .= '<li>SIZE: ' . $size . '</li>';
        }
        if ($color) {
          $thongTinSanPham .= '<li>COLOUR: <span style="display: inline-block;background-color: ' . $color . ';margin-left: 10px;width: 35px;height: 20px;vertical-align: text-bottom;"></span></li>';
        }
        $thongTinSanPham .= '</ul>';
      }
      $thongTinSanPham .= '</div>';
      $cartContent .=  '<tr>' .
        '<td style="padding:10px;border: 1px solid #ccc">' . $thongTinSanPham . '</td>' .
        '<td style="padding:10px;border: 1px solid #ccc">' . $giaHienThiGuiEmail . '</td>' .
        '<td style="padding:10px;border: 1px solid #ccc">' . numberFormatVN($quantity) . '</td>' .
        '<td style="padding:10px;border: 1px solid #ccc">' . $tongGiaHienThiGuiEmail . '</td>' .
        '</tr>';
    }
    $cartContent .= '<tr>' .
      '<td colspan="3" style="padding:10px;border: 1px solid #ccc"><b>Tổng cộng </b><br /></td>' .
      '<td style="padding:10px;border: 1px solid #ccc"><b style="font-weight: bold; font-size: 15px; color: #ff0000;">' . numberFormatVN($totalAmount) . ' <sup>đ</sup></b></td>' .
      '</tr>';
    $cartContent .= '</table>';
    if ($payment == 2) {
      $tt = 'Thanh toán bằng tiền mặt';
    } elseif ($payment == 4) {
      $tt = 'Thanh toán bằng hình thức chuyển khoản';
    } else {
      $tt = 'Thanh toán trực tuyến Visa, Smartlink';
    }
    $cartContentemail = "";
    $cartContentemail .= "<br /> <b>THÔNG TIN  ĐẶT HÀNG:</b><br />" .
      (($txtName) ? "Họ tên : " . $txtName . "<br />" : "") .
      (($txtAddress) ? "Địa chỉ : " . $txtAddress . "<br />" : "") .
      (($txtTel) ? "Số điện thoại : " . $txtTel . "<br />" : "") .
      (($txtEmail) ? "Email : " . $txtEmail . "<br />" : "") .
      (($txtContent) ? "Ghi chú : " . $txtContent . "<br />" : "") .
      (($payment) ? "Hình thức thanh toán : " . $tt . "<br /><br />" : "") .
      '<b style="display:block; margin-top:20px;text-decoration:underline;">CHI TIẾT ĐƠN ĐẶT HÀNG:</b><p></p>' . $cartContent .
      '<br/><div>Lưu ý: Giá trên không bao gồm sản phẩm giá "Call"</div>' .
      '<br/>------------------------------------------------------------------------------------<br/>' .
      '<div style="color: #7e7e7e; font-size: 12px; text-align: left; font-weight: normal; line-height: 19px;">Truy cập vào<a target="_blank" href="' . $root . '"> ' . $root . '</a> để biết thêm về sản phẩm - dịch vụ. Xin cảm ơn.! <br/>Hotline: <b> ' . get_bien('phone', 'none') . ' </b>Email:<b> ' . get_bien('email', 'none') . ' </b> <br/> Bạn cũng có thể đến trực tiếp theo địa chỉ: <b> ' . get_bien('address', $lang_code) . ' </b> </div>';
    $OKK = $db->insert(
      "donhang",
      "ten,diachi,tel,email,yeu_cau,noi_dung,time,tien,congty,thanh_toan",
      "'" . $txtName . "','" . $txtAddress . "','" . $txtTel . "','" . $txtEmail . "','" . $txtContent . "','" . $cartContent . "','" . time() . "','" . $totalAmount . "','" . $txtCongty . "','" . $payment . "'"
    );
    if ($OKK) {
      $subject = "Đơn hàng từ khách - " . $txtName . " - " . $txtTel;
      sendEmailCart($subject, $txtEmail, get_bien("title"), $txtTel, $cartContentemail);
      $cart->emptyCart();
      $cart = ShoppingCart::updateInstance($cart);
      admin_load($translate_cart["Mua hàng thành công"][$lang_code], $root, 1);
    } else {
      $thongbao = "Có lỗi";
    }
  }
}
$cart = ShoppingCart::getInstance();
if ($cart->countItems()) {
?>
  <div class="fixed-cart">
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-7 col-sm-12">
          <div class="fixed-cart-left">
            <h1 class="title-page-list"><?php echo $titleOrder ?></h1>
            <?php
            isset($_SESSION["lg_email"]) ? $lg_email = $_SESSION["lg_email"] : $lg_email = "";
            $q121 = $db->select("vn_gianhang", "hien_thi=1 and email='" . $lg_email . "'", "order by id");
            $r121 = $db->fetch($q121);
            ?>
            <p style="color:#f00;font-size:12px;"><?php echo !empty($thongbao) ? $thongbao : "" ?></p>
            <form action="<?php echo $urlOrder ?>" method="POST" onsubmit="return datHang(this);" name="frmContact">
              <input type="hidden" name="func" value="checkout" />
              <fieldset class="payment-form">
                <div class="form-group">
                  <input class="form-control" type="text" value="<?php if ($r121['ten'] != '') {
                                                                    echo $r121['ten'];
                                                                  } else {
                                                                    echo $txtName;
                                                                  } ?>" name="txtName" placeholder="<?php echo $translate_cart['Họ & tên'][$lang_code] ?> *" required="required" />
                </div>
                <div class="row">
                  <div class="col-ld-7 col-md-7">
                    <div class="form-group">
                      <input class="form-control" type="text" value="<?php echo $r121['email'] ?>" name="txtEmail" placeholder="Email" />
                    </div>
                  </div>
                  <div class="col-ld-5 col-md-5">
                    <div class="form-group">
                      <input class="form-control" type="text" value="<?php if ($r121['dien_thoai'] != '') {
                                                                        echo $r121['dien_thoai'];
                                                                      } else {
                                                                        echo $txtTel;
                                                                      } ?>" name="txtTel" pattern=".{10,15}" onkeypress="return isNumberKey(event)" placeholder="<?php echo $translate_cart['Số điện thoại'][$lang_code] ?> *" required="required" />
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input class="form-control" type="text" value="<?php if ($r121['dia_chi'] != '') {
                                                                    echo $r121['dia_chi'];
                                                                  } else {
                                                                    echo $txtAddress;
                                                                  } ?>" name="txtAddress" placeholder="<?php echo $translate_cart['Địa chỉ'][$lang_code] ?>" />
                </div>
                <div class="form-group">
                  <textarea rows="3" class="form-control" name="txtContent" placeholder="<?php echo $translate_cart['Ghi chú'][$lang_code] ?>"></textarea>
                </div>
              </fieldset>
              <h2 class="name-over-detail"><?php echo $translate_cart['Hình thức thanh toán'][$lang_code] ?></h2>
              <div class="form-thanhtoan">
                <div class="row">
                  <div class="col-sm-6 col480 mgb15">
                    <input class="payment" type="radio" name="payment" checked="checked" value="2" id="2" required="required" />
                    <label for="2">&nbsp;<span><?php echo $translate_cart['Tiền mặt'][$lang_code] ?></span></label>
                  </div>
                  <div class="col-sm-6 col480 mgb15">
                    <input class="payment" type="radio" name="payment" value="4" id="4" />
                    <label for="4">&nbsp;<span><?php echo $translate_cart['Chuyển khoản'][$lang_code] ?></span></label>
                  </div>
                  <div class="col-sm-12">
                    <div class="payment_content">
                      <div id="payment_bank2" class="active_bank"><?php echo get_info("noi_dung", "tien_mat") ?></div>
                      <div id="payment_bank4" class="active_bank" style="display: none;"><?php echo get_info("noi_dung", "chuyen_khoan") ?></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <p class="comments">* <?php echo $translate_cart['Là trường bắt buộc'][$lang_code] ?></p>
              </div>
              <div class="form-group">
                <a class="payment_return" href="<?php echo $urlCart ?>"><i class="fa fa-caret-left" aria-hidden="true"></i> <?php echo $translate_cart['Giỏ hàng'][$lang_code] ?></a>
                <input class="payment_order" type="submit" value="<?php echo $translate_cart['Đặt hàng'][$lang_code] ?>" />
              </div>
            </form>
          </div>
        </div>
        <div class="col-12 col-md-5 col-sm-12">
          <div class="fixed-cart-right">
            <h1 class="title-page-list"><?php echo $translate_cart['Thông tin giỏ hàng'][$lang_code] ?></h1>
            <div class="table-responsive table-order table-max-order">
              <table class="table table-cart">
                <tbody>
                  <?php
                  $totalAmount = 0;
                  $so_luong = 0;
                  foreach ($cart->getItems() as $item) {
                    $id      = $item->getId();
                    $name    = $item->getName();
                    $hinh    = $item->getHinh();
                    $code    = $item->getCode();
                    $desc    = $item->getDesc();
                    $price    = $item->getPrice();
                    $quantity  = $item->getQuantity();
                    $itemAmount  = $price * $quantity;
                    $so_luong   += $quantity;
                    $totalAmount += $itemAmount;
                    $slug = $item->getSlug();
                    $size      = $item->getSize();
                    $color      = $item->getColor();
                  ?>
                    <tr>
                      <td>
                        <div class="product_order">
                          <di class="car-product-column">
                            <a class="img_order" href="<?php echo $slug ?>" target="_blank">
                              <?php if ($hinh != '') {
                                echo $hinh;
                              } else {
                              ?>
                                <img class="img-fluid" src="<?php echo $domain ?>/public/images/default.jpg" alt="<?php echo $name ?>" />
                              <?php } ?>
                              <span><?php echo $quantity ?></span>
                            </a>
                            <div class="product-info-order">
                              <span class="name_order"><?php echo $name ?></span>
                              <?php if ($size || $color) { ?>
                                <ul class="cart-libry">
                                  <?php if ($size) { ?><li>Size: <span><?php echo $size ?></span></li><?php } ?>
                                  <?php if ($color) { ?><li class="color">Colour: <span style="background-color: <?php echo $color ?>"></span></li><?php } ?>
                                </ul>
                              <?php } ?>
                            </div>
                          </di>
                          <p class="note"><?php echo lg_string::crop($desc, 16) ?></p>
                        </div>
                      </td>
                      <td>
                        <div class="price_order">
                          <?php
                          if ($price == 0) {
                            echo "Call";
                          } else {
                          ?>
                            <p><?php echo numberFormatVN($itemAmount); ?> <sup><?php echo $translate_cart['đ'][$lang_code] ?></sup></p>
                          <?php } ?>
                        </div>
                      </td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <div class="table-responsive table-order">
              <table class="table">
                <tfoot>
                  <tr>
                    <td>
                      <span class="payment-due-label-total"><?php echo $translate_cart['Tổng cộng'][$lang_code] ?></span>
                    </td>
                    <td class="text-right">
                      <span class="payment-due"><?php echo numberFormatVN($totalAmount); ?> <sup><?php echo $translate_cart['đ'][$lang_code] ?></sup></span>
                    </td>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
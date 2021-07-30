<div class="form-dangky">
  <div class="container">
    <h6 class="title">What new’s</h6>
    <p>Sign up for exclusive early sale access and tailored new arriva</p>
    <ul>
      <li>
        <div class="radio-button">
          <input type="radio" id="Women" name="sex" value="Women" checked>
          <label for="Women">Womenswear</label>
        </div>
      </li>
      <li>
        <div class="radio-button">
          <input type="radio" id="Men" name="sex" value="Men">
          <label for="Men">Menswear</label>
        </div>
      </li>
    </ul>
    <div class="form-enter">
      <form action="form" name="dangKyThongTin">
        <input type="hidden" name="type" value='DANGKYNHANEMAIL'>
        <input type="hidden" name="typeName" value='Đăng ký nhận thông tin'>
        <input type="text" name="email" placeholder="Yes, here’s my email">
        <button type="button" id="dangKyThongTin">sign up</button>
      </form>
    </div>
  </div>
</div>
<footer>
  <div class="footer-wrapper">
    <div class="container">
      <div class="row">
        <?php
        $qMenuFooter = $db->selectpostcat("hien_thi=1 and post_type='news' and noi_bat=1 and lang_id='" . $lang_code . "'", "order by thu_tu asc limit 2");
        if ($db->num_rows($qMenuFooter) != 0) {
          while ($rMenuFooter = $db->fetch($qMenuFooter)) {
        ?>
            <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-info-box mb20">
              <h5><?php echo $rMenuFooter["name"] ?></h5>
              <ul>
                <?php
                $q = $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild($rMenuFooter["postcat_id"])) . ") and lang_id='" . $lang_code . "'", "order by post.time_edit LIMIT 5");
                if ($db->num_rows($q) != 0) {
                  while ($r = $db->fetch($q)) {
                ?>
                    <li>
                      <a href="<?php echo $root . "/" . $r['slug'] ?>"><?php echo $r["ten"] ?></a>
                    </li>
                <?php }
                } ?>
              </ul>
            </div>
        <?php }
        } ?>
        <?php
        $qMenuFooter = $db->selectpostcat("hien_thi=1 and post_type='news' and noi_bat=1 and lang_id='" . $lang_code . "'", "order by thu_tu asc limit 2,1");
        if ($db->num_rows($qMenuFooter) != 0) {
          $rMenuFooter = $db->fetch($qMenuFooter)
        ?>
          <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-info-box mb20">
            <h5><?php echo $rMenuFooter["name"] ?></h5>
            <ul>
              <?php
              $q = $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild($rMenuFooter["postcat_id"])) . ") and lang_id='" . $lang_code . "'", "order by post.time_edit LIMIT 5");
              if ($db->num_rows($q) != 0) {
                while ($r = $db->fetch($q)) {
              ?>
                  <li>
                    <a href="<?php echo $root . "/" . $r['slug'] ?>"><?php echo $r["ten"] ?></a>
                  </li>
              <?php }
              } ?>
              <li>
                <a href="<?php echo show_infopage("contact", "slug", 5) ?>"><?php echo show_infopage("contact", "ten", 5) ?></a>
              </li>
            </ul>
          </div>
        <?php } ?>
        <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 footer-info-box2 mb20">
          <h6>
            <a href="mailto:<?php echo get_bien("email", "none") ?>?subject=Liên hệ từ website" targer="_top"><?php echo get_bien("email", "none") ?></a>
          </h6>
          <div class="address">
            <a href="tel:<?php echo resetPhone(get_bien("phone", "none")) ?>" targer="_top"><?php echo get_bien("phone", "none") ?></a>
            <p><?php echo get_bien("address") ?></p>
          </div>
          <div class="work-time">
            <p><?php echo get_info("ten", "workTime") ?></p>
            <span><?php echo get_info("noi_dung", "workTime") ?></span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="copy-right-wrapper">
    <div class="container">
      <div class="copy-right"><?php echo get_bien('meta_copyright') ?></div>
    </div>
  </div>
</footer>

<span class="cart-total" style="display: none; opacity: 0" id="totalAmount"><?php echo ($_SESSION["total"]) ? $_SESSION["so_luong7"] : '0'; ?></span>
<a class="hotline-fixed" href="tel:<?php echo resetPhone(get_bien("phone", "none")) ?>" targer="_top">Hotline:<span><?php echo get_bien("phone", "none") ?></span></a>
<a class="backto-top scrollup"><i class="fa fa-angle-up" aria-hidden="true"></i></a>

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=920861871357607&autoLogAppEvents=1"></script>
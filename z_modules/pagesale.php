<div class="bg-while">
  <?php
  echo albumBannerSlide(6);
  $page       =   $page + 0;
  $perpage    =   100;
  $r_all      =   $db->selectpost(
    "hien_thi=1 and type='1' and post_type='sanpham_detail' and lang_id='" . $lang_code . "'",
    ""
  );
  $sum        =   $db->num_rows($r_all);
  $sum        =   $sum;
  $pages      =   ($sum - ($sum % $perpage)) / $perpage;
  if ($sum % $perpage <> 0) {
    $pages = $pages + 1;
  }
  $page       =   ($page == 0) ? 1 : (($page > $pages) ? $pages : $page);
  $min        =   abs($page - 1) * $perpage;
  $max        =   $perpage;
  $count = 0;
  $qMenu = $db->selectpostcat("cat='" . $id_slug . "' and hien_thi=1 and lang_id='" . $lang_code . "'", "order by thu_tu asc");
  ?>
  <div class="mt30">
    <div class="container">
      <h1 class="title-pages detail">SALE</h1>
      <?php
      $q = $db->selectpost("hien_thi=1 and type='1' and post_type='sanpham_detail' and lang_id='" . $lang_code . "'", "order by post.time_edit LIMIT " . $min . ", " . $max);
      if ($db->num_rows($q) != 0) {
      ?>
        <div class="row">
          <?php
          while ($r = $db->fetch($q)) {
          ?>
            <div class="col-12 col-xl-3 col-lg-3 col-md-6 col-sm-12 mb30">
              <div class="sanpham-box-item">
                <div class="img image-bg">
                  <a href="<?php echo $root . "/" . $r['slug'] ?>" style="background-image: url('<?php echo get_single_image($r['post_id'], "post", "avatar", "link") ?>')">
                    <?php echo get_single_image($r['post_id'], "post", "avatar") ?>
                  </a>
                </div>
                <div class="info">
                  <h3 class="name"><a href="<?php echo $root . "/" . $r['slug'] ?>"><?php echo $r['ten'] ?></a></h3>
                  <p class="price">Price: <span><?php echo ($r['new_price']) ? numberFormatVN($r['new_price']) . " $" : "Call" ?></span></p>
                  <div class="add-cart"><span onClick="addToCartInList(<?php echo $r['post_id'] ?>, '<?php echo $lang_code ?>')">ADD TO BAG</span></div>
                </div>
                <?php echo hienThiIconNew($r, 30) ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <div><?php showPageNavigation($page, $pages, $root . '/' . $slugnew . '/') ?></div>
      <?php } else { ?>
        <div class="mb20 mt30"><?php echo $translate["Đang cập nhật dữ liệu"][$lang_code] ?></div>
      <?php } ?>
    </div>
  </div>
</div>
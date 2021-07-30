<div class="bg-while">
  <?php
  $page       =   $page + 0;
  $perpage    =   12;
  $r_all      =   $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild($id_slug)) . ") and lang_id='" . $lang_code . "'", "");
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
  $getLevel = get_sql("select level from postcat where id=" . $id_slug);
  $qMenu = $db->selectpostcat("cat='" . $id_slug . "' and hien_thi=1 and lang_id='" . $lang_code . "'", "order by thu_tu asc");
  if ($getLevel == 1 && ($db->num_rows($qMenu) != 0)) {
    // 1 // Danh mục cấp 1 //////////////////////
  ?>
    <div class="row mx-lg-0 mx-md-0">
      <?php
      while ($rMenu = $db->fetch($qMenu)) {
      ?>
        <div class="col-12 col-xl-6 col-lg-6 col-md-6 col-sm-12 px-lg-0 px-md-0">
          <div class="product-list-box">
            <div class="img image-bg image-bg-71">
              <a href="<?php echo $root . "/" . $rMenu['slug'] ?>" style="background-image: url('<?php echo get_single_image($rMenu['postcat_id'], "postcat", "avatar", "link") ?>')">
                <?php echo get_single_image($rMenu['postcat_id'], "postcat", "avatar") ?>
              </a>
            </div>
            <div class="note">
              <h2 class="name"><a href="<?php echo $root . "/" . $rMenu['slug'] . "/" ?>"><?php echo $rMenu['name'] ?></a></h2>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- // 1 // Collection -->
    <?php if (collection_id != 0) {
      $qCollection = $db->selectgalmenu("hien_thi=1 and cat=11 and post_type='catgal' and gallery_menu_id='" . collection_id . "'", "");
      if ($db->num_rows($qCollection) != 0) {
        $rCollection = $db->fetch($qCollection);
        $qHinh = $db->selectmedia("parent_id='" . $rCollection['gallery_menu_id'] . "' and type='gallery' and parent_type='gallery'", "order by thu_tu asc, media_relationship.id desc limit 1");
    ?>
        <div class="collerion-block">
          <div class="row align-items-center  mx-lg-0 mx-md-0">
            <div class="col-12 col-xl-4 col-lg-4 col-md-4 col-sm-12 align-self-center  px-lg-0 px-md-0">
              <div class="category-collection-info">
                <p class="title">New Collection</p>
                <h3><?php echo $rCollection["ten"] ?></h3>
                <p class="detail"><a href="<?php echo $root . "/collection/" . $rCollection['slug'] . "/" ?>">Detail</a></p>
              </div>
            </div>
            <div class="col-12 col-xl-8 col-lg-8 col-md-8 col-sm-12  px-lg-0 px-md-0">
              <?php if ($db->num_rows($qHinh)) {
                $rHinh = $db->fetch($qHinh);
              ?>
                <div class="category-collection-gallery" style="background-image: url('<?php echo showSingleImage($rHinh['parent_id'], 'gallery', 'gallery', 'link') ?>')"></div>
              <?php } ?>
            </div>
          </div>
        </div>
    <?php }
    } ?>
    <!-- // 1 // Show fashion -->
    <?php if (video_id != 0) {
      $qVideo = $db->selectpost("hien_thi=1 and post_id='" . video_id . "' and lang_id='" . $lang_code . "'", "");
      if ($db->num_rows($qVideo) != 0) {
        $rVideo = $db->fetch($qVideo);
    ?>
        <div class="collerion-block">
          <div class="row align-items-center  mx-lg-0 mx-md-0">
            <div class="col-12 col-xl-4 col-lg-4 col-md-4 col-sm-12 align-self-center  px-lg-0 px-md-0 order-xl-8 order-md-8">
              <div class="category-collection-info">
                <p class="title">Show Fashion</p>
                <h3><?php echo $rVideo["ten"] ?></h3>
                <p class="detail"><a href="<?php echo $root . "/" . $rVideo['slug'] ?>">Detail</a></p>
              </div>
            </div>
            <div class="col-12 col-xl-8 col-lg-8 col-md-8 col-sm-12  px-lg-0 px-md-0 order-xl-4 order-lg-4 order-md-4">
              <div class="category-collection-video">
                <?php echo get_IframeYoutube($rVideo['chu_thich']) ?>
              </div>
            </div>
          </div>
        </div>
    <?php }
    } ?>
  <?php } else {
    // 2 // Danh mục cấp 1 //////////////////////
    echo albumDanhSachBaiVietSlide($id_slug);
  ?>
    <div class="container">
      <div class="title-hidden">
        <h1 class="title-page-list"><?php echo the_title ?></h1>
        <?php if (the_note != "") { ?><div class="note"><?php echo the_note ?></div><?php } ?>
      </div>
      <?php
      $q = $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild($id_slug)) . ") and lang_id='" . $lang_code . "'", "order by post.time_edit LIMIT " . $min . ", " . $max);
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
                  <p class="price">Price: <span><?php echo ($r['new_price']) ? numberFormatVN($r['new_price'])." $" : "Call" ?></span></p>
                  <div class="add-cart"><span onClick="addToCartInList(<?php echo $r['post_id']?>, '<?php echo $lang_code?>')">ADD TO BAG</span></div>
                </div>
                <?php echo hienThiIconNew($r, 30) ?>
              </div>
            </div>
          <?php } ?>
        </div>
        <div><?php showPageNavigation($page, $pages, $root . '/' . $slugnew . '/') ?></div>
      <?php } else { ?>
        <div class="mb20"><?php echo $translate["Đang cập nhật dữ liệu"][$lang_code] ?></div>
      <?php } ?>
    </div>
  <?php } ?>
</div>
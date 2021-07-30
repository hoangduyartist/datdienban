<div class="bg-while mt40 mb10">
  <div class="container">
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
    ?>
      <div class="row row2">
        <?php
        while ($rMenu = $db->fetch($qMenu)) {
        ?>
          <div class="col col2 col-6 col-sm-12 col-xs-24 mb25 flex">
            <div class="product-list-box">
              <div class="img image-bg image-bg-70">
                <a href="<?php echo $root . "/" . $rMenu['slug'] ?>" style="background-image: url('<?php echo get_single_image($rMenu['postcat_id'], "postcat", "avatar", "link") ?>')">
                  <?php echo get_single_image($rMenu['postcat_id'], "postcat", "avatar") ?>
                </a>
              </div>
              <div class="note">
                <h3 class="name"><a href="<?php echo $root . "/" . $rMenu['slug'] . "/" ?>"><?php echo $rMenu['name'] ?></a></h3>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } else { ?>
      <?php
      $q = $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild($id_slug)) . ") and lang_id='" . $lang_code . "'", "order by post.time_edit LIMIT " . $min . ", " . $max);
      if ($db->num_rows($q) != 0) {
      ?>
        <div class="title-pages detail">
          <h1 class="name"><?php echo the_title ?></h1>
          <?php if (the_note != "") { ?><div class="note"><?php echo the_note ?></div><?php } ?>
        </div>
        <div class="row row2">
          <?php
          while ($r = $db->fetch($q)) {
          ?>
            <div class="col col2 col-6 col-sm-12 col-xs-24 mb25 flex">
              <div class="product-list">
                <div class="img image-bg image-bg-70">
                  <a href="<?php echo $root . "/" . $r['slug'] ?>" style="background-image: url('<?php echo get_single_image($r['post_id'], "post", "avatar", "link") ?>')">
                    <?php echo get_single_image($r['post_id'], "post", "avatar") ?>
                  </a>
                </div>
                <div class="note">
                  <h3 class="name"><a href="<?php echo $root . "/" . $r['slug'] ?>"><?php echo $r['ten'] ?></a></h3>
                </div>
                <?php echo hienThiIconNew($r, 30)?>
              </div>
            </div>
          <?php } ?>
        </div>
        <div><?php showPageNavigation($page, $pages, $root . '/' . $slugnew . '/') ?></div>
      <?php } else { ?>
        <div class="title-theme2">
          <h1 class="name"><a href="<?php echo $root . "/" . the_slug . "/" ?>"><?php echo nameDisplay ?></a></h1>
          <div class="note"><?php echo the_note ?></div>
        </div>
        <div class="not-data"><?php echo $translate["Đang cập nhật dữ liệu"][$lang_code] ?></div>
      <?php } ?>
    <?php } ?>
  </div>
</div>
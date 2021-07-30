<div class="pt40 bg-xam">
  <div class="container">
    <h1 class="title-page-list"><?php echo the_title ?></h1>
    <?php
    $page       =   $page + 0;
    $perpage    =   18;
    $r_all      =   $db->selectpost("hien_thi=1 and cat='" . $id_slug . "' and lang_id='" . $lang_code . "'", "");
    $sum        =   !empty($r_all) ? $db->num_rows($r_all) : 0;
    $pages      =   ($sum - ($sum % $perpage)) / $perpage;
    if ($sum % $perpage <> 0) {
      $pages = $pages + 1;
    }
    $page       =   ($page == 0) ? 1 : (($page > $pages) ? $pages : $page);
    $min        =   abs($page - 1) * $perpage;
    $max        =   $perpage;
    if ($sum !== 0) {
    ?>
      <div class="row">
        <?php
        $q = $db->selectpost("hien_thi=1 and cat='" . $id_slug . "' and lang_id='" . $lang_code . "'", "order by post.time_edit desc LIMIT " . $min . ", " . $max);
        if ($db->num_rows($q) != 0) {
          while ($r = $db->fetch($q)) {
        ?>
            <div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-12 mb30">
              <div class="collection-box">
                <div class="category-collection-video category-collection-video-70">
                  <?php echo get_IframeYoutube($r['chu_thich']) ?>
                </div>
                <div class="info">
                  <h3 class="name"><a href="<?php echo $root . "/" . $r['slug'] ?>"><?php echo $r['ten'] ?></a></h3>
                </div>
              </div>
            </div>
          <?php } ?>
      </div>
      <div><?php showPageNavigation($page, $pages, $root . '/' . $slugnew . '/'); ?></div>
    <?php }
      } else { ?>
    <div><?php echo $translate['Đang cập nhật'][$lang_code] ?></div>
  <?php } ?>
  </div>
</div>
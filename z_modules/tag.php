<?php
$db->query("update tag set count=count+1 where id='" . $id_slug . "'");
$page       =   $page + 0;
$perpage    =   10;
$r_all      =   $db->selecttag("tag_id='" . $id_slug . "'", "");
$sum        =   $db->num_rows($r_all);
$pages      =   ($sum - ($sum % $perpage)) / $perpage;
if ($sum % $perpage <> 0) {
  $pages = $pages + 1;
}
$page       =   ($page == 0) ? 1 : (($page > $pages) ? $pages : $page);
$min        =   abs($page - 1) * $perpage;
$max        =   $perpage;
$count = 0;
?>
<div class="bg-while">
  <?php
  $q = $db->selecttag("tag_id='" . $id_slug . "'", "order by tag.id LIMIT " . $min . ", " . $max);
  if ($db->num_rows($q) != 0) {
  ?>
    <div class="mt40 mb20">
      <div class="container">
        <div class="title-pages detail">
          <h1 class="name">Tags</h1>
        </div>
        <div class="row row2">
          <?php
          while ($r = $db->fetch($q)) {
            $qget = $db->selectpost("post_id='" . $r['post_id'] . "'");
            $rget = $db->fetch($qget);
          ?>
            <div class="col col2 col-6 col-sm-12 col-xs-24 mb25 flex">
              <div class="product-list">
                <div class="img image-bg image-bg-70">
                  <a href="<?php echo $root . "/" . $rget['slug'] ?>" style="background-image: url('<?php echo get_single_image($rget['post_id'], "post", "avatar", "link") ?>')">
                    <?php echo get_single_image($rget['post_id'], "post", "avatar") ?>
                  </a>
                </div>
                <div class="note">
                  <h3 class="name"><a href="<?php echo $root . "/" . $rget['slug'] ?>"><span class="icon-arrow-next mr5" style="font-size: 10px"></span><?php echo $rget['ten'] ?></a></h3>
                  <div class="sumary"><?php echo lg_string::crop($rget['chu_thich'], 80) ?></div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <div><?php showPageNavigation($page, $pages, $root . '/tags/' . $slugnew . '/') ?></div>
      </div>
    <?php } else { ?>
      <div class="container">
        <div class="title-theme2">
          <h1 class="name"><a href="<?php echo $root ?>">Tags</a></h1>
        </div>
        <div class="not-data"><?php echo $translate["Đang cập nhật dữ liệu"][$lang_code] ?></div>
      </div>
    <?php } ?>
    </div>
</div>
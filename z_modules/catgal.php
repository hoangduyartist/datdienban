<?php
$page       =   $page + 0;
$perpage    =   24;
$r_all      =   $db->selectmedia(
  "parent_id='" . $id_slug . "' and type='gallery' and parent_type='gallery'",
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
$q = $db->selectmedia(
  "parent_id='" . $id_slug . "' and type='gallery' and parent_type='gallery'",
  "order by thu_tu asc, media_relationship.id desc LIMIT " . $min . ", " . $max
);
?>
<div class="container">
  <h1 class="title-page-list center mt50 mb50"><?php echo $theTitle ?></h1>
  <?php if ($db->num_rows($q) != 0) { ?>
    <div class="row collection-light align-self-start">
      <?php
      while ($r = $db->fetch($q)) {
        $image = $domain . "/uploads/" . $r['dir_folder'] . "/" . $r['file_name'];
      ?>
        <div class="col-12 col-xl-4 col-lg-4 col-md-6 col-sm-12 mb30">
          <div>
            <a class="collection-light-item" href="<?php echo $image ?>">
              <img class="img-fluid" src="<?php echo $image ?>" alt="<?php echo $r["name"] ?>">
            </a>
          </div>
        </div>
      <?php } ?>
    </div>
    <div><?php showPageNavigation($page, $pages, $root . '/collection/' . $slugnew . '/') ?></div>
  <?php } else { ?>
    <div class="not-data"><?php echo $translate["Đang cập nhật dữ liệu"][$lang_code] ?></div>
  <?php } ?>
</div>
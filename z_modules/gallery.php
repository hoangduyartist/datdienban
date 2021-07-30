<div class="pt40">
  <div class="container">
    <h1 class="title-page-list center mt20 mb50"><?php echo the_title ?></h1>
  </div>
  <?php
  $q = $db->selectgalmenu("hien_thi=1 and cat=11 and post_type='catgal'", "order by thu_tu asc");
  if ($db->num_rows($q) == 0) {
  ?>
    <div class="pb20"><?php echo $translate['Đang cập nhật'][$lang_code] ?></div>
  <?php return;
  } ?>
  <div class="gallery-wrapper">
    <div class="row-collection">
      <?php
      while ($r = $db->fetch($q)) {
        $qHinh = $db->selectmedia("parent_id='" . $r['gallery_menu_id'] . "' and type='gallery' and parent_type='gallery'", "order by thu_tu asc, media_relationship.id desc limit 1");
      ?>
        <div class="col-collection">
          <div class="collection-box">
            <?php
            $rHinh = $db->fetch($qHinh);
            $hinhLink = showSingleImage($rHinh['parent_id'], 'gallery', 'gallery', 'link');
            $hinhImage = showSingleImage($rHinh['parent_id'], 'gallery', 'gallery', 'html');
            ?>
            <div class="img image-bg">
              <a href="<?php echo $root . "/collection/" . $r['slug'] . "/" ?>" style="background-image: url('<?php echo $hinhLink ?>')">
                <?php echo $hinhImage ?>
              </a>
            </div>
            <div class="info">
              <h3 class="name"><a href="<?php echo $root . "/collection/" . $r['slug'] . "/" ?>"><?php echo $r['ten'] ?></a></h3>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>
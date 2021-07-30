<div class="pt40">
  <div class="container pb40">
    <h1 class="title-page-list"><?php echo the_title ?></h1>
    <div class="category-collection-video">
      <?php echo get_IframeYoutube(the_note) ?>
    </div>
  </div>
  <div class="pt40 bg-xam">
    <div class="container">
      <?php
      $q = $db->selectpost("hien_thi=1 and cat='" . the_parent . "' and post_id<>'" . $id_slug . "' and lang_id='" . $lang_code . "'", "order by post.time_edit desc LIMIT 12");
      if ($db->num_rows($q) != 0) {
      ?>
        <h1 class="title-page-list">Other video</h1>
        <div class="row row2">
          <?php
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
      <?php } ?>
    </div>
  </div>
</div>
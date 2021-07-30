<div class="content-pages">
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-12 mb20">
        <div class="breadcums-box">
          <?php echo get_breadcums() ?>
        </div>
        <h1 class="title-pages detail"><?php echo the_title ?></h1>
        <div class="date-detail"><?php echo $translate['Ngày cập nhật'][$lang_code] ?>: <?php echo getDay(date('w', the_time_edit)) ?>, <?php echo date('d/m/Y', the_time_edit) ?></div>
        <?php if (the_note) { ?>
          <div class="note-detail">
            <?php echo the_note ?>
          </div>
        <?php } ?>
        <div class="album-detail">
          <?php echo albumChiTietBaiViet($id_slug, 'album-baiviet', 'album-baiviet-hinh-anh') ?>
        </div>
        <?php if (the_content) { ?>
          <div class="content-writing">
            <?php echo the_content ?>
          </div>
        <?php } ?>
        <?php
        $qtag = $db->selecttag("post_id='" . $id_slug . "'", "order by tag.id DESC");
        if ($db->num_rows($qtag) != 0) {
        ?>
          <div class="tags-box mb20">
            <ul>
              <li><span><i class="fa fa-tags"></i>Tags:</span></li>
              <?php
              while ($rtag = $db->fetch($qtag)) {
              ?>
                <li><a href="<?php echo $root . '/tags/' . $rtag['slug'] . '/' ?>"><?php echo $rtag['name'] ?></a></li>
              <?php } ?>
            </ul>
          </div>
        <?php } ?>
        <div class="share-this-item">
          <p class="share-title"><?php echo $translate['Chia sẻ mục này'][$lang_code] ?></p>
          <p class="socialsharing_product">
            <a class="btn-twitter" href="https://twitter.com/share?url=<?php echo $root . $_SERVER['REQUEST_URI']; ?>&amp;text=<?php echo get_bien('name') ?>&amp;hashtags=<?php echo get_bien("title") ?>" target="_blank">
              <i class="fa fa-twitter" aria-hidden="true"></i> Tweet
            </a>
            <a class="btn-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $root . $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <i class="fa fa-facebook" aria-hidden="true"></i> Share
            </a>
            <a class="btn-google-plus" href="https://plus.google.com/share?url=<?php echo $root . $_SERVER['REQUEST_URI']; ?>" target="_blank">
              <i class="fa fa-google-plus" aria-hidden="true"></i> Google+
            </a>
            <a class="btn-pinterest" href="http://pinterest.com/pin/create/bookmarklet/?media=<?php echo $domain ?>/images/logo.png&url=<?php echo $root . $_SERVER['REQUEST_URI']; ?>&is_video=false&description=<?php echo get_bien('name') ?>" target="_blank">
              <i class="fa fa-pinterest" aria-hidden="true"></i> Pinterest
            </a>
          </p>
        </div>
        <div class="comment-block">
          <?php
          $slug = "http:" . the_slug;
          ?>
          <div class="fb-comments" data-href="<?php echo $slug ?>" data-mobile="Auto-detected" data-width="100%" data-numposts="5"></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 mb20">
        <div class="mt20">
          <?php
          include("z_modules/module/other_right.php");
          ?>
        </div>
      </div>
    </div>
    <?php
    $q = $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild(the_parent)) . ") and post_id<>'" . $id_slug . "' and lang_id='" . $lang_code . "'", "order by post.time_edit desc LIMIT 12");
    if ($db->num_rows($q) != 0) {
    ?>
      <h3 class="title-pages detail"><a href="<?php echo $slug ?>"><?php echo $translate['Bài viết liên quan'][$lang_code] ?></a></h3>
      <div class="other-news">
        <div class="row">
          <?php
          while ($r = $db->fetch($q)) {
          ?>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 mb30">
              <div class="news-event-box">
                <div class="image-bg">
                  <a href="<?php echo $root; ?>/<?= $r['slug'] ?>" style="background-image: url('<?php echo showSingleImage($r['post_id'], "post", "avatar",  "link") ?>')">
                    <?php echo showSingleImage($r['post_id'], 'post', 'avatar', 'html') ?>
                  </a>
                </div>
                <div class="info">
                  <h3 class="name">
                    <a href="<?php echo $root ?>/<?php echo $r['slug'] ?>"><?php echo $r['ten'] ?>
                    </a>
                  </h3>
                  <p class="date"><?php echo $translate['Ngày cập nhật'][$lang_code] ?>: <?php echo date('d/m/Y', $r['time_edit']) ?></p>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    <?php } ?>
  </div>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=920861871357607&autoLogAppEvents=1"></script>
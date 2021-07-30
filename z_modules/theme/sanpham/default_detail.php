<div class="content-pages mb20">
  <div class="product-detail-panel mb30">
    <div class="container">
      <div class="breadcums-box">
        <?php echo get_breadcums() ?>
      </div>
      <div class="row row2">
        <div class="col col2 col-12 col-sm-12 col-xs-24 mb20">
          <?php
          $qAlbum = $db->selectmedia("hien_thi=1 and parent_id='" . $id_slug . "' and type='album' and parent_type='post'", "order by media_relationship.thu_tu asc, media_relationship.id desc");
          if ($db->num_rows($qAlbum) != 0) {
          ?>
            <div class="album-product-detail">
              <div class="slider-for album-chitiet-sanpham">
                <?php
                while ($rAlbum = $db->fetch($qAlbum)) {
                ?>
                  <div>
                    <a class="album-chitiet-sanpham-item" href="<?php echo $domain . '/uploads/' . $rAlbum['dir_folder'] . '/' . $rAlbum['file_name'] ?>">
                      <img class="img-fluid" src="<?php echo $domain . '/uploads/' . $rAlbum['dir_folder'] . '/' . $rAlbum['file_name'] ?>" alt="<?php echo $rAlbum['name'] ?>" />
                    </a>
                  </div>
                <?php } ?>
              </div>
              <div class="slider-nav">
                <?php
                $qAlbum2 = $db->selectmedia("hien_thi=1 and parent_id='" . $id_slug . "' and type='album' and parent_type='post'", "order by media_relationship.thu_tu asc, media_relationship.id desc");
                while ($rAlbum2 = $db->fetch($qAlbum2)) {
                ?>
                  <div class="item">
                    <img class="img-fluid" src="<?php echo $domain . '/uploads/' . $rAlbum2['dir_folder'] . '/' . $rAlbum2['file_name'] ?>" alt="<?php echo $rAlbum2['name'] ?>" />
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } else {
            echo get_single_image($id_slug, "post", "avatar");
          } ?>
        </div>
        <div class="col col2 col-12 col-sm-12 col-xs-24 mb20">
          <h1 class="title-product"><?php echo the_title ?></h1>
          <div class="note-product"><?php echo str_replace("\n", "<br/>", the_note) ?></div>
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
          <div class="album-detail">
            <!-- <?php echo albumChiTietBaiViet($id_slug, 'album-baiviet', 'album-baiviet-hinh-anh') ?> -->
          </div>
        </div>
      </div>
      <div class="content-writing">
        <?php echo the_content ?>
      </div>
      <?php
      $qtag = $db->selecttag("post_id='" . $id_slug . "'", "order by tag.id DESC");
      if ($db->num_rows($qtag) != 0) {
      ?>
        <div class="tags-box">
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
    </div>
  </div>
  <div class="container">
    <?php
    $q = $db->selectpost("hien_thi=1 and cat='" . the_parent . "' and post_id<>'" . $id_slug . "' and lang_id='" . $lang_code . "'", "order by post.time_edit desc LIMIT 5, 14");
    if ($db->num_rows($q) != 0) {
    ?>
      <div class="title-pages detail">
        <h1 class="name"><?php echo $translate['Sản phẩm khác'][$lang_code] ?></h1>
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
              <?php echo hienThiIconNew($r, 30) ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php } ?>
  </div>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=920861871357607&autoLogAppEvents=1"></script>

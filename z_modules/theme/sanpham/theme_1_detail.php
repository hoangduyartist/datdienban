<?php
$qPageInfo = $db->selectpost("hien_thi=1 and post_id='" . $id_slug . "' and lang_id='" . $lang_code . "'", "");
$pageInfo = $db->fetch($qPageInfo);
?>
<div class="content-pages mb20">
  <div class="product-detail-panel mb30">
    <div class="container">
      <div class="row-thongtin-sanpham">
        <div class="album-sanpham">
          <?php
          $qAlbum = $db->selectmedia("hien_thi=1 and parent_id='" . $id_slug . "' and type='album' and parent_type='post'", "order by media_relationship.thu_tu asc, media_relationship.id desc");
          if ($db->num_rows($qAlbum) != 0) {
          ?>
            <div class="album-product-detail">
              <div class="slider-for album-chitiet-sanpham">
                <?php
                while ($rAlbum = $db->fetch($qAlbum)) {
                  $hinh = $domain . '/uploads/' . $rAlbum['dir_folder'] . '/' . $rAlbum['file_name'];
                ?>
                  <div class="album-chitiet-sanpham-item zoom" data-src="<?php echo $hinh ?>">
                    <img class="img-fluid" src="<?php echo $hinh ?>" alt="<?php echo $rAlbum['name'] ?>" />
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
        <div class="thongtin-sanpham">
          <div class="breadcums-sanpham">
            <?php echo get_breadcums() ?>
          </div>
          <h1 class="title-sanpham"><?php echo the_title ?></h1>
          <p class="price-sanpham">AUD: <span><?php echo ($pageInfo["new_price"]) ? numberFormatVN($pageInfo["new_price"]) . " $" : "Call" ?></p>
          <div class="note-sanpham"><?php echo str_replace("\n", "<br/>", the_note) ?></div>
          <form name="formOrderDetail" action="">
            <div class="size-sanpham">
              <span>Size</span>
              <ul>
                <?php
                $qSize = $db->selectjoin(
                  "vn_sanpham_size",
                  "post_lang",
                  "vn_sanpham_size.id = post_lang.post_id"
                );
                if ($db->num_rows($qSize) != 0) {
                  while ($rSize = $db->fetch($qSize)) {
                ?>
                    <li>
                      <div class="radio-color radio-size">
                        <input name="txtSize" value="<?php echo $rSize["post_id"] ?>" id="<?php echo $rSize["post_id"] ?>" type="radio" />
                        <label for="<?php echo $rSize["post_id"] ?>" style="background-color: #fafafa"><?php echo $rSize["ten"] ?></label>
                      </div>
                  <?php }
                } ?>
              </ul>
              <a href="<?php echo get_slug_post(1) ?>">Size guide</a>
            </div>
            <div class="color-sanpham mb25">
              <span>Colour</span>
              <ul>
                <?php
                $qMau = $db->selectjoin(
                  "vn_sanpham_mau",
                  "post_lang",
                  "vn_sanpham_mau.id = post_lang.post_id"
                );
                if ($db->num_rows($qMau) != 0) {
                  while ($rMau = $db->fetch($qMau)) {
                ?>
                    <li>
                      <div class="radio-color">
                        <input name="txtColor" value="<?php echo $rMau["post_id"] ?>" id="<?php echo $rMau["post_id"] ?>" type="radio" />
                        <label for="<?php echo $rMau["post_id"] ?>" style="background-color: <?php echo $rMau["chu_thich"] ?>"></label>
                      </div>
                    </li>
                <?php }
                } ?>
              </ul>
            </div>
            <div class="addcart-sanpham">
              <button onclick="addToCartDetail(<?php echo $pageInfo['post_id'] ?>, '<?php echo $lang_code ?>')" type="button">Add to bag</button>
            </div>
          </form>
          <div class="tab-detail">
            <div class="accordion" id="accordionExample">
              <div class="card-sanpham">
                <div class="card-header-sanpham" id="headingOne">
                  <h5>
                    <button type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                      Product details & fit
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                  <div class="card-body-sanpham">
                    <div class="content-writing"><?php echo the_content ?></div>
                  </div>
                </div>
              </div>
              <div class="card-sanpham">
                <div class="card-header-sanpham" id="headingTwo">
                  <h5>
                    <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Shipping & returns
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                  <div class="card-body-sanpham">
                    <div class="content-writing"><?php echo get_info("noi_dung", "ShippingReturns") ?></div>
                  </div>
                </div>
              </div>
              <div class="card-sanpham">
                <div class="card-header-sanpham" id="heading3">
                  <h5>
                    <button class="collapsed" type="button" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                      Need help?
                    </button>
                  </h5>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordionExample">
                  <div class="card-body-sanpham">
                    <div class="content-writing"><?php echo get_info("noi_dung", "NeedHelp") ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="share-this-item">
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
          </div> -->
        </div>
      </div>
      <!-- <?php
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
      <?php } ?> -->
    </div>
  </div>
  <div class="container">
    <?php
    $q = $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild(the_parent)) . ") and post_id<>'" . $id_slug . "' and lang_id='" . $lang_code . "'", "order by post.time_edit desc LIMIT 12");
    if ($db->num_rows($q) != 0) {
    ?>
      <h2 class="title-page-sanpham">YOU MAY ALSO LIKE</h2>
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
    <?php } ?>
  </div>
</div>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=920861871357607&autoLogAppEvents=1"></script>
<?php
$qRight = $db->selectpost("hien_thi=1 and cat in (" . implode(",", GetChild(the_parent)) . ") and post_id<>'" . $id_slug . "' and lang_id='" . $lang_code . "'", "order by post.time_edit desc LIMIT 12");
if ($db->num_rows($qRight) != 0) {
?>
  <h4 class="title-right">News Other</h4>
  <div class="news-other">
    <?php
    while ($rRight = $db->fetch($qRight)) {
    ?>
      <div class="right-other-box">
        <div class="image-bg">
          <a href="<?php echo $root; ?>/<?= $rRight['slug'] ?>" style="background-image: url('<?php echo showSingleImage($rRight['post_id'], "post", "avatar",  "link") ?>')">
            <?php echo showSingleImage($rRight['post_id'], 'post', 'avatar', 'html') ?>
          </a>
        </div>
        <div class="info">
          <h3 class="name">
            <a href="<?php echo $root ?>/<?php echo $rRight['slug'] ?>"><?php echo lg_string::crop($rRight['ten'], 16) ?></a>
          </h3>
          <p class="date"><?php echo $translate['Ngày cập nhật'][$lang_code] ?>: <?php echo date('d/m/Y', $rRight['time']) ?></p>
        </div>
        <!-- <?php echo hienThiIconNew($rRight, 30) ?> -->
      </div>
    <?php } ?>
  </div>
<?php } ?>
<div class="content-pages pt40 pb20">
  <div class="container">
    <div class="block-theme-news-1">
      <h1 class="title-pages detail size-big"><?php echo the_title ?></h1>
      <div class="note-detail">
        <?php echo the_note ?>
      </div>
      <div class="album-detail">
        <?php echo albumChiTietBaiViet($id_slug, 'album-baiviet', 'album-baiviet-hinh-anh') ?>
      </div>

      <div class="content-writing">
        <?php echo the_content ?>
      </div>
    </div>
  </div>
</div>
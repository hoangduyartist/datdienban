<div class="content-pages pt40 pb20">
  <div class="container">
    <div class="title-pages detail">
      <h1 class="name"><?php echo the_title ?></h1>
    </div>
  </div>
  <div class="container">
    <div class="row flex-end">
      <div class="col col-16 col-sm-24">
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
      <div class="col col-8 col-sm-24">
        <?php echo showSingleImage($id_slug,'post','avatar','html')?>
      </div>
    </div>
  </div>
</div>
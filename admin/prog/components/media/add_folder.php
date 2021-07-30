<form name="addFolder" class="form-control-add-folder" autocomplete="off">
  <div class="form-control-add-folder--box">
    <div class="form-item">
      <label for="tenThuMuc">Folder name</label>
      <input id="tenThuMuc" name="folderName" type="text">
      <span class="tenThuMuc text-thongbao"></span>
    </div>
    <div class="form-item form-item-action right">
      <button type="button" name="saveFolder" value="FuncSaveFolder" class="btn btn-success">Save</button>
    </div>
    <div class="form-add-folder-thongbao text-thongbao"></div>
  </div>
</form>
<script>
  $(document).ready(function() {
    $('button[name="saveFolder"]').on('click', function(e) {
      e.preventDefault()
      var data = $('form[name="addFolder"]').serializeArray()
      var isCheck = true
      data.map(function(item) {
        switch (true) {
          case (item.name === 'folderName' && item.value.trim() == ""):
            $('input[name="' + item.name + '"]').addClass('error')
            $('.tenThuMuc').addClass('error')
            notificationComponent("tenThuMuc", "ERROR", "Tên thư mục không được để trống!", 1000)
            isCheck = false
            break
          default:
            break
        }
      })
      if (isCheck) {
        $('.text-thongbao').addClass('success')
        $('form[name="addFolder"] button').attr('disabled', true)
        $.when(ajaxAll('POST', '../../admin/ajax/media/luu_thu_muc.php', data)).done(function(result) {
          if (result && result.status) {
            setTimeout(function() {
              $('form[name="addFolder"]').get(0).reset()
              $('form[name="addFolder"] input').removeClass('error success')
              $('.text-thongbao').removeClass('error success')
              $('form[name="addFolder"] button').attr('disabled', false)
              notificationComponent("form-add-folder-thongbao", "SUCCESS", "Tạo thư mục thành công!", 2000)
              window.location.reload();
            }, 500)
          }
        })
      } else {
        setTimeout(function() {
          $('form[name="addFolder"] input').removeClass('error success')
          $('.text-thongbao').removeClass('error success')
        }, 1000);
      }
    })
  })
</script>
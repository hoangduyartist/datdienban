<?php
if (!$_SESSION["username"]) {
  return admin_load("", "/admin");
}
?>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="?act=home"><i class="fa fa-dashboard"></i>AdminCP</a></li>
    <li class="active">Permission</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box-common box-danger">
        <div class="paddinglr10">
          <div class="select-nhomquyen">
            <div class="row-nhomquyen">
              <div class="col-nhomquyen col-nhomquyen-text">
                <p class="reset"><label>Nhóm người dùng</label></p>
              </div>
              <div class="col-nhomquyen col-nhomquyen-form">
                <div class="form-group">
                  <select id="choose-nhomquyen" class="form-control" required="required">
                    <?php
                    $qUserPermission = $db->select("vn_user_group", "is_administrator!=1", "");
                    while ($rUserPermission = $db->fetch($qUserPermission)) {
                    ?>
                      <option value="<?php echo $rUserPermission["id"] ?>"><?php echo $rUserPermission["name"] ?></option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-loading">
              <thead>
                <tr>
                  <th>Danh sách quyền</th>
                  <th class="center">Chọn cho phép</th>
                </tr>
              </thead>
              <tbody id="tableQuyenShow">
                <!-- <?php
                foreach ($authorizedActions as $key => $value) {
                  $qPermission = $db->select("vn_user_permission", "id_user_group=1 and id_user_action='" . $value->id . "'", "");
                  $rPermission = $db->fetch($qPermission);
                ?>
                  <tr>
                    <td><?php echo $value->name ?></td>
                    <td class="center">
                      <input type="checkbox" name="permissionCheck" <?php echo (isset($rPermission["is_check"]) == 1) ? "checked" : "" ?> data-id="<?php echo "1-" . $value->id ?>" value="<?php echo "1-" . $value->id ?>">
                    </td>
                  </tr>
                <?php } ?> -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="notification-right">
  <div class="notification-box">
    <span></span>
  </div>
</div>
<script>
  $(function() {
    var idNhomQuyen = $("#choose-nhomquyen option:selected").val();
    var authorizedActions = <?php echo json_encode($authorizedActions) ?>;
    chooseDataUserGroup(idNhomQuyen, authorizedActions);

    function chooseDataUserGroup(idNhomQuyen, authorizedActions) {
      $("#tableQuyenShow tr.load-data").remove()
      $.ajax({
        type: "POST",
        url: "/admin/ajax/chooseDataUserGroup.php",
        data: {
          idNhomQuyen: idNhomQuyen,
          authorizedActions: authorizedActions
        },
        dataType: "json",
        success: function(response) {
          var isLoading = '';
          response.forEach(element => {
            isLoading = '<tr class="tr-loading">'
            isLoading += '<td class="td-3"><span></span></td>'
            isLoading += '<td class="td-2 center"><span></span></td>'
            isLoading += '</tr>'
            $("#tableQuyenShow").append(isLoading)
          })
          setTimeout(function() {
            $("#tableQuyenShow tr.tr-loading").remove()
            response.forEach(element => {
              var tableQuyen = $('#tableQuyen tbody tr').clone(true)
              tableQuyen.find('tr').attr('data-id', element.id)
              tableQuyen.find('span.name').html(element.name)
              tableQuyen.find('input[name="permissionCheck"]').attr('data-id', element.value)
              tableQuyen.find('input[name="permissionCheck"]').attr('value', element.value)
              tableQuyen.find('input[name="permissionCheck"]').attr('checked', element.checked)
              $("#tableQuyenShow").append(tableQuyen)
            })
          }, 500)
        }
      }).done(function() {
        setTimeout(function() {
          $("#tableQuyenShow tr.tr-loading").remove()
        }, 500);
      })
    }
    $('#choose-nhomquyen').on('change', function() {
      var idNhomQuyen = $("#choose-nhomquyen option:selected").val();
      chooseDataUserGroup(idNhomQuyen, authorizedActions);
    })

    $('input[type="checkbox"][name="permissionCheck"]').on('change', function() {
      var value = $(this).data('id');
      var formData = {};
      var valueSplit = value.split('-');
      formData = {
        idGroupUser: valueSplit[0],
        idAction: valueSplit[1]
      }
      changePermission(formData);
    });

    function changePermission(formData = {}) {
      $.ajax({
        type: "POST",
        url: "/admin/ajax/permission_api.php",
        data: formData,
        dataType: "json",
        success: function(response) {
          if (response.notification) {
            $('.notification-box span').html('Cập nhật thành công!');
            $('.notification-right').addClass('show');
          }
        }
      }).done(function() {
        setTimeout(function() {
          $('.notification-box span').html('');
          $('.notification-right').removeClass('show');
        }, 500);
      })
    }
  });
</script>
<div id="clone-wrapper" style="display: none">
  <table id="tableQuyen">
    <tbody>
      <tr class="load-data">
        <td><span class="name"></span></td>
        <td class="center" style="width:166px">
          <input type="checkbox" name="permissionCheck" checked="" data-id="" value="">
        </td>
      </tr>
    </tbody>
  </table>
</div>
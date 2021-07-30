<?php
if (!$_SESSION["username"] || $_SESSION["member_role"] == "Member") {
  return admin_load("", "/admin");
}
include 'constants/variables.php';
$tik = isset($_POST['tik']) ? $_POST['tik'] : '';
$func = isset($_POST['func']) ? $_POST['func'] : '';
if ($func == FORMACTION::ACT_DELETE) {
  for ($i = 0; $i < count($tik); $i++) {
    $db->delete("vn_user_group", "id = '" . $tik[$i] . "'");
  }
  admin_load("", "?act=user_groups");
  die();
}
?>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="?act=home"><i class="fa fa-dashboard"></i>AdminCP</a></li>
    <li class="active">Users</li>
  </ol>
</section>
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box-common box-danger">
        <div class="box-header with-border">
          <div class="pull-left heading-left">
            <h3 class="box-title">Danh sách</h3>
          </div>
          <div class="pull-right">
            <?php if (conditionPermission($post_type, "USER_GROUPS_NEW", "code")) { ?>
              <a class="btn btn-primary" href="?act=user_groups_action">Thêm mới</a>
            <?php } ?>
          </div>
          <div class="clear"></div>
        </div>
        <div class="paddinglr10">
          <div class="table-responsive">
            <form action="?act=user_groups" method="post" onsubmit="return confirm('Bạn có muốn xóa?');">
              <input type="hidden" name="func" value="del" />
              <table class="table table-striped">
                <thead>
                  <tr class="tb_head">
                    <th>#</th>
                    <th>Name</th>
                    <th>Role</th>
                    <?php if ($_SESSION["level"] == 0) { ?>
                      <th class="center">Is Administrator</th>
                    <?php } ?>
                    <th class="center"></th>
                    <?php if ($_SESSION["level"] == 0) { ?>
                      <th class="center">Delete</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $count = 0;
                  $query = "";
                  if ($_SESSION["is_administrator"] != 1) {
                    $query = 'is_administrator!=1';
                  }
                  $r = $db->select("vn_user_group", "$query", "order by id desc");
                  while ($row = $db->fetch($r)) {
                    $count++;
                  ?>
                    <tr>
                      <th scope="row"><?php echo $count ?></th>
                      <td><span class="url cat1"><?php echo $row["name"] ?></span></td>
                      <td><span><?php echo $row["role"] ?></span></td>
                      <?php if ($_SESSION["level"] == 0) { ?>
                        <td class="center">
                          <span class="is-bool">
                            <?php if ($row["is_administrator"] == 0) { ?>
                              <i class="fa fa-times no" aria-hidden="true"></i>
                            <?php } else { ?>
                              <i class="fa fa-check yes" aria-hidden="true"></i>
                            <?php } ?>
                          </span>
                        </td>
                      <?php } ?>
                      <td class="center">
                        <?php if (conditionPermission($post_type, "USER_GROUPS_EDIT", "code")) { ?>
                          <a class="item-icon-action" href="?act=user_groups_action&id=<?php echo $row["id"] ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Sửa</a>
                        <?php } ?>
                      </td>
                      <?php if ($_SESSION["level"] == 0) { ?>
                        <td class="center">
                          <input name="tik[]" type="checkbox" value="<?php echo $row["id"] ?>" />
                        </td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td colspan="<?php echo ($_SESSION["level"] == 0) ? '5' : '4' ?>"></td>
                    <?php if ($_SESSION["level"] == 0) { ?>
                      <td class="center">
                        <button class="btn btn-danger" type="submit" name="func" value="<?php echo FORMACTION::ACT_DELETE ?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</button>
                      </td>
                    <?php } ?>
                  </tr>
                </tfoot>
              </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
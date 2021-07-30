<?php
if (!$_SESSION["username"]) {
  return admin_load("", "/admin");
}
include './constants/variables.php';
$act = isset($_GET['act']) ? $_GET['act'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$submit = isset($_POST['submit']) ? $_POST['submit'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';
$is_administrator = isset($_POST['is_administrator']) ? $_POST['is_administrator'] : 0;
$OK = 0;
$editGo = false;
$isCheck = true;
if ($id != 0) {
  $actionName = STRINGVALUE::chinhSua;
  $action = FORMACTION::ACT_EDIT;
  // kiểm tra tồn tại
  $q = $db->select("vn_user_group", "id='" . $db->escape($id) . "'");
  $r = $db->fetch($q);
  if ($r['id'] != 0) {
    $editGo = true;
    $name = isset($_POST['name']) ? $_POST['name'] : $r["name"];
    $role = isset($_POST['role']) ? $_POST['role'] : $r["role"];
    $is_administrator = isset($_POST['is_administrator']) ? $_POST['is_administrator'] : $r["is_administrator"];
  } else {
    return admin_load("", "?act=user_groups");
  }
} else {
  $actionName = STRINGVALUE::themMoi;
  $action = FORMACTION::ACT_NEW;
}
?>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
    <li><a class="active" href="?act=user_groups">User groups</a></li>
  </ol>
</section>
<!--/. content-header-->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box-common box-green">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $actionName ?></h3>
          <div class="clear"></div>
        </div>
        <div class="paddinglr10">
          <?php
          include "templates/user_groups_form.php";
          if ($submit) {
            if (empty($name)) {
              $error = STRINGVALUE::nhapTen;
              $isCheck = false;
            }
            if (empty($role)) {
              $error = STRINGVALUE::nhapVaiTro;
              $isCheck = false;
            }

            if ($action == FORMACTION::ACT_NEW) {
              if ($isCheck) {
                $OK = $db->insert("vn_user_group", "id, name, role, is_administrator", "0, '" . $db->escape($name) . "', '" . $db->escape($role) . "', '" . $db->escape($is_administrator) . "'");
              }
            } else {
              if ($isCheck) {
                if ($editGo == true) {
                  $OK = $db->query("update vn_user_group set name='" . $db->escape($name) . "', role='" . $db->escape($role) . "', is_administrator='" . $db->escape($is_administrator) . "' where id = '" . $id . "'");
                }
              }
            }
            if ($OK) {
              admin_load("", "?act=user_groups");
            }
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</section>
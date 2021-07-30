<?php
session_start();
ob_start();
include "../../_CORE/index.php";
include "../../app/config/config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
$table = isset($_GET['table']) ? $_GET['table'] : '';
$column = isset($_GET['column']) ? $_GET['column'] : '';
$id = isset($_GET['id']) ? $_GET['id'] : '';
$data = isset($_GET['data']) ? $_GET['data'] : '';
$notification = array();
$notification["success"] = false;
$notification["thongBao"] = "Error";
if ($table && $id && $data) {
  $OK = $db->query("update $table set $column = $data where id = '".$id."'");
  if ($OK) {
    $notification["success"] = true;
    $notification["thongBao"] = "Cập nhật thành công!";
  }
}
echo json_encode($notification);
?>
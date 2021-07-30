<?php
session_start();
error_reporting(0);
set_time_limit(0);
include "../../_CORE/index.php";
include "../../app/config/config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
$id = isset($_POST['id']) ? $_POST['id'] : "";
$className = isset($_POST['className']) ? $_POST['className'] : "";
$imagesUrl = isset($_POST['imagesUrl']) ? $_POST['imagesUrl'] : "";
$q = $db->select("vn_menu","menu_id ='".$id."'","");
$result = true;
if ($db->num_rows($q) > 0) {
  try {
    $db->query("update vn_menu set class_name='".$className."', images_url='".$imagesUrl."' where menu_id='".$id."'");
  } catch (\Throwable $th) {
    $result = $th;
  }
}
echo json_encode($result);
?>
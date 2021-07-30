<?php
session_start();
@error_reporting(0);
@set_time_limit(0);
include "../../_CORE/index.php";
include "../../app/config/config.php";
include "../../admin/function.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
isset($_POST["dragItemId"]) ? $dragItemId = (int)$_POST["dragItemId"] : $dragItemId = 0;
isset($_POST["dragBoxId"]) ? $dragBoxId = $_POST["dragBoxId"] : $dragBoxId = '';
$result = array();
$result["notification"] = false;
if ($dragItemId!=0) {
  $db->query("update postcat SET theme_keys = '".$dragBoxId."' where id = $dragItemId");
  $result["notification"] = true;
}

echo json_encode($result);
?>
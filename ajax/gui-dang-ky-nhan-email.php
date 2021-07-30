<?php
session_start();
ob_start();
include "../_CORE/index.php";
include "../app/config/config.php";
$db	=	new	lg_mysql($host,$dbuser,$dbpass,$csdl);
include "../app/start/func.php";
include "../app/actions/sendEmail.php";
$resut = array(
  'status' => false,
  'notification' => "Success"
);
isset($_SESSION['tokenId']) ? $userId = $_SESSION['tokenId'] + 0 : $userId = 0;
isset($_POST['email']) ? $emailValue = $_POST['email'] : $emailValue = null;
isset($_POST['type']) ? $typeValue = $_POST['type'] : $typeValue = null;
isset($_POST['typeName']) ? $typeName = $_POST['typeName'] : $typeName = null;
$contentValue = "Đăng ký nhận thông tin khuyến mãi";
if ($emailValue) {
  $db->query("INSERT INTO vn_contacts (email, content, user_id, type, type_name, time) VALUES ('".$emailValue."', '".$contentValue."', $userId, '".$typeValue."', '".$typeName."', '".time()."')");
  $resut['status'] = true;
}

echo json_encode($resut);
?>
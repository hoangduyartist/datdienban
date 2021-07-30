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
isset($_POST['name']) ? $nameValue = $_POST['name'] : $nameValue = null;
isset($_POST['email']) ? $emailValue = $_POST['email'] : $emailValue = null;
isset($_POST['phone']) ? $phoneValue = $_POST['phone'] : $phoneValue = null;
isset($_POST['content']) ? $contentValue = $_POST['content'] : $contentValue = null;
isset($_POST['type']) ? $typeValue = $_POST['type'] : $typeValue = null;
isset($_POST['typeName']) ? $typeName = $_POST['typeName'] : $typeName = null;
isset($_POST['actualLink']) ? $actualLink = $_POST['actualLink'] : $actualLink = null;
isset($_POST['department']) ? $department = $_POST['department'] : $department = 0;

$contentemail = "<br /> <b>THÔNG TIN KHÁCH HÀNG LIÊN HỆ:</b><br />".
  "------------------------------<br />".
  (($nameValue)?"Họ & tên : ".$nameValue."<br />":"").
  (($phoneValue)?"Số điện thoại : ".$phoneValue."<br />":"").
  (($emailValue)?"Địa chỉ email : ".$emailValue."<br />":"").
  (($contentValue)?"Nội dung liên hệ : ".$contentValue."<br /><br /><br />":"").
  '<div style="color: #7e7e7e; font-size: 12px; text-align: left; font-weight: normal; line-height: 19px;">Truy cập: <a target="_blank" href="'.$domain.'">'.$domain.'</a> để biết thêm thông tin. Xin cảm ơn! <br/>Liên hệ: <b>  '.get_bien("hotline","none").' </b>Email: <b> '.get_bien("email","none").'</b></div>';

if ($nameValue && $emailValue && $contentValue) {
  $db->query("INSERT INTO vn_contacts (name, email, phone, content, user_id, type, type_name, time, full_url, department) VALUES ('".$nameValue."', '".$emailValue."', '".$phoneValue."', '".$contentValue."', $userId, '".$typeValue."', '".$typeName."', '".time()."', '".$actualLink."', '".$department."')");
  $subject = "Contact customer - ".$nameValue." - ".$phoneValue;
  sendEmail($subject, $emailValue, $nameValue, $phoneValue, $contentemail);
  $resut['status'] = true;
}

echo json_encode($resut);
?>
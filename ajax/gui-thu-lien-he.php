<?php
ob_start();
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
ob_start();
include "../_CORE/index.php";
include "../app/config/config.php";
$db		=	new	lg_mysql($host,$dbuser,$dbpass,$csdl);
include("../app/start/func.php");
include "../app/packages/mail/class.phpmailer.php"; 
include "../app/packages/mail/class.smtp.php";
$name="";
$email="";
$phone="";
$message="";
if(isset($_POST['name'])){$name=$_POST['name'];}
if(isset($_POST['email'])){$email=$_POST['email'];}
if(isset($_POST['phone'])){$phone=$_POST['phone'];}
if(isset($_POST['message'])){$message=$_POST['message'];}
$notification = array();
$notification["success"] = true;
$notification["thongBao"] = "";
if ($name && $phone && $message)
{
  $contentemail = "<b>Thông tin liên hệ</b><br>".
  "-------------------------------------<br><br>".
  (($name)?"Full Name: ".$name."<br>":"").
  (($email)?"Email: ".$email."<br>":"").
  (($phone)?"Phone number: ".$phone."<br>":"").
  (($message)?"Message: ".$message."<br>":"").
  "<br><br>".
  '<div style="color: #7e7e7e; font-size: 12px; text-align: left; font-weight: normal; line-height: 19px;" >Truy cập <a target="_blank" href="'.$domain.'">'.$domain.'</a> để biết thêm về Dự án, Xin cảm ơn.!<br>Hotline: <b>'.get_bien("hotline","none").' </b>Email: <b>'.get_bien("email","none").'</b><br>'.
  'Bạn cũng có thể đến trực tiếp theo địa chỉ: <b>'.get_bien('address','vn').'</b></div>';
  $OK = $db->insert("lienhe","ten,email,phone,noi_dung,time,loai"," '".$name."', '".$email."', '".$phone."', '".$message."', '".time()."', 0");
  if($OK)
  {    
    $mail = new PHPMailer();
    $mail->charSet = "UTF-8";
    $mail->IsSMTP(); // set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com'; // specify main and backup server
    $mail->Port = '465'; // set the port to use
    $mail->SMTPAuth = true; // turn on SMTP authentication
    $mail->SMTPSecure = 'ssl';
    $mail->Username = get_bien("email_transport",'none'); // your SMTP username or your gmail username
    $mail->Password = get_bien("pass_transport",'none'); // your SMTP password or your gmail password
    $emailFrom = get_bien("title")."<".$email.">";
    $to = get_bien("email","none"); // Recipients email ID
    $name = get_bien("title"); // Recipient's name
    $mail->From = $email;
    $mail->FromName = get_bien("title"); // Name to indicate where the email came from when the recepient received
    $mail->AddAddress($to,$name); // name is optional
    //$mail->AddAddress($to,$name);
    $mail->AddReplyTo($email,"Khách hàng");
    $mail->WordWrap = 50; // set word wrap
    $mail->IsHTML(true); // send as HTML
    $mail->Subject = "[THÔNG TIN LIÊN HỆ] - ".$phone;
    $mail->Body = $contentemail;
    $mail->AltBody = "Mail PHP Mailer"; //Text Body
    // $mail->SMTPDebug = 2;
    
    if($mail->Send())
    {
      $notification["thongBao"] = "Success!";
    }
    else
    {
      $notification["thongBao"] = "System error!";
    }
  }
  else
  {
    $notification["thongBao"] = "There is an error from your DB!";
    $notification["success"] = false;
  }
}

echo json_encode($notification);
?>
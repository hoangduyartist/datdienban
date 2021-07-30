<?
if ($func=='send')
{
    $txtEmail = $_POST['txtEmail'];
    $txtName = $_POST['txtName'];   
    $txtSubject = $_POST['txtSubject'];
    $txtContent = $_POST['txtContent']; 
    $txtTel = $_POST['txtTel'];
    $txtAddress = $_POST['txtAddress'];
    $txtCompany = $_POST['txtCompany'];
    $qc=$db->select("lienhe","ten='".$txtName."' and email='".$txtEmail."' and noi_dung='".$txtContent."'","");
    if($db->num_rows($qc)!=1){
        $partten = "/^[A-Za-z0-9_\.]{6,32}@([a-zA-Z0-9]{2,12})(\.[a-zA-Z]{2,12})+$/";
        $CHECK = TRUE;
        if(!preg_match($partten ,$txtEmail, $matchs)) {
            $CHECK=FALSE;
            $thongbaoud = "<p class='alert alert-danger'>Email của bạn không đúng</p>";
        }
        else if (empty($txtName)){
            $CHECK=FALSE;
            $thongbaoud = "<p class='alert alert-danger'>Bạn chưa nhập họ & tên</p>";
        }
        else if (empty($txtTel)){
            $CHECK=FALSE;
            $thongbaoud = "<p class='alert alert-danger'>Bạn chưa nhập số điện thoại</p>";
        }
        $contentemail .= "<br /> <b>THÔNG TIN  KHÁCH HÀNG LIÊN HỆ:</b><br />".
            "------------------------------<br />".
            (($txtName)?"Họ tên : ".$txtName."<br />":"").
            (($txtAddress)?"Địa chỉ : ".$txtAddress."<br />":"").
            (($txtTel)?"Số điện thoại : ".$txtTel."<br />":"").
            (($txtEmail)?"Email : ".$txtEmail."<br />":"").
            (($txtContent)?"Ghi chú : ".$txtContent."<br /><br /><br />":"").
            '<div style="color: #7e7e7e; font-size: 12px; text-align: left; font-weight: normal; line-height: 19px;" >Truy cập vào <a target="_blank" href="'.$domain.'"> '.$domain.' </a> để biết thêm thông tin. Xin cảm ơn.! <br/>Hotline: <b>  '.get_bien("hotline","none").' </b>Email: <b> '.get_bien("email","none").' </b> <br/> Bạn cũng có thể đến trực tiếp theo địa chỉ: <b> '.get_bien("address").' </b> </div>';
        if ($CHECK){
            $OK = $db->insert("lienhe","ten,email,noi_dung,phone,time","'".$txtName."','".$txtEmail."','".$txtContent."','".$txtTel."','".time()."'");
           if($OK)
           {
                $mail = new PHPMailer();
                $mail->IsSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->Port = '465';
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'ssl';
                $mail->Username = get_bien("email_transport",'none');
                $mail->Password = get_bien("pass_transport",'none');
                $to = get_bien("email","none");
                $name = get_bien("title");
                $mail->From = $txtEmail;
                $mail->FromName = get_bien("title");
                $mail->AddAddress($to,$name);
                $mail->AddReplyTo($txtEmail,"Khách hàng");
                $mail->WordWrap = 50; // set word wrap
                $mail->IsHTML(true); // send as HTML
                $mail->Subject = "Khách hàng liên hệ - ".$txtName." - ".$txtTel;
                $mail->Body = $contentemail;
                $mail->AltBody = "Mail nay duoc gui bang PHP Mailer"; //Text Body
                //$mail->SMTPDebug = 2;
                if($mail->Send())
                {   
                
                    $thongbaoud = "<p class='alert alert-success'>Thành công.</p>";
                }
                else
                {
                    $thongbaoud = "<p class='alert alert-danger'>Không thể chấp nhận yêu cầu của bạn vì có một số lỗi hệ thống từ phía máy chủ.<br/> Bạn vui lòng thử lại lần sau.</p>";
                }
            }
            else
            {
                $thongbaoud = "<p class='alert alert-danger'>Database not support!</p>";
            }
        }
    }
}

?>

<div class="content__wrapper contact_box">
    <div class="container">
        <h1 class="content_right_title"><?php echo $translate['Liên hệ với chúng tôi'][$lang_code]; ?></h1>
                <?php echo get_breadcums(); ?>
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 margintb10 wow fadeInLeft">
                <style>
            ::-webkit-input-placeholder { color: #555;}
            ::-moz-placeholder {  color: #555;}
            :-ms-input-placeholder {   color: #555;}
            :-moz-placeholder {  color: #555;}
            </style>
                <div class="box_form_lienhe">
                    <?if($thongbaoud!=''){?><?=$thongbaoud?><?}?>
                    <form name="form_dkud" action="<?=$root?>/lien-he.html" method="post" class="form_contact">
                        <input type="hidden" name="func" value="send" />
                        <input style="margin-bottom: 25px;color: #555;" required="" class="input_form" type="text" id="txtName" value="<?=$txtName?>" name="txtName" placeholder="Họ & tên *"/>

                        <input class="pt50" style="margin-bottom: 25px;color: #555;width: 48%;float: left;" required="" class="input_form" type="email" id="txtEmail" value="<?=$txtEmail?>" name="txtEmail" placeholder="E-mail *"/>
                        <input class="pt50" style="margin-bottom: 25px;color: #555;width: 48%;float: right;" required="" class="input_form" type="text" id="txtTel" value="<?=$txtTel?>" name="txtTel" placeholder="SĐT *"/>
                        <textarea style="color: #555;" class="textarea_form" id="txtContent" rows="6" name="txtContent" placeholder="Lời nhắn:"><?=$txtContent?></textarea>
                        <button style="margin-top: 25px;" class="buton2" type="submit" id="send" value="send"><?php echo $translate['Gửi ngay'][$lang_code]; ?></button>
                    </form>
                    <div class="clear"></div>                
                </div>
            </div>
            <div class="col-lg-6 bottom-contact wow fadeInRight">
                <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKx1tzHtZgjBvUxsOQgfBVbaTTV7ycSdo" type="text/javascript"></script>
                <script type="text/javascript">
                      var map;
                    function initiadivze() {
                          var myLatlng = new google.maps.LatLng(<?=get_bien('maps','none')?>);
                          var myOptions = {
                        zoom: 16,
                         center:new google.maps.LatLng(<?=get_bien('maps','none')?>),
                        mapTypeId: google.maps.MapTypeId.ROADMAP,            
                         
                         
                    }
                    map = new google.maps.Map(document.getElementById("div_id"), myOptions); 
                      // Biến text chứa nội dung sẽ được hiển thị
                        var text;
                        text= "<b><?=get_bien('name')?></b> <br/> <?=get_bien('address')?>";
                       var infowindow = new google.maps.InfoWindow(
                        { content: text,
                            size: new google.maps.Size(100,50),
                            position: myLatlng
                        });
                           infowindow.open(map); 
                        var marker = new google.maps.Marker({
                          position: myLatlng, 
                          map: map,
                          title:""
                      });
                    }
                </script>
                <body onLoad="initiadivze()">
                    <div  id="div_id" style="height: 359px; width: 100%;"></div>
                </body> 
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
 var img = document.images['captchaimg'];
 img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
<div class="box-right2 mt3">
    <div class="box-form">
    <p>
        <img class="img-responsive" src="<?=$domain?>/public/images/logo5.png" alt="đất Điên Thắng giá rẻ">
    </p>
    <div class="title" style="text-align: center;">Nhận báo giá và thông tin chi tiết</div>
    <?php 
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
                $thongbaouk = "<p class='alert alert-danger'>Email của bạn không đúng</p>";
            }
            else if (empty($txtName)){
                $CHECK=FALSE;
                $thongbaouk = "<p class='alert alert-danger'>Bạn chưa nhập họ & tên</p>";
            }
            else if (empty($txtTel)){
                $CHECK=FALSE;
                $thongbaouk = "<p class='alert alert-danger'>Bạn chưa nhập số điện thoại</p>";
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
                $OK = $db->insert("lienhe","ten,email,noi_dung,phone,time,type","'".$txtName."','".$txtEmail."','".$txtContent."','".$txtTel."','".time()."','dai_ly'");
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
                    
                        $thongbaouk = "<p class='alert alert-success'>Thành công.</p>";
                    }
                    else
                    {
                        $thongbaouk = "<p class='alert alert-danger'>Không thể chấp nhận yêu cầu của bạn vì có một số lỗi hệ thống từ phía máy chủ.<br/> Bạn vui lòng thử lại lần sau.</p>";
                    }
                }
                else
                {
                    $thongbaouk = "<p class='alert alert-danger'>Database not support!</p>";
                }
            }
        }
    }

    ?>
    <?=$thongbaouk?>
    <form name="form_dkud" action="" method="post" class="form_contact contact-right">
        <input type="hidden" name="func" value="send" />
        <input required="" type="text" id="txtName" value="<?=$txtName?>" name="txtName" placeholder="Họ & tên *"/>

        <input required="" type="email" id="txtEmail" value="<?=$txtEmail?>" name="txtEmail" placeholder="E-mail *"/>
        <input required="" type="text" id="txtTel" value="<?=$txtTel?>" name="txtTel" placeholder="SĐT *"/>
        <textarea id="txtContent" rows="6" name="txtContent" placeholder="Lời nhắn: Quý khách vui lòng điền yêu cầu thông tin chi tiết nhất ở đây, để chúng tôi có thể hỗ trợ tốt nhất thông tin quý khách yêu cầu. Trân trọng!"><?=$txtContent?></textarea>
        <button class="btn btn-primary center-block" type="submit" id="send" value="send">Yêu cầu ngay bây giờ</button>
    </form>
    </div>
</div>
<div class="box-right">
    <h3 class="title">Mua bán đất Điện Thắng giá rẻ</h3>
    <ul>
        <?php 
        $q=$db->selectpostcat("hien_thi=1 and post_type='catproduct'","order by level,thu_tu");
        while($r=$db->fetch($q)){
        ?>
        <li><a href="<?php echo $root.'/'.get_slug_postcat($r['postcat_id']).'/'; ?>"><?=$r['name']?> (<?php echo get_sql("select count(id) from post where (cat=".$r['postcat_id']." or cat1=".$r['postcat_id']." or cat2=".$r['postcat_id'].")"); ?>)</a></li>
        <?php } ?>
    </ul>
</div>
<div class="box-right1 trien_khai">
    <h3 class="title">Dự án nổi bật đang triển khai</h3>
    <ul>
        <?php 
        $q=$db->selectpost("hien_thi=1 and cat='9'","order by noi_bat desc,thu_tu,time desc limit 5");
        while($r=$db->fetch($q)){
        ?>
        <li class="">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="row">
                <a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=get_single_image($r['post_id'],"post","avatar")?></a>
                </div>
            </div>
            <div class="col-lg-8 col-md-8  col-sm-8 col-xs-8">
                <a class="name" href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=$r['ten']?></a>
                <p class="note"><?=lg_string::crop($r['chu_thich'],15)?></p>
            </div>
            <div class="clear"></div>
        </li>
        <?php } ?>
    </ul>
</div>
<?php
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
ob_start();
include "_CORE/index.php";
include("app/config/config.php");
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
$THANHVIEN["id"] = 0;
include("app/start/dem_online.php");
include("app/config/route.php");

if($post_type=='404'){
  header('location: /');
}else{
include("app/start/func.php");
include "app/packages/mail/class.phpmailer.php"; 
include "app/packages/mail/class.smtp.php";
// include "app/packages/shopping-cart/cart_item.class.php"; 
// include "app/packages/shopping-cart/shopping_cart.class.php";
 $func='';
if(isset($_POST['func'])){$func = $_POST['func'];}
?>
<!DOCTYPE html>
<html lang="vi-vn">
<head>
<?php include "z_includes/_html_head.php"; ?>
<?php include "app/lang/translate.php"; ?>

</head>
<body>
<div id="fullpage">
  <div class="visible-xs"><? include 'z_includes/menuresponsive.php';?></div>
  <section class="top_wrapper">
    <div class="container">
      <div class="">
        <div class="logo_top">
          <?if($post_type==''|$post_type=='home'){?>
        <h1 id="site-title" class="logo h1 img-logo" style="font-size: 0;line-height: 0;margin: 0;"><a class="logo-img" href="<?=$root?>"><?=get_bien('title')?> - Đất Điện Thắng - Bán Đất Điện Thắng - Bán đất Điện Thắng Trung<img id="site-logo" src="<?=$domain?>/public/images/logo4.png" alt="<?=get_bien('title')?>" class="img-responsive" data-bsrjs="<?=$domain?>/public/images/logo4.png"/></a></h1>
        <?}else{?>
        <h3 id="site-title" class="logo h6 img-logo" style="font-size: 0;line-height: 0;margin: 0;"><a class="logo-img" href="<?=$root?>"><?=get_bien('title')?><img id="site-logo" src="<?=$domain?>/public/images/logo4.png" alt="<?=get_bien('title')?>" class="img-responsive" data-bsrjs="<?=$domain?>/public/images/logo4.png"/></a></h3>
        <?}?>
        </div>
        <div class="top_wrapper_right">
          <ul class="ul_top">
            <li class="incon_you an-600" >
                <?php echo show_social(); ?>
            </li>
            <li class=" icon_mail hidden-sm hidden-xs">
              <a href="mailto:<?=get_bien('email')?>"><img alt="mail" class="img-responsive" src="<?=$domain?>/public/images/imm_icon.png"/> &nbsp;&nbsp;<span class=""><?=get_bien('email','none')?></span></a></li>
            <li><a class="ky_gui" href="<?=get_bien('OTHERM34451mFdA','none')?>">Ký gửi nhanh</a></li>
            <li class="icon_phone"><a href="tel:<?=get_bien('fax','none')?>"><img  alt="hotline"  class="img-responsive" src="<?=$domain?>/public/images/email_icon.png"/>&nbsp;<span class="text_phone"> <?=get_bien('fax','none')?></span></a></li>
                <div class="clear"></div>
          </ul>
          <div class="clear"></div>
          <div class="top_menu_wrapper hidden-xs">
            <?=show_menu(1,'false','ul_top_1')?>
          </div>
        </div>
       </div> 
      </div>
  </section>
  <section class="main" id="main">
  <?php if($callpage!=''){
    include "z_modules/".$callpage.".php";
  }else{
    if($slugnew=='')   
      {
          include "z_modules/home.php";
      }
      else
      {
          include "z_modules/".$post_type.".php";
      }
  }?>
  </section>
  <?php if($post_type==''||$post_type=='news'){ ?>
  <section class="about_wrapper">
    <div class="container">
      <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about_left">
            <h3 class="about_tile neo_boder wow fadeInDown" title="Công Ty TNHH Đất Điện Thắng">Về đất Điện Thắng</h3>
            <p class=" wow fadeInUp"><?=show_infopage('about_us','chu_thich',2)?></p>
            <div class="about_h wow fadeInUp"><a class="about_chitie" href="<?=$domain?>/gioi-thieu.html">chi tiết</a></div>
            <div class="clear"></div>
        </div>
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 about_right">
              <ul class="row">
              <?php
              $q=$db->selectmedia("hien_thi=1 and parent_id=7 and parent_type='gallery'","order by thu_tu");
              while($r=$db->fetch($q)){
              ?>
                <li class="col-lg-6 col-md-6 col-sm-6 col-xs-6 wow fadeInRight" ><a class="fancybox" href="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>"><img alt="<?=$r['ten']?>" class=" img-responsive " src="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>"></a></li>
              <?php }?>
              </ul>
          </div>
      </div>
    </div>
  </section>
  <?php } ?>
  <section class="line_boder"></section>
  <section class="silde_patner">
    <div class="container">
      <div class="left">
        <?php if($post_type != 'catproduct'){ ?>
        <h5 class="name">Đối tác & Khách hàng</h5>
        <?php } else { ?>
        <div class="name">Đối tác & Khách hàng</div>
        <?php } ?>
        
      </div>
      <ul id="cc-slider" class="owl-carousel owl-theme">
        <?
        $q=$db->selectmedia("hien_thi=1 and parent_id=2 and parent_type='gallery'","order by thu_tu");
        if($db->num_rows($q) != 0){
        while($r=$db->fetch($q)){
        ?>
        <li class="col-lg-12">
            <a target="_blank" href="<?=$r['url']?>"><img class="img-responsive" src="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>" alt="<?=$r['title']?>" /></a>
        </li>
        <? } } else {echo 'Updating...';}?>
      </ul>
    </div>
  </section>
  <section class="line_boder"></section>
  <section id="footer" >
    <div class="container">
      <div class="row box_footer">
        
        <div class="col-sm-push-6 col-sm-6 col-xs-12 item">
          <div class="row">
            <div class="form-footer wow fadeIn">
            <?
            if ($func=='req_submit')
            {
                $txtEmail = $_POST['txtEmail'];
                $txtName = $_POST['txtName'];   
                $txtSubject = $_POST['txtSubject'];
                $txtContent = $_POST['txtContent']; 
                $txtTel = $_POST['txtTel'];
                $txtAddress = $_POST['txtAddress'];
                $txtCompany = $_POST['txtCompany'];
                $post_id = $_POST['post_id'];
                $CHECK = TRUE;
                if($post_id==''){
                    $qchch= $db->select("lienhe","ten = '".$txtName."' and email = '".$txtEmail."' and phone = '".$txtTel."' and noi_dung = '".$txtContent."'");
                }else{
                    $qchch= $db->select("lienhe","ten = '".$txtName."' and email = '".$txtEmail."' and phone = '".$txtTel."' and post_id = '".$post_id."'");
                }
                if (!ereg("[A-Za-z0-9_-]+([\.]{1}[A-Za-z0-9_-]+)*@[A-Za-z0-9-]+([\.]{1}[A-Za-z0-9-]+)+", $txtEmail)) {
                    $CHECK=FALSE;
                    $notify = "Email của bạn không đúng!";
                }
                else if (empty($txtName)){
                    $CHECK=FALSE;
                    $notify = "Bạn chua nhập tên";
                }
                else if (empty($txtTel)){
                    $CHECK=FALSE;
                    $notify = "Bạn chưa nhập sđt";
                }
                $contentemail .= "<br /> <b>THÔNG TIN  KHÁCH HÀNG:</b><br />".
                    "------------------------------<br />".
                    (($txtName)?"Họ tên : ".$txtName."<br />":"").
                    (($txtAddress)?"Ðịa chỉ : ".$txtAddress."<br />":"").
                    (($txtTel)?"Số điện thoại : ".$txtTel."<br />":"").
                    (($txtEmail)?"Email : ".$txtEmail."<br />":"").
                    (($txtContent)?"Ghi chú : ".$txtContent."<br /><br /><br />":"").
                    (($post_id)?"Dự án : ".get_sql("select ten from post_lang where post_id=".$post_id)."<br /><br /><br />":"").
                    '<div style="color: #7e7e7e; font-size: 12px; text-align: left; font-weight: normal; line-height: 19px;" >Truy cập vào <a target="_blank" href="'.$domain.'"> '.$domain.' </a> để biết thêm thông tin. Xin cảm ơn.! <br/>Hotline: <b>  '.get_bien("hotline","none").' </b>Email: <b> '.get_bien("email","none").' </b> <br/> Bạn cũng có thể đến trực tiếp theo địa chỉ: <b> '.get_bien("address").' </b> </div>';
                //N?i dung liên h? v? email
                if ($CHECK&&$db->num_rows($qchch)==0){
                    $OK = $db->insert("lienhe","ten,email,dia_chi,tieu_de,noi_dung,phone,company_name,time,post_id","'".$txtName."','".$txtEmail."','".$txtAddress."','".$txtSubject."','".$txtContent."','".$txtTel."','".$txtCompany."','".time()."','".$post_id."'");
                   if($OK)
                   {    
                      $mail = new PHPMailer();
                      $mail->IsSMTP(); // set mailer to use SMTP
                      $mail->Host = 'smtp.gmail.com'; // specify main and backup server
                      $mail->Port = '465'; // set the port to use
                      $mail->SMTPAuth = true; // turn on SMTP authentication
                      $mail->SMTPSecure = 'ssl';
                      $mail->Username = get_bien("email_transport",'none');
                      $mail->Password = get_bien("pass_transport",'none');
                      
                      $emailFrom = get_bien("title")."<".$txtEmail.">";
                      
                      //$from = "trannhatbaoit@gmail.com"; // Reply to this email
                      $to = get_bien("email","none"); // Recipients email ID
                      $name = get_bien("title"); // Recipient's name
                      $mail->From = $txtEmail;
                      $mail->FromName = get_bien("title"); // Name to indicate where the email came from when the recepient received
                      
                      $mail->AddAddress($to,$name);                  // name is optional
                      
                      //$mail->AddAddress($to,$name);
                      $mail->AddReplyTo($txtEmail,"Khách hàng");
                      $mail->WordWrap = 50; // set word wrap
                      $mail->IsHTML(true); // send as HTML
                      $mail->Subject = "Email từ khách - ".$txtName." - ".$txtTel;
                      $mail->Body = $contentemail;
                      $mail->AltBody = "Mail nay duoc gui bang PHP Mailer"; //Text Body
                      //$mail->SMTPDebug = 2;
                      
                      if($mail->Send())
                      { 
                        $notify = "<div class='alert alert-success' role='alert'><strong>CHÚC MỪNG:</strong> bạn đã gởi thông tin thành công!</div>";
                      }
                      else
                      {
                          $notify = "<div class='alert alert-warning' role='alert'><strong>Ooop!</strong>Lỗi hệ thống từ phía máy chủ.<br/> Bạn vui lòng thử lại sau.</div>";
                      }
                    }
                    else
                    {
                        $notify = "Có lỗi";
                    }
                    //check email v? d?a ch? Email
                }
            }

            ?>
            <div class="block-center-title">
              <?php if($post_type != 'catproduct'){ ?>
              <h5 class="text-uppercase">Liên hệ với chúng tôi</h5>
              <?php } else { ?>
              <div class="text-uppercase">Liên hệ với chúng tôi</div>
              <?php } ?>
            </div>
            <div class="form-nw row">
              <form action="" method="post" class="form_contact" style="padding: 10px 0;">
                <?php if($post_type!='project_detail'){echo $notify;}?>
                <input class="input_form" type="hidden" name="func" value="req_submit" />
                <div class="col-sm-12">
                    <input id="txtName" name="txtName" required="" type="text" placeholder="<?=$translate['Họ tên'][$lang_code]?>*" />
                </div>
                <div class="col-sm-12">
                    <input id="txtEmail" required="" name="txtEmail" type="text" placeholder="Email*" />
                </div>
                <div class="col-sm-12">
                    <input required="" id="txtTel" name="txtTel" type="text" placeholder="<?=$translate['Sđt'][$lang_code]?>*" />
                </div>
                <div class="col-sm-12">
                    <textarea id="txtContent" name="txtContent" style="resize: none;" rows="2" required="" placeholder="Lời nhắn" ></textarea>
                </div>
                <div class="col-sm-12 text-center">
                    <input id="req_submit" name="" type="submit" class="text-uppercase submit-index" value="<?=$translate['Gửi đi'][$lang_code]?>" />
                </div>
              </form>
            </div>
          </div>
          </div>
        </div>
        <div class="col-sm-pull-6 col-sm-6 col-xs-12 footer_left item">
          <div class="text-center border">
            <div class="col-sm-12">
              <div><a href="<?=$root?>"><img class="logo_bot" src="<?$domain?>/public/images/logo6.png" alt="<?php echo get_title(); ?>" class="wow zoomIn img-responsive" /></a></div>
              <div class="content">
              <p><strong>Địa chỉ</strong>&nbsp;: <?php echo get_bien('address'); ?></p>

              <p><strong>Điện thoại</strong>&nbsp;: <?php echo get_bien('phone','none'); ?></p>

              <p><strong>Email</strong>&nbsp;: <?php echo get_bien('email','none'); ?></p>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="block-footer-content">
                <div class="block-social wow fadeIn">
                  <?php echo show_social(); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a href="javascript:;" class="scrollup"></a>
 
</div>
<?php if($post_type=='project_detail_aaaaa'){ ?>
<div id="support" class="hotline-ef dam-ef">
    <div class="hovicon effect-8">
        <a class="fancybox" href="#popupccc"><i class="fa fa-pencil-square-o " aria-hidden="true"></i></a>
        <div id="popupccc" style="width: 360px; display: none;">
            <script type="text/javascript">
            setTimeout(function() {$(".form_notify").addClass("hide");}, 20000);
            </script>
            <div class="block-center-title" style="padding-top: 15px!important; padding-bottom: 0!important; text-align: center;    color: #18171d;">
                <h3 class="text-uppercase">Đăng ký báo giá</h3>
            </div>
            <div class="form-nw">
                <form action="" method="post" class="form_contact" style="padding: 10px 0;">
                    <input class="input_form" type="hidden" name="func" value="req_submit" />
                    <div class="col-sm-12">
                        <input id="txtName" name="txtName" required="" type="text" placeholder="Họ tên*">
                    </div>
                    <div class="col-sm-12">
                        <input id="txtEmail" required="" name="txtEmail" type="text" placeholder="Email*">
                    </div>
                    <div class="col-sm-12">
                        <input required="" id="txtTel" name="txtTel" type="text" placeholder="Số điện thoại*">
                    </div>
                    <div class="col-sm-12">
                        <label>Dự án:</label><br>
                        <select name="post_id">
                            <?php 
                            $q11=$db->selectpost("post_type='project_detail' and hien_thi=1 and lang_id='".$lang_code."' ","ORDER BY thu_tu, post.id");
                            while ($r11=$db->fetch($q11)) {
                            ?>
                            <option <?php if($r['post_id']==$r11['post_id']){echo 'selected=""';}?> value="<?=$r11['post_id']?>"><?=$r11['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="col-sm-12">
                        <small style="font-style: italic; font-size: 12px">Phòng chăm sóc khách hàng sẽ liên hệ với quý khách trong thời gian sớm nhất. Xin chân thành cảm ơn</small>
                    </div>
                    <div class="col-sm-12 text-center">
                        <input  class="btn btn-primary center-block" name="" type="submit" style="margin:  15px auto; width: 200px !important;    background-color: #337ab7!important;border-color: #2e6da4!important;" value="Xem báo giá">
                    </div>
                </form>
            </div>        
            </div>
        <span class="fancybox" href="#popupccc">Xem báo giá</span>
    </div>
</div>
<?php } ?>
<div id="support" class="hotline-ef">
    <div class="hovicon effect-8">
        <a href="tel:<?=get_bien('fax','none')?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
        <span><?=get_bien('fax','none')?></span>
    </div>
</div>
<div class="form_notify"><?=!empty($notify)?$notify:""?></div>
</body>
<?include "z_includes/_html_footer.php";?>

</html>
<?php }?>
<?php
include "functions/Common.php";
$lang_code = GetLanguagesActive()["code"];
(isset($_GET["type"])) ? $type = $_GET["type"] : $type = "";
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$func =  isset($_POST['func']) ? $_POST['func'] : '';
$tik =  isset($_POST['tik']) ? $_POST['tik'] : '';
$r=$db->select("vn_contacts"," id='".$id."' ","");
$row=$db->fetch($r);
if($func=="del")
{
    $db->delete("vn_contacts","id = '".$id."'");

    $count=get_sql("select COUNT(*) from vn_contacts where type='".$type."'");
    if($count>0){
        admin_load("Đã xóa dữ liệu thành công","?act=contacts&type=".$type);
    }else{
        $type=get_sql("select type from vn_contacts limit 1");
        ($type!="SQL_NULL")?$u="?act=contacts&type=".$type : $u="?act=contacts";
        admin_load("Đã xóa dữ liệu thành công",$u);
    }

    die();
}
if($func=="no_active")
{
    $db->update("vn_contacts","view",'0',"id='".$id."'");   
    admin_load("","?act=contacts&type=".$type);
    die();
}

$db->update("vn_contacts","view",'1',"id='".$row['id']."'");    
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li><a href="javascript:history.go(-1)">Danh sách</a></li>
    </ol>
</section><!--/. content-header-->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box-common box-danger">
        <form action="?act=contactsView&type=<?php echo $type?>&id=<?php echo $id?>" method="post">
          <div class="detail-box danhsach-thongtin-lienhe">
            <h4 class="text-center text-uppercase text-title">Người liên hệ: <?if($row['name']!=''){?><span style="color:#dd4b39;"><?php echo $row['name'].' '.$row['ten'];?></span><?}?></h4>
            <i>(<?=$row['type_name']?>)</i><br>
            <ul>
              <?if($row['subject']!=''){?><li><p><strong>Tiêu đề liên hệ:</strong> <?=$row['subject']?></p></li><?}?>
              <?if($row['name']!=''){?><li><p><strong>Họ và Tên :</strong> <?php echo $row['name'].' '.$row['ten'];?></p></li><?}?>
              <?if($row['email']!=''){?><li><p><strong>Email :</strong> <?=$row['email']?></p></li><?}?>
              <?if($row['content']!=''){?><li><p><strong>Nội dung :</strong> <?=$row['content']?></p></li><?}?>
              <?if($row['address']!=''){?><li><p><strong>Địa chỉ :</strong> <?=$row['address']?></p></li><?}?>
              <?if($row['phone']!=''){?><li><p><strong>Điện thoại :</strong> <?=$row['phone']?></p></li><?}?>
              <?if($row['company_name']!=''){?><li><p><strong>Công ty :</strong> <?=$row['company_name']?></p></li><?}?>

              <?if($row['ngay_sinh']!=''){?><li><p><strong>Ngày sinh :</strong> <?=$row['ngay_sinh']?></p></li><?}?>
              <?if($row['cmnd']!=''){?><li><p><strong>Số CMND/Thẻ căn cước :</strong> <?=$row['cmnd']?></p></li><?}?>
              <?if($row['thpt']!=''){?><li><p><strong>Trường THPT :</strong> <?=$row['thpt']?></p></li><?}?>
              <?if($row['toan']!=''){?><li><p><strong>Điểm :</strong> Toán: <?=$row['toan']?>&nbsp&nbsp&nbsp&nbsp Văn: <?=$row['van']?>&nbsp&nbsp&nbsp&nbsp Anh: <?=$row['anh']?></p></li><?}?>
              <?if($row['tinh_thanh']!=''){?>
                <li><p><strong>Tỉnh/Thành phố :</strong> <?php echo getNameByValue($row['tinh_thanh']); ?></p></li>
              <?}?>
              <?if($row['nam_tn']!=''){?><li><p><strong>Năm tốt nghiệp :</strong> <?=$row['nam_tn']?></p></li><?}?>
              <?if($row['nganh_dk']!=''){
              ?>
                <li><p><strong>Ngành đăng ký :</strong> <?=get_sql("select ten from post_lang where lang_id='".$lang_code."' and post_id=".$row['nganh_dk'])?></p></li>
              <?}?>
              <?if($row['link_facebook']!=''){?><li><p><strong>Link facebook :</strong> <?=$row['link_facebook']?></p></li><?}?>
              <div class="clear"></div>
              <?if($row['full_url']!=''){?><li><p><strong>Gửi từ trang :</strong> <a href="<?=$row['full_url']?>" target="_blank"><?=$row['full_url']?></a></p></li><?}?>
              <?if($row['post_id']!=0){
              $q=$db->selectpost("hien_thi=1 and post_lang.post_id='".$row['post_id']."'", "");
              $r=$db->fetch($q);
                ?>
                <li>
                  <p>
                    <strong>... :</strong> <a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug'] ?>" target="_blank"><?=$r['name']?></a>
                  </p>
              </li>
              <?}?>
              <?if($row['time']!=''){?><li><p><strong>Thời gian gửi :</strong> <?=lg_date::vn_time($row["time"])?></p></li><?}?>
            </ul>
            <div class="text-left">
              <a class="btn btn-success" href="javascript:history.go(-1)">Quay về</a>
              <button class="btn btn-group" name="func" value="no_active">Đánh dấu chưa đọc</button>
              <button class="btn btn-danger" name="func" value="del" onclick="return confirm('Bạn có muốn xóa?')">Xóa</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
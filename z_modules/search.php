<?php 
$keyword = '';
$type = '';
$local = '';
$price = '';
$acreage = '';
if(isset($_GET['keyword'])&&!empty( $_GET['keyword'] )){
    $keyword = trim($_GET['keyword']);
    $keyword1 = $_GET['keyword'];
    $keyword = lg_string::bo_dau($keyword);
    $keyword = $db->escape($keyword);
}
if(isset($_GET['type'])&&!empty( $_GET['type'] )&& preg_match( "/^[0-9]{1,2}$/", $_GET['type'] )){
    $type = $db->escape($_GET['type']);
}
if(isset($_GET['local'])&&!empty( $_GET['local'] )&& preg_match( "/^[0-9]{1,2}$/", $_GET['local'] )){
    $local = $db->escape($_GET['local']);
}
if(isset($_GET['price'])&&!empty( $_GET['price'] )&& preg_match( "/^[0-9]{1,2}$/", $_GET['price'] )){
    $price = $db->escape($_GET['price']);
}
if(isset($_GET['acreage'])&&!empty( $_GET['acreage'] )&& preg_match( "/^[0-9]{1,2}$/", $_GET['acreage'] )){
    $acreage = $db->escape($_GET['acreage']);
}

$keyloc='';
$keyadd='';
if($local!=''){
    $keyloc.=' Địa lý: <span>'.get_sql("select ten from post_lang where post_id=".$local).'.</span>'; 
    $keyadd.='  and option1 ='.$local;
}
if($acreage!=''){
    switch ($acreage) {
    case 1:
        $keyloc.=' Diện tích: <span>KXĐ.</span>';
        $keyadd.=" and option2 = 0";
       break;
    case 2:
        $keyloc.=' Diện tích: <span><=30 m2.</span>';
        $keyadd.=" and option2 < 30";
       break;
    case 3:
        $keyloc.=' Diện tích: <span>30-50 m2.</span>'; 
        $keyadd.=" and option2 >=30 and option2 < 50";
        break;
    case 4:
        $keyloc.=' Diện tích: <span>50-80 m2.</span>';
        $keyadd.=" and option2 >=50 and option2 < 80";
        break;
    case 5:
        $keyloc.=' Diện tích: <span>80-100 m2.</span>';
        $keyadd.=" and option2 >=80 and option2 < 100";
        break;
    case 6:
        $keyloc.=' Diện tích: <span>100-150 m2.</span>';
        $keyadd.=" and option2 >=100 and option2 < 150";
        break;
    case 7:
        $keyloc.=' Diện tích: <span>150-200 m2.</span>';
        $keyadd.=" and option2 >=150 and option2 < 200";
        break;
    case 8:
        $keyloc.=' Diện tích: <span>200-250 m2.</span>';
        $keyadd.=" and option2 >=200 and option2 < 250";
        break;
    case 9:
        $keyloc.=' Diện tích: <span>250-300 m2.</span>';
        $keyadd.=" and option2 >=250 and option2 < 300";
        break;
    case 10:
        $keyloc.=' Diện tích: <span>300-500 m2.</span>';
        $keyadd.=" and option2 >=300 and option2 < 500";
        break;
    case 11:
        $keyloc.=' Diện tích: <span>>=500 m2.</span>';
        $keyadd.=" and option2 >= 500";
        break;
    }  
}
if($price!=''){
    switch ($price) {
    case 1:
        $keyloc.=' Giá: <span>Thỏa thuận.</span>';
        $keyadd.=" and old_price = ''";
       break;
    case 2:
        $keyloc.=' Giá: <span>< 500 triệu.</span>'; 
        $keyadd.=" and old_price < 500000000";
        break;
    case 3:
        $keyloc.=' Giá: <span>500 - 800 triệu.</span>';
        $keyadd.=" and old_price >=500000000 and old_price<800000000";
        break;
    case 4:
        $keyloc.=' Giá: <span>800 - 1 tỷ.</span>';
        $keyadd.=" and old_price >=800000000 and old_price<=999999999";
        break;
    case 5:
        $keyloc.=' Giá: <span>1 - 2 tỷ.</span>';
        $keyadd.=" and old_price >=1000000000 and old_price<2000000000";
        break;
    case 6:
        $keyloc.=' Giá: <span>2 - 3 tỷ.</span>';
        $keyadd.=" and old_price >=2000000000 and old_price<3000000000";
        break;
    case 7:
        $keyloc.=' Giá: <span>3 - 5 tỷ.</span>';
        $keyadd.=" and old_price >=3000000000 and old_price<5000000000";
        break;
    case 8:
        $keyloc.=' Giá: <span>5 - 7 tỷ.</span>';
        $keyadd.=" and old_price >=5000000000 and old_price<7000000000";
        break;
    case 9:
        $keyloc.=' Giá: <span>7 - 10 tỷ.</span>';
        $keyadd.=" and old_price >=7000000000 and old_price<10000000000";
        break;
    case 10:
        $keyloc.=' Giá: <span>10 - 20 tỷ.</span>';
        $keyadd.=" and old_price >=10000000000 and old_price<20000000000";
        break;
    case 11:
        $keyloc.=' Giá: <span>20 - 30 tỷ.</span>';
        $keyadd.=" and old_price >=20000000000 and old_price<30000000000";
        break;
    case 12:
        $keyloc.=' Giá: <span>> 30 tỷ.</span>';
        $keyadd.=" and old_price >30000000000";
        break;
    }  
}
if($keyword!=''){
    $keyloc.=' Từ khóa: <span>'.$keyword1.'</span>'; 
    $keyadd.=' and (ten_kd like '%$keyword%' or chu_thich_kd like '%$keyword%')';
}
if($keyword==''&&$local==''&&$price==''&&$acreage==''){
    $keyloc.=' <span>Tất cả.</span>';
}
$page       =   $page + 0;
$perpage    =   16;
$r_all      =   $db->selectpost("hien_thi=1 and post_type='catproduct_detail' and (cat = '".$type."' or cat1 = '".$type."' or cat2 = '".$type."') and lang_id='".$lang_code."'".$keyadd,"");
if($r_all){$sum     =   $db->num_rows($r_all); }

$pages      =   ($sum-($sum%$perpage))/$perpage;
    if ($sum % $perpage <> 0)
        {
            $pages = $pages + 1;
        }
$page       =   ($page==0)?1:(($page>$pages)?$pages:$page);
$min        =   abs($page-1) * $perpage;
$max        =   $perpage;
$count=0;

$qget11 = $db->select("postcat_lang","postcat_id='".$type."'","");
$rget11 = $db->fetch($qget11);

?>

<div id="product" class="contact_box">
  <div class="container">
    <h1 class="title-content" style="padding-left: 15px;"><?php if($rget11['title_h1']!=''){echo $rget11['title_h1'];}else{echo $rget11['name'];}?> </h1>
        <?php echo get_breadcums(); ?>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div id="tk_title">Tìm kiếm theo các tiêu chí:<?php echo $keyloc; ?> Có <span><?php echo $sum; ?></span> bất động sản.</div>
                <ul class="ul_nhadat other row" style="margin-top: 20px;">
                <?
                $q = $db->selectpost("hien_thi=1 and post_type='catproduct_detail' and (cat = '".$type."' or cat1 = '".$type."' or cat2 = '".$type."') and lang_id='".$lang_code."'".$keyadd,"order by post.id DESC LIMIT ".$min.", ".$max);
                if($db->num_rows($q) != 0)
                {
                while($r=$db->fetch($q)){
                ?>
                <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
                    <div class="img">
                      <a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=get_single_image($r['post_id'],'post','avatar','html')?></a>
                    </div>
                    <a class="name" href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=$r['ten']?></a>
                    <div class="price_c">Giá: <?=$r['old_price']==''?'Thỏa thuận':price_cover($r['old_price'])?></div>
                    <?php if($r['option3']!=''){?>
                    <p class="add">Vị trí: <?=$r['option3']?></p>
                    <?php } ?>
                    <div class="info">
                      <div class="left"><i class="fa fa-calendar"></i> <?=date('d/m/Y',$r['time'])?></div>

                      <?php if($r['option2']!=0){?>
                      <span class="acreage right"><?=$r['option2']?> m<sup>2</sup></span><?php }?>
                    </div>
                </li>
                <?
                }}
                else 
                {
                    echo '<div class="col-lg-12" style="margin-top:15px">Thông tin đang được cập nhật...</div>';
                }?>
                <div class="clear"></div>
                </ul>
                <div><?=showPageNavigationS($page, $pages, $root.'/'.$slugnew.'/',$key_search);?></div>
                <div class="clear"></div>
            </div>
            <div class="col-lg-4 col-md-4">
                <?php include('loc.php'); ?>
                <?php include('right.php'); ?>
            </div>
        </div>
            
            
    </div>
</div>


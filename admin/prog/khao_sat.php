<?php
include "functions/Common.php";
$lang_code = GetLanguagesActive()["code"];
$tik = isset($_POST['tik']) ? $_POST['tik'] : '';
$func = isset($_POST['func']) ? $_POST['func'] : '';
if ($func == "del")
{
    for ($i = 0; $i < count($tik); $i++)
    {
        $db->delete("vn_khao_sat","id = '".$tik[$i]."'");
    }
    admin_load("","?act=khao_sat");
    die();
}

$slugget=$_SERVER['REQUEST_URI'];
$slugget=str_replace("/admin/?act=khao_sat","",$slugget);
$slugget=str_replace("&page=".$page,"",$slugget);

$date = isset($_GET['date']) ? $_GET['date'] : '';
$date2 = isset($_GET['date2']) ? $_GET['date2'] : '';
$giang_vien = isset($_GET['giang_vien']) ? $_GET['giang_vien'] : '';
$khoa = isset($_GET['khoa']) ? $_GET['khoa'] : '';
$lop = isset($_GET['lop']) ? $_GET['lop'] : '';
$mon_hoc = isset($_GET['mon_hoc']) ? $_GET['mon_hoc'] : '';
$hoc_ky = isset($_GET['hoc_ky']) ? $_GET['hoc_ky'] : '';
$nam_hoc1 = isset($_GET['nam_hoc1']) ? $_GET['nam_hoc1'] : '';
$nam_hoc2 = isset($_GET['nam_hoc2']) ? $_GET['nam_hoc2'] : '';
$code = isset($_GET['code']) ? $_GET['code'] : '';
$keyw='';

if($code!=''){
    $keyw.=" and id_khao_sat = '".$code."'";
} else {
    if($date!=''&&$date2=='')
    {
        $keyw.=" and time >= ".strtotime($date);
    }
    if($date==''&&$date2!='')
    {
        $keyw.=" and time <= ".strtotime($date2.' 00:00:00');
    }
    if($date!=''&&$date2!='')
    {
        $keyw.=" and time >= ".strtotime($date)." && time <= ".strtotime($date2.' 00:00:00');
    }
    if($date==''&&$date2=='')
    {
        $keyw.="";
    }
    if($giang_vien!=''){
        $keyw.=" and ten_gv = '".$giang_vien."'";
    }
    if($khoa!=''){
        $keyw.=" and khoa='".$khoa."'";
    }
    if($lop!=''){
        $keyw.=" and lop='".$lop."'";
    }
    if($mon_hoc!=''){
        $keyw.=" and ten_mh='".$mon_hoc."'";
    }
    if($hoc_ky!=''){
        $keyw.=" and hoc_k='".$hoc_ky."'";
    }
    if($nam_hoc1!=''){
        $keyw.=" and nam_h1='".$nam_hoc1."'";
    }
    if($nam_hoc2!=''){
        $keyw.=" and nam_h2='".$nam_hoc2."'";
    }
}

?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
        <li class="active"> Khảo sát sinh viên</li>
    </ol>
</section><!--/. content-header-->
<section class="content">
	<div class="box-common">
		<div class="pad   dinglr10">
            <div class="tab cle-responsive">
                <?php
                if (conditionPermission($post_type, "KHAO_SAT_THONG_KE", "code")) {
                ?>
                <a style="margin: 10px;float: left;" class="btn btn-primary" href="?act=khao_sat_tk">Thông kê khảo sát</a>
                <?php }?>
                <div class="clear"></div>
                <style type="text/css">
                    .item{width: 13%;float: left;margin-bottom: 5px;margin-right: 1%}
                    .item.short{width: 15%;}
                    .item label{display: block;font-weight: bold;}
                    .item.short input{width: 100px;display: inline-block;}
                    .search_smart div.button{margin-top: 5px;}
                    input[type=date]{line-height: 18px;}
                </style>
                <form style="margin: 10px;" action="?act=khao_sat<?=$slugget?>" method="get" class="search_smart"  enctype="multipart/form-data">
                    <input type="hidden" name="act" value="khao_sat" />
                    <div class="item">
                        <label class="control-label">Id khảo sát:</label>
                        <input type="text" name="code" class="form-control" value="<?=$code?>">
                    </div>
                    <div class="item">
                        <label class="control-label">Giảng viên:</label>
                        <select class="form-control" name="giang_vien">
                            <option value="">--Tất cả--</option>
                            <?php 
                            $q=$db->selectpost("hien_thi=1 and cat = 96 and lang_id = 'vn'","order by thu_tu, ten");
                            while($r=$db->fetch($q)){
                            ?>
                            <option <?php if($giang_vien == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="item">
                        <label class="control-label">Khoa:</label>
                        <select class="form-control" name="khoa">
                            <option value="">--Tất cả--</option>
                            <?php 
                            $q=$db->selectpost("hien_thi=1 and cat = 93 and lang_id = 'vn'","order by thu_tu, ten");
                            while($r=$db->fetch($q)){
                            ?>
                            <option <?php if($khoa == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="item">
                        <label class="control-label">Lớp:</label>
                        <select class="form-control" name="lop">
                            <option value="">--Tất cả--</option>
                            <?php 
                            $q=$db->selectpost("hien_thi=1 and cat = 94 and lang_id = 'vn'","order by thu_tu, ten");
                            while($r=$db->fetch($q)){
                            ?>
                            <option <?php if($lop == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="item">
                        <label class="control-label">Môn học:</label>
                        <select class="form-control" name="mon_hoc">
                            <option value="">--Tất cả--</option>
                            <?php 
                            $q=$db->selectpost("hien_thi=1 and cat = 95 and lang_id = 'vn'","order by thu_tu, ten");
                            while($r=$db->fetch($q)){
                            ?>
                            <option <?php if($mon_hoc == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="item" style="width: 70px">
                        <label class="control-label">Học kỳ</label>
                        <select class="form-control" name="hoc_ky">
                            <option <?php if($hoc_ky == 1){echo 'selected';}?> value="1">I</option>
                            <option <?php if($hoc_ky == 2){echo 'selected';}?> value="2">II</option>
                        </select>
                    </div>
                    <div class="item" style="width: 200px">
                        <label class="control-label">Năm học</label>
                        20
                        <select style="width: 50px;display: inline-block;" class="form-control" name="nam_hoc1">
                            <?php
                            for ($i=10;$i<30;$i++) {
                            ?>
                            <option <?php if($nam_hoc1 == $i){echo 'selected';}?> value="<?=$i?>"><?=$i?></option>
                            <?php } ?>
                        </select>
                        - 20
                        <select style="width: 50px;display: inline-block;" class="form-control" name="nam_hoc2">
                            <?php
                            for ($i=10;$i<30;$i++) {
                            ?>
                            <option <?php if($nam_hoc2 == $i){echo 'selected';}?> value="<?=$i?>"><?=$i?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <!-- <div class="item">
                        <label class="control-label">Từ ngày</label>
                        <input id="date" type="date" name="date" class="form-control" value="<?=$date?>" />
                    </div>
                    <div class="item">
                        <label class="control-label">Đến ngày</label>
                        <input id="date2" type="date" placeholder="" class="form-control" name="date2" value="<?=$date2?>"/>
                    </div> -->
                    <div class="clear"></div>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Lọc dử liệu</button>
                        <a href="?act=khao_sat" type="button" class="btn btn-default" style="margin-left: 4px;">Reset</a>
                    </div>
                </form>
                <form action="?act=khao_sat" method="post" onsubmit="return confirm('Bạn có muốn xóa ?');">
                <input type="hidden" name="func" value="del" />
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Lớp</th>
                                <th>Khoa</th>
                                <th>Tên giảng viên</th>
                                <th>Tên môn học</th>
                                <th>Học kỳ, năm học</th>
                                <th>Thời gian</th>
                                <td style="text-align: center;">-</td>
                                <th>
                                <?php
                                if (conditionPermission($post_type, "KHAO_SAT_XOA", "code")) {
                                ?>
                                <span>
                                    <input class="checkAll" type="checkbox" style="vertical-align:text-bottom;margin-right: 5px">Xóa
                                </span>
                                <?php }?>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $page       =   $page + 0;
                        $perpage    =   20;
                        $r_all      =   $db->select("vn_khao_sat","id <> 0".$keyw);
                        $sum        =   $db->num_rows($r_all);
                        $pages      =   ($sum-($sum%$perpage))/$perpage;
                        if ($sum % $perpage <> 0 )  $pages = $pages+1;
                        $page       =   ($page==0)?1:(($page>$pages)?$pages:$page);
                        $min        =   abs($page-1) * $perpage;
                        $max        =   $perpage;
                        $count  =   $min;
                        $q=$db->select("vn_khao_sat","id <> 0".$keyw,"order by id desc LIMIT ".$min.", ".$max);
                        while ($r = $db->fetch($q))
                        {$count++;
                        ?>
                        <tr style="background-color:<?if($r['view']==1){echo 'rgba(243,243,243,.85)';}?>">
                            <td><?=$count?></td>
                            <td><?=get_sql("select ten from post_lang where post_id='".$r["lop"]."' and lang_id='".$lang_code."'")?></td>
                            <td><?=get_sql("select ten from post_lang where post_id='".$r["khoa"]."' and lang_id='".$lang_code."'")?></td>
                            <td><?=get_sql("select ten from post_lang where post_id='".$r["ten_gv"]."' and lang_id='".$lang_code."'")?></td>
                            <td><?=get_sql("select ten from post_lang where post_id='".$r["ten_mh"]."' and lang_id='".$lang_code."'")?></td>
                            <td>Học kỳ: <?=$r["hoc_k"]?>, khóa: 20<?=$r["nam_h1"]?> - 20<?=$r["nam_h2"]?></td>
                            <td><?=date('d/m/Y',$r['time'])?></td>
                            <td style="text-align: center;"><a onclick="setview('vn_contacts',<?php echo $r['id']?>)" href="?act=khao_sat_view&id=<?php echo $r["id"]?>">Xem chi tiết</a></td>
                            <td>
                            <?php
                            if (conditionPermission($post_type, "KHAO_SAT_XOA", "code")) {
                            ?>
                            <input name="tik[]" class="checkItem" type="checkbox" value="<?=$r["id"]?>" />
                            <?php }?>
                            </td>
                        </tr>
                        <?
                        }
                        ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8"><a target="_blank" href="<?php echo $domain.'/'.admin_url.'/ajax/export.php'.($slugget !== '' ? str_replace("/admin/?act=".$act.'&',"?",$_SERVER['REQUEST_URI']) : '');?>" type="button" class="btn btn-primary" style="margin-left: 4px;">Xuất file Excel</a></td>
                                <td>
                                <?php
                                if (conditionPermission($post_type, "KHAO_SAT_XOA", "code")) {
                                ?>
                                <input type="submit" value="Xóa" class="btn btn-success" />
                                <?php }?>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
                <div class="navigationO">
                    <?php
                        for($i=1;$i<=$pages;$i++) {
                            if ($i==$page) echo "<b>".$i."</b>";
                            else {
                                echo "<a href='?act=khao_sat".$slugget."&page=$i'>$i</a>";
                            }
                        }
                    ?>
                </div>
            </div>
		</div>
	</div>
</section>
<?php
function activeTab($typeTab, $type = ""){
    $active = "";
    if($type!=""){
        if($typeTab==$type){$active="active";}
    }

    return $active;
}
?>
<script type="text/javascript">
$(function(){
    $(".checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
})
</script>
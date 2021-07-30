<?
session_start();
@error_reporting(0);
@set_time_limit(0);
include "../../_CORE/index.php";
include "../../app/config/config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);

$val = '';
if(isset($_GET['val'])&&$_GET['val']!=''){
    $val = $_GET['val'];
    $array = explode(',',$val);
    if(count($array)>1){
        $valnew = lg_string::bo_dau(trim($array[count($array)-1]));
        unset($array[count($array)-1]);
        $valold = implode(',', $array);
        $valold = $valold.', ';
    }else{
        $valnew = lg_string::bo_dau($val);
        $valold = '';
    }
} 

if($valnew!=''){
    $q = $db->select("tag","(name_kd like '%$valnew%' or slug like '%$valnew%')","order by id desc limit 6");
    if($db->num_rows($q)!=0){
?>
    <div class="list-tag">
    <?
    
    while ($r = $db->fetch($q))
    {?>
    <a onclick="selecttag('<?php echo $valold.$r['name'].', ';?>')" href="javascript:void(0)"><?=$r['name']?></a>
    <?php } ?>
    </div>
<?php }} ?>
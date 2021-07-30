<?php 
include "../function.php";
include "../../_CORE/index.php";
include "../../app/config/config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
$toa_do = '';
if(isset($_GET['toa_do'])){$toa_do = $_GET['toa_do'];}
$araytl = explode(',',$toa_do);
?>
<div style="background: rgba(0,0,0,0.7) url('<?=$domain?>/public/images/bando.png') no-repeat;width: 400px;height: 368px;position: relative;background-size: 100% 100%;margin: 0 auto; margin-top: 10px;">
    <a href="" style="left: <?=$araytl[0]?>%;top: <?=$araytl[1]?>%;position: absolute;"><img src="<?=$domain?>/public/images/cham.png"></a>
</div>
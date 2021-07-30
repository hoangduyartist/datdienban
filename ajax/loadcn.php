<?php
ob_start();
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
ob_start();
include "../_CORE/index.php";
include "../app/config/config.php";
$db		=	new	lg_mysql($host,$dbuser,$dbpass,$csdl);
include("../app/start/func.php");
$id='';
if(isset($_GET['id'])){$id=$_GET['id'];}
?>
<style type="text/css">
	.note p{margin-bottom: 6px;}
</style>
<div style="padding: 20px;">
<ul>
	<?php
	$q1=$db->selectpost("cat = '".$id."'","order by thu_tu");
	while($r1=$db->fetch($q1)){
	?>
	<li style="margin-bottom: 20px;">
		<h3 class="name" style="text-transform: uppercase;color: #3b7dba;font-size: 15px;font-weight: bold;margin-bottom: 10px;"><?=$r1['ten']?></h3>
       <div class="note">
         <?=$r1['noi_dung']?>
       </div>
	</li>
	<?php }?>
</ul>
</div>
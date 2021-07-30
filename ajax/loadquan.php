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
<option value="">--Chọn Quận/Huyện--</option>
<?php
$q = $db->selectpost("hien_thi=1 and cat = '".$id."'","order by thu_tu, time desc");
while($r=$db->fetch($q)) {
?>
<option value="<?php echo $r['post_id']; ?>"><?php echo $r['ten']; ?></option>
<?php } ?>
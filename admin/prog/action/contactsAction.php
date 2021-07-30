<?php
(isset($_GET["type"])) ? $type = $_GET["type"] : $type = "";
$id = $_POST['id'];
$func = $_POST['func'];
$tik = $_POST['tik'];
if ($func == "del")
{
  for ($i = 0; $i < count($tik); $i++)
  {
    $db->delete("vn_contacts","id = '".$tik[$i]."'");
  }
  $count=get_sql("select COUNT(*) from vn_contacts where type='".$type."'");
  if($count>0){
    admin_load("Đã xóa dữ liệu thành công.","?act=contacts&type=".$type);
  }else{
    $type=get_sql("select type from vn_contacts limit 1");
    ($type!="SQL_NULL")?$u="?act=contacts&type=".$type : $u="?act=contacts";
    admin_load("Đã xóa dữ liệu thành công.",$u);
  }
  die();
}
?>
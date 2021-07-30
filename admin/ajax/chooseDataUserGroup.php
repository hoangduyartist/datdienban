<?php
session_start();
@error_reporting(0);
@set_time_limit(0);
include "../../_CORE/index.php";
include "../../app/config/config.php";
include "../../admin/function.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
isset($_POST["idNhomQuyen"]) ? $idNhomQuyen = (int)$_POST["idNhomQuyen"] : $idNhomQuyen = 0;
isset($_POST["authorizedActions"]) ? $authorizedActions = $_POST["authorizedActions"] : $authorizedActions = array();
class DataValue
{
	public $id;
  public $name;
  public $checked;
  public $value;
}
$result = array();
$isChecked = true;
foreach($authorizedActions as $key => $item){
  $qPermission=$db->select("vn_user_permission", "id_user_group='".$idNhomQuyen."' and id_user_action='".$item['id']."'", "");
  $rPermission=$db->fetch($qPermission);
  ($rPermission["is_check"]==1) ? $isChecked = true : $isChecked = false;
  $txt = new DataValue();
  {
    $txt->id = $item['id'];
    $txt->name = $item['name'];
    $txt->checked = $isChecked;
    $txt->value = $idNhomQuyen."-".$item['id'];
  }
  $result[] = $txt;
}

echo json_encode($result);
?>
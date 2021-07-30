<?php
session_start();
@error_reporting(0);
@set_time_limit(0);
include "../../_CORE/index.php";
include "../../app/config/config.php";
include "../../admin/function.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
isset($_POST['idGroupUser']) ? $idGroupUser = (int)$_POST['idGroupUser'] : $idGroupUser = 0;
isset($_POST['idAction']) ? $idAction = $_POST['idAction'] : $idAction = 0;
$result['notification'] = false;
if ($idGroupUser) {
  $q=$db->select("vn_user_permission", "id_user_group = '".$idGroupUser."' and id_user_action = '".$idAction."'");
  $r=$db->fetch($q);
  if ($db->num_rows($q)!=0) {
    ($r['is_check']==1) ? $isCheck = 0 : $isCheck = 1;
    $db->query("update vn_user_permission SET is_check = '".$isCheck."' where id_user_group = '".$r["id_user_group"]."' and id_user_action = '".$idAction."'");
  } else {
    $db->query('INSERT INTO vn_user_permission (id_user_group, id_user_action, is_check) VALUE ("'.$idGroupUser.'", "'.$idAction.'", 1)');
  }
  $result['notification'] = true;
}

echo json_encode($result);
?>
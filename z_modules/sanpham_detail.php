<?php
$db->update("post","luot_xem",the_view+1," id='".$id_slug."' ");
$qIdPost=$db->select("post", "id='".$id_slug."'","");
$rIdPost=$db->fetch($qIdPost);
$qTheme=$db->select("postcat", "hien_thi=1 and cat=0 and (id='".$rIdPost["cat"]."' or id='".$rIdPost["cat1"]."' or id='".$rIdPost["cat2"]."')", "");
$rTheme=$db->fetch($qTheme);
$theme = "default_detail.php";
if ($rTheme["theme_keys"]!="") {
  $theme = $rTheme["theme_keys"]."_detail.php";
}
include "z_modules/theme/sanpham/".$theme;

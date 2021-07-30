<?php
$qsidebar=$db->select("vn_modules", "page='".$pageSideBar."' and is_display=1", "ORDER BY sort ASC");
if($db->num_rows($qsidebar)!=0){
	while($rsidebar=$db->fetch($qsidebar)){
		($rsidebar["module_html_tag"]!="") ? $title = $rsidebar["module_html_tag"] : $title = "p";
		($rsidebar["html_list_tag"]!="") ? $name = $rsidebar["html_list_tag"] : $name = "p";
		($rsidebar["module_name"]!="") ? $nameValue = $rsidebar["module_name"] : $nameValue = "";
		include "module/module".$rsidebar["module_type"].".php";
	}
}else{
	echo "<div class='update-box'>Updating..</div>";
}
?>

<?php
session_start();
@error_reporting(0);
@set_time_limit(0);
include "../../_CORE/index.php";
include "../../app/config/config.php";
include "../../admin/function.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
isset($_POST["action"]) ? $action = $_POST["action"] : $action = "";
isset($_POST["id"]) ? $id = (int)$_POST["id"] : $id = 0;
isset($_POST["type"]) ? $type = $_POST["type"] : $type = 0;
isset($_POST["moduleName"]) ? $moduleName = $_POST["moduleName"] : $moduleName = "";
isset($_POST["moduleType"]) ? $moduleType = $_POST["moduleType"] : $moduleType = 0;
isset($_POST["htmlModule"]) ? $htmlModule = $_POST["htmlModule"] : $htmlModule = "";
isset($_POST["htmlList"]) ? $htmlList = $_POST["htmlList"] : $htmlList = "";
isset($_POST["isdisplay"]) ? $isdisplay = $_POST["isdisplay"] : $isdisplay = true;
isset($_POST["sortData"]) ? $sortData = $_POST["sortData"] : $sortData = array();
$result = array();
$result["notification"] = true;
$result["action"] = $action;
$error = array();
$error["inputname"] = true;
$error["inputtype"] = true;
if($moduleName!="" && $moduleType!=0){
	if($id<0 && $action=="NEW"){
		$item = array();
		// thêm mới 1 module cho page
		$OK = $db->insert("vn_modules", "page, module_name, module_type, module_html_tag, html_list_tag, is_display", "'".$type."', '".$moduleName."', '".($moduleType+0)."', '".$htmlModule."', '".$htmlList."', '".$isdisplay."'");
		$item["id"] = $OK;
		$item["page"] = $type;
		$item["module_name"] = $moduleName;
		$item["module_type"] = $moduleType;
		$item["module_html_tag"] = $htmlModule;
		$item["html_list_tag"] = $htmlList;
		$item["is_display"] = $isdisplay;
		$result["item"] = $item;
	}else if($id>0 && $action=="EDIT"){
		// chỉnh sửa 1 module cho page
		$db->query("update vn_modules SET page = '".$type."', module_name = '".$moduleName."', module_type = '".($moduleType+0)."', module_html_tag = '".$htmlModule."', html_list_tag = '".$htmlList."', is_display='".$isdisplay."' where id = '".$id."'");
	}else if($id>0 && $action=="DEL"){
		// xóa 1 module của page
		$db->delete("vn_modules","id = '".$id."'");
	}else{
		// sắp xếp thứ tự các module cho page
	}
}else{
	// sắp xếp dữ liệu không cần kiểm tra các trường name module và module type
	if($action=="SORT"){
		// sắp xếp danh sách module
		if($sortData!=[]){
			foreach ($sortData as $key => $value) {
				$db->update("vn_modules","sort", $key, "id=".$value);
			}
			$result["notification"] = true;
		}
	}else{
		// Kiểm tra dữ liệu, nếu không đúng
		if($moduleName==""){$error["inputname"] = false;}
		if($moduleType==0){$error["inputtype"] = false;}
		$result["error"] = $error;
		$result["notification"] = false;
	}
}

echo json_encode($result);
?>
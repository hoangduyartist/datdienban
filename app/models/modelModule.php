<!--------------------------------------------------------
 _______                               __               
/       \                             /  |              
$$$$$$$  |  ______    ______         _$$ |_    _______  
$$ |__$$ | /      \  /      \       / $$   |  /       \ 
$$    $$<  $$$$$$  |/$$$$$$  |      $$$$$$/   $$$$$$$  |
$$$$$$$  | /    $$ |$$ |  $$ |        $$ | __ $$ |  $$ |
$$ |__$$ |/$$$$$$$ |$$ \__$$ |        $$ |/  |$$ |  $$ |
$$    $$/ $$    $$ |$$    $$/         $$  $$/ $$ |  $$ |
$$$$$$$/   $$$$$$$/  $$$$$$/           $$$$/  $$/   $$/ 

Model kiểu module, trang sử dụng module
---------------------------------------------------------->
<?php 
class ModuleType
{
	public $id;
	public $name;
}
class ModulePage
{
	// id của tab
	public $tab;

	// tiêu đề của tab
	public $value;

	// name[] của value
	public $type;

	// tab có active hiển thị đầu tiên hay không
	public $active;
}

// thêm dữ liệu cho module type
$type0 = new ModuleType();
	$type0->id = 0;
	$type0->name = "-- Chọn loại module --";
$type1 = new ModuleType();
	$type1->id = 1;
	$type1->name = "Tin nhiều người đọc";
$type2 = new ModuleType();
	$type2->id = 2;
	$type2->name = "Tiện ích";
$type3 = new ModuleType();
	$type3->id = 3;
	$type3->name = "Banner";
$moduleTypes = array($type0, $type1, $type2, $type3);

// thêm dữ liệu cho page tab
$page0 = new ModulePage();
$page0->tab = "tab0";
$page0->value = "Giới thiệu";
$page0->type = "about";
$page0->active = "active";
$page1 = new ModulePage();
$page1->tab = "tab1";
$page1->value = "List tin đăng";
$page1->type = "posts";
$page1->active = "";
$page2 = new ModulePage();
$page2->tab = "tab2";
$page2->value = "Chi tiết tin đăng";
$page2->type = "postsDetail";
$page2->active = "";
$page3 = new ModulePage();
$page3->tab = "tab3";
$page3->value = "Bài viết";
$page3->type = "news";
$page3->active = "";
$page4 = new ModulePage();
$page4->tab = "tab4";
$page4->value = "Chi tiết bài viết";
$page4->type = "newsDetail";
$page4->active = "";

$modulePages = array($page0, $page1, $page2, $page3, $page4);
?>
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

// Model Định nghĩa các nhóm quyền Administrator || Admin || Member
---------------------------------------------------------->
<?php 
class Role
{
	public $id;
  public $name;
  public $code;
}
$Role0 = new Role();
{
	$Role0->id = 0;
	$Role0->name = "Admin cấp cao nhất";
	$Role0->code = "Administrator";
}
$Role1 = new Role();
{
	$Role1->id = 1;
	$Role1->name = "Admin";
	$Role1->code = "Admin";
}
$Role2 = new Role();
{
	$Role2->id = 2;
	$Role2->name = "Member dưới quyền Administrator và Admin";
	$Role2->code = "Member";
}
$Roles = array($Role0, $Role1, $Role2);
?>
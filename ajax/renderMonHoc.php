<?php
ob_start();
include "../_CORE/index.php";
include "../app/config/config.php";
$db		=	new	lg_mysql($host,$dbuser,$dbpass,$csdl);
include("../app/start/func.php");

$idGV = isset($_GET['idGV']) ? $_GET['idGV'] : '';
if ($idGV !== '') {
	$monHoc = get_sql("select mon_hoc from post where id=".$idGV);
	?>
		<select name="ten_mh" required class="option1">
	    <option value="">--Chọn môn học--</option>
			<?php 
			if ($monHoc != '') {
			$monHocArr = explode(';', $monHoc);
			for ($i = 0; $i < count($monHocArr); $i++) {
			?>
				<option value="<?php echo $monHocArr[$i]; ?>"><?php echo get_sql("select ten from post_lang where lang_id = 'vn' and post_id=".$monHocArr[$i]); ?></option>
			<?php } } ?>
		</select>
	<?php } else {
	return $idGV;
}
?>
<?php
ob_start();
include "../_CORE/index.php";
include "../app/config/config.php";
$db		=	new	lg_mysql($host,$dbuser,$dbpass,$csdl);
include("../app/start/func.php");

$val = isset($_GET['val']) ? $_GET['val'] : '';
if ($val !== '') {
	$q = $db->select("vn_khao_sat_list", "code = '".$val."'");
	if ($q->num_rows < 1) {
		echo 'null';
	} else {
		$r = $db->fetch($q);
		echo $r['lop'].'$$$$'.$r['khoa'].'$$$$'.$r['giang_vien'].'$$$$'.$r['mon_hoc'].'$$$$'.$r['hoc_k'].'$$$$'.$r['nam_h1'].'$$$$'.$r['nam_h2'];
	}
}
?>
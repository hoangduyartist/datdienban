<?php
ob_start();
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
ob_start();
include "../_CORE/index.php";
include "../app/config/config.php";
$db		=	new	lg_mysql($host,$dbuser,$dbpass,$csdl);
include("../app/start/func.php");
$id='';
if(isset($_GET['id'])){$id=$_GET['id'];}

$db->delete("donhang","id = '".$id."'");
?>
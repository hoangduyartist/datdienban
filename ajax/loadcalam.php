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
?>
<?php if ($id == 2) {?>
    <select onchange="setdengio(this.value)" name="den" class="form-control den" id="den">
        <option value="1">15:00</option>
        <option value="2">15:30</option>
        <option value="3">16:00</option>
        <option value="4">16:30</option>
        <option value="5">17:00</option>
    </select>
    <span class="gach"> - </span>
    <select onchange="settugio(this.value)" name="tu" class="form-control tu" id="tu">
        <option value="1">13:00</option>
        <option value="2">13:30</option>
        <option value="3">14:00</option>
        <option value="4">14:30</option>
        <option value="5">15:00</option>
    </select>
<?php } elseif ($id==3) { ?>
    <select onchange="setdengio(this.value)" name="den" class="form-control den" id="den">
        <option value="1">19:00</option>
        <option value="2">19:30</option>
        <option value="3">20:00</option>
        <option value="4">20:30</option>
        <option value="5">21:00</option>
    </select>
    <span class="gach"> - </span>
    <select onchange="settugio(this.value)" name="tu" class="form-control tu" id="tu">
        <option value="1">17:00</option>
        <option value="2">17:30</option>
        <option value="3">18:00</option>
        <option value="4">18:30</option>
        <option value="5">19:00</option>
    </select>
<?php } else {?>
    <select onchange="setdengio(this.value)" name="den" class="form-control den" id="den">
        <option value="1">10:00</option>
        <option value="2">10:30</option>
        <option value="3">11:00</option>
        <option value="4">11:30</option>
        <option value="5">12:00</option>
    </select>
    <span class="gach"> - </span>
    <select onchange="settugio(this.value)" name="tu" class="form-control tu" id="tu">
        <option value="1">08:00</option>
        <option value="2">08:30</option>
        <option value="3">09:00</option>
        <option value="4">09:30</option>
        <option value="5">10:00</option>
    </select>
<?php }?>
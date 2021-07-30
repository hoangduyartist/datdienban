<?php
ob_start();
session_start();
error_reporting( error_reporting() & ~E_NOTICE );
ob_start();
include "../_CORE/index.php";
include "../app/config/config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
include("../app/config/route.php");
include("../app/start/func.php");
$id = $_GET['id'];
?>
<div class="product productkk">
  <?php 
  $q1=$db->selectpost("hien_thi=1 and cat='".$id."' and lang_id='".$lang_code."'","order by thu_tu,time desc");
  while($r1=$db->fetch($q1)){
  ?>
  <div class="item">
    <a href="<?php echo $root.'/'.$r1['slug'] ?>" class="img"><?=get_single_image($r1['post_id'],"post","avatar")?></a>
    <a href="<?php echo $root.'/'.$r1['slug'] ?>" class="name"><?=$r1['ten']?></a>
    <p class="note"><?=lg_string::crop($r1['chu_thich'],14)?></p>
  </div>
  <?php } ?>
</div>
<script type="text/javascript">
	$('.productkk').slick({
	    slidesToShow: 4,
	    slidesToScroll: 1,
	    dots: true,
	    autoplay: true,
	    responsive: [
	      {
	        breakpoint: 992,
	        settings: {
	          slidesToShow: 3,
	        }
	      },
	      {
	        breakpoint: 768,
	        settings: {
	          slidesToShow: 2,
	        }
	      },
	      {
	        breakpoint: 480,
	        settings: {
	          slidesToShow: 1,
	        }
	      }
	    ]
	  });
</script>
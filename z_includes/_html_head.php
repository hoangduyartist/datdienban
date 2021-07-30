<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=get_title()?> </title>

<meta name="author" content="<?=get_author()?>" />
<meta name="keywords" content="<?=get_keywords()?>" />
<meta name="description" content="<?=get_description()?>" />
<meta name="copyright" content="<?=get_copyright()?>" />

<meta http-equiv="expires" content="0" />
<meta name="resource-type" content="document" />
<meta name="distribution" content="global" />
<meta name="robots" content="index, follow" />
<meta name="revisit-after" content="1 days" />
<meta name="rating" content="general" />

<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />
<meta content="telephone=no" name="format-detection" />

<meta property="fb:app_id" content="151937525393193" />

<meta name="google-site-verification" content="AskIoP1OcWljYGuBCb5bV-oTUICYGrTwwPPkVFw2oBI" />

<meta property="og:locale" content="vi_VN" />
<meta property="og:type" content="article" />
<meta property="og:site_name" content="<?=get_bien('title')?>" />
<meta property="article:tag" content="<?=get_bien('title')?>" />   

<?php if($post_type=='news_detail'){ ?>
	<?php if($rcheckpostslug['option1']=='1'){?>
	<meta name="robots" content="noindex, follow, noodp"/>
	<?php }else{ ?>
	<meta name="robots" content="index, follow, noodp"/>
	<?php } ?>
<?php }else{ ?>
<meta name="robots" content="index, follow, noodp"/>
<?php } ?>

<meta property="og:title" content="<?=get_title()?>" />
<meta property="og:description" content="<?=get_description()?>" />
<?php
if($table == 'post'){
?>
<meta property="og:url" content="<?=the_slug?>" />
<meta property="og:image" content="<?=$domain?>/public/images/share2.png" />
<?}elseif($table == 'postcat'){?>
<meta property="og:url" content="<?=$root?>/<?=get_slug_postcat($id_slug)?>/" />
<meta property="og:image" content="<?=$domain?>/public/images/share2.png" />
<?}else{?>
<meta property="og:url" content="<?=$root?>" />
<meta property="og:image" content="<?=$domain?>/public/images/share2.png" />
<?php }?>

<!-- <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,700&amp;subset=vietnamese" rel="stylesheet"> -->
<link rel="shortcut icon" href="<?=$domain?>/public/images/favicon-4.png?cache=0909090" type="image/x-icon"/>
<link href="<?=$domain?>/app/packages/font_awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?=$domain?>/public/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?=$domain?>/public/css/nivo-slider.css" rel="stylesheet" type="text/css"/>
<link href="<?=$domain?>/public/css/slick.css" rel="stylesheet" type="text/css"/>
<link href="<?=$domain?>/public/css/phan_trang.css" rel="stylesheet" type="text/css"/>
<link type="text/css" rel="stylesheet" href="<?=$domain?>/app/packages/menureponsive/jquery.mmenu.all.css" />
<link href="<?=$domain?>/public/css/common.css" rel="stylesheet" type="text/css" />
<!-- <link rel="stylesheet" type="text/css" href="<?=$domain?>/app/packages/fancybox/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
<link rel="stylesheet" type="text/css" href="<?=$domain?>/app/packages/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="<?=$domain?>/app/packages/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" /> -->


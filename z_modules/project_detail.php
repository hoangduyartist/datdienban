<?
$db->update("post","luot_xem",the_view+1," id='".$id_slug."' ");
?>
<div class="contact_box">
 <div class="container">
    <?php echo get_breadcums(); ?>
    <div class="row">
        <div id="sticky-anchor"></div>
        <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3 pro_dt_left">
            <div id="sidebar">
            	<div id="checkdiv"></div>
                <div class="menupage">
                    <div class="intro-title">
                        <h3 class="text-uppercase "><strong style="font-size: 16px;"><?php echo the_title; ?></strong></h3>
                        
                    </div>
                    <ul class="menu-intro">
                        <li><a class="active" href="#gioithieu">Giới thiệu<i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        <?
                        $q02=$db->selectjoin("post_meta","post_meta_key","post_meta.meta_key=post_meta_key.meta_key","post_id='".$id_slug."' and meta_value<>'' and lang_id='".$lang_code."' ","ORDER BY thu_tu, post_meta_key.id");
                        if($db->num_rows($q02) != 0){
                        while($r02=$db->fetch($q02)){
                        ?>
                        <li><a href="#<?=$r02['meta_key']?>"><?=$r02['name']?><i class="fa fa-caret-right" aria-hidden="true"></i></a></li>
                        <? } } else {echo 'Updating...';}?>
                    </ul>
                    <div class="info-detail">
                        <div class="hotline_bg">
                            <div style="margin: 12px 5px 12px 5px;" class="img_hotline"></div>
                            <div class="info_hotline">
                                <a href="tel:<?=get_bien('fax','none')?>" target="_blank"><?=get_bien('fax','none')?></a><br />
                                <a style="font-size: 14px" href="mailto:<?=get_bien('email','none')?>" target="_blank"><?=get_bien('email','none')?></a>
                            </div>
                        </div>
                        <div class="clear"></div>
                        
                    </div><!-- end info-detail -->

                </div>
            </div>
        </div>
        <div class="col-sm-8 col-md-9 col-lg-9 col-xs-12 pro_dt_right">
            <div class="text-justify sub-page-intro" style="max-width: 100%; height: auto;">
                <div class="content-project text-justify">
                    <div id="gioithieu">
                        <h1 class="name-ct content_right_title">Dự án > <?=the_title?></h1>
                        <div class="noi_dung"><?=str_replace("&nbsp;"," ",the_content)?></div>
                    </div>
                    <?
                    $q01=$db->selectjoin("post_meta","post_meta_key","post_meta.meta_key=post_meta_key.meta_key","post_id='".$id_slug."' and meta_value<>'' and lang_id='".$lang_code."' ","ORDER BY thu_tu, post_meta_key.id");
                    while($r01=$db->fetch($q01)){
                    ?><br />
                    <div id="<?=$r01['meta_key']?>" class="noi_dung">
                        <h4 class="name-in"><strong><?=$r01['name']?></strong></h4><br />
                        <?=str_replace("&nbsp;"," ",$r01['meta_value'])?>
                    </div><br />
                    <? }?>
                    
                </div>
                <div class="mangxahoi" style="padding: 10px 0 0;">
                	<script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    
                    <div style="float: left;margin-right: 4px;" class="fb-like" data-href="<?php echo $root.'/'.$rcheckpostslug['slug']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    <!-- Your send button code -->
                  
                    <div style="float: left;margin-top: 2px;" class="right_xh">
                        <script >
                          window.___gcfg = {
                            lang: 'vi',
                            parsetags: 'onload'
                          };
                        </script>
                         <script src="https://apis.google.com/js/platform.js" async defer></script>
                        <g:plus action="share" Annotation="bubble"></g:plus>
                    </div>
                </div>
                <div class="fb-comments" data-href="<?php echo $root.'/'.$rcheckpostslug['slug']; ?>" data-width="100%" data-numposts="5">
            </div>
        </div>
    </div>
</div>
<div class="">
    <div id="stop-sidebar">
        <div class="block-title" style="padding-left: 0">
            <h2 class="name-ct"><a href=""><?=$translate['Dự án khác'][$lang_code]?></a><em style="font-size: 12px;margin-left: 20px;"><a href="<?=$root?>/<?=get_slug(the_parent)?>/"><?=$translate['Xem tất cả'][$lang_code]?> </a> <i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></em></h2>
        </div>
        <ul class="ul_project other row">
        <?php
        $q = $db->selectpost("hien_thi = 1 and cat='".the_parent."' and lang_id='".$lang_code."' and post_id<>'".$id_slug."'","order by thu_tu,time desc limit 4");
        while($r=$db->fetch($q)){
        ?>
        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col-479">
          <div class="img">
            <a href="<?php echo $root.'/'.$r['slug']; ?>"><?=get_single_image($r['post_id'],'post','avatar','html')?></a>
            <a class="name" href="<?php echo $root.'/'.$r['slug']; ?>"><?=$r['ten']?></a>
          </div>
          <!-- <div class="note"><?=str_replace("\n","<br/>",lg_string::crop($r['chu_thich'],26))?></div> -->
        </li>
        <?php }showPageNavigation($page, $pages, $root.'/'.$slugnew.'/');?>
        <div class="clear"></div>
      </ul>
    </div>
</div>
</div>
</div>

<section>
  <div class="container">
    <?php include 'newstt.php'; ?>
  </div>
</section>
<?
$db->query("update post set luot_xem=luot_xem+1 where id='".$id_slug."'");
unset($_SESSION['lien_quan']);
?>
<!-- <div class="img-top" style="background-image: url('<?php echo $domain.'/public/images/bg_khac.jpg';?>');">
    <div class="neo_top">
        <div class="container">
            <div class="neo_top--top">
                <h2 class="title-contentk"><?php echo get_sql("select name from postcat_lang where postcat_id=".the_parent." and lang_id='".$lang_code."'"); ?></h2>
                
            </div>
            
        </div>
    </div>
</div> -->
<?php 
$kitudb = array('"',"'",":","-","!","?","%","&",".",",");
$kitufixdb = array('','','','','','','','','','');
$tennew = str_replace($kitudb,$kitufixdb,the_title);
$array_ss = explode(' ',$tennew);
$array_ss = array_unique($array_ss);
for ($i=0;$i<count($array_ss);$i++) {
    $q=$db->selectpost("cat='".the_parent."' and hien_thi=1 and post_id<>'".$id_slug."'","order by post.id DESC");
    while($r=$db->fetch($q)){
        if($_SESSION['lien_quan'][$r['post_id']]==''){$_SESSION['lien_quan'][$r['post_id']]=0;}
        //echo $_SESSION['lien_quan'][$r['post_id']].' / ';
        $lien_quan=strpos(mb_strtolower($r['ten'], 'UTF-8'),mb_strtolower($array_ss[$i], 'UTF-8'));
        if($lien_quan!=false){
            $_SESSION['lien_quan'][$r['post_id']] = $_SESSION['lien_quan'][$r['post_id']] + 1;
        }else{
            $_SESSION['lien_quan'][$r['post_id']] = $_SESSION['lien_quan'][$r['post_id']];
        }
        //echo $r['post_id'].'=>'.$_SESSION['lien_quan'][$r['post_id']].' | ';
    }
}
arsort($_SESSION['lien_quan']);
?>
<div id="content--content" class="contact_box">
    <div class="container">
        <?php echo get_breadcums(); ?>
        <div class="row">
            <div class="col-md-8 product_right">
                <h1 class="name-title"><?=the_title?></h1>
                <h2 class="chu_thich_detail"><span class="item_news_date_ct"><?=date('d.m.Y',the_time)?></span> - <?=str_replace("&nbsp;"," ",the_note)?></h2>
                <div class="post_lq">
                    <ul>
                        <?php
                        $idem=0;
                        foreach($_SESSION['lien_quan'] as $key=>$value){
                            $idem++;
                            if($idem<=4){
                                $qget=$db->selectpost("post_id='".$key."'","");
                                $rget=$db->fetch($qget);
                                echo '<li><a href="'.$domain.'/'.get_sql("select slug from postcat_lang where postcat_id=".the_parent).'/'.$rget['slug'].'"><i class="fa fa-circle" aria-hidden="true"></i> '.$rget['ten'].'</a></li>';
                            }else{
                                break;
                            }
                        }
                        ?>
                        
                    </ul>
                </div>
                <div class="noi_dung">
                    <?=str_replace("&nbsp;"," ",the_content)?>
                </div>
                <div class="mangxahoi" style="padding: 30px 0 0;">
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    
                    <div style="float: left;margin-right: 4px;" class="fb-like" data-href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$rcheckpostslug['cat']).'/'.$rcheckpostslug['slug']; ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    <!-- Your send button code -->
                 
                    <div style="float: left;" class="right_xh">
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
                <div class="fb-comments" data-href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$rcheckpostslug['cat']).'/'.$rcheckpostslug['slug']; ?>" data-width="100%" data-numposts="5">
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="box-right1 other">
                    <h3 class="title" style="margin-top: 0;">Tin nhiều người đọc hiện nay</h3>
                    <ul>
                        <?php 
                        $q=$db->selectpost("hien_thi=1 and (cat=2 or cat1=2 or cat2=2)","order by noi_bat desc,thu_tu,time desc limit 6");
                        while($r=$db->fetch($q)){
                        ?>
                        <li class="">
                            <div class="col-lg-4 col-md-4  col-sm-4 col-xs-4">
                                <div class="row">
                                <a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=get_single_image($r['post_id'],"post","avatar")?></a>
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8  col-sm-8 col-xs-8">
                                <a class="name" href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=$r['ten']?></a>
                            </div>
                            <div class="clear"></div>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
                <?php include('right.php'); ?>
            </div>
            <div class="clear"></div>
            <div>
                <div style="padding-top: 10px!important;border-top: 1px solid #d4d4d4;margin-top: 30px;">
                    <div class="block-title">
                        <h4 class="text-uppercase">Tin tức liên quan</h4>
                    </div>
                    <div class="block-slide2">
                        <?
                       $q=$db->selectpost("hien_thi=1 and (cat='".the_parent."' or cat1='".the_parent."' or cat2='".the_parent."') and lang_id='".$lang_code."' and post_id<>'".$id_slug."'","order by post.id DESC limit 8");
                        if($db->num_rows($q) != 0){
                        while($r=$db->fetch($q)){
                        ?>
                        <div>
                            <div class="block-news">
                                <div class="text-center block-news-img">
                                    <a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=get_single_image($r['post_id'],"post","avatar")?></a>
                                </div>
                                <div class="block-news-title">
                                    <a class="text-uppercase" href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><h4><?=$r['ten']?></h4></a>
                                    <small><em><?=date('d/m/Y',$r['time_edit'])?> &nbsp; <?=$translate['Người đăng'][$lang_code]?>: <?if(get_user($r["user"],'username')==''){echo "Mod";}else{echo get_user($r["user"],'username');}?></em></small>
                                </div>
                                <div class="block-news-note">
                                    <?=lg_string::crop($r['chu_thich'],20)?>
                                </div>
                            </div>
                        </div>
                        <? } } else {echo 'Updating...';}?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

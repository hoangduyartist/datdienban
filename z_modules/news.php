<?
$page       =   $page + 0;
$perpage    =   12;
    $r_all      =   $db->selectpost("hien_thi=1 and (cat='".$id_slug."' or cat1='".$id_slug."' or cat2='".$id_slug."') and lang_id='".$lang_code."'","");
$sum        =   $db->num_rows($r_all); 
$pages      =   ($sum-($sum%$perpage))/$perpage;
    if ($sum % $perpage <> 0)
        {
            $pages = $pages + 1;
        }
$page       =   ($page==0)?1:(($page>$pages)?$pages:$page);
$min        =   abs($page-1) * $perpage;
$max        =   $perpage;
$count=0;
?>
<!-- <div class="img-top" style="background-image: url('<?php echo $domain.'/public/images/bg_khac.jpg';?>');">
    <div class="neo_top">
        <div class="container">
            <div class="neo_top--top">
                
            </div>
            <div class="neo_top--bot">
                <p><?=the_note?></p>
            </div>
        </div>
    </div>
</div> -->
<div id="content--content" class="contact_box">
    <div class="container">
        <h1 class="content_right_title"><?php echo the_title; ?></h1>
                <?php echo get_breadcums(); ?>
        <div class="row">
            <div class="col-lg-8 product_right">
                <ul class="news_list">
                <?
                $q = $db->selectpost("hien_thi=1 and (cat='".$id_slug."' or cat1='".$id_slug."' or cat2='".$id_slug."') and lang_id='".$lang_code."'","order by post.id DESC LIMIT ".$min.", ".$max);
                if($db->num_rows($q) != 0)
                {
                while($r=$db->fetch($q)){
                ?>
                <li class="sidebar-block-news">
                    <div class="sidebar-block-news">
                        <div class="sidebar-img">
                            <a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug'] ?>"><?=get_single_image($r['post_id'],"post","avatar")?></a>
                        </div>
                        <div class="sidebar-title">
                            <h2><a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug'] ?>"><strong><?= $r['ten']?></strong></a></h2>
                            <small><em><?=date('d/m/Y',$r['time_edit'])?> &nbsp; Người đăng: <?if(get_user($r["user"],'username')==''){echo "Mod";}else{echo get_user($r["user"],'username');}?></em></small>
                            <div class="note"><?=lg_string::crop($r['chu_thich'],25)?>
                        </div>
                    </div>
                </li>
                <?
                }
                
                }
                else 
                {
                   echo '<div> Thông tin đang được cập nhật...</div>';
                }
                ?>
                </ul>
                <div><?php showPageNavigation($page, $pages, $root.'/'.$slugnew.'/'); ?></div>
            </div>
            <div class="col-lg-4">
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
        </div>
    </div>
</div>

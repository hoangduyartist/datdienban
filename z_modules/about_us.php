
<section id="about" class="contact_box">
    <div class="container">
        <h1 class="title-contentk"><?php echo the_title; ?></h1>
                <?php echo get_breadcums(); ?>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="text-justify noi_dung">
                    <?=the_content?>
                </div>
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
</section>
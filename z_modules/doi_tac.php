
<div class="img-top" style="background-image: url('<?php echo $domain.'/public/images/bg_khac.jpg';?>');">
    <div class="neo_top">
        <div class="container">
            <div class="neo_top--top">
                <h1 class="title-contentk"><?php echo the_title; ?></h1>
                <?php echo get_breadcums(); ?>
            </div>
            <div class="neo_top--bot">
                <p><?=the_note?></p>
            </div>
        </div>
    </div>
</div>

<div class="content__wrapper doitac_box">
    <div class="container">
        <ul class="row">
            <?
            $q=$db->selectmedia("hien_thi=1 and parent_id=2 and parent_type='gallery'","order by thu_tu");
            while($r=$db->fetch($q)){
            ?>
            <li class="col-lg-2 col-md-2"><a target="_blank" href="<?=$r['url']?>"><img class="img-responsive" src="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>" alt="<?=$r['title']?>" /></a></li>
            <?php } ?>
        </ul>
    </div>
</div>
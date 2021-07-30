<div style="padding-top: 10px!important;border-top: 1px solid #d4d4d4;margin-top: 30px;">
    <div class="block-title">
        <h4 class="text-uppercase">Tin tức thị trường Bất Động Sản</h4>
    </div>
    <div class="block-slide2">
        <?
       $q=$db->selectpost("hien_thi=1 and cat=4 and lang_id='".$lang_code."'","order by post.id DESC limit 8");
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
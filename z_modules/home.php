<section>
  <div class="silder_wrapper">
    <div style="position: relative;z-index: 2;">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <?
                    $count=0;
                    $q=$db->selectmedia("hien_thi=1 and parent_id=1 and parent_type='gallery'","order by thu_tu");
                    while($r=$db->fetch($q)){$count++;
                    ?>
                    <img src="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>" alt="<?=$r['title']?>" title="#caption<?=$count?>" />
                  <?php }?>
            </div>
        </div>
        <?
          $count1=0;
          $q=$db->selectmedia("hien_thi=1 and parent_id=1 and parent_type='gallery'","order by thu_tu");
          while($r=$db->fetch($q)){$count1++;
          ?>
        <div id="caption<?=$count1?>" class="nivo-html-caption">
            <div class="box-captionnv">
                <a class="a-caption animated hidden-600 <?if($count1%2=='0'){echo 'fadeInRight';}else{echo 'fadeInLeft';}?>" href="<?=$r['url']?>"><?=$r['title']?></a>
                <p class="p1-caption hidden-xs animated <?if($count1%2=='0'){echo 'fadeInLeft';}else{echo 'fadeInRight';}?>"><?php if($r['note']!=''){?><span><?=$r['note']?></span><?php }?><a href="<?=$r['url']?>">Xem thêm</a></p>
                
            </div>
        </div>
         <?php }?>
    </div>
  </div>
</section>
<section class="show_info_wrapper">
  <div class="container">
    <div class="block-title  block-title3c">
        <h2 class="text-uppercase" title="Bất Động Sản nổi bật tại Điện Thắng">BĐS nổi bật tại đất Điện Thắng.com</h2>
    </div>
		<div class="table-home-block">
    <?=get_info('noi_dung','project_home')?>
		</div>
  </div>
</section>
<div class="section2 change3">
    <div class="container">
        <div class="row">
            <div class="block-title  block-title3c">
                <h2 class="text-uppercase" title="Dự án tại Điện Thắng - Điện Bàn mới nhất">Dự án nổi bật tại Điện Thắng - Hội An</h2>
            </div>
            <div class="block-prdc4 ">
                <?
                $q=$db->selectpost("post_type='project_detail' and noi_bat=1 and lang_id='".$lang_code."' ","ORDER BY thu_tu, post.id desc");
                if($db->num_rows($q) != 0){
                while($r=$db->fetch($q)){
                ?>
                <div class="col-xs-6 item">
                    <div class="highlightc3">
                        <div class="highlightc3-title">
                            <h4 style="margin: 0;"><a class="text-uppercase" href="<?=$root?>/<?=$r['slug']?>"><?=$r['ten']?></a></h4>
                        </div>
                        <div class="highlightc3-img">
                            <a href="<?=$root?>/<?=$r['slug']?>"><?=get_single_image($r['post_id'],"post","avatar")?></a>
                        </div>
                        
                    </div>
                </div>
                <? } } else {echo 'Updating...';}?>
            </div>
        </div>
    </div>
</div>
<section class="form_wrapper">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 col-md-9">
        <h5 class="title">Bạn muốn tìm ngay cho mình một lô đất như ý!</h5>
        <p class="note">Hãy liên lạc ngay với chúng tôi để được trợ giúp nhanh nhất, chính xác nhất thông tin nhà đất tại Điện Thắng</p>
      </div>
      <div class="col-lg-3 col-md-3 ccccccc">
        <a class="detail" href="<?php echo $root.'/lien-he.html' ?>">Yêu cầu vị trí ngay</a>
      </div>
    </div>
  </div>
</section>
<section class="muaban_wrapper">
  <div class="container">
    <div class="dat_nb">
      <h2 class="title">Bán đất Điện Thắng nổi bật</h2>
      <ul class="">
        <?php 
        $q = $db->selectpostcat("hien_thi=1 and noi_bat=1","order by thu_tu limit 6");
        while ($r=$db->fetch($q)) {
        ?>
        <li class="col-lg-4 col-md-4 co-sm-6 col-xs-6 col-479"><h2 class="name"><a href="<?php echo $domain.'/'.get_slug_postcat($r['postcat_id']).'/'; ?>"><?php echo $r['name'] ?></a></h2></li>
        <?php } ?>
        <div class="clear"></div>
      </ul>
    </div>
    <?php 
    $demaa = 0;
    $qh1=$db->selectpost("hien_thi=1 and noi_bat=1 and cat=12","order by thu_tu");
    while($rh1=$db->fetch($qh1)){
      $demaa ++;
      if ($demaa === 1) {
        $q=$db->selectpost("hien_thi=1 and post_type = 'catproduct_detail' and option1='".$rh1['post_id']."'","order by noi_bat desc,time desc limit 8");
      } else {
        $q=$db->selectpost("hien_thi=1 and post_type = 'catproduct_detail' and option1='".$rh1['post_id']."'","order by noi_bat desc,time desc limit 4");
      }
      if($db->num_rows($q)!=0){
    ?>
    <h2 class="title-content"><a href="javascript:void(0)" class="title_home" title="Mua bán đất <?php echo $rh1['ten'] ?>">Bán đất <?php echo $rh1['ten'] ?></a></h2>
    <div class="clear"></div>
    <ul class="ul_nhadat row">
      <?php
      
      while($r=$db->fetch($q)){
      ?>
      <li class="col-lg-3 col-md-3 col-sm-3 col-xs-6 ">
        <div class="img">
          <a href="<?=$root?>/<?php echo get_sql("select slug from postcat_lang where postcat_id=".$r['cat']); ?>/<?=$r['slug']?>"><?=get_single_image($r['post_id'],'post','avatar','html')?></a>
        </div>
        <a class="name" href="<?=$root?>/<?php echo get_sql("select slug from postcat_lang where postcat_id=".$r['cat']); ?>/<?=$r['slug']?>"><?=$r['ten']?></a>
        <div class="price_c">Giá: <?=$r['old_price']==''?'Thỏa thuận':price_cover($r['old_price'])?></div>
        <?php if($r['option3']!=''){?>
        <p class="add">Vị trí: <?=$r['option3']?></p>
        <?php } ?>
        <div class="info">
          <!-- <div class="left"><i class="fa fa-calendar"></i> <?=date('d/m/Y',$r['time'])?></div> -->

          <?php if($r['option2']!=0){?>
          <span class="acreage left"><?=$r['option2']?> m<sup>2</sup></span><?php }?>
        </div>
      </li>
      <?php }?>
      <div class="clear"></div>
    </ul>
    <?php }} ?>
  </div>
</section>
<div class="section3">
    <div class="container">
        <div class="">
            <div class="col-sm-12 padding0">
                <div class="block-title">
                    <h3 class="text-uppercase">Tin tức Bất Động Sản nổi Bật hiện nay</h3>
                </div>
                <div class="block-slide2">
                    <?
                    $q=$db->selectpost("( post.cat=2 or post.cat1=2 or post.cat2=2) and post.hien_thi=1 and lang_id='".$lang_code."' ","ORDER BY noi_bat desc,thu_tu, post.id DESC limit 8");
                    if($db->num_rows($q) != 0){
                    while($r=$db->fetch($q)){
                    ?>
                    <div>
                        <div class="block-news">
                            <div class="text-center block-news-img">
                                <a href="<?=$root?>/<?php echo get_sql("select slug from postcat_lang where postcat_id=".$r['cat']); ?>/<?=$r['slug']?>"><?=get_single_image($r['post_id'],"post","avatar")?></a>
                            </div>
                            <div class="block-news-title">
                                <a class="text-uppercase" href="<?=$root?>/<?php echo get_sql("select slug from postcat_lang where postcat_id=".$r['cat']); ?>/<?=$r['slug']?>"><h3><?=$r['ten']?></h3></a>
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



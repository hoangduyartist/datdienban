<?
$db->update("post","luot_xem",the_view+1," id='".$id_slug."' ");
?>

<div class="contact_box">
    <div class="container">
        <?php echo get_breadcums(); ?>
        <div><?if($thongbaoud!=''){?><?=$thongbaoud?><?}?></div>
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div>
              <h1 class="span-title" style="text-transform: uppercase;"><?=the_title?></h1>
              <p class="span-info" style="padding: 10px 0;">Vị trí: <?=$rcheckpostslug['option3']?></a></p>
              <p class="div-price-in"><span>Giá: <?=the_price==''?'Thỏa thuận':price_cover(the_price)?></span> <span class="span-3">Diện tích: <?=$rcheckpostslug['option2']==0?'Không xác đinh':$rcheckpostslug['option2'].'m<sup>2</sup>'?></span></p>
              <div style="padding-top: 10px;" class="div-mota-title">
                  <h3 style="font-size: 13px;color: #8e8e8e">Mô tả chi tiết</h3>
              </div>
              <div class="div-mota" style="margin-top: 5px;">
                  <?=the_content?>
              </div>
            </div>
            <ul class="list-tabk block-list" style="list-style: none;margin-top: 20px;">
              <li><a href="#block-3" class="active">Hình ảnh</a></li>
              <div class="clear"></div>
            </ul>
            <div class="box-album-product">
                <div class="slider-for">
                    <div><a class="fancybox" rel="group<?=$id_slug?>" href="<?=get_single_image($id_slug, 'post', 'avatar','link')?>" title="<?=the_title?>"><img class="img-responsive" src="<?=get_single_image($id_slug, 'post', 'avatar','link')?>" /></a></div>
                    <?
                    $q=$db->selectmedia("parent_id='".$id_slug."' and type='album' and parent_type='post'","order by thu_tu"); 
                    while($r=$db->fetch($q)){
                    ?>
                    <div><a class="fancybox" rel="group<?=$id_slug?>" href="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>" title="<?=the_title?>"><img class="img-responsive" src="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>" /></a></div>
                    <?}?>
                </div>  
                <div class="slider-nav" style="margin: 0 -2px;">
                    <div class="slick-item"><img title="<?=the_title?>" class="img-responsive" src="<?=get_single_image($id_slug, 'post', 'avatar','link')?>" /></div>
                    <?
                    $q=$db->selectmedia("parent_id='".$id_slug."' and type='album' and parent_type='post'","order by thu_tu");  
                    while($r=$db->fetch($q)){
                    ?>
                    <div class="slick-item"><img title="<?=the_title?>" class="img-responsive" src="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>" /></div>
                    <?}?>
                </div>
            </div>
            <div class="clear"></div>
            <div>
                <div class="mangxahoi" style="padding: 30px 0 0;">
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.9";
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    
                    <div style="float: left;margin-right: 4px;" class="fb-like" data-href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$rcheckpostslug['cat']).'/'.$rcheckpostslug['slug'] ?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
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
                <div class="clear"></div>
                <div class="fb-comments" data-href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$rcheckpostslug['cat']).'/'.$rcheckpostslug['slug'] ?>" data-width="100%" data-numposts="5"></div>
            </div>
            <div style="margin-top: 20px;">
            <div class="title-tab"><h4>Các vị trí đất Điện Thắng khác</h4></div>
            <div class="wrapper-news" style="border: none;margin-left: -10px;margin-right: -10px;">
                <ul class="tinrao_ul" style="padding: 0;margin-top: 15px;">
                    <?php
                        $q = $db->selectpost("hien_thi=1 and cat='".the_parent."' and post_id<>'".$id_slug."'","order by noi_bat desc,thu_tu,time desc LIMIT 8");
                        while($r=$db->fetch($q)){
                    ?>
                    <li style="padding-bottom: 0;margin-bottom: 10px;width: 50%;float: left;border: none;">
                        <div style="background: #f5f5f5;margin:0 10px;padding: 10px 10px 0 10px;">
                        <h2 class="name" style="max-width: 100%;"><a style="font-size: 14px;line-height: 18px;" href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug'] ?>"><?=$r['ten']?></a></h2>
                        <a class="imgctr" href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug'] ?>"><?=get_single_image($r['post_id'],'post','avatar','html')?></a>
                        <div class="wrapper_box_rightk">
                          <ul class="info">
                              <li style="font-size: 12.5px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 100%;"><strong>Giá bán: </strong><?=$r['old_price']==''?'Thỏa thuận':price_cover($r['old_price'])?></li>
                              <li style="font-size: 12.5px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 100%;"><strong>Diện tích: </strong><?=$r['option2']==0?'Không xác đinh':$r['option2'].'m<sup>2</sup>'?></li>
                              <li style="font-size: 12.5px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;width: 100%;"><strong>Vị trí: </strong><?=$r['option3']?></li>
                          </ul>
                        </div>
                        <div class="clear"></div>   
                        </div>                             
                    </li>
                    <?}?>
                </ul>
                
                <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 menupage_da">
          <?php include('loc.php'); ?>
          <?php include('right.php'); ?>
        </div>
    </div>
</div>
<section class="bg">
  <div class="container">
    <div style="padding-top: 10px!important;border-top: 1px solid #d4d4d4;margin-top: 30px;">
    <div class="block-title">
        <h4 class="text-uppercase">Kinh nghiệm mua bán nhà đất từ chuyên gia</h4>
    </div>
    <div class="block-slide2">
        <?
       $q=$db->selectpost("hien_thi=1 and cat=6 and lang_id='".$lang_code."'","order by post.id DESC limit 8");
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
</section>
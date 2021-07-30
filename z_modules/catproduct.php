<?
$page       =   $page + 0;
$perpage    =   18;
    $r_all      =   $db->selectpost("hien_thi=1 and (cat='".$id_slug."' or cat1= '".$id_slug."' or cat2 = '".$id_slug."') and lang_id='".$lang_code."'","");
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

<div id="product" class="contact_box">
  <div class="container">
    <h1 class="title-content" style="padding-left: 15px;"><?php echo the_title; ?></h1>
    <?php echo get_breadcums(); ?>
    
    <div class="row">
     <div class="col-lg-8 col-md-8 aaaa">
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
        <ul class="ul_nhadat other row">
          <?php
             $q=$db->selectpost("hien_thi=1 and (cat='".$id_slug."' or cat1= '".$id_slug."' or cat2 = '".$id_slug."') and lang_id='".$lang_code."'","order by time desc LIMIT ".$min.", ".$max);
             if($db->num_rows($q)!=0){
            while($r=$db->fetch($q)){
              ?>
            <li class="col-lg-4 col-md-4 col-sm-4 col-xs-6 ">
              <div class="img">
                <a href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=get_single_image($r['post_id'],'post','avatar','html')?></a>
              </div>
              <a class="name" href="<?php echo $root.'/'.get_sql("select slug from postcat_lang where postcat_id=".$r['cat']).'/'.$r['slug']; ?>"><?=$r['ten']?></a>
              <div class="price_c">Giá: <?=$r['old_price']==''?'Thỏa thuận':price_cover($r['old_price'])?></div>
              <?php if($r['option3']!=''){?>
              <p class="add">Vị trí: <?=$r['option3']?></p>
              <?php } ?>
              <div class="info">
                <!-- <div class="left"><i class="fa fa-calendar"></i> <?=date('d/m/Y',$r['time'])?></div> -->

                <?php if($r['option2']!=0){?>
                <span class="acreage left"><?=$r['option2']?> m<sup>2</sup></span>
                <!-- <span class="acreage right"><?=$r['option2']?> m<sup>2</sup></span> -->
                <?php }?>
              </div>
            </li>
          <?php }?>
          <div class="clear"></div>
          <?php }else{echo '<div class="col-lg-12">'.$translate['Đang cập nhật sản phẩm'][$lang_code].'...</div>';} ?>
        </ul>
        <div><?php showPageNavigation($page, $pages, $root.'/'.$slugnew.'/'); ?></div>
      </div>

      <div class="col-lg-4 col-md-4 menupage_da">
        <?php include('loc.php'); ?>
        <?php include('right.php'); ?>
      </div>
    </div>
  </div>
</div>
<section>
  <div class="container">
    <?php include 'newstt.php'; ?>
  </div>
</section>
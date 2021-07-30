<div class="library mt30 mb30">
    <div class="container">
        <div class="breadcums-box">
          <ul class="breadcrumb">
              <li><a href="<?php echo $root;?>"><?php echo $translate["Trang chủ"][$lang_code]?></a></li>
              <li><a href="<?php echo $root.'/'.show_infopage('thu_vien','slug',9);?>"><?php echo show_infopage('thu_vien','ten',9);?></a></li>
              <li><a href="<?php echo $root.'/'.get_slug(the_parent).'/';?>"><?php echo get_name(the_parent);?></a></li>
          </ul>
        </div>
        <h1 class="title-pages detail center mt20 mb50"><?php echo the_title?></h1>
          <?php
          $page       =   $page + 0;
          $perpage    =   16;
          $r_all      =   $db->selectmedia("parent_id='".$id_slug."' and type='album' and parent_type='post'",""); 
          $sum        =   !empty($r_all) ? $db->num_rows($r_all) : 0;
          $pages      =   ($sum-($sum%$perpage))/$perpage;
          if ($sum % $perpage <> 0){
            $pages = $pages + 1;
          }
          $page       =   ($page==0)?1:(($page>$pages)?$pages:$page);
          $min        =   abs($page-1) * $perpage;
          $max        =   $perpage;
          if ($sum !== 0) {
          ?>
          <div id="img-gallery" class="row">
          <?php
          $q=$db->selectmedia("parent_id='".$id_slug."' and type='album' and parent_type='post'","order by thu_tu, media_relationship.id desc LIMIT ".$min.", ".$max);
          while($r=$db->fetch($q)){
          ?>
            <a class="img-box-item" href="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>" title="<?=the_title?>">
                <div class="item">
                    <img class="img-fluid img" alt="<?=the_title?>" border="0" src="<?=$domain?>/uploads/<?=$r['dir_folder']?>/<?=$r['file_name']?>"/>
                    <div class="gallery-poster">
                        <img src="<?php echo $domain.'/public/images/zoom.png'; ?>">
                    </div>
                </div>
            </a>
          <?php } ?>
      </div>
      <?php } else { ?>
      <div style="background-color: #fff"><?php echo $translate['Đang cập nhật'][$lang_code]?></div>
      <?php } ?>
      <div style="width: 100%;"><?php showPageNavigation($page, $pages, $root.'/'.$slugnew.'/'); ?></div>
  </div>
</div>
<?
$page       =   $page + 0;
$perpage    =   9;
$r_all      =   $db->selectpost("hien_thi = 1 and (cat='".$id_slug."' or cat1='".$id_slug."' or cat2='".$id_slug."') and lang_id='".$lang_code."'","");
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
<div class="img-top" style="background-image: url('<?=get_single_image($id_slug, 'postcat', 'avatar','link')?>');">
    
</div>
<section class="contact_box">
    <div class="container du_an">
       <h1 class="name-title hidden"><?=the_title?></h1>
       <?php echo get_breadcums(); ?>

       <?php 
       if($id_slug==8){
          $q=$db->selectpostcat("hien_thi=1 and cat=8","order by thu_tu");
        }else{
          $q=$db->selectpostcat("hien_thi=1 and postcat_id='".$id_slug."'","order by thu_tu");
        }
       while($r=$db->fetch($q)){
       ?>
       <h2 class="title"><?=$r['name']?></h2>
       <ul class=" du_an_ul"> 
          <?php 
          $q1=$db->selectpost("hien_thi=1 and cat='".$r['postcat_id']."'","order by noi_bat desc,thu_tu,time desc");
          while($r1=$db->fetch($q1)){
          ?>
         <li class="col-lg-4 col-md-4">
          <div class="box">
           <a class="img" href="<?php echo $root.'/'.$r1['slug'] ?>"><?=get_single_image($r1['post_id'],"post","avatar")?></a>
           <h3><a class="text-uppercase name" href="<?php echo $root.'/'.$r1['slug']; ?>"><?=$r1['ten']?></a></h3>
           <p class="note"><?=lg_string::crop($r1['chu_thich'],20)?></p>
           <a class="detail" href="<?php echo $root.'/'.$r1['slug']; ?>">Chi tiết <i class="fa fa-caret-right"></i></a>
           <div class="clear"></div>
           </div>
         </li>
         <?php } ?>
         <div class="clear"></div>
       </ul>
       <?php } ?>

    </div>
</section>
<section>
  <div class="container">
    <?php include 'newstt.php'; ?>
  </div>
</section>
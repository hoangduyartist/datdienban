<div class="header-slider">
<?php
$count=0;
$searT='';
if ($lang_code == 'en') {$searT = ' and title_en<>""';}
$q=$db->selectmedia("hien_thi=1 and parent_id=1 and parent_type='gallery' ".$searT,"order by thu_tu");
while($r=$db->fetch($q)){
  ?>
  <div class="header-slider-items heroslide" data-slick-index="<?php echo $count?>" style="background-image: url('<?php echo $domain?>/uploads/<?php echo $r['dir_folder']?>/<?php echo $r['file_name']?>')">
    <img src="<?php echo $domain?>/uploads/<?php echo $r['dir_folder']?>/<?php echo $r['file_name']?>" alt="<?php echo $lang_code == 'en' ? $r['title_en'] : $r['title']?>" />
    <!-- <div class="slick-caption">
      <div class='slick-caption-box'>
        <h2 class="name" data-animation="animated fadeInUp" data-delay="0.5s">
          <a href="<?php echo $lang_code == 'en' ? $r['url_en'] : $r['url']?>" title="<?php echo $lang_code == 'en' ? $r['title_en'] : $r['title']?>"><?php echo $lang_code == 'en' ? $r['title_en'] : $r['title']?></a>
        </h2>
        <p class="detail">
          <a href="<?php echo $lang_code == 'en' ? $r['url_en'] : $r['url']?>" data-animation="animated fadeInLeft" data-delay="0.5s"><?php echo $translate["Khám phá ngay"][$lang_code]?></a>
        </p>
      </div>
    </div> -->
  </div>
<?php $count++;}?>
</div>
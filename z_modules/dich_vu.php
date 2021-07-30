
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

<div class="content__wrapper other_box dv_box">
    <div class="container">
        <h2 class="about--title" style="margin-bottom: 40px;"><?php echo show_infopage('dich_vu','ten',5); ?> <b>BMS</b></h2>
        <div class="row">
        <?php 
        $dem = 0;
          $q = $db->selectpostcat("hien_thi=1 and post_type='catproduct' and level = 2 and lang_id='".$lang_code."'","order by thu_tu");
          while($r = $db->fetch($q)){$dem ++;
          ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 col-479 item">
              <a class="name" href="<?=$root?>/<?=$r['slug']?>/"><?=$dem?>. <?=$r['name']?></a>
              <div class="row">
                  <div class="col-lg-5 col-md-5">
                      <a class="img" href="<?=$root?>/<?=$r['slug']?>/"><?=get_single_image($r['postcat_id'],'postcat','album','html')?></a>
                  </div>
                  <div class="col-lg-7 col-md-7">
                      <ul class="row dv_khac">
                        <?php 
                        $q1 = $db->selectpostcat("hien_thi=1 and cat = '".$r['postcat_id']."' and lang_id='".$lang_code."'","order by thu_tu");
                        while($r1 = $db->fetch($q1)){
                        ?>
                        <li>
                            <a href="<?=$root?>/<?=get_slug_postcat($r1['postcat_id'])?>/">+ <?=$r1['name']?></a>
                        </li>
                        <?php } ?>
                      </ul>
                      <a class="detail" href="<?=$root?>/<?=get_slug_postcat($r['postcat_id'])?>/"><?php echo $translate['Xem dự án'][$lang_code]; ?></a>
                  </div>
              </div>
              
            </div>
          <?php } ?>
        </div>
    </div>
</div>
<div class="box-right">
  <div class="title" style="margin-top: 0;">Tìm kiếm vị trí đất bạn cần ở đây</div>
  <form class="form_search" role="form" method="get" action="<?=$root?>/tim-kiem.html">
    <input class="form-control" type="" name="keyword"  placeholder="Nhập từ khóa để tìm kiếm...">
    <select class="form-control" name="type">
      <option value="1">Loại bất động sản</option>
      <?php 
      $q=$db->selectpostcat("hien_thi=1 and cat=1","order by thu_tu");
      while($r=$db->fetch($q)){
      ?>
      <option <?php if($type==$r['postcat_id']){echo 'selected=""';} ?> value="<?php echo $r['postcat_id']; ?>"><?php echo $r['name']; ?></option>
      <?php } ?>
    </select>
    <select class="form-control" name="local">
      <option value="">Vị trí</option>
      <?php 
      $q=$db->selectpost("hien_thi=1 and cat=12","order by thu_tu");
      while($r=$db->fetch($q)){
      ?>
      <option <?php if($local==$r['post_id']){echo 'selected=""';} ?> value="<?php echo $r['post_id']; ?>"><?php echo $r['ten']; ?></option>
      <?php } ?>
    </select>
    <select class="form-control" name="acreage">
      <option value="-1">Diện tích</option>
      <option <?php if($acreage==1){echo 'selected=""';} ?> value="1">KXĐ</option>
      <option <?php if($acreage==2){echo 'selected=""';} ?> value="2"><= 30 m²</option>
      <option <?php if($acreage==3){echo 'selected=""';} ?> value="3">30 - 50 m²</option>
      <option <?php if($acreage==4){echo 'selected=""';} ?> value="4">50 - 80 m²</option>
      <option <?php if($acreage==5){echo 'selected=""';} ?> value="5">80 - 100 m²</option>
      <option <?php if($acreage==6){echo 'selected=""';} ?> value="6">100 - 150 m²</option>
      <option <?php if($acreage==7){echo 'selected=""';} ?> value="7">150 - 200 m²</option>
      <option <?php if($acreage==8){echo 'selected=""';} ?> value="8">200 - 250 m²</option>
      <option <?php if($acreage==9){echo 'selected=""';} ?> value="9">250 - 300 m²</option>
      <option <?php if($acreage==10){echo 'selected=""';} ?> value="10">300 - 500 m²</option>
      <option <?php if($acreage==11){echo 'selected=""';} ?> value="11">>= 500 m²</option>
    </select>
    <select class="form-control" name="price">
      <option value="-1">Giá</option>
      <option <?php if($price==1){echo 'selected=""';} ?> value="1">Thỏa thuận</option>
      <option <?php if($price==2){echo 'selected=""';} ?> value="2">< 500 triệu</option>
      <option <?php if($price==3){echo 'selected=""';} ?> value="3">500 - 800 triệu</option>
      <option <?php if($price==4){echo 'selected=""';} ?> value="4">800 - 1 tỷ</option>
      <option <?php if($price==5){echo 'selected=""';} ?> value="5">1 - 2 tỷ</option>
      <option <?php if($price==6){echo 'selected=""';} ?> value="6">2 - 3 tỷ</option>
      <option <?php if($price==7){echo 'selected=""';} ?> value="7">3 - 5 tỷ</option>
      <option <?php if($price==8){echo 'selected=""';} ?> value="8">5 - 7 tỷ</option>
      <option <?php if($price==9){echo 'selected=""';} ?> value="9">7 - 10 tỷ</option>
      <option <?php if($price==10){echo 'selected=""';} ?> value="10">10 - 20 tỷ</option>
      <option <?php if($price==11){echo 'selected=""';} ?> value="11">20 - 30 tỷ</option>
      <option <?php if($price==12){echo 'selected=""';} ?> value="12">> 30 tỷ</option>
    </select>
    <button type="submit" class="btn btn-primary center-block">Tìm kiếm</button>
  </form>
</div>
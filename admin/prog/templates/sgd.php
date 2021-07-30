
<?
function template_edit($url,$func,$id,$txt_cat,$txt_hien_thi,$txt_noi_bat,$post_type,$error)
{
?>

<?

foreach($error as $v){
    echo "<div align=center style='color:#990000;'><strong>".$v."</strong></div>";
}
?>
<style type="text/css">
.form_dk{margin-top: 20px;padding: 0 15px 15px 15px;border-radius: 4px;background: whitesmoke;}
.form_dk .item{padding: 6px 10px 0 10px;background: #def1ff;}
.form_dk .item:nth-child(2n+2){background: none;}
.form_dk .item label{width: 25%;padding-left: 4%;float: left;padding-top: 5px;}
.form_dk .item .item-r{width: 70%;float: right;}
.form_dk .item .item-r span{color: red;font-size: 12px;display: block;margin: 3px 0;}
.form_dk .item:after{clear: both;content: " ";display: table;}

.form_dk .item input,.form_dk .item textarea{border:1px solid #bababa;border-radius: 4px;padding: 4px 10px;margin-bottom: 5px;background: #fff}
.form_dk .item select{border:1px solid #bababa;border-radius: 4px;padding: 7px 10px;margin-bottom: 5px; background: #fff url(../images/select-d.png) no-repeat 97% center;}
.form_dk .item select:hover{cursor: pointer;}
.form_dk .item .width10{width: 70px;}
.form_dk .item .width20{width: 120px;}
.form_dk .item .width50{width: 50%;}
.form_dk .item .width50k{width: 50%;float: left;}
.form_dk .item .width100{width: 100%;}
.form_dk .item .inline-box{display: inline-block;}

#txtCaptchaDiv{background: #fbff0b;padding: 4px 10px 6px;font-weight: bold;letter-spacing: 6px;font-size: 18px;display: inline-block;line-height: 20px;}
.button-submit{text-align: center;padding: 15px 0;}
.button-submit input{background: #0e54a5;border: none;color: #fff;font-weight: bold;font-size: 16px;text-transform: uppercase;padding: 10px 20px;border-radius: 4px;width: 150px;text-align: center;}
.button-submit input:hover{cursor: pointer;}

.loadding1{display: none;}
.red{font-style: normal;font-size: 12px;color: red;}
</style>
<?//=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
<form class="form_dk" name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="post" onsubmit="return CheckForm()">
<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="func" value="<?=$func?>" />
    <div class="col-md-12">
    <?
    global $db;
    $qnn1=$db->select("sgd","id='".$id."'","");
    $rnn1=$db->fetch($qnn1);
    $qnn2=$db->select("sgd_lang","sgd_id='".$id."'","");
    $rnn2=$db->fetch($qnn2);
    ?>
        <h2 class="dk_title"><span>Thông tin chung</span></h2>
        <div class="box-info">
            <div class="item">
                <label>Tên giao dịch <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" type="text" name="ten[vn]" value="<?=$rnn2['ten']?>" class="width100" />
                </div>
            </div>
            <div class="item">
                <label>Loại hình giao dịch</label>
                <div class="item-r">
                    <select class="width50" name="loai_hgd" id="loai_hgd">
                        <option <?php if($rnn1['loai_hgd']==1){echo 'selected=""';}?> value="1">Rao Bán</option>
                        <option <?php if($rnn1['loai_hgd']==2){echo 'selected=""';}?> value="2">Cho thuê</option>
                    </select>
                </div>
            </div>
            <div class="item">
                <label>Loại bất động sản</label>
                <div class="item-r">
                    <select class="width50" name="loai_bds" id="loai_bds">
                         <?php
                        $q=$db->selectpostcat("hien_thi=1 and cat=44","order by thu_tu");
                        while($r=$db->fetch($q)){
                        ?>
                        <option <?php if($rnn1['loai_bds']==$r['postcat_id']){echo 'selected=""';}?> value="<?=$r['postcat_id']?>"><?=$r['name']?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="item">
                <label>Tỉnh/Thành phố <em class="red">(*)</em></label>
                <div class="item-r">
                    <select required="" onchange="show_quan(this.value)" id="tinh_tp" class="width50" name="tinh_tp">
                        <option value="">--Chọn Tỉnh/Thành phố--</option>
                        <?php
                        $q=$db->selectpostcat("hien_thi=1 and cat=23","order by thu_tu");
                        while($r=$db->fetch($q)){
                        ?>
                        <option <?php if($rnn1['tinh_tp']==$r['postcat_id']){echo 'selected=""';}?> value="<?=$r['postcat_id']?>"><?=$r['name']?></option>
                        <?php }?>
                    </select>
                </div>
            </div>
            <div class="item">
                <label>Quận/Huyện <em class="red">(*)</em></label>
                <div class="item-r" id="show_quan">
                    <select required="" class="width50" name="quan_h" id="quan_h">
                        <option value="">--Chọn Quận/Huyện--</option>
                        <?php
                        if($rnn1['tinh_tp']!=0){
                        $q=$db->selectpostcat("hien_thi=1 and cat='".$rnn1['tinh_tp']."'","order by thu_tu");
                        while($r=$db->fetch($q)){
                        ?>
                        <option <?php if($rnn1['quan_h']==$r['postcat_id']){echo 'selected=""';}?> value="<?=$r['postcat_id']?>"><?=$r['name']?></option>
                        <?php }}?>
                    </select>
                    <img style="width: 15px;height: 15px;" alt="loadding1" class="loadding1" src="<?=$domain?>/public/images/loadding.gif">
                </div>
            </div>
        </div>
        <h3 class="dk_title"><span>Thông tin liên lạc</span></h3>
        <div class="box-info">
            <div class="item">
                <label>Người liên hệ <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" class="width50" type="text" id="nguoi_lh" name="nguoi_lh" value="<?php echo $rnn1['nguoi_lh'];?>">
                </div>
            </div>
            <div class="item">
                <label>Địa chỉ <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" class="width100" type="text" id="dia_c" name="dia_c" value="<?php echo $rnn1['dia_c'];?>">
                </div>
            </div>
            <div class="item">
                <label>E-mail</label>
                <div class="item-r">
                    <input class="width50" type="text" id="email" name="email" value="<?php echo $rnn1['email'];?>">
                </div>
            </div>
            <div class="item">
                <label>Số điện thoại <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" class="width50" type="text" id="so_dt" name="so_dt" value="<?php echo $rnn1['so_dt'];?>">
                </div>
            </div>
            <div class="item">
                <label>Số Fax</label>
                <div class="item-r">
                    <input class="width50" type="text" id="so_f" name="so_f" value="<?php echo $rnn1['so_f'];?>">
                </div>
            </div>
        </div>
        <h3 class="dk_title"><span>Đặc điểm bất động sản</span></h3>
        <div class="box-info">
            <div class="item">
                <label>Số nhà <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" class="width20" type="text" id="so_n" name="so_n" value="<?php echo $rnn1['so_n'];?>">
                </div>
            </div>
            <div class="item">
                <label>Đường <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" class="width50" type="text" id="duong" name="duong" value="<?php echo $rnn1['duong'];?>">
                </div>
            </div>
            <div class="item">
                <label>Phường <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" class="width50" type="text" id="phuong" name="phuong" value="<?php echo $rnn1['phuong'];?>">
                </div>
            </div>
            <div class="item">
                <label>Vị trí</label>
                <div class="item-r">
                    <div class="width100"><input <?php if($rnn1['vi_t']==1){echo 'checked=""';}?> type="radio" name="vi_t" value="1"> Mặt tiền</div>
                    <div class="width100"><input <?php if($rnn1['vi_t']==2){echo 'checked=""';}?> type="radio" name="vi_t" value="2"> Mặt tiền nội bộ</div>
                    <div class="width100"><input <?php if($rnn1['vi_t']==3){echo 'checked=""';}?> type="radio" name="vi_t" value="3"> Hẻm <input class="width10" type="text" name="vi_t_3" value="<?php echo $rnn1['vi_t_3'];?>"> m</div>

                </div>
            </div>
            <div class="item">
                <label>Diện tích khuôn viên <em class="red">(*)</em></label>
                <div class="item-r">
                    Chiều rộng <input onchange="calc_dt('kv')" required="" class="width10" type="number" name="kv_r" id="r_kv" value="<?php echo $rnn1['kv_r'];?>"> X Chiều dài <input onchange="calc_dt('kv')" id="d_kv" required="" class="width10" type="number" name="kv_d" value="<?php echo $rnn1['kv_d'];?>"> = <input readonly="" class="width20" type="text" id="dien_tkv" name="dien_tkv" value="<?php echo $rnn1['dien_tkv'];?>"> m²
                </div>
            </div>
            <div class="item">
                <label>Diện tích xây dựng <em class="red">(*)</em></label>
                <div class="item-r">
                    Chiều rộng <input id="r_xd" onchange="calc_dt('xd')" required="" class="width10" type="number" name="xd_r" value="<?php echo $rnn1['xd_r'];?>"> X Chiều dài <input onchange="calc_dt('xd')" id="d_xd" required="" class="width10" type="number" name="xd_d" value="<?php echo $rnn1['xd_d'];?>"> = <input readonly="" class="width20" type="text" id="dien_txd" name="dien_txd" value="<?php echo $rnn1['dien_txd'];?>"> m²
                </div>
            </div>
            <div class="item">
                <label>Diện tích sử dụng <em class="red">(*)</em></label>
                <div class="item-r">
                    <input required="" class="width20" type="text" id="dien_tsd" name="dien_tsd" value="<?php echo $rnn1['dien_tsd'];?>"> m²
                </div>
            </div>
            <div class="item">
                <label>Hướng</label>
                <div class="item-r">
                    <select class="width50" name="huong" id="huong">
                        <option <?php if($rnn1['huong']==1){echo 'selected=""';}?> value="1">Hướng Đông</option>
                        <option <?php if($rnn1['huong']==2){echo 'selected=""';}?> value="2">Hướng Đông Bắc</option>
                        <option <?php if($rnn1['huong']==3){echo 'selected=""';}?> value="3">Hướng Đông Nam</option>
                        <option <?php if($rnn1['huong']==4){echo 'selected=""';}?> value="4">Hướng Tây</option>
                        <option <?php if($rnn1['huong']==5){echo 'selected=""';}?> value="5">Hướng Tây Bắc</option>
                        <option <?php if($rnn1['huong']==6){echo 'selected=""';}?> value="6">Hướng Tây Nam</option>
                        <option <?php if($rnn1['huong']==7){echo 'selected=""';}?> value="7">Hướng Nam</option>
                        <option <?php if($rnn1['huong']==8){echo 'selected=""';}?> value="8">Hướng Bắc</option>
                    </select>
                </div>
            </div>
            <div class="item">
                <label>Số tầng</label>
                <div class="item-r">
                    <input class="width20" type="text" name="so_t" id="so_t" value="<?php echo $rnn1['so_t'];?>"> Tầng
                </div>
            </div>
            <div class="item">
                <label>Nội thất</label>
                <div class="item-r">
                    <div class="width50k"><input class="width10" type="text" name="phong_n" value="<?php echo $rnn1['phong_n'];?>"> Phòng ngủ</div>
                    <div class="width50k"><input class="width10" type="text" name="phong_k" value="<?php echo $rnn1['phong_k'];?>"> Phòng khách</div>
                    <div class="width50k"><input class="width10" type="text" name="phong_a" value="<?php echo $rnn1['phong_a'];?>"> Phòng ăn</div>
                    <div class="width50k"><input class="width10" type="text" name="phong_t" value="<?php echo $rnn1['phong_t'];?>"> Phòng tắm</div>
                    <div class="width50k"><input class="width10" type="text" name="phong_th" value="<?php echo $rnn1['phong_th'];?>"> Phòng thờ</div>
                </div>
            </div>
            <div class="item">
                <label>Tiện nghi</label>
                <div class="item-r">
                    <?php 
                        $tien_n_n = explode('$',$rnn1['tien_n']);
                    ?>
                    <div class="width50k"><input <?php if(in_array('1', $tien_n_n)){echo 'checked=""';}?> type="checkbox" name="tien_n[]" value="1"> Điện</div>
                    <div class="width50k"><input <?php if(in_array('2', $tien_n_n)){echo 'checked=""';}?> type="checkbox" name="tien_n[]" value="2"> Điện thoại</div>
                    <div class="width50k"><input <?php if(in_array('3', $tien_n_n)){echo 'checked=""';}?> type="checkbox" name="tien_n[]" value="3"> Internet</div>
                    <div class="width50k"><input <?php if(in_array('4', $tien_n_n)){echo 'checked=""';}?> type="checkbox" name="tien_n[]" value="4"> Nước</div>
                    <div class="width50k"><input <?php if(in_array('5', $tien_n_n)){echo 'checked=""';}?> type="checkbox" name="tien_n[]" value="5"> Giếng đóng</div>
                    <div class="width50k"><input <?php if(in_array('6', $tien_n_n)){echo 'checked=""';}?> type="checkbox" name="tien_n[]" value="6"> Truyền hình cáp</div>
                </div>
            </div>
            <div class="item">
                <label>Tình trạng pháp lý</label>
                <div class="item-r">
                    <div class="width100"><input <?php if($rnn1['tinh_tpl']==1){echo 'checked=""';}?> type="radio" name="tinh_tpl" value="1"> Sổ hồng</div>
                    <div class="width100"><input <?php if($rnn1['tinh_tpl']==2){echo 'checked=""';}?> type="radio" name="tinh_tpl" value="2"> Sổ đỏ</div>
                    <div class="width100"><input <?php if($rnn1['tinh_tpl']==3){echo 'checked=""';}?> type="radio" name="tinh_tpl" value="3"> Các giấy tờ khác <input class="width50" type="text" name="tinh_tpl_3" value="<?php echo $rnn1['tinh_tpl_3'];?>"></div>
                </div>
            </div>
            <div class="item">
                <label>Phù hợp kinh doanh</label>
                <div class="item-r">
                    <div class="width100"><input <?php if($rnn1['phu_hkd']==1){echo 'checked=""';}?> type="checkbox" id="phu_hkd" name="phu_hkd" value="1"> Phù hợp kinh doanh</div>
                </div>
            </div>
            <div class="item">
                <label>Mô tả thêm</label>
                <div class="item-r">
                    <textarea class="width100" name="chu_thich[vn]" rows="5"><?=$rnn2['chu_thich']?></textarea>
                </div>
            </div>
            <div class="item">
                <label>Giá</label>
                <div class="item-r">
                    <input class="width20" type="text" name="gia" value="<?php echo $rnn1['gia'];?>">
                    <select name="don_v">
                        <option <?php if($rnn1['don_v']==1){echo 'selected=""';}?> value="1">Triệu đồng</option>
                        <option <?php if($rnn1['don_v']==2){echo 'selected=""';}?> value="2">Tỷ đồng</option>
                        <option <?php if($rnn1['don_v']==3){echo 'selected=""';}?> value="3">Lượng SJC</option>
                        <option <?php if($rnn1['don_v']==4){echo 'selected=""';}?> value="4">USD</option>
                    </select>
                    Tính theo m
                    <div class="inline-box"><input <?php if($rnn1['tinh_tm']==1){echo 'checked=""';}?> type="checkbox" name="tinh_tm" value="1"></div>
                </div>
            </div>
            <div class="item">
                <label>Cho thương lượng</label>
                <div class="item-r">
                    <div class="width100"><input <?php if($rnn1['thuong_l']==1){echo 'checked=""';}?> type="checkbox" name="thuong_l" value="1"> Đồng ý thương lượng</div>
                </div>
            </div>
        </div>
        <h3 class="dk_title"><span>Hình ảnh bất động sản</span></h3>
        <div class="box-info">
            <div class="item">
                <label>Hình ảnh</label>
                <div class="item-r">
                    <div class="box-choosefile">
                        <input type="file" name="txt_hinh" id="file-1" class="form-control inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple />
                        <label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span>
                        </label>
                    </div>
                    <?if($func=='update'){?>
                    <p><img style="max-width: 150px;" src="<?=$domain?>/uploads/sgd-img/<?=$rnn1['file']?>"></p>
                    <?php }?>
                </div>
            </div>
        </div>
        <h3 class="dk_title"><span>Kiểm duyệt</span></h3>
        <div class="box-info">
            <div class="item">
                <label>Hiển thị</label>
                <div class="item-r">
                    <input name="txt_hien_thi" type="radio" value="0" <?=$txt_hien_thi==0?"checked":""?> /> Off *&nbsp;&nbsp;
                    <input name="txt_hien_thi" type="radio" value="1" <?=$txt_hien_thi==1?"checked":""?> /> On&nbsp;&nbsp;
                </div>
            </div>
            <div class="item">
                <label>Nổi bật</label>
                <div class="item-r">
                    <input name="txt_noi_bat" type="radio" value="0" <?=$txt_noi_bat==0?"checked":""?> /> Off *&nbsp;&nbsp;
                    <input name="txt_noi_bat" type="radio" value="1" <?=$txt_noi_bat==1?"checked":""?> /> On&nbsp;&nbsp;
                </div>
            </div>
        </div>
        <div class="form-group text-right">
            <input name="submit" type="submit" class="btn btn-success" value="Submit" />
        </div>
            
    </div>
        
    
    
    <div class="clear"></div>
</form>

<script type="text/javascript">
    function calc_dt(a){
    var r_kv = document.getElementById("r_kv").value;
    var d_kv = document.getElementById("d_kv").value;
    var r_xd = document.getElementById("r_xd").value;
    var d_xd = document.getElementById("d_xd").value;
    if(a=='kv'){
        if(r_kv==''){
            alert('Bạn chưa nhập chiều rộng khuôn viên');
        }else if(d_kv==''){
            alert('Bạn chưa nhập chiều dài khuôn viên');
        }else{
            document.getElementById("dien_tkv").value = parseFloat(r_kv)*parseFloat(d_kv);
        }
    }else{
        if(r_xd==''){
            alert('Bạn chưa nhập chiều rộng diện tích xây dựng');
        }else if(d_xd==''){
            alert('Bạn chưa nhập chiều dài diện tích xây dựng');
        }else{
            document.getElementById("dien_txd").value = parseFloat(r_xd)*parseFloat(d_xd);
        }

    }

}
function show_quan(a){
    $.ajax({type :'GET',url : '<?=$domain?>/ajax/show_quan.php',data : { id : a }, beforeSend: function() { $(".loadding1").show(); }, success : function(data){ $("#show_quan").html(data);$(".loadding1").hide(); }});
}
</script>

<?
}
?>
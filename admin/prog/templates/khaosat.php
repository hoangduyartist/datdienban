<?
function	template_edit($url,$func,$id,$code,$lop,$khoa,$giang_vien,$mon_hoc,$hoc_k,$nam_h1,$nam_h2,$si_so,$day_start,$day_end,$gio_start,$gio_end,$error)
{
?>
<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="post" style="margin:0px;" />
<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
<input type="hidden" name="func" value="<?=$func?>" />
<input type="hidden" name="id" value="<?=$id?>" />
    <fieldset class="bg-form">
        <div class="form-group" style="width: 49%;float: left;">
            <label class="control-label">Id cuộc Khảo sát (mã code)</label>
            <input required type="text" name="code" value="<?=$code?>" class="form-control"/>
        </div>
        <div class="form-group" style="width: 49%;float: right;">
            <label class="control-label">Số lần khảo sát</label>
            <input required type="number" name="si_so" value="<?=$si_so?>" class="form-control" style="width: 30%;"/>
        </div>
        <div class="form-group" style="width: 49%;float: left;">
            <label class="control-label">Lớp</label>
            <select class="form-control" name="lop" required>
                <option value="">--Chọn lớp--</option>
                <?php
                global $db;
                $q=$db->selectpost("hien_thi=1 and cat = 94 and lang_id = 'vn'","order by thu_tu, ten");
                while($r=$db->fetch($q)){
                ?>
                <option <?php if($lop == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group" style="width: 49%;float: right;">
            <label class="control-label">Khoa</label>
            <select class="form-control" name="khoa" required>
                <option value="">--Chọn khoa--</option>
                <?php
                global $db;
                $q=$db->selectpost("hien_thi=1 and cat = 93 and lang_id = 'vn'","order by thu_tu, ten");
                while($r=$db->fetch($q)){
                ?>
                <option <?php if($khoa == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group" style="width: 49%;float: left;">
            <label class="control-label">Giảng viên</label>
            <select class="form-control" name="giang_vien" required>
                <option value="">--Chọn giảng viên--</option>
                <?php
                global $db;
                $q=$db->selectpost("hien_thi=1 and cat = 96 and lang_id = 'vn'","order by thu_tu, ten");
                while($r=$db->fetch($q)){
                ?>
                <option <?php if($giang_vien == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group" style="width: 49%;float: right;">
            <label class="control-label">Môn học</label>
            <select class="form-control" name="mon_hoc" required>
                <option value="">--Chọn môn học--</option>
                <?php
                global $db;
                $q=$db->selectpost("hien_thi=1 and cat = 95 and lang_id = 'vn'","order by thu_tu, ten");
                while($r=$db->fetch($q)){
                ?>
                <option <?php if($mon_hoc == $r['post_id']){echo 'selected';}?> value="<?=$r['post_id']?>"><?=$r['ten']?></option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <span class="small">
                <label>Học kỳ:</label>
                <select name="hoc_k" required class="form-control" style="width: 60px; display: inline-block;">
                    <option <?php if($hoc_k == 1){echo 'selected';}?> value="1">I</option>
                    <option <?php if($hoc_k == 2){echo 'selected';}?> value="2">II</option>
                </select>
            </span>,
            <span class="small">
                <label style="margin-right: 0">Năm học: 20</label>
                <select name="nam_h1" required class="form-control" style="width: 60px; display: inline-block;">
                    <?php
                    for ($i=10;$i<30;$i++) {
                    ?>
                    <option <?php if($nam_h1 == $i){echo 'selected';}?> value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                </select>
                 <label style="margin-right: 0">- 20</label>
                <select name="nam_h2" required class="form-control" style="width: 60px; display: inline-block;">
                    <?php
                    for ($i=10;$i<30;$i++) {
                    ?>
                    <option <?php if($nam_h2 == $i){echo 'selected';}?> value="<?=$i?>"><?=$i?></option>
                    <?php } ?>
                </select>
            </span>
        </div>
        <div class="form-group " style="width: 50%;">
            <label class="control-label">Thời gian bắt đầu</label>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <select name="gio_start" class="form-control">
                        <option <?php if ($gio_start == '06:00:00') { echo 'selected'; }?> value="06:00:00">06:00</option>
                        <option <?php if ($gio_start == '06:30:00') { echo 'selected'; }?> value="06:30:00">06:30</option>
                        <option <?php if ($gio_start == '07:00:00') { echo 'selected'; }?> value="07:00:00">07:00</option>
                        <option <?php if ($gio_start == '07:30:00') { echo 'selected'; }?> value="07:30:00">07:30</option>
                        <option <?php if ($gio_start == '08:00:00') { echo 'selected'; }?> value="08:00:00">08:00</option>
                        <option <?php if ($gio_start == '08:30:00') { echo 'selected'; }?> value="08:30:00">08:30</option>
                        <option <?php if ($gio_start == '09:00:00') { echo 'selected'; }?> value="09:00:00">09:00</option>
                        <option <?php if ($gio_start == '09:30:00') { echo 'selected'; }?> value="09:30:00">09:30</option>
                        <option <?php if ($gio_start == '10:00:00') { echo 'selected'; }?> value="10:00:00">10:00</option>
                        <option <?php if ($gio_start == '10:30:00') { echo 'selected'; }?> value="10:30:00">10:30</option>
                        <option <?php if ($gio_start == '11:00:00') { echo 'selected'; }?> value="11:00:00">11:00</option>
                        <option <?php if ($gio_start == '11:30:00') { echo 'selected'; }?> value="11:30:00">11:30</option>
                        <option <?php if ($gio_start == '12:00:00') { echo 'selected'; }?> value="12:00:00">12:00</option>
                        <option <?php if ($gio_start == '12:30:00') { echo 'selected'; }?> value="12:30:00">12:30</option>
                        <option <?php if ($gio_start == '13:00:00') { echo 'selected'; }?> value="13:00:00">13:00</option>
                        <option <?php if ($gio_start == '13:30:00') { echo 'selected'; }?> value="13:30:00">13:30</option>
                        <option <?php if ($gio_start == '14:00:00') { echo 'selected'; }?> value="14:00:00">14:00</option>
                        <option <?php if ($gio_start == '14:30:00') { echo 'selected'; }?> value="14:30:00">14:30</option>
                        <option <?php if ($gio_start == '15:00:00') { echo 'selected'; }?> value="15:00:00">15:00</option>
                        <option <?php if ($gio_start == '15:30:00') { echo 'selected'; }?> value="15:30:00">15:30</option>
                        <option <?php if ($gio_start == '16:00:00') { echo 'selected'; }?> value="16:00:00">16:00</option>
                        <option <?php if ($gio_start == '16:30:00') { echo 'selected'; }?> value="16:30:00">16:30</option>
                        <option <?php if ($gio_start == '17:00:00') { echo 'selected'; }?> value="17:00:00">17:00</option>
                        <option <?php if ($gio_start == '17:30:00') { echo 'selected'; }?> value="17:30:00">17:30</option>
                        <option <?php if ($gio_start == '18:00:00') { echo 'selected'; }?> value="18:00:00">18:00</option>
                        <option <?php if ($gio_start == '18:30:00') { echo 'selected'; }?> value="18:30:00">18:30</option>
                        <option <?php if ($gio_start == '19:00:00') { echo 'selected'; }?> value="19:00:00">19:00</option>
                        <option <?php if ($gio_start == '19:30:00') { echo 'selected'; }?> value="19:30:00">19:30</option>
                        <option <?php if ($gio_start == '20:00:00') { echo 'selected'; }?> value="20:00:00">20:00</option>
                        <option <?php if ($gio_start == '20:30:00') { echo 'selected'; }?> value="20:30:00">20:30</option>
                    </select>
                </div>
                <div class="col-lg-9 col-md-9">
                    <input value="<?=$day_start?>" style="line-height: normal!important" type='date' name="day_start" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="form-group " style="width: 50%;">
            <label class="control-label">Thời gian kết thúc</label>
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <select name="gio_end" class="form-control">
                        <option <?php if ($gio_end == '06:30:59') { echo 'selected'; }?> value="06:30:59">06:30</option>
                        <option <?php if ($gio_end == '07:00:59') { echo 'selected'; }?> value="07:00:59">07:00</option>
                        <option <?php if ($gio_end == '07:30:59') { echo 'selected'; }?> value="07:30:59">07:30</option>
                        <option <?php if ($gio_end == '08:00:59') { echo 'selected'; }?> value="08:00:59">08:00</option>
                        <option <?php if ($gio_end == '08:30:59') { echo 'selected'; }?> value="08:30:59">08:30</option>
                        <option <?php if ($gio_end == '09:00:59') { echo 'selected'; }?> value="09:00:59">09:00</option>
                        <option <?php if ($gio_end == '09:30:59') { echo 'selected'; }?> value="09:30:59">09:30</option>
                        <option <?php if ($gio_end == '10:00:59') { echo 'selected'; }?> value="10:00:59">10:00</option>
                        <option <?php if ($gio_end == '10:30:59') { echo 'selected'; }?> value="10:30:59">10:30</option>
                        <option <?php if ($gio_end == '11:00:59') { echo 'selected'; }?> value="11:00:59">11:00</option>
                        <option <?php if ($gio_end == '11:30:59') { echo 'selected'; }?> value="11:30:59">11:30</option>
                        <option <?php if ($gio_end == '12:00:59') { echo 'selected'; }?> value="12:00:59">12:00</option>
                        <option <?php if ($gio_end == '12:30:59') { echo 'selected'; }?> value="12:30:59">12:30</option>
                        <option <?php if ($gio_end == '13:00:59') { echo 'selected'; }?> value="13:00:59">13:00</option>
                        <option <?php if ($gio_end == '13:30:59') { echo 'selected'; }?> value="13:30:59">13:30</option>
                        <option <?php if ($gio_end == '14:00:59') { echo 'selected'; }?> value="14:00:59">14:00</option>
                        <option <?php if ($gio_end == '14:30:59') { echo 'selected'; }?> value="14:30:59">14:30</option>
                        <option <?php if ($gio_end == '15:00:59') { echo 'selected'; }?> value="15:00:59">15:00</option>
                        <option <?php if ($gio_end == '15:30:59') { echo 'selected'; }?> value="15:30:59">15:30</option>
                        <option <?php if ($gio_end == '16:00:59') { echo 'selected'; }?> value="16:00:59">16:00</option>
                        <option <?php if ($gio_end == '16:30:59') { echo 'selected'; }?> value="16:30:59">16:30</option>
                        <option <?php if ($gio_end == '17:00:59') { echo 'selected'; }?> value="17:00:59">17:00</option>
                        <option <?php if ($gio_end == '17:30:59') { echo 'selected'; }?> value="17:30:59">17:30</option>
                        <option <?php if ($gio_end == '18:00:59') { echo 'selected'; }?> value="18:00:59">18:00</option>
                        <option <?php if ($gio_end == '18:30:59') { echo 'selected'; }?> value="18:30:59">18:30</option>
                        <option <?php if ($gio_end == '19:00:59') { echo 'selected'; }?> value="19:00:59">19:00</option>
                        <option <?php if ($gio_end == '19:30:59') { echo 'selected'; }?> value="19:30:59">19:30</option>
                        <option <?php if ($gio_end == '20:00:59') { echo 'selected'; }?> value="20:00:59">20:00</option>
                        <option <?php if ($gio_end == '20:30:59') { echo 'selected'; }?> value="20:30:59">20:30</option>
                        <option <?php if ($gio_end == '21:00:59') { echo 'selected'; }?> value="21:00:59">21:00</option>
                    </select>
                </div>
                <div class="col-lg-9 col-md-9">
                    <input value="<?=$day_end?>" style="line-height: normal!important" type='date' name="day_end" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="form-group">
            <input name="submit" type="submit" class="btn btn-success" value="Submit" />
        </div>
    </fieldset>
</form>

<?php
}
?>
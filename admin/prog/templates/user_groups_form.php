<!--------------------------------------------------------
 _______                               __               
/       \                             /  |              
$$$$$$$  |  ______    ______         _$$ |_    _______  
$$ |__$$ | /      \  /      \       / $$   |  /       \ 
$$    $$<  $$$$$$  |/$$$$$$  |      $$$$$$/   $$$$$$$  |
$$$$$$$  | /    $$ |$$ |  $$ |        $$ | __ $$ |  $$ |
$$ |__$$ |/$$$$$$$ |$$ \__$$ |        $$ |/  |$$ |  $$ |
$$    $$/ $$    $$ |$$    $$/         $$  $$/ $$ |  $$ |
$$$$$$$/   $$$$$$$/  $$$$$$/           $$$$/  $$/   $$/ 

// Tạo mới, chỉnh sửa user group
---------------------------------------------------------->
<?php
include "./../app/models/RoleModel.php";
?>
<form enctype="multipart/form-data" method="POST">
<input type="hidden" name="id" value="<?php echo $id?>" />
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="form-group">
        <label class="control-label">Tên</label>
        <input type="text" name="name" value="<?php echo $name?>" class="form-control" />
      </div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="form-group">
        <label class="control-label">Vai trò</label>
        <select name="role" class="form-control">
        <!-- TODO: Khi đăng nhập kiểm tra nhóm quyền nào được tạo nhóm quyền nào? -->
        <?php
        $roleArray = array();
        switch ($_SESSION["member_role"]) {
          case $Role0->code:
            $roleArray = [$Role0->code, $Role1->code, $Role2->code];
            break;
          case $Role1->code:
            $roleArray = [$Role1->code, $Role2->code];;
            break;
          default:
          $roleArray = array();
        }
        foreach($Roles as $key => $value) {
          if (conditionCollation($value->code, $roleArray)) {
          ?>
          <option value="<?php echo $value->code?>" <?php echo ($role==$value->code)?'selected=true':''?>><?php echo $value->code?></option> 
        <?php }}?>
        </select>
      </div>
    </div>
    <?php if($_SESSION["level"]==0){?>
    <div class="col-lg-6 col-md-6 col-sm-6">
      <div class="form-group">
        <label class="control-label">Là administrator</label>
        <div class="radio-list check-box-row">
          <label class="checkbox-inline">
            <input name="is_administrator" type="radio" value="0" <?php echo $is_administrator==0?"checked":""?> /> Off *
          </label>
          <label class="checkbox-inline">
            <input name="is_administrator" type="radio" value="1" <?php echo $is_administrator==1?"checked":""?> /> On
          </label>
        </div>
      </div>
    </div>
    <?php }?>
  </div>
  <div class="row-fix">
    <div class="form-action text-center">
      <div class="btn-common">
        <button type="submit" name="submit" value="<?php echo FORMACTION::ACT_SAVE?>" class="btn btn-success">Lưu</button>
      </div>
      <div class="btn-common">
        <button type="reset" name="reset" value="reset" class="btn btn-default">Làm mới</button>
      </div>
    </div>
  </div>
</form>
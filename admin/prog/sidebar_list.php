<?php
include "../app/models/ModelModule.php";
if($_SESSION["level"]==0||$_SESSION["level"]==1)
{
?>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
    <li class="active">Sidebar</li>
  </ol>
</section><!--/. content-header-->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box-common box-danger">
        <div class="paddinglr10">
          <div class="table-responsive">
            <ul class="list-sub">
              <?php
              foreach ($modulePages as $key => $value) {
                ?>
                <li><a href="#<?php echo $value->tab?>" class="<?php echo $value->active?>"><?php echo $value->value?></a></li>
              <?php }?>
              <div class="clear"></div>
            </ul>
          <?php
          foreach ($modulePages as $key => $value) {
            ?>
            <fieldset class="bg-form block-sub <?php echo $value->active?>" id="<?php echo $value->tab?>" style="padding:0;">
              <button type="button" class="btn btn-primary add-form" data-type="<?php echo $value->type?>" style="margin-bottom:10px;min-width:92px"><i class="fa fa-plus" aria-hidden="true"></i>Thêm</button>
              <span class="notification" style="display: none">Thành công</span>
              <div class="table-responsive" style="overflow: hidden;">
                <table class="table table-custom">
                  <tr>
                    <th>Tiêu đề module</th>
                    <th>Loại module</th>
                    <th>Html module</th>
                    <th>Html list</th>
                    <th>Hiển thị</th>
                    <th>Hành động</th>
                    <th>Sắp xếp</th>
                  </tr>
                </table>
              </div>
              <form class="form-module" action="" method="post"> 
                <input type="hidden" name="page[<?php echo $value->type?>]" value="<?php echo $value->type?>">
                <ul class="show-clone-empty" data-type="<?php echo $value->type?>"></ul>
                <ul class="show-clone" data-type="<?php echo $value->type?>">
                <?php
                $q=$db->select("vn_modules", "page='".$value->type."'", "ORDER BY sort ASC, id DESC");
                while($r=$db->fetch($q)){
                  ?>
                  <li id="<?php echo $r["id"]?>" data-id="<?php echo $r["id"]?>" data-type="<?php echo $r["page"]?>">
                    <div class="table-responsive">
                      <table class="table table-custom">
                        <tr>
                          <td>
                            <input type="text" name="modulename" value="<?php echo $r["module_name"]?>" id="moduleName" class="form-control" />
                          </td>
                          <td>
                            <select name="moduletype" class="form-control">
                            <?php
                            foreach ($moduleTypes as $key => $value) {
                              ?>
                              <option value="<?php echo $value->id?>" <?php echo ($r["module_type"]==$value->id)?"selected":""?>><?php echo $value->name?></option>
                            <?php }?>
                            </select>
                          </td>
                          <td>
                            <input type="text" name="htmlmodule" value="<?php echo $r["module_html_tag"]?>" class="form-control" />
                          </td>
                          <td>
                            <input type="text" name="htmllist" value="<?php echo $r["html_list_tag"]?>" class="form-control" />
                          </td>
                          <td>
                            <label class="radio-inline"><input type="radio" name="display<?php echo $r["id"]?>" value="1" <?php echo ($r["is_display"]==1)?"checked":""?>>On</label>
                            <label class="radio-inline"><input type="radio" name="display<?php echo $r["id"]?>" value="0" <?php echo ($r["is_display"]==0)?"checked":""?>>Off</label>
                          </td>
                          <td>
                            <button type="button" class="btn btn-success del-danger" data-id="<?php echo $r["id"]?>" data-type="<?php echo $r["page"]?>" name="editDB"><i class="fa fa-floppy-o" aria-hidden="true"></i>Lưu</button>
                            <button type="button" class="btn btn-danger del-danger" data-id="<?php echo $r["id"]?>" data-type="<?php echo $r["page"]?>" name="delDB"><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</button>
                          </td>
                          <td>
                            <i class="fa fa-arrows" aria-hidden="true"></i>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </li>
                <?php }?>
                </ul>
              </form>
            </fieldset>
          <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php }else{?>
<div>Bạn không có quyền truy cập</div>
<?}?>
<div class="div-clone" style="display: none">
    <ul class="new">
        <li>
            <div class="table-responsive">
                <table class="table table-custom table-background">
                    <tr>
                        <td>
                            <input type="text" name="modulename" class="form-control" />
                        </td>
                        <td>
                            <select name="moduletype" class="form-control">
                                <?php
                                foreach ($moduleTypes as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="htmlmodule" class="form-control" />
                        </td>
                        <td>
                            <input type="text" name="htmllist" class="form-control" />
                        </td>
                        <td>
                            <label class="radio-inline"><input type="radio" name="display" value="1" checked>On</label>
                            <label class="radio-inline"><input type="radio" name="display" value="0">Off</label>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success del-danger" data-action="NEW" name="save"><i class="fa fa-floppy-o" aria-hidden="true"></i>Lưu</button>
                            <button type="button" class="btn btn-danger del-danger" name="delete"><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</button>
                        </td>
                        <td>
                        </td>
                    </tr>
                </table>
            </div>
        </li>
    </ul>
    <ul class="edit">
        <li>
            <div class="table-responsive">
                <table class="table table-custom table-background">
                    <tr>
                        <td>
                            <input type="text" name="modulename" class="form-control" />
                        </td>
                        <td>
                            <select name="moduletype" class="form-control">
                                <?php
                                foreach ($moduleTypes as $key => $value) {
                                    ?>
                                    <option value="<?php echo $value->id?>"><?php echo $value->name?></option>
                                <?php }?>
                            </select>
                        </td>
                        <td>
                            <input type="text" name="htmlmodule" class="form-control" />
                        </td>
                        <td>
                            <input type="text" name="htmllist" class="form-control" />
                        </td>
                        <td>
                            <label class="radio-inline"><input type="radio" name="display" value="1" checked>On</label>
                            <label class="radio-inline"><input type="radio" name="display" value="0">Off</label>
                        </td>
                        <td>
                            <button type="button" class="btn btn-success del-danger" data-action="EDIT" name="editDB"><i class="fa fa-floppy-o" aria-hidden="true"></i>Lưu</button>
                            <button type="button" class="btn btn-danger del-danger" name="delDB"><i class="fa fa-trash-o" aria-hidden="true"></i>Xóa</button>
                        </td>
                        <td>
                            <i class="fa fa-arrows sort" aria-hidden="true"></i>
                        </td>
                    </tr>
                </table>
            </div>
        </li>
    </ul>
</div>
<script>
$(function(){
    // khai báo dữ liệu
    var declare = {
        FORMVALUE:{
            inputradio: "input[type='radio']",
            inputname: "input[name='modulename']",
            inputmoduletype: "select[name='moduletype']",
            inputhtmlmodule: "input[name='htmlmodule']",
            inputhtmllist: "input[name='htmllist']",
            buttoneditDB: "button[name='editDB']",
            buttondelDB: "button[name='delDB']",
            // News
            buttondel: "button[name='delete']",
            buttonsave: "button[name='save']",
        },
        HTML: {
            divclone: ".div-clone ul.new li",
            divcloneEdit: ".div-clone ul.edit li",
            buttonadd: ".add-form",
            table: "table.table.table-custom",
        },
        HTMLRETURN: {
            divshow: ".show-clone",
            divshowempty: ".show-clone-empty",
            divshowitem: ".show-clone li",
            divshowitemempty: ".show-clone-empty li",
        },
        EVENT:{
            click: "click",
            submit: "submit",
            change: "change",
        }
    };

    // Thêm mới 1 hàng dữ liệu [JS]
    var liId = -1;
    $(declare.HTML.buttonadd).on(declare.EVENT.click, function(event){
        event.preventDefault();
        var type = $(this).data("type");
        if(type!=""){
            var divclone = $(declare.HTML.divclone).clone(true);
            divclone.attr("data-id", liId);
            divclone.attr("data-type", type);
            divclone.find(declare.FORMVALUE.inputradio).attr("name", "display" + liId);
            divclone.find(declare.FORMVALUE.buttondel).attr("data-id", liId);
            divclone.find(declare.FORMVALUE.buttondel).attr("data-type", type);
            divclone.find(declare.FORMVALUE.buttonsave).attr("data-id", liId);
            divclone.find(declare.FORMVALUE.buttonsave).attr("data-type", type);
            divclone.find(".sort").remove();
            $(declare.HTMLRETURN.divshowempty + "[data-type='" + type + "']").prepend(divclone.last());
            liId--;
        }
    });
    // xóa 1 hàng dữ liệu [JS]
    $(declare.FORMVALUE.buttondel).on(declare.EVENT.click, function(event){
        event.preventDefault();
        var id = $(this).data("id");
        if(id!="" && id < 0){
            $(declare.HTMLRETURN.divshowitemempty + "[data-id='" + id + "']").remove();
        }
    });
    // Lưu mới dữ liệu [AJAX]
    $(declare.FORMVALUE.buttonsave).on(declare.EVENT.click, function(event){
        event.preventDefault();
        var id = $(this).data("id");
        var type = $(this).data("type");
        NewEditModule(id, type, "NEW");
    });
    // edit dữ liệu [AJAX]
    $(declare.FORMVALUE.buttoneditDB).on(declare.EVENT.click, function(event){
        event.preventDefault();
        var id = $(this).data("id");
        var type = $(this).data("type");
        NewEditModule(id, type, "EDIT");
    });
    // delete dữ liệu [AJAX]
    $(declare.FORMVALUE.buttondelDB).on(declare.EVENT.click, function(event){
        event.preventDefault();
        var id = $(this).data("id");
        var type = $(this).data("type");
        var wanto = confirm("Want to delete?");
        if(wanto){
            NewEditModule(id, type, "DEL");
        }
    });
    // function() NEW and EDIT and DELETE
    function NewEditModule(id, type, action){
        if(action=="NEW"){
            var liDataIdAndType = declare.HTMLRETURN.divshowitemempty + "[data-id='" + id + "'][data-type='" + type + "']";
        }else{
            var liDataIdAndType = declare.HTMLRETURN.divshowitem + "[data-id='" + id + "'][data-type='" + type + "']";
        }
        var moduleName = $(liDataIdAndType + " " + declare.FORMVALUE.inputname).val();
        var moduleType = $(liDataIdAndType + " " + declare.FORMVALUE.inputmoduletype).val();
        var htmlModule = $(liDataIdAndType + " " + declare.FORMVALUE.inputhtmlmodule).val();
        var htmlList = $(liDataIdAndType + " " + declare.FORMVALUE.inputhtmllist).val();
        var isdisplay = $(liDataIdAndType + " input[name='display" + id + "']:checked").val();
        var formData = {id:id, type:type, moduleName:moduleName, moduleType:moduleType, htmlModule:htmlModule, htmlList:htmlList, isdisplay:isdisplay, action:action};
        $.ajax({
            type: "POST",
            url: "/admin/ajax/module_api.php",
            data: formData,
            dataType: "json",
            success: function(response){
                if(response["notification"] == true){
                    if(response["action"] == "NEW"){
                        var divcloneEdit = $(declare.HTML.divcloneEdit).clone(true, true);
                        divcloneEdit.attr("id", response["item"]["id"]);
                        divcloneEdit.attr("data-id", response["item"]["id"]);
                        divcloneEdit.attr("data-type", response["item"]["page"]);
                        divcloneEdit.find(declare.FORMVALUE.inputradio).attr("name", "display" + response["item"]["id"]);
                        divcloneEdit.find(declare.FORMVALUE.buttondelDB).attr("data-id", response["item"]["id"]);
                        divcloneEdit.find(declare.FORMVALUE.buttondelDB).attr("data-type", response["item"]["page"]);
                        divcloneEdit.find(declare.FORMVALUE.buttoneditDB).attr("data-id", response["item"]["id"]);
                        divcloneEdit.find(declare.FORMVALUE.buttoneditDB).attr("data-type", response["item"]["page"]);
                        // value
                        divcloneEdit.find(declare.FORMVALUE.inputname).attr("value", response["item"]["module_name"]);
                        divcloneEdit.find(declare.FORMVALUE.inputhtmlmodule).attr("value", response["item"]["module_html_tag"]);
                        divcloneEdit.find(declare.FORMVALUE.inputhtmllist).attr("value", response["item"]["html_list_tag"]);
                        // divcloneEdit.find(declare.FORMVALUE.inputhtmlmodule).val(response["item"]["module_html_tag"]);
                        //divcloneEdit.find(declare.FORMVALUE.inputhtmllist).val(response["item"]["html_list_tag"]);
                        divcloneEdit.find(declare.FORMVALUE.inputmoduletype + " option[value='" + response["item"]["module_type"] + "']").attr('selected','selected');
                        divcloneEdit.find("input[name='display" + response["item"]["id"] + "']" + "[value='" + response["item"]["is_display"] + "']").attr("checked", "checked");

                        divcloneEdit.find(".table").removeClass("table-background");
                        $(declare.HTMLRETURN.divshow + "[data-type='" + type + "']").prepend(divcloneEdit.last());
                        // show graphic success
                        $(declare.HTMLRETURN.divshowitem + "[data-id='" + response["item"]["id"] + "'").find("input").addClass("border-success");
                        $(declare.HTMLRETURN.divshowitem + "[data-id='" + response["item"]["id"] + "'").find("select").addClass("border-success");
                        // remove() row after submit success
                        $(liDataIdAndType).remove();
                    }else if(response["action"] == "EDIT"){
                        // show graphic success
                        $(declare.HTMLRETURN.divshowitem + "[data-id='" + id + "'").find("input").addClass("border-success");
                        $(declare.HTMLRETURN.divshowitem + "[data-id='" + id + "'").find("select").addClass("border-success");
                    }else if(response["action"] == "DEL"){
                        // hide item delete
                        $(liDataIdAndType).slideUp(500);
                        setTimeout(function(){
                            $(liDataIdAndType).remove();
                        }, 600);
                    }
                }else{
                    if(response["error"]["inputname"] == false){$(liDataIdAndType + " " + declare.FORMVALUE.inputname).addClass("border-error");}
                    if(response["error"]["inputtype"] == false){$(liDataIdAndType + " " + declare.FORMVALUE.inputmoduletype).addClass("border-error");}
                }
            }          
        }).done(function(){
            setTimeout(function(){
                $(declare.FORMVALUE.inputname).removeClass("border-error");
                $(declare.FORMVALUE.inputmoduletype).removeClass("border-error");
                $(declare.HTMLRETURN.divshowitem).find("input").removeClass("border-success");
                $(declare.HTMLRETURN.divshowitem).find("select").removeClass("border-success");
            }, 1500);
        })
    };
    // Xắp xếp các module trong page
    $(".show-clone").sortable({
        connectWith: '.show-clone',
        opacity: 0.6,
        axis: "y",
        stop: function(event, ui){
            var sortData = $(this).sortable('toArray');
            var action = "SORT";
            $.ajax({
                type: "POST",
                url: "/admin/ajax/module_api.php",
                dataType: "json",
                data: {sortData:sortData, action:action},
                success: function(response){
                    if(response["notification"]==true){
                        $(".notification").show();
                        setTimeout(function(){
                            $(".notification").hide();
                        }, 500);
                    }
                }
            });
        },
    });
    $(".show-clone").disableSelection();

});
</script>
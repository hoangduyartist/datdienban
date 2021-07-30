<?php
function	template_edit($url,$func,$id,$txt_ten,$txt_url,$txt_note,$title_seo,$keywords,$description,$error)
{   
?>
<?=$error!=""?"<div align=center style='color:#990000;'><strong>".$error."</strong></div>":""?>
<form name="frm_edit" id="frm_edit" action="<?=$url?>" enctype="multipart/form-data" method="POST" style="margin:0px;" onsubmit="return CheckForm()"/>
<input type="hidden" name="act" value="<?=str_replace("?act=","",$url)?>" />
<input type="hidden" name="id" value="<?=$id?>" />
<input type="hidden" name="func" value="<?=$func?>" />
    <div class="bg-form">
        <div class="row">
          <div class="col-sm-<?=($_GET['act']=='postcat_edit')?'8':'12'?>">
            <fieldset class="bg-form block-sub active" style="padding:0;">
                <div class="form-group">
                    <label class="control-label"><span>[ <i>Name</i> ]</span></label>
                    <input required="" type="text" name="txt_ten" value="<?=$txt_ten?>" class="form-control"/>
                </div>
                <div class="form-group">
                    <label class="control-label"><span>[ <i>Slug</i> ]</span></label>
                    <input type="text" name="txt_url" value="<?=$txt_url?>" class="form-control"/>
                </div>
                
                <div class="form-group">
                    <label class="control-label"><span>[ <i>Note</i> ]</span></label>
                    <textarea name="txt_note" class="form-control" rows="5"><?=$txt_note?></textarea>
                </div>
                <style>
                .form-seo{display: inline-block;padding: 10px;margin: 10px 0 20px;background: #3399FF;color:#fff}
                .form-seo,.form-seo:link,.form-seo:active,.form-seo:focus{color:#fff;}
                .form-seo:hover{background: #196ec3;}
                .show-form-seo{display: none;}
                </style>
                <a class="form-seo btn btn-sm" href="javascript:;">Click show info SEO</a>
                <div class="show-form-seo">
                    <div class="form-group">
                        <label class="control-label">Title-Tiêu đề SEO</label>
                        <input type="text" name="title_seo" value="<?=$title_seo?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Keywords-Từ khóa SEO</label>
                        <input type="text" name="keywords" value="<?=$keywords?>" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Description-Mô tả SEO</label>
                        <input type="text" name="description" value="<?=$description?>" class="form-control" />
                    </div>
                </div>
            </fieldset>
          </div>
          <div class="col-sm-<?=($_GET['act']=='tag_edit')?'4':'12'?>">
              <div class="form-group">
                  <input name="submit" type="submit" class="btn btn-success" value="Submit" />
              </div>
          </div>
          <div class="clear"></div>
        </div>
    </div>
</form>
<?php }?>
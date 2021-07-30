<?php if($_SESSION["level"]==0||$_SESSION["level"]==1){?>
<?php
$func = '';
$error = '';
$id = 0;
if(isset($_POST['func'])&&$_POST['func']!=''){ 
    $func = $_POST['func'];
}
if(isset($_GET['id'])&&$_GET['id']!=''){ 
    $id = $_GET['id'];
}
include "templates/tag.php";
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li><a href="?act=tag_list">List Tag</a></li>
        <li class="active">Edit</li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-green">
            <div class="paddinglr10">
            
            <?php
            	if ($func == "update")
            	{
                    $id = $_POST["id"];
                    $act = $_POST['act'];
                    $kitu1 = array('"',"'");
                    $kitu2 = array('&quot;','&#39;');
                    $media_id  =   $_POST['media_id'];
                    $txt_ten = str_replace($kitu1,$kitu2,$_POST['txt_ten']);
                    
                    $tenslug = $_POST['txt_ten'];
                    $txt_note = str_replace($kitu1,$kitu2,$_POST['txt_note']);
                    $txt_cat = $_POST['txt_cat'];
                    $txt_url = $_POST['txt_url'];

                    $title_seo = str_replace($kitu1,$kitu2,$_POST['title_seo']);
                    $keywords = str_replace($kitu1,$kitu2,$_POST['keywords']);
                    $description = str_replace($kitu1,$kitu2,$_POST['description']);

                    if($txt_url==''){$txt_url = $tenslug;}
                    $getslug=lg_string::slug($txt_url);

                    $qcheck = $db->select("tag","slug = '".$getslug."' and id <> '".$id."'","");
                    if($txt_ten==''){
                        $error = 'Vui lòng nhập Name!';
                    }else if($db->num_rows($qcheck)!=0){
                        $error = 'Tag này đã tồn tại rồi, không dùng được!';
                    }else{
                        $db->query("update tag set name = '".$txt_ten."',name_kd = '".lg_string::bo_dau($txt_ten)."',slug = '".$getslug."',note='".$txt_note."',title_seo='".$title_seo."',keywords='".$keywords."',description='".$description."' where id = '".$id."'");
                        admin_load("","?act=tag_edit&id=".$id);
                    }
            	}else{
            		$r	= $db->select("tag","id = '".$id."'");
            		while ($row = $db->fetch($r))
            		{
            			$txt_ten	= $row["name"];
                        $txt_url    = $row["slug"];
                        $txt_note   = $row["note"];
            			$title_seo	= $row["title_seo"];
            			$keywords	= $row["keywords"];
                        $description=$row["description"];
            		}
            	}     
            		template_edit("?act=tag_edit","update",$id,$txt_ten,$txt_url,$txt_note,$title_seo,$keywords,$description,$error);
            ?>
            <?}else{?>
            <div>Bạn không có quyền truy cập !</div>
            <?}?>
                </div>
            </div>
        </div>
    </div>
</section>
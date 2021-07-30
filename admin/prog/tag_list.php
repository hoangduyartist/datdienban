<?php if($_SESSION["level"]==0||$_SESSION["level"]==1){
$func = '';
$page = 1;
$error = '';
$s = '';
$key = '';
if(isset($_POST['func'])&&$_POST['func']!=''){ 
    $func = $_POST['func'];
}
if(isset($_GET['page'])&&$_GET['page']!=''){ 
    $page = $_GET['page'];
}
if(isset($_GET['s'])&&$_GET['s']!=''){ 
    $sold = $_GET['s'];
    $s =  trim($_GET['s']) ;      // Cắt bỏ khoảng trắng
    $s = lg_string::bo_dau($s);
}
if($s!=''){
    $key = "(name_kd like '%$s%' or slug like '%$s%')";
}
if($func == 'del'){
    $tik = $_POST['tik'];
    for ($i = 0; $i < count($tik); $i++)
    {
        $db->delete("tag_relationship","tag_id = '".$tik[$i]."'");
        $db->delete("tag","id = '".$tik[$i]."'");
    }  
}
?>

<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li class="active">Tag list</li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-md-8 col-md-push-4">
            <div class="box-common box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Tag list</h3>
                    <div class="box-tools pull-right">
                        <form action="" method="get">
                            <input type="hidden" name="act" value="tag_list" />
                            <input style="padding:2px 5px;box-shadow: inset 0 1px 2px rgba(0,0,0,.07);outline: none;border: 1px solid #ddd; " type="text" name="s" value="<?php echo $sold; ?>">
                            <button>Tìm thẻ</button>
                        </form>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="paddinglr10">
                    <div class="table-responsive">
                        <form action="?act=tag_list" method="post" onsubmit="return confirm('Bạn có chắc chắn không ?');">
                            <input type="hidden" name="func" value="del" />
                            <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td class="nametitle">Name</td>
                                    <td>Note</td>
                                    <td>Slug</td>
                                    <td class="an767">Count</td>
                                    <td>Del</td>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $page      =   $page + 0;
                            $perpage    =   40;
                            $r_all      =   $db->select("tag",$key,"");
                            $sum        =   $db->num_rows($r_all);
                            $pages      =   ($sum-($sum%$perpage))/$perpage;
                            if ($sum % $perpage <> 0 )  $pages = $pages+1;
                            $page       =   ($page==0)?1:(($page>$pages)?$pages:$page);
                            $min        =   abs($page-1) * $perpage;
                            $max        =   $perpage;

                            $q		=	$db->select("tag",$key,"order by id desc LIMIT ".$min.", ".$max);
                            while ($r = $db->fetch($q))
                            {
                                $q1		=	$db->select("tag_relationship","tag_id=".$r['id'],"");
                                $demsl = $db->num_rows($q1);
                            ?>
                            <tr>
                            	<td><strong><a class="url cat1" href="?act=tag_edit&id=<?=$r["id"]?>"><?=$r["name"]?></a>
                                    <span><a href="?act=tag_edit&id=<?=$r["id"]?>">Edit</a></span>
                                </strong></td>
                                <td><?php echo $r['note']; ?></td>
                                <td><?php echo $r['slug']; ?></td>
                                <td class="an767"><span><?=$demsl?></span></td>
                                <td><input name="tik[]" type="checkbox" value="<?=$r["id"]?>" /></td>
                            </tr>
                            <?php }?>
                            </tbody>
                            <tfoot>
                            <tr>
                            	<td colspan="4">
                            		<strong>Page : </strong>
                            		<?php
                            			if ($pages==0) echo ":1:";
                                		for($i=1;$i<=$pages;$i++) {
                                			if ($i==$page) echo "<b>[".$i."]</b>";
                                			else {
                            					echo "<a href='?act=tag_list&page=$i'>-$i-</a>";
                            				}
                            			}
                                	?>
                            	</td>
                                <td><input style="width: 70px" type="submit" value="Del" class="btn btn-success" /></td>
                            </tr>
                            </tfoot>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-md-pull-8">
            <div>
            <div class="addcate">Add New Tag</div>
            <?php
                include "templates/tag.php";
                
            	if ($func == "new"){

                    $act = $_POST['act'];
                    $kitu1 = array('"',"'");
                    $kitu2 = array('&quot;','&#39;');
                    $txt_ten = str_replace($kitu1,$kitu2,$_POST['txt_ten']);
                    $tenslug = $_POST['txt_ten'];
                    $txt_note = str_replace($kitu1,$kitu2,$_POST['txt_note']);
                    $txt_url = $_POST['txt_url'];
                    
                    $title_seo = str_replace($kitu1,$kitu2,$_POST['title_seo']);
                    $keywords = str_replace($kitu1,$kitu2,$_POST['keywords']);
                    $description = str_replace($kitu1,$kitu2,$_POST['description']);

                    if($txt_url==''){$txt_url = $tenslug;}
                    $getslug=lg_string::slug($txt_url);

                    $qcheck = $db->select("tag","slug = '".$getslug."'","");
                    if($txt_ten==''){
                        $error = 'Vui lòng nhập Name!';
                    }else if($db->num_rows($qcheck)!=0){
                        $error = 'Tag này đã tồn tại rồi, không dùng được!';
                    }else{
                        $id = $db->insert("tag","name,name_kd,slug,note,time,title_seo,keywords,description","'".$txt_ten."','".lg_string::bo_dau($txt_ten)."','".$getslug."','".$txt_note."','".time()."','".$title_seo."','".$keywords."','".$description."'");
                        if($id){
                            admin_load("","?act=tag_list");
                        }else{
                            $error = 'Cannot insert database!';
                        }
                    }
            	}else{
                    $id = '';
                    $txt_ten = '';
                    $txt_url = '';
                    $txt_note = '';
                    $title_seo = '';
                    $keywords = '';
                    $description = '';
            	} 
           		template_edit("?act=tag_list","new",$id,$txt_ten,$txt_url,$txt_note,$title_seo,$keywords,$description,$error);
            ?>
            </div>
        </div>
    </div>
</section>
<?}else{?>
<div>Bạn không có quyền truy cập !</div>
<?}?>
<script>

</script>
<?php
	$act               = $_POST['act'];
    $txt_hien_thi      = $_POST['txt_hien_thi'];
    $txt_noi_bat       = $_POST['txt_noi_bat'];

    $kitu1 = array('"',"'");
    $kitu2 = array('&quot;','&#39;');
    $ten = str_replace($kitu1,$kitu2,$_POST['ten']);
    $tenslug = $_POST['ten'];
    $chu_thich = str_replace($kitu1,$kitu2,$_POST['chu_thich']);
    $noi_dung = $_POST['noi_dung'];
    $lang = $_POST['lang'];
    
    if(isset($_POST['loai_hgd'])){ $loai_hgd=$_POST['loai_hgd']; }
    if(isset($_POST['loai_bds'])){ $loai_bds=$_POST['loai_bds']; }
    if(isset($_POST['tinh_tp'])){ $tinh_tp=$_POST['tinh_tp']; }
    if(isset($_POST['quan_h'])){ $quan_h=$_POST['quan_h']; }
    if(isset($_POST['nguoi_lh'])){ $nguoi_lh=$_POST['nguoi_lh']; }
    if(isset($_POST['dia_c'])){ $dia_c=$_POST['dia_c']; }
    if(isset($_POST['email'])){ $email=$_POST['email']; }
    if(isset($_POST['so_dt'])){ $so_dt=$_POST['so_dt']; }
    if(isset($_POST['so_f'])){ $so_f=$_POST['so_f']; }
    if(isset($_POST['so_n'])){ $so_n=$_POST['so_n']; }
    if(isset($_POST['duong'])){ $duong=$_POST['duong']; }
    if(isset($_POST['phuong'])){ $phuong=$_POST['phuong']; }
    if(isset($_POST['vi_t'])){ $vi_t=$_POST['vi_t']; }
    if(isset($_POST['vi_t_3'])){ $vi_t_3=$_POST['vi_t_3']; }
    if(isset($_POST['dien_tkv'])){ $dien_tkv=$_POST['dien_tkv']; }
    if(isset($_POST['dien_txd'])){ $dien_txd=$_POST['dien_txd']; }
    if(isset($_POST['kv_r'])){ $kv_r=$_POST['kv_r']; }
    if(isset($_POST['kv_d'])){ $kv_d=$_POST['kv_d']; }
    if(isset($_POST['xd_r'])){ $xd_r=$_POST['xd_r']; }
    if(isset($_POST['xd_d'])){ $xd_d=$_POST['xd_d']; }
    if(isset($_POST['dien_tsd'])){ $dien_tsd=$_POST['dien_tsd']; }
    if(isset($_POST['huong'])){ $huong=$_POST['huong']; }
    if(isset($_POST['so_t'])){ $so_t=$_POST['so_t']; }
    if(isset($_POST['phong_n'])){ $phong_n=$_POST['phong_n']; }
    if(isset($_POST['phong_k'])){ $phong_k=$_POST['phong_k']; }
    if(isset($_POST['phong_a'])){ $phong_a=$_POST['phong_a']; }
    if(isset($_POST['phong_t'])){ $phong_t=$_POST['phong_t']; }
    if(isset($_POST['phong_th'])){ $phong_th=$_POST['phong_th']; }
    if(isset($_POST['tien_n'])){ 
        $tien_n=$_POST['tien_n'];
        $tien_n_new='';
        for ($i = 0; $i < count($tien_n); $i++)
        {
            if($i==count($tien_n)-1){
                $tien_n_new.= $tien_n[$i];
            }else{
                $tien_n_new.= $tien_n[$i].'$';
            }
        }
    }
    if(isset($_POST['tinh_tpl'])){ $tinh_tpl=$_POST['tinh_tpl']; }
    if(isset($_POST['tinh_tpl_3'])){ $tinh_tpl_3=$_POST['tinh_tpl_3']; }
    if(isset($_POST['phu_hkd'])){ $phu_hkd=$_POST['phu_hkd']; }
    if(isset($_POST['gia'])){ $gia=$_POST['gia']; }
    if(isset($_POST['tinh_tm'])){ $tinh_tm=$_POST['tinh_tm']; }
    if(isset($_POST['thuong_l'])){ $thuong_l=$_POST['thuong_l']; }
    if(isset($_POST['don_v'])){ $don_v=$_POST['don_v']; }
    
    $func = $_POST['func'];
    
    if ($_POST["func"]=="update") 
    {
    $id = $_POST["id"];
    $post_type = $_POST['post_type'];
    }
    else 
    {
    $id = $_GET['id'];
    $post_type = $_GET['post_type'];
    } 
   
    $post_type_cha=str_replace("_detail","",$post_type);
    
    $qcheck=$db->select("language","display=1","order by thu_tu limit 1");
    $rcheck=$db->fetch($qcheck);
    
    include "templates/sgd.php";    
    
    $qcat1 = $db->select("sgd","id=".$id);
    $rcat1=$db->fetch($qcat1);
    $qlang1	= $db->select("sgd_lang","sgd_id = '".$id."'","order by id limit 1");
    $rlang1 = $db->fetch($qlang1);
    

?>
<section class="content-header">
    <h1>Edit<small>Version 2.0</small></h1>
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li><a href="?act=sgd_list">Danh mục</a></li>
        <li class="active"><?=$rlang1['ten']?></li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-green">

            <div class="box-header with-border">
                <h3 class="box-title">Edit | <?=$rlang1['ten']?></h3>
                <div class="box-tools pull-right">
                    <span class="function">
                        <a href="?act=sgd_new">Thêm mới</a>
                    </span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="paddinglr10">
            <?php
            	//	Kiểm tra sự tồn tại của ID
            	$id = $id + 0;
            	$r	= $db->select("sgd","id = '".$id."'");
            	if ($r->num_rows == 0)
            		admin_load("Không tồn tại mục này.","?act=sgd_list");
            	$max_file_size =   4048000;
                $up_dir         =   '../uploads/sgd-img/';
            
                $OK = false;
                $error= array();                
            
            	if ($func == "update")
            	{
            		if (empty($ten[$rcheck['code']]))
            			$error[] = "Vui lòng nhập tên.";
            		else
            		{
                        // kiểm tra file uploads.
                        $file_type = $_FILES['txt_hinh']['type'];
                        $file_name = $_FILES['txt_hinh']['name'];
                        $file_size = $_FILES['txt_hinh']['size'];
                        switch ($file_type)
                        {
                            case "image/pjpeg"  : $file_type = "jpg"; break;
                            case "image/jpeg"   : $file_type = "jpg"; break;
                            case "image/gif"    : $file_type = "gif"; break;
                            case "image/x-png"  : $file_type = "png"; break;
                            case "image/png"    : $file_type = "png"; break;
                            default : $file_type = "unk"; break;
                        }
                        $file_full_name = "tmp_".time().".".$file_type;
                        if ( ($file_size > 0) && ($file_size <= $max_file_size) )
                            if ($file_type != "unk")
                            if ( @move_uploaded_file($_FILES['txt_hinh']['tmp_name'],$up_dir.$file_full_name) )
                            {
                            $OK = true;
                            $hinh = true;
                            }
                            else
                            $error = "Không thể upload hình ảnh.";
                            else
                            {
                                $error = "Sai định dạng file - Không thể upload hình ảnh.";
                            }
                        else
                        {
                            if ($file_size == 0)
                            {
                                $OK     = true;
                                $hinh   = false;
                            }
                            else
                                $error = "Hình của bạn chọn vượt quá kích thước cho phép.";
                        }
                        // Process xong
                        if ($OK)
                        {
            				$db->query("update sgd set hien_thi = '".($txt_hien_thi+0)."' , noi_bat = '".($txt_noi_bat+0)."' ,user_edit='".$thanh_vien["id"]."',time_edit='".time()."',loai_hgd='".$loai_hgd."',loai_bds='".$loai_bds."',tinh_tp='".$tinh_tp."',quan_h='".$quan_h."',nguoi_lh='".$nguoi_lh."',dia_c='".$dia_c."',email='".$email."',so_dt='".$so_dt."',so_f='".$so_f."',so_n='".$so_n."',duong='".$duong."',phuong='".$phuong."',vi_t='".$vi_t."',vi_t_3='".$vi_t_3."',dien_tkv='".$dien_tkv."',dien_txd='".$dien_txd."',kv_r='".$kv_r."',kv_d='".$kv_d."',xd_r='".$xd_r."',xd_d='".$xd_d."',dien_tsd='".$dien_tsd."',huong='".$huong."',so_t='".$so_t."',phong_n='".$phong_n."',phong_k='".$phong_k."',phong_a='".$phong_a."',phong_t='".$phong_t."',phong_th='".$phong_th."',tien_n='".$tien_n_new."',tinh_tpl='".$tinh_tpl."',tinh_tpl_3='".$tinh_tpl_3."',phu_hkd='".$phu_hkd."',gia='".$gia."',tinh_tm='".$tinh_tm."',thuong_l='".$thuong_l."',don_v='".$don_v."' where id = '".$id."'");
                            
                            $q=$db->select("language","display=1","order by thu_tu");
                            while($r=$db->fetch($q)){
                                if($ten[$r['code']]!=''){
                                    $qedit=$db->select("sgd_lang","lang_id='".$r['code']."' and sgd_id='".$id."'","order by id");
                                    $redit=$db->fetch($qedit);
                                    $getslug=lg_string::slug($tenslug[$r['code']]).'.html';
                                    $checkslug=$db->select("sgd_lang","slug='".$getslug."' and sgd_id<>'".$id."' ","");
                                    if($db->num_rows($checkslug)==1){
                                        $getslug=lg_string::slug($ten[$r['code']]).$id.'.html';
                                    }else{
                                        $getslug=lg_string::slug($ten[$r['code']]).'.html';
                                    }
                                    if($redit['id']!=''){
                                        $db->query("update sgd_lang set ten = '".$ten[$r['code']]."',ten_kd = '".lg_string::bo_dau($ten[$r['code']])."',chu_thich = '".$chu_thich[$r['code']]."',chu_thich_kd = '".lg_string::bo_dau($chu_thich[$r['code']])."' , noi_dung = '".$noi_dung[$r['code']]."' ,noi_dung_kd='".lg_string::bo_dau($noi_dung[$r['code']])."',title_seo='".$title_seo[$r['code']]."',keywords='".$keywords[$r['code']]."',description='".$description[$r['code']]."',slug='".$getslug."' where id = '".$redit['id']."'");
                                    }else{
                                        $db->insert("sgd_lang","sgd_id,lang_id,ten,ten_kd,chu_thich,chu_thich_kd,noi_dung,noi_dung_kd,title_seo,keywords,description,slug","'".$id."','".$r['code']."','".$ten[$r['code']]."','".lg_string::bo_dau($ten[$r['code']])."','".$chu_thich[$r['code']]."','".lg_string::bo_dau($chu_thich[$r['code']])."','".$noi_dung[$r['code']]."','".lg_string::bo_dau($noi_dung[$r['code']])."','".$title_seo[$r['code']]."','".$keywords[$r['code']]."','".$description[$r['code']]."','".$getslug."'");
                                    }
                                }
                            }
                            
                            if ($hinh)
                            {
                                $txt_hinh_1 = $id."-".lg_string::slug($ten[$rcheck['code']]).'.'.$file_type;
                                img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=400");
                                $db->query("update sgd set file = '".$txt_hinh_1."' where id = '".$id."'");
                            }
                            admin_load("","?act=sgd_edit&id=".$id);
                        }
            		}
            	}
            	else
            	{
            		$r	= $db->select("sgd","id = '".$id."'");
            		while ($row = $db->fetch($r))
            		{
            			$txt_cat		= $row["cat"];;
            			$txt_hien_thi	= $row["hien_thi"];
                        $txt_noi_bat    = $row["noi_bat"];
            		}
            	}
           		template_edit("?act=sgd_edit","update",$id,$txt_cat,$txt_hien_thi,$txt_noi_bat,$post_type,$error)
            ?>
                </div>
            </div>
        </div>
    </div>
</section>
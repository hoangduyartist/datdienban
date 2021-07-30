<?php
	$act = $_POST['act'];
    $txt_cat = $_GET['txt_cat'];
    $txt_hien_thi = $_POST['txt_hien_thi'];
    $txt_noi_bat = $_POST['txt_noi_bat'];
    $media_id  =   $_POST['media_id'];
    
    $kitu1 = array('"',"'");
    $kitu2 = array('&quot;','&#39;');
    $ten = str_replace($kitu1,$kitu2,$_POST['ten']);
    $tenslug = $_POST['ten'];

    $chu_thich = str_replace($kitu1,$kitu2,$_POST['chu_thich']);
    $noi_dung = $_POST['noi_dung'];
    
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
    $qcheck=$db->select("language","display=1","order by thu_tu limit 1");
    $rcheck=$db->fetch($qcheck);
    include "templates/sgd.php";
    
?>
<section class="content-header">
    <h1>Post new<small>Version 2.0</small></h1>
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li><a href="?act=sgd_list"><span>[ <i>Categories</i> ]</span> Sàn giao dịch</a></li>
        <li class="active">Thêm mới</li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-green">
            <div class="paddinglr10">
            <?php
                $max_file_size  =   4048000;
                $up_dir         =   '../uploads/sgd-img/';
                $OK = false;
                $error= array();
            	if ($func == "new")
            	{
                    $txt_cat = $_POST['txt_cat'];
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
                        if ($OK)
                        {
                        // Insert post into database
                        $id = $db->insert("sgd","loai_hgd,loai_bds,tinh_tp,quan_h,nguoi_lh,dia_c,email,so_dt,so_f,so_n,duong,phuong,vi_t,vi_t_3,dien_tkv,dien_txd,kv_r,kv_d,xd_r,xd_d,dien_tsd,huong,so_t,phong_n,phong_k,phong_a,phong_t,phong_th,tien_n,tinh_tpl,tinh_tpl_3,phu_hkd,gia,tinh_tm,thuong_l,don_v,time,time_edit,user,hien_thi,noi_bat","'".$loai_hgd."','".$loai_bds."','".$tinh_tp."','".$quan_h."','".$nguoi_lh."','".$dia_c."','".$email."','".$so_dt."','".$so_f."','".$so_n."','".$duong."','".$phuong."','".$vi_t."','".$vi_t_3."','".$dien_tkv."','".$dien_txd."','".$kv_r."','".$kv_d."','".$xd_r."','".$xd_d."','".$dien_tsd."','".$huong."','".$so_t."','".$phong_n."','".$phong_k."','".$phong_a."','".$phong_t."','".$phong_th."','".$tien_n_new."','".$tinh_tpl."','".$tinh_tpl_3."','".$phu_hkd."','".$gia."','".$tinh_tm."','".$thuong_l."','".$don_v."','".time()."','".time()."','".$thanh_vien["id"]."','".($txt_hien_thi+0)."','".($txt_noi_bat+0)."'");
                        // Insert language
                        $q=$db->select("language","display=1","order by thu_tu"); 
                        while($r=$db->fetch($q)){
                            if($ten[$r['code']]!=''){
                                $getslug=lg_string::slug($tenslug[$r['code']]).'.html';
                                $checkslug=$db->select("sgd_lang","slug='".$getslug."'","");
                                if($db->num_rows($checkslug)==1){
                                    $getslug=lg_string::slug($tenslug[$r['code']]).$id.'.html';
                                }else{
                                    $getslug=lg_string::slug($tenslug[$r['code']]).'.html';
                                }
                                $db->insert("sgd_lang","sgd_id,lang_id,ten,ten_kd,chu_thich,chu_thich_kd,noi_dung,noi_dung_kd,title_seo,keywords,description,slug","'".$id."','".$r['code']."','".$ten[$r['code']]."','".lg_string::bo_dau($ten[$r['code']])."','".$chu_thich[$r['code']]."','".lg_string::bo_dau($chu_thich[$r['code']])."','".$noi_dung[$r['code']]."','".lg_string::bo_dau($noi_dung[$r['code']])."','".$title_seo[$r['code']]."','".$keywords[$r['code']]."','".$description[$r['code']]."','".$getslug."'");
                            }
                            
                        }
                        // Insert into table media_relationship
                        if ($hinh)
                        {
                            //$dir=date("Y").'-'.date("m").'/post/';
                            $txt_hinh_1 = $id."-".lg_string::slug($ten[$rcheck['code']]).'.'.$file_type;
                            img_resize($up_dir.$file_full_name,$up_dir.$txt_hinh_1,"w=400");
                            $db->query("update sgd set file = '".$txt_hinh_1."' where id = '".$id."'");
                        }
                        // Redirect into post edit after insert site
                        admin_load("","?act=sgd_edit&id=".$id);
                    }
            		}
            	}
            	else
            	{
            		$txt_hien_thi	= 1;
                    $txt_noi_bat    = 0;
            	}
           		template_edit("?act=sgd_new", "new", 0 ,$txt_cat,$txt_hien_thi,$txt_noi_bat,$post_type,$error)
            ?>
                </div>
            </div>
        </div>
    </div>
</section>
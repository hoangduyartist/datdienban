<?php
$func = isset($_POST['func']) ? $_POST['func'] : '';
$delete = isset($_GET['delete']) ? $_GET['delete'] : '';
if (!empty($delete)) {
    $db->delete("vn_van_bang","parent_id = '".$delete."'");
    $db->delete("vn_import","id = '".$delete."'");
}
$er_excel = array();
if ($func == "import") {
    if (isset($_FILES['txt_file'])) {
        //$max_file_size  =   8048000;
        $up_dir  = "./../uploads/storexls/";
        $file_type = $_FILES['txt_file']['type'];
        $file_name = $_FILES['txt_file']['name'];
        $file_size = $_FILES['txt_file']['size'];
        $qcheck = $db->select("vn_import","name = '".$file_name."' and size = '".$file_size."'");

        if ($db->num_rows($qcheck) == 0) {
            $allowedTypes = array('application/vnd.ms-excel' => 'xls');
            if (array_key_exists($file_type, $allowedTypes) && strtolower(lg_file::getExt($file_name)) == $allowedTypes[$file_type]){
                $file_type = $allowedTypes[$file_type];
            }
            else
            {
                $file_type = 'unk';
            }
            $file_full_name = date('d-m-Y')."_".date('H-i-s')."_".rand(1,11111111).'_'.$file_name;
            $file = false;
            //if ( ($file_size > 0) && ($file_size <= $max_file_size) )
            if ($file_size > 0)
            {
                if ($file_type != "unk")
                {
                    if ( move_uploaded_file($_FILES['txt_file']['tmp_name'],$up_dir.$file_full_name) )
                    {
                        $file    = true;
                    }
                    else{
                        $error = '<p class="alert alert-danger">Không thể upload tài liệu</p>';
                    }
                }
                else
                {
                    $error = '<p class="alert alert-danger">Sai định dạng file - Không thể upload tài liệu</p>';
                }
            }
            else
            {
                if ($file_size == 0)
                {
                    $file   = false;
                }
                // else
                // {
                //     $error = "File của bạn chọn vượt quá kích thước cho phép.";
                // }
            }
             //Process xong
            if ($file)
            {
                $filename= $up_dir.$file_full_name;
                include "excel_reader2_patch_applied.php";
                $data = new Spreadsheet_Excel_Reader($filename,true,"UTF-8");  //khoi tao doi tuong doc file excel 
                $rowsnum = $data->rowcount($sheet_index=0);  //lay so hang cua sheet
                $colsnum =  $data->colcount($sheet_index=0);  //lay so cot cua sheet
                $count = 0;

                $id = $db->insert("vn_import","name, link, size, type, time","'".$file_name."', '".$file_full_name."', '".$file_size."', '".$file_type."', '".time()."'");
                if ($id) {
                    for ($i=2;$i<=$rowsnum;$i++) {
                        if ($data->val($i,1) != '') {
                            $db->insert("vn_van_bang","parent_id,ho,ten,ho_ten_kd,ngay_sinh,nganh_nghe,xep_loai,so_hieu,so_vao_so,nam_tn,time","'".$id."','".$data->val($i,2)."','".$data->val($i,3)."','".lg_string::bo_dau(($data->val($i,2).' '.$data->val($i,3)))."','".$data->val($i,4)."','".$data->val($i,5)."','".$data->val($i,6)."','".$data->val($i,7)."','".$data->val($i,8)."','".$data->val($i,9)."','".time()."'");
                            $count++;
                        }else{
                            $er_excel[] = $i;
                        }
                    }
                } else {
                     $error = '<p class="alert alert-danger">Không thể kết nối cơ sở dữ liệu</p>';
                }
            }
        } else {
            header("Location: ".$domain.'/admin/?act=tra_cuu_van_bang_import');
        }
    } else {
        $error = '<p class="alert alert-danger">Vui lòng chọn file</p>';
    }
}
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li><a href="?act=tra_cuu_van_bang_import">import văn bằng</a></li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Import văn bằng từ file excel</h3>
                    <div class="pull-right">
                        <span class="function">
                            <a class="btn btn-info" style="background-color: #b7b7b7" href="?act=tra_cuu_van_bang"><i class="fa fa-undo" aria-hidden="true"></i>&nbsp&nbsp Quay lại</a>
                            <a target="_blank" class="btn btn-primary" href="<?=$domain?>/public/excel/file_upload_van_bang_mau.xls"><i class="fa fa-file" aria-hidden="true"></i>&nbsp&nbsp Download file mẫu</a>
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
                <?php
                if (conditionPermission($post_type, "TRA_CUU_VAN_NHAP_EXCEL", "code")) {
                ?>
                <div class="paddinglr10 importfile">
                    <form onsubmit="return confirm('Chắc chắn Import dữ liệu ?!');" id="frm_edit" enctype="multipart/form-data" method="post" >
                    <input type="hidden" name="func" value="import" />
                    <style>
                    	.importfile form {text-align: center;background: #ffffd7;padding: 25px 0 20px;border: 1px solid #ecec7b;margin-bottom: 5px;}
                        .importfile table {display: inline;}
                        .importfile table input[type=file]{outline: none;}
                        .importfile table input[type=file]:hover{cursor: pointer;}
                        .importfile .alert{margin-bottom: 5px;}
                    </style>
                        <table border="0">
                            <tr>
                                <td>
                                <input id="txt_file" required="" type="file" name="txt_file" value="Upload file .XLS"  />
                                </td>
                                <td>
                                	<button class="btn btn-success"><svg style="float: left" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> &nbsp&nbspIMPORT&hellip;</button>
                              	</td>
                            </tr>
                        </table>
                    </form>
                    <?php if(!empty($count)){echo '<p class="alert alert-success"><strong>Đã thêm thành công '.$count.' bản ghi </strong></p>';}?>
                    <?php
                        foreach($er_excel as $v){
                            echo "<p class='alert alert-danger'>Bản ghi thất bại: ".$v."</p>";
                        }
                    ?>
                </div>
                <div class="alert-box">
                    <?php echo !empty($error) ? $error : ''; ?>
                </div>
                <?php }?>
                <div class="paddinglr10">
                    <div class="table-responsive">
						<form action="?act=tra_cuu_van_bang_import" method="post" onsubmit="return confirm('Bạn có chắc chắn không ?');">
							<input type="hidden" name="func" value="del" />
							<input type="hidden" name="id" value="<?=$id?>" />
							<table class="table table-bordered" border="0" cellpadding="0" cellspacing="0" width="100%">
                                <thead>
                                    <tr class="tb_head">
                                        <th>ID</th>
                                        <th>Tên file</th>
                                        <th>Kích thước</th>
                                        <th>Loại file</th>
                                        <th>Thời gian</th>
                                        <th style="width: 342px">Thao tác</th>
                                    </tr>
                                </thead>
								<tbody>
    								<?php
    								$page		=	$page + 0;
    								$perpage	=	20;
    								$r_all		=	$db->select("vn_import","","");
    								if($r_all){
    								    $sum       =   $db->num_rows($r_all);
    								}
    								$pages		=	($sum-($sum%$perpage))/$perpage;
    								if ($sum % $perpage <> 0 )	$pages = $pages+1;
    								$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
    								$min 		= 	abs($page-1) * $perpage;
    								$max 		= 	$perpage;

    								$r		=	$db->select("vn_import","","order by id desc limit $min, $max");
    								while ($row = $db->fetch($r))
    								{ ?>
    								<tr class="tb_content">
    									<td><?=$row["id"]?></td>
    									<td><?=$row["name"]?></td>
    								    <td><?=$row["size"]?></td>
    								    <td><?=$row["type"]?></td>
    								    <td><?=lg_date::vn_time($row["time"])?></td>
    									<td>
                                            <a class="btn btn-info" href="<?php echo $domain.'/uploads/storexls/'.$row["link"]; ?>"><i class="fa fa-download" aria-hidden="true"></i> &nbspDownload</a>
                                            <?php
                                            if (conditionPermission($post_type, "IMPORT_VB_XOA_VB_TU_FILE", "code")) {
                                            ?>
                                            <a class="btn btn-danger" onclick="return confirm('Chắc chắn xóa dữ liệu ?!');" href="?act=tra_cuu_van_bang_import&delete=<?=$row["id"]?>">Xóa tất cả văn bằng từ file này</a>
                                            <?php }?>
                                        </td>
    								</tr>
    								<?
    								}
    								?>
                                </tbody>
							</table>
						</form>
						<div class="navigation">
							<?php
					    		for($i=1;$i<=$pages;$i++) {
					    			if ($i==$page) echo "<b>".$i."</b>";
					    			else {
										echo "<a href='?act=tra_cuu_van_bang_import&page=$i'>$i</a>";
									}
								}
					    	?>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
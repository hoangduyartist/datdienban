<?php
$action = isset($_POST['action']) ? $_POST['action'] : '';
$idEdit = isset($_GET['idEdit']) ? $_GET['idEdit'] : '';
$show = isset($_GET['show']) ? $_GET['show'] : 'false';
$func = isset($_POST['func']) ? $_POST['func'] : '';
$tik = isset($_POST['tik']) ? $_POST['tik'] : array();
$ho = isset($_POST['ho']) ? $_POST['ho'] : '';
$ten = isset($_POST['ten']) ? $_POST['ten'] : '';
$ngay_sinh = isset($_POST['ngay_sinh']) ? $_POST['ngay_sinh'] : '';
$nganh_nghe = isset($_POST['nganh_nghe']) ? $_POST['nganh_nghe'] : '';
$xep_loai = isset($_POST['xep_loai']) ? $_POST['xep_loai'] : '';
$so_hieu = isset($_POST['so_hieu']) ? $_POST['so_hieu'] : '';
$so_vao_so = isset($_POST['so_vao_so']) ? $_POST['so_vao_so'] : '';
$nam_tn = isset($_POST['nam_tn']) ? $_POST['nam_tn'] : '';

if ($action === "addNew") {
	$qcheck = $db->select("vn_van_bang","ho = '".$ho."' and ten = '".$ten."' and ngay_sinh = '".$ngay_sinh."' and nganh_nghe = '".$nganh_nghe."' and xep_loai = '".$xep_loai."' and so_hieu = '".$so_hieu."' and so_vao_so = '".$so_vao_so."' and nam_tn = '".$nam_tn."'");
	$count = $qcheck ? $db->num_rows($qcheck) : 0;
	if ($count === 0) {
		$CHECK = true;
		if ($so_hieu === '') {
			$error = '<p class="alert alert-danger">Vui lòng nhập số hiệu bằng</p>';
			$CHECK = false;
		}
		if ($CHECK) {
			$id = $db->insert("vn_van_bang","ho, ten, ho_ten_kd, ngay_sinh, nganh_nghe, xep_loai, so_hieu, so_vao_so, nam_tn, user_id, time","'".$ho."','".$ten."','".lg_string::bo_dau(($ho.' '.$ten))."','".$ngay_sinh."','".$nganh_nghe."','".$xep_loai."','".$so_hieu."','".$so_vao_so."','".$nam_tn."', '".$thanh_vien["id"]."', '".time()."'");
			if ($id) {
				admin_load("","?act=tra_cuu_van_bang");
			} else {
				$error = '<p class="alert alert-danger">Không thể kết nối cơ sở dữ liệu</p>';
			}
		}
	} else {
		$error = '<p class="alert alert-danger">Văn bằng đã có trong hệ thống</p>';
	}
}
if ($action === "edit") {
	$id = isset($_POST['id']) ? $_POST['id'] : '';
	$qcheck = $db->select("vn_van_bang","ho = '".$ho."' and ten = '".$ten."' and ngay_sinh = '".$ngay_sinh."' and nganh_nghe = '".$nganh_nghe."' and xep_loai = '".$xep_loai."' and so_hieu = '".$so_hieu."' and so_vao_so = '".$so_vao_so."' and nam_tn = '".$nam_tn."' and id <> '".$id."'");
	$count = $qcheck ? $db->num_rows($qcheck) : 0;
	if ($count === 0) {
		$CHECK = true;
		if ($so_hieu === '') {
			$error = '<p class="alert alert-danger">Vui lòng nhập số hiệu bằng</p>';
			$CHECK = false;
		}
		if ($CHECK) {
			$db->query("update vn_van_bang set ho = '".$ho."',ten = '".$ten."',ho_ten_kd = '".lg_string::bo_dau(($ho.' '.$ten))."',ngay_sinh = '".$ngay_sinh."',nganh_nghe = '".$nganh_nghe."',xep_loai = '".$xep_loai."',so_hieu = '".$so_hieu."',so_vao_so = '".$so_vao_so."',nam_tn = '".$nam_tn."', user_edit='".$thanh_vien["id"]."', time_edit='".time()."' where id = '".$id."'");
			
			admin_load("","?act=tra_cuu_van_bang");
		}
	} else {
		$error = '<p class="alert alert-danger">Văn bằng đã có trong hệ thống</p>';
	}
}

if (!empty($idEdit)) {
	$qget = $db->select("vn_van_bang","id = '".$idEdit."'");
	$rget = $db->fetch($qget);
	$count = $qget ? $db->num_rows($qget) : 0;
	if ($count !== 0) {
		$action = 'edit';
	}
}

if ($func === "del")
{
	for ($i = 0; $i < count($tik); $i++)
	{
		$db->delete("vn_van_bang","id = '".$tik[$i]."'");
	}
	admin_load("","?act=tra_cuu_van_bang");
	die();
}
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li><a href="?act=tra_cuu_van_bang">Danh sách văn bằng</a></li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">Quản lý văn bằng</h3>
                    <div class="pull-right">
                        <span class="function">
														<?php
														if (conditionPermission($post_type, "TRA_CUU_VAN_THEM_MOI", "code")) {
														?>
                            <a id="addNew" class="btn btn-success" href="<?php echo $action === 'edit' ? '?act=tra_cuu_van_bang&show=true': 'javascript:void(0)';?>"><i class="fa fa-plus" aria-hidden="true"></i> Thêm mới</a>
														<?php }?>
														<?php
														if (conditionPermission($post_type, "TRA_CUU_VAN_NHAP_EXCEL", "code")) {
														?>
                            <a class="btn btn-primary" href="?act=tra_cuu_van_bang_import"><i class="fa fa-upload" aria-hidden="true"></i> Import Excel</a>
														<?php }?>
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="paddinglr10">
	                <form action="?act=tra_cuu_van_bang<?php echo $idEdit !=='' ? ('&idEdit='.$idEdit) : ''; ?>" method="post" id="addForm" <?php echo $action === 'edit'||$show == 'true' ? '' : 'class="hide-now"'?>>
	                	<input type="hidden" name="action" value="<?php echo $action !== '' ? $action : 'addNew'; ?>" />
	                	<input type="hidden" name="id" value="<?php echo $idEdit; ?>" />

	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Họ & tên đệm</label>
						    <input required type="text" class="form-control" id="ho" name="ho" value="<?php echo empty($rget['ho']) ? '' : $rget['ho']; ?>">
						</div>
	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Tên</label>
						    <input required type="text" class="form-control" id="ten" name="ten" value="<?php echo empty($rget['ten']) ? '' : $rget['ten']; ?>">
						</div>
	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Ngày sinh</label>
						    <input required type="text" class="form-control" id="ngay_sinh" name="ngay_sinh" value="<?php echo empty($rget['ngay_sinh']) ? '' : $rget['ngay_sinh']; ?>">
						</div>
	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Ngành nghề</label>
						    <input required type="text" class="form-control" id="nganh_nghe" name="nganh_nghe" value="<?php echo empty($rget['nganh_nghe']) ? '' : $rget['nganh_nghe']; ?>">
						</div>
	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Xếp loại</label>
						    <input required type="text" class="form-control" id="xep_loai" name="xep_loai" value="<?php echo empty($rget['xep_loai']) ? '' : $rget['xep_loai']; ?>">
						</div>
	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Số hiệu</label>
						    <input required type="text" class="form-control" id="so_hieu" name="so_hieu" value="<?php echo empty($rget['so_hieu']) ? '' : $rget['so_hieu']; ?>">
						</div>
	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Số vào sổ</label>
						    <input required type="text" class="form-control" id="so_vao_so" name="so_vao_so" value="<?php echo empty($rget['so_vao_so']) ? '' : $rget['so_vao_so']; ?>">
						</div>
	                	<div class="form-group col-lg-3 col-md-3">
						    <label>Năm tốt nghiệp</label>
						    <input required type="text" class="form-control" id="nam_tn" name="nam_tn" value="<?php echo empty($rget['nam_tn']) ? '' : $rget['nam_tn']; ?>">
						</div>
						<div class="form-group text-center">
							<button style="margin-top: 25px;" type="submit" class="btn btn-success"><?php echo $action === 'edit' ? 'Cập nhật' : 'Thêm mới'?></button>
						</div>
	                </form>
                </div>
                <div class="alert-box">
                    <?php echo !empty($error) ? $error : ''; ?>
                </div>
                <div class="paddinglr10">
                    <div class="table-responsive">
						<form action="?act=tra_cuu_van_bang" method="post" onsubmit="return confirm('Bạn có chắc chắn không ?');">
							<input type="hidden" name="func" value="del" />
							<input type="hidden" name="id" value="<?=$id?>" />
							<table class="table table-striped" border="0" cellpadding="0" cellspacing="0" width="100%">
								<thead>
									<tr class="tb_head">
										<th style="width: 50px;text-align: center;"></th>
										<th>STT</th>
										<th>Họ & tên đệm</th>
										<th>Tên</th>
									    <th>Ngày sinh</th>
										<th>Ngành/nghề đào tạo</th>
										<th style="text-align: center;">Xếp loại</th>
									    <th>Số hiệu</th>
										<th>Số vào sổ</th>
										<th>Năm tốt nghiệp</th>
										<th>
										<?php
										if (conditionPermission($post_type, "TRA_CUU_VAN_EDIT", "code")) {
										?>
										Thao tác
										<?php }?>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$page		=	$page + 0;
									$perpage	=	20;
									$r_all		=	$db->select("vn_van_bang","","");
									if($r_all){
									    $sum       =   $db->num_rows($r_all);
									}
									$pages		=	($sum-($sum%$perpage))/$perpage;
									if ($sum % $perpage <> 0 )	$pages = $pages+1;
									$page		=	($page==0)?1:(($page>$pages)?$pages:$page);
									$min 		= 	abs($page-1) * $perpage;
									$max 		= 	$perpage;

									$count	=	$min;
									$r		=	$db->select("vn_van_bang","","order by id desc limit $min, $max");
									while ($row = $db->fetch($r))
									{
										$count++;
									?>
									<tr class="tb_content">
										<td style="text-align: center;">
										<?php
										if (conditionPermission($post_type, "TRA_CUU_VAN_BANG_XOA", "code")) {
										?>
										<input name="tik[]" type="checkbox" value="<?=$row["id"]?>" />
										<?php }?>
										</td>
										<td><?=$count?></td>
										<td><?php echo $row['ho']; ?></td>
										<td><?php echo $row['ten']; ?></td>
									    <td><?php echo $row['ngay_sinh']; ?></td>
									    <td><?php echo $row['nganh_nghe']; ?></td>
									 	<td style="text-align: center;"><?php echo $row['xep_loai']; ?></td>
										<td><?php echo $row['so_hieu']; ?></td>
									    <td><?php echo $row['so_vao_so']; ?></td>
									    <td><?php echo $row['nam_tn']; ?></td>
										<td>
											<?php
											if (conditionPermission($post_type, "TRA_CUU_VAN_EDIT", "code")) {
											?>
											<a title="Sửa" class="btn btn-warning action" href="?act=tra_cuu_van_bang&idEdit=<?=$row["id"]?>"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
											<?php }?>
										</td>
									</tr>
									<?
									}
									?>
									<tr class="tb_foot">
										<td>
										<?php
										if (conditionPermission($post_type, "TRA_CUU_VAN_BANG_XOA", "code")) {
										?>
										<button class="btn btn-danger action" type="submit"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
										<?php }?>
										</td>
										<td colspan="10"></td>									
									</tr>
								</tbody>
							</table>
						</form>
						<div class="navigationO">
							<?php
					    		for($i=1;$i<=$pages;$i++) {
					    			if ($i==$page) echo "<b>".$i."</b>";
					    			else {
										echo "<a href='?act=tra_cuu_van_bang&page=$i'>$i</a>";
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
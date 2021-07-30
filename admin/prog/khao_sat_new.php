<?php
    $code = isset($_POST['code']) ? $_POST['code'] : '';
    $lop = isset($_POST['lop']) ? $_POST['lop'] : '';
    $khoa = isset($_POST['khoa']) ? $_POST['khoa'] : '';
    $giang_vien = isset($_POST['giang_vien']) ? $_POST['giang_vien'] : '';
    $mon_hoc = isset($_POST['mon_hoc']) ? $_POST['mon_hoc'] : '';
    $hoc_k = isset($_POST['hoc_k']) ? $_POST['hoc_k'] : '';
    $nam_h1 = isset($_POST['nam_h1']) ? $_POST['nam_h1'] : '';
    $nam_h2 = isset($_POST['nam_h2']) ? $_POST['nam_h2'] : '';
    $si_so = isset($_POST['si_so']) ? $_POST['si_so'] : 0;
    $day_start = isset($_POST['day_start']) ? $_POST['day_start'] : '';
    $day_end = isset($_POST['day_end']) ? $_POST['day_end'] : '';
    $gio_start = isset($_POST['gio_start']) ? $_POST['gio_start'] : '';
    $gio_end = isset($_POST['gio_end']) ? $_POST['gio_end'] : '';
    $func = isset($_POST['func']) ? $_POST['func'] : '';
    $error = '';
  
    include "templates/khaosat.php";
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
        <li><a href="?act=khao_sat_list"><i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý cuộc khảo sát</a></li>
        <li class="active">Add new</li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-green">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new</h3>
                    <div class="clear"></div>
                </div>
                <div class="paddinglr10">
                <?php
                    $OK = false;
                	
                	if ($func == "new")
                	{
                        $qchc = $db->select("vn_khao_sat_list", "code = '".$code."' and code <> ''");
                		if (empty($code))
                			$error = "Vui lòng nhập Id cuộc Khảo sát.";
                        elseif ($qchc->num_rows >= 1)
                            $error = "Id cuộc Khảo sát bị trùng. Vui lòng nhập Id khác";
                		else
                		{
                            $timeStart = $day_start.' '.$gio_start;
                            $timeEnd = $day_end.' '.$gio_end;
            				$id = $db->insert("vn_khao_sat_list","code,time_start,time_end,si_so,lop,khoa,giang_vien,mon_hoc,hoc_k,nam_h1,nam_h2,time","'".$code."','".$timeStart."','".$timeEnd."','".$si_so."','".$lop."','".$khoa."','".$giang_vien."','".$mon_hoc."','".$hoc_k."','".$nam_h1."','".$nam_h2."','".time()."'");
            			
            				admin_load("","?act=khao_sat_list");
                		}
                	}
                	                	
                	if (!$OK)
                		template_edit("?act=khao_sat_new", "new",0,$code,$lop,$khoa,$giang_vien,$mon_hoc,$hoc_k,$nam_h1,$nam_h2,$si_so,$day_start,$day_end,$gio_start,$gio_end,$error)
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
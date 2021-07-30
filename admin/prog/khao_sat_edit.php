<?php
    $code = isset($_POST['code']) ? $_POST['code'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';
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

    if ($func=="update") {
        if (isset($_POST['id'])) { $id = $_POST['id']; }
    }
  
    include "templates/khaosat.php";
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
        <li><a href="?act=khao_sat_list"><i class="fa fa-list-alt" aria-hidden="true"></i> Quản lý cuộc khảo sát</a></li>
        <li class="active">Edit</li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-green">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit</h3>
                    <div class="clear"></div>
                </div>
                <div class="paddinglr10">
                <?php
                	
                	if ($func == "update")
                	{
                		$qchc = $db->select("vn_khao_sat_list", "code = '".$code."' and code <> '' and id <> '".$id."'");
                        if (empty($code))
                            $error = "Vui lòng nhập Id cuộc Khảo sát.";
                        elseif ($qchc->num_rows >= 1)
                            $error = "Id cuộc Khảo sát bị trùng. Vui lòng nhập Id khác";
                		else
                		{
                            $timeStart = $day_start.' '.$gio_start;
                            $timeEnd = $day_end.' '.$gio_end;
                            $db->query("update vn_khao_sat_list set code = '".$code."',time_start = '".$timeStart."',time_end = '".$timeEnd."',si_so = '".$si_so."',lop = '".$lop."',khoa = '".$khoa."',giang_vien = '".$giang_vien."',mon_hoc = '".$mon_hoc."',hoc_k = '".$hoc_k."',nam_h1 = '".$nam_h1."',nam_h2 = '".$nam_h2."' where id = '".$id."'");
            			
            				admin_load("","?act=khao_sat_list");
                		}
                	} else {
                        $r = $db->select("vn_khao_sat_list","id = '".$id."'");
                        while ($row = $db->fetch($r))
                        {
                          $code = $row["code"];
                          $lop = $row["lop"];
                          $khoa = $row["khoa"];
                          $giang_vien = $row["giang_vien"];
                          $mon_hoc = $row["mon_hoc"];
                          $hoc_k = $row["hoc_k"];
                          $nam_h1 = $row["nam_h1"];
                          $nam_h2 = $row["nam_h2"];
                          $si_so    = $row["si_so"];
                          $timeStartArr = explode(' ', $row['time_start']);
                          $timeStartEnd = explode(' ', $row['time_end']);
                          $day_start = $timeStartArr[0];
                          $day_end = $timeStartEnd[0];
                          $gio_start  = $timeStartArr[1];
                          $gio_end = $timeStartEnd[1];
                        }
                    }
                	template_edit("?act=khao_sat_edit&id=".$id, "update",$id,$code,$lop,$khoa,$giang_vien,$mon_hoc,$hoc_k,$nam_h1,$nam_h2,$si_so,$day_start,$day_end,$gio_start,$gio_end,$error)
                ?>
                </div>
            </div>
        </div>
    </div>
</section>
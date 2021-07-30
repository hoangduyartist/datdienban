<?php
    $func = isset($_POST['func']) ? $_POST['func'] : '';
    $tik = isset($_POST['tik']) ? $_POST['tik'] : '';
    
    if ($func == "del")
    {
        for ($i = 0; $i < count($tik); $i++)
        {
            $db->delete("vn_khao_sat_list","id = '".$tik[$i]."'");
        }
        admin_load("","?act=khao_sat_list");
        die();
    }
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
        <li class="active">Quản lý cuộc khảo sát</li>
    </ol>
</section><!--/. content-header-->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box-common box-danger">
                <div class="box-header with-border">
                    <h3 class="box-title">list</h3>
                    <div class="box-tools pull-right">
                        <span class="function">
                            <a href="?act=khao_sat_new">Add new</a>
                        </span>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="paddinglr10">
                    <div class="table-responsive">
                        <form action="?act=khao_sat_list" method="post" onsubmit="return confirm('Bạn có chắc chắn không ?');">
                        <input type="hidden" name="func" value="del" />
                        <table  class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Id khảo sát (mã code)</th>
                                <th>Số lần khảo sát</th>
                                <th>Thông tin</th>
                                <th>Thời gian bắt đầu</th>
                                <th>Thời gian kết thúc</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $page       =   $page + 0;
                            $perpage    =   20;
                            $r_all      =   $db->select("vn_khao_sat_list","");
                            $sum        =   $db->num_rows($r_all);
                            $pages      =   ($sum-($sum%$perpage))/$perpage;
                            if ($sum % $perpage <> 0 )  $pages = $pages+1;
                            $page       =   ($page==0)?1:(($page>$pages)?$pages:$page);
                            $min        =   abs($page-1) * $perpage;
                            $max        =   $perpage;
                            
                            $count  =   $min;
                            $r      =   $db->select("vn_khao_sat_list","","order by id desc LIMIT ".$min.", ".$max);
                            while ($row = $db->fetch($r))
                            {
                                $count++;
                            ?>
                            <tr>
                                <th><?=$count?></th>
                                <td><?=$row["code"]?></td>
                                <td><?=$row["si_so"]?></td>
                                <td>
                                    <b>Lớp:</b> <?=get_sql("select ten from post_lang where post_id=".$row["lop"]." and lang_id = 'vn'")?><br/>
                                    <b>Khoa:</b> <?=get_sql("select ten from post_lang where post_id=".$row["khoa"]." and lang_id = 'vn'")?><br/>
                                    <b>Giảng viên:</b> <?=get_sql("select ten from post_lang where post_id=".$row["giang_vien"]." and lang_id = 'vn'")?><br/>
                                    <b>Môn học:</b> <?=get_sql("select ten from post_lang where post_id=".$row["mon_hoc"]." and lang_id = 'vn'")?><br/>
                                    <b>Học kỳ:</b> <?=$row["hoc_k"]?>, <b>Năm học:</b> 20<?=$row["nam_h2"]?> - 20<?=$row["nam_h2"]?>
                                    
                                </td>
                                <td><?=date("d/m/Y H:i:s", strtotime($row["time_start"]))?></td>
                                <td><?=date("d/m/Y H:i:s", strtotime($row["time_end"]))?></td>
                                <td><a href="?act=khao_sat_edit&id=<?=$row["id"]?>">Sửa</a></td>
                                <td><input name="tik[]" type="checkbox" value="<?=$row["id"]?>" /></td>
                            </tr>
                            <?
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="7">
                                </td>
                                <td colspan="1"><input type="submit" value="Del" class="btn btn-success" /></td>
                            </tr>
                        </tfoot>
                        </table>
                        </table>
                        </form>
                        <div class="navigation">
                            <?php
                                for($i=1; $i<=$pages; $i++) {
                                    if ($i==$page) { 
                                        echo "<b>".$i."</b>";
                                    } else {
                                       echo "<a href='?act=khao_sat_list&page=$i'>-$i-</a>";
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
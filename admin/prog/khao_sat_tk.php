<?php
$arrayKQ = array();
$giang_vien = isset($_POST['giang_vien']) ? $_POST['giang_vien'] : '';
$func = isset($_POST['func']) ? $_POST['func'] : '';
if ($func == "TK")
{
    $qtk = $db->select("vn_khao_sat", "ten_gv = '".$giang_vien."'");
    $total = !empty($qtk->num_rows) ? $db->num_rows($qtk) : 0;

    for ($i = 1; $i <=17; $i ++) {
        $option = 'option'.$i;

        for ($j = 1; $j <=5; $j ++) {
            $qtkk = $db->selectother("COUNT(id) AS count", "vn_khao_sat", "ten_gv = '".$giang_vien."' and ".$option." = '".$j."'");
            $rtkk = $db->fetch($qtkk);
            $arrayKQ[$option][$j] = $rtkk['count'];
        }
    }
}
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
        <li class="active"><a href="?act=khao_sat">Khảo sát sinh viên</a></li>
    </ol>
</section><!--/. content-header-->
<section class="content">
	<div class="box-common">
		<div class="paddinglr10">
            <div class="tab cle-responsive">
                <form action="?act=khao_sat_tk" method="post">
                    <input type="hidden" name="func" value="TK">
                    <div class="form-group col-lg-3 col-md-3">
                        <label>Chọn giảng viên:</label>
                        <select name="giang_vien" class="form-control">
                            <option value="">--Chọn giảng viên--</option>
                            <?php
                            $q = $db->selectpost("hien_thi=1 and cat = 96 and lang_id = 'vn'","order by thu_tu, ten");
                            while($r=$db->fetch($q)) {
                            ?>
                            <option <?php if ($giang_vien === $r['post_id']) { echo 'selected'; }?> value="<?php echo $r['post_id']; ?>"><?php echo $r['ten']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-3 col-md-3">
                        <button style="margin-top: 26px;" type="submit" class="btn btn-primary">Thống kê</button>
                    </div>
                </form>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tiêu chí - chỉ số</th>
                            <th>Không đồng ý</th>
                            <th>Cần cải thiện</th>
                            <th>Đồng ý</th>
                            <th>Rất đồng ý</th>
                            <th>Hoàn toàn đồng ý</th>
                            <th>Điểm trung bình</th>
                        </tr>
                    </thead>
                    <?php 
                    if (count($arrayKQ) !== 0) {
                        if ($total !== 0) {
                    ?>
                    <tbody>
                        <tr>
                            <td>I. </td>
                            <td colspan="7"><strong style="padding-bottom: 0">CHUẨN BỊ GIẢNG DẠY</strong></td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Giảng viên cung cấp đầy đủ mục tiêu bài học trước khi bắt đầu mỗi buổi học</td>
                            <td><?php echo $arrayKQ['option1'][1]; ?></td>
                            <td><?php echo $arrayKQ['option1'][2]; ?></td>
                            <td><?php echo $arrayKQ['option1'][3]; ?></td>
                            <td><?php echo $arrayKQ['option1'][4]; ?></td>
                            <td><?php echo $arrayKQ['option1'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['1'] = round(((($arrayKQ['option1'][1] * 1) + ($arrayKQ['option1'][2] * 2) + ($arrayKQ['option1'][3] * 3) + ($arrayKQ['option1'][4] * 4) + ($arrayKQ['option1'][5] * 5)) / $total), 1);
                                    echo $tb['1'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Giảng viên chuẩn bị đầy đủ các phương tiện, công cụ dụng cụ dạy học trước mỗi buổi học lý thuyết, thực hành</td>
                            <td><?php echo $arrayKQ['option2'][1]; ?></td>
                            <td><?php echo $arrayKQ['option2'][2]; ?></td>
                            <td><?php echo $arrayKQ['option2'][3]; ?></td>
                            <td><?php echo $arrayKQ['option2'][4]; ?></td>
                            <td><?php echo $arrayKQ['option2'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['2'] = round(((($arrayKQ['option2'][1] * 1) + ($arrayKQ['option2'][2] * 2) + ($arrayKQ['option2'][3] * 3) + ($arrayKQ['option2'][4] * 4) + ($arrayKQ['option2'][5] * 5)) / $total), 1);
                                    echo $tb['2'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Giảng viên giới thiệu rõ ràng các giáo trình, tài liệu tham khảo để giúp bạn hiểu rõ hoặc mở rộng hiểu biết về môn học</td>
                            <td><?php echo $arrayKQ['option3'][1]; ?></td>
                            <td><?php echo $arrayKQ['option3'][2]; ?></td>
                            <td><?php echo $arrayKQ['option3'][3]; ?></td>
                            <td><?php echo $arrayKQ['option3'][4]; ?></td>
                            <td><?php echo $arrayKQ['option3'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['3'] = round(((($arrayKQ['option3'][1] * 1) + ($arrayKQ['option3'][2] * 2) + ($arrayKQ['option3'][3] * 3) + ($arrayKQ['option3'][4] * 4) + ($arrayKQ['option3'][5] * 5)) / $total), 1);
                                    echo $tb['3'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Giảng viên giới thiệu đầy đủ về hình thức và phương pháp đánh giá kết quả học tập của môn học (bài định kỳ, thi kết thúc môn,….)</td>
                            <td><?php echo $arrayKQ['option4'][1]; ?></td>
                            <td><?php echo $arrayKQ['option4'][2]; ?></td>
                            <td><?php echo $arrayKQ['option4'][3]; ?></td>
                            <td><?php echo $arrayKQ['option4'][4]; ?></td>
                            <td><?php echo $arrayKQ['option4'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['4'] = round(((($arrayKQ['option4'][1] * 1) + ($arrayKQ['option4'][2] * 2) + ($arrayKQ['option4'][3] * 3) + ($arrayKQ['option4'][4] * 4) + ($arrayKQ['option4'][5] * 5)) / $total), 1);
                                    echo $tb['4'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Giảng viên thực hiện nghiêm túc thời gian lên lớp</td>
                            <td><?php echo $arrayKQ['option5'][1]; ?></td>
                            <td><?php echo $arrayKQ['option5'][2]; ?></td>
                            <td><?php echo $arrayKQ['option5'][3]; ?></td>
                            <td><?php echo $arrayKQ['option5'][4]; ?></td>
                            <td><?php echo $arrayKQ['option5'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['5'] = round(((($arrayKQ['option5'][1] * 1) + ($arrayKQ['option5'][2] * 2) + ($arrayKQ['option5'][3] * 3) + ($arrayKQ['option5'][4] * 4) + ($arrayKQ['option5'][5] * 5)) / $total), 1);
                                    echo $tb['5'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>II. </td>
                            <td colspan="7"><strong style="padding-bottom: 0">PHƯƠNG PHÁP GIẢNG DẠY</strong></td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>Giảng viên sẵn sàng tư vấn, giải đáp những thắc mắc, giúp đỡ cho HSSV một cách thỏa đáng</td>
                            <td><?php echo $arrayKQ['option6'][1]; ?></td>
                            <td><?php echo $arrayKQ['option6'][2]; ?></td>
                            <td><?php echo $arrayKQ['option6'][3]; ?></td>
                            <td><?php echo $arrayKQ['option6'][4]; ?></td>
                            <td><?php echo $arrayKQ['option6'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['6'] = round(((($arrayKQ['option6'][1] * 1) + ($arrayKQ['option6'][2] * 2) + ($arrayKQ['option6'][3] * 3) + ($arrayKQ['option6'][4] * 4) + ($arrayKQ['option6'][5] * 5)) / $total), 1);
                                    echo $tb['6'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td>Giảng viên tổ chức nhiều hoạt động giảng dạy/Thao tác hướng dẫn HHSV làm mẫu thành thạo</td>
                            <td><?php echo $arrayKQ['option7'][1]; ?></td>
                            <td><?php echo $arrayKQ['option7'][2]; ?></td>
                            <td><?php echo $arrayKQ['option7'][3]; ?></td>
                            <td><?php echo $arrayKQ['option7'][4]; ?></td>
                            <td><?php echo $arrayKQ['option7'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['7'] = round(((($arrayKQ['option7'][1] * 1) + ($arrayKQ['option7'][2] * 2) + ($arrayKQ['option7'][3] * 3) + ($arrayKQ['option7'][4] * 4) + ($arrayKQ['option7'][5] * 5)) / $total), 1);
                                    echo $tb['7'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td>Giảng viên rất cởi mở và tôn trọng ý kiến sinh viên</td>
                            <td><?php echo $arrayKQ['option8'][1]; ?></td>
                            <td><?php echo $arrayKQ['option8'][2]; ?></td>
                            <td><?php echo $arrayKQ['option8'][3]; ?></td>
                            <td><?php echo $arrayKQ['option8'][4]; ?></td>
                            <td><?php echo $arrayKQ['option8'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['8'] = round(((($arrayKQ['option8'][1] * 1) + ($arrayKQ['option8'][2] * 2) + ($arrayKQ['option8'][3] * 3) + ($arrayKQ['option8'][4] * 4) + ($arrayKQ['option8'][5] * 5)) / $total), 1);
                                    echo $tb['8'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td>Nội dung môn học được giảng viên truyền đạt mạch lạc, logic, dễ hiểu</td>
                            <td><?php echo $arrayKQ['option9'][1]; ?></td>
                            <td><?php echo $arrayKQ['option9'][2]; ?></td>
                            <td><?php echo $arrayKQ['option9'][3]; ?></td>
                            <td><?php echo $arrayKQ['option9'][4]; ?></td>
                            <td><?php echo $arrayKQ['option9'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['9'] = round(((($arrayKQ['option9'][1] * 1) + ($arrayKQ['option9'][2] * 2) + ($arrayKQ['option9'][3] * 3) + ($arrayKQ['option9'][4] * 4) + ($arrayKQ['option9'][5] * 5)) / $total), 1);
                                    echo $tb['9'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>Giảng viên thường xuyên liên hệ bài học với thực tế</td>
                            <td><?php echo $arrayKQ['option10'][1]; ?></td>
                            <td><?php echo $arrayKQ['option10'][2]; ?></td>
                            <td><?php echo $arrayKQ['option10'][3]; ?></td>
                            <td><?php echo $arrayKQ['option10'][4]; ?></td>
                            <td><?php echo $arrayKQ['option10'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['10'] = round(((($arrayKQ['option10'][1] * 1) + ($arrayKQ['option10'][2] * 2) + ($arrayKQ['option10'][3] * 3) + ($arrayKQ['option10'][4] * 4) + ($arrayKQ['option10'][5] * 5)) / $total), 1);
                                    echo $tb['10'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td>Giảng viên thường xuyên nhắc nhở, giáo dục về đạo đức, tư cách của sinh viên</td>
                            <td><?php echo $arrayKQ['option11'][1]; ?></td>
                            <td><?php echo $arrayKQ['option11'][2]; ?></td>
                            <td><?php echo $arrayKQ['option11'][3]; ?></td>
                            <td><?php echo $arrayKQ['option11'][4]; ?></td>
                            <td><?php echo $arrayKQ['option11'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['11'] = round(((($arrayKQ['option11'][1] * 1) + ($arrayKQ['option11'][2] * 2) + ($arrayKQ['option11'][3] * 3) + ($arrayKQ['option11'][4] * 4) + ($arrayKQ['option11'][5] * 5)) / $total), 1);
                                    echo $tb['11'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>III. </td>
                            <td colspan="7"><strong style="padding-bottom: 0">PHƯƠNG PHÁP ĐÁNH GIÁ KẾT QUẢ HỌC TẬP</strong></td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>Đề kiểm tra thường xuyên, định kỳ, phù hợp với nội dung giảng dạy</td>
                            <td><?php echo $arrayKQ['option12'][1]; ?></td>
                            <td><?php echo $arrayKQ['option12'][2]; ?></td>
                            <td><?php echo $arrayKQ['option12'][3]; ?></td>
                            <td><?php echo $arrayKQ['option12'][4]; ?></td>
                            <td><?php echo $arrayKQ['option12'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['12'] = round(((($arrayKQ['option12'][1] * 1) + ($arrayKQ['option12'][2] * 2) + ($arrayKQ['option12'][3] * 3) + ($arrayKQ['option12'][4] * 4) + ($arrayKQ['option12'][5] * 5)) / $total), 1);
                                    echo $tb['12'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td>Giảng viên công bố công khai, rõ ràng danh sách HSSV được thi, cấm thi</td>
                            <td><?php echo $arrayKQ['option13'][1]; ?></td>
                            <td><?php echo $arrayKQ['option13'][2]; ?></td>
                            <td><?php echo $arrayKQ['option13'][3]; ?></td>
                            <td><?php echo $arrayKQ['option13'][4]; ?></td>
                            <td><?php echo $arrayKQ['option13'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['13'] = round(((($arrayKQ['option13'][1] * 1) + ($arrayKQ['option13'][2] * 2) + ($arrayKQ['option13'][3] * 3) + ($arrayKQ['option13'][4] * 4) + ($arrayKQ['option13'][5] * 5)) / $total), 1);
                                    echo $tb['13'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td>Bài thi kết thúc môn có thời lượng và nội dung phù hợp với nội dung giảng viên đã giảng dạy.</td>
                            <td><?php echo $arrayKQ['option14'][1]; ?></td>
                            <td><?php echo $arrayKQ['option14'][2]; ?></td>
                            <td><?php echo $arrayKQ['option14'][3]; ?></td>
                            <td><?php echo $arrayKQ['option14'][4]; ?></td>
                            <td><?php echo $arrayKQ['option14'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['14'] = round(((($arrayKQ['option14'][1] * 1) + ($arrayKQ['option14'][2] * 2) + ($arrayKQ['option14'][3] * 3) + ($arrayKQ['option14'][4] * 4) + ($arrayKQ['option14'][5] * 5)) / $total), 1);
                                    echo $tb['14'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>IV. </td>
                            <td colspan="7"><strong style="padding-bottom: 0">CẢM NHẬN CỦA BẢN THÂN</strong></td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td>Giảng viên giảng dạy nhiệt tình, thân thiện</td>
                            <td><?php echo $arrayKQ['option15'][1]; ?></td>
                            <td><?php echo $arrayKQ['option15'][2]; ?></td>
                            <td><?php echo $arrayKQ['option15'][3]; ?></td>
                            <td><?php echo $arrayKQ['option15'][4]; ?></td>
                            <td><?php echo $arrayKQ['option15'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['15'] = round(((($arrayKQ['option15'][1] * 1) + ($arrayKQ['option15'][2] * 2) + ($arrayKQ['option15'][3] * 3) + ($arrayKQ['option15'][4] * 4) + ($arrayKQ['option15'][5] * 5)) / $total), 1);
                                    echo $tb['15'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td>Bạn thật sự hứng thú với các giờ học của môn học này</td>
                            <td><?php echo $arrayKQ['option16'][1]; ?></td>
                            <td><?php echo $arrayKQ['option16'][2]; ?></td>
                            <td><?php echo $arrayKQ['option16'][3]; ?></td>
                            <td><?php echo $arrayKQ['option16'][4]; ?></td>
                            <td><?php echo $arrayKQ['option16'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['16'] = round(((($arrayKQ['option16'][1] * 1) + ($arrayKQ['option16'][2] * 2) + ($arrayKQ['option16'][3] * 3) + ($arrayKQ['option16'][4] * 4) + ($arrayKQ['option16'][5] * 5)) / $total), 1);
                                    echo $tb['16'].' điểm';
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>17</td>
                            <td>Bạn thật sự hài lòng với phương pháp đánh giá kết quả học tập của môn học này</td>
                            <td><?php echo $arrayKQ['option17'][1]; ?></td>
                            <td><?php echo $arrayKQ['option17'][2]; ?></td>
                            <td><?php echo $arrayKQ['option17'][3]; ?></td>
                            <td><?php echo $arrayKQ['option17'][4]; ?></td>
                            <td><?php echo $arrayKQ['option17'][5]; ?></td>
                            <td>
                                <?php 
                                    $tb['17'] = round(((($arrayKQ['option17'][1] * 1) + ($arrayKQ['option17'][2] * 2) + ($arrayKQ['option17'][3] * 3) + ($arrayKQ['option17'][4] * 4) + ($arrayKQ['option17'][5] * 5)) / $total), 1);
                                    echo $tb['17'].' điểm';
                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr style="font-size: 20px;">
                            <td style="font-size: 20px;" colspan="4">Điểm trung bình:</td>
                            <td style="font-size: 20px;text-align: right;color: red" colspan="4">
                                <?php
                                $sum = 0;
                                for ($i = 1; $i <= 17; $i ++) {
                                    $sum += $tb[$i];
                                }
                                echo '<strong>'.round($sum/17, 2).' điểm</strong>';
                                ?>
                            </td>
                        </tr>
                    </tbody>
                    <?php 
                        } else {
                            echo '<tr><td>Chưa có đánh giá.</td></tr>';
                        }
                    } 
                    ?>
                </table>
            </div>
		</div>
	</div>
</section>
<?php
function activeTab($typeTab, $type = ""){
    $active = "";
    if($type!=""){
        if($typeTab==$type){$active="active";}
    }

    return $active;
}
?>
<script type="text/javascript">
$(function(){
    $(".checkAll").click(function(){
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
})
</script>
<?php
include "functions/Common.php";
$lang_code = GetLanguagesActive()["code"];
$id = isset($_GET['id']) ? $_GET['id'] : 0;
if ($id !== 0) {
  $r=$db->select("vn_khao_sat"," id='".$id."' ","");
  $row=$db->fetch($r);
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home">AdminCP</a></li>
        <li><a href="javascript:history.go(-1)">Danh sách</a></li>
    </ol>
</section><!--/. content-header-->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box-common box-danger">
        <form action="?act=contactsView&type=<?php echo $type?>&id=<?php echo $id?>" method="post">
          <div class="detail-box danhsach-thongtin-lienhe">
            <div class="khao-sat mt30 mb30">
              <div class="">
                  <div class="head">
                      <h3 style="font-size: 28px">PHIẾU LẤY Ý KIẾN CỦA NGƯỜI HỌC VỀ CÔNG TÁC GIẢNG DẠY</h3>
                      <p style="margin-bottom: 25px;font-size: 18px;">Ngày lấy ý kiến: <?=date('d/m/Y',$row['time'])?></p>
                  </div>
                  <!-- form -->
                  <form method="post" action="">
                      <p style="margin-top: 15px"><b> Phần A. Thông tin về môn học và giảng viên </b></p>
                      <div class="session1">
                          <p>
                              <span class="item"><label>Lớp:</label><input disabled type="text" name="lop" required class="option1" value="<?=get_sql("select ten from post_lang where post_id='".$row["lop"]."' and lang_id='".$lang_code."'")?>"></span>
                              <span class="item"><label>Khoa:</label><input disabled type="text" name="khoa" required class="option1" value="<?=get_sql("select ten from post_lang where post_id='".$row["khoa"]."' and lang_id='".$lang_code."'")?>"></span>
                          </p>
                          <p class="double">
                              <span class="item"><label>Tên giảng viên:</label><input disabled required type="text" name="ten_gv" class="option1" value="<?=get_sql("select ten from post_lang where post_id='".$row["ten_gv"]."' and lang_id='".$lang_code."'")?>"></span>
                          </p>
                          <p>
                              <span class="item"><label>Tên Môn học:</label><input disabled required type="text" name="ten_mh" class="option1" value="<?=get_sql("select ten from post_lang where post_id='".$row["ten_mh"]."' and lang_id='".$lang_code."'")?>"></span>
                              <span class="item">
                                  <span class="small"><label>Học kỳ:</label><input disabled required type="text" name="hoc_k" class="option1" value="<?=$row['hoc_k']?>"></span>,
                                  <span class="small"><label>Năm học: 20</label><input disabled required type="text" name="nam_h1" class="option1" value="<?=$row['nam_h1']?>"> - 20</label><input disabled required type="text" name="nam_h2" class="option1" value="<?=$row['nam_h2']?>"></span>
                              </span>
                          </p><!-- 
                          <p>
                              <span class="item"><label>Ngày lấy ý kiến:</label><input required="" type="date" name="dantoc" class="option1"></span>
                          </p> -->
                      </div>
                      <p style="margin-top: 15px"><b> Phần B. Ý kiến phản hồi của sinh viên về hoạt động giảng dạy của giảng viên </b></p>
                      <p style="margin-bottom: 5px;">Thang đánh giá:</p>
                      <i style="display: block;padding-bottom: 8px;">1 = Không đồng ý; 2 = Cần cải thiện; 3 = Đồng ý; 4 = Rất đồng ý; 5 = Hoàn toàn đồng ý</i>
                      <p><i>(Ghi chú: 1 là mức đánh giá thấp nhất; 5 là mức đánh giá cao nhất )</i></p>
                      <table class="table_other">
                          <tr style="font-weight: bold;">
                              <td>TT</td>
                              <td>Tiêu chí – Chỉ số</td>
                              <td class="paddingnone">
                                  <table>
                                      <tr>
                                          <td class="borderrt">Không đồng ý</td>
                                          <td class="borderrt">Cần cải thiện</td>
                                          <td class="borderrt">Đồng ý</td>
                                          <td class="borderrt">Rất đồng ý</td>
                                          <td class="borderrt">Hoàn toàn đồng ý</td>
                                      </tr>
                                      <tr>
                                          <td class="borderrt">(1)</td>
                                          <td class="borderrt">(2)</td>
                                          <td class="borderrt">(3)</td>
                                          <td class="borderrt">(4)</td>
                                          <td class="borderrt">(5)</td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr class="title">
                              <td>I</td>
                              <td>CHUẨN BỊ GIẢNG DẠY</td>
                              <td>
                              </td>
                          </tr>
                          <tr>
                              <td>1</td>
                              <td style="text-align: left;">Giảng viên cung cấp đầy đủ mục tiêu bài học trước khi bắt đầu mỗi buổi học</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option1'] == 1) {echo 'checked';}?> required type="radio" name="noidung1" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option1'] == 2) {echo 'checked';}?> required type="radio" name="noidung1" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option1'] == 3) {echo 'checked';}?> required type="radio" name="noidung1" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option1'] == 4) {echo 'checked';}?> required type="radio" name="noidung1" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option1'] == 5) {echo 'checked';}?> required type="radio" name="noidung1" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>2</td>
                              <td style="text-align: left;">Giảng viên chuẩn bị đầy đủ các phương tiện, công cụ dụng cụ dạy học trước mỗi buổi học lý thuyết, thực hành</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option2'] == 1) {echo 'checked';}?> required type="radio" name="noidung2" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option2'] == 2) {echo 'checked';}?> required type="radio" name="noidung2" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option2'] == 3) {echo 'checked';}?> required type="radio" name="noidung2" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option2'] == 4) {echo 'checked';}?> required type="radio" name="noidung2" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option2'] == 5) {echo 'checked';}?> required type="radio" name="noidung2" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>3</td>
                              <td style="text-align: left;">Giảng viên giới thiệu rõ ràng các giáo trình, tài liệu tham khảo để giúp bạn hiểu rõ hoặc mở rộng hiểu biết về môn học</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option3'] == 1) {echo 'checked';}?> required type="radio" name="noidung3" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option3'] == 2) {echo 'checked';}?> required type="radio" name="noidung3" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option3'] == 3) {echo 'checked';}?> required type="radio" name="noidung3" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option3'] == 4) {echo 'checked';}?> required type="radio" name="noidung3" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option3'] == 5) {echo 'checked';}?> required type="radio" name="noidung3" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>4</td>
                              <td style="text-align: left;">Giảng viên giới thiệu đầy đủ về hình thức và phương pháp đánh giá kết quả học tập của môn học (bài định kỳ, thi kết thúc môn,….)</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option4'] == 1) {echo 'checked';}?> required type="radio" name="noidung4" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option4'] == 2) {echo 'checked';}?> required type="radio" name="noidung4" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option4'] == 3) {echo 'checked';}?> required type="radio" name="noidung4" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option4'] == 4) {echo 'checked';}?> required type="radio" name="noidung4" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option4'] == 5) {echo 'checked';}?> required type="radio" name="noidung4" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>5</td>
                              <td style="text-align: left;">Giảng viên thực hiện nghiêm túc thời gian lên lớp</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option5'] == 1) {echo 'checked';}?> required type="radio" name="noidung5" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option5'] == 2) {echo 'checked';}?> required type="radio" name="noidung5" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option5'] == 3) {echo 'checked';}?> required type="radio" name="noidung5" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option5'] == 4) {echo 'checked';}?> required type="radio" name="noidung5" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option5'] == 5) {echo 'checked';}?> required type="radio" name="noidung5" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr class="title">
                              <td>II</td>
                              <td>PHƯƠNG PHÁP GIẢNG DẠY</td>
                              <td>
                              </td>
                          </tr>
                          <tr>
                              <td>6</td>
                              <td style="text-align: left;">Giảng viên sẵn sàng tư vấn, giải đáp những thắc mắc, giúp đỡ cho HSSV một cách thỏa đáng</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option6'] == 1) {echo 'checked';}?> required type="radio" name="noidung6" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option6'] == 2) {echo 'checked';}?> required type="radio" name="noidung6" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option6'] == 3) {echo 'checked';}?> required type="radio" name="noidung6" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option6'] == 4) {echo 'checked';}?> required type="radio" name="noidung6" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option6'] == 5) {echo 'checked';}?> required type="radio" name="noidung6" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>7</td>
                              <td style="text-align: left;">Giảng viên tổ chức nhiều hoạt động giảng dạy/Thao tác hướng dẫn HHSV làm mẫu thành thạo</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option7'] == 1) {echo 'checked';}?> required type="radio" name="noidung7" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option7'] == 2) {echo 'checked';}?> required type="radio" name="noidung7" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option7'] == 3) {echo 'checked';}?> required type="radio" name="noidung7" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option7'] == 4) {echo 'checked';}?> required type="radio" name="noidung7" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option7'] == 5) {echo 'checked';}?> required type="radio" name="noidung7" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>8</td>
                              <td style="text-align: left;">GGiảng viên rất cởi mở và tôn trọng ý kiến sinh viên</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option8'] == 1) {echo 'checked';}?> required type="radio" name="noidung8" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option8'] == 2) {echo 'checked';}?> required type="radio" name="noidung8" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option8'] == 3) {echo 'checked';}?> required type="radio" name="noidung8" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option8'] == 4) {echo 'checked';}?> required type="radio" name="noidung8" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option8'] == 5) {echo 'checked';}?> required type="radio" name="noidung8" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>9</td>
                              <td style="text-align: left;">Nội dung môn học được giảng viên truyền đạt mạch lạc, logic, dễ hiểu</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option9'] == 1) {echo 'checked';}?> required type="radio" name="noidung9" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option9'] == 2) {echo 'checked';}?> required type="radio" name="noidung9" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option9'] == 3) {echo 'checked';}?> required type="radio" name="noidung9" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option9'] == 4) {echo 'checked';}?> required type="radio" name="noidung9" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option9'] == 5) {echo 'checked';}?> required type="radio" name="noidung9" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>10</td>
                              <td style="text-align: left;">Giảng viên thường xuyên liên hệ bài học với thực tế</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option10'] == 1) {echo 'checked';}?> required type="radio" name="noidung10" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option10'] == 2) {echo 'checked';}?> required type="radio" name="noidung10" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option10'] == 3) {echo 'checked';}?> required type="radio" name="noidung10" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option10'] == 4) {echo 'checked';}?> required type="radio" name="noidung10" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option10'] == 5) {echo 'checked';}?> required type="radio" name="noidung10" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>11</td>
                              <td style="text-align: left;">Giảng viên thường xuyên nhắc nhở, giáo dục về đạo đức, tư cách của sinh viên</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option11'] == 1) {echo 'checked';}?> required type="radio" name="noidung11" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option11'] == 2) {echo 'checked';}?> required type="radio" name="noidung11" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option11'] == 3) {echo 'checked';}?> required type="radio" name="noidung11" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option11'] == 4) {echo 'checked';}?> required type="radio" name="noidung11" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option11'] == 5) {echo 'checked';}?> required type="radio" name="noidung11" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr class="title">
                              <td>III</td>
                              <td>PHƯƠNG PHÁP ĐÁNH GIÁ KẾT QUẢ HỌC TẬP</td>
                              <td>
                              </td>
                          </tr>
                          <tr>
                              <td>12</td>
                              <td style="text-align: left;">Đề kiểm tra thường xuyên, định kỳ, phù hợp với nội dung giảng dạy</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option12'] == 1) {echo 'checked';}?> required type="radio" name="noidung12" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option12'] == 2) {echo 'checked';}?> required type="radio" name="noidung12" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option12'] == 3) {echo 'checked';}?> required type="radio" name="noidung12" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option12'] == 4) {echo 'checked';}?> required type="radio" name="noidung12" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option12'] == 5) {echo 'checked';}?> required type="radio" name="noidung12" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>13</td>
                              <td style="text-align: left;">Giảng viên công bố công khai, rõ ràng danh sách HSSV được thi, cấm thi</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option13'] == 1) {echo 'checked';}?> required type="radio" name="noidung13" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option13'] == 2) {echo 'checked';}?> required type="radio" name="noidung13" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option13'] == 3) {echo 'checked';}?> required type="radio" name="noidung13" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option13'] == 4) {echo 'checked';}?> required type="radio" name="noidung13" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option13'] == 5) {echo 'checked';}?> required type="radio" name="noidung13" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>14</td>
                              <td style="text-align: left;">Bài thi kết thúc môn có thời lượng và nội dung phù hợp với nội dung giảng viên đã giảng dạy.</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option14'] == 1) {echo 'checked';}?> required type="radio" name="noidung14" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option14'] == 2) {echo 'checked';}?> required type="radio" name="noidung14" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option14'] == 3) {echo 'checked';}?> required type="radio" name="noidung14" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option14'] == 4) {echo 'checked';}?> required type="radio" name="noidung14" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option14'] == 5) {echo 'checked';}?> required type="radio" name="noidung14" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr class="title">
                              <td>IV</td>
                              <td>CẢM NHẬN CỦA BẢN THÂN</td>
                              <td>
                              </td>
                          </tr>
                          <tr>
                              <td>15</td>
                              <td style="text-align: left;">Giảng viên giảng dạy nhiệt tình, thân thiện</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option15'] == 1) {echo 'checked';}?> required type="radio" name="noidung15" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option15'] == 2) {echo 'checked';}?> required type="radio" name="noidung15" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option15'] == 3) {echo 'checked';}?> required type="radio" name="noidung15" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option15'] == 4) {echo 'checked';}?> required type="radio" name="noidung15" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option15'] == 5) {echo 'checked';}?> required type="radio" name="noidung15" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>16</td>
                              <td style="text-align: left;">Bạn thật sự hứng thú với các giờ học của môn học này</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option16'] == 1) {echo 'checked';}?> required type="radio" name="noidung16" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option16'] == 2) {echo 'checked';}?> required type="radio" name="noidung16" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option16'] == 3) {echo 'checked';}?> required type="radio" name="noidung16" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option16'] == 4) {echo 'checked';}?> required type="radio" name="noidung16" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option16'] == 5) {echo 'checked';}?> required type="radio" name="noidung16" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          <tr>
                              <td>17</td>
                              <td style="text-align: left;">Bạn thật sự hài lòng với phương pháp đánh giá kết quả học tập của môn học này</td>
                              <td class="paddingnone">
                                  <table class="table_other">
                                      <tr>
                                          <td class="bordernone"><input disabled <?php if ($row['option17'] == 1) {echo 'checked';}?> required type="radio" name="noidung17" value="1"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option17'] == 2) {echo 'checked';}?> required type="radio" name="noidung17" value="2"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option17'] == 3) {echo 'checked';}?> required type="radio" name="noidung17" value="3"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option17'] == 4) {echo 'checked';}?> required type="radio" name="noidung17" value="4"></td>
                                          <td class="bordernone"><input disabled <?php if ($row['option17'] == 5) {echo 'checked';}?> required type="radio" name="noidung17" value="5"></td>
                                      </tr>
                                  </table>
                              </td>
                          </tr>
                          
                      </table>
                      <p></p>
                      <b>Ý kiến khác: </b>
                      <textarea disabled name="y_kien" class="option1" rows="8" style="width: 100%;padding: 10px;"><?=$row['y_k']?></textarea>

                  </form>
              </div>
            </div>
            <div class="text-left">
              <a class="btn btn-success" href="javascript:history.go(-1)">Quay về</a>
              <!-- <button class="btn btn-group" name="func" value="no_active">Đánh dấu chưa đọc</button> -->
              <!-- <button class="btn btn-danger" name="func" value="del" onclick="return confirm('Bạn có muốn xóa?')">Xóa</button> -->
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<?php } else {
  admin_load("","?act=khao_sat");
}?>
<?php
include "../../_CORE/index.php";
include "../../app/config/config.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);

$date = isset($_GET['date']) ? $_GET['date'] : '';
$date2 = isset($_GET['date2']) ? $_GET['date2'] : '';
$giang_vien = isset($_GET['giang_vien']) ? $_GET['giang_vien'] : '';
$khoa = isset($_GET['khoa']) ? $_GET['khoa'] : '';
$lop = isset($_GET['lop']) ? $_GET['lop'] : '';
$mon_hoc = isset($_GET['mon_hoc']) ? $_GET['mon_hoc'] : '';
$hoc_ky = isset($_GET['hoc_ky']) ? $_GET['hoc_ky'] : '';
$nam_hoc1 = isset($_GET['nam_hoc1']) ? $_GET['nam_hoc1'] : '';
$nam_hoc2 = isset($_GET['nam_hoc2']) ? $_GET['nam_hoc2'] : '';
$keyw='';

if($date!=''&&$date2=='')
{
    $keyw.=" and time >= ".strtotime($date);
}
if($date==''&&$date2!='')
{
    $keyw.=" and time <= ".strtotime($date2.' 00:00:00');
}
if($date!=''&&$date2!='')
{
    $keyw.=" and time >= ".strtotime($date)." && time <= ".strtotime($date2.' 00:00:00');
}
if($date==''&&$date2=='')
{
    $keyw.="";
}
if($giang_vien!=''){
    $keyw.=" and ten_gv = '".$giang_vien."'";
}
if($khoa!=''){
    $keyw.=" and khoa='".$khoa."'";
}
if($lop!=''){
    $keyw.=" and lop='".$lop."'";
}
if($mon_hoc!=''){
    $keyw.=" and ten_mh='".$mon_hoc."'";
}
if($hoc_ky!=''){
    $keyw.=" and hoc_k='".$hoc_ky."'";
}
if($nam_hoc1!=''){
    $keyw.=" and nam_h1='".$nam_hoc1."'";
}
if($nam_hoc2!=''){
    $keyw.=" and nam_h2='".$nam_hoc2."'";
}
require "PHPExcel/Classes/PHPExcel/IOFactory.php";
$fileType = 'Excel2007';
if ($hoc_ky=='') {
    $fileName = "Khảo sát GV-".date('d-m-Y').".xlsx";
} else {
    $fileName = "Khảo sát GV-".$hoc_ky.'-'.$nam_hoc1.$nam_hoc2.'-'.date('d-m-Y').".xlsx";
}
$objPHPExcel = PHPExcel_IOFactory::load("data.xlsx");

// Thiết lập tên các cột dữ liệu
if ($hoc_ky!='') {
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', "Học kỳ: ".$hoc_ky.' Năm học: 20'.$nam_hoc1.' - 20'.$nam_hoc2);
}
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A2', "STT")
            ->setCellValue('B2', "Thời gian")
            ->setCellValue('C2', "Lớp")
            ->setCellValue('D2', "Khoa")
            ->setCellValue('E2', "Tên môn học/Giảng viên")
            ->setCellValue('F2', "Giảng viên cung cấp đầy đủ mục tiêu bài học trước khi bắt đầu mỗi buổi học")
            ->setCellValue('G2', "Giảng viên chuẩn bị đầy đủ các phương tiện, công cụ dụng cụ dạy học trước mỗi buổi học lý thuyết, thực hành")
            ->setCellValue('H2', "Giảng viên giới thiệu rõ ràng các giáo trình, tài liệu tham khảo để giúp bạn hiểu rõ hoặc mở rộng hiểu biết về môn học")
            ->setCellValue('I2', "Giảng viên giới thiệu đầy đủ về hình thức và phương pháp đánh giá kết quả học tập của môn học (bài định kỳ, thi kết thúc môn,….)")
            ->setCellValue('J2', "Giảng viên thực hiện nghiêm túc thời gian lên lớp")
            ->setCellValue('K2', "Giảng viên sẵn sàng tư vấn, giải đáp những thắc mắc, giúp đỡ cho HSSV một cách thỏa đáng")
            ->setCellValue('L2', "Giảng viên tổ chức nhiều hoạt động giảng dạy/Thao tác hướng dẫn HHSV làm mẫu thành thạo")
            ->setCellValue('M2', "Giảng viên rất cởi mở và tôn trọng ý kiến sinh viên")
            ->setCellValue('N2', "Nội dung môn học được giảng viên truyền đạt mạch lạc, logic, dễ hiểu")
            ->setCellValue('O2', "Giảng viên thường xuyên liên hệ bài học với thực tế")
            ->setCellValue('P2', "Giảng viên thường xuyên nhắc nhở, giáo dục về đạo đức, tư cách của sinh viên")
            ->setCellValue('Q2', "Đề kiểm tra thường xuyên, định kỳ, phù hợp với nội dung giảng dạy")
            ->setCellValue('R2', "	Giảng viên công bố công khai, rõ ràng danh sách HSSV được thi, cấm thi")
            ->setCellValue('S2', "Bài thi kết thúc môn có thời lượng và nội dung phù hợp với nội dung giảng viên đã giảng dạy.")
            ->setCellValue('T2', "Giảng viên giảng dạy nhiệt tình, thân thiện")
            ->setCellValue('U2', "Bạn thật sự hứng thú với các giờ học của môn học này")
            ->setCellValue('V2', "Bạn thật sự hài lòng với phương pháp đánh giá kết quả học tập của môn học này")
            ->setCellValue('W2', "Ý kiến khác");

$objPHPExcel->getActiveSheet()->getStyle('A2:V2')
->getAlignment()->setWrapText(true);

function getString($value) {
	$string = '';
	switch ($value) {
		case 1:
			$string = 'Không đồng ý';
			break;
		case 2:
			$string = 'Cần cải thiện';
			break;
		case 3:
			$string = 'Đồng ý';
			break;
		case 4:
			$string = 'Rất đồng ý';
			break;
		case 5:
			$string = 'Hoàn toàn đồng ý';
			break;
	}
	return $string;
}
function get_sql($sql)
{
	global $db;
	$get_sql_query_statement = $db->query($sql);
	if ($result_get_sql_query = $db->fetch($get_sql_query_statement))
	{
		return $result_get_sql_query[0];
	}
	else
	{
		return "No data";
	}
}
$i = 3;
$r = $db->select("vn_khao_sat","id <> 0".$keyw, "order by id desc");
while ($row = $db->fetch($r)) {
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue("A$i", $i-2)
				->setCellValue("B$i", lg_date::vn_time($row['time']))
                ->setCellValue("C$i", get_sql("select ten from post_lang where lang_id='vn' and post_id=".$row['lop']))
                ->setCellValue("D$i", get_sql("select ten from post_lang where lang_id='vn' and post_id=".$row['khoa']))
                ->setCellValue("E$i", get_sql("select ten from post_lang where lang_id='vn' and post_id=".$row['ten_mh']).'/'.get_sql("select ten from post_lang where lang_id='vn' and post_id=".$row['ten_gv']))
                ->setCellValue("F$i", getString($row['option1']))
                ->setCellValue("G$i", getString($row['option2']))
                ->setCellValue("H$i", getString($row['option3']))
                ->setCellValue("I$i", getString($row['option4']))
                ->setCellValue("J$i", getString($row['option5']))
                ->setCellValue("K$i", getString($row['option6']))
                ->setCellValue("L$i", getString($row['option7']))
                ->setCellValue("MD$i", getString($row['option8']))
                ->setCellValue("N$i", getString($row['option9']))
                ->setCellValue("O$i", getString($row['option10']))
                ->setCellValue("P$i", getString($row['option11']))
                ->setCellValue("Q$i", getString($row['option12']))
                ->setCellValue("R$i", getString($row['option13']))
                ->setCellValue("S$i", getString($row['option14']))
                ->setCellValue("T$i", getString($row['option15']))
                ->setCellValue("U$i", getString($row['option16']))
                ->setCellValue("V$i", getString($row['option17']))
                ->setCellValue("W$i", $row['y_k']);
	$i++;
}
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$fileName.'"');
PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007')->save('php://output');
?>
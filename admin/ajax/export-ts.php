<?php
include "../../_CORE/index.php";
include "../../app/config/config.php";
include "../../app/constants/variables.php";
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);

$date = isset($_GET['date']) ? $_GET['date'] : '';
$date2 = isset($_GET['date2']) ? $_GET['date2'] : '';
$type = isset($_GET['type']) ? $_GET['type'] : '';
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

require "PHPExcel/Classes/PHPExcel/IOFactory.php";

$fileType = 'Excel2007';
$fileName = "Thông tin đăng ký tuyển sinh - ".date('d-m-Y').".xlsx";
$objPHPExcel = PHPExcel_IOFactory::load("data.xlsx");

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
function getNameByValue ($value)
{
    $provinces = json_decode(PROVINCES::ITEMS);
    foreach ($provinces as $province) {
        if ($province->value == $value) {
            return $province->name;
        }
    }

    return null;
}

// Thiết lập tên các cột dữ liệu
if ($date!='' && $date2 != '') {
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', "Từ ngày: ".$date.' - đến ngày: '.$date2);
}
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A2', "STT")
            ->setCellValue('B2', "Họ và tên")
            ->setCellValue('D2', "Số điện thoại")
            ->setCellValue('E2', "Ngày sinh")
            ->setCellValue('F2', "CMND/Thẻ căn cước")
            ->setCellValue('G2', "Trường THPT")
            ->setCellValue('H2', "Địa chỉ cư trú")
            ->setCellValue('I2', "Điểm")
            ->setCellValue('L2', "Tỉnh/Thành phố")
            ->setCellValue('M2', "Năm tốt nghiệp")
            ->setCellValue('N2', "Ngành đăng ký")
            ->setCellValue('O2', "Email")
            ->setCellValue('P2', "Facebook");
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('I3', "Toán")
            ->setCellValue('J3', "Văn")
            ->setCellValue('K3', "Anh");
$objPHPExcel->getActiveSheet()->mergeCells('B2:C3');
$objPHPExcel->getActiveSheet()->mergeCells('I2:K2');

$objPHPExcel->getActiveSheet()->mergeCells('A2:A3');

$objPHPExcel->getActiveSheet()->mergeCells('D2:D3');
$objPHPExcel->getActiveSheet()->mergeCells('E2:E3');
$objPHPExcel->getActiveSheet()->mergeCells('F2:F3');
$objPHPExcel->getActiveSheet()->mergeCells('G2:G3');
$objPHPExcel->getActiveSheet()->mergeCells('H2:H3');
$objPHPExcel->getActiveSheet()->mergeCells('L2:L3');
$objPHPExcel->getActiveSheet()->mergeCells('M2:M3');
$objPHPExcel->getActiveSheet()->mergeCells('N2:N3');
$objPHPExcel->getActiveSheet()->mergeCells('O2:O3');
$objPHPExcel->getActiveSheet()->mergeCells('P2:P3');
$objPHPExcel->getActiveSheet()->getStyle('A2:N2')
->getAlignment()->setWrapText(true);

$i = 4;
$r = $db->select("vn_contacts","type='".$type."' ".$keyw, "order by id desc");
while ($row = $db->fetch($r)) {
    $qn = $db->query("select * from post INNER JOIN post_lang ON post.id = post_lang.post_id INNER JOIN post_meta ON post.id = post_meta.post_id WHERE post_meta.meta_value = '".$row['nganh_dk']."' and post_meta.meta_key = 'ma_nganh' and post_meta.lang_id = 'vn' and post_lang.lang_id = 'vn' ORDER BY post.thu_tu LIMIT 1");
    $rn=$db->fetch($qn);
	$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue("A$i", $i-3)
				->setCellValue("B$i", $row['name'])
                ->setCellValue("C$i", $row['ten'])
                ->setCellValue("D$i", $row['phone'])
                ->setCellValue("E$i", $row['ngay_sinh'])
                ->setCellValue("F$i", $row['cmnd'])
                ->setCellValue("G$i", $row['thpt'])
                ->setCellValue("H$i", $row['address'])
                ->setCellValue("I$i", $row['toan'])
                ->setCellValue("J$i", $row['van'])
                ->setCellValue("K$i", $row['anh'])
                ->setCellValue("L$i", getNameByValue($row['tinh_thanh']))
                ->setCellValue("M$i", $row['nam_tn'])
                ->setCellValue("N$i", $rn['ten'])
                ->setCellValue("O$i", $row['email'])
                ->setCellValue("P$i", $row['link_facebook']);
	$i++;
}
header('Content-type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename="'.$fileName.'"');
PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007')->save('php://output');
?>
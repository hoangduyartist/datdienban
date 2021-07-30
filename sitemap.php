<?php
//header('Content-type: application/xml');
include "_CORE/index.php";
include("app/config/config.php");
$db = new lg_mysql($host,$dbuser,$dbpass,$csdl);
include("app/config/route.php");
include("app/start/func.php");
  
$xmlString = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
$xmlString .= '<urlset   xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                        xmlns:image="http://www.google.com/schemas/sitemap-image/1.1"
                        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd" 
                        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
//echo $xmlString;
$xmlString.='<url>';
$xmlString.='
  <loc>'.$root.'</loc>
  <changefreq>daily</changefreq>
  <priority>1.0</priority>
';
$xmlString.='</url>';
$query = $db->selectpostcat("postcat_id='1'","order by postcat_id desc");
while($row = $db->fetch($query)){   
    $date = date("Y-m-d");
    $xmlString.='<url>';
    $xmlString.= '
        <loc>'.$root."/".get_slug_postcat($row['postcat_id']).'/</loc>';
    if($row['hinh']!=''){
    $xmlString.= '    <image:image>
            <image:loc>'.get_single_image($row['postcat_id'],'postcat','avatar','link').'</image:loc>
        </image:image>';
    }
    $xmlString.= '    <lastmod>'. $date .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.9</priority>';
    $xmlString.='</url>';
}

$query = $db->selectpostcat("hien_thi='1' and cat = 1","order by postcat_id desc");
while($row = $db->fetch($query)){   
    $date = date("Y-m-d");
    $xmlString.='<url>';
    $xmlString.= '
        <loc>'.$root."/".get_slug_postcat($row['postcat_id']).'/</loc>';
    if($row['hinh']!=''){
    $xmlString.= '    <image:image>
            <image:loc>'.get_single_image($row['postcat_id'],'postcat','avatar','link').'</image:loc>
        </image:image>';
    }
    $xmlString.= '    <lastmod>'. $date .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.8</priority>';
    $xmlString.='</url>';
}

$query = $db->selectpostcat("hien_thi='1' and post_type <> 'catproduct' and post_type<>'other'","order by postcat_id desc");
while($row = $db->fetch($query)){   
    $date = date("Y-m-d");
    $xmlString.='<url>';
    $xmlString.= '
        <loc>'.$root."/".get_slug_postcat($row['postcat_id']).'/</loc>';
    if($row['hinh']!=''){
    $xmlString.= '    <image:image>
            <image:loc>'.get_single_image($row['postcat_id'],'postcat','avatar','link').'</image:loc>
        </image:image>';
    }
    $xmlString.= '    <lastmod>'. $date .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.7</priority>';
    $xmlString.='</url>';
}


$query = $db->selectpost("hien_thi='1' and post_type<>'project_detail' and post_type<>'other_detail' ","order by post_id desc");
while($row = $db->fetch($query)){
    $date = date("Y-m-d");
    $xmlString.='<url>';
    $xmlString.= '
        <loc>'.$root."/".get_sql("select slug from postcat_lang where postcat_id=".$row['cat']).'/'.$row['slug'].'</loc>';
    if(get_single_image($row['post_id'],'post','avatar','link')!=''){
        $xmlString.= '    <image:image>
            <image:loc>'.get_single_image($row['post_id'],'post','avatar','link').'</image:loc>
        </image:image>';
    }
    $xmlString.= '    <lastmod>'. $date .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.6</priority>';
    $xmlString.='</url>';
}

$query = $db->selectpost("hien_thi='1' and post_type='project_detail'","order by post_id desc");
while($row = $db->fetch($query)){
    $date = date("Y-m-d");
    $xmlString.='<url>';
    $xmlString.= '
        <loc>'.$root."/".get_sql("select slug from postcat_lang where postcat_id=".$row['cat']).'/'.$row['slug'].'</loc>';
    if(get_single_image($row['post_id'],'post','avatar','link')!=''){
        $xmlString.= '    <image:image>
            <image:loc>'.get_single_image($row['post_id'],'post','avatar','link').'</image:loc>
        </image:image>';
    }
    $xmlString.= '    <lastmod>'. $date .'</lastmod>
        <changefreq>daily</changefreq>
        <priority>0.2</priority>';
    $xmlString.='</url>';
}


    $xmlString .= '</urlset>';
?>


<?
$dom = new DOMDocument;
$dom->preserveWhiteSpace = FALSE;
$dom->loadXML($xmlString);

//Save XML as a file
$dom->save('sitemap.xml');

//View XML document
$dom->formatOutput = TRUE;
echo $dom->saveXml();
echo "</br></br>Cập nhật thành công!";
?>

<!--
loc: url trang web
lastmod: ngày cập nhật theo thứ tự: Năm,tháng,ngày
monthly: mức độ cập nhật thường xuyên của web theo tháng. Có thể thay bằng daily,hour,weekly
priority: mức độ ưu tiên. Mức ưu tiên này được xếp từ 0-1 trong đó 0 là nhỏ nhất và 1 lớn lớn nhất. 
-->
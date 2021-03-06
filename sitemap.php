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
echo "</br></br>C???p nh???t th??nh c??ng!";
?>

<!--
loc: url trang web
lastmod: ng??y c???p nh???t theo th??? t???: N??m,th??ng,ng??y
monthly: m???c ????? c???p nh???t th?????ng xuy??n c???a web theo th??ng. C?? th??? thay b???ng daily,hour,weekly
priority: m???c ????? ??u ti??n. M???c ??u ti??n n??y ???????c x???p t??? 0-1 trong ???? 0 l?? nh??? nh???t v?? 1 l???n l???n nh???t. 
-->
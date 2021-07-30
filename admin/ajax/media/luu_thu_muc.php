<?php
include "../../../_CORE/index.php";
include "../../../app/config/config.php";
$db = new lg_mysql($host, $dbuser, $dbpass, $csdl);
include "../../function.php";
$resut = array(
  'status' => false,
  'notification' => "Success"
);
$folderName = isset($_POST['folderName']) ? $_POST['folderName'] : '';
$tenThuMucTrim = trim($folderName);
if (
  $folderName
  && $tenThuMucTrim != ''
) {
  $tenThuMucFormat = lg_string::slug($tenThuMucTrim);
  $q = $db->select(
    "media_folder",
    "folder_name='" . $tenThuMucFormat . "'",
    ""
  );
  $r = $db->fetch($q);
  if ($db->num_rows($q) != 0) {
    $db->query(
      "update media_folder set folder_name = '" . $tenThuMucFormat . "', folder_description = '" . trim($folderName) . "' where id = '" . $r['id'] . "'"
    );
    $resut = array(
      'status' => true,
      'notification' => "Cập nhật thành công!"
    );
  } else {
    $db->insert(
      "media_folder",
      "folder_name, folder_description, is_display, is_deleted",
      "'" . $tenThuMucFormat . "','" . trim($folderName) . "', 1, 0"
    );
    $resut = array(
      'status' => true,
      'notification' => "Thêm mới thành công!"
    );
  }
}

echo json_encode($resut);

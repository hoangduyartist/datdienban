<?php
/*
  Kiểm tra có active hay không?
  @param {String} postType: la postType của trang neu post_type khong co thi truy van theo act
  @param {Array} activeArray: là mảng gồm các page
  @return {String} active || ""
*/
function checkActiveMenu($postType = "", $activeArray = array(), $act = "") {
  $result = "";
  $type = $act;
  if (count($activeArray)==0 || $act=="") {
    return $result;
  }
  if ($postType!="") {
    $type = $postType;
  }
  foreach ($activeArray as $key => $value) {
    if ($type == $value) {
      $result = "active";
    }
  }
  return $result;
}

/*
  Kiểm tra 1 số có trong 1 mảng số hay không?
  @param {int} number: là 1 số đầu vào
  @param {Array}{int} numberArray: array danh sách các số được định nghĩa
  @return {bool} TRUE/FALSE
*/
function conditionCollation($number, $numberArray = array()) {
  $result = false;
  if (count($numberArray)!=0) {
    foreach ($numberArray as $key => $value) {
      if ($number == $value) {
        $result = true;
        break;
      }
    }
  }
  return $result;  
}

/*
  Kiểm tra 1 số có trong 1 mảng số hay không? và kiểm tra phân quyền
  @param {int/string} param là 1 post_type hoặc 1 act bất kỳ
  @param {condition} act || code
  @return {bool} TRUE/FALSE
*/
function conditionPermission($post_type = "", $param, $condition = "act") {
  $result = false;
  if ($param!="" && $post_type!="") {
    foreach ($_SESSION["member_Permission"] as $key => $value) {
      if ($condition == "act") {
        if ($param == $value->act && $post_type == $value->post_type) {
          $result = true;
          break;
        }
      } else {
        if ($param == $value->code  && $post_type == $value->post_type) {
          $result = true;
          break;
        }
      }
    }
  } else if ($post_type=="" && $param=="home") {
    $result = true;
  } else {
    foreach ($_SESSION["member_Permission"] as $key => $value) {
      if ($condition == "act") {
        if ($param == $value->act) {
          $result = true;
          break;
        }
      } else {
        if ($param == $value->code ) {
          $result = true;
          break;
        }
      }
    }
  }

  if ($_SESSION["member_role"] == "Administrator") {
    $result = true;
  }

  return $result;  
}
?>
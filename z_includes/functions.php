<?php

/** Get danh sach slice hinh anh album bai viet
 * Param {int} id_slug id cua bai viet
 * return {array} danh sach hinh anh
 */
function albumChiTietBaiVietSlide($id_slug)
{
  global $db, $domain;
  $result = '';
  $q = $db->selectmedia("hien_thi=1 and parent_id='" . $id_slug . "' and type='album' and parent_type='post'", "order by media_relationship.thu_tu asc, media_relationship.id desc");
  if ($db->num_rows($q) != 0) {
    $result = '<div class="slice-khoa mb20">';
    while ($r = $db->fetch($q)) {
      $result .= '<div class="slice-khoa-items">';
      $result .= '<img class="img-fluid" src="' . $domain . '/uploads/' . $r['dir_folder'] . '/' . $r['file_name'] . '" alt="' . $r['title'] . '" />';
      $result .= '</div>';
    }
    $result .= '</div>';
  }
  return $result;
}

/** Get danh sach slice hinh anh album bai viet
 * Param {int} id_slug id cua bai viet
 * return {array} danh sach hinh anh
 */
function albumDanhSachBaiVietSlide($id_slug)
{
  global $db, $domain;
  $result = '';
  $q = $db->selectmedia("hien_thi=1 and parent_id='" . $id_slug . "' and type='album' and parent_type='postcat'", "order by media_relationship.thu_tu asc, media_relationship.id desc");
  if ($db->num_rows($q) != 0) {
    $result = '<div class="slice-category-sanpham">';
    while ($r = $db->fetch($q)) {
      $imageUrl = $domain . '/uploads/' . $r['dir_folder'] . '/' . $r['file_name'];
      $result .= '<div class="slice-category-sanpham-item" style="background-image: url(' . $imageUrl . ')">';
      $result .= '<img class="img-fluid" src="' . $imageUrl . '" alt="' . $r['title'] . '" />';
      $result .= '</div>';
    }
    $result .= '</div>';
  }
  return $result;
}

/** Get danh sach hinh anh album bai viet
 * Param {int} id_slug id cua bai viet
 * Param {string} classParent la class cua album
 * Param {string} selector la class de nhom cac hinh anh su dung ligh gallery
 * Return {array} danh sach hinh anh
 */
function albumChiTietBaiViet($id_slug, $classParent, $selector = '')
{
  global $db, $domain;
  $result = '';
  $q = $db->selectmedia("hien_thi=1 and parent_id='" . $id_slug . "' and type='album' and parent_type='post'", "order by media_relationship.thu_tu asc, media_relationship.id desc");
  if ($db->num_rows($q) != 0) {
    $result = '<ul class="' . $classParent . '">';
    while ($r = $db->fetch($q)) {
      $result .= '<li>';
      $result .= '<a class="' . $selector . '" href="' . $domain . '/uploads/' . $r['dir_folder'] . '/' . $r['file_name'] . '">';
      $result .= '<img class="img-fluid" src="' . $domain . '/uploads/' . $r['dir_folder'] . '/' . $r['file_name'] . '" alt="' . $r['title'] . '" />';
      $result .= '</a>';
      $result .= '</li>';
    }
    $result .= '</ul>';
  }
  return $result;
}

/** Hien thi hoac khong hien thi icon new
 * Param {object} data la data item
 * Return {void} html icon new
 */
function hienThiIconNew($data, $day = 30)
{
  if (!$data) {
    return false;
  }
  $result = '';
  // Ngay hom nay
  $today = gmdate("Y-m-d 23:59:59");
  // Ngay bat dau hien thi icon
  $dayIcon = lg_date::vn_other($data['time_edit'], 'Y-m-d 00:00:00');
  // Ngay hom nay tru cho ngay hien thi icon
  $countDay = round((strtotime($today) - strtotime($dayIcon)) / (60 * 60 * 24), 0);
  if ($countDay > 0 && $countDay < $day) {
    $result = '<span class="new-notice"><span class="new-label">New</span></span>';
  }
  return $result;
}

/** Get danh sach slice hinh anh album
 * Param {int} id cua album
 * return {array} danh sach hinh anh
 */
function albumBannerSlide($id)
{
  global $db, $domain;
  $result = '';
  $q = $db->selectmedia("parent_id='" . $id . "' and type='gallery' and parent_type='gallery'", "order by thu_tu, media_relationship.id desc");
  if ($db->num_rows($q) != 0) {
    $result = '<div class="module-slice-album">';
    while ($r = $db->fetch($q)) {
      $imageUrl = $domain . '/uploads/' . $r['dir_folder'] . '/' . $r['file_name'];
      $result .= '<div class="module-slice-album-item" style="background-image: url(' . $imageUrl . ')">';
      $result .= '<img class="img-fluid" src="' . $imageUrl . '" alt="' . $r['title'] . '" />';
      $result .= '</div>';
    }
    $result .= '</div>';
  }
  return $result;
}

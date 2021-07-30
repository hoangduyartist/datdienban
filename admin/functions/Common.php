<?php
class DataPostCat
{
  public $id;
  public $name;
}

/*
 * Get Danh sách cấp thư mục
 * $cat: cat chuyên mục
 * $line: --
 * $result: array
*/
function GetCategoryTheme($cat = 0, $line = '', $result = array())
{
  global $db;
  if (!$result) {
    $result = array();
  }
  $langArray = GetLanguagesActive();
  $q = $db->selectpostcat("hien_thi=1 and cat='" . $cat . "' and (post_type='news' or post_type='sanpham') and theme_keys='' and lang_id='" . $langArray["code"] . "' ", "order by postcat.id desc");
  while ($r = $db->fetch($q)) {
    if ($db->num_rows($q) != 0) {
      $data = new DataPostCat(); {
        $data->id = $r['postcat_id'];
        $data->name = $line . "" . $r['name'];
      }
      if ($r['level'] <= 1 && ($r["post_type"] == 'news' or $r["post_type"] == 'sanpham')) {
        $result[] = $data;
        $result = GetCategoryTheme($r['postcat_id'], $line . "-- ", $result);
      }
    }
  }

  return $result;
}

/*
 * Get Danh sách cấp thư mục đã active
 * $cat: cat chuyên mục
 * $line: --
 * $result: array
*/
function GetCategoryThemeActive($cat = 0, $themeKey, $line = '', $result = array())
{
  global $db;
  if (!$result) {
    $result = array();
  }
  $langArray = GetLanguagesActive();
  $q = $db->selectpostcat("hien_thi=1 and cat='" . $cat . "' and theme_keys='" . $themeKey . "' and lang_id='" . $langArray["code"] . "' ", "order by thu_tu asc");
  if ($db->num_rows($q) != 0) {
    while ($r = $db->fetch($q)) {
      $data = new DataPostCat(); {
        $data->id = $r['postcat_id'];
        $data->name = $line . "" . $r['name'];
      }
      $result[] = $data;
      $result = GetCategoryTheme($r['postcat_id'], $line . "-- ", $result);
    }
  } else {
    $q = $db->selectpostcat("hien_thi=1 and theme_keys='" . $themeKey . "' and lang_id='" . $langArray["code"] . "' ", "order by thu_tu asc");
    while ($r = $db->fetch($q)) {
      $data = new DataPostCat(); {
        $data->id = $r['postcat_id'];
        $data->name = $line . "" . $r['name'];
      }
      $result[] = $data;
      $result = GetCategoryTheme($r['postcat_id'], $line . "-- ", $result);
    }
  }

  return $result;
}

/**
 * Get tất cả cấp con của cấp hiện tại
 * $id: id chuyên mục
 * $txt: array id
 */
function GetChild($id, $txt = array())
{
  global $db;
  if (!$txt) {
    $txt = array();
  }
  $q = $db->select("postcat", "cat='" . $id . "'", "order by id desc");
  while ($r = $db->fetch($q)) {
    if ($db->num_rows($q) != 0) {
      $txt[] = $r['id'];
      $txt = GetChild($r['id'], $txt);
    }
  }

  if (in_array($id, $txt) == false) {
    $txt[] = $id;
  }
  return $txt;
}

/*
 * Get Danh sách chuyên mục
 * $cat: cat chuyên mục
 * $line: --
 * $result: array
 * $level: 1/2/3/4...
 * $post_type: news/...
*/
function GetCategories($cat = 0, $line = '', $result = array(), $level = 3, $post_type = 'news')
{
  global $db;
  if (!$result) {
    $result = array();
  }
  $langArray = GetLanguagesActive();
  $q = $db->selectpostcat("hien_thi=1 and cat='" . $cat . "' and post_type='" . $post_type . "' and lang_id='" . $langArray["code"] . "' ", "order by postcat.id desc");
  while ($r = $db->fetch($q)) {
    if ($db->num_rows($q) != 0) {
      $data = new DataPostCat(); {
        $data->id = $r['postcat_id'];
        $data->name = $line . "" . $r['name'];
      }
      if ($r['level'] <= $level) {
        $result[] = $data;
        $result = GetCategories($r['postcat_id'], $line . "-- ", $result, $level, $post_type);
      }
    }
  }

  return $result;
}

function GetLanguagesActive()
{
  global $db;
  $rLang = array("code");
  $qLang = $db->select("language", "display=1", "order by thu_tu limit 1");
  if ($db->num_rows($qLang) != 0) {
    $rLang = $db->fetch($qLang);
  }

  return $rLang;
}

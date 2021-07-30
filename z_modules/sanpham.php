<?php
$theme = "default.php";
if (GetInfoCategoryHightLevel($id_slug, 2, "theme_keys") != '') {
  $theme = GetInfoCategoryHightLevel($id_slug, 2, "theme_keys").".php";
} else if (GetInfoCategoryHightLevel($id_slug, 1, "theme_keys") != '') {
  $theme = GetInfoCategoryHightLevel($id_slug, 1, "theme_keys").".php";
}
include "z_modules/theme/sanpham/".$theme;

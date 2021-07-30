<?php 
class AuthorizedAction
{
	public $id;
  public $name;
	public $code;
	public $act = "postcat_list";
	public $post_type;
}
$memberList = new AuthorizedAction();
{
	$memberList->id = 1;
	$memberList->name = "Danh sách user";
	$memberList->code = "MEMBER_LIST";
	$memberList->act = "member_list";
}
$memberNew = new AuthorizedAction();
{
	$memberNew->id = 2;
	$memberNew->name = "Tạo user";
	$memberNew->code = "MEMBER_NEW";
	$memberNew->act = "member_new";
}
$memberEdit = new AuthorizedAction();
{
	$memberEdit->id = 3;
	$memberEdit->name = "Sửa user";
	$memberEdit->code = "MEMBER_EDIT";
	$memberEdit->act = "member_edit";
}
$memberDelete = new AuthorizedAction();
{
	$memberDelete->id = 4;
	$memberDelete->name = "Xóa user";
	$memberDelete->code = "DELETE_MEMBER";
	$memberDelete->act = "DELETE_MEMBER";
}

$postcatList = new AuthorizedAction();
{
	$postcatList->id = 5;
	$postcatList->name = "Chuyên mục (LIST)";
	$postcatList->code = "postcat_list";
	$postcatList->act = "postcat_list";
	$postcatList->post_type = "news";
}
$postcatNew = new AuthorizedAction();
{
	$postcatNew->id = 6;
	$postcatNew->name = "Chuyên mục (NEW)";
	$postcatNew->code = "POSTCAT_NEW";
	$postcatNew->act = "postcat_list";
	$postcatNew->post_type = "news";
}
$postcatEdit = new AuthorizedAction();
{
	$postcatEdit->id = 7;
	$postcatEdit->name = "Chuyên mục (EDIT)";
	$postcatEdit->code = "POSTCAT_EDIT";
	$postcatEdit->act = "postcat_edit";
	$postcatEdit->post_type = "news";
}
$postcatDelete = new AuthorizedAction();
{
	$postcatDelete->id = 8;
	$postcatDelete->name = "Chuyên mục (DELETE)";
	$postcatDelete->code = "POSTCAT_DELETE";
	$postcatDelete->act = "postcat_list";
	$postcatDelete->post_type = "news";
}
$postList = new AuthorizedAction();
{
	$postList->id = 9;
	$postList->name = "Bài viết (List)";
	$postList->code = "POST_LIST";
	$postList->act = "post_list";
	$postList->post_type = "news_detail";
}
$postNew = new AuthorizedAction();
{
	$postNew->id = 10;
	$postNew->name = "Bài viết (NEW)";
	$postNew->code = "POST_NEW";
	$postNew->act = "post_new";
	$postNew->post_type = "news_detail";
}
$postEdit = new AuthorizedAction();
{
	$postEdit->id = 11;
	$postEdit->name = "Bài viết (EDIT)";
	$postEdit->code = "POST_EDIT";
	$postEdit->act = "post_edit";
	$postEdit->post_type = "news_detail";
}
$postPublic = new AuthorizedAction();
{
	$postPublic->id = 12;
	$postPublic->name = "Bài viết (PUBLIC)";
	$postPublic->code = "POST_PUBLIC";
	$postPublic->act = "post_edit";
	$postPublic->post_type = "news_detail";
}
$postAlbumList = new AuthorizedAction();
{
	$postAlbumList->id = 14;
	$postAlbumList->name = "Bài viết Album (LIST)";
	$postAlbumList->code = "ALBUM_MANA_LIST";
	$postAlbumList->act = "album_mana_list";
	$postAlbumList->post_type = "news_detail";
}
$pageList = new AuthorizedAction();
{
	$pageList->id = 15;
	$pageList->name = "Page (LIST)";
	$pageList->code = "PAGE_LIST";
	$pageList->act = "page_list";
	$pageList->post_type = "";
}
$pageNew = new AuthorizedAction();
{
	$pageNew->id = 16;
	$pageNew->name = "Page (NEW)";
	$pageNew->code = "PAGE_NEW";
	$pageNew->act = "page_new";
	$pageNew->post_type = "";
}
$infoList = new AuthorizedAction();
{
	$infoList->id = 17;
	$infoList->name = "Info (LIST)";
	$infoList->code = "INFO_LIST";
	$infoList->act = "info_list";
	$infoList->post_type = "";
}
// $infoNew = new AuthorizedAction();
// {
// 	$infoNew->id = 18;
// 	$infoNew->name = "Info (NEW)";
// 	$infoNew->code = "INFO_NEW";
// 	$infoNew->act = "info_new";
// 	$infoNew->post_type = "";
// }
$infoEdit = new AuthorizedAction();
{
	$infoEdit->id = 19;
	$infoEdit->name = "Info (EDIT)";
	$infoEdit->code = "INFO_EDIT";
	$infoEdit->act = "info_edit";
	$infoEdit->post_type = "";
}
// $infoDelete = new AuthorizedAction();
// {
// 	$infoDelete->id = 20;
// 	$infoDelete->name = "Info (DELETE)";
// 	$infoDelete->code = "INFO_DELETE";
// 	$infoDelete->act = "info_list";
// 	$infoDelete->post_type = "";
// }
$mediaList = new AuthorizedAction();
{
	$mediaList->id = 21;
	$mediaList->name = "MEDIA (ALL)";
	$mediaList->code = "MEDIA";
	$mediaList->act = "block_media";
	$mediaList->post_type = "";
}
$galleryManager = new AuthorizedAction();
{
	$galleryManager->id = 22;
	$galleryManager->name = "Album tree (LIST)";
	$galleryManager->code = "GALLERY_MANAGER";
	$galleryManager->act = "gallery_manager";
	$galleryManager->post_type = "catgal";
}
$galleryManagerEdit = new AuthorizedAction();
{
	$galleryManagerEdit->id = 23;
	$galleryManagerEdit->name = "Album tree (EDIT)";
	$galleryManagerEdit->code = "CATGAL_EDIT";
	$galleryManagerEdit->act = "catgal_edit";
	$galleryManagerEdit->post_type = "catgal";
}
$galleryMenuNew = new AuthorizedAction();
{
	$galleryMenuNew->id = 24;
	$galleryMenuNew->name = "Album folder (NEW)";
	$galleryMenuNew->code = "GALLERY_MENU_NEW";
	$galleryMenuNew->act = "gallery_menu_new";
	$galleryMenuNew->post_type = "catgal";
}
$galleryMenuEdit = new AuthorizedAction();
{
	$galleryMenuEdit->id = 25;
	$galleryMenuEdit->name = "Album folder (EDIT)";
	$galleryMenuEdit->code = "GALLERY_MENU_EDIT";
	$galleryMenuEdit->act = "gallery_menu_edit";
	$galleryMenuEdit->post_type = "catgal";
}
$galleryMenuDelete = new AuthorizedAction();
{
	$galleryMenuDelete->id = 26;
	$galleryMenuDelete->name = "Album folder (DELETE)";
	$galleryMenuDelete->code = "GALLERY_MENU_DELETE";
	$galleryMenuDelete->act = "gallery_manager";
	$galleryMenuDelete->post_type = "catgal";
}
$albumList = new AuthorizedAction();
{
	$albumList->id = 27;
	$albumList->name = "Album (LIST)";
	$albumList->code = "MEDIA_GAL";
	$albumList->act = "media_gal";
	$albumList->post_type = "";
}
$contacts = new AuthorizedAction();
{
	$contacts->id = 28;
	$contacts->name = "Liên hệ (LIST)";
	$contacts->code = "CONTACTS";
	$contacts->act = "contacts";
	$contacts->post_type = "";
}
$contactsDelete = new AuthorizedAction();
{
	$contactsDelete->id = 29;
	$contactsDelete->name = "Liên hệ (DELETE)";
	$contactsDelete->code = "CONTACTS_DELETE";
	$contactsDelete->act = "contacts";
	$contactsDelete->post_type = "";
}
$userGroups = new AuthorizedAction();
{
	$userGroups->id = 30;
	$userGroups->name = "Nhóm user (LIST)";
	$userGroups->code = "USER_GROUPS";
	$userGroups->act = "user_groups";
	$userGroups->post_type = "";
}
$userGroupsNew = new AuthorizedAction();
{
	$userGroupsNew->id = 31;
	$userGroupsNew->name = "Nhóm user (NEW)";
	$userGroupsNew->code = "USER_GROUPS_NEW";
	$userGroupsNew->act = "user_groups_action";
	$userGroupsNew->post_type = "";
}
$userGroupsEdit = new AuthorizedAction();
{
	$userGroupsEdit->id = 32;
	$userGroupsEdit->name = "Nhóm user (EDIT)";
	$userGroupsEdit->code = "USER_GROUPS_EDIT";
	$userGroupsEdit->act = "user_groups_action";
	$userGroupsEdit->post_type = "";
}
$permissionControl = new AuthorizedAction();
{
	$permissionControl->id = 33;
	$permissionControl->name = "Phân quyền (CONTROL)";
	$permissionControl->code = "USER_PERMISSION";
	$permissionControl->act = "user_permission";
	$permissionControl->post_type = "";
}
$menuControl = new AuthorizedAction();
{
	$menuControl->id = 34;
	$menuControl->name = "Menu (CONTROL)";
	$menuControl->code = "MENU_LIST";
	$menuControl->act = "menu_list";
	$menuControl->post_type = "";
}
$setting = new AuthorizedAction();
{
	$setting->id = 35;
	$setting->name = "Setting (CONTROL)";
	$setting->code = "SETTING";
	$setting->act = "setting";
	$setting->post_type = "";
}
$theme = new AuthorizedAction();
{
	$theme->id = 36;
	$theme->name = "Giao diện (CONTROL)";
	$theme->code = "THEME";
	$theme->act = "theme";
	$theme->post_type = "";
}

$productCatList = new AuthorizedAction();
{
	$productCatList->id = 37;
	$productCatList->name = "Chuyên mục sản phẩm (LIST)";
	$productCatList->code = "postcat_list";
	$productCatList->act = "postcat_list";
	$productCatList->post_type = "sanpham";
}
$productCatNew = new AuthorizedAction();
{
	$productCatNew->id = 38;
	$productCatNew->name = "Chuyên mục sản phẩm (NEW)";
	$productCatNew->code = "POSTCAT_NEW";
	$productCatNew->act = "postcat_list";
	$productCatNew->post_type = "sanpham";
}
$productCatEdit = new AuthorizedAction();
{
	$productCatEdit->id = 39;
	$productCatEdit->name = "Chuyên mục sản phẩm (EDIT)";
	$productCatEdit->code = "POSTCAT_EDIT";
	$productCatEdit->act = "postcat_edit";
	$productCatEdit->post_type = "sanpham";
}
$productCatDelete = new AuthorizedAction();
{
	$productCatDelete->id = 40;
	$productCatDelete->name = "Chuyên mục sản phẩm (DELETE)";
	$productCatDelete->code = "POSTCAT_DELETE";
	$productCatDelete->act = "postcat_list";
	$productCatDelete->post_type = "sanpham";
}

$productList = new AuthorizedAction();
{
	$productList->id = 41;
	$productList->name = "Sản phẩm (List)";
	$productList->code = "POST_LIST";
	$productList->act = "post_list";
	$productList->post_type = "sanpham_detail";
}
$productNew = new AuthorizedAction();
{
	$productNew->id = 42;
	$productNew->name = "Sản phẩm (NEW)";
	$productNew->code = "POST_NEW";
	$productNew->act = "post_new";
	$productNew->post_type = "sanpham_detail";
}
$productEdit = new AuthorizedAction();
{
	$productEdit->id = 43;
	$productEdit->name = "Sản phẩm (EDIT)";
	$productEdit->code = "POST_EDIT";
	$productEdit->act = "post_edit";
	$productEdit->post_type = "sanpham_detail";
}
$productPublic = new AuthorizedAction();
{
	$productPublic->id = 44;
	$productPublic->name = "Sản phẩm (PUBLIC)";
	$productPublic->code = "POST_PUBLIC";
	$productPublic->act = "post_edit";
	$productPublic->post_type = "sanpham_detail";
}
$productAlbumList = new AuthorizedAction();
{
	$productAlbumList->id = 45;
	$productAlbumList->name = "Sản phẩm Album (LIST)";
	$productAlbumList->code = "ALBUM_MANA_LIST";
	$productAlbumList->act = "album_mana_list";
	$productAlbumList->post_type = "sanpham_detail";
}
$videoCatList = new AuthorizedAction();
{
	$videoCatList->id = 46;
	$videoCatList->name = "Chuyên mục video (LIST)";
	$videoCatList->code = "postcat_list";
	$videoCatList->act = "postcat_list";
	$videoCatList->post_type = "video";
}
$videoCatNew = new AuthorizedAction();
{
	$videoCatNew->id = 47;
	$videoCatNew->name = "Chuyên mục video (NEW)";
	$videoCatNew->code = "POSTCAT_NEW";
	$videoCatNew->act = "postcat_list";
	$videoCatNew->post_type = "video";
}

$videoCatEdit = new AuthorizedAction();
{
	$videoCatEdit->id = 48;
	$videoCatEdit->name = "Chuyên mục video (EDIT)";
	$videoCatEdit->code = "POSTCAT_EDIT";
	$videoCatEdit->act = "postcat_edit";
	$videoCatEdit->post_type = "video";
}
$videoCatDelete = new AuthorizedAction();
{
	$videoCatDelete->id = 49;
	$videoCatDelete->name = "Chuyên mục video (DELETE)";
	$videoCatDelete->code = "POSTCAT_DELETE";
	$videoCatDelete->act = "postcat_list";
	$videoCatDelete->post_type = "video";
}

$videoList = new AuthorizedAction();
{
	$videoList->id = 50;
	$videoList->name = "video (List)";
	$videoList->code = "POST_LIST";
	$videoList->act = "post_list";
	$videoList->post_type = "video_detail";
}
$videoNew = new AuthorizedAction();
{
	$videoNew->id = 51;
	$videoNew->name = "video (NEW)";
	$videoNew->code = "POST_NEW";
	$videoNew->act = "post_new";
	$videoNew->post_type = "video_detail";
}
$videoEdit = new AuthorizedAction();
{
	$videoEdit->id = 52;
	$videoEdit->name = "video (EDIT)";
	$videoEdit->code = "POST_EDIT";
	$videoEdit->act = "post_edit";
	$videoEdit->post_type = "video_detail";
}
$videoPublic = new AuthorizedAction();
{
	$videoPublic->id = 53;
	$videoPublic->name = "video (PUBLIC)";
	$videoPublic->code = "POST_PUBLIC";
	$videoPublic->act = "post_edit";
	$videoPublic->post_type = "video_detail";
}
$videoAlbumList = new AuthorizedAction();
{
	$videoAlbumList->id = 54;
	$videoAlbumList->name = "video Album (LIST)";
	$videoAlbumList->code = "ALBUM_MANA_LIST";
	$videoAlbumList->act = "album_mana_list";
	$videoAlbumList->post_type = "video_detail";
}
$donHangList = new AuthorizedAction();
{
	$donHangList->id = 55;
	$donHangList->name = "Đơn hàng (LIST)";
	$donHangList->code = "DONHANG_LIST";
	$donHangList->act = "donhang_list";
	$donHangList->post_type = "donhang_list";
}

$authorizedActions = array(
	$userGroups, $userGroupsNew, $userGroupsEdit,
	$memberList, $memberNew, $memberEdit, $memberDelete,
	$postcatList, $postcatNew, $postcatEdit, $postcatDelete,
	$postList, $postNew, $postEdit, $postPublic,
	$productCatList, $productCatNew, $productCatEdit, $productCatDelete,
	$productList, $productNew, $productEdit, $productPublic,
	$donHangList,
	$videoCatList, $videoCatNew, $videoCatEdit, $videoCatDelete,
	$videoList, $videoNew, $videoEdit, $videoPublic, $videoAlbumList,
	$postAlbumList,
	$productAlbumList,
	$pageList, $pageNew,
	$infoList, $infoEdit, // $infoNew, $infoDelete
	$mediaList,
	$galleryManager, $galleryManagerEdit, $galleryMenuNew, $galleryMenuEdit, $galleryMenuDelete,
	$albumList,
	$contacts, $contactsDelete,
	$menuControl,
	$setting,
	$theme,
	$permissionControl
);
?>
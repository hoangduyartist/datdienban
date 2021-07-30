<?php
include "functions/Common.php";

$slug = $_SERVER['REQUEST_URI'];
$query = "";
// Data request
$act = isset($_GET['act']) ? $_GET['act'] : '';
$tuNgay = isset($_GET['tuNgay']) ? $_GET['tuNgay'] : '';
$denNgay = isset($_GET['denNgay']) ? $_GET['denNgay'] : '';
$category = isset($_GET['category']) ? $_GET['category'] : null;
$noiDung = isset($_GET['noiDung']) ? $_GET['noiDung'] : null;
$displayFilter = isset($_GET['displayFilter']) ? $_GET['displayFilter'] : 0;
$highlightFilter = isset($_GET['highlightFilter']) ? $_GET['highlightFilter'] : null;
$isDelete = isset($_GET['isDelete']) ? $_GET['isDelete'] : null;
$submit = isset($_GET['submit']) ? $_GET['submit'] : '';

if ($submit) {
  $query = "hien_thi=".$displayFilter;
}
if ($highlightFilter) {
  $query .= " and noi_bat=".$highlightFilter;
}
if ($isDelete) {
  $query .= " and is_delete=".$isDelete;
}
// Date set value into form
$tuNgayValue = $tuNgay == "" ? date("m/d/Y", strtotime(date("m/d/Y")."-2 day")) : $tuNgay;
$denNgayValue = $denNgay == "" ? date("m/d/Y", strtotime(date("m/d/Y")."+2 day")) : $denNgay;
if ($tuNgay != "") {
  // Format and strtotime data
  $tuNgay = date_create($tuNgay." 00:00:00");
  $tuNgay = date_format($tuNgay,"m/d/Y H:i:s");
  $denNgay = date_create($denNgay." 24:59:59");
  $denNgay = date_format($denNgay,"m/d/Y H:i:s");
  $query .= " and time_edit BETWEEN ".strtotime($tuNgay)." AND ".strtotime($denNgay);
}
if ($category) {
  $query .= " and cat in (".implode(",", GetChild($category)).")";
}
if ($noiDung) {
  $keyword = 	trim($noiDung);
  $keyword = lg_string::bo_dau($keyword);
  $query .= " and (post_lang.ten_kd like '%$noiDung%' or post_lang.chu_thich_kd like '%$noiDung%' or post_lang.noi_dung_kd like '%$noiDung%')";
}

// Get request phân trang
$slug = explode("/", $slug);
$requestPhanTrang = '?act=post';
if ($query && $slug[2]) {
  $requestPhanTrang = $slug[2];
}
$splitRequest = explode("&", $requestPhanTrang);
$checkTextInString = strpos("P".$splitRequest[count($splitRequest)-1], "page=");
if ($checkTextInString == true) {
  $requestPhanTrang = str_replace("&".$splitRequest[count($splitRequest)-1], '', $requestPhanTrang);;
}

$page =	$page + 0;
$perpage = 5;
$r_all = $db->selectpost($query, "");
$sum = $db->num_rows($r_all);
$pages = ($sum-($sum%$perpage))/$perpage;
if ($sum % $perpage <> 0 ) $pages = $pages+1;
$page =	($page==0) ? 1 : (($page>$pages)?$pages:$page);
$min = abs($page-1) * $perpage;
$max = $perpage;
$count = $min;
$data = $db->selectpost($query, "order by post.thu_tu, post.id desc LIMIT ".$min.", ".$max);
?>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
    <li class="active">Bài viết</li>
  </ol>
</section>
<section class="content">
  <div class="box-common">
    <div class="paddinglr10">
      <!-- Bo loc du lieu -->
      <div class="filter-block">
        <form action="" method="GET" name="filter" autocomplete="off">
          <input type="hidden" name="act" value="post" />
          <div class="row row-flex">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="form-group form-group--date">
                <label class="control-label">Thời gian<i class="label-note">(Tháng / Ngày / Năm)</i></label>
                <div class="form-control--date">
                  <input type="text" class="form-control filter-datepicker" id="dateFrom" name="tuNgay"
                    value="<?php echo $tuNgayValue?>" placeholder="Tháng/ngày/năm">
                  <input type="text" class="form-control filter-datepicker" id="dateTo" name="denNgay"
                    value="<?php echo $denNgayValue?>" placeholder="Tháng/ngày/năm">
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Chuyên mục</label>
                <?php show_cat("category", $category)?>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group">
                <label class="control-label">Nội dung</label>
                <input type="text" name="noiDung" value="<?php echo $noiDung?>" placeholder="Nhập nội dung cần tìm"
                  class="form-control" />
              </div>
            </div>
          </div>
          <div class="row row-flex">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-group form-group-flex">
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="displayFilter" name="displayFilter" value="1"
                    <?php if($displayFilter == 1){ echo "checked"; }?> type="checkbox" id="displayFilter">
                  <label class="form-check-label" for="displayFilter">Hiển thị</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="highlightFilter" name="highlightFilter" value="1"
                    <?php if($highlightFilter == 1){ echo "checked"; }?> type="checkbox" id="highlightFilter">
                  <label class="form-check-label" for="highlightFilter">Nổi bật</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" id="isDelete" name="isDelete" value="1"
                    <?php if($isDelete == 1){ echo "checked"; }?> type="checkbox" id="isDelete">
                  <label class="form-check-label" for="isDelete">Đã xóa</label>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="form-action--nomal">
                <div class="btn-common">
                  <button type="submit" name="submit" value="filterAction" class="btn btn-primary">Tìm kiếm</button>
                </div>
                <div class="btn-common">
                  <button type="button" name="reset" value="reset" class="btn btn-default">Làm mới</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- Danh sach du lieu -->
      <div class="table-responsive pb25">
        <table class="table table-striped data-table data-table-middle">
          <thead>
            <tr>
              <th>#</th>
              <th>Name</th>
              <th>Summary</th>
              <th class="center">Display</th>
              <th class="center">Highlight</th>
              <th>Date</th>
              <th>Control</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $urlEdit = "";
            if($db->num_rows($data) != 0)
            {
            while ($item = $db->fetch($data))
            {
              $dataLang = $db->select("post_lang", "post_id='".$item["id"]."'", "");
              $itemLang = $db->fetch($dataLang);
              $urlEdit = "?act=post_edit&id=".$item["id"]."&post_type=".$item["post_type"];
              $count++;
            ?>
            <tr>
              <td><?php echo $count?></td>
              <td>
                <a class="name" href="<?php echo $urlEdit?>"><?php echo $itemLang["ten"]?></a>
              </td>
              <td>
                <span class="summary"><?php echo lg_string::crop($itemLang["chu_thich"], 40)?></span>
              </td>
              <td class="center">
                <label class="checkbox-group">
                  <input type="checkbox" name="display" <?php echo $item["hien_thi"] == 1 ? "checked":""?> data-value="post,<?php echo $item["id"]?>">
                  <span class="checkmark"></span>
                </label>
              </td>
              <td class="center">
                <label class="checkbox-group">
                  <input type="checkbox" name="highlight" <?php echo $item["noi_bat"] == 1 ? "checked":""?> data-value="post,<?php echo $item["id"]?>">
                  <span class="checkmark"></span>
                </label>
              </td>
              <td><?php echo lg_date::vn_time($item["time_edit"])?></td>
              <td>
                <div class="block-action">
                  <span class="action-three-dots icon-more"></span>
                  <ul>
                    <li><a href="<?php echo $urlEdit?>"><i class="icon icon-edit"></i><span>Edit</span></a></li>
                  </ul>
                </div>
              </td>
            </tr>
            <?php }} else {?>
            <tr>
              <td colspan="7">Không có nội dung</td>
            </tr>
            <?php }?>
          </tbody>
          <?php if ($pages > 1) {?>
          <tfoot>
            <tr>
              <td colspan="7">
                <ul class="pagination-list">
                  <?php
              for($i=1; $i<=$pages; $i++) {
                if ($i==$page) { 
                  echo "<li><span>".$i."</span></li>";
                } else {
                  echo "<li><a href='".$requestPhanTrang."&page=$i'>$i</a></li>";
                }
              }
              ?>
                </ul>
              </td>
            </tr>
          </tfoot>
          <?php }?>
        </table>
      </div>
    </div>
  </div>
</section>
<?php
// Get danh sach chuyen muc
function show_cat($name, $category)
{
global $db;
?>
<select class="form-control" name="<?php echo $name?>">
  <option value="0">Chọn chuyên mục</option>
  <?php
  foreach (GetCategoryTheme() as $key => $value) {
    ?>
  <option value="<?php echo $value->id?>" <?php if($value->id == $category) {echo "selected";}?>>
    <?php echo $value->name?></option>
  <?php }?>
</select>
<?php }?>

<!-- javascript -->
<script>
$(function() {
  // Ham set datepicker ranger
  var dateFormat = "mm/dd/yy",
    dateFrom = $("#dateFrom")
    .datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1,
      showButtonPanel: true,
      currentText: "Today"
    })
    .on("change", function() {
      dateTo.datepicker("option", "minDate", getDate(this));
    }),
    dateTo = $("#dateTo").datepicker({
      defaultDate: "+1w",
      changeMonth: true,
      numberOfMonths: 1
    })
    .on("change", function() {
      dateFrom.datepicker("option", "maxDate", getDate(this));
    });

  function getDate(element) {
    var date;
    try {
      date = $.datepicker.parseDate(dateFormat, element.value);
    } catch (error) {
      date = null;
    }

    return date;
  }

  // Reload page
  $("button[name='reset']").on("click", function(e) {
    e.preventDefault()
    window.location.replace("/admin/?act=post")
  })

  // Goi Ajax display
  // <input type="checkbox" name="display" data-value="post,[id]">
  $("input[name='display']").on("change", function(e) {
    var data = $(this).data("value")
    data = data.split(',')
    handleCheckBox(data[0], 'hien_thi', data[1], e.currentTarget.checked)
  })

  // Goi Ajax highlight
  // <input type="checkbox" name="highlight" data-value="post,[id]">
  $("input[name='highlight']").on("change", function(e) {
    var data = $(this).data("value")
    data = data.split(',')
    handleCheckBox(data[0], 'noi_bat', data[1], e.currentTarget.checked)
  })
});
</script>
<?php
(isset($_GET["type"])) ? $type = $_GET["type"] : $type = "";
$func = isset($_POST['func']) ? $_POST['func'] : '';
$date = isset($_GET['date']) ? $_GET['date'] : '';
$date2 = isset($_GET['date2']) ? $_GET['date2'] : '';
$keyw = '';

$slugget = $_SERVER['REQUEST_URI'];
$slugget = str_replace("/admin/?act=contacts", "", $slugget);
$slugget = str_replace("&page=" . $page, "", $slugget);

if ($date != '' && $date2 == '') {
    $keyw .= " and time >= " . strtotime($date);
}
if ($date == '' && $date2 != '') {
    $keyw .= " and time <= " . strtotime($date2 . ' 00:00:00');
}
if ($date != '' && $date2 != '') {
    $keyw .= " and time >= " . strtotime($date) . " && time <= " . strtotime($date2 . ' 00:00:00');
}
if ($date == '' && $date2 == '') {
    $keyw .= "";
}
?>
<section class="content-header">
    <ol class="breadcrumb">
        <li><a href="?act=home"><i class="fa fa-dashboard"></i>AdminCP</a></li>
        <li class="active">Liên hệ</li>
    </ol>
</section>
<section class="content">
    <ul class="list-sub">
        <?php
        $query = $db->query("SELECT DISTINCT type,type_name FROM vn_contacts");
        while ($rQuery = $db->fetch($query)) {
            $count = get_sql("select count(*) from vn_contacts where type_name='" . $rQuery["type_name"] . "' and view=0")
        ?>
            <li>
                <a href="?act=contacts&type=<?php echo $rQuery["type"] ?>" class="<?php echo activeTab($rQuery["type"], $type) ?>"><?php echo $rQuery["type_name"] ?><i class="fa fa-bell-o" aria-hidden="true"></i></a>
                <?php if ($count != "" && $count != 0) { ?>
                    <span class="list-sub-bell"><?php echo $count ?></span>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
    <div class="pond-wrapper">
        <div class="table-responsive">
            <style type="text/css">
                .item {
                    width: 15%;
                    float: left;
                    margin-bottom: 5px;
                    margin-right: 1%
                }

                .item label {
                    display: block;
                    font-weight: bold;
                }

                .search_smart div.button {
                    margin-top: 25px;
                    display: inline-block;
                }

                input[type=date] {
                    line-height: 18px;
                }
            </style>
            <form style="margin: 10px;" action="?act=contacts<?php echo $slugget ?>" method="get" class="search_smart" enctype="multipart/form-data">
                <input type="hidden" name="act" value="contacts" />
                <input type="hidden" name="type" value="<?php echo $type ?>" />
                <div class="item">
                    <label class="control-label">Từ ngày</label>
                    <input id="date" type="date" name="date" class="form-control" value="<?php echo $date ?>" />
                </div>
                <div class="item">
                    <label class="control-label">Đến ngày</label>
                    <input id="date2" type="date" placeholder="" class="form-control" name="date2" value="<?php echo $date2 ?>" />
                </div>
                <div class="button">
                    <button type="submit" class="btn btn-success">Lọc dử liệu</button>
                    <a href="?act=contacts<?php echo $slugget ?>" type="button" class="btn btn-default" style="margin-left: 4px;">Reset</a>
                </div>
                <div class="clear"></div>
            </form>
            <form action="?act=action/contactsAction&type=<?php echo $type ?>" method="post" onsubmit="return confirm('Bạn có muốn xóa ?');">
                <input type="hidden" name="func" value="del" />
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Họ và Tên</th>
                            <th>Email</th>
                            <th>Điện thoại</th>
                            <th>Thời gian</th>
                            <th>-</th>
                            <th>
                                <?php if (conditionPermission($post_type, 'CONTACTS_DELETE', 'code')) { ?>
                                    <span>
                                        <input class="checkAll" type="checkbox" style="vertical-align:text-bottom;margin-right: 5px">Xóa
                                    </span>
                                <?php } ?>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $q = $db->select("vn_contacts", "type='" . $type . "' " . $keyw, "order by id desc");
                        while ($r = $db->fetch($q)) {
                        ?>
                            <tr style="background-color:<? if ($r['view'] == 1) {
                                                            echo 'rgba(243,243,243,.85)';
                                                        } ?>">
                                <td><?php echo $r["name"] ?></td>
                                <td><?php echo $r["email"] ?></td>
                                <td><?php echo $r["phone"] ?></td>
                                <td><?php echo lg_date::vn_time($r["time"]) ?></td>
                                <td><a onclick="setview('vn_contacts',<?php echo $r['id'] ?>)" href="?act=contactsView&type=<?php echo $type ?>&id=<?php echo $r["id"] ?>">Xem chi tiết</a></td>
                                <td>
                                    <?php if (conditionPermission($post_type, 'CONTACTS_DELETE', 'code')) { ?>
                                        <input name="tik[]" class="checkItem" type="checkbox" value="<?php echo $r["id"] ?>" />
                                    <?php } ?>
                                </td>
                            </tr>
                        <?
                        }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">
                                <!-- <a target="_blank" href="<?php echo $domain . '/' . admin_url . '/ajax/export-ts.php' . str_replace("/admin/?act=" . $act . '&', "?", $_SERVER['REQUEST_URI']); ?>" type="button" class="btn btn-primary" style="margin-left: 4px;">Xuất file Excel</a> -->
                            </td>
                            <td>
                                <?php if (conditionPermission($post_type, 'CONTACTS_DELETE', 'code')) { ?>
                                    <input type="submit" value="Xóa" class="btn btn-success" />
                                <?php } ?>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
</section>
<?php
function activeTab($typeTab, $type = "")
{
    $active = "";
    if ($type != "") {
        if ($typeTab == $type) {
            $active = "active";
        }
    }

    return $active;
}
?>
<script type="text/javascript">
    $(function() {
        $(".checkAll").click(function() {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });
    })
</script>
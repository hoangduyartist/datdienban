<?php
include "functions/Common.php";
$lang_code = GetLanguagesActive()["code"];
class themeType
{
  public $themeKey;
  public $name;
  private $images = array();
  public function setImages($images)
  {
    // $obj->setImages($value);
    $this->images = $images;
  }
  public function getImages($obj)
  {
    // $obj->getImages($value)
    return $obj->images;
  }
}
class themeImages
{
  public $name;
  public $urlImages;
}
$theme1 = new themeType(); {
  $theme1->themeKey = "theme_1";
  $theme1->name = "Giao diện 1";
}
$theme2 = new themeType(); {
  $theme2->themeKey = "theme_2";
  $theme2->name = "Giao diện 2";
}
$theme3 = new themeType(); {
  $theme3->themeKey = "theme_3";
  $theme3->name = "Giao diện 3";
}
$theme4 = new themeType(); {
  $theme4->themeKey = "theme_4";
  $theme4->name = "Giao diện 4";
}

$images1 = new themeImages(); {
  $images1->name = "Hình giao diện 1";
  $images1->urlImages = "theme_1.jpg";
}
$images2 = new themeImages(); {
  $images2->name = "Hình giao diện 2";
  $images2->urlImages = "theme_2.jpg";
}
$images3 = new themeImages(); {
  $images3->name = "Hình giao diện 3";
  $images3->urlImages = "theme_3.jpg";
}
$images4 = new themeImages(); {
  $images4->name = "Hình giao diện 4";
  $images4->urlImages = "theme_4.png";
}

$theme1->setImages(array($images1));
$theme2->setImages(array($images2));
$theme3->setImages(array($images3));
$theme4->setImages(array($images4));

$themeType = array($theme1, $theme2, $theme3);
?>
<section class="content-header">
  <ol class="breadcrumb">
    <li><a href="?act=home"><i class="fa fa-dashboard"></i> AdminCP</a></li>
    <li class="active">Giao diện</li>
  </ol>
</section>

<section class="content">
  <div class="box-common box-danger">
    <div class="paddinglr10">
      <div class="row-flex">
        <div class="col col-left theme-sum-left">
          <ul id="sortable-0" data-box="" class="connectedSortable-default connectedSortable">
            <?php
            foreach (GetCategoryTheme() as $key => $value) {
            ?>
              <li id="<?php echo $value->id ?>"><?php echo $value->name ?></li>
            <?php } ?>
          </ul>
        </div>
        <div class="col col-right theme-sum-right">
          <?php
          foreach ($themeType as $key => $value) {
          ?>
            <div class="theme-close-block">
              <span class="theme-close" data-togle="<?php echo $value->themeKey ?>"><?php echo $value->name ?></i></span>
            </div>
            <div class="theme-frame" data-togle="<?php echo $value->themeKey ?>">
              <ul id="sortable-<?php echo $value->themeKey ?>" data-box="<?php echo $value->themeKey ?>" class="theme-frame-sortable connectedSortable">
                <?php
                $q = $db->selectpostcat("hien_thi=1 and theme_keys='" . $value->themeKey . "' and lang_id='" . $lang_code . "' ", "order by thu_tu asc");
                while ($r = $db->fetch($q)) {
                ?>
                  <li id="<?php echo $r["postcat_id"] ?>">- <?php echo $r["name"] ?></li>
                <?php } ?>
                <!-- <?php
                      foreach (GetCategoryThemeActive(0, $value->themeKey) as $key => $valueActive) {
                      ?>
              <li id="<?php echo $valueActive->id ?>"><?php echo $valueActive->name ?></li>
              <?php } ?> -->
              </ul>
              <div class="about-theme">
                <?php
                foreach ($value->getImages($value) as $key2 => $value2) {
                ?>
                  <div class="list">
                    <!-- <h4 class="title-imge-theme"><i class="fa fa-star" aria-hidden="true"></i><?php echo $value2->name ?></h4> -->
                    <a class="fancybox" rel="<?php echo $value->themeKey ?>" href="<?php echo $domain ?>/admin/images/theme/<?php echo $value2->urlImages ?>"><img class="img-responsive" src="<?php echo $domain ?>/admin/images/theme/<?php echo $value2->urlImages ?>" alt="<?php echo $value2->name ?>"></a>
                  </div>
                <?php } ?>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<?php
$sortableId = "";
$sortableItem = "";
foreach ($themeType as $key => $value) {
  $sortableId .= ", #sortable-" . $value->themeKey;
  $sortableItem .= ", #sortable-" . $value->themeKey . " li";
}
// echo $sortableId;
?>
<script>
  $(function() {
    $('#sortable-0 <?php echo $sortableId ?>').sortable({
      placeholder: "theme-ui-state-highlight",
      connectWith: ".connectedSortable"
    }).disableSelection()
    $('#sortable-0 <?php echo $sortableId ?>').droppable({
      drop: Drop
    })

    function Drop(event, ui) {
      var dragItemId = ui.draggable.attr("id");
      var dragBoxId = $(this).data('box');
      var formData = {
        dragItemId: dragItemId,
        dragBoxId: dragBoxId
      };
      $.ajax({
        type: "POST",
        url: "/admin/ajax/theme_api.php",
        data: formData,
        dataType: "json",
        success: function(response) {
          $('.connectedSortable[data-box=' + dragBoxId + ']').addClass("success");
          $('.connectedSortable li[id=' + dragItemId + ']').addClass("success");
        }
      }).done(function() {
        setTimeout(function() {
          $('.connectedSortable[data-box=' + dragBoxId + ']').removeClass("success");
          $('.connectedSortable li[id=' + dragItemId + ']').removeClass("success");
        }, 1000);
      })
    }
    var themeSumRight = $('.theme-sum-right').height() - 40
    $('.connectedSortable-default').attr('style', 'height:' + themeSumRight + 'px')
    $('.theme-close').on('click', function() {
      var id = $(this).data('togle')
      $('.theme-frame[data-togle=' + id + ']').toggle();
      // $(this).html($(this).html() == 'Hiện' ? 'Ẩn' : 'Hiện');
    })
  });
</script>
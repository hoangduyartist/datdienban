<?php
include 'app/constants/variables.php';
?>
<div class="form-chitiet-sanpham">
  <form action="" name="contact">
    <input type="hidden" name="type" value='<?php echo HUONGDANMUAHANG::TYPE ?>'>
    <input type="hidden" name="typeName" value='<?php echo HUONGDANMUAHANG::TYPENAME ?>'>
    <input type="hidden" name="actualLink" value='<?php echo $actualLink ?>'>
    <div class="form-box">
      <label class="request"><?php echo $translate_form["Họ tên"][$lang_code] ?></label>
      <input name="name" type="text" placeholder="<?php echo $translate_form["Họ tên"][$lang_code] ?>">
    </div>
    <div class="form-box">
      <label class="request"><?php echo $translate_form["Email"][$lang_code] ?></label>
      <input name="email" type="text" placeholder="<?php echo $translate_form["Email"][$lang_code] ?>">
    </div>
    <div class="form-box">
      <label><?php echo $translate_form["Số điện thoại"][$lang_code] ?></label>
      <input type="text" name="phone" placeholder="<?php echo $translate_form["Số điện thoại"][$lang_code] ?>">
    </div>
    <div class="form-box">
      <label class="request"><?php echo $translate_form["Nội dung"][$lang_code] ?></label>
      <textarea rows="5" name="content" placeholder="<?php echo $translate_form["Nội dung"][$lang_code] ?>"></textarea>
    </div>
    <div class="form-box mb20">
      <button type="button" class="send-contact" id="send-contact"><?php echo $translate_form["Gửi"][$lang_code] ?></button>
      <div class="send-contact--thong-bao">
        <span class="success"><?php echo $translate_form["Gửi thư thành công"][$lang_code] ?>!</span>
        <span class="error">Error!</span>
      </div>
    </div>
  </form>
</div>
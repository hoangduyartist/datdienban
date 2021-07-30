$(document).ready(function() {
  $('#send-contact').on('click', function(e) {
    e.preventDefault()
    var data = $('form[name="contact"]').serializeArray()
    var isCheck = true
    data.map(function(item) {
      switch (true) {
        case (item.name === 'name' && !item.value):
          $('input[name="' + item.name + '"]').addClass('error')
          isCheck = false
          break
        case (item.name === 'email' && !validateEmail(item.value)):
          $('input[name="' + item.name + '"]').addClass('error')
          isCheck = false
          break
        case (item.name === 'phone' && !validatePhone(item.value)):
          $('input[name="' + item.name + '"]').addClass('error')
          isCheck = false
          break
        case (item.name === 'content' && !item.value):
          $('textarea[name="' + item.name + '"]').addClass('error')
          isCheck = false
          break
        default:
          break
      }
    })
    if (isCheck) {
      $('form[name="contact"] input').addClass('success')
      $('form[name="contact"] textarea').addClass('success')
      $('form[name="contact"] button').addClass('loading')
      $('form[name="contact"] button').attr('disabled', true)
      $.when(ajaxAll('POST', '../../ajax/contactForm.php', data)).done(function(result) {
        if (result && result.status) {
          $('.send-contact--thong-bao').addClass('success');
          setTimeout(function() {
            $('form[name="contact"]').get(0).reset()
            $('form[name="contact"] button').removeClass('loading')
            $('form[name="contact"] button').attr('disabled', false)
            $('.send-contact--thong-bao').removeClass('error success');
          }, 2000)
        }
      })
    }
    setTimeout(function() {
      $('form[name="contact"] input').removeClass('error success')
      $('form[name="contact"] textarea').removeClass('error success')
    }, 2000)
  })

  $('#onScroll').on('click', function(e) {
      var href = this.getAttribute('href')
      $('html, body').animate({ scrollTop: $(href).offset().top }, 'slow')
      e.preventDefault()
    })
    /**
     * Ajax common function
     * @param {string} typeValue POST | GET | PUST
     * @param {string} urlValue url api file
     * @param {object} dataValue form value
     * @returns response success
     */
  function ajaxAll(typeValue, urlValue, dataValue) {
    return $.ajax({
      type: typeValue,
      url: urlValue,
      data: dataValue,
      dataType: 'json'
    })
  }
  // Đăng ký nhận thông tin
  $('#dangKyThongTin').on('click', function(e) {
    e.preventDefault()
    var data = $('form[name="dangKyThongTin"]').serializeArray()
    var isCheck = true
    data.map(function(item) {
      switch (true) {
        case (item.name === 'email' && !validateEmail(item.value)):
          $('input[name="' + item.name + '"]').addClass('error')
          isCheck = false
          break
        default:
          break
      }
    })
    if (isCheck) {
      $('form[name="dangKyThongTin"] input').addClass('success')
      $('form[name="dangKyThongTin"] button').addClass('loading')
      $('form[name="dangKyThongTin"] button').attr('disabled', true)
      $.when(ajaxAll('POST', '../../ajax/gui-dang-ky-nhan-email.php', data)).done(function(result) {
        if (result && result.status) {
          setTimeout(function() {
            $('form[name="dangKyThongTin"]').get(0).reset()
            $('form[name="dangKyThongTin"] button').removeClass('loading')
            $('form[name="dangKyThongTin"] button').attr('disabled', false)
            $('form[name="dangKyThongTin"] input').removeClass('error success')
            notification("SUCCESS", "Thành công!")
          }, 2000)
        }
      })
    } else {
      setTimeout(function() {
        $('form[name="dangKyThongTin"] input').removeClass('error success')
      }, 1000);
    }
  })
})

function checkSubmitTS() {
  var data = $('form[name="tuyen_sinh"]').serializeArray()
  var isCheck
  data.map(function(item) {
    switch (true) {
      case (item.name === 'ho_t' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'so_dt' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'ngay_s' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'so_cmnd' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'truong_thpt' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'dia_c' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'tinh_tp' && !item.value):
        $('select[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'nam_tn' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'nganh_dk' && !item.value):
        $('select[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      case (item.name === 'email' && !item.value):
        $('input[name="' + item.name + '"]').addClass('error')
        isCheck = false
        break
      default:
    }
  })
  if (isCheck) {
    $('form[name="tuyen_sinh"] input').addClass('success')
    $('form[name="tuyen_sinh"] button').addClass('loading')
    $('form[name="tuyen_sinh"] button').attr('disabled', true)
  }
  setTimeout(function() {
    $('form[name="tuyen_sinh"] input').removeClass('error success')
    $('form[name="tuyen_sinh"] select').removeClass('error success')
  }, 1000)
  return isCheck
}

// kiểm tra email
function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

// check phone in javascript
function validatePhone(phone) {
  var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
  return re.test(String(phone).toLowerCase());
}

// Alert thông báo
function notification(type, value) {
  var className = 'success'
  if (type == 'ERROR') {
    className = 'error'
  }
  var html = '<div class="alert-thongbao ' + className + '">'
  html += value
  html += '</div>'
  $('body').append(html)
  setTimeout(function() {
    $('.alert-thongbao').remove()
  }, 1000)
}
var urlCartTemplate = "/cart";
var homeMenuUl = $('.home-right-menu')[0].childNodes
var cartTotal = $(".cart-total").html()
if (homeMenuUl && homeMenuUl.length != 0) {
  homeMenuUl.forEach(function(e) {
    if (cartTotal == 0) {
      menuItemCart = "<span>0</span>"
    } else {
      menuItemCart = cartTotal
    }

    var htmlBag = '<div class="menu-soluong-giohang">(<span id="totalAmount">' + menuItemCart + '</span>)</div>'
    if (e && e.innerText == "BAG") {
      e.insertAdjacentHTML('beforeend', htmlBag)
    }
  })
}


// ẩn số lượng giỏ hàng
var tongCart = $("#totalAmount").html();
if (tongCart == 0) { $("#totalAmount").hide() }


function addToCartInList(itemId, langCode) {
  $.ajax({
    type: 'POST',
    url: urlCartTemplate + '/AddCart.php',
    data: { id: itemId, soLuong: 1, langCode: langCode },
    success: function(qq) {
      if (qq.length) {
        var kq = qq.split('$$$$');
        $("#totalAmount").show();
        $("#totalAmount").html(kq[0]);
        // $('#showdonhang').show(0).delay(400).hide(200);
      }
    }
  });
}

function addToCartDetail(itemId, langCode) {
  var data = $('form[name="formOrderDetail"]').serializeArray()
  var color = undefined;
  var size = undefined;
  data.map(function(item) {
    switch (true) {
      case (item.name === 'txtSize'):
        size = item.value;
        break
      case (item.name === 'txtColor'):
        color = item.value;
        break
      default:
        break
    }
  })
  $.ajax({
    type: 'POST',
    url: urlCartTemplate + '/AddCart.php',
    data: { id: itemId, soLuong: 1, langCode: langCode, size: size, color: color },
    success: function(qq) {
      if (qq.length) {
        var kq = qq.split('$$$$');
        $("#totalAmount").show();
        $("#totalAmount").html(kq[0]);
      }
    }
  });
}

function getprice(gia, id) {
  var tongdau = document.getElementById('tong' + id).value;
  var so_luong = document.getElementById('quatity' + id).value;
  var tongall = document.getElementById('tongfix').value;
  for (var i = 0; i < tongdau.length; i++)
    tongdau = tongdau.replace('.', '');
  for (var i = 0; i < tongdau.length; i++)
    tongall = tongall.replace('.', '');
  tongdau = parseInt(tongdau);
  tongall = parseInt(tongall);
  if (so_luong == '') {
    so_luong = 1;
  } else if (so_luong == 0) {
    so_luong = 1;
  }
  var so_luong_new = parseInt(so_luong);
  var totalnew = parseInt(gia * so_luong_new);
  var totalnewnew = totalnew;
  document.getElementById('tong' + id).value = totalnewnew.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  var tongfix = parseInt(totalnew - tongdau);
  var tongshow = parseInt(tongall + tongfix);
  var tongshownew = tongshow;
  document.getElementById('tongfix').value = tongshownew.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
  $.ajax({
    type: "GET",
    url: urlCartTemplate + "/UpdateCart.php",
    data: { id: id, so_luong: so_luong }
  });
}

function deletecart(id) {
  $.ajax({
    type: "GET",
    url: urlCartTemplate + "/DeleteCart.php",
    data: { id: id },
    success: function() {
      $('.cartdel' + id).text('Success!');
      $('.cartlist' + id).fadeOut("normal", function() {
        $(this).remove();
      });
      location.reload();
    }
  });
}

// Nếu không có số lượng sản phẩm trong giỏ thì k cho vô giỏ hàng
$("#cart-icon").on("click", function(e) {
  var soLuongTrongGio = $("#totalAmount").html();
  if (soLuongTrongGio == "0") {
    e.preventDefault();
  }
})

$("input[name$='payment']").change(function() {
  var test = $(this).val();
  $("div.active_bank").hide();
  $("#payment_bank" + test).show();
})
var i = 0;

function incNumber() {
  if (i < 2000) {
    i++;
  } else if (i = 2000) {
    i = 0;
  }
  document.getElementById('inc').value = i;
}

function decNumber() {
  if (i > 0) {
    --i;
  } else if (i = 0) {
    i = 2000;
  }
  document.getElementById('inc').value = i;
}

function FormatNumber(str) {
  var strTemp = GetNumber(str);
  if (strTemp.length <= 200)
    return strTemp;
  strResult = "";
  for (var i = 0; i < strTemp.length; i++)
    strTemp = strTemp.replace(",", "");
  strTemp = strTemp.replace(".", "");
  for (var i = strTemp.length; i >= 0; i--) {
    if (strResult.length > 0 && (strTemp.length - i - 1) % 3 == 0)
      strResult = "," + strResult;
    strResult = strTemp.substring(i, i + 1) + strResult;
  }
  return strResult;
}

function GetNumber(str) {
  for (var i = 0; i < str.length; i++) {
    var temp = str.substring(i, i + 1);
    if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
      alert("Chỉ được nhập vào là số");
      return str.substring(0, i);
    }
    if (temp == " ")
      return str.substring(0, i);
  }
  return str;
}

function IsNumberInt(str) {
  for (var i = 0; i < str.length; i++) {
    var temp = str.substring(i, i + 1);
    if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
      alert("Chỉ được nhập vào là số");
      return str.substring(0, i);
    }
    if (temp == " " || temp == "," || temp == ".")
      return str.substring(0, i);
  }
  return str;
}

function IsNumberFloat(str) {
  for (var i = 0; i < str.length; i++) {
    var temp = str.substring(i, i + 1);
    if (!(temp == "," || temp == "." || (temp >= 0 && temp <= 9))) {
      alert("Chỉ được nhập vào là số");
      return str.substring(0, i);
    }
    if (temp == " " || temp == ",")
      return str.substring(0, i);
  }
  return str;
}
/*!
* jquery.countup.js 1.0.3
*
* Copyright 2016, Adrián Guerra Marrero http://agmstudio.io @AGMStudio_io
* Released under the MIT License
*
* Date: Oct 27, 2016
*/
(function( $ ){
  "use strict";

  $.fn.countUp = function( options ) {

    // Defaults
    var settings = $.extend({
        'time': 2000,
        'delay': 10
    }, options);

    return this.each(function(){

        // Store the object
        var $this = $(this);
        var $settings = settings;

        var counterUpper = function() {
            if(!$this.data('counterupTo')) {
                $this.data('counterupTo',$this.text());
            }
            var time = parseInt($this.data("counter-time")) > 0 ? parseInt($this.data("counter-time")) : $settings.time;
            var delay = parseInt($this.data("counter-delay")) > 0 ? parseInt($this.data("counter-delay")) : $settings.delay;
            var divisions = time / delay;
            var num = $this.data('counterupTo');
            var nums = [num];
            var isComma = /[0-9]+,[0-9]+/.test(num);
            num = num.replace(/,/g, '');
            var isInt = /^[0-9]+$/.test(num);
            var isFloat = /^[0-9]+\.[0-9]+$/.test(num);
            var decimalPlaces = isFloat ? (num.split('.')[1] || []).length : 0;

            // Generate list of incremental numbers to display
            for (var i = divisions; i >= 1; i--) {

                // Preserve as int if input was int
                var newNum = parseInt(Math.round(num / divisions * i));

                // Preserve float if input was float
                if (isFloat) {
                    newNum = parseFloat(num / divisions * i).toFixed(decimalPlaces);
                }

                // Preserve commas if input had commas
                if (isComma) {
                    while (/(\d+)(\d{3})/.test(newNum.toString())) {
                        newNum = newNum.toString().replace(/(\d+)(\d{3})/, '$1'+','+'$2');
                    }
                }

                nums.unshift(newNum);
            }

            $this.data('counterup-nums', nums);
            $this.text('0');

            // Updates the number until we're done
            var f = function() {
                if (!$this.data('counterup-nums')) {
                    return;
                }
                $this.text($this.data('counterup-nums').shift());
                if ($this.data('counterup-nums').length) {
                    setTimeout($this.data('counterup-func'),delay);
                } else {
                    delete $this.data('counterup-nums');
                    $this.data('counterup-nums', null);
                    $this.data('counterup-func', null);
                }
            };
            $this.data('counterup-func', f);

            // Start the count up
            setTimeout($this.data('counterup-func'),delay);
        };

        // Perform counts when the element gets into view
        $this.waypoint(counterUpper, { offset: '100%', triggerOnce: true });
    });

  };

})( jQuery );

$(document).ready(function() {
  if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href)
  }
  $('.header-slider').slick({
    autoplay: true,
    autoplaySpeed: 4000,
    dots: true,
    fade: true,
    touchMove: true,
    pauseOnHover: false,
    infinite: true
  })
  $('.header-slider').on('init', function() {
    // $('.header-slider .slick-active').addClass('animated zoomInImage')
    var $firstAnimatingElements = $('.heroslide:first-child').find('[data-animation]')
    doAnimations($firstAnimatingElements)
  })
  $('.header-slider').on('beforeChange', function(e, slick, currentSlide, nextSlide) {
    // $('.header-slider .slick-active').removeClass('animated zoomInImage')
    $('.slick-slide').css('display', 'block')
    var $animatingElements = $('.heroslide[data-slick-index="' + nextSlide + '"]').find('[data-animation]')
    doAnimations($animatingElements)
  })
  $('.header-slider').on('afterChange', function() {
    // $('.header-slider .slick-active').addClass('animated zoomInImage')
  })

  $('.chat_fb').click(function() {
    $('.fchat').slideToggle()
  })

  $('#img-gallery').lightGallery({
    thumbnail: true
  })
  $('.album-baiviet').lightGallery({
    selector: '.album-baiviet-hinh-anh',
    thumbnail: true
  })
  $('.album-chitiet-sanpham').lightGallery({
    selector: '.album-chitiet-sanpham-item',
    thumbnail: true,
    showThumbByDefault: true
  })
  $('.collection-light').lightGallery({
    selector: '.collection-light-item',
    thumbnail: true,
    showThumbByDefault: true
  })

  $('.slice-category-sanpham').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    fade: true,
    touchMove: true
  })

  $('.module-slice-album').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    fade: true,
    touchMove: true
  })

  $('.slider-for').slick({ slidesToShow: 1, slidesToScroll: 1, arrows: true, fade: true, asNavFor: '.slider-nav' })
  $('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    arrows: false,
    centerMode: false,
    focusOnSelect: true,
    vertical: true,
    responsive: [{
      breakpoint: 500,
      settings: {
        vertical: false
      }
    }]
  })

  $('.menu-display').on('click', function() {
    $('.nav-main').addClass('active')
    $('.translucent-layer').addClass('active')
  })
  $('.translucent-layer').on('click', function() {
    anMenu()
  })
  $('.nav-close').on('click', function() {
    anMenu()
  })

  function anMenu() {
    $('.translucent-layer').removeClass('active')
    $('.nav-main').removeClass('active')
  }
  $('.nav-main ul > li.child-menu a i').on('click', function(e) {
      e.preventDefault()
      var id = $(this).data('id')
      if (id) {
        var ul = $('.nav-main ul > li[data-id="' + id + '"] > ul.child-menu-ul')
        if (ul.hasClass('active')) {
          $('.nav-main ul > li[data-id="' + id + '"] > ul.child-menu-ul').removeClass('active')
          $('.nav-main ul > li[data-id="' + id + '"].child-menu').removeClass('active')
        } else {
          $('.nav-main ul > li[data-id="' + id + '"] > ul.child-menu-ul').addClass('active')
          $('.nav-main ul > li[data-id="' + id + '"].child-menu').addClass('active')
        }
      }
    })
    // animations text banner
  function doAnimations(elements) {
    var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend'
    elements.each(function() {
      var $this = $(this)
      var $animationDelay = $this.data('delay')
      var $animationType = 'animated ' + $this.data('animation')
      $this.css({
        'animation-delay': $animationDelay,
        '-webkit-animation-delay': $animationDelay
      })
      $this.addClass($animationType).one(animationEndEvents, function() {
        $this.removeClass($animationType)
      })
    })
  }

  // Tinh chieu rong
  var widthDocurment = $(document).width()
    // scroll
  window.onscroll = function() {
    if (widthDocurment > 991) {
      // Menu chinh
      if ($(this).scrollTop() >= 98) {
        $('#header-wrapper').addClass('background')
          // $('#menu-fixed').removeClass('header-menu');
          // $('#menu-fixed').addClass('menu-fixed')
      } else {
        $('#header-wrapper').removeClass('background')
          // $('#menu-fixed').addClass('header-menu');
          // $('#menu-fixed').removeClass('menu-fixed')
      }
    }
  }

  $('.scrollup').on('click', function(event) {
    event.preventDefault();
    $('body,html').animate({
      scrollTop: 0,
    }, 700);
  });

  $('.language-handle').on('click', function(e) {
    e.preventDefault();
    $('.lang-show').toggleClass('show');
  })

  // $('.counter').countUp({
  //   'time': 2000,
  //   'delay': 10
  // })

  $('.zoom').zoom({
    on: 'mouseover',
    target: false
  });

  // bản đồ leaflet
  var locations = [
    ["<b>My office</b><br/><img src='https://lh5.googleusercontent.com/proxy/9PyXpugpnXfjEbUYmCtI329NZHLUvTujstPhX-otLRDlBzIRDJVEat6GluHxjSb1BYlHw2Q4a5xu4iggDfP1O15u_btoACqSNZbqY8wO0zfzdIqlItYbpStdPNw8F0B7k418byJklEhLJ_e61dLNdGv1AtrXNKVTrvpXE73EjLTPwbt-Ofsxwvw8tNHUcBAXvYzcj3qzPRa3bOFhBQXhcESGI9NI7p6Er-6vBkvTnlccYtVfuw=s0-d' alt='maptime logo gif' width='150px'/>", 16.074377, 108.223904],
    ["LOCATION_2", 16.073956, 108.223628],
    ["LOCATION_3", 16.075660, 108.222161],
    ["LOCATION_4", 16.077730, 108.219720],
    ["LOCATION_5", 16.079413, 108.218567]
  ];
  var map = L.map('map').setView([16.075660, 108.222161], 15);
  mapLink =
    '<a href="http://openstreetmap.org">OpenStreetMap</a>';
  L.tileLayer(
    'http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; ' + mapLink + ' Contributors',
      maxZoom: 18,
    }).addTo(map);
  for (var i = 0; i < locations.length; i++) {
    marker = new L.marker([locations[i][1], locations[i][2]])
      .bindPopup(locations[i][0])
      .addTo(map);
  }

})

$(window).on('load', function() {
  // Tinh chieu rong
  var widthDocurment = $(document).width()
  if (widthDocurment > 575) {
    var heightDiv = document.getElementById('home-box-col-1')
    $('.home-box-col-info').height(heightDiv.offsetHeight)
  }
})
$(window).on('resize', function() {
  // Tinh chieu rong
  var widthDocurment = $(document).width()
  if (widthDocurment > 575) {
    var heightDiv = document.getElementById('home-box-col-1')
    $('.home-box-col-info').height(heightDiv.offsetHeight)
  }
})

$(window).scroll(function() {
  if ($(this).scrollTop() > 300) {
    $('.scrollup').addClass('scrollup-visible')
  } else {
    $('.scrollup').removeClass('scrollup-visible')
  }
})

function validate(type, _this) {
  $(_this).removeClass('error-tb')
  var val = $(_this).val()
  switch (type) {
    case 'DIEM':
      if (isNaN(val) || val < 0 || val > 10) {
        $(_this).addClass('error-tb')
        $(_this).val('')
      }
      break
    case 'NAM':
      if (val.length !== 4) {
        $(_this).addClass('error-tb')
        $(_this).val('')
        setTimeout(function() { $(_this).removeClass('error-tb') }, 1000);
      }
      break
    case 'CMND':
      if (val.length !== 9 && val.length !== 12) {
        $(_this).addClass('error-tb')
        $(_this).val('')
        setTimeout(function() { $(_this).removeClass('error-tb') }, 1000);
      }
      break
    case 'PHONE':
      var vnf_regex = /((09|03|07|08|05)+([0-9]{8})\b)/g
      if (vnf_regex.test(val) === false) {
        $(_this).addClass('error-tb')
        $(_this).val('')
        setTimeout(function() { $(_this).removeClass('error-tb') }, 1000);
      }
      break
    case 'BIRTHDAY':
      var bd_regex = /(^(0[1-9]|[12]\d|3[01]|[1-9])[\/](0[1-9]|1[0-2]|[1-9])[\/][12]\d{3})/g
      if (bd_regex.test(val) === false) {
        $(_this).addClass('error-tb')
        $(_this).val('')
        setTimeout(function() { $(_this).removeClass('error-tb') }, 1000);
      } else {
        var valArr = val.split('/')
        var check = true
        mArr = [2, 4, 6, 9, 11]
        if (Number(valArr[0]) > 30 && mArr.indexOf(Number(valArr[1])) != -1) {
          check = false
        }
        if (Number(valArr[0]) > 29 && Number(valArr[1]) == 2) {
          check = false
        }
        if (!check) {
          $(_this).addClass('error-tb')
          $(_this).val('')
          setTimeout(function() { $(_this).removeClass('error-tb') }, 1000);
        }
      }
      break
  }
}
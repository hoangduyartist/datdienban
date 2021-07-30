<script type="text/javascript" src="<?=$domain?>/public/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?=$domain?>/public/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?=$domain?>/app/packages/menureponsive/jquery.mmenu.min.all.js"></script>
<script type="text/javascript" src="<?=$domain?>/public/js/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript" src="<?=$domain?>/public/js/slick.min.js"></script>

<?php //include "z_includes/fancybox.php";?>
<?php if($post_type=='project_detail'){ ?>
<script type="text/javascript" src="<?=$domain?>/public/js/menu-onpage.js"></script>
<?php } ?>
<script type="text/javascript">
$(window).scroll(function() {
if($(this).scrollTop() > 0){$('.top_wrapper').addClass("fixed");}else{$('.top_wrapper').removeClass("fixed");}
if($(this).scrollTop() > 300) {$('.scrollup').addClass('scrollup-visible');}else{ $('.scrollup').removeClass('scrollup-visible scrollup-fade-out');}if ($(this).scrollTop() > 800) {$('.scrollup').addClass('scrollup-fade-out');};});
$(document).ready(function() {$('nav#menu').mmenu({offCanvas:{zposition:"front",position:"right"}});
$(window).scroll(function() {windowHeight = $(window).height();windowWidth = $(window).width();if(windowWidth>973){var window_top = $(window).scrollTop();var footer_top = $("#stop-sidebar").offset().top;var div_top = $('#sticky-anchor').offset().top;var div_height = $("#stick").height();if (window_top + div_height > footer_top){$('#stick').removeClass('stick');}else if(window_top>div_top){$('#stick').addClass('stick');}else{$('#stick').removeClass('stick');}}});$('#slider').nivoSlider({animSpeed: 1000,pauseTime: 5000,effect:'random',manualAdvance:false,pauseOnHover: true});$('.slider-for').slick({slidesToShow: 1,slidesToScroll: 1,arrows: true,fade: true,adaptiveHeight: true,asNavFor: '.slider-nav'});$('.slider-nav').slick({slidesToShow: 4,slidesToScroll: 1,asNavFor: '.slider-for',dots: true,centerMode: false,adaptiveHeight: true,focusOnSelect: true});$('#cc-slider').slick({dots: false,arrows: false,slidesToShow: 4,autoplay: true,infinite: false,autoplaySpeed: 2000,responsive: [{breakpoint: 768,settings: {slidesToShow: 3}}, {
breakpoint: 481,settings: {slidesToShow: 2}}]});$('.block-slide2').slick({dots: false,arrows: true,rows: 2,slidesToShow: 2,autoplay: true,infinite: false,autoplaySpeed: 2000,responsive: [{breakpoint: 768,settings: {rows: 1,slidesToShow: 1}}, {breakpoint: 481,settings: {rows: 1,slidesToShow: 1}}]});$('.block-prdc4').slick({dots: false,arrows: true,infinite: false,rows: 2,slidesToShow: 3,autoplay: true,autoplaySpeed: 2000,focusOnSelect: true,autoplay: false,responsive: [{breakpoint: 1024,settings: {rows: 3,slidesToShow: 3,}}, {breakpoint: 768,settings: {
rows: 3,slidesToShow: 2}}, {breakpoint: 600,settings: {rows: 3,slidesToShow: 2,}}]});$('.scrollup').on('click', function(event) {event.preventDefault();$('body,html').animate({scrollTop: 0,}, 700);});$('.product_ul li a').on('click', function() {var itemId = $(this).attr('data-id');$.ajax({type  : 'GET',url   : '<?=$domain?>/ajax/loadjs.php',data  : { id : itemId },success : function(qq){ $("#showhang").html(qq); }});});});$(window).load(function() {$('.productk').slick({slidesToShow: 4,slidesToScroll: 1,dots: true,autoplay: true,responsive: [{breakpoint: 992,settings: {  slidesToShow: 3,}},{breakpoint: 768,settings: {  slidesToShow: 2,}},{breakpoint: 480,settings: {  slidesToShow: 1,}}]});});</script>





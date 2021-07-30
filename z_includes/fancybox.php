
<script type="text/javascript" src="<?=$domain?>/app/packages/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<script type="text/javascript" src="<?=$domain?>/app/packages/fancybox/jquery-ui.min.js?v=2.1.5"></script>
<script type="text/javascript" src="<?=$domain?>/app/packages/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="<?=$domain?>/app/packages/fancybox/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<script type="text/javascript" src="<?=$domain?>/app/packages/fancybox/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
<script type="text/javascript">
$('.fancybox').fancybox({padding : 0,arrows: true,play: true,showCloseButton: true,showNavArrows: true,hideOnContentClick: true,helpers : {thumbs : {width  : 80,height : 40}},onUpdate:function(){$('#fancybox-thumbs ul').draggable({axis: "x"
});var posXY = '';$('.fancybox-skin').draggable({axis: "x",drag: function(event,ui){// get position
posXY = ui.position.left;// if drag distance bigger than +- 100px: cancel drag function..if(posXY > 100){return false;}
if(posXY < -100){return false;}},stop: function(){// ... and get next oder previous imageif(posXY > 95){$.fancybox.prev();}
if(posXY < -95){$.fancybox.next();}}});}});
</script>
<style type="text/css">
.fancybox-custom .fancybox-skin {box-shadow: 0 0 50px #222;}
</style>

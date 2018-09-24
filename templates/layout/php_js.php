<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	var tenct='<?=$company['ten']?>';
	var nhaptukhoatimkiem='<?=_nhaptukhoatimkiem?>...';
	var chuanhaptukhoa='<?=_chuanhaptukhoa?>';
	var nhapemailcuaban='<?=_nhapemailcuaban?>...';
	var nhapemail='<?=_nhapemail?>';
	var emailkhonghople='<?=_emailkhonghople?>';
	var nhaphoten='<?=_nhaphoten?>';
	var nhapdiachi='<?=_nhapdiachi?>';
	var nhapsodienthoai='<?=_nhapsodienthoai?>';
	var emailkhonghople='<?=_emailkhonghople?>';
	var nhapchude='<?=_nhapchude?>';
	var nhapnoidung='<?=_nhapnoidung?>';
</script>
<script type="text/javascript" src="js/jquery-migrate-1.2.1.min.js" ></script>
<script type="text/javascript" src="js/my_script.js"></script>
<script src="js/plugins-scroll.js" type="text/javascript" ></script>
<script src='https://www.google.com/recaptcha/api.js?hl=vi' async ></script>
<script type="text/javascript" src="js/jquery.mmenu.min.all.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/jquery.circliful.js"></script>
<script src="js/HoldOn.js" type="text/javascript" ></script>
<script src="js/sweetalert.min.js" type="text/javascript" ></script>
<script src="js/select2.full.min.js" type="text/javascript" ></script>
<script src="admin/js/jquery.priceformat.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<?php if($source=='dangtin'){ ?>
<script src="admin/ckeditor/ckeditor.js"></script>
<script src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/filer-master/js/jquery.filer.min.js"></script>
<script type="text/javascript" src="js/upload1.js"></script>
<?php }?>
<script src="js/jquery.photobox.js" type="text/javascript" ></script>
<script src="js/main.js" type="text/javascript" ></script>
<script src="js/dangky.js" type="text/javascript" ></script>
<script src="magiczoomplus/magiczoomplus.js" type="text/javascript"></script>
<?php /*?><!--animate hiệu ứng-->
<script type="text/javascript" src="js/wow.min.js"></script>
<script type="text/javascript">
 	new WOW().init();
</script>
<!--animate hiệu ứng-->
<!--Code gữ thanh menu trên cùng-->
<script type="text/javascript">
	$(document).ready(function(){
		$(window).scroll(function(){
			var cach_top = $(window).scrollTop();
			var heaigt_header = $('#header').height();

			if(cach_top >= heaigt_header){
				$('#menu').css({position: 'fixed', top: '0px', zIndex:99});
			}else{
				$('#menu').css({position: 'relative'});
			}
		});
	});
 </script>
<!--Code gữ thanh menu trên cùng--><?php */?>
$(document).ready(function(e) {$('img').each(function(index, element) {if(!$(this).attr('alt') || $(this).attr('alt')==''){$(this).attr('alt',tenct);}});});
function doEnter(evt){var key;if(evt.keyCode == 13 || evt.which == 13){onSearch(evt);}}
function onSearch(evt) {var keyword = document.getElementById("keyword").value;if(keyword=='' || keyword==nhaptukhoatimkiem){alert(chuanhaptukhoa);}else{location.href = "tim-kiem.html&keyword="+keyword;loadPage(document.location);}}
function doEnter2(evt){var key;if(evt.keyCode == 13 || evt.which == 13){onSearch2(evt);}}
function onSearch2(evt) {var keyword2 = document.getElementById("keyword2").value;if(keyword2=='' || keyword2==nhaptukhoatimkiem){alert(chuanhaptukhoa);}else{location.href = "tim-kiem.html&keyword="+keyword2;loadPage(document.location);}}$(document).ready(function() { $("#menu ul li").hover(function(){$(this).find('ul:first').css({visibility: "visible",display: "none"}).show(300); },function(){ $(this).find('ul:first').css({visibility: "hidden"});}); $("#menu ul li").hover(function(){$(this).find('>a').addClass('active2'); },function(){ $(this).find('>a').removeClass('active2'); }); });
$('.click_ajax').click(function(){if(isEmpty($('#ten_lienhe').val(), nhaphoten )){$('#ten_lienhe').focus();return false;}if(isEmpty($('#diachi_lienhe').val(), nhapdiachi)){$('#diachi_lienhe').focus();return false;}if(isEmpty($('#dienthoai_lienhe').val(), nhapsodienthoai)){$('#dienthoai_lienhe').focus();return false;}if(isPhone($('#dienthoai_lienhe').val(), nhapsodienthoai)){$('#dienthoai_lienhe').focus();return false;}if(isEmpty($('#email_lienhe').val(), emailkhonghople)){$('#email_lienhe').focus();return false;}if(isEmail($('#email_lienhe').val(), emailkhonghople)){$('#email_lienhe').focus();return false;}if(isEmpty($('#tieude_lienhe').val(), nhapchude)){$('#tieude_lienhe').focus();return false;}if(isEmpty($('#noidung_lienhe').val(), nhapnoidung)){$('#noidung_lienhe').focus();return false;}document.frm.submit();});
$(function() {$('.hien_menu').click(function(){$('nav#menu_mobi').css({height: "auto"});});$('nav#menu_mobi').mmenu({extensions: [ 'effect-slide-menu', 'pageshadow' ],searchfield: true,counters	: true,navbar : {title: 'Menu'},navbars: [{position: 'top',content: [ 'searchfield' ]}, {position	: 'top',content	: ['prev','title','close']}]});});
function onclick_ajax(){
	if(isEmpty($('#frm1 #ten_lienhe').val(), nhaphoten )){$('#frm1 #ten_lienhe').focus();return false;}
	if(isEmpty($('#frm1 #email_lienhe').val(), emailkhonghople)){$('#frm1 #email_lienhe').focus();return false;}
	if(isEmail($('#frm1 #email_lienhe').val(), emailkhonghople)){$('#frm1 #email_lienhe').focus();return false;}
	if(isEmpty($('#frm1 #tieude_lienhe').val(), nhapchude)){$('#frm1 #tieude_lienhe').focus();return false;}
	if(isEmpty($('#frm1 #noidung_lienhe').val(), nhapnoidung)){$('#frm1 #noidung_lienhe').focus();return false;}
	document.frm1.submit();
}
$(document).ready(function() {
	$('.luutin').click(function(event) {
			var idtin=$(this).data('idtin');
			var user=$(this).data('user');
			if($(this).hasClass('daluu')){
				alert('Bạn đã lưu tin này trước đó.');
				return false;
			}
			if(user==''){
				swal({
				  title: "Lưu tin",
				  text: "Bạn cần phải đăng nhập để lưu tin !",
				  icon: "warning",
					buttons: {
			     cancel: "Hủy bỏ",
			     defeat: "Đăng nhập",
			   },
				  dangerMode: true,
				})
				.then((willDelete) => {
				  if (willDelete) {
				    window.location.href = 'dang-nhap.html';
				  }else{} 
				});
			}
			$.ajax({
				url:'ajax/luutin.html',
				type:'post',
				data:{user:user,idtin:idtin},
				success:function(data){
					if(data==-1){
						swal("Thất bại", "Hệ thống bị lỗi. Vui lòng thử lại sau !", "error");
					}else{
						swal("Thành công", "Bạn đã lưu tin thành công !", "success");
					}
				}
			})
	});
	$('.guilaithu').click(function(event) {
		if(isEmpty($('#form_tienich input[name="hotenlaithu"]').val(), nhaphoten )){$('#form_tienich input[name="hotenlaithu"]').focus();return false;}
		if(isEmpty($('#form_tienich input[name="dienthoailaithu"]').val(), nhapsodienthoai)){$('#form_tienich input[name="dienthoailaithu"]').focus();return false;}
		if(isPhone($('#form_tienich input[name="dienthoailaithu"]').val(), nhapsodienthoai)){$('#form_tienich input[name="dienthoailaithu"]').focus();return false;}
		if(isEmpty($('#form_tienich input[name="emaillaithu"]').val(), emailkhonghople)){$('#form_tienich input[name="emaillaithu"]').focus();return false;}
		if(isEmail($('#form_tienich input[name="emaillaithu"]').val(), emailkhonghople)){$('#form_tienich input[name="emaillaithu"]').focus();return false;}
		if(isEmpty($('#form_tienich input[name="capcha"]').val(), "Nhập mã bảo vệ" )){$('#form_tienich input[name="capcha"]').focus();return false;}
		$.ajax({
			url:'ajax/dangkylaithu.html',
			type:'post',
			data:$('#form_tienich').serialize(),
			dataType:'JSON',
			success:function(data){
				alert(data.thongbao);
				if(data.error==1){
					location.reload();
				}
			}
		})
	});

	$('.guitragop').click(function(event) {
		if(isEmpty($('#form_tienich1 input[name="hotenlaithu"]').val(), nhaphoten )){$('#form_tienich1 input[name="hotenlaithu"]').focus();return false;}
		if(isEmpty($('#form_tienich1 input[name="dienthoailaithu"]').val(), nhapsodienthoai)){$('#form_tienich1 input[name="dienthoailaithu"]').focus();return false;}
		if(isPhone($('#form_tienich1 input[name="dienthoailaithu"]').val(), nhapsodienthoai)){$('#form_tienich1 input[name="dienthoailaithu"]').focus();return false;}
		if(isEmpty($('#form_tienich1 input[name="emaillaithu"]').val(), emailkhonghople)){$('#form_tienich1 input[name="emaillaithu"]').focus();return false;}
		if(isEmail($('#form_tienich1 input[name="emaillaithu"]').val(), emailkhonghople)){$('#form_tienich1 input[name="emaillaithu"]').focus();return false;}
		if(isEmpty($('#form_tienich1 input[name="capcha"]').val(), "Nhập mã bảo vệ" )){$('#form_tienich1 input[name="capcha"]').focus();return false;}
		$.ajax({
			url:'ajax/dangkytragop.html',
			type:'post',
			data:$('#form_tienich1').serialize(),
			dataType:'JSON',
			success:function(data){
				alert(data.thongbao);
				if(data.error==1){
					location.reload();
				}
			}
		})
	});
});

$(document).ready(function(){
	$('.cauhoi').click(function(event) {
		if($(this).hasClass('act')){
			$(this).removeClass('act');
			$(this).next().stop().slideUp();
			return false;
		}
		$('.bxtrogiup .cauhoi').removeClass('act');
		$('.bxtrogiup .cautraloi').stop().slideUp();
		$(this).addClass('act');
		$(this).next().stop().slideDown();
	});
  $('.chiphilb').click(function(event) {
		  $(".body-lanbanh").load("ajax/chiphimuaxe.php");
  		$('#myModal12').modal('show');
  });
	$('.vaynganhang').click(function(event) {
		  $(".body-nganhang").load("ajax/vaynganhang.php");
  		$('#myModal123').modal('show');
  });
	$('.tienich_laithu').click(function(event) {
		$('#myModal_laithu').modal('show');
	})
	$('.tienich_tragop').click(function(event) {
		$('#myModal_tragop').modal('show');
	})
	$('.tienich_tragop').click(function(event) {
		$('#myModal_tragop').modal('show');
	})
	$('.btn_lienhe').click(function(e) {

    if(isEmpty($('#lienhemua #ten').val(), nhaphoten )){$('#lienhemua #ten').focus();return false;}
		if(isEmpty($('#lienhemua #email').val(), emailkhonghople)){$('#lienhemua #email').focus();return false;}
		if(isEmail($('#lienhemua #email').val(), emailkhonghople)){$('#lienhemua #email').focus();return false;}
		if(isEmpty($('#lienhemua #dienthoai').val(), nhapsodienthoai)){$('#lienhemua #dienthoai').focus();return false;}
		if(isPhone($('#lienhemua #dienthoai').val(), nhapsodienthoai)){$('#lienhemua #dienthoai').focus();return false;}
		if(isEmpty($('#lienhemua #diachi').val(), nhapdiachi )){$('#lienhemua #diachi').focus();return false;}
		if(isEmpty($('#lienhemua #noidung').val(), nhapnoidung )){$('#lienhemua #noidung').focus();return false;}
		$('#lienhemua').submit();
    });
	$('.call_u a.p_cal1').click(function(e) {
        var str=$(this).data('call');
		$('.call_u a.p_cal1').html(str);
		setTimeout(function(){
			$('.call_u a.p_cal1').attr('href','tel:'+str);
		},1000)

    });
	$('.slick2').photobox('a',{ time:0 });
	$('.slick2').slick({
		  slidesToShow: 1,
		  slidesToScroll: 1,
		  arrows: false,
		  fade: true,
		  autoplay:false,
		  autoplaySpeed:5000,
		  asNavFor: '.slick',
		  adaptiveHeight: true
	});
	$('.slick').slick({
		  slidesToShow: 5,
		  slidesToScroll: 1,
		  asNavFor: '.slick2',
		  dots: false,
		  centerMode: false,
		  focusOnSelect: true
	});
	 return false;
});
function dem_xetimkiem(){
	var tinhtrang=$('#frm_search_index input[name=tinhtrang]:checked').val();
	var id_hang=$('#frm_search_index #hangxe').val();
	var id_kieudang=$('#frm_search_index #kieudang').val();
	var id_mauxe=$('#frm_search_index #mauxe').val();
	var giatu=$('#frm_search_index #giatu').val();
	var giaden=$('#frm_search_index #giaden').val();
	var quan=$('#frm_search_index #khuvuc').val();
	$.ajax({
		url:'ajax/timkiemxe.html',
		data:{tinhtrang:tinhtrang,id_hang:id_hang,id_kieudang:id_kieudang,id_mauxe:id_mauxe,giatu:giatu,giaden:giaden,quan:quan},
		type:'POST',
		success: function(data){
			$('.click_sform span').text(data+' xe');
		}
	});
	return false;
}
$(document).ready(function(){
	$('.click_ajax_fr').click(function(e) {

		$('#myModal').modal('show');
    });
	var pageURL = window.location.pathname;
	if(pageURL=='/tim-xe.html'){
		var id_hang=$('#hangxe').val();
		var id_kieudang=$('#kieudang').val();
		if(id_hang=='' || id_kieudang==''){return false;}
		$.ajax({
			url:'ajax/mauxe.html',
			data:{id:id_kieudang,id_hang:id_hang},
			dataType:"json",
			type:"post",
			success: function(data){
				$('#mauxe').html(data.mauxe);
			}
		})
	}
	$('#tinhkhauhao').click(function(e) {
        if($('#hangxe').val()==''){
			alert('Vui lòng chọn hãng xe !');
			$('#hangxe').focus();
			return false;
		}
		if($('#tinhtrang').val()==''){
			alert('Vui lòng chọn tình trạng xe !');
			$('#tinhtrang').focus();
			return false;
		}
		if($('#thangmua').val()==''){
			alert('Vui lòng chọn tháng mua !');
			$('#thangmua').focus();
			return false;
		}
		if($('#nammua').val()==''){
			alert('Vui lòng chọn năm mua !');
			$('#nammua').focus();
			return false;
		}
		if($('#thangban').val()==''){
			alert('Vui lòng chọn tháng bán !');
			$('#thangban').focus();
			return false;
		}
		if($('#namban').val()==''){
			alert('Vui lòng chọn năm bán !');
			$('#namban').focus();
			return false;
		}
		$.ajax({
			url:'ajax/danhgiaxe.html',
			type:'POST',
			dataType:"JSON",
			data:$('#dinhgiaxe').serialize(),
			success: function(data){
				$('#khauhao').val(data.tongkhauhao+'%');
				$('#giaduoctinh').val(data.giasaukhauhao+' Vnđ');
			}
		})
    });
 	$('#hangxe').change(function(e) {
	   if($(this).val()==''){return false;}
	   var loadajax = "ajax/tinhtrang.php?id="+$(this).val();
		setTimeout(function(){$('#tinhtrang').load(loadajax)},0);
	});
	$('.capnhat_mk').click(function(e) {
		if($('#taikhoanthanhvien input[name="old_matkhau"]').val()==''){
			alert('Vui lòng nhập mật khẩu cũ !');
			$('#dangnhapthanhvien input[name="old_matkhau"]').focus();
			return false;
		}
		if($('#taikhoanthanhvien input[name="matkhau"]').val()==''){
			alert('Vui lòng nhập mật khẩu mới !');
			$('#dangnhapthanhvien input[name="matkhau"]').focus();
			return false;
		}
		if($('#taikhoanthanhvien input[name="matkhau"]').val().length<6)
		{
			alert('Vui lòng nhập mật khẩu hơn 6 ký tự !');
			$('#taikhoanthanhvien input[name="matkhau"]').focus();
			return false;
		}

        HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/capnhatmatkhau.html',
			data:$("#taikhoanthanhvien").serialize(),
			type:'post',
			dataType:"json",
			success: function(data){
				HoldOn.close();
				if(data.code==0){alert("Hệ thống bị lỗi. Thử lại sau");return false;}
				if(data.code==-1){alert("Mật khẩu cũ không chính xác");return false;}
				if(data.code==1){
					swal({
					  title: "Thông báo",
					  text: "Chúc mừng bạn đã cập nhật mật khẩu thành công",
					  icon: "success",
					  button: "Ok!",
					}).then((willDelete) => {
						location.reload();
					});
				}
			}
		})
    });

	$('.capnhat_tt').click(function(e) {
		if($('#taikhoanthanhvien input[name="hoten"]').val()==''){
			alert('Vui lòng nhập họ tên !');
			$('#dangnhapthanhvien input[name="hoten"]').focus();
			return false;
		}
		if($('#taikhoanthanhvien input[name="dienthoai"]').val()=='')
		{
			alert('Vui lòng nhập số điện thoại!');
			$('#taikhoanthanhvien input[name="dienthoai"]').focus();
			return false;
		}
		if(isPhone1($('#taikhoanthanhvien input[name="dienthoai"]').val()))
		{
			alert('Vui lòng nhập số điện thoại!');
			$('#taikhoanthanhvien input[name="dienthoai"]').focus();
			return false;
		}
		if($('#taikhoanthanhvien input[name="cmnd"]').val()==''){
			alert('Vui lòng nhập số chứng minh nhân dân !');
			$('#taikhoanthanhvien input[name="cmnd"]').focus();
			return false;
		}
        HoldOn.open({
			theme:'sk-cube-grid',
		});
		var data = new FormData();
		if($('#taikhoanthanhvien #file').val()!=''){
			var file_data = $('#taikhoanthanhvien #file').prop('files')[0];
        	var type = file_data.type;
            data.append('file', file_data);
		}
		$.each($("#taikhoanthanhvien").serializeArray(),function(index,item){
			data.append(item.name,item.value);
		})

		$.ajax({
			url:'ajax/capnhatthongtin.html',
			data:data,
			async: false,
            cache: false,
            contentType: false,
            processData: false,
			type:'post',
			dataType:"json",
			success: function(data){
				HoldOn.close();
				if(data.code==0){alert("Hệ thống bị lỗi. Thử lại sau");return false;}
				if(data.code==1){
					swal({
					  title: "Thông báo",
					  text: "Chúc mừng bạn đã cập nhật thông tin thành công",
					  icon: "success",
					  button: "Ok!",
					}).then((willDelete) => {
						location.reload();
					});
				}
			}
		})
    });
	$('.wap_page > ul li:first-child').addClass('act');
	$('.wap_page .v_tags .v_tag:first-child').show();
	$('.wap_page > ul li').click(function(e) {
        $('.wap_page > ul li').removeClass('act');
		$(this).addClass('act');
		$('.wap_page .v_tags .v_tag').hide();
		$('.wap_page .v_tags .v_tag:eq('+$(this).index()+')').show();
    });
});
$(document).ready(function(){
	$(".color_item").click(function(){
		$(".color_item").removeClass("active");
		$(this).addClass("active");

	})
	$(".size_item").click(function(){
		$(".size_item").removeClass("active");
		$(this).addClass("active");

	})
})
/*------Đăng tin--------*/

/*-----------------------*/

function initLink(){
	$('.tools_dangtin li a').click(function(e) {
		if($(this).hasClass('act')){return false;}
		HoldOn.open({
			theme:'sk-cube-grid',
		});
		$link = $(this).attr("href");
		for (instance in CKEDITOR.instances) {
			CKEDITOR.instances[instance].updateElement();
		}
		data = new FormData();

		$(".jFiler-items .jFiler-item-list > li").each(function () {
			index = $(this).attr('data-jfiler-index');

			data.append('files[' + index + ']', $('input[type=file]')[0].files[index]);

			console.log($('input[type=file]')[0].files[index]);
		})

		$.each($("#chonmauxe").serializeArray(),function(index,item){
			data.append(item.name,item.value);
		})
		$.ajax({
			url:$link,
			data:data,
			async: false,
            cache: false,
            contentType: false,
            processData: false,
			type:"post",
			success:function(data){
				$("#main_content").html(data);
				initLink();
				var stateObj = { foo: "bar" };
				history.pushState(stateObj, "page 2", $link);
				initSelect();
				upload_images();
				HoldOn.close();
			}
		})
		return false;
	});
}
function xoahinh(a,b){
	$.ajax({
		type: "POST",
		url: "ajax/xoahinh.html",
		data: {name:b,id:a},
		success:function(data){
			$("#"+data).fadeOut(500);
			setTimeout(function(){
				$("#"+data).remove();
			}, 1000)
		}
	})
}
$(document).ready(function(e) {
	initLink();
});
function xoatin_chitiet(id){
	hoi= confirm("Bạn có chắc chắn muốn xóa?");
	if(hoi==false){return false;}
	HoldOn.open({
		theme:'sk-cube-grid',
	});
	$.ajax({
		url:'ajax/xoatinchitiet.html',
		type:"post",
		data:{id:id},
		success: function(data){
			swal({
				  title: 'Thành công',
				  text: 'Tin đã được xóa thành công.',
				  icon: 'success',
				  button: "Ok!",
				}).then((willDelete) => {
					location.reload();
			});
		}
	})
}
function suatin_chitiet(id,url){
	$.ajax({
		url:'ajax/taotinfix.html',
		type:"post",
		data:{id:id,url},
		success: function(data){
			window.location.href = 'sua-tin/chon-mau-xe';
		}
	})
}
function huytin(id){
	HoldOn.open({
		theme:'sk-cube-grid',
	});
	$.ajax({
		url:'ajax/huytin.html',
		type:"post",
		data:{id:id},
		success: function(data){
			swal({
				  title: 'Thành công',
				  text: 'Tin đã được xóa thành công.',
				  icon: 'success',
				  button: "Ok!",
				}).then((willDelete) => {
					window.location.href = 'index.html';
			});
		}
	})
}
function huytin_tinsua(url){
	$.ajax({
		url:'ajax/huytinsua.html',
		type:"post",
		success: function(data){
			window.location.href = url;
		}
	})
}
function luunhap(){
	HoldOn.open({
		theme:'sk-cube-grid',
	});
	for (instance in CKEDITOR.instances) {
		CKEDITOR.instances[instance].updateElement();
	}
	data = new FormData();
	$(".jFiler-items .jFiler-item-list > li").each(function () {
		index = $(this).attr('data-jfiler-index');
		data.append('files[' + index + ']', $('input[type=file]')[0].files[index]);
	})
	$.each($("#chonmauxe").serializeArray(),function(index,item){
		data.append(item.name,item.value);
	})
	$.ajax({
		url:'ajax/luunhap.html',
		data:data,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		type:"post",
		success: function(data){
			if(data==1){
				swal({
					  title: 'Thành công',
					  text: 'Tin đăng của bạn đã được lưu lại.',
					  icon: 'success',
					  button: "Ok!",
					}).then((willDelete) => {
						window.location.href = 'thanh-vien/tin-da-luu';
				});
			}else{
				swal({
				  title: 'Xảy ra lỗi',
				  text: 'Hệ thống bị lỗi, Vui lòng thử lại sau.',
				  icon: 'error',
				  button: "Ok!",
				}).then((willDelete) => {
					location.reload();
				});
			}
			HoldOn.close();
		}
	})
}

function dangtin(){
	HoldOn.open({
		theme:'sk-cube-grid',
	});
	for (instance in CKEDITOR.instances) {
		CKEDITOR.instances[instance].updateElement();
	}
	data = new FormData();
	$(".jFiler-items .jFiler-item-list > li").each(function () {
		index = $(this).attr('data-jfiler-index');
		data.append('files[' + index + ']', $('input[type=file]')[0].files[index]);
	})
	$.each($("#chonmauxe").serializeArray(),function(index,item){
		data.append(item.name,item.value);
	})
	$.ajax({
		url:'ajax/dangtin.html',
		data:data,
		async: false,
		cache: false,
		contentType: false,
		processData: false,
		type:"post",
		success: function(data){
			if(data==1){
				swal({
					  title: 'Thành công',
					  text: 'Tin đăng của bạn đang chờ để được duyệt.',
					  icon: 'success',
					  button: "Ok!",
					}).then((willDelete) => {
						window.location.href = 'thanh-vien/tin-dang-ban';
				});
			}
			else if(data==-1){
				swal({
					  title: 'Chú ý',
					  text: 'Vui lòng nhập đủ nội dung trước khi đăng tin.',
					  icon: 'warning',
					  button: "Ok!",
					})
			}else{
				swal({
				  title: 'Xảy ra lỗi',
				  text: 'Hệ thống bị lỗi, Vui lòng thử lại sau.',
				  icon: 'error',
				  button: "Ok!",
				}).then((willDelete) => {
					location.reload();
				});
			}
			HoldOn.close();
		}
	})
}
$(document).ready(function(){

	$(window).scroll(function(){
		var cach_top = $(window).scrollTop();
		var heaigt_header = $('.nav_top').height();

		if(cach_top >= 1){
			$('.nav_top').css({position: 'fixed', top: '0px', zIndex:99999});
		}else{
			$('.nav_top').css({position: 'relative'});
		}
	});
});
function click_next(){
	$('.tools_dangtin li a.act').parent('li').next().find('a').click();
}
function click_prev(){
	$('.tools_dangtin li a.act').parent('li').prev().find('a').click();
}
function initSelect(){
	$('.conso').priceFormat({
		limit: 13,
		prefix: '',
		centsLimit: 0
	});
	if($('#in_title').length){
		var av = $('#in_title').val();
		$("title").text(av);
	}
	if($('#mota_dangtin').length){
		$('#mota_dangtin').each(function(index, element) {
			var id=$(this).attr('id');
			CKEDITOR.replace( id,
			{
			  skin:'office2013',
			  toolbar :
			  [
				{ name: 'styles', items : [ 'Styles','Format','FontSize' ] },
				{ name: 'basicstyles', items : [ 'Bold','Italic' ] },
				{ name: 'colors', items : [ 'TextColor','BGColor' ] },
				{ name: 'paragraph', items : [ 'NumberedList','BulletedList' ] },
				{ name: 'tools', items : [ 'Maximize','-','About' ] }
			  ]
			});
		});
	}
	$(".js-example-responsive").select2({
		width: 'resolve',
		placeholder: $(this).data('placeholder')

	});
	$('div.select_search span.pos').click(function(e) {
		$(this).next().select2('open');
	});
	$('.js-example-responsive1').each(function(index, element) {
		$(this).select2({
			width: 'resolve',
			placeholder: $(this).data('placeholder'),
			allowClear: true

		});
	});
	$('#hangxe,#kieudang').change(function(e) {
        var kieudang=$('#kieudang').val();
        var id_hang=$('#hangxe').val();

		if(kieudang=='' || id_hang==''){return false;}
		$.ajax({
			url:'ajax/mauxe.html',
			data:{id:kieudang,id_hang:id_hang},
			dataType:"json",
			type:"post",
			success: function(data){
				$('#mauxe').html(data.mauxe);
			}
		})
    });

	$('.chonhangxe').change(function(e) {
        var id=$(this).val();
		if(id==''){return false;}
		$.ajax({
			url:'ajax/loadmauxe.html',
			data:{id:id},
			dataType:"json",
			type:"post",
			success: function(data){
				$('.chonkieudang').html(data.kieudang);
				$('.chonmauxe').html('');
			}
		})
    });
	$('.chonkieudang').change(function(e) {
        var id=$(this).val();
		var id_hang=$('#hangxe1').val();
		if(id=='' || id_hang==''){return false;}
		$.ajax({
			url:'ajax/mauxe.html',
			data:{id:id,id_hang:id_hang},
			dataType:"json",
			type:"post",
			success: function(data){
				$('#mauxe1').html(data.mauxe);
			}
		})
    });


	$('#tinhthanh').change(function(e) {
        var id=$(this).val();
		if(id==''){return false;}
		$.ajax({
			url:'ajax/tinhthanh.html',
			data:{id:id},
			dataType:"json",
			type:"post",
			success: function(data){
				$('#quanhuyen').html(data.tinhthanh);
			}
		})
    });
}
$(document).ready(function(e) {
	 initSelect();
});
$(document).ready(function(){
	$('div.slick_hinh_all').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:false,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		fade:false,
		pauseOnHover:true,
		draggable:true,
		mobileFirst:true,
		nextArrow:'<div class="slick_next"><i class="fa fa-angle-right" aria-hidden="true"></i></i></div>',
		prevArrow:'<div class="slick_prev"><i class="fa fa-angle-left" aria-hidden="true"></i></i></div>'
      });
	 $('div.slick_slider_tintuc').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		fade:true,
		pauseOnHover:true,
		draggable:true,
		mobileFirst:true
      });
	  $('div.slick_sl').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		fade:true,
		pauseOnHover:true,
		draggable:true,
		mobileFirst:true
      });
	$('.pes').each(function(index, element) {
        var id=$(this).attr('id');
		var pes=$(this).data('pes');
		$("#"+id).circliful({
			animation: 1,
			animationStep: 5,
			foregroundBorderWidth: 8,
			backgroundBorderWidth: 8,
			percent: pes,
			percentageTextSize: 15,
			textColor: '#000',
			percentageY:107,
			targetColor:'#000',
			percentageX:100,
			foregroundColor:'#fb9500',
			backgroundColor:'#fcebd1',
			animateInView:true
		});
    });
	$('.co__chart').each(function(index, element) {
        var id=$(this).attr('id');
		var pes=$(this).data('pes');
		$("#"+id).circliful({
			animation: 1,
			animationStep: 5,
			foregroundBorderWidth: 8,
			backgroundBorderWidth: 8,
			percent: pes,
			percentageTextSize: 15,
			textColor: '#000',
			percentageY:107,
			targetColor:'#000',
			percentageX:100,
			foregroundColor:'#fb9500',
			backgroundColor:'#fcebd1'
		});
    });

	$('div.slick_qc3').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		draggable:true,
		mobileFirst:true
	});
	$('div.slick_qc4').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 2,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		draggable:true,
		mobileFirst:true
	});
	$('div.slick_vv').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:true,
		draggable:true,
		mobileFirst:true
	});
	$('div.slick_sl5').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:true,
		draggable:true,
		mobileFirst:true
	});
	$('div.slick_news').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:true,
		draggable:true,
		mobileFirst:true
	});
	$('div.slick_video').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:true,
		slidesToShow: 6,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		draggable:true,
		mobileFirst:true
	});
	$('div.slick_hoidap').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		vertical:false,
		slidesToShow: 4,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		draggable:true,
		mobileFirst:true
	});
	$('#slider_slick').slick({
		lazyLoad: 'progressive',
		pauseOnHover:false,
		infinite: true,
		accessibility:true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		speed:2000,
		arrows:true,
		centerMode:false,
		dots:false,
		draggable:true,
		fade: true,
		mobileFirst:true,
	});
	$('.tab_col:first-child').show();
	$('.showroom-tabs__nav__item').click(function(e) {
		$('.showroom-tabs__nav li').removeClass('is-active');
		$(this).addClass('is-active');
		var vt=$(this).index();
		$('.tab_col').hide();
		$('.tab_col:eq('+vt+')').show();
	});
	$('div.sl_quangcao1').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		slidesToShow: 1,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		draggable:true,
		mobileFirst:true
    });
	$('div.slick_bv').slick({
		lazyLoad: 'ondemand',
		infinite: true,
		accessibility:true,
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay:true,
		autoplaySpeed:3000,
		arrows:true,
		centerMode:false,
		dots:false,
		draggable:true,
		mobileFirst:true
    });
});
$(document).ready(function(e) {
	$('#email_nhantin').click(function(){
		if($(this).val()==nhapemailcuaban)
		{
			$(this).val('');
		}
		return false;
	});
	$('#email_nhantin').blur(function(){
		if($(this).val()=='')
		{
			$(this).val(nhapemailcuaban);
		}
		return false;
	});
});
function nhantin(){
	if(isEmpty($('#email_nhantin').val(), nhapemail))
		{
			$('#email_nhantin').focus();
			return false;
		}
		if(isEmail($('#email_nhantin').val(), emailkhonghople))
		{
			$('#email_nhantin').focus();
			return false;
		}
	document.frm_dknt.submit();
}
////Trang kiểu dáng////
	$(document).ready(function(e) {
        var eq_kd=$('.ul_kd_th li.act').index();
		$('.tabs_in_kd_th .tab_in_kd_th:eq('+eq_kd+')').show();
		$('.ul_kd_th li').click(function(e) {
			$('.tabs_in_kd_th .tab_in_kd_th').hide();
            $('.ul_kd_th li').removeClass('act');
			$(this).addClass('act');
			var eq_kd=$(this).index();
			$('.tabs_in_kd_th .tab_in_kd_th:eq('+eq_kd+')').show();
        });
    });
///Đánh giá/////
$(document).ready(function(e) {
    $('.v_Rs').each(function(index, element) {
        var onStar = parseInt($(this).find('input').val(), 10);
		var stars1 = $(this).children('p').children('a');
		for (i = 0; i < onStar; i++) {
		  $(stars1[i]).addClass('act1');
		}
    });
	$( "a.rating_icon1").on( "mouseover", function() {
			var id= $(this).attr('data-id');
			$(this).parent('p').children('a').each(function(){
				$(this).removeClass('act');
				var idc= $(this).attr('data-id');
				$(this).addClass('abcd');
				if (idc <= id) {
					$(this).addClass('act');
				}
			})
		}).on('mouseout', function(){
            $(this).parent().children('a.rating_icon1').each(function(e){
              $(this).parent().children('a').removeClass('act');
          });
     });
	 $('.rating_icon1').click(function(e) {
		var value = $(this).attr('data-id');
		$(this).parent('p').find('input').attr('value',value);
		var onStar = parseInt($(this).data('id'), 10);
		var stars = $(this).parent('p').children('a');
		for (i = 0; i < stars.length; i++) {
		  $(stars[i]).removeClass('act1');
		}

		for (i = 0; i < onStar; i++) {
		  $(stars[i]).addClass('act1');
		}
	  });
	  $('.btn_danhgiau').click(function(e) {
		 if($('#v_danhgia_u').val().length<40){
			alert('Xin bạn vui lòng nhập tối thiểu 40 ký tự !');
			return false;
		 }
		 HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/danhgiauser.html',
			data:$("#danhgiauser").serialize(),
			type:'post',
			success: function(data){
				HoldOn.close();
				swal({
				  title: 'Thành công',
				  text: 'Đánh giá của bạn đã được chúng tôi ghi nhận',
				  icon: 'success',
				  button: "Ok!",
				}).then((willDelete) => {
					location.reload();
				});
			}
		})
      })
});
$(document).ready(function(e) {
	$('.bx_danhgiachungtoi ul li:first-child').addClass('act');
	$('.tabs_danhgia .tab_danhgia:first-child').show();
	$('.bx_danhgiachungtoi ul li').click(function(e) {
		var vt=$(this).index();
		$('.tabs_danhgia .tab_danhgia').hide();
		$('.bx_danhgiachungtoi ul li').removeClass('act');
		$(this).addClass('act');
		$('.tabs_danhgia .tab_danhgia:eq('+vt+')').show();
	});
	var onStar1 = parseInt($('#star_ss').val(), 10);
	var stars1 = $('#rattings').children('a');
	for (i = 0; i < onStar1; i++) {
	  $(stars1[i]).addClass('act1');
	}
	$( "a.rating_icon").on( "mouseover", function() {
			var id= $(this).attr('data-id');
			$(this).parent('#rattings').children('a').each(function(){
				$(this).removeClass('act');
				var idc= $(this).attr('data-id');
				$(this).addClass('abcd');
				if (idc <= id) {
					$(this).addClass('act');
				}
			})
		}).on('mouseout', function(){
            $(this).parent().children('a.rating_icon').each(function(e){
              $(this).parent().children('a').removeClass('act');
          });
     });

	$('.rating_icon').click(function(e) {
		var value = $(this).attr('data-id');
		$('#star_ss').attr('value',value);
		var onStar = parseInt($(this).data('id'), 10);
		var stars = $(this).parent().children('a');
		for (i = 0; i < stars.length; i++) {
		  $(stars[i]).removeClass('act1');
		}

		for (i = 0; i < onStar; i++) {
		  $(stars[i]).addClass('act1');
		}
	  });

	$('.btn_danhgiaw').click(function(e) {
        HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/danhgiaweb.html',
			data:$("#danhgiawebsite").serialize(),
			type:'post',
			success: function(data){
				HoldOn.close();
				swal({
				  title: 'Thành công',
				  text: 'Đánh giá của bạn đã được chúng tôi ghi nhận',
				  icon: 'success',
				  button: "Ok!",
				}).then((willDelete) => {
					location.reload();
				});
			}
		})
    });

});
///////////////
function click_div(x){
	var str = '';
	var class_=$(x).attr('class');
	$(x).toggleClass('active');
	if($(x).hasClass('active')){
		$(x).children('.myCheckbox').attr('checked', true);
	}else{
		$(x).children('.myCheckbox').attr('checked', false);
	}
	$(x).parent('.dimension-search').find('div').each(function (index,i) {
         if ($(i).hasClass('active')) {
             str += $(i).data('id') + '.';
         }
    })
   $(x).parent().find('input').val(str.slice(0, -1));
   $('#frm_search').submit();
}

$(document).ready(function(e) {
	$('.click_sform').click(function(e) {
        $('#frm_search_index').submit();
    });
	$('.main-search-form-header input[name=tinhtrang]').change(function(e) {
        $('.click_sform span').html($(this).data('count'));
    });
  	$('.timtukhoa').click(function(e) {
        $('#frm_search').submit();
    });
	$('.dimension-summary').click(function(e) {
        $(this).parent().toggleClass('show');
    });

});
//////////////

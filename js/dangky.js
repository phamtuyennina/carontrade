// JavaScript Document
function isPhone1(str){
	if((str.length==11 && (str.substr(0,2)==01)) || (str.length==11 && (str.substr(0,2)==02)) || (str.length==10 && (str.substr(0,2)==09)) || (str.length==10 && (str.substr(0,2)==08)))
		return false;
	return true;
}
function isEmail1(str){
	emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
	if(emailRegExp.test(str)){		
		return false;
	}
	return true;
}
function isRepassword1(str,str2){
	if(str2=='') return false;
	if(str==str2) return false;
	return true;
}
function onKeyPress(e) {
	if(e.which == 13) {
		e.preventDefault();
		if($('#dangnhapthanhvien input[name="email"]').val()==''){
			alert('Vui lòng nhập email !');
			$('#dangnhapthanhvien input[name="email"]').focus();
			return false;
		}
		if(isEmail($('#dangnhapthanhvien input[name="email"]').val()))
		{
			alert('Vui lòng nhập email !');
			$('#dangnhapthanhvien input[name="email"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien input[name="matkhau"]').val()==''){
			$('#dangnhapthanhvien input[name="matkhau"]').focus();
			return false;
		}
		HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/dangnhapthanhvien.html',
			data:$("#dangnhapthanhvien").serialize(),
			type:'post',
			success: function(data){
				HoldOn.close();
				var myObj = JSON.parse(data);
				swal({
				  title: myObj.title,
				  text: myObj.thongbao,
				  icon: myObj.icon,
				  button: "Ok!",
				}).then((willDelete) => {
					if(myObj.icon=='success'){
						window.location.href=myObj.href;
					}
				});
			}
		})
	}
}
$(document).ready(function(e) {
	$('#dangnhapthanhvien').keypress(onKeyPress);
	$('.ghinhotk span').click(function(e) {
        if($(this).parent().find('input').is(':checked')){
			$(this).parent().find('input').prop('checked', false);
		}else{
			$(this).parent().find('input').prop('checked', true);
		}
    });
    $('.bx_form ul li:first-child').addClass('act');
	$('.tab_dkdn:first-child').show();
	$('.bx_form ul li').click(function(e) {
		$('.bx_form input:not(.khongxoa)').val('');
        $('.bx_form ul li').removeClass('act');
		$(this).addClass('act');
		$('.tab_dkdn').hide();
		var vt=$(this).index();
		$('.tab_dkdn:eq('+vt+')').show();
    });
	/*-----------Đăng nhập------------*/
	$('#btn_dangnhaptv').click(function(e) {
        if($('#dangnhapthanhvien input[name="email"]').val()==''){
			alert('Vui lòng nhập email !');
			$('#dangnhapthanhvien input[name="email"]').focus();
			return false;
		}
		if(isEmail($('#dangnhapthanhvien input[name="email"]').val()))
		{
			alert('Vui lòng nhập email !');
			$('#dangnhapthanhvien input[name="email"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien input[name="matkhau"]').val()==''){
			alert('Vui lòng nhập mật khẩu !');
			$('#dangnhapthanhvien input[name="matkhau"]').focus();
			return false;
		}
		HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/dangnhapthanhvien.html',
			data:$("#dangnhapthanhvien").serialize(),
			type:'post',
			success: function(data){
				HoldOn.close();
				var myObj = JSON.parse(data);
				swal({
				  title: myObj.title,
				  text: myObj.thongbao,
				  icon: myObj.icon,
				  button: "Ok!",
				}).then((willDelete) => {
					if(myObj.icon=='success'){
						window.location.href=myObj.href;
					}
				});
			}
		})
    });
	/*---------------DK Cá nhân-----------*/
	$('#btn_dangkytv1').click(function(e) {
		if($('#dangnhapthanhvien1 input[name="email"]').val()==''){
			alert('Vui lòng nhập email của bạn !');
			$('#dangnhapthanhvien1 input[name="email"]').focus();
			return false;
		}
		if(isEmail1($('#dangnhapthanhvien1 input[name="email"]').val()))
		{
			alert('Vui lòng nhập email của bạn !');
			$('#dangnhapthanhvien1 input[name="email"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien1 input[name="matkhau"]').val()==''){
			alert('Vui lòng nhập mật khẩu của bạn !');
			$('#dangnhapthanhvien1 input[name="matkhau"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien1 input[name="matkhau"]').val().length<6) 
		{
			alert('Vui lòng nhập mật khẩu hơn 6 ký tự !');
			$('#dangnhapthanhvien1 input[name="matkhau"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien1 input[name="hoten"]').val()=='') 
		{
			alert('Vui lòng nhập họ tên của bạn!');
			$('#dangnhapthanhvien1 input[name="hoten"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien1 input[name="phone"]').val()=='') 
		{
			alert('Vui lòng nhập số điện thoại!');
			$('#dangnhapthanhvien1 input[name="phone"]').focus();
			return false;
		}
		if(isPhone1($('#dangnhapthanhvien1 input[name="phone"]').val()))
		{
			alert('Vui lòng nhập số điện thoại!');
			$('#dangnhapthanhvien1 input[name="phone"]').focus();
			return false;
		}
		
		if($('#dangnhapthanhvien1 input[name="captcha"]').val()==''){
			alert('Vui lòng nhập mã bảo vệ !');
			$('#dangnhapthanhvien1 input[name="captcha"]').focus();
			return false;
		}
		HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/dangkythanhvien.html',
			data:$("#dangnhapthanhvien1").serialize(),
			type:'post',
			dataType:"json",
			success: function(data){
				HoldOn.close();
				if(data.code==-1){alert(data.title);return false;}
				if(data.code==1){
					swal({
					  title: "Đăng ký thành công",
					  text: "Xác nhận email để kích hoạt tài khoản! Vui lòng kiểm tra spam nếu không nhân được email.",
					  icon: "success",
					  button: "Ok!",
					}).then((willDelete) => {
						window.location.href='dang-nhap.html';
					});
				}
			}
		})
    });
	
	/*--------------Đăng ký đại lý---------*/
	$('#btn_dangkytv2').click(function(e) {
		if($('#dangnhapthanhvien2 input[name="email"]').val()==''){
			alert('Vui lòng nhập email của bạn !');
			$('#dangnhapthanhvien2 input[name="email"]').focus();
			return false;
		}
		if(isEmail1($('#dangnhapthanhvien2 input[name="email"]').val()))
		{
			alert('Vui lòng nhập email của bạn !');
			$('#dangnhapthanhvien2 input[name="email"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien2 input[name="matkhau"]').val()==''){
			alert('Vui lòng nhập mật khẩu của bạn !');
			$('#dangnhapthanhvien2 input[name="matkhau"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien2 input[name="matkhau"]').val().length<6) 
		{
			alert('Vui lòng nhập mật khẩu hơn 6 ký tự !');
			$('#dangnhapthanhvien2 input[name="matkhau"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien2 input[name="hoten"]').val()=='') 
		{
			alert('Vui lòng nhập họ tên của bạn!');
			$('#dangnhapthanhvien2 input[name="hoten"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien2 input[name="tencongty"]').val()=='') 
		{
			alert('Vui lòng nhập tên công ty!');
			$('#dangnhapthanhvien2 input[name="tencongty"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien2 input[name="diachi"]').val()=='') 
		{
			alert('Vui lòng nhập địa chỉ!');
			$('#dangnhapthanhvien2 input[name="diachi"]').focus();
			return false;
		}
		if($('#dangnhapthanhvien2 input[name="phone"]').val()=='') 
		{
			alert('Vui lòng nhập số điện thoại!');
			$('#dangnhapthanhvien2 input[name="phone"]').focus();
			return false;
		}
		if(isPhone1($('#dangnhapthanhvien2 input[name="phone"]').val()))
		{
			alert('Vui lòng nhập số điện thoại!');
			$('#dangnhapthanhvien2 input[name="phone"]').focus();
			return false;
		}
		
		if($('#dangnhapthanhvien2 input[name="captcha"]').val()==''){
			alert('Vui lòng nhập mã bảo vệ !');
			$('#dangnhapthanhvien2 input[name="captcha"]').focus();
			return false;
		}
		HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/dangkythanhvien.html',
			data:$("#dangnhapthanhvien2").serialize(),
			type:'post',
			dataType:"json",
			success: function(data){
				HoldOn.close();
				if(data.code==-1){alert(data.title);return false;}
				if(data.code==1){
					swal({
					  title: "Đăng ký thành công",
					  text: "Xác nhận email để kích hoạt tài khoản! Vui lòng kiểm tra spam nếu không nhân được email.",
					  icon: "success",
					  button: "Ok!",
					}).then((willDelete) => {
						window.location.href='dang-nhap.html';
					});
				}
			}
		})
    });
	/*------------Quên mật khẩu-------------*/
	$('#btn_quenmatkhautv').click(function(e) {
        if($('#quenmatkhautv input[name="email"]').val()==''){
			alert('Vui lòng nhập email của bạn !');
			$('#quenmatkhautv input[name="email"]').focus();
			return false;
		}
		if(isEmail1($('#quenmatkhautv input[name="email"]').val()))
		{
			alert('Vui lòng nhập email của bạn !');
			$('#quenmatkhautv input[name="email"]').focus();
			return false;
		}
		HoldOn.open({
			theme:'sk-cube-grid',
		});
		$.ajax({
			url:'ajax/quenmatkhau.html',
			data:$("#quenmatkhautv").serialize(),
			type:'post',
			success: function(data){
				HoldOn.close();
				var myObj = JSON.parse(data);
				swal({
				  title: myObj.title,
				  text: myObj.thongbao,
				  icon: myObj.icon,
				  button: "Ok!",
				}).then((willDelete) => {
					if(myObj.icon=='success'){
						window.location.href='dang-nhap.html';
					}
				});
			}
		})
    });
	/******/
});
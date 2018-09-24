<?php 
	$d->reset();
	$sql_bannerin = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_bannerin);
	$row_bannerin = $d->fetch_array();

	$d->reset();
	$sql = "select noidung$lang as noidung from #_about where type='dangky' limit 0,1";
	$d->query($sql);
	$motadangky = $d->fetch_array();	

   
    $d->reset();
    $sql = "select photo$lang as photo from #_background where type='quenmatkhau' limit 0,1";
    $d->query($sql);
    $quenmatkhau = $d->fetch_array();    
?>
<div class="bg_mandangky" style="background:url(<?=_upload_hinhanh_l.$quenmatkhau['photo']?>)">
	<div class="wapper clearfix">
    	<div class="row">
        	
            <div class="col-xs-12 col-box_dk no_pad_p">
            	<div class="bx_form">
                	<form id="quenmatkhautv">
                    	<h3>Quên mật khẩu</h3>
                        <div class="input__div">
                        	<input type="text" name="email" placeholder="Email của bạn"  />
                        </div>
                        
                        <div class="text-center div_button">
                        	<button type="button" class="btn_dangnhap" id="btn_quenmatkhautv">Cấp lại mật khẩu</button>
                        </div>
                        
                         <p class="text-center quenml"><a href="dang-ky.html">Đăng ký thành viên</a> <a href="dang-nhap.html">Đăng nhập thành viên</a></p>
                        <p class="hoac_ text-center"><span>Hoặc</span></p>
                        <p class="dangkyvoi">Đăng nhập với</p>
                        <div class="dk_fb">
                        	<a href="javascript:void()"><img src="images/fbdn.png" alt="Đăng nhập facebook" /></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <p class="help_"><a href="tro-giup.html">Hỗ trợ <i class="fa fa-question-circle" aria-hidden="true"></i></a></p>
    </div>
</div>
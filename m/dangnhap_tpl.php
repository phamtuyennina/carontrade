<?php 
	$d->reset();
	$sql_bannerin = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_bannerin);
	$row_bannerin = $d->fetch_array();

	$d->reset();
	$sql = "select noidung$lang as noidung from #_about where type='dangky' limit 0,1";
	$d->query($sql);
	$motadangky = $d->fetch_array();	
?>
<div class="bg_mandangky">
	<div class="wapper clearfix">
    	<div class="row">
        	<div class="col-xs-12 col-bv_dk no_pad_p">
            	
                 <div class="noidung_dk">
                	<?php $motadangky['noidung']?>
                </div>
            </div>
            <div class="col-xs-12 col-box_dk no_pad_p">
            	<div class="bx_form">
                	<form id="dangnhapthanhvien">
                    	<h3>Đăng nhập</h3>
                        <div class="input__div">
                        	<input type="text" name="email" value="<?=$_COOKIE['name']?>" placeholder="Email của bạn"  />
                            <input type="password" name="matkhau" value="<?=$_COOKIE['matkhau']?>" placeholder="Mật khẩu của bạn"  />
                        </div>
                         <p class="ghinhotk text-left">
                         	<input id="ghinhotk" type="checkbox" name="ghinhotk" checked="checked" /> 
                             <label for="ghinhotk"></label>
                            <span>Ghi nhớ tài khoản</span>
                         </p>
                        <p class="text-right quenml"><a href="quen-mat-khau.html">Bạn quên mật khẩu ?</a></p>
                        <div class="text-center div_button">
                        	<button type="button" class="btn_dangnhap" id="btn_dangnhaptv">Đăng nhập</button>
                        </div>
                        
                         <p class="text-center quenml"><a href="dang-ky.html">Đăng ký thành viên</a></p>
                        <p class="hoac_ text-center"><span>Hoặc</span></p>
                        <p class="dangkyvoi">Đăng ký với</p>
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
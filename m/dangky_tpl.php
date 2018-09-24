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
<link href="css/HoldOn.css" type="text/css" rel="stylesheet" />
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
                    	<h3>Đăng ký thành viên</h3>
                        <p class="doituong">Bạn là <span>đối tượng</span> bán nào ?</p>
                        <ul>
                        	<li>Cá nhân</li>
                            <li>Đại lý</li>
                        </ul>
                        <div class="tabs_dkdn">
                        	<div class="tab_dkdn">
                            	<form id="dangnhapthanhvien1">
                                    <div class="input__div input__divdk">
                                        <input type="text" name="email" placeholder="Email của bạn *"  />
                                        <input type="password" name="matkhau" placeholder="Mật khẩu của bạn *"  />
                                        <input type="text" name="hoten" placeholder="Họ tên của bạn *"  />
                                        <div class="w_phanhai clearfix">
                                            <input type="text" name="phone" class="input_50" placeholder="Số điện thoại *"  />
                                            <input type="text" name="cmnd" class="input_50" placeholder="Số CMND *"  />
                                        </div>
                                        <div class="w_phanhai clearfix">
                                         	<img style="margin-top:4px;" src="captcha_image.php"  />
                                         	<input type="text" name="captcha" class="input_50" placeholder="Nhập mã captcha *"  />
                                         </div>
                                    </div>
                                    <div class="text-center div_button">
                                    	<input type="hidden" name="loaithanhvien" value="Cá nhân"  />
                                        <button type="button" class="btn_dangnhap" id="btn_dangkytv1">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab_dkdn">
                            	<form id="dangnhapthanhvien2">
                                    <div class="input__div input__divdk">
                                        <input type="text" name="email" placeholder="Email của bạn"  />
                                        <input type="password" name="matkhau" placeholder="Mật khẩu của bạn"  />
                                         <input type="text" name="hoten" placeholder="Họ tên của bạn *"  />
                                        <div class="w_phanhai clearfix">
                                            <input type="text" name="tencongty" class="input_50" placeholder="Tên công ty *"  />
                                            <input type="text" name="diachi" class="input_50" placeholder="Địa chỉ *"  />
                                        </div>
                                         <div class="w_phanhai clearfix">
                                            <input type="text" name="phone" class="input_50" placeholder="Điện thoại *"  />
                                            <input type="text" name="masothue" class="input_50" placeholder="Mã số thuế *"  />
                                        </div>
                                         <div class="w_phanhai clearfix">
                                         	<img style="margin-top:4px;" src="captcha_image1.php"  />
                                         	<input type="text" name="captcha" class="input_50" placeholder="Nhập mã captcha *"  />
                                         </div>
                                    </div>
                                    <div class="text-center div_button">
                                    	<input type="hidden" name="loaithanhvien" value="Đại lý"  />
                                        <button type="button" class="btn_dangnhap" id="btn_dangkytv2">Đăng ký</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <p class="text-center quenml"><a href="dang-nhap.html">Đăng nhập thành viên</a></p>
                </div>
            </div>
        </div>
        <p class="help_"><a href="tro-giup.html">Hỗ trợ <i class="fa fa-question-circle" aria-hidden="true"></i></a></p>
    </div>
</div>
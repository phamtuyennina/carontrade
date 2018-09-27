<div class="wap_thanhvien clearfix">
	<div class="thanhvien_left">
    	<?php include _template."layout/left-thanhvien.php";?>
    </div>
    <div class="thanhvienright">
    	<div class="tt_thanhvien">
            <p><?=$title?></p>
        </div>
				
        <div class="bx_taikhoan">
        	<form id="taikhoanthanhvien" class="clearfix" enctype="multipart/form-data" method="post">
            	<div class="w_800 clearfix">
                	<div class="row">
                    	<div class="col-xs-6 col-tt-tk">
                        	<h3>Thông tin tài khoản</h3>
                            <div class="bx_taikhoan clearfix">
                            	<p>Hình ảnh:</p>
                                <div style="width: calc(100% - 130px);">
                                	<img src="thumb/100x100x1x90/<?=_upload_thanhvien_l.getphoto_user($items_thanhvien['id'])?>" alt="<?=$items_thanhvien['hoten']?>" onError="this.src='http://placehold.it/100x100';"  /><br/>
                                    <input style="width:100%;" type="file" name="file" id="file"  />
                                </div>
                            </div>
                        	<div class="bx_taikhoan clearfix">
                            	<p>Họ Tên:</p>
                                <input type="text" autocomplete="off" name="hoten" value="<?=$items_thanhvien['hoten']?>" placeholder="Nhập họ tên"  />
                        	</div>
                            <div class="bx_taikhoan clearfix">
                            	<p>Số điện thoại:</p>
                                <input type="text" autocomplete="off" name="dienthoai" value="<?=$items_thanhvien['dienthoai']?>" placeholder="Nhập số điện thoại"  />
                        	</div>
													<div class="bx_taikhoan clearfix">
														<p>Mã giới thiệu:</p>
															<input type="text" autocomplete="off" readonly name="magioithieu" value="<?=$items_thanhvien['magioithieu']?>"   />
												</div>
                            <?php if($items_thanhvien['loaithanhvien']=='Cá nhân'){ ?>
                            <div class="bx_taikhoan clearfix">
                            	<p>Số CMND:</p>
                                <input type="text" autocomplete="off" name="cmnd" value="<?=$items_thanhvien['cmnd']?>" placeholder="Nhập số chứng minh nhân dân"  />
                        	</div>
                            <?php } if($items_thanhvien['loaithanhvien']=='Đại lý'){ ?>
                            <div class="bx_taikhoan clearfix">
                            	<p>Tên công ty:</p>
                                <input type="text" autocomplete="off" name="tencongty" value="<?=$items_thanhvien['tencongty']?>" placeholder="Nhập tên công ty"  />
                        	</div>
                             <div class="bx_taikhoan clearfix">
                            	<p>Địa chỉ:</p>
                                <input type="text" autocomplete="off" name="diachi" value="<?=$items_thanhvien['diachi']?>" placeholder="Nhập địa chỉ"  />
                        	</div>
                            <div class="bx_taikhoan clearfix">
                            	<p>Mã số thuế:</p>
                                <input type="text" autocomplete="off" name="masothue" value="<?=$items_thanhvien['masothue']?>" placeholder="Nhập mã số thuế"  />
                        	</div>
                            <?php }?>

                             <div class="bx_taikhoan clearfix">
                             	<p class="capnhat_tt">Cập nhật thông tin cá nhân</p>
                             </div>
                        </div>
                        <div class="col-xs-6 col-tt-tk">
                        	<h3>Thông tin đăng nhập</h3>
                        	<div class="bx_taikhoan clearfix">
                            	<p>Email:</p>
                                <input type="text" autocomplete="off" name="email" value="<?=$items_thanhvien['email']?>" placeholder="Nhập email"  readonly="readonly" />
                        	</div>
                            <div class="bx_taikhoan clearfix">
                            	<p>Mật khẩu cũ:</p>
                                <input type="password" name="old_matkhau" value="" placeholder="Nhập mật khẩu cũ"  />
                        	</div>
                            <div class="bx_taikhoan clearfix">
                            	<p>Mật khẩu mới:</p>
                                <input type="password" name="matkhau" value="" placeholder="Nhập mật khẩu mới"  />
                        	</div>
                            <div class="bx_taikhoan clearfix">
                             	<p class="capnhat_mk">Cập nhật mật khẩu</p>
                             </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?=$_SESSION['user_w']['id']?>"  />
            </form>
        </div>
    </div>
</div>

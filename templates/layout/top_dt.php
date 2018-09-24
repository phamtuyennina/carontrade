
<div class="nav_qes clearfix">
        	<p class="text-left">
            	Thành viên nhập thông tin xe cần bán vào các mục dưới đây
            </p>
            <p class="text-right">
            	<a href="javascript:void(0)" class="a_luulai" onclick="luunhap();">Lưu lại và hoàn tất sau</a>
                <span>hoặc</span>
                <?php if($com=='dang-tin'){ ?>
                <a href="javascript:void(0)" class="a_huybo" onclick="huytin(<?=$_SESSION['dangtin']['id_tmp']?>)">Hủy bỏ</a>
                <?php }else{?>
                <a href="javascript:void(0)" class="a_huybo" onclick="huytin_tinsua('<?=$_SESSION['dangtin']['url']?>')">Hủy bỏ</a>
                <?php }?>
            </p>
        </div>
        <ul class="tools_dangtin" data-max=<?=$_SESSION['dangtin']['max']?>>
        	<li>
            	<a href="<?=$com?>/chon-mau-xe" class="<?php if($_GET['step']=='chon-mau-xe'){echo 'act';} ?>">
                	<img src="images/dt1.png" alt="Đăng tin - Chọn mẫu xe"  /><div class="clear"></div>
                    <p>Chọn mẫu xe</p>
                </a>
            </li>
            <li>
            	<a href="<?=$com?>/chon-tinh-nang" class="<?php if($_GET['step']=='chon-tinh-nang'){echo 'act';} ?>">
                	<img src="images/dt2.png" alt="Đăng tin - Chọn tính năng"  /><div class="clear"></div>
                    <p>Chọn tính năng</p>
                </a>
            </li>
            <li>
            	<a href="<?=$com?>/mota-chi-tiet" class="<?php if($_GET['step']=='mota-chi-tiet'){echo 'act';} ?>">
                	<img src="images/dt3.png" alt="Đăng tin - Mô tả chi tiết"  /><div class="clear"></div>
                    <p>Mô tả chi tiết</p>
                </a>
            </li>
            <li>
            	<a href="<?=$com?>/dang-tai-hinh-anh" class="<?php if($_GET['step']=='dang-tai-hinh-anh'){echo 'act';} ?>">
                	<img src="images/dt4.png" alt="Đăng tin - Đăng tải hình ảnh"  /><div class="clear"></div>
                    <p>Đăng tải hình ảnh</p>
                </a>
            </li>

            <li>
            	<a href="<?=$com?>/xac-nhan" class="<?php if($_GET['step']=='xac-nhan'){echo 'act';} ?>">
                	<img src="images/dt6.png" alt="Đăng tin - Xác nhận"  /><div class="clear"></div>
                    <p>Xác nhận</p>
                </a>
            </li>
        </ul>
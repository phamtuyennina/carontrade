<div class="logo"> <a href="#" target="_blank" onclick="return false;"> <img src="images/logo.png"  alt="" /> </a></div>
<div class="sidebarSep mt0"></div>
<!-- Left navigation -->
<ul id="menu" class="nav">
  <li class="dash" id="menu1"><a class=" active" title="" href="index.php"><span>Trang chủ</span></a></li>

  <li class="categories_li search_li <?php if($_GET['com']=='quanly') echo ' activemenu' ?>" id="menu_tk"><a href="" title="" class="exp"><span>Thuộc tính đăng tin</span><strong></strong></a>
   <ul class="sub">
        <?php phanquyen_menu('Gói đăng tin','quanly','man','goitin'); ?>
   		  <?php //phanquyen_menu('Tình trạng xe','quanly','man','tintrangxe'); ?>
        <?php phanquyen_menu('Năm sản xuất','quanly','man','namsanxuat'); ?>
        <?php phanquyen_menu('Màu sắc','quanly','man','mausac'); ?>
        <?php phanquyen_menu('Giá xe','quanly','man','giaxe'); ?>
        <?php phanquyen_menu('Số ghế','quanly','man','soghe'); ?>
        <?php phanquyen_menu('Số cửa','quanly','man','socua'); ?>
        <?php phanquyen_menu('Nhiên liệu','quanly','man','loainhienlieu'); ?>
        <?php phanquyen_menu('Hộp số','quanly','man','loaihopso'); ?>
        <?php phanquyen_menu('Động cơ','quanly','man','loaidongco'); ?>
        <?php phanquyen_menu('Số km','quanly','man','sokm'); ?>
        <?php phanquyen_menu('Xuất sứ','quanly','man','xuatsu'); ?>
        <?php phanquyen_menu('Dẫn động','quanly','man','dandong'); ?>
        <?php phanquyen_menu('Mức độ tiêu thụ','quanly','man','mucdotieuthu'); ?>
    </ul>
  </li>
 
  <li class="categories_li product_li <?php if(($_GET['com']=='product' && $_GET['type']!='dinhgiaxe') || $_GET['com']=='dangtin' || $_GET['com']=='excel') echo ' activemenu' ?>" id="menu2"><a href="" title="" class="exp"><span>Quản lý đăng tin</span><strong></strong></a>
   <ul class="sub">
   		<?php phanquyen_menu('Hãng sản xuất','product','man_danhmuc','loaixe'); ?>
   		<?php phanquyen_menu('Kiểu dáng xe','product','man_danhmuc','kieu-dang'); ?>
        <?php phanquyen_menu('Quản lý mẫu xe','product','man_danhmuc','mau-xe'); ?>
        
        <?php phanquyen_menu('Quản lý đã kiểm duyệt','dangtin','man','daduyet'); ?>
        <?php phanquyen_menu('Quản lý đợi kiểm duyệt','dangtin','man','chuaduyet'); ?>
        <?php phanquyen_menu('Quản lý tin vi phạm','dangtin','man','vipham'); ?>
    </ul>
  </li>
  <li class="categories_li product_li <?php if(($_GET['com']=='product' && $_GET['type']=='dinhgiaxe') or($_GET['type']=='dinhgiaxe' or $_GET['type']=='motacapdo')) echo ' activemenu' ?>" id="menu21"><a href="" title="" class="exp"><span>Quản lý định giá xe</span><strong></strong></a>
   <ul class="sub">
   		<?php phanquyen_menu('Quản lý nhóm','product','man_danhmuc','dinhgiaxe'); ?>
        <?php phanquyen_menu('Quản lý cấp độ','product','man_list','dinhgiaxe'); ?>
         <?php phanquyen_menu('Mô tả định giá xe','about','capnhat','dinhgiaxe'); ?>
         <?php phanquyen_menu('Mô tả cấp độ','about','capnhat','motacapdo'); ?>
    </ul>
  </li>

	<li class="categories_li news_li <?php if($_GET['com']=='news' or $_GET['com']=='vnexpress') echo ' activemenu' ?>" id="menu_tt"><a href="" title="" class="exp"><span>Nội dung</span><strong></strong></a>
        <ul class="sub">  
            <?php phanquyen_menu('Quản lý tin tức','news','man','tin-tuc'); ?> 
            <?php phanquyen_menu('Quản lý đánh giá','news','man','danh-gia'); ?> 
             <?php phanquyen_menu('Trợ giúp người dùng','news','man','tro-giup-nguoi-dung'); ?> 
            <?php phanquyen_menu('Quản lý trợ giúp','news','man','tro-giup'); ?> 
            <?php phanquyen_menu('Bài viết trang chủ','news','man','bai-viet'); ?>
            <?php phanquyen_menu('Video','news','man','video'); ?>
            <?php //phanquyen_menu('Chính sách khách hàng','news','man','chinh-sach-khach-hang'); ?>
            <?php phanquyen_menu('Hỗ trợ khách hàng','news','man','ho-tro-khach-hang'); ?>             
        </ul>
      </li>
      
      
      <li class="categories_li newsletter_li <?php if($_GET['com']=='newsletter') echo ' activemenu' ?>" id="menu_nt"><a href="" title="" class="exp"><span>Đăng ký nhận tin</span><strong></strong></a>
      	<ul class="sub">
            <?php phanquyen_menu('Quản lý Đăng ký nhận tin','newsletter','man',''); ?>     
        </ul>
      </li>
   
      <li class="categories_li gallery_li <?php if($_GET['com']=='background' || $_GET['com']=='anhnen' || $_GET['com']=='slider' || $_GET['com']=='letruot') echo ' activemenu' ?>" id="menu_qc"><a href="" title="" class="exp"><span>Banner - Quảng cáo</span><strong></strong></a>
      
           <ul class="sub">
     		<?php phanquyen_menu('Cập nhật banner','background','capnhat','banner'); ?>
            <?php phanquyen_menu('Cập nhật banner trang trong','background','capnhat','banenr2'); ?>
            <?php phanquyen_menu('Cập nhật logo footer','background','capnhat','logo2'); ?>
            <?php phanquyen_menu('Cập nhật logo mobile','background','capnhat','mobile'); ?>
            <?php phanquyen_menu('Cập nhật logo mobile 2','background','capnhat','mobile2'); ?>
            <?php phanquyen_menu('Cập nhật logo trang thành viên','background','capnhat','logo3'); ?>
            <?php phanquyen_menu('Quản lý slider','slider','man_photo','slider'); ?>
            
            <?php phanquyen_menu('Quản lý chứng nhận','slider','man_photo','chungnhan'); ?>
            
            <?php phanquyen_menu('Slider trang kiểu dáng và nhà sản xuất','slider','man_photo','kieudang'); ?>
            <?php phanquyen_menu('Quản lý slider quảng cáo 1','slider','man_photo','slider1'); ?>
            <?php phanquyen_menu('Quản lý slider quảng cáo 2','slider','man_photo','slider2'); ?>
            <?php phanquyen_menu('Quản lý slider quảng cáo 3','slider','man_photo','slider3'); ?>
            <?php phanquyen_menu('Quản lý slider quảng cáo header','slider','man_photo','slider4'); ?>
            <?php phanquyen_menu('Quản lý quảng cáo trang trong','slider','man_photo','slider5'); ?>
            
            <?php phanquyen_menu('Cập nhật background đăng nhập','background','capnhat','dangnhap'); ?>
            <?php phanquyen_menu('Cập nhật background đăng ký','background','capnhat','dangky'); ?>
            <?php phanquyen_menu('Cập nhật background quên mật khẩu','background','capnhat','quenmatkhau'); ?>
     </ul>
     
      </li>

      <li class="categories_li user_li <?php if($_GET['com']=='phanquyen' || $_GET['com']=='com' || $_GET['com']=='thanhvien' || ($_GET['com']=='user' && $_GET['act']!='admin_edit')) echo ' activemenu' ?>" id="menu_pq"><a href="" title="" class="exp"><span>Phân quyền</span><strong></strong></a>
      <ul class="sub">
        <ul class="sub">
            <?php phanquyen_menu('Quản lý nhóm thành viên','phanquyen','man',''); ?>
            <?php //phanquyen_menu('Quản lý com','com','man',''); ?>
            <?php phanquyen_menu('Quản lý nhân viên','user','man',''); ?>
            <?php phanquyen_menu('Quản lý thành viên đăng ký','thanhvien','man',''); ?>
        </ul>
        </ul>
      </li>

     <li class="categories_li about_li <?php if(($_GET['com']=='about' && ($_GET['type']!='dinhgiaxe' && $_GET['type']!='motacapdo')) || $_GET['com']=='video') echo ' activemenu' ?>" id="menu_t"><a href="" title="" class="exp"><span>Trang tĩnh</span><strong></strong></a>
    <ul class="sub">
        <?php phanquyen_menu('Giới thiệu','about','capnhat','about'); ?>
        <?php phanquyen_menu('Tuyển dụng','about','capnhat','tuyen-dung'); ?>
       
        <?php phanquyen_menu('Hợp tác','about','capnhat','hop-tac'); ?>
        <?php phanquyen_menu('Chính sách bảo mật','about','capnhat','baomat'); ?>
        <?php phanquyen_menu('Trợ giúp người bán','about','capnhat','tro-giup-nguoi-ban'); ?>
        <?php phanquyen_menu('Quy định đăng tin','about','capnhat','quy-dinh-dang-tin'); ?>
        <?php phanquyen_menu('Cập nhật liên hệ','about','capnhat','lienhe'); ?>
        <?php phanquyen_menu('Cập nhật footer','about','capnhat','footer'); ?>
        <?php phanquyen_menu('Bài viết đăng ký','about','capnhat','dangky'); ?>
        
        <?php phanquyen_menu('Link slider','about','capnhat','link'); ?>

        </ul>
  </li>

     <li class="categories_li setting_li <?php if($_GET['com']=='lkweb' || $_GET['com']=='yahoo' || $_GET['com']=='binhluan' || $_GET['com']=='company' || $_GET['act']=='admin_edit' || $_GET['com']=='video') echo ' activemenu' ?>" id="menu_cp"><a href="" title="" class="exp"><span>Nội dung khác</span><strong></strong></a>
  	<ul class="sub">
        <?php phanquyen_menu('Quản lý đánh giá web','binhluan','man_web',''); ?>
        <li<?php if($_GET['act']=='man_user') echo ' class="this"' ?>>
        	<a href="index.php?com=binhluan&act=man_user&id_user=0">Quản lý đánh giá thành viên</a>
        </li>
		<?php phanquyen_menu('Quản lý mạng xã hội','lkweb','man','xahoi'); ?>
         <?php phanquyen_menu('Quản lý liên kết link','lkweb','man','lienket'); ?>
    	<?php //phanquyen_menu('Video','video','man',''); ?>
        <?php //phanquyen_menu('Quản lý hỗ trợ trực tuyến','yahoo','man',''); ?>
        <?php phanquyen_menu('Cập nhật thông tin công ty','company','capnhat',''); ?>
         <li<?php if($_GET['act']=='admin_edit') echo ' class="this"' ?>><a href="index.php?com=user&act=admin_edit">Quản lý Tài Khoản</a></li>
    </ul>
  </li>
</ul>
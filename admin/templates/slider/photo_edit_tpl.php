<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=slider&act=man_photo<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Hình ảnh</span></a></li>
                        <li class="current"><a href="#" onclick="return false;">Sửa hình ảnh</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=slider&act=save_photo&id=<?=$_REQUEST['id'];?><?php if($_REQUEST['id_slider']!='') echo'&id_slider='. $_REQUEST['id_slider'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?><?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Sửa hình ảnh</h6>
		</div>		
        
        <ul class="tabs">
           
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
           <?php foreach ($config['lang'] as $key => $value) { ?>
           <li>
               <a href="#content_lang_<?=$key?>"><?=$value?></a>
           </li>
           <?php } ?>


       </ul>
       
       
       <div id="info" class="tab_content"> 
			
        	        
        <div class="formRow">
            <label>Link liên kết: </label>
            <div class="formRight">
                <input type="text" id="price" name="link" value="<?=@$item['link']?>"  title="Nhập link liên kết cho hình ảnh" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>              
		<div class="formRow">
			<label>Upload hình ảnh:</label>
			<div class="formRight">
            					<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <div class="note">  <?php if($_REQUEST['type']=='slider')echo 'Width:1366px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:600px '; ?> 
				<?php if($_REQUEST['type']=='slider1')echo 'Width:380px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:335px '; ?> 
                <?php if($_REQUEST['type']=='slider2')echo 'Width:1366px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:300px '; ?>   
                <?php if($_REQUEST['type']=='slider3')echo 'Width:390px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:130px '; ?> 
                <?php if($_REQUEST['type']=='slider4')echo 'Width:550px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:80px '; ?>
                <?php if($_REQUEST['type']=='slider5')echo 'Width:350px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:340px '; ?>    
				<?php if($_REQUEST['type']=='kieudang')echo 'Width:1366px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:390px '; ?>
                <?php if($_REQUEST['type']=='chungnhan')echo 'Width:225px &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Height:85px '; ?>
				<?=_format_duoihinh_l?> </div>
			</div>
			<div class="clear"></div>
         </div> 
          
        <div class="formRow">           
            <label>Hình ảnh hiện tại: </label>      
            <div class="formRight">          
            <img src="<?=_upload_hinhanh.$item['photo']?>"  alt="NO PHOTO" style="max-height:100px; max-width:800px;" />
            <br />
            </div>
            
            <div class="clear"></div>
		</div>
		<?php if($_REQUEST['type']=='slider4' or $_REQUEST['type']=='slider5') { ?> 
        <div class="formRow">
			<label>Giao diện</label> 
			<div class="formRight"> 
            	<div class="selector">
					<select id="giaodien" name="giaodien" class="main_font">
                    	<option>Chọn giao diện</option>
                    	<?php /*?><option <?php if($item['giaodien']==''){echo 'selected';} ?> value="">Trang chủ</option><?php */?>
                     	<option <?php if($item['giaodien']=='gioi-thieu'){echo 'selected';} ?> value="gioi-thieu">Giới thiệu</option>
                        <option <?php if($item['giaodien']=='huong-dan-thanh-toan'){echo 'selected';} ?> value="huong-dan-thanh-toan">Hướng dẫn thanh toán</option>
                        <option <?php if($item['giaodien']=='huong-dan-dang-tin'){echo 'selected';} ?> value="huong-dan-dang-tin">Hướng dẫn đăng tin</option>
                        <option <?php if($item['giaodien']=='huong-dan-dang-ky-thanh-vien'){echo 'selected';} ?> value="huong-dan-dang-ky-thanh-vien">Hướng dẫn đăng ký thành viên</option>
                        <option <?php if($item['giaodien']=='ho-tro-khach-hang'){echo 'selected';} ?> value="ho-tro-khach-hang">Hỗ trợ khách hàng</option>
                        <option <?php if($item['giaodien']=='tro-giup-nguoi-dung'){echo 'selected';} ?> value="tro-giup-nguoi-dung">Trợ giúp người dùng</option>
                        <option <?php if($item['giaodien']=='hop-tac'){echo 'selected';} ?> value="hop-tac">Hợp tác</option>
                        <option <?php if($item['giaodien']=='tuyen-dung'){echo 'selected';} ?> value="tuyen-dung">Tuyển dụng</option>
                        <option <?php if($item['giaodien']=='lien-he'){echo 'selected';} ?> value="lien-he">Liên hệ</option>
                        <option <?php if($item['giaodien']=='chinh-sach-bao-mat'){echo 'selected';} ?> value="chinh-sach-bao-mat">Chính sách bảo mật</option>
                        <option <?php if($item['giaodien']=='tin-tuc'){echo 'selected';} ?> value="tin-tuc">Tin tức</option>
                        <option <?php if($item['giaodien']=='danh-gia'){echo 'selected';} ?> value="danh-gia">Đánh giá</option>
                        <option <?php if($item['giaodien']=='video'){echo 'selected';} ?> value="video">Video</option>
                        <option <?php if($item['giaodien']=='hoi-dap-ve-xe'){echo 'selected';} ?> value="hoi-dap-ve-xe">Hỏi đáp về xe</option>
                        <?php if($_GET['type']=='slider4'){ ?>
                        <option <?php if($item['giaodien']=='tro-giup'){echo 'selected';} ?> value="tro-giup">Trợ giúp</option>
                        <?php }?>
                        <?php if($_GET['type']=='slider4'){ ?>
                        <option <?php if($item['giaodien']=='bai-viet'){echo 'selected';} ?> value="bai-viet">Bài viết trang chủ</option>
                        <?php }?>
                        <option <?php if($item['giaodien']=='dinh-gia-xe'){echo 'selected';} ?> value="dinh-gia-xe">Định giá xe</option>
                        <option <?php if($item['giaodien']=='quy-dinh-dang-tin'){echo 'selected';} ?> value="quy-dinh-dang-tin">Quy định đăng tin</option>
                        <option <?php if($item['giaodien']=='tro-giup-nguoi-ban'){echo 'selected';} ?> value="tro-giup-nguoi-ban">Trợ giúp người bán</option>
                         <?php if($_GET['type']=='slider4'){ ?>
                        <option <?php if($item['giaodien']=='danh-gia-chung-toi'){echo 'selected';} ?> value="danh-gia-chung-toi">Đánh giá chúng tôi</option>
                        <?php }?>
                        <option <?php if($item['giaodien']=='tim-kiem'){echo 'selected';} ?> value="tim-kiem">Tất cả xe</option>
                        <option <?php if($item['giaodien']=='tim-xe'){echo 'selected';} ?> value="tim-xe">Tìm xe</option>
                        <option <?php if($item['giaodien']=='xe-ca-nhan'){echo 'selected';} ?> value="xe-ca-nhan">Xe cá nhân</option>
                        <option <?php if($item['giaodien']=='xe-dai-ly'){echo 'selected';} ?> value="xe-dai-ly">Xe đại lý</option>
                          <option <?php if($item['giaodien']=='chi-tiet'){echo 'selected';} ?> value="chi-tiet">Chi tiết tin đăng</option>
                    </select>
                </div>
			</div>
			<div class="clear"></div>
		</div>
        <?php }?>
       <?php if($_REQUEST['type']=='letruot') { ?> 
        <div class="formRow">           
            <label>Vị trí: </label>      
            <div class="formRight">          
                <select id="vitri" name="vitri" class="main_select">
                	<option value="left" <?php if($item['vitri']=='left') echo 'selected="selected"' ?>>Bên trái</option>			
                	<option value="right" <?php if($item['vitri']=='right') echo 'selected="selected"' ?>>Bên phải</option>	
                </select>
            <br />
            </div>
            
            <div class="clear"></div>
		</div>
        <?php } ?>
        
        <div class="formRow">
          <label>Tùy chọn: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Check vào những tùy chọn "> </label>
          <div class="formRight">           
            <input type="checkbox" name="hienthi" id="check1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />

            <label for="check1">Hiển thị</label>           
          </div>
          <div class="clear"></div>
        </div>
        
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" original-title="Số thứ tự của hình ảnh, chỉ nhập số">
            </div>
            <div class="clear"></div>
        </div>
        
        </div>
       
       <!-- End info -->
       
       <?php foreach ($config['lang'] as $key => $value) {
        ?>
        
        <div id="content_lang_<?=$key?>" class="tab_content">     
        
        	<div class="formRow">   
            <label>Tên hình ảnh</label>
            <div class="formRight">
                <input type="text" name="ten<?=$key?>" title="Nhập tên hình ảnh ( <?=$key?> )" id="ten<?=$key?>" class="tipS validate[required]" value="<?=@$item['ten'.$key]?>" />
            </div>
            <div class="clear"></div>
            </div>
        
        
        </div><!-- End content <?=$key?> -->
        
        <?php } ?>

			
	<div class="formRow">
			<div class="formRight">
            <input type="hidden" name="type" id="type" value="<?=$_REQUEST['type']?>" />
                <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>     
		
	</div>
   
</form>   

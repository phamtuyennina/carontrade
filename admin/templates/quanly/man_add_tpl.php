<script src="js/jquery.priceformat.js"></script>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=product&act=man_danhmuc<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Danh mục</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
	$(document).ready(function(e) {
        $('.conso').priceFormat({ 
			limit: 13, 
			prefix: '', 
			centsLimit: 0 
		});  
    });
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=quanly&act=save<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

     <div class="widget">
         <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Nhập dữ liệu</h6>
        </div>
       <ul class="tabs">
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
       </ul>

       <div id="info" class="tab_content">
          <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
        <div class="formRow <?php if($_GET['type']=='giaxe' or $_GET['type']=='sokm'){echo 'none';} ?>">
            <label>Tên</label>
            <div class="formRight">
                <input type="text" name="ten" title="Nhập tên" id="ten" class="tipS" value="<?=@$item['ten']?>" />
            </div>
            <div class="clear"></div>
        </div> 
        <div class="formRow <?php if($_GET['type']!='mucdotieuthu'){echo 'none';} ?>">
            <label>Mức độ tiêu thụ</label>
            <div class="formRight">
                <input type="text" name="mucdotieuthu" title="Nhập mức độ tiêu thụ L/100Km" id="gia" class="tipS conso" value="<?=@$item['mucdotieuthu']?>" />
            </div>
            <div class="clear"></div>
        </div>  
        <div class="formRow <?php if($_GET['type']!='tin-thuong' && $_GET['type']!='tin-tiet-kiem' && $_GET['type']!='tin-linh-dong' && $_GET['type']!='tin-supper' && $_GET['type']!='tin-khuyen-mai'){echo 'none';} ?>">
            <label>Thời gian</label>
            <div class="formRight">
                <input type="text" name="thoigian" title="Nhập thời gian" id="gia" class="tipS conso" value="<?=@$item['thoigian']?>" />
            </div>
            <div class="clear"></div>
        </div>  
        
        <div class="formRow <?php if($_GET['type']!='giaxe' && $_GET['type']!='tin-thuong' && $_GET['type']!='tin-tiet-kiem' && $_GET['type']!='tin-linh-dong' && $_GET['type']!='tin-supper' && $_GET['type']!='tin-khuyen-mai'){echo 'none';} ?>">
            <label>Giá</label>
            <div class="formRight">
                <input type="text" name="gia" title="Nhập giá" id="gia" class="tipS conso" value="<?=@$item['gia']?>" />
            </div>
            <div class="clear"></div>
        </div>  
         <div class="formRow <?php if($_GET['type']!='sokm'){echo 'none';} ?>">
            <label>Số km</label>
            <div class="formRight">
                <input type="text" name="sokm" title="Nhập số km" id="sokm" class="tipS conso" value="<?=@$item['sokm']?>" />
            </div>
            <div class="clear"></div>
        </div>  
        
        <div class="formRow none">
            <label>Mô tả dịch vụ:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung mô tả" class="tipS description_input" name="mota"><?=@$item['mota']?></textarea>
                <b>(Tốt nhất là 68 - 170 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        <?php if($_GET['type']=='tintrangxe'){ 
          $arr_apdung=explode(',',@$item['apdung']);
        
          ?>
        <div class="formRow">
            <label>Áp dụng: <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Áp dụng ! "> </label>
           <div class="formRight">
             <label for="check2">
<input type="checkbox" name="apdung" id="check2" <?=(in_array('Cá nhân',$arr_apdung))?'checked="checked"':''?> />
               <span style="position: relative;top: 4px;">Cá nhân</span>
           </label>
           <label for="check3">
<input type="checkbox" name="apdung1" id="check3" <?=(in_array('Đại lý',$arr_apdung))?'checked="checked"':''?> />
             <span style="position: relative;top: 4px;">Đại lý</span>
         </label>
           </div>
             <div class="clear"></div>
        </div>
        <?php }?>
        <div class="formRow">
          <label>Hiển thị : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
          <div class="formRight">
         
            <input type="checkbox" name="hienthi" id="check1" <?=(!isset($item['hienthi']) || $item['hienthi']==1)?'checked="checked"':''?> />
             <label>Số thứ tự: </label>
              <input type="text" class="tipS" value="<?=isset($item['stt'])?$item['stt']:1?>" name="stt" style="width:20px; text-align:center;" onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" original-title="Số thứ tự của danh mục, chỉ nhập số">
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <div class="formRight">
                
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
                <a href="index.php?com=quanly&act=man_danhmuc<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='.$_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
            </div>
            <div class="clear"></div>
        </div>
       </div>
    </div>

</form>   

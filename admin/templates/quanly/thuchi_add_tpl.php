<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	            <li><a href="index.php?com=product&act=man_thuchi<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Danh mục</span></a></li>
                                    <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}
	
</script>
<form name="supplier" id="validate" class="form" action="index.php?com=quanly&act=save_thuchi<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

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
        <div class="formRow">
            <label>Loại hình</label>
            <div class="formRight">
               <select id="loaihinh" style="width:120px;" name="loaihinh" class="main_select select_danhmuc">
               		<option value="1">Thu</option>
                    <option value="0">Chi</option>
               </select>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow">
            <label>Tên</label>
            <div class="formRight">
                <input type="text" name="ten" title="Nhập giá" id="ten" class="tipS" value="<?=@$item['ten']?>" />
            </div>
            <div class="clear"></div>
        </div> 
         
          
        <div class="formRow">
            <label>Số tiền</label>
            <div class="formRight">
                <input type="text" name="gia" title="Nhập giá" id="ten" class="tipS" value="<?=@$item['gia']?>" />
            </div>
            <div class="clear"></div>
        </div> 
         
        <div class="formRow">
            <label>Mô tả:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung mô tả" class="tipS description_input" name="mota"><?=@$item['mota']?></textarea>
                <b>(Tốt nhất là 68 - 170 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
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
                <a href="index.php?com=quanly&act=man_thuchi<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='.$_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
            </div>
            <div class="clear"></div>
        </div>
       </div>
    </div>

</form>   


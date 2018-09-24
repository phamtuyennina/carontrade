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
	
</script>
<style type="text/css">
.nhaplieu .btn {
    background: #023e61;
    padding: 8px 20px;
    width: auto;
	float:left;
    color: #FFFFFF;
    font-size: 11px;
    text-transform: uppercase;
    font-weight: bold;
    /* border: 1px solid #90cff9; */
    margin: 0px 5px 5px 2px;
    border-radius: 0px;
}
</style>
<form name="supplier" id="validate" class="form" action="index.php?com=quanly&act=save_code<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

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
			<?php 
                if ($_REQUEST['act']=='edit_code'){
            ?>
            <label>Mã giảm giá</label>
            <div class="formRight">
              <input type="text" name="macode" style="width:26%" value="<?=@$item['macode']?>" class="tipS in_mac"  />
              
            </div>
             <div class="clear"></div>
            <?php	
                }else{
            ?>
            <label>Mã giảm giá</label>
             <div class="formRight">
                <input id="macodez" type="text" style="width:26%;top:1px;position:relative" name="macode" />
                <input style="position: relative;" type="button" value="Cấp mã khác" class="btn btn_voucher" />
             </div>
             <div class="clear"></div>
            <?php	
                }
            ?>
        </div>  
        <div class="formRow">
            <label>Phần trăm giảm</label>
            <div class="formRight">
                <input type="text" name="phantram" style="width:39%;" title="Nhập giá" id="ten" class="tipS" value="<?=@$item['phantram']?>" />
            </div>
            <div class="clear"></div>
        </div> 
        <div class="formRow none">
            <label>Mô tả:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung mô tả" class="tipS description_input" name="mota"><?=@$item['mota']?></textarea>
                <b>(Tốt nhất là 68 - 170 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Đã sử dụng : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>
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
<script>
	function taocode(){
		$.ajax({
			url:'ajax/taoma.php',
			type:'POST',
			success:function(data){
				$('#macodez').val(data);
			}
		})
	}
	$(document).ready(function(){
		taocode();
		$('.btn_voucher').click(function(){
			taocode();
		})
	})
</script>

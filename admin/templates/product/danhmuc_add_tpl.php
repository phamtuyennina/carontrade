<script type="text/javascript">
	$(document).ready(function(e) {
        $('#id_thuonghieu1').change(function(e) {
            var q=$(this).val();
			$.ajax({
				type:"POST",
				url:"ajax/loaddm.php",
				data:{id:q,table:'product',act:'kieudang'},
				success: function(data){
					$('.load_kieudang').html(data);
					$("#id_kieudang").chosen();
				}
			})
        });
    });
</script>
<link href="css/select2.min.css" rel="stylesheet" type="text/css" />
<script src="js/select2.min.js"></script>
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
	$(document).ready(function() {
		$('.js-example-basic-multiple').select2();
	});
</script>
<?php	
	error_reporting(0);
	function get_main_nhasanxuat($id=0)
	{
		
		$ar_mang=explode(',',$id);
		$sql_huyen="select * from table_product_danhmuc where type='loaixe' order by stt,id desc ";
		$result=mysql_query($sql_huyen);
		$str='
			<select class="js-example-basic-multiple" name="id_thuonghieu[]" id="id_thuonghieu" multiple="multiple">';
		while ($row_huyen=@mysql_fetch_array($result)) 
		{
			if(in_array($row_huyen["id"],$ar_mang))
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row_huyen["id"].' '.$selected.'>'.$row_huyen["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}

function get_main_hang($id)
	{
		$sql="select * from table_product_danhmuc where type='loaixe' order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="id_thuonghieu1" name="id_thuonghieu" data-placeholder="Chọn nhà sản xuất" class="main_select select_danhmuc chzn-select">
			<option value="0">Chọn nhà sản xuất</option>	
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$id)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	function get_main_kieudang($id)
	{
		$sql="select * from table_product_danhmuc where type='kieu-dang' and find_in_set(".$_REQUEST['id_thuonghieu'].",id_thuonghieu) order by stt";
		
		$stmt=mysql_query($sql);
		$str='
			<select id="id_kieudang" name="id_kieudang" data-placeholder="Chọn kiểu dáng" class="main_select select_danhmuc chzn-select">
			<option value="0">Chọn kiểu dáng</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$id)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
?>
<form name="supplier" id="validate" class="form" action="index.php?com=product&act=save_danhmuc<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

     <div class="widget">
         <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Nhập dữ liệu</h6>
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
          

         <?php if($_GET['type']=='kieu-dang'){ ?>
         <div class="formRow">
			<label>Chọn nhà sản xuất</label>
			<div class="formRight">
			<?=get_main_nhasanxuat(@$item['id_thuonghieu'])?>
			</div>
			<div class="clear"></div>
		</div>
         <?php }?>
          <?php if($_GET['type']=='mau-xe'){ ?>
          <div class="formRow">
			<label>Chọn nhà sản xuất</label>
			<div class="formRight">
			<?=get_main_hang(@$item['id_thuonghieu'])?>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Chọn kiểu dáng</label>
			<div class="formRight load_kieudang">
			<?=get_main_kieudang(@$item['id_kieudang'])?>
			</div>
			<div class="clear"></div>
		</div>
          <?php } ?>
        <div class="formRow <?php if($_GET['type']=='dinhgiaxe'){echo 'none';} ?>">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<?php if($_GET['type']=='kieu-dang'){ ?>
                <div class="note"> Height:115px | Width:200px  <?=_format_duoihinh_l?> </div>
                <?php }?>
                <?php if($_GET['type']=='loaixe'){ ?>
                <div class="note"> Height:90px | Width:180px  <?=_format_duoihinh_l?> </div>
                <?php }?>
                 <?php if($_GET['type']=='mau-xe'){ ?>
                <div class="note"> Height:160px | Width:360px  <?=_format_duoihinh_l?> </div>
                <?php }?>
			</div>
			<div class="clear"></div>
		</div>
         <?php if($_GET['act']=='edit_danhmuc'){?>
		<div class="formRow <?php if($_GET['type']=='dinhgiaxe'){echo 'none';} ?>">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_sanpham.$item['photo']?>"  width="100px" alt="NO PHOTO" width="100" /></div>

			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
        <?php if($_GET['type']=='kieu-dang' or $_GET['type']=='loaixe'){ ?>
        <div class="formRow">
			<label>Tải banner:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file1" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
                <div class="note"> Height:1356px | Width:385px  <?=_format_duoihinh_l?> </div>
			</div>
			<div class="clear"></div>
		</div>
         <?php if($_GET['act']=='edit_danhmuc'){?>
		<div class="formRow">
			<label>Banner hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_sanpham.$item['banner']?>"  width="100px" alt="NO PHOTO" width="100" /></div>

			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>
        <?php }?> 
 		<div class="formRow <?php if($_GET['type']=='dinhgiaxe'){echo 'none';} ?><?php if($_GET['type']=='mau-xe1'){echo 'none';} ?>">
            <label>Title</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="formRow <?php if($_GET['type']=='dinhgiaxe'){echo 'none';} ?><?php if($_GET['type']=='mau-xe1'){echo 'none';} ?>">
            <label>Từ khóa</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho bài viết" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="formRow <?php if($_GET['type']=='dinhgiaxe'){echo 'none';} ?><?php if($_GET['type']=='mau-xe1'){echo 'none';} ?>">
            <label>Description:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS description_input" name="description"><?=@$item['description']?></textarea>
                <b>(Tốt nhất là 68 - 170 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow none">
          <label>Nổi bật : <img src="./images/question-button.png" alt="Chọn loại" class="icon_que tipS" original-title="Bỏ chọn để không hiển thị danh mục này ! "> </label>

         <div class="formRight">
            <input type="checkbox" name="noibat" id="check1" <?=(!isset($item['noibat']) || $item['noibat']==1)?'checked="checked"':''?> />
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
                <a href="index.php?com=product&act=man_danhmuc<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='.$_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
            </div>
            <div class="clear"></div>
        </div>

       </div>
       <!-- End info -->
        <?php foreach ($config['lang'] as $key => $value) {
        ?>

       <div id="content_lang_<?=$key?>" class="tab_content">        
            <div class="formRow">
            <label>Tên bài viết</label>
            <div class="formRight">
                <input type="text" name="ten<?=$key?>" title="Nhập tên bài viết" id="ten<?=$key?>" class="tipS" value="<?=@$item['ten'.$key]?>" />
            </div>
            <div class="clear"></div>
        </div>  

       <div class="formRow none <?php if($_GET['type']!='dinhgiaxe'){echo 'none';} ?>">
            <label>Mô tả cấp độ:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Viết mô tả ngắn bài viết" class="ck_editor" name="mota<?=$key?>" id="mota<?=$key?>"><?=@$item['mota'.$key]?></textarea>
            </div>
            <div class="clear"></div>
        </div>  

        <div class="formRow">
            <div class="formRight">
            	<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
                 <a href="index.php?com=product&act=man_danhmuc<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='.$_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
            </div>
            <div class="clear"></div>
        </div>

       </div><!-- End content <?=$key?> -->
      
     <?php } ?>
 

    </div>
<input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
</form>   


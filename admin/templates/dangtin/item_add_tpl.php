
<script type="text/javascript" src="js/jquery.photobox.js"></script>
<link rel="stylesheet" type="text/css" href="css/photobox.css" media="screen" />
<script type="text/javascript">

$(document).ready(function(e) {
	 $('#imgzzz').photobox('a.fancy',{ time:0 });
	$('#quan').change(function(e) {
		var id=$(this).val();
		$.ajax({
			type:'post',
			url:'ajax/goithanhpho.php',
			data:{id:id,act:'city'},
			success:function(kq){
				$('#form_dist').html(kq);
			}
		});
	});
	$('#id_thuonghieu').change(function(e) {
		var id=$(this).val();
		if(id==''){return false;}
		$.ajax({
			url:'ajax/goithanhpho.php',
			data:{id:id,act:'hangxe'},
			dataType:"json",
			type:"post",
			success: function(data){
				$('#id_kieudang').html(data.kieudang);
				$('#id_mauxe').html(data.mauxe);
			}
		})
	});
	$('#id_kieudang').change(function(e) {
        var id=$(this).val();
		if(id==''){return false;}
		$.ajax({
			url:'ajax/goithanhpho.php',
			data:{id:id,act:'kieuxe'},
			dataType:"json",
			type:"post",
			success: function(data){
				$('#id_mauxe').html(data.mauxe);
			}
		})
    });	
});
</script>
<?php

function get_city($id)
	{
		$sql="select * from table_place_city order by stt";
		
		$stmt=mysql_query($sql);
		$str='
			<select style="width:100%" id="quan" name="quan" class="main_select select_danhmuc">
			<option>Chọn Thành phố</option>			
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
function get_dist($quan,$huyen)
	{
		$sql="select * from table_place_dist where id_city=".$quan."  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="huyen" name="huyen" class="main_select select_danhmuc">
			<option>Chọn quận huyện</option>			
			';
		while ($row=@mysql_fetch_array($stmt)) 
		{
			if($row["id"]==(int)@$huyen)
				$selected="selected";
			else 
				$selected="";
			$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
		}
		$str.='</select>';
		return $str;
	}
	

function get_hang($id)
	{
	$sql="select * from table_product_danhmuc where type='loaixe' order by stt";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="id_thuonghieu" name="id_thuonghieu" class="main_select select_danhmuc">
		<option>Chọn hãng xe</option>			
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

function get_kieudang($id)
	{
	$sql="select * from table_product_danhmuc where type='kieu-dang' and find_in_set(".$_GET['id_hang'].",id_thuonghieu) order by stt";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="id_kieudang" name="id_kieudang" class="main_select select_danhmuc">
		<option>Chọn kiểu dáng</option>			
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
function get_mauxe($id)
	{
	$sql="select * from table_product_danhmuc where type='mau-xe' and ( id_thuonghieu=".$_GET['id_hang']." or id_kieudang=".$_GET['id_kieudang']." ) order by stt";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="id_mauxe" name="id_mauxe" class="main_select select_danhmuc">
		<option>Chọn mẫu xe</option>			
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
function get_nam($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='namsanxuat' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="nam" name="nam" class="main_select select_danhmuc">
		<option>Chọn năm</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["tenkhongdau"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["tenkhongdau"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}

function get_ghe($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='soghe' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="soghe" name="soghe" class="main_select select_danhmuc">
		<option>Chọn số ghế</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["tenkhongdau"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["tenkhongdau"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}
function get_socua($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='socua' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="socua" name="socua" class="main_select select_danhmuc">
		<option>Chọn số cửa</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["tenkhongdau"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["tenkhongdau"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}
function get_mausac($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='mausac' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="mausac" name="mausac" class="main_select select_danhmuc">
		<option>Chọn màu sắc</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["tenkhongdau"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["tenkhongdau"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}
function get_loainhienlieu($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='loainhienlieu' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="nhienlieu" name="nhienlieu" class="main_select select_danhmuc">
		<option>Chọn nhiên liệu</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["tenkhongdau"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["tenkhongdau"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}

function get_loaihopso($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='loaihopso' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="hopso" name="hopso" class="main_select select_danhmuc">
		<option>Chọn hộp số</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["tenkhongdau"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["tenkhongdau"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}

function get_loaidongco($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='loaidongco' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="dongco" name="dongco" class="main_select select_danhmuc">
		<option>Chọn động cơ</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["tenkhongdau"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["tenkhongdau"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}

function get_xuatsu($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='xuatsu' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="xuatsu" name="xuatsu" class="main_select select_danhmuc">
		<option>Chọn xuất sứ</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["id"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}


function get_dandong($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='dandong' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="dandong" name="dandong" class="main_select select_danhmuc">
		<option>Chọn dẫn động</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["id"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}


function get_mucdotieuhao($id)
	{
		
	$sql="select * from table_quanly_danhmuc where type='mucdotieuhao' order by ten desc";
	
	$stmt=mysql_query($sql);
	$str='
		<select style="width:100%" id="mucdotieuhao" name="mucdotieuhao" class="main_select select_danhmuc">
		<option>Chọn mức độ tiêu thụ (L/100Km)</option>			
		';
	while ($row=@mysql_fetch_array($stmt)) 
	{
		
		if($row["id"]==(string)@$id)
			$selected="selected";
		else 
			$selected="";
		$str.='<option value='.$row["id"].' '.$selected.'>'.$row["ten"].'</option>';			
	}
	$str.='</select>';
	return $str;
}




	$d->reset();
	$sql_images="select * from #_hinhanh where id_hinhanh='".$item['id']."' and type='".$_GET['type']."' order by stt, id desc ";
	$d->query($sql_images);
	$ds_photo=$d->result_array();
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	   <li><a href="index.php?com=dangtin&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Sản phẩm</span></a></li>
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

<form name="supplier" id="validate" class="form" action="index.php?com=dangtin&act=save&p=<?=$_REQUEST['p']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" method="post" enctype="multipart/form-data">

     <div class="widget">
         <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Nhập dữ liệu</h6>
        </div>
       <ul class="tabs">
           
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
           <?php 
		   	$config['lang']=array(''=>'Nội dung');
		   foreach ($config['lang'] as $key => $value) { ?>
           <li>
               <a href="#content_lang_<?=$key?>"><?=$value?></a>
           </li>
            <li>
               <a href="#user">Thông tin liên hệ</a>
           </li>
           <?php } ?>


       </ul>

       <div id="info" class="tab_content">
          <input type="hidden" name="id" id="id_this_post" value="<?=@$item['id']?>" />
		<div class="formRow">
        	<div class="bx_sl1">
                <label>Chọn hãng xe</label>
                <div class="formRight">
                <?=get_hang(@$item['id_hang'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
               <label>Chọn kiểu dáng</label>
                <div class="formRight">
                <?=get_kieudang(@$item['id_kieudang'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
               <label>Chọn mẫu xe</label>
                <div class="formRight">
                <?=get_mauxe(@$item['id_mauxe'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
		</div>
        
        <div class="formRow">
        	<div class="bx_sl1">
                <label>Năm</label>
                <div class="formRight">
                <?=get_nam(@$item['nam'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
                <label>Số ghế</label>
                <div class="formRight">
                <?=get_ghe(@$item['soghe'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
                <label>Số cửa</label>
                <div class="formRight">
                <?=get_socua(@$item['socua'])?>
                </div>
                <div class="clear"></div>
            </div>
             <div class="clear"></div>
        </div>
        <div class="formRow">
        	<div class="bx_sl1">
                <label>Chọn hộp số</label>
                <div class="formRight">
                <?=get_loaihopso(@$item['hopso'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
                <label>Chọn động cơ</label>
                <div class="formRight">
                <?=get_loaidongco(@$item['dongco'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
                <label>Chọn nhiên liệu</label>
                <div class="formRight">
                <?=get_loainhienlieu(@$item['nhienlieu'])?>
                </div>
                <div class="clear"></div>
            </div>
        	 <div class="clear"></div>
        </div>
        <div class="formRow">
        	<div class="bx_sl1">
                <label>Chọn xuất sứ</label>
                <div class="formRight">
                <?=get_xuatsu(@$item['xuatsu'])?>
                </div>
                <div class="clear"></div>
            </div>
        	<div class="bx_sl1">
                <label>Chọn dẫn động</label>
                <div class="formRight">
                <?=get_dandong(@$item['dandong'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
                <label style="letter-spacing: -1px;">Mức độ tiêu thụ (L/100Km)</label>
                <div class="formRight">
                <?=get_mucdotieuhao(@$item['mucdotieuhao'])?>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="clear"></div>
        </div>
        <div class="formRow">
        	<div class="bx_sl1">
                <label>Chọn màu sắc</label>
                <div class="formRight">
                <?=get_mausac(@$item['mausac'])?>
                </div>
                <div class="clear"></div>
            </div>
        	<div class="bx_sl1">
                <label>Số km đã đi</label>
                <div class="formRight">
                <input type="text" value="<?=@$item['sokm']?>" name="sokm" title="Số km đã đi" class="tipS conso" />
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
                <label>Giá bán</label>
                <div class="formRight">
                <input type="text" value="<?=@$item['giatien']?>" name="giatien" title="" class="tipS conso" />
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="clear"></div>
        </div>
        
        <div class="formRow">
        	<div class="bx_sl1">
                <label>Tình trạng</label>
                <div class="formRight">
                	<select id="tinhtrang" name="tinhtrang" class="main_select select_danhmuc">
                    	<option <?php if($item['tinhtrang']=='xe-da-su-dung'){echo 'selected="selected"';} ?> value="xe-da-su-dung">Xe đã qua sử dụng</option>
                        <option <?php if($item['tinhtrang']=='xe-moi'){echo 'selected="selected"';} ?> value="xe-moi">Xe mới</option>
                    </select>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
               <label>Tỉnh/Thành phố</label>
                <div class="formRight">
                <?=get_city($item['quan'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="bx_sl1">
               <label>Quận/Huyện</label>
                <div class="formRight" id="form_dist">
                <?=get_dist($item['quan'],$item['huyen'])?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
		</div>

        <div class="formRow none">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<input type="file" id="file" name="file" />
				<img src="./images/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình ảnh (ảnh JPEG, GIF , JPG , PNG)">
				<div class="note"> Height:450px | Width:670px  <?=_format_duoihinh_l?> </div>
			</div>
			<div class="clear"></div>
		</div>
         <?php if($_GET['act']=='edit'){?>
		<div class="formRow none">
			<label>Hình Hiện Tại :</label>
			<div class="formRight">
			
			<div class="mt10"><img src="<?=_upload_tintuc.$item['photo']?>"  width="100px" alt="NO PHOTO" width="100" /></div>

			</div>
			<div class="clear"></div>
		</div>
		<?php } ?>   

      <div class="formRow">
      <label>Hình ảnh kèm theo: </label>
       <?php if($act=='edit'){?>
       <div class="formRight" id="imgzzz">
      <?php if(!empty($item['hinhanh'])){
		
		  	$img=explode('|',$item['hinhanh']); 
		  ?>       
            <?php foreach($img as $k => $v){if($v==''){continue;} ?>
              <div class="item_trich trich<?=$k?>" id="<?=md5($v)?>" style="text-align:center;">
              		<a class="fancy" href="<?=_upload_tmp.$v?>">
                   <img class="img_trich" width="100px" height="80px" src="<?=_upload_tmp.$v?>" />
                   </a>
                 <a style="cursor:pointer" onclick="xoahinh(<?=$item['id']?>,'<?=str_replace(" ","",$v)?>')"><i class="fa fa-trash-o"></i></a>
              </div>
            <?php }?>
		<?php }?>
		</div>
       <?php }?>
      <div class="formRight">
          <a class="file_input" data-jfiler-name="files" data-jfiler-extensions="jpg, jpeg, png, gif"><i class="fa fa-paperclip"></i> Thêm ảnh</a>                
			<div class="note"> Height:450px | Width:670px  <?=_format_duoihinh_l?> </div>
      </div>
          <div class="clear"></div>
        </div>
     
     
				<div class="formRow">
	 				 <label>Tiêu đề đánh giá </label>
	 				 <div class="formRight">
	 						 <input type="text" value="<?=@$item['baivietdanhgia']?>" name="baivietdanhgia" title="" class="tipS" />
	 				 </div>
	 				 <div class="clear"></div>
	 		 </div>
			 <div class="formRow">
					 <label>Link bài đánh giá</label>
					 <div class="formRight">
							 <input type="text" value="<?=@$item['linkbaiviet']?>" name="linkbaiviet" title="" class="tipS" />
					 </div>
					 <div class="clear"></div>
			 </div>
           
            
 				<div class="formRow">
            <label>Title</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['title']?>" name="title" title="Nội dung thẻ meta Title dùng để SEO" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
       
        <div class="formRow">
            <label>Từ khóa</label>
            <div class="formRight">
                <input type="text" value="<?=@$item['keywords']?>" name="keywords" title="Từ khóa chính cho bài viết" class="tipS" />
            </div>
            <div class="clear"></div>
        </div>
        
        <div class="formRow">
            <label>Description:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Nội dung thẻ meta Description dùng để SEO" class="tipS description_input" name="description"><?=@$item['description']?></textarea>
                <b>(Tốt nhất là 68 - 170 ký tự)</b>
            </div>
            <div class="clear"></div>
        </div>
        
         <div class="formRow none">
            <label>Thẻ tag:</label>
            <div class="formRight">
                <textarea rows="8" cols="" title="Mỗi thẻ tag cách nhau bởi dấu , " class="tipS description_input" name="tag"><?=@$item['tag']?></textarea>
                <b>(Mỗi thẻ tag cách nhau bởi dấu , )</b>
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

        <div class="formRow none">
            <label>Mô tả ngắn:</label>
            <div class="formRight">
                <textarea  rows="8" cols="" title="Viết mô tả ngắn bài viết" class="tipS" name="mota<?=$key?>" id="mota<?=$key?>"><?=@$item['mota'.$key]?></textarea>
            </div>
            <div class="clear"></div>
        </div>  

            <div class="formRow">
            <label>Nội dung chính: <img src="./images/question-button.png" alt="Chọn loại"  class="icon_que tipS" original-title="Viết nội dung chính"> </label>
            <div class="formRight"><textarea class="ck_editor" name="noidung<?=$key?>" id="noidung<?=$key?>" rows="8" cols="60"><?=@$item['noidung'.$key]?></textarea>
</div>
            <div class="clear"></div>
        </div>
         
        

       </div><!-- End content <?=$key?> -->
      
     <?php } ?>
 		 <div id="user" class="tab_content"> 
                 
         		<div class="formRow">
                    <label>Tên Người đăng</label>
                    <div class="formRight">
                        <input type="text" name="hoten" title="Nhập tên người đăng" id="hoten" class="tipS" value="<?=@$item['hoten']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Điện thoại</label>
                    <div class="formRight">
                        <input type="text" name="dienthoai" title="Điện thoại" id="dienthoai" class="tipS" value="<?=@$item['dienthoai']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="formRow">
                    <label>Email</label>
                    <div class="formRight">
                        <input type="text" name="email" title="Email" id="email" class="tipS" value="<?=@$item['email']?>" />
                    </div>
                    <div class="clear"></div>
                </div>
                
         </div>

    </div> 
    
    <div class="widget">
         <div class="title"><img src="./images/icons/dark/record.png" alt="" class="titleIcon" />
            <h6>Duyệt tin</h6>
        </div>
        <div class="formRow">
			<label>Ghi chú:</label>
			<div class="formRight">
				<textarea rows="8" cols="" title="Viết ghi chú cho đơn hàng" class="tipS" name="ghichu" id="ghichu"><?=@$item['ghichu']?></textarea>
			</div>
			<div class="clear"></div>
		</div>	
        
        <div class="formRow">
			<label>Trạng thái</label>
			<div class="formRight">
            	<div class="selector">
					<select id="kiemduyet" name="kiemduyet" class="main_font">
                    	<option <?php if($item['kiemduyet']==0){echo 'selected="selected"';} ?> value="0">Chờ duyệt</option>
                        <option <?php if($item['kiemduyet']==1){echo 'selected="selected"';} ?> value="1">Đã duyệt</option>
                        <option <?php if($item['kiemduyet']==2){echo 'selected="selected"';} ?> value="2">Tin vi phạm</option>
                    </select>
                </div>
			</div>
			<div class="clear"></div>
		</div>	
        <div class="formRow">
            <div class="formRight">
                <input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
                <input type="hidden" name="id_user" id="id_user" value="<?=@$item['id_user']?>" />
                 <input type="hidden" name="type" id="id_this_type" value="<?=$_REQUEST['type']?>" />
                <input type="button" class="blueB" onclick="TreeFilterChanged2(); return false;" value="Hoàn tất" />
                <a href="index.php?com=dangtin&act=man<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='.$_REQUEST['type'];?>" onClick="if(!confirm('Bạn có muốn thoát không ? ')) return false;" title="" class="button tipS" original-title="Thoát">Thoát</a>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</form> 

<script type="text/javascript">
function xoahinh(a,b){
	$.ajax({
		type: "POST",
		url: "ajax/xuly_admin_dn2.php",
		data: {name:b,id:a},
		success:function(data){					
			$("#"+data).fadeOut(500);
			setTimeout(function(){
				$("#"+data).remove();
			}, 1000)
		}
	})
}	
</script>
<script>
  $(document).ready(function() {
    $('.file_input').filer({
            showThumbs: true,
            templates: {
                box: '<ul class="jFiler-item-list"></ul>',
                item: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <li><span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span></li>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" style="display:none" name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                itemAppend: '<li class="jFiler-item">\
                            <div class="jFiler-item-container">\
                                <div class="jFiler-item-inner">\
                                    <div class="jFiler-item-thumb">\
                                        <div class="jFiler-item-status"></div>\
                                        <div class="jFiler-item-info">\
                                            <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        </div>\
                                        {{fi-image}}\
                                    </div>\
                                    <div class="jFiler-item-assets jFiler-row">\
                                        <ul class="list-inline pull-left">\
                                            <span class="jFiler-item-others">{{fi-icon}} {{fi-size2}}</span>\
                                        </ul>\
                                        <ul class="list-inline pull-right">\
                                            <li><a class="icon-jfi-trash jFiler-item-trash-action"></a></li>\
                                        </ul>\
                                    </div>\<input type="text" style="display:none " name="stthinh[]" class="stthinh" />\
                                </div>\
                            </div>\
                        </li>',
                progressBar: '<div class="bar"></div>',
                itemAppendToEnd: true,
                removeConfirmation: true,
                _selectors: {
                    list: '.jFiler-item-list',
                    item: '.jFiler-item',
                    progressBar: '.bar',
                    remove: '.jFiler-item-trash-action',
                }
            },
            addMore: true
        });
  });
</script>

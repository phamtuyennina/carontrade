
<script language="javascript" src="media/scripts/my_script.js"></script>
<script language="javascript">
function js_submit(){
	if(isEmpty(document.frm.username, "Chưa nhập tên đăng nhập.")){
		document.frm.username.focus();
		return false;
	}
	<?php if($_GET['act']=='add'){?>
	if(isEmpty(document.frm.oldpassword, "Chưa nhập mật khẩu.")){
		document.frm.oldpassword.focus();
		return false;
	}
	
	if(document.frm.oldpassword.value.length<5){
		alert("Mật khẩu phải nhiều hơn 4 ký tự.");
		document.frm.oldpassword.focus();
		return false;
	}
	<?php } ?>
	if(!isEmpty(document.frm.email) && !check_email(document.frm.email.value)){
		alert('Email không hợp lệ.');
		document.frm.email.focus();
		return false;
	}
	if(document.frm.username.value==0){
		alert('Chưa chọn nhóm thành viên.');
		document.frm.email.focus();
		return false;
	}
}
$(document).ready(function(e) {
    $('#thanhpho_item').change(function(e) {
			var id=$(this).val();
			$.ajax({
			type:'POST',
			url:'ajax/thanhpho.php',
			dataType:"json",
			data:{id:id},
			success: function(kq) {
				$('#thanhpho').html(kq.q);	
			}
		});	
	});
});
</script>
<?php 
function get_thanhpho_item($id)
	{
		$sql="select * from table_place_city order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="thanhpho_item" name="id_city" class="main_select select_danhmuc" >
			<option>Tỉnh/Thành phố</option>			
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

function get_thanhpho($id,$idc)
	{
		$sql="select * from table_place_dist where id_city=".$idc."  order by stt";
		$stmt=mysql_query($sql);
		$str='
			<select id="thanhpho" name="id_dist" class="main_select select_danhmuc">
			<option>Quận/Huyện</option>			
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
<div class="wrapper">

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=thanhvien&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Thêm thành viên</span></a></li>
            <li class="current"><a href="#" onclick="return false;">Thêm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="frm"  class="form"  method="post" action="index.php?com=thanhvien&act=save" enctype="multipart/form-data" class="nhaplieu" onSubmit="return js_submit();">
<div class="widget">
	<div class="formRow">
		<label>Email đăng nhập :</label>
		<div class="formRight">
        	<input type="text" name="email" id="email" value="<?=$item['email']?>" class="input" <?php if($_GET['act']=='edit'){?> readonly="readonly"<?php } ?>  />
		</div>
		<div class="clear"></div>
	</div>

	<div class="formRow">
		<label>Mật khẩu :</label>
		<div class="formRight">
        	<input type="password" name="oldpassword" id="oldpassword" value="" class="input" />
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Loại thành viên :</label>
		<div class="formRight">
        	<select id="loaithanhvien" name="loaithanhvien" class="main_select select_danhmuc" >
            	<option value="Cá nhân" <?php if($item['loaithanhvien']=='Cá nhân'){echo 'selected="selected"';} ?> >Cá nhân</option>
                <option <?php if($item['loaithanhvien']=='Đại lý'){echo 'selected="selected"';} ?> value="Đại lý">Đại lý</option>
            </select>
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Tên :</label>
		<div class="formRight">
        	<input type="text" name="hoten" id="hoten" value="<?=$item['hoten']?>" class="input" />
		</div>
		<div class="clear"></div>
	</div>
    
    <div class="formRow">
		<label>Tên công ty:</label>
		<div class="formRight">
        	<input type="text" name="tencongty" id="tencongty" value="<?=$item['tencongty']?>" class="input" />
		</div>
		<div class="clear"></div>
	</div>
    
	<div class="formRow">
		<label>Điện thoại :</label>
		<div class="formRight">
        	<input type="text" name="dienthoai" value="<?=$item['dienthoai']?>" class="input" />
		</div>
		<div class="clear"></div>
	</div>
    
    <div class="formRow">
		<label>Số CMND:</label>
		<div class="formRight">
        	<input type="text" name="cmnd" placeholder="Nhập số chứng minh nhân dân" value="<?=$item['cmnd']?>" class="input" />
		</div>
		<div class="clear"></div>
	</div>
    
	 <div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
             <input type="text" name="diachi" title="Địa chỉ khách hàng" id="diachi" class="tipS read" value="<?=@$item['diachi']?>" /> 
			</div>
			<div class="clear"></div>
		</div>	
	 <div class="formRow">
		<label>Mã số thuế:</label>
		<div class="formRight">
        	<input type="text" name="masothue" placeholder="Nhập mã số thuế" value="<?=$item['masothue']?>" class="input" />
		</div>
		<div class="clear"></div>
	</div>
	<?php if($_GET['act']=='edit'){ ?>
    <div class="formRow">
		<label>Ngày đăng ký :</label>
		<div class="formRight">
        	<input type="text" name="ngaytao" id="ngaytao" value="<?=date('d/m/Y',$item['ngaytao'])?>" readonly="readonly" class="input" />
		</div>
		<div class="clear"></div>
	</div>
    <?php }?>
	<div class="formRow">
		<label>Số thứ tự :</label>
		<div class="formRight">
        	<input type="text" name="stt" value="<?=isset($item['stt'])?$item['stt']:1?>" style="width:30px">
		</div>
		<div class="clear"></div>
	</div>
	<div class="formRow">
		<label>Kích hoạt :</label>
		<div class="formRight">
        	<input type="checkbox" name="kichhoat" <?=(!isset($item['kichhoat']) || $item['kichhoat']==1)?'checked="checked"':''?>>
		</div>
		<div class="clear"></div>
	</div>
       	
	<div class="formRow">
	<label></label>
	<div class="formRight">
		<input type="hidden" name="id" id="id" value="<?=@$item['id']?>" />
		<input type="submit" value="Lưu"  class="button blueB" />
		<input type="button" value="Thoát" onclick="javascript:window.location='index.php?com=thanhvien&act=man'" class="button blueB" />
	</div>
	<div class="clear"></div>
	</div>
</div>
</form>
<link href="css/demo.css" type="text/css" rel="stylesheet" />
<script src="js/jquery.leanModal.min_.js"></script>
<script language="javascript" type="text/javascript">

	$(document).ready(function() {
	$("#modal_trigger").leanModal({
			top: 100,
			overlay: 0.6,
			closeButton: ".modal_close"
	});
	$("#chonhet").click(function(){
		var status=this.checked;
		$("input[name='chon']").each(function(){this.checked=status;})
	});
	
	$("#xoahet").click(function(){
		var listid="";
		$("input[name='chon']").each(function(){
			if (this.checked) listid = listid+","+this.value;
			})
		listid=listid.substr(1);	 //alert(listid);
		if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
		hoi= confirm("Bạn có chắc chắn muốn xóa?");
		if (hoi==true) document.location = "index.php?com=quanly&type=<?=$_REQUEST['type']?>&act=delete_thuchi&listid=" + listid;
	});
	});
	
	$(document).keydown(function(e) {
        if (e.keyCode == 13) {
			timkiem();
	   }
	});
	
	function timkiem()
	{	
		var a = $('input.key').val();	if(a=='Tên...') a='';		
		window.location ="index.php?com=quanly&act=man_thuchi&type=<?=$_REQUEST['type']?>&key="+a;	
		return true;
	}
	
</script>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=quanly&act=thuchi&type=<?=$_REQUEST['type']?>"><span>Dịch vụ salon</span></a></li>
        	<?php if($_GET['key']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['key']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
function onSearch(evt) {	
		var datefm = document.getElementById("datefm").value;	
		var dateto = document.getElementById("dateto").value;
		var status = document.getElementById("id_tinhtrang").value;		
		//var encoded = Base64.encode(keyword);
		location.href = "index.php?com=product&act=man&datefm="+datefm+"&dateto="+dateto+"&status="+status;
		loadPage(document.location);
			
}
$(document).ready(function(){						
	var dates = $( "#datefm, #dateto" ).datepicker({
			defaultDate: "+1w",
			dateFormat: 'dd/mm/yy',
			changeMonth: true,			
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "datefm" ? "minDate" : "maxDate",
					instance = $( this ).data( "datepicker" ),
					date = $.datepicker.parseDate(
						instance.settings.dateFormat ||
						$.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
        
		});
		
</script>
<div class="control_frm" style="margin-bottom:5px; margin-top:0">
  <div class="bc" style="padding:3px 0; margin-top:0">

    <form name="search" action="index.php" method="GET" class="form giohang_ser" style="display:inline-block">
      <input name="com" value="quanly" type="hidden"  />
      <input name="act" value="thuchi" type="hidden" />
      <input name="type" value="thuchi" type="hidden" />
      <input name="p" value="<?=($_GET['p']=='')?'1':$_GET['p']?>" type="hidden" />
      <input class="form_or" name="ngaybd" id="datefm" type="text" value="<?=$_GET['ngaybd']?>" placeholder="Từ ngày.."/>
      <input class="form_or" name="ngaykt" id="dateto" type="text" value="<?=$_GET['ngaykt']?>" placeholder="Đến ngày.." />
	 <select name="loaihinh" style="display:inline-block;vertical-align:middle;margin-right:10px;" class="main_select">
        	<option value="">Tất cả</option>
            <option value="1">Thu</option>
            <option value="2">Chi</option>
        </select>
      <input type="submit" class="blueB" value="Tìm kiếm" style="width:100px; margin:0px 0px 0px 10px;"  />
    </form>
    <div class="" style="display:inline-block;float:right;clear:both;">
    	<p style="display:inline-block;vertical-align:middle;padding-top:0px;margin-right:10px;">Sort by:</p>
        <select onchange="window.location.href=this.value" style="display:inline-block;vertical-align:middle;margin-right:10px;" class="main_select">
        	<option value="index.php?com=quanly&act=thuchi&type=thuchi">Hôm nay</option>
            <option <?php if($_GET['sort']==2){echo 'selected="selected"';} ?>  value="index.php?com=quanly&act=thuchi&type=thuchi&sort=2">Hôm qua</option>
            <option <?php if($_GET['sort']==3){echo 'selected="selected"';} ?> value="index.php?com=quanly&act=thuchi&type=thuchi&sort=3">Tuần</option>
            <option <?php if($_GET['sort']==4){echo 'selected="selected"';} ?> value="index.php?com=quanly&act=thuchi&type=thuchi&sort=4">Tháng</option>
            <option <?php if($_GET['sort']==5){echo 'selected="selected"';} ?> value="index.php?com=quanly&act=thuchi&type=thuchi&sort=5">Năm</option>
        </select>
        <input type="button" class="blueB" value="Xuất Excel" onclick="location.href='export.php?type=thuchi<?php if(!empty($_GET['ngaybd'])){echo '&ngaybd='.$_GET['ngaybd'];} ?><?php if(!empty($_GET['ngaykt'])){echo '&ngaykt='.$_GET['ngaykt'];} ?><?php if(!empty($_GET['sort'])){echo '&sort='.$_GET['sort'];} ?>'"  style="width:100px; margin:0px 10px 0px 0px;"  />
    </div>
    <div class="clear"></div>
  </div>
</div>

<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" id="modal_trigger" href="#modal" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />
        
    </div>  
</div>
<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="chonhet" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
  </div>
  
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
      <thead>
      <tr>
        <td></td>
        <td width="100" class="sortCol1"><div>Loại hình<span></span></div></td>      
        <td class="sortCol1"><div>Tên<span></span></div></td>
        <td width="150">Thời gian</td>
        <td width="100" class="sortCol1"><div>Số tiền<span></span></div></td>
        <td width="100">Thao tác</td>
      </tr>
    </thead>
   <tbody>
   <form name="frm" method="post" action="index.php?com=quanly&act=savestt_thuchi&type=<?=$_REQUEST['type']?><?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?>" enctype="multipart/form-data" class="nhaplieu">
   <?php for($i=0, $count=count($items); $i<$count; $i++){?>
   <tr>
   		<td>
            <input type="checkbox" name="chon" id="chon" value="<?=$items[$i]['id']?>" class="chon" />
        </td>
   		
         <td align="center">
       		<?=($items[$i]['loaihinh']==1) ? 'Thu' : 'Chi'?>
        </td>
   		<td class="title_name_data">
            <a href="index.php?com=quanly&act=edit_thuchi&id=<?=$items[$i]['id']?>&type=<?=$_REQUEST['type']?><?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?>" class="tipS SC_bold"><?=$items[$i]['ten']?></a>
        </td>
        <td align="center">
       		<?=date('H:i:s d/m/Y',$items[$i]['ngaytao'])?>
        </td>
        <td align="center">
       		<b style="color:#f00;"><?=number_format($items[$i]['gia'],0,'.','.').' VNĐ'?></b>
        </td>
        <td class="actBtns">
            <a href="index.php?com=quanly&act=edit_thuchi&type=<?=$_REQUEST['type']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/icons/dark/pencil.png" alt=""></a>

            <a href="index.php?com=quanly&act=delete_thuchi&type=<?=$_REQUEST['type']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?>" onClick="if(!confirm('Xác nhận xóa: <?=$items[$i]['ten']?>')) return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
   </tr>
   <?php } ?>
   <tr>
   	<td colspan="4"><p style="width:50%;float:left;text-align:center;">Tổng thu: <b style="color:#f00;"><?=number_format($tongthu['thu'],0,'.','.').' VNĐ'?></b></p> <p style="width:50%;float:left;text-align:center;">Tổng chi: <b style="color:#f00;"><?=number_format($tongchi['chi'],0,'.','.').' VNĐ'?></b></p> </td>
    <td colspan="2">Còn lại: <b style="color:#f00;"><?=number_format($tongthu['thu']-$tongchi['chi'],0,'.','.').' VNĐ'?></b></td>
   </tr>
   </form>
   </tbody>
  </table>
</div>
<div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
<div id="modal" class="popupContainer" style="display:none;">
    <header class="popupHeader">
        <span class="header_title">Quản Lý Thu Chi</span>
        <span class="modal_close"><i class="fa fa-times"></i></span>
    </header>
    <section class="popupBody">
        <div class="user_login">
            <form id="dangnhapweb" method="post" action="index.php?com=quanly&act=save_thuchi<?php if($_REQUEST['p']!='') echo'&p='.$_REQUEST['p'];?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>">
            	<input type="hidden" name="type" value="<?=$_REQUEST['type']?>"  />
                <label>Loại hình</label>
                <select id="loaihinh" name="loaihinh" class="main_select select_danhmuc">
               		<option value="1">Thu</option>
                    <option value="0">Chi</option>
               </select>
                <br />

                <label>Tiêu đề</label>
                <input required="required" type="text" name="ten" id="ten" />
                <br />
                <label>Số tiền</label>
                <input required="required" type="text" name="gia" id="gia" />
                <br />
                <label>Mô tả</label>
                <textarea name="mota"></textarea>
                <br />
                <div class="action_btns">
                    <div class="one_half last">
                    	<button type="submit" class="btn btn_red">Lưu</button>
                    </div>
                </div>
            </form>
            <a style="display:none;" href="#" class="forgot_password">Quên mật khẩu</a>
        </div>
    </section>
</div>



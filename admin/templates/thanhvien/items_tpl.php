<script type="text/javascript">
	$(document).ready(function() {

		$('.timkiem button').click(function(event) {
			var keyword = $(this).parent().find('input').val();
			window.location.href="index.php?com=thanhvien&act=man&type=<?=$_GET['type']?>&keyword="+keyword;
		});

    $("#xoahet").click(function(){
      var listid="";
      $("input[name='chon']").each(function(){
        if (this.checked) listid = listid+","+this.value;
        })
      listid=listid.substr(1);   //alert(listid);
      if (listid=="") { alert("Bạn chưa chọn mục nào"); return false;}
      hoi= confirm("Bạn có chắc chắn muốn xóa?");
      if (hoi==true) document.location = "index.php?com=thanhvien&act=delete&type=<?=$_GET['type']?>&curPage=<?=$_GET['curPage']?>&listid=" + listid;
    });
	});
</script>


<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=thanhvien&act=man<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>"><span>Quản lý Thành viên</span></a></li>
        	<?php if($_GET['keyword']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['keyword']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>


<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='index.php?com=thanhvien&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem">
	    <input type="text" value="" placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB"  value="">Tìm kiếm</button>
    </div>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>           
        <td>Email </td>
		    <td>Họ tên </td>
        <td>Công ty</td>
        <td>Ngày đăng ký </td>
        <td class="tb_data_small">Kích hoạt</td>
        <td class="tb_data_small">Đình chỉ</td>
        <td class="tb_data_small">Tin đang đăng</td>
        <td class="tb_data_small">Tin chờ duyệt</td>
        <td class="tb_data_small">Tin vi phạm</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
       <td>
            <input type="checkbox" name="chon" value="<?=$items[$i]['id']?>" id="check<?=$i?>" />
        </td>

       
        <td align="center">
            <input type="text" value="<?=$items[$i]['id']?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText update_stt" original-title="Nhập số thứ tự sản phẩm" rel="<?=$items[$i]['id']?>" />

            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$items[$i]['id']?>" src="images/loader.gif" alt="loader" /></div>
        </td> 

        <td class="title_name_data">
            <a href="index.php?com=thanhvien&act=edit&id_list=<?=$items[$i]['id_list']?>&id_cat=<?=$items[$i]['id_cat']?>&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" class="tipS SC_bold"><?=$items[$i]['email']?></a>
        </td>
		

        <td class="title_name_data"><?=$items[$i]['hoten']?></td>
        <td class="title_name_data"><?=$items[$i]['tencongty']?></td>
        <td align="center"><?=date('d/m/Y',$items[$i]['ngaytao'])?></td>

         <td align="center">
        <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['kichhoat']?>" data-val3="kichhoat" class="diamondToggle <?=($items[$i]['kichhoat']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a> 
        </td>
         <td align="center">
        <a data-val2="table_<?=$_GET['com']?>" rel="<?=$items[$i]['dinhchi']?>" data-val3="dinhchi" class="diamondToggle <?=($items[$i]['dinhchi']==1)?"diamondToggleOff":""?>" data-val0="<?=$items[$i]['id']?>" ></a> 
        </td>
       
       <td class="title_name_data">
            <a href="index.php?com=dangtin&act=man&type=daduye&id_user=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=count_tindaduyet(1,$items[$i]['id'])?> tin</a>
        </td>
         <td class="title_name_data">
            <a href="index.php?com=dangtin&act=man&type=chuaduyet&id_user=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=count_tindaduyet(0,$items[$i]['id'])?> tin</a>
        </td>
         <td class="title_name_data">
            <a href="index.php?com=dangtin&act=man&type=vipham&id_user=<?=$items[$i]['id']?>" class="tipS SC_bold"><?=count_tindaduyet(2,$items[$i]['id'])?> tin</a>
        </td>
       
        <td class="actBtns">
            <a href="index.php?com=thanhvien&act=edit&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/icons/dark/pencil.png" alt=""></a>

            <a href="index.php?com=thanhvien&act=delete&id=<?=$items[$i]['id']?><?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
</div>
</form>  

<div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>
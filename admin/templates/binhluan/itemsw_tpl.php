<script language="javascript" type="text/javascript">
	$(document).ready(function() {
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
			if (hoi==true) document.location = "index.php?com=binhluan&act=delete_web&type=<?=$_REQUEST['type']?>&listid=" + listid;
		});
	});
	
	f
	
	$(document).keydown(function(e) {
        if (e.keyCode == 13) {
			timkiem();
	   }
	});
	
	function timkiem()
	{	
		var a = $('input.key').val();	
		if(a=='Tên...') a='';		
		window.location ="index.php?com=binhluan&act=man_web&type=<?=$_REQUEST['type']?>&key="+a;	
		return true;
	}	
</script>


<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li><a href="index.php?com=binhluan&act=man_web&type=<?=$_REQUEST['type']?>"><span>Quản lý <?=$title_main ?></span></a></li>
        	<?php if($_GET['key']!=''){ ?>
				<li class="current"><a href="#" onclick="return false;">Kết quả tìm kiếm " <?=$_GET['key']?> " </a></li>
			<?php }  else { ?>
            	<li class="current"><a href="#" onclick="return false;">Tất cả</a></li>
            <?php } ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<form name="frm" id="frm" method="post" action="">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
    	<input type="button" class="blueB none" value="Thêm" onclick="location.href='index.php?com=product&act=add<?php if($_REQUEST['type']!='') echo'&type='. $_REQUEST['type'];?>'" />
        <input type="button" class="blueB" value="Xoá Chọn" id="xoahet" />

    </div>  
</div>
<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Chọn tất cả</h6>
    <div class="timkiem none">
	    <input type="text" value="" name="key" class="key"  placeholder="Nhập từ khóa tìm kiếm ">
	    <button type="button" class="blueB" onclick="timkiem();" value="">Tìm kiếm</button>
    </div>
  </div>
  
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
      <thead>
      <tr>
        <td></td>
    
        <td class="sortCol"><div>Nội dung đánh giá<span></span></div></td>
         <td width="200">Thành viên</td>
         <td width="100">Ngày đánh giá</td>
        <td width="200">Thao tác</td>
      </tr>
    </thead>
    <tbody>
    	 <?php for($i=0, $count=count($items); $i<$count; $i++){?>
          <tr>
          <td>
            <input type="checkbox" name="chon" value="<?=$items[$i]['id_user']?>" id="chon" />
        </td>
        

        <td class="title_name_data">
           <div>
           		<?php foreach($loaidanhgia as $c){ ?>
                <p class="clearfix"><?=$c['ten']?>: <strong><?=(getdanhgia_userw($c['id'],$items[$i]['id_user'])==true)?'Có':'Không'?></strong></p> 
                <?php }?>
                <p>Số sao đánh giá: <strong><?=$st=demsao_($items[$i]['id_user'])?></strong></p>
           </div>
        </td>
        
        <td align="center">
        	<?=getten_user($items[$i]['id_user'])?>
        </td>

         <td align="center">
        	<?=date('d/m/Y H:i:s',$items[$i]['ngaytao'])?>
        </td>
       
        
        <td class="actBtns">
            <a href="index.php?com=binhluan&act=delete_web&id=<?=$items[$i]['id_user']?>&type=<?=$_REQUEST['type']?>&p=<?=$_REQUEST['p']?>" onClick="if(!confirm('Xác nhận xóa')) return false;" title="" class="smallButton tipS" original-title="Xóa đánh giá"><img src="./images/icons/dark/close.png" alt=""></a>
        </td>
          </tr>
         <?php } ?>
    </tbody>
  </table>
</div>
</form>
<div class="pagination">  <?=pagesListLimitadmin($url_link , $totalRows , $pageSize, $offset)?></div>

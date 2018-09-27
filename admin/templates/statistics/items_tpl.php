<link rel="stylesheet" href="css/MonthPicker.css">
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<li class="current"><a href="index.php?com=statistics&act=man"><span>Thống kê truy cập</span></a></li>
        	
        </ul>
        <div class="clear"></div>
    </div>
</div>

<div class="control_frm">
 <div class="form" >
       
                <input type="text" id="datepicker" name="" placeholder="yyyy-mm-dd" style="width:220px" value="<?=$_GET['date']?>">
                <input type="button" class="blueB" onclick="action_search(); return false;" value="Xem thống kê" />
      </div>
  
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $( "#datepicker" ).MonthPicker({ Button: false });
    });

  function action_search(){
    var date = $('#datepicker').val();    
    if(date=='') alert('Vui lòng chọn tháng!');
    window.location ="index.php?com=statistics&act=man&id_hinhanh=<?=$_REQUEST['id_hinhanh']?>&date="+date;
  }

</script>

<div class="floatL width30">
<div class="widget">
  <div class="title">
    <h6>Chi tiết truy cập theo ngày</h6>
   
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
     
        <td class="tb_data_small">STT</td>            
        <td class="tb_data_small">Ngày</td>
        <td class="tb_data_small">Số lượng</td>
      
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($item_bydate); $i<$count; $i++){?>
          <tr>
        <td align="center">
          <?=$i+1?>           
        </td>             
        <td class="title_name_data">
            <?=$item_bydate[$i]['date_log']?>
        </td>        
        <td align="center">
           <?=$item_bydate[$i]['count']?>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>

</div>


<div class="widget">
  <div class="title">
    <h6>Ngày truy cập nhiều</h6>
   
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
     
        <td class="tb_data_small">STT</td>            
        <td class="tb_data_small">Ngày</td>
        <td class="tb_data_small">Số lượng</td>
      
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($item_topdate); $i<$count; $i++){?>
          <tr>
        <td align="center">
          <?=$i+1?>           
        </td>             
        <td class="title_name_data">
            <?=$item_topdate[$i]['date_log']?>
        </td>        
        <td align="center">
           <?=$item_topdate[$i]['count']?>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>

</div>

</div>


<div class="floatL width30">
<div class="widget">
  <div class="title">
    <h6>Trình duyệt</h6>
   
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
     
        <td class="tb_data_small">STT</td>            
        <td class="tb_data_small">Trình duyệt</td>
        <td class="tb_data_small">Số lượng</td>
      
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($item_bybrowser); $i<$count; $i++){?>
          <tr>
        <td align="center">
          <?=$i+1?>           
        </td>             
        <td class="title_name_data">
            <?=$item_bybrowser[$i]['browser']?>
        </td>        
        <td align="center">
           <?=$item_bybrowser[$i]['sum']?>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
  
</div>


<div class="widget">
  <div class="title">
    <h6>Hệ điều hành</h6>
   
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
     
        <td class="tb_data_small">STT</td>            
        <td class="tb_data_small">Hệ điều hành</td>
        <td class="tb_data_small">Số lượng</td>
      
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($item_byos); $i<$count; $i++){?>
          <tr>
        <td align="center">
          <?=$i+1?>           
        </td>             
        <td class="title_name_data">
            <?=$item_byos[$i]['os']?>
        </td>        
        <td align="center">
           <?=$item_byos[$i]['sum']?>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
  
</div>


<div class="widget">
  <div class="title">
    <h6>Quốc gia truy cập</h6>
   
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>     
        <td class="tb_data_small">STT</td>            
        <td class="tb_data_small">Quốc gia</td>
        <td class="tb_data_small">Số lượng</td>
      
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($item_bywebsite); $i<$count; $i++){?>
          <tr>
        <td align="center">
          <?=$i+1?>           
        </td>             
        <td class="title_name_data">
            <?=$item_bywebsite[$i]['quocgia']?>
        </td>        
        <td align="center">
           <?=$item_bywebsite[$i]['sum']?>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>
  
</div>


</div>



<div class="floatL width30">
<div class="widget">
  <div class="title">
    <h6>IP truy cập cuối</h6>
   
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
     
        <td class="tb_data_small">STT</td>            
        <td class="tb_data_small">IP</td>
        <td class="tb_data_small">Thời gian</td>
      
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($item_last); $i<$count; $i++){?>
          <tr>
        <td align="center">
          <?=$i+1?>           
        </td>             
        <td class="title_name_data">
            <?=$item_last[$i]['ip']?>
        </td>        
        <td align="center" width="200">
           <?=date('H:i d/m/Y',$item_last[$i]['date_time'])?>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>

</div>



<div class="widget">
  <div class="title">
    <h6>IP truy cập nhiều</h6>   
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
     
        <td class="tb_data_small">STT</td>            
        <td class="tb_data_small">IP</td>
        <td class="tb_data_small">Số lượng</td>
      
      </tr>
    </thead>

    <tbody>
         <?php for($i=0, $count=count($item_topip); $i<$count; $i++){?>
          <tr>
        <td align="center">
          <?=$i+1?>           
        </td>             
        <td class="title_name_data">
            <?=$item_topip[$i]['ip']?>
        </td>        
        <td align="center" width="200">
           <?=$item_topip[$i]['sum']?>
        </td>
      </tr>
         <?php } ?>
                </tbody>
  </table>

</div>
</div>
<style type="text/css">
.width30{
  width: 30%;
  margin-right: 10px;
}
  .withCheck tbody tr td:first-child, .withCheck tbody tr th:first-child{
    padding: 5px;
  }
  .widget{
    margin-top: 10px;
  }
</style>

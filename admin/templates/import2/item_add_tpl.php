<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	    <li><a href="index.php?com=import2&act=capnhat&type="><span>Import</span></a></li>
                <li class="current"><a href="#" onclick="return false;">Cập nhật sản phẩm</a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">		
	function TreeFilterChanged2(){		
				$('#validate').submit();		
	}	
</script>
<form name="form1" id="from1" action="" method="post" enctype="multipart/form-data" class="nhaplieu">
	<div class="widget">
		<div class="title"><img src="./images/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu sản phẩm</h6>
		</div>
        
        <ul class="tabs">
           <li>
               <a href="#info">Thông tin chung</a>
           </li>
       </ul>
       
     <div id="info" class="tab_content">
     <?php
if(isset($_POST['ok'])){
	set_time_limit(300*60);
    $file_type=$_FILES['linkfile']['type'];

if($file_type=="application/vnd.ms-excel" || $file_type=="application/x-ms-excel")
		{	
				$filename=changeTitle($_FILES["linkfile"]["name"]);
				move_uploaded_file($_FILES["linkfile"]["tmp_name"],$filename);		
		//include the following 2 files
    
		require 'PHPExcel.php';
		require_once 'PHPExcel/IOFactory.php';
	   
     
    
		$objPHPExcel = PHPExcel_IOFactory::load($filename);
		foreach ($objPHPExcel->getWorksheetIterator() as $worksheet) {
		$worksheetTitle = $worksheet->getTitle();
		$highestRow = $worksheet->getHighestRow(); // e.g. 10
		$highestColumn = $worksheet->getHighestColumn(); // e.g 'F'
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		
		$nrColumns = ord($highestColumn) - 64;
		
		for ($row = 2; $row <= $highestRow; $row++) {
        $cell = $worksheet->getCellByColumnAndRow(0, $row);
				$numberto=$cell->getValue();
        $cell = $worksheet->getCellByColumnAndRow(1, $row);
				$numberfrom=$cell->getValue();
        $cell = $worksheet->getCellByColumnAndRow(2, $row);
        $ma=$cell->getValue();
        $cell = $worksheet->getCellByColumnAndRow(3, $row);
				$ten=$cell->getValue();

				
					//Nếu không tồn tại sản phẩm
					 $sql="insert into table_ip(ten,ma,numberto,numberfrom) values ('$ten','$ma','$numberto','$numberfrom')";
					mysql_query($sql);
          
			}	
		}
		echo "<b>Import sản phẩm thành công!</b>";
		unlink($filename) or DIE("couldn't delete $dir$file<br />");
}
else
		{
	?>
	<script language="javascript">
		alert("Không hỗ trợ kiểu file này");
	</script>
	<?php
	}
}
?>
         <div class="formRow">
            <label>Chọn File</label>
            <div class="formRight">
                <input type="file" id="file" name="linkfile" /><img src="./images/question-button.png" alt="Upload file" class="icon_question tipS" original-title="Loại : .xls (Ms.Excel 2003)">
                <div class="note">Loại : .xls (Ms.Excel 2003)</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Chú ý</label>
            <div class="formRight">
               Dùng id sản phẩm để nhận diện các sản phẩm.
            </div>
            <div class="clear"></div>
        </div>
     
          <div class="formRow">
            <div class="formRight">
                <input type="submit" class="blueB" name="ok" id="ok" value="Upload" />
            </div>
            <div class="clear"></div>
        </div>
       
				
		
       </div>
      
        
         <!-- End info -->
      
	</div>
</form>   

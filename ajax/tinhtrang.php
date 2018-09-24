<?php
	include ("ajax_config.php");	
	
	$id = $_REQUEST['id'];	
	
	$d->reset();
	$sql_quan="select id,ten,giatri from #_product_list where hienthi=1 and id_danhmuc='$id' order by stt,id asc";
	$d->query($sql_quan);
	$quan=$d->result_array();

?>  
	<option value="">Chọn cấp độ</option>
<?php for($i = 0, $count_quan = count($quan); $i < $count_quan; $i++){ ?>
    <option value="<?=$quan[$i]['giatri']?>"><?=$quan[$i]['ten']?></option>
<?php } ?> 

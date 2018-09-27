<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){
	case "man":
		get_items();
		$template = "statistics/items";
		break;
					
	default:
		$template = "index";
}

function get_items(){
	global $d, $item_bydate,$item_last,$item_bybrowser,$item_byos,$item_bywebsite,$item_topdate,$item_topip;

	$sql = "select * from table_counter_sum where id_hinhanh=".$_GET['id_hinhanh']." order by id desc limit 0,30";
	$d->query($sql);
	$item_bydate = $d->result_array();


	$sql = "select * from table_counter_sum where id_hinhanh=".$_GET['id_hinhanh']." order by count desc limit 0,10";
	$d->query($sql);
	$item_topdate = $d->result_array();


	$sql = "select * from #_counter_detail where id_hinhanh=".$_GET['id_hinhanh']." order by id desc limit 0,30";
	$d->query($sql);
	$item_last = $d->result_array();

	$sql = "select ip,count(id) as sum from #_counter_detail where id_hinhanh=".$_GET['id_hinhanh']." group by ip order by sum desc limit 0,10";
	$d->query($sql);
	$item_topip = $d->result_array();

	$sql = "select browser,count(id) as sum from #_counter_detail where id_hinhanh=".$_GET['id_hinhanh']." group by browser order by sum desc limit 0,10";
	$d->query($sql);
	$item_bybrowser = $d->result_array();


	$sql = "select os,count(id) as sum from #_counter_detail where id_hinhanh=".$_GET['id_hinhanh']." group by os order by sum desc limit 0,10";
	$d->query($sql);
	$item_byos = $d->result_array();

	$sql = "select quocgia,count(id) as sum from table_counter_detail where id_hinhanh=".$_GET['id_hinhanh']." group by quocgia order by sum desc";
	$d->query($sql);
	$item_bywebsite = $d->result_array();


	if(isset($_GET['date'])){
		
		$date = strip_tags($_GET['date']);
		$date_arry=explode('/', $date);
		$month = $date_arry[0];
		$year = $date_arry[1];

		$daystart = strtotime($month.'/1/'.$year);
		$dayend = strtotime('+1 month', $daystart);		
		
		$sql = "select * from table_counter_sum where datestamp >=$daystart and datestamp < $dayend and id_hinhanh=".$_GET['id_hinhanh']." order by id desc";
		$d->query($sql);
		$item_bydate = $d->result_array();


		$sql = "select * from table_counter_sum where datestamp >=$daystart and datestamp < $dayend and id_hinhanh=".$_GET['id_hinhanh']."  order by count desc limit 0,10";
		$d->query($sql);
		$item_topdate = $d->result_array();


		$sql = "select * from #_counter_detail where date_time >=$daystart and date_time < $dayend and id_hinhanh=".$_GET['id_hinhanh']." order by id desc limit 0,30";
		$d->query($sql);
		$item_last = $d->result_array();

		$sql = "select ip,count(id) as sum from #_counter_detail where date_time >=$daystart and date_time < $dayend and id_hinhanh=".$_GET['id_hinhanh']." group by ip order by sum desc limit 0,10";
		$d->query($sql);
		$item_topip = $d->result_array();

		$sql = "select browser,count(id) as sum from #_counter_detail where date_time >=$daystart and date_time < $dayend and id_hinhanh=".$_GET['id_hinhanh']." group by browser order by sum desc limit 0,10";
		$d->query($sql);
		$item_bybrowser = $d->result_array();


		$sql = "select os,count(id) as sum from #_counter_detail where date_time >=$daystart and date_time < $dayend and id_hinhanh=".$_GET['id_hinhanh']." group by os order by sum desc limit 0,10";
		$d->query($sql);
		$item_byos = $d->result_array();

		$sql = "select quocgia,count(id) as sum from table_counter_detail where date_time >=$daystart and date_time < $dayend and id_hinhanh=".$_GET['id_hinhanh']." group by quocgia order by sum desc";
		$d->query($sql);
		$item_bywebsite = $d->result_array();

	}

}

?>

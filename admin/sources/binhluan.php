<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$urlcu = "";
$urlcu .= (isset($_REQUEST['id_user'])) ? "&id_user=".addslashes($_REQUEST['id_user']) : "";
$urlcu .= (isset($_REQUEST['p'])) ? "&p=".addslashes($_REQUEST['p']) : "";
switch($act){
	case "man_web":
		get_itemsw();
		$template = "binhluan/itemsw";
		break;		
	case "delete_web":
		delete_itemw();
		break;
		
	case "man_user":
		get_itemsu();
		$template = "binhluan/itemsu";
		break;		
	case "delete_user":
		delete_itemu();
		break;	
}


function get_itemsw(){
	global $d, $item,$items,$loaidanhgia;
	
	$d->reset();
	$sql = "select id,ten$lang as ten from #_loaidanhgia where type='website' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();
	
	$where="type='website' group by id_user order by ngaytao desc";
	
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_danhgia where $where";
	$d->query($sql);	
	$dem = $d->result_array();
	
	$totalRows = count($dem);
	$page = $_GET['p'];
	$pageSize = 10;
	$offset = 5;
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;	
	
	$d->reset();
	$sql = "select * from #_danhgia where $where limit $bg,$pageSize";
	$d->query($sql);
	$items = $d->result_array();
	
	$url_link = getCurrentPageURL();
		
}
function delete_itemw(){
	global $d,$urlcu;
	if(isset($_GET['id']))
	{
		$id =  themdau($_GET['id']);		
		$d->reset();		
		$sql = "delete from #_danhgia where id_user='".$id."' and type='website'";
		$d->query($sql);
		
		$sql = "delete from #_danhgiasao where id_user='".$id."' and type='website'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=binhluan&act=man_web".$urlcu);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=binhluan&act=man_web".$urlcu);
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			
			$d->reset();
			$sql = "delete from #_danhgia where id_user='".$id."' and type='website'";
			$d->query($sql);
			
			$d->reset();
			$sql = "delete from #_danhgiasao where id_user='".$id."' and type='website'";
			$d->query($sql);	
			
		} 
		redirect("index.php?com=binhluan&act=man_web".$urlcu);
	}
}

function get_itemsu(){
	global $d, $item,$items,$loaidanhgia;
	
	$d->reset();
	$sql = "select id,ten$lang as ten from #_loaidanhgia where type='user' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();	
	
	$where="type='user' and user_danhgia=".@$_GET['id_user']." group by id_user order by ngaytao desc";
	
	$d->reset();
	$sql = "SELECT id AS numrows FROM #_danhgia where $where";
	$d->query($sql);	
	$dem = $d->result_array();
	
	$totalRows = count($dem);
	$page = $_GET['p'];
	$pageSize = 10;
	$offset = 5;
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;	
	
	$d->reset();
	$sql = "select * from #_danhgia where $where limit $bg,$pageSize";
	$d->query($sql);
	$items = $d->result_array();
	
	$url_link = getCurrentPageURL();
		
}

function delete_itemu(){
	global $d,$urlcu;
	if(isset($_GET['id']))
	{
		
		$id =  themdau($_GET['id']);		
		$d->reset();		
		$sql = "delete from #_danhgia where id_user='".$id."' and user_danhgia=".$_GET['id_user']." and type='user'";
		$d->query($sql);
		
		$sql = "delete from #_danhgiasao where id_user='".$id."' and user_danhgia='".$_GET['id_user']."' and type='user'";
		$d->query($sql);
		
		if($d->query($sql))
			redirect("index.php?com=binhluan&act=man_user".$urlcu);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=binhluan&act=man_user".$urlcu);
	}
	elseif (isset($_GET['listid'])==true)
	{
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			
			$d->reset();		
			$sql = "delete from #_danhgia where id_user='".$id."' and user_danhgia=".$_GET['id_user']." and type='user'";
			$d->query($sql);
			
			$d->reset();
			$sql = "delete from #_danhgiasao where id_user='".$id."' and user_danhgia='".$_GET['id_user']."' and type='user'";
			$d->query($sql);	
			
		} 
		redirect("index.php?com=binhluan&act=man_user".$urlcu);
	}
}
?>
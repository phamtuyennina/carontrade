<?php  if(!defined('_source')) die("Error");

	@$id_danhmuc =  trim(strip_tags(addslashes($_GET['id_danhmuc'])));
	@$id =   trim(strip_tags(addslashes($_GET['id'])));	
	
 	if($id_danhmuc!='')
	{
		$sql = "select id,ten$lang as ten,title,keywords,description from #_product_danhmuc where tenkhongdau='$id_danhmuc' limit 0,1";
		$d->query($sql);
		$title_bar = $d->fetch_array();
					
		$title_cat = $title_bar['ten'];
		$title = $title_bar['title'];
		$keywords = $title_bar['keywords'];
		$description = $title_bar['description'];
		
		$where = " id_mauxe=".$title_bar['id']." and hienthi=1 and kiemduyet=1 and trangthailuu=2 order by stt,id desc";
	}
	else
	{
		$where = " hienthi=1 and kiemduyet=1 and trangthailuu=2 order by stt,id desc";
	}
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_dangtin where $where";
	$d->query($sql);	
	$dem = $d->fetch_array();
	
	$totalRows = $dem['numrows'];
	$page = $_GET['p'];
	if($id > 0)
	{
		$pageSize = $company['soluong_spk'];
	}
	else
	{
		$pageSize = $company['soluong_sp'];
	}
	$offset = 5;
	if ($page == "")$page = 1;
	else $page = $_GET['p'];
	$page--;
	$bg = $pageSize*$page;		
	
	$d->reset();
	$sql = "select *,ten$lang as ten,noidung$lang as noidung from #_dangtin where $where limit $bg,$pageSize";		
	$d->query($sql);
	$product = $d->result_array();	
	$url_link = getCurrentPageURL();	
?>
<?php  if(!defined('_source')) die("Error");

	@$id_danhmuc =  trim(strip_tags(addslashes($_GET['id_danhmuc'])));
	if($id_danhmuc!='')
	{
		$sql = "select id,ten$lang as ten,title,keywords,description,banner from #_product_danhmuc where tenkhongdau='$id_danhmuc' and type='".$type."' limit 0,1";
		$d->query($sql);
		$title_bar = $d->fetch_array();
					
		$title_cat = $title_bar['ten'];
		$title = $title_bar['title'];
		$keywords = $title_bar['keywords'];
		$description = $title_bar['description'];
		if($com=='kieu-dang'){
			$template='product';
			$where =" id<>0 and id_kieudang=".$title_bar['id']."";
			$where .=" and trangthailuu=2 and kiemduyet=1";
			if(empty($_GET['sort']) or $_GET['sort']==1){
				$where.=' order by ngaytao desc';
			}else{
				$where.=' order by ngaytao asc';
			}	
			#Lấy sản phẩm và phân trang
			$d->reset();
			$sql = "SELECT count(id) AS numrows FROM #_dangtin where $where";
			$d->query($sql);	
			$dem = $d->fetch_array();
			
			$totalRows = $dem['numrows'];
			$page = $_GET['p'];
			$pageSize = 12;//Số item cho 1 trang
			$offset = 5;//Số trang hiển thị				
			if ($page == "")$page = 1;
			else $page = $_GET['p'];
			$page--;
			$bg = $pageSize*$page;		
			
			$d->reset();
			$sql = "select *,ten$lang as ten,noidung$lang as noidung from #_dangtin where $where limit $bg,$pageSize";		
			$d->query($sql);
			$product = $d->result_array();	
			return false;
			//$where = " id_kieudang=".$title_bar['id']." and hienthi=1 and type='mau-xe' order by stt,id desc";
		}elseif($com=='nha-san-xuat'){
			$template='product';
			$where =" id<>0 and id_hang=".$title_bar['id']."";
			$where .=" and trangthailuu=2 and kiemduyet=1";
			if(empty($_GET['sort']) or $_GET['sort']==1){
				$where.=' order by ngaytao desc';
			}else{
				$where.=' order by ngaytao asc';
			}	
			#Lấy sản phẩm và phân trang
			$d->reset();
			$sql = "SELECT count(id) AS numrows FROM #_dangtin where $where";
			$d->query($sql);	
			$dem = $d->fetch_array();
			
			$totalRows = $dem['numrows'];
			$page = $_GET['p'];
			$pageSize = 12;//Số item cho 1 trang
			$offset = 5;//Số trang hiển thị				
			if ($page == "")$page = 1;
			else $page = $_GET['p'];
			$page--;
			$bg = $pageSize*$page;		
			
			$d->reset();
			$sql = "select *,ten$lang as ten,noidung$lang as noidung from #_dangtin where $where limit $bg,$pageSize";		
			$d->query($sql);
			$product = $d->result_array();	
			return false;
			//$where = " id_thuonghieu=".$title_bar['id']." and hienthi=1 and type='mau-xe' order by stt,id desc";
		}
		$d->reset();
		$sql = "SELECT count(id) AS numrows FROM #_product_danhmuc where $where";
		$d->query($sql);	
		$dem = $d->fetch_array();
		
		$totalRows = $dem['numrows'];
		$page = $_GET['p'];
		$pageSize = 32;
		$offset = 5;
		if ($page == "")$page = 1;
		else $page = $_GET['p'];
		$page--;
		$bg = $pageSize*$page;		
		
		$d->reset();
		$sql = "select id,ten$lang as ten,tenkhongdau,photo from #_product_danhmuc where $where limit $bg,$pageSize";		
		$d->query($sql);
		$product = $d->result_array();	
		
		
		$url_link = getCurrentPageURL();
		$template='kieudang';
	}
	
	
	
	
?>
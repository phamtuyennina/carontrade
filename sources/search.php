<?php  if(!defined('_source')) die("Error");
	
	$tinhtrang=(string)$_GET['tinhtrang'];
	$id_hang=(string)$_GET['id_hang'];
	$id_kieudang=(string)$_GET['id_kieudang'];
	$id_mauxe=(string)$_GET['id_mauxe'];
	$nhienlieu=(string)$_GET['nhienlieu'];
	$dongco=(string)$_GET['dongco'];
	$hopso=(string)$_GET['hopso'];
	$mausac=(string)$_GET['mausac'];
	$socua=(string)$_GET['socua'];
	$soghe=(string)$_GET['soghe'];
	$giatu=(int)$_GET['giatu'];
	$giaden=(int)$_GET['giaden'];
	$sokmtu=(int)$_GET['sokmtu'];
	$sokmden=(int)$_GET['sokmden'];
	$quan=(int)$_GET['quan'];
	$namtu=(int)$_GET['namtu'];
	$namden=(int)$_GET['namden'];
	$xuatsu=(int)$_GET['xuatsu'];
	$dandong=(int)$_GET['dandong'];
	$nhienlieutu=(int)$_GET['nhienlieutu'];
	$nhienlieuden=(int)$_GET['nhienlieuden'];

	$tukhoa =  $_GET['tukhoa'];
	$tukhoa = trim(strip_tags($tukhoa));    	
	if (get_magic_quotes_gpc()==false) {
		$tukhoa = mysql_real_escape_string($tukhoa);    			
	}								
	$where =" hienthi=1 and id<>0";
	
	if(!empty($id_hang)){
		$arr_hang=explode('.',$id_hang);
		$arr_hang1=implode(',',$arr_hang);
		$where .=" and id_hang in(".$arr_hang1.")";	
	}
	if(!empty($id_kieudang)){
		$arr_hang=explode('.',$id_kieudang);
		$arr_hang1=implode(',',$arr_hang);
		$where .=" and id_kieudang in(".$arr_hang1.")";	
	}
	if(!empty($id_mauxe)){
		$arr_hang=explode('.',$_GET['id_mauxe']);
		$arr_hang1=implode(',',$arr_hang);
		$where .=" and id_mauxe in(".$arr_hang1.")";	
	}
	if(!empty($nhienlieu)){
		$arr_nhienlieu=explode('.',$_GET['nhienlieu']);
		$arr_nhienlieu1="";
		foreach($arr_nhienlieu as $v){
			$arr_nhienlieu1.="'".$v."',";
		}
		$where .=" and nhienlieu in(".substr($arr_nhienlieu1,0,-1).")";	
	}
	if(!empty($dongco)){
		$arr_dongco=explode('.',$_GET['dongco']);
		$arr_dongco1="";
		foreach($arr_dongco as $v){
			$arr_dongco1.="'".$v."',";
		}
		$where .=" and dongco in(".substr($arr_dongco1,0,-1).")";	
	}
	if(!empty($hopso)){
		$arr_hopso=explode('.',$_GET['hopso']);
		foreach($arr_hopso as $v){
			$arr_hopso1.="'".$v."',";
		}
		$where .=" and hopso in(".substr($arr_hopso1,0,-1).")";	
	}
	if(!empty($mausac)){
		$arr_mausac=explode('.',$_GET['mausac']);
		foreach($arr_mausac as $v){
			$arr_mausac1.="'".$v."',";
		}
		$where .=" and mausac in(".substr($arr_mausac1,0,-1).")";	
	}
	if(!empty($soghe)){
		$arr_soghe=explode('.',$_GET['soghe']);
		foreach($arr_soghe as $v){
			$arr_soghe1.="'".$v."',";
		}
		$where .=" and soghe in(".substr($arr_soghe1,0,-1).")";	
	}
	if(!empty($socua)){
		$arr_socua=explode('.',$_GET['socua']);
		foreach($arr_socua as $v){
			$arr_socua1.="'".$v."',";
		}
		$where .=" and socua in(".substr($arr_socua1,0,-1).")";	
	}
	if(!empty($tinhtrang) && $tinhtrang!='all'){
		$arr_tinhtrang=explode('.',$_GET['tinhtrang']);
		foreach($arr_tinhtrang as $v){
			$arr_tinhtrang1.="'".$v."',";
		}
		$where .=" and tinhtrang in(".substr($arr_tinhtrang1,0,-1).")";
	}
	if(!empty($xuatsu)){
		$arr_xuatsu=explode('.',$_GET['xuatsu']);
		foreach($arr_xuatsu as $v){
			$arr_xuatsu1.="'".$v."',";
		}
		$where .=" and xuatsu in(".substr($arr_xuatsu1,0,-1).")";	
	}
	if(!empty($dandong)){
		$arr_dandong=explode('.',$_GET['dandong']);
		foreach($arr_dandong as $v){
			$arr_dandong1.="'".$v."',";
		}
		$where .=" and dandong in(".substr($arr_dandong1,0,-1).")";	
	}
	if(!empty($giatu)){
		$where .=" and giatien>=".$giatu;
	}
	if(!empty($giaden)){
		$where .=" and giatien<=".$giaden;
	}
	if(!empty($sokmtu)){
		$where .=" and sokm>=".$sokmtu;
	}
	if(!empty($sokmden)){
		$where .=" and sokm<=".$sokmden;
	}
	if(!empty($namtu)){
		$where .=" and nam>=".$namtu;
	}
	if(!empty($namden)){
		$where .=" and nam<=".$namden;
	}
	if(!empty($quan)){
		$where .= " and quan='".$quan."'";
	}
	
	if(!empty($nhienlieutu)){
		$where .= " and mucdotieuthu>='".$nhienlieutu."'";
	}
	if(!empty($nhienlieuden)){
		$where .= " and mucdotieuthu<='".$nhienlieuden."'";
	}
	if(!empty($tukhoa)){
		$where .= " and (ten$lang LIKE '%$tukhoa%')";
	}
	if(!empty($loaihinh)){
		$where .= " and loaihinh='".$_GET['loaihinh']."'";
	}
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
	
	$url_link = getCurrentPageURL();
?>

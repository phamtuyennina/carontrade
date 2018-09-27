<?php if(!defined('_source')) die("Error");
	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
	$urlcu = "";
	$urlcu .= (isset($_REQUEST['type'])) ? "&type=".addslashes($_REQUEST['type']) : "";
	$urlcu .= (isset($_REQUEST['p'])) ? "&p=".addslashes($_REQUEST['p']) : "";
	
	switch($act){
		case "man":
			get_mans();
			$template = "quanly/mans";
			break;
		case "add":
			$template = "quanly/man_add";
			break;
		case "edit":
			get_man();
			$template = "quanly/man_add";
			break;
		case "save":
			save_man();
			break;	
		case "delete":
			delete_man();
			break;		
//=============================		
		case "code":
			get_codes();
			$template = "quanly/codes";
			break;
		case "add_code":
			$template = "quanly/code_add";
			break;
		case "edit_code":
			get_code1();
			$template = "quanly/code_add";
			break;
		case "save_code":
			save_code();
			break;
		case "delete_code":
			delete_code();
			break;
//=============================		
		case "mocthanhvien":
			get_mocthanhviens();
			$template = "quanly/thanhviens";
			break;
		case "add_mocthanhvien":
			$template = "quanly/thanhvien_add";
			break;
		case "edit_mocthanhvien":
			get_mocthanhvien();
			$template = "quanly/thanhvien_add";
			break;
		case "save_mocthanhvien":
			save_mocthanhvien();
			break;
		case "delete_mocthanhvien":
			delete_mocthanhvien();
			break;				
//=============================		
		case "thuchi":
			get_thuchis();
			$template = "quanly/thuchis";
			break;
		case "add_thuchi":
			$template = "quanly/thuchi_add";
			break;
		case "edit_thuchi":
			get_thuchi();
			$template = "quanly/thuchi_add";
			break;
		case "save_thuchi":
			save_thuchi();
			break;
		case "delete_thuchi":
			delete_thuchi();
			break;						
		default:
			$template = "index";
	}
function get_mans(){
	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;

	if($_REQUEST['type']!='')
	{
		$where.=" and type='".$_REQUEST['type']."'";
	}
	if($_REQUEST['key']!='')
	{
		$where.=" and ten like '%".$_REQUEST['key']."%'";
	}
	$where.=" order by stt,id desc";

	$sql="SELECT count(id) AS numrows FROM #_quanly_danhmuc where id<>0 $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_quanly_danhmuc where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link="index.php?com=quanly&act=man".$urlcu;
}
//===========================================================
function delete_man(){
	global $d,$urlcu;	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=quanly&act=man&type=".$_GET['type']."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=quanly&act=man".$urlcu);
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
			
		} 
		redirect("index.php?com=quanly&act=man".$urlcu);
	}
}
//===========================================================
function get_man(){
	global $d, $item,$urlcu;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=man".$urlcu);
	
	$sql = "select * from #_quanly_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=quanly&act=man".$urlcu);
	$item = $d->fetch_array();
}
//===========================================================
function save_man(){
	global $d,$config,$urlcu;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=man".$urlcu);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);	
		if(isset($_POST['apdung']) && !isset($_POST['apdung1'])){
			$data['apdung']='Cá nhân';
		}
		if(isset($_POST['apdung1']) && !isset($_POST['apdung'])){
			$data['apdung']='Đại lý';
		}
		if(isset($_POST['apdung1']) && isset($_POST['apdung'])){
			$data['apdung']='Đại lý,Cá nhân';
		}	
		$data['gia'] = doubleval(str_replace(',','',$_POST['gia']));
		$data['sokm'] = str_replace(',','',$_POST['sokm']);
		$data['mucdotieuthu'] = str_replace(',','',$_POST['mucdotieuthu']);
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['type'] = $_REQUEST['type'];
		$data['stt'] = $_POST['stt'];
		$data['stt'] = $_POST['macode'];
		$data['thoigian'] = $_POST['thoigian'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];		
		}
		$d->setTable('quanly_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
		{	
			redirect("index.php?com=quanly&act=man".$urlcu);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=quanly&act=man".$urlcu);
	}else{
		if(isset($_POST['apdung']) && !isset($_POST['apdung1'])){
			$data['apdung']='Cá nhân';
		}
		if(isset($_POST['apdung1']) && !isset($_POST['apdung'])){
			$data['apdung']='Đại lý';
		}
		if(isset($_POST['apdung1']) && isset($_POST['apdung'])){
			$data['apdung']='Đại lý,Cán nhân';
		}
		
		$data['gia'] = doubleval(str_replace(',','',$_POST['gia']));
		$data['sokm'] = str_replace(',','',$_POST['sokm']);
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['mucdotieuthu'] = str_replace(',','',$_POST['mucdotieuthu']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['type'] = $_REQUEST['type'];
		$data['thoigian'] = $_POST['thoigian'];
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];			
		}

		$d->setTable('quanly_danhmuc');
		if($d->insert($data))
		{
			redirect("index.php?com=quanly&act=man".$urlcu);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=quanly&act=man".$urlcu);
	}
}	

//========================
function get_codes(){
	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;

	if($_REQUEST['type']!='')
	{
		$where.=" and type='".$_REQUEST['type']."'";
	}
	if($_REQUEST['key']!='')
	{
		$where.=" and ten like '%".$_REQUEST['key']."%'";
	}
	$where.=" order by stt,id desc";

	$sql="SELECT count(id) AS numrows FROM #_quanly_danhmuc where id<>0 $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_quanly_danhmuc where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link="index.php?com=quanly&act=code".$urlcu;
}
//===========================================================
function get_code1(){
	global $d, $item,$urlcu;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=code".$urlcu);
	
	$sql = "select * from #_quanly_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=quanly&act=code".$urlcu);
	$item = $d->fetch_array();
}
//===========================================================
function save_code(){
	global $d,$config,$urlcu;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=code".$urlcu);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);		
		$data['gia'] = str_replace(',','',$_POST['gia']);
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['type'] = $_REQUEST['type'];
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		$data['phantram'] = $_POST['phantram'];
		$data['macode'] = $_POST['macode'];				
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];		
		}
		
		$d->setTable('quanly_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
		{	
			redirect("index.php?com=quanly&act=code".$urlcu);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=quanly&act=code".$urlcu);
	}else{
		
		$data['gia'] = str_replace(',','',$_POST['gia']);
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['type'] = $_REQUEST['type'];
		$data['phantram'] = $_POST['phantram'];
		$data['macode'] = $_POST['macode'];
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];			
		}
		
		$d->setTable('quanly_danhmuc');
		if($d->insert($data))
		{
			redirect("index.php?com=quanly&act=code".$urlcu);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=quanly&act=code".$urlcu);
	}
}	
function delete_code(){
	global $d,$urlcu;	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=quanly&act=code&type=".$_GET['type']."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=quanly&act=code".$urlcu);
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
			
		} 
		redirect("index.php?com=quanly&act=code".$urlcu);
	}
}


//==================================
function get_thuchis(){
	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu,$tongthu,$tongchi;
	if($_REQUEST['sort']!=''){
		if($_REQUEST['sort']==2){
			$where.=" and ngaytao>=".strtotime(date('Y/m/d',strtotime("-1 days")))." ";
			$where.=" and ngaytao<".strtotime(date('Y/m/d',time()))." ";
		}elseif($_REQUEST['sort']==3){
			$week_start = date('Y-m-d', strtotime('-'.date('w').' days'));
			$week_end = date('Y-m-d', strtotime('+'.(6-date('w')).' days'));
			$where.=" and ngaytao>=".strtotime($week_start)." ";
			$where.=" and ngaytao<=".strtotime($week_end)." ";
		}elseif($_REQUEST['sort']==4){
			$firstDayUTS = mktime (0, 0, 0, date("m"), 1, date("Y"));
			$lastDayUTS = mktime (0, 0, 0, date("m"), date('t'), date("Y"));
			$firstDay = date("Y-m-d", $firstDayUTS);
			$lastDay = date("Y-m-d", $lastDayUTS);
			$where.=" and ngaytao>=".strtotime($firstDay)." ";
			$where.=" and ngaytao<=".strtotime($lastDay)." ";			
		}elseif($_REQUEST['sort']==5){
			$currentY = date('Y');
			$lastyearS = mktime(0, 0, 0, 1, 1,  $currentY);
			$lastyearE = mktime(0, 0, 0, 12, 31,  $currentY);
			$where.=" and ngaytao>=".strtotime(date('Y/m/d',$lastyearS))." ";
			$where.=" and ngaytao<=".strtotime(date('Y/m/d',$lastyearE))." ";	
		}
	}elseif($_REQUEST['ngaybd']!='' or $_REQUEST['ngaykt']!=''){
		if($_GET["ngaybd"]!=''){
		$ngaybatdau = $_GET["ngaybd"];		
		$Ngay_arr = explode("/",$ngaybatdau); // array(17,11,2010)
		if (count($Ngay_arr)==3) {
			$ngay = $Ngay_arr[0]; //17
			$thang = $Ngay_arr[1]; //11
			$nam = $Ngay_arr[2]; //2010
			if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Nhập ngày bắt đầu<br>";} else $ngaybatdau=$nam."-".$thang."-".$ngay;
		}	
			$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
		}
	
		if($_GET["ngaykt"]!=''){
		$ngayketthuc = $_GET["ngaykt"];		
		$Ngay_arr = explode("/",$ngayketthuc); // array(17,11,2010)
		if (count($Ngay_arr)==3) {
			$ngay = $Ngay_arr[0]; //17
			$thang = $Ngay_arr[1]; //11
			$nam = $Ngay_arr[2]; //2010
			if (checkdate($thang,$ngay,$nam)==false){ $coloi=true; $error_ngaysinh = "Nhập ngày kết thúc<br>";} else $ngayketthuc=$nam."-".$thang."-".$ngay;
			$nkz=strtotime($ngayketthuc)+86399;
			
		}	
			$where.=" and ngaytao<=".$nkz." ";
			
		}
	}else{
		$ngaybatdau=date('Y',time())."-".date('m',time())."-".date('d',time());
		$where.=" and ngaytao>=".strtotime($ngaybatdau)." ";
	}
	if(!empty($_GET['loaihinh'])){
		$where.=" and loaihinh=".$_GET['loaihinh'] ;
	}
	$where.=" order by ngaytao desc";

	$sql="SELECT count(id) AS numrows FROM #_quanly_danhmuc where id<>0 and type='thuchi' $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=40;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_quanly_danhmuc where id<>0 and type='thuchi' $where limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();
		
	
	$d->reset();
	$sql = "select sum(gia) as thu from #_quanly_danhmuc where id<>0 and type='thuchi' and loaihinh=1 $where ";		
	$d->query($sql);
	$tongthu = $d->fetch_array();
	
	$d->reset();
	$sql = "select *,sum(gia) as chi from #_quanly_danhmuc where id<>0 and type='thuchi' and loaihinh=0 $where ";		
	$d->query($sql);
	$tongchi = $d->fetch_array();

	$url_link="index.php?com=quanly&act=thuchi".$urlcu;
}
//===========================================================
function delete_thuchi(){
	global $d,$urlcu;	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=quanly&act=thuchi&type=".$_GET['type']."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=quanly&act=thuchi".$urlcu);
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
			
		} 
		redirect("index.php?com=quanly&act=thuchi".$urlcu);
	}
}
//===========================================================
function get_thuchi(){
	global $d, $item,$urlcu;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=thuchi".$urlcu);
	
	$sql = "select * from #_quanly_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=quanly&act=thuchi".$urlcu);
	$item = $d->fetch_array();
}
//===========================================================
function save_thuchi(){
	global $d,$config,$urlcu;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=thuchi".$urlcu);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);		
		$data['gia'] = (int)$_POST['gia'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['type'] = $_REQUEST['type'];
		$data['stt'] = $_POST['stt'];
		$data['stt'] = $_POST['macode'];
		$data['loaihinh'] = $_POST['loaihinh'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];		
		}
		$d->setTable('quanly_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
		{	
			redirect("index.php?com=quanly&act=thuchi".$urlcu);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=quanly&act=thuchi".$urlcu);
	}else{
		
		$data['gia'] = (int)$_POST['gia'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['type'] = $_REQUEST['type'];
		$data['loaihinh'] = $_POST['loaihinh'];
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];			
		}
		$d->setTable('quanly_danhmuc');
		if($d->insert($data))
		{
			redirect("index.php?com=quanly&act=thuchi".$urlcu);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=quanly&act=thuchi".$urlcu);
	}
}	
//===========================================================

function get_mocthanhviens(){
	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;

	if($_REQUEST['type']!='')
	{
		$where.=" and type='".$_REQUEST['type']."'";
	}
	if($_REQUEST['key']!='')
	{
		$where.=" and ten like '%".$_REQUEST['key']."%'";
	}
	$where.=" order by stt,id desc";

	$sql="SELECT count(id) AS numrows FROM #_quanly_danhmuc where id<>0 $where";
	$d->query($sql);	
	$dem=$d->fetch_array();
	$totalRows=$dem['numrows'];
	$page=$_GET['p'];
	
	$pageSize=20;
	$offset=10;
						
	if ($page=="")
		$page=1;
	else 
		$page=$_GET['p'];
	$page--;
	$bg=$pageSize*$page;		
	
	$sql = "select * from #_quanly_danhmuc where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();	
	$url_link="index.php?com=quanly&act=mocthanhvien".$urlcu;
}
//===========================================================
function delete_mocthanhvien(){
	global $d,$urlcu;	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);		
		$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=quanly&act=mocthanhvien&type=".$_GET['type']."");
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=quanly&act=mocthanhvien".$urlcu);
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
			$d->reset();
		$sql = "select * from #_quanly_danhmuc where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$sql = "delete from #_quanly_danhmuc where id='".$id."'";
			$d->query($sql);
		}
			
		} 
		redirect("index.php?com=quanly&act=mocthanhvien".$urlcu);
	}
}
//===========================================================
function get_mocthanhvien(){
	global $d, $item,$urlcu;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=mocthanhvien".$urlcu);
	
	$sql = "select * from #_quanly_danhmuc where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực", "index.php?com=quanly&act=mocthanhvien".$urlcu);
	$item = $d->fetch_array();
}
//===========================================================
function save_mocthanhvien(){
	global $d,$config,$urlcu;
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=quanly&act=mocthanhvien".$urlcu);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);		
		$data['gia'] = (int)$_POST['gia'];
		$data['giaden'] = (int)$_POST['giaden'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['type'] = $_REQUEST['type'];
		$data['stt'] = $_POST['stt'];
		$data['phantram'] = $_POST['phantram'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaysua'] = time();
		
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];		
		}
		$d->setTable('quanly_danhmuc');
		$d->setWhere('id', $id);
		if($d->update($data))
		{	
			redirect("index.php?com=quanly&act=mocthanhvien".$urlcu);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=quanly&act=mocthanhvien".$urlcu);
	}else{
		
		$data['gia'] = (int)$_POST['gia'];
		$data['giaden'] = (int)$_POST['giaden'];
		$data['tenkhongdau'] = changeTitle($_POST['ten']);
		$data['stt'] = $_POST['stt'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['ngaytao'] = time();
		$data['phantram'] = $_POST['phantram'];		
		$data['type'] = $_REQUEST['type'];
		foreach ($config['lang'] as $key => $value) {
			$data['ten'.$key] = $_POST['ten'.$key];
			$data['mota'.$key] = $_POST['mota'.$key];			
		}
		$d->setTable('quanly_danhmuc');
		if($d->insert($data))
		{
			redirect("index.php?com=quanly&act=mocthanhvien".$urlcu);
		}
		else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=quanly&act=mocthanhvien".$urlcu);
	}
}	

?>

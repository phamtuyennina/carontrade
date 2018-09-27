<?php  if(!defined('_source')) die("Error");
	if(isAjaxRequest()){
	error_reporting(0);

	switch($_GET['act']){
		case 'luutin':
			luutin();
			break;
		case 'countslider':
				countslider();
				break;
		case 'baocaovipham':
			baocaovipham();
			break;
		case 'timkiemxe':
			timkiemxe();
			break;
		case 'dangkylaithu':
				dangkylaithu();
				break;
	  case 'dangkytragop':
				dangkytragop();
				break;
		case 'danhgiaxe':
			danhgiaxe();
			break;
		case 'capnhatmatkhau':
			capnhatmatkhau();
			break;
		case 'capnhatthongtin':
			capnhatthongtin();
			break;
		case 'taotinfix':
			taotinfix();
			break;
		case 'danhgiauser':
			danhgiauser();
			break;
		case 'luunhap':
			luunhap();
			break;
		case 'dangtin':
			luubaiviet();
			break;
		case 'huytin':
			huytin();
			break;
		case 'huytinsua':
			huytinsua();
			break;
		case 'xoatinchitiet':
			xoatinchitiet();
			break;
	  case 'xoatinluu':
			xoatinluu();
			break;
		case 'timxe':
			timxe();
			break;
		case 'timmauxe':
			timmauxe();
			break;
		case 'xoahinh':
			xoahinh();
			break;
		case 'loadmauxe':
			loadmauxe();
			break;
		case 'tinhthanh':
			tinhthanh();
			break;
		case 'mauxe':
			loadmauxe2();
			break;
		case 'danhgiaweb':
			danhgiaweb();
			break;
		case 'update-ship':
			shipping();
			break;
		case 'dangkythanhvien':
			dangkythanhvien();
			break;
		case 'dangnhapthanhvien':
			dangnhapthanhvien();
			break;
		case 'quenmatkhau':
			quenmatkhau();
			break;
		case 'add-cart':
			addCart();
			break;
		case 'update-cart':
			updateCart();
			break;
		case 'get-cart-num':
			echo get_total();
			break;
		case 'delete-cart':
			deleteCart($_POST['id']);
			break;
		case 'clear-cart':
			unset($_SESSION['cart']);
			break;

	}
	die;
	}
	die("<h2>ERROR</h2>");
function countslider(){
	global $id;
	do_Statistics($_POST['id']);
	
}	
function baocaovipham(){
	global $d;
	$id=$_POST['id'];
	$data['tinxau']=1;
	$d->reset();
	$d->setTable('dangtin');
	$d->setWhere('id', $id);
	if($d->update($data)){
		echo 0;
	}else{
		echo -1;
	}	
}	
function luutin(){
	global $d,$idtin,$user;
	$idtin=$_POST['idtin'];
	$user=info_user($_POST['user']);
	$array_luu=explode(',',$user['luutin']);
	if(in_array($idtin,$array_luu)){
		die;
	}
	if(empty($user['id'])){
		echo -1;die;
	}
  
	if(!empty($user['luutin'])){
		$chuoiluu=$user['luutin'].','.$idtin;
	}else{$chuoiluu=$idtin;}
	
  $data['luutin']=$chuoiluu;
	$d->reset();
	$d->setTable('thanhvien');
	$d->setWhere('id', $user['id']);
	if($d->update($data)){
		echo 0;
	}else{
		echo -1;
	}	
}	
function dangkylaithu()
{
	global $d,$company,$config_url,$user;
	$user=info_user($_POST['idnguoiban']);
	if($_POST['capcha']!=$_SESSION['tragop']){
			echo json_encode(array("thongbao"=>"Mã bảo vệ không hợp lệ.","error"=>0));die;
	}
	include_once "phpMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
	$mail->Host       = $ip_host;   // tên SMTP server
	$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
	$mail->Username   = $mail_host; // SMTP account username
	$mail->Password   = $pass_mail;
	$mail->SetFrom($mail_host, $company['ten']);
	$mail->AddAddress($_POST['email'], $company['ten']);
	$mail->AddAddress($user['email'], $company['ten']);
	$mail->AddAddress($_POST['emaillaithu'], $company['ten']);
	$mail->Subject    = '[CarOntrade.com] Thông báo đăng ký lái thử xe';
	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";	
		$body = '<table>';
		$body .= '
			<tr>
				<th colspan="2">&nbsp;</th>
			</tr>
			<tr>
				<th colspan="2">Thư đăng ký lái thử từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
			</tr>
			<tr>
				<th colspan="2">&nbsp;</th>
			</tr>
			<tr>
				<th>Họ tên người đăng ký:</th><td>'.$_POST['hotenlaithu'].'</td>
			</tr>
			<tr>
				<th>Điện thoại người đăng ký:</th><td>'.$_POST['dienthoailaithu'].'</td>
			</tr>
			<tr>
				<th>Email người đăng ký:</th><td>'.$_POST['emaillaithu'].'</td>
			</tr>
			<tr>
				<th>Tiêu đề tin:</th><td>'.$_POST['tieudetin'].'</td>
			</tr>
			<tr>
				<th>Mã tin:</th><td>'.$_POST['matin'].'</td>
			</tr>
			
			<tr>
				<th>Họ tên người bán :</th><td>'.$user['hoten'].'</td>
			</tr>
			<tr>
				<th>Điện thoại người bán :</th><td>'.$user['dienthoai'].'</td>
			</tr>
			<tr>
				<th>Email người bán :</th><td>'.$user['email'].'</td>
			</tr>';
		$body .= '</table>';
	$mail->Body = $body;
	dump($body);
	if($mail->Send()){
		$d->update($data);
			echo json_encode(array("thongbao"=>"Hệ thống bị lỗi. Vui lòng thử lại sau !","error"=>1));
	}else{
		echo json_encode(array("thongbao"=>"Hệ thống bị lỗi. Vui lòng thử lại sau !","error"=>0));
	}
	
}
function dangkytragop()
{
	global $d,$company,$config_url,$user;
	$user=info_user($_POST['idnguoiban']);
	if($_POST['capcha']!=$_SESSION['laithu']){
			echo json_encode(array("thongbao"=>"Mã bảo vệ không hợp lệ.","error"=>0));die;
	}
	include_once "phpMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
	$mail->Host       = $ip_host;   // tên SMTP server
	$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
	$mail->Username   = $mail_host; // SMTP account username
	$mail->Password   = $pass_mail;
	$mail->SetFrom($mail_host, $company['ten']);
	$mail->AddAddress($_POST['email'], $company['ten']);
	$mail->AddAddress($user['email'], $company['ten']);
	$mail->AddAddress($_POST['emaillaithu'], $company['ten']);
	$mail->Subject    = '[CarOntrade.com] Thông báo thông báo hỗ trợ vay trả góp';
	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";	
		$body = '<table>';
		$body .= '
			<tr>
				<th colspan="2">&nbsp;</th>
			</tr>
			<tr>
				<th colspan="2">Thư hỗ trợ vay trả góp từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
			</tr>
			<tr>
				<th colspan="2">&nbsp;</th>
			</tr>
			<tr>
				<th>Họ tên người đăng ký:</th><td>'.$_POST['hotenlaithu'].'</td>
			</tr>
			<tr>
				<th>Điện thoại người đăng ký:</th><td>'.$_POST['dienthoailaithu'].'</td>
			</tr>
			<tr>
				<th>Email người đăng ký:</th><td>'.$_POST['emaillaithu'].'</td>
			</tr>
			<tr>
				<th>Tiêu đề tin:</th><td>'.$_POST['tieudetin'].'</td>
			</tr>
			<tr>
				<th>Mã tin:</th><td>'.$_POST['matin'].'</td>
			</tr>
			
			<tr>
				<th>Họ tên người bán :</th><td>'.$user['hoten'].'</td>
			</tr>
			<tr>
				<th>Điện thoại người bán :</th><td>'.$user['dienthoai'].'</td>
			</tr>
			<tr>
				<th>Email người bán :</th><td>'.$user['email'].'</td>
			</tr>';
		$body .= '</table>';
	$mail->Body = $body;
	dump($body);
	if($mail->Send()){
		$d->update($data);
			echo json_encode(array("thongbao"=>"Hệ thống bị lỗi. Vui lòng thử lại sau !","error"=>1));
	}else{
		echo json_encode(array("thongbao"=>"Hệ thống bị lỗi. Vui lòng thử lại sau !","error"=>0));
	}
	
}
function timkiemxe(){
	global $d,$totalRows;
	$tinhtrang=(string)$_POST['tinhtrang'];
	$id_hang=(string)$_POST['id_hang'];
	$id_kieudang=(string)$_POST['id_kieudang'];
	$id_mauxe=(string)$_POST['id_mauxe'];

	$giatu=(int)$_POST['giatu'];
	$giaden=(int)$_POST['giaden'];

	$quan=(int)$_POST['quan'];

	$where =" id<>0";
	if(!empty($id_hang)){
		$where .=" and id_hang =".$id_hang;
	}
	if(!empty($id_kieudang)){
		$where .=" and id_kieudang =".$id_kieudang;
	}
	if(!empty($id_mauxe)){
		$where .=" and id_mauxe =".$id_mauxe;
	}
	if(!empty($tinhtrang) ){
		if($tinhtrang=='all'){
			$where .=" and (tinhtrang='xe-moi' or tinhtrang='xe-da-su-dung')";
		}else{
			$where .=" and tinhtrang='".$tinhtrang."'";
		}
	}
	if(!empty($giatu)){
		$where .=" and giatien>=".$giatu;
	}
	if(!empty($giaden)){
		$where .=" and giatien<=".$giaden;
	}
	if(!empty($quan)){
		$where .= " and quan='".$quan."'";
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
	echo $totalRows;
}
function danhgiaxe(){
	$phantram=(float)$_POST['tinhtrang'];
	$thangmua=(int)$_POST['thangmua'];
	$nammua=(int)$_POST['nammua'];
	$thangban=(int)$_POST['thangban'];
	$namban=(int)$_POST['namban'];
	$giamua=(int)str_replace(',','',$_POST['giamua']);

	$khauhao=($phantram/12);
	$sonam=$namban-$nammua;
	$tmp=0;
	if($thangmua==$thangban){
		$sonam=$sonam;
	}elseif($thangmua>$thangban){
		$sonam=$sonam-1;
		$tmp=13-$thangmua;
	}elseif($thangmua<$thangban){
		$sonam=$sonam;
		$tmp=$thangban-$thangmua;
	}
	$sothang=$tmp+($sonam*12);

	$tongkhauhao=$khauhao*$sothang;
	$rs['tongkhauhao']=round($tongkhauhao,2);
	$rs['giasaukhauhao']=number_format($giamua-($giamua*($tongkhauhao/100)),0, '.', '.');
	echo json_encode($rs);
}
function capnhatmatkhau(){
	global $d,$config;
	$matkhaucu=encrypt_password(magic_quote((string)$_POST['old_matkhau']),$config['salt']);
	$d->reset();
	$sql = "select * from table_thanhvien where email='".(string)$_POST['email']."' and matkhau='".$matkhaucu."'";
	$d->query($sql);
	$row = $d->result_array();

	if(empty($row)){
		echo json_encode(array("code"=>-1));die();
	}else{
		$d->reset();
		$data['matkhau']=encrypt_password((string)$_POST['matkhau'],$config['salt']);
		$d->setTable('thanhvien');
		$d->setWhere('email', (string)$_POST['email']);
		if($d->update($data)){
			echo json_encode(array("code"=>1));
		}else{
			echo json_encode(array("code"=>0));
		}
	}
}
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;
	}
function capnhatthongtin(){
	global $d;
	if(!empty($_FILES)){
		$file_name=$_FILES['file']['name'];
		if($photo = upload_image("file", _format_duoihinh, _upload_thanhvien_l,$file_name)){
			$data['photo'] = $photo;
			$d->setTable('thanhvien');
			$d->setWhere('id', $id);
			$d->select();
			if($d->num_rows()>0){
				$row = $d->fetch_array();
				delete_file(_upload_sanpham.$row['photo']);
			}

		}

	}

	$data['hoten']=magic_quote($_POST['hoten']);
	$data['tencongty']=magic_quote($_POST['tencongty']);
	$data['dienthoai']=magic_quote($_POST['dienthoai']);
	$data['cmnd']=magic_quote($_POST['cmnd']);
	$data['masothue']=magic_quote($_POST['masothue']);
	$data['diachi']=magic_quote($_POST['diachi']);
	$d->setTable('thanhvien');
	$d->setWhere('id', (int)$_POST['id']);
	if($d->update($data)){
		$_SESSION['user_w']['hoten'] = $data['hoten'];
		$_SESSION['user_w']['dienthoai'] =$data['dienthoai'];
		$_SESSION['user_w']['email'] = $data['email'];
		$_SESSION['user_w']['congty'] = $data['tencongty'];
		$_SESSION['user_w']['dienthoai'] = $data['dienthoai'];
		echo json_encode(array("code"=>1));
	}else{
		echo json_encode(array("code"=>0));
	}
}
function taotinfix(){
	global $d;
	$id=(int)$_POST['id'];
	$url=(string)$_POST['url'];
	$d->reset();
	$sql = "select * from #_dangtin where id='".$id."'";
	$d->query($sql);
	$item=$d->fetch_array();
	$_SESSION['dangtin']['nhasanxuat']=$item['id_hang'];
	$_SESSION['dangtin']['kieudang']=$item['id_kieudang'];
	$_SESSION['dangtin']['mauxe']=$item['id_mauxe'];
	$_SESSION['dangtin']['nam']=$item['nam'];

	$_SESSION['dangtin']['hopso']=$item['hopso'];
	$_SESSION['dangtin']['dongco']=$item['dongco'];
	$_SESSION['dangtin']['soghe']=$item['soghe'];
	$_SESSION['dangtin']['tinhtrang']=$item['tinhtrang'];
	$_SESSION['dangtin']['nhienlieu']=$item['nhienlieu'];
	$_SESSION['dangtin']['socua']=$item['socua'];
	$_SESSION['dangtin']['sokm']=$item['sokm'];
	$_SESSION['dangtin']['mausac']=$item['mausac'];
	$_SESSION['dangtin']['giatien']=$item['giatien'];
	$_SESSION['dangtin']['xuatsu']=$item['xuatsu'];
	$_SESSION['dangtin']['dandong']=$item['dandong'];
	$_SESSION['dangtin']['mucdotieuthu']=$item['mucdotieuthu'];
	$_SESSION['dangtin']['mota']=$item['noidung'];
	$_SESSION['dangtin']['ten']=$item['ten'];
	$_SESSION['dangtin']['tinhthanh']=$item['quan'];
	$_SESSION['dangtin']['quanhuyen']=$item['huyen'];
	$_SESSION['dangtin']['id_tmp']=$item['id'];
	$_SESSION['dangtin']['kiemduyet']=$item['kiemduyet'];
	$_SESSION['dangtin']['fix']=true;
	$_SESSION['dangtin']['url']=$url;
}
function huytin(){
	global $d;
	$id=(int)$_POST['id'];
	$id =  themdau($id);

	$d->reset();
	$sql = "select * from #_dangtin where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$arr=explode('|',$row['hinhanh']);
		foreach($arr as $v){
			delete_file(_upload_tmp.$v);
		}
		$sql = "delete from #_dangtin where id='".$id."'";
		$d->query($sql);
	}
	unset($_SESSION['dangtin']);
	echo 1;

}
function huytinsua(){
	global $d;
	unset($_SESSION['dangtin']);
	echo 1;

}
function xoatinchitiet(){
	global $d;
	$id=(int)$_POST['id'];
	$id =  themdau($id);

	$d->reset();
	$sql = "select * from #_dangtin where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()>0){
		$row = $d->fetch_array();
		$arr=explode('|',$row['hinhanh']);
		foreach($arr as $v){
			delete_file(_upload_tmp.$v);
		}
		$sql = "delete from #_dangtin where id='".$id."'";
		$d->query($sql);
	}
	echo 1;
}
function xoatinluu(){
	global $d;
	$idtin=(int)$_POST['id'];
	$idtin =  themdau($idtin);
	$user=$_SESSION['user_w']['id'];
	$d->reset();
	$sql = "select luutin from #_thanhvien where id='".$user."'";
	$d->query($sql);
	$row = $d->fetch_array();
	$ar_tl=explode(',',$row['luutin']);
	$result1=implode(',',array_values(array_diff($ar_tl,array($idtin))));
	$data['luutin']=$result1;
	$d->reset();
	$d->setTable('thanhvien');
	$d->setWhere('id', $user);
	if($d->update($data)){
		echo 0;
	}else{
		echo -1;
	}	
}
function timxe(){
	global $d;
	$id=(int)$_POST['id'];
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='kieu-dang' and FIND_IN_SET(".$id.",id_thuonghieu) order by stt,id desc";
	$d->query($sql);
	$kieudang=$d->result_array();
	$return='';
	foreach($kieudang as $v){
		$return.='<div class="item-kieudang">
            			<input type="checkbox" name="id_kieudang" class="myCheckbox myKieudang" value='.$v['id'].'> '.$v['ten'].'</div>';
	}
	$rs['kieudang']=$return;

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='mau-xe' and FIND_IN_SET(".$id.",id_thuonghieu) order by stt,id desc";
	$d->query($sql);
	$mauxe=$d->result_array();
	$return1='';
	foreach($mauxe as $v){
		$return1.=' <div class="item-mauxe" onclick="click_div(this);">
            			<input type="checkbox" name="id_mauxe" class="myCheckbox myMauxe" value='.$v['id'].'> '.$v['ten'].'</div>';
	}

	$rs['mauxe']=$return1;
	echo json_encode($rs);

}
function timmauxe(){
	global $d;
	$id=(int)$_POST['id'];
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='mau-xe' and FIND_IN_SET(".$id.",id_kieudang) order by stt,id desc";
	$d->query($sql);
	$mauxe=$d->result_array();
	$return1='';
	foreach($mauxe as $v){
		$return1.='<div class="item-mauxe" onclick="click_div(this);">
            			<input type="checkbox" name="id_mauxe" class="myCheckbox myMauxe" value='.$v['id'].'> '.$v['ten'].'</div>';
	}

	$rs['mauxe']=$return1;
	echo json_encode($rs);

}
function luunhap(){
	global $d;
	if($_POST['pjax']==1){
		$_SESSION['dangtin']['nhasanxuat']=$_POST['hangxe'];
		$_SESSION['dangtin']['kieudang']=$_POST['kieudang'];
		$_SESSION['dangtin']['mauxe']=$_POST['mauxe'];
		$_SESSION['dangtin']['nam']=$_POST['nam'];
	}
	if($_POST['pjax']==2){
		$_SESSION['dangtin']['hopso']=$_POST['hopso'];
		$_SESSION['dangtin']['soghe']=$_POST['soghe'];
		$_SESSION['dangtin']['dongco']=$_POST['dongco'];
		$_SESSION['dangtin']['tinhtrang']=$_POST['tinhtrang'];
		$_SESSION['dangtin']['nhienlieu']=$_POST['nhienlieu'];
		$_SESSION['dangtin']['socua']=$_POST['socua'];
		$_SESSION['dangtin']['sokm']=$_POST['sokm'];
		$_SESSION['dangtin']['mausac']=$_POST['mausac'];
		$_SESSION['dangtin']['giatien']=$_POST['giatien'];
		$_SESSION['dangtin']['xuatsu']=$_POST['xuatsu'];
		$_SESSION['dangtin']['dandong']=$_POST['dandong'];
		$_SESSION['dangtin']['mucdotieuthu']=$_POST['mucdotieuthu'];

	}
	if($_POST['pjax']==3){
		$_SESSION['dangtin']['mota']=$_POST['mota'];
		$_SESSION['dangtin']['ten']=$_POST['ten'];
	}
	if($_POST['pjax']==4){
		if(!empty($_FILES)){
		include(_lib.'class.uploader.php');
		$uploader = new Uploader();
		$datax = $uploader->upload($_FILES['files'], array(
			'limit' => 20,
			'maxSize' => 5,
			'extensions' => array("jpg","png","gif","JPG","jpeg","JPEG"),
			'required' => false,
			'uploadDir' => _upload_tmp_l,
			'title' => array('auto', 10),
			'removeFiles' => true,
			'onRemove' => 'onFilesRemoveCallback'
		));

		foreach($datax['data']['metas'] as $k=>$v){
			$image = $v['name'];
			$arr_img[] = $image;
		}
		$hinhanh=implode('|',$arr_img);
		$d->reset();
		$sql="select hinhanh FROM #_dangtin where id=".$_SESSION['dangtin']['id_tmp']."";
		$d->query($sql);
		$name_tmp=$d->result_array();
		if(!empty($name_tmp)){
			if(!empty($hinhanh)){$tmp_=$name_tmp[0]['hinhanh']."|".$hinhanh;}
		}else{
			if(!empty($hinhanh)){$tmp_=$hinhanh;}
		}

		if(!empty($tmp_)){
			$d->query("update table_dangtin set hinhanh='".$tmp_."' where id=".$_SESSION['dangtin']['id_tmp']."");
		}
		}
	}
	if($_POST['pjax']==5){
		$_SESSION['dangtin']['tragop']=$_POST['tragop'];
		$_SESSION['dangtin']['laithu']=$_POST['laithu'];
	}
	if($_POST['pjax']==6){
		$_SESSION['dangtin']['tinhthanh']=$_POST['tinhthanh'];
		$_SESSION['dangtin']['quanhuyen']=$_POST['quanhuyen'];
		$_SESSION['dangtin']['loaitin']=$_POST['loaitin'];
		$_SESSION['dangtin']['goitin']=$_POST['goitin'];
	}

	$data['id_hang']=$_SESSION['dangtin']['nhasanxuat'];
	$data['id_kieudang']=$_SESSION['dangtin']['kieudang'];
	$data['id_mauxe']=$_SESSION['dangtin']['mauxe'];
	$data['nam']=$_SESSION['dangtin']['nam'];

	$data['hopso']=(string)$_SESSION['dangtin']['hopso'];
	$data['dongco']=(string)$_SESSION['dangtin']['dongco'];
	$data['soghe']=(string)$_SESSION['dangtin']['soghe'];
	$data['tinhtrang']=(string)$_SESSION['dangtin']['tinhtrang'];
	$data['nhienlieu']=(string)$_SESSION['dangtin']['nhienlieu'];
	$data['socua']=(string)$_SESSION['dangtin']['socua'];
	$data['sokm']=(int)str_replace(',','',$_SESSION['dangtin']['sokm']);
	$data['mausac']=(string)$_SESSION['dangtin']['mausac'];
	$data['giatien']=doubleval(str_replace(',','',$_SESSION['dangtin']['giatien']));
	$data['noidung']=magic_quote($_SESSION['dangtin']['mota']);
	$data['ten']=(string)$_SESSION['dangtin']['ten'];
	$data['tenkhongdau']=changeTitle((string)$_SESSION['dangtin']['ten']);
	$data['quan']=(int)$_SESSION['dangtin']['tinhthanh'];
	$data['huyen']=(int)$_SESSION['dangtin']['quanhuyen'];
	$data['id_user']=(int)$_SESSION['user_w']['id'];
	$data['loaihinh']=changeTitle((string)$_SESSION['user_w']['loaithanhvien']);
	$data['xuatsu']=(int)$_SESSION['dangtin']['xuatsu'];
	$data['loaitin']=(int)$_SESSION['dangtin']['loaitin'];
	$data['goitin']=(int)$_SESSION['dangtin']['goitin'];
	$data['dandong']=(int)$_SESSION['dangtin']['dandong'];
	$data['mucdotieuthu']=str_replace(',','',$_SESSION['dangtin']['giatien']);
	$data['laithu']=(int)$_SESSION['dangtin']['laithu'];
	$data['tragop']=(int)$_SESSION['dangtin']['tragop'];
	$data['hoten']=(string)$_SESSION['user_w']['hoten'];
	$data['dienthoai']=(string)$_SESSION['user_w']['dienthoai'];
	$data['email']=(string)$_SESSION['user_w']['email'];
	$data['kiemduyet']=0;
	$data['hienthi']=1;
	$data['matin']=taomarandom('select * from #_dangtin where matin=');
	$data['ngaytao']=time();
	$data['trangthailuu']=1;
	$d->setTable('dangtin');
	$d->setWhere('id', (int)$_SESSION['dangtin']['id_tmp']);
	if($d->update($data)){
		unset($_SESSION['dangtin']);
		echo 1;
	}else{
		echo 0;
	}

}
function luubaiviet(){
	global $d;
	if($_POST['pjax']==1){
		$_SESSION['dangtin']['nhasanxuat']=$_POST['hangxe'];
		$_SESSION['dangtin']['kieudang']=$_POST['kieudang'];
		$_SESSION['dangtin']['mauxe']=$_POST['mauxe'];
		$_SESSION['dangtin']['nam']=$_POST['nam'];
	}
	if($_POST['pjax']==2){
		$_SESSION['dangtin']['hopso']=$_POST['hopso'];
		$_SESSION['dangtin']['soghe']=$_POST['soghe'];
		$_SESSION['dangtin']['dongco']=$_POST['dongco'];
		$_SESSION['dangtin']['tinhtrang']=$_POST['tinhtrang'];
		$_SESSION['dangtin']['nhienlieu']=$_POST['nhienlieu'];
		$_SESSION['dangtin']['socua']=$_POST['socua'];
		$_SESSION['dangtin']['sokm']=$_POST['sokm'];
		$_SESSION['dangtin']['mausac']=$_POST['mausac'];
		$_SESSION['dangtin']['giatien']=$_POST['giatien'];
		$_SESSION['dangtin']['xuatsu']=$_POST['xuatsu'];
		$_SESSION['dangtin']['dandong']=$_POST['dandong'];
		$_SESSION['dangtin']['mucdotieuthu']=$_POST['mucdotieuthu'];

	}
	if($_POST['pjax']==3){
		$_SESSION['dangtin']['mota']=$_POST['mota'];
		$_SESSION['dangtin']['ten']=$_POST['ten'];
	}
	if($_POST['pjax']==4){
		if(!empty($_FILES)){
		include(_lib.'class.uploader.php');
		$uploader = new Uploader();
		$datax = $uploader->upload($_FILES['files'], array(
			'limit' => 20,
			'maxSize' => 5,
			'extensions' => array("jpg","png","gif","JPG","jpeg","JPEG"),
			'required' => false,
			'uploadDir' => _upload_tmp_l,
			'title' => array('auto', 10),
			'removeFiles' => true,
			'onRemove' => 'onFilesRemoveCallback'
		));

		foreach($datax['data']['metas'] as $k=>$v){
			$image = $v['name'];
			$arr_img[] = $image;
		}
		$hinhanh=implode('|',$arr_img);
		$d->reset();
		$sql="select hinhanh FROM #_dangtin where id=".$_SESSION['dangtin']['id_tmp']."";
		$d->query($sql);
		$name_tmp=$d->result_array();
		if(!empty($name_tmp)){
			if(!empty($hinhanh)){$tmp_=$name_tmp[0]['hinhanh']."|".$hinhanh;}
		}else{
			if(!empty($hinhanh)){$tmp_=$hinhanh;}
		}

		if(!empty($tmp_)){
			$d->query("update table_dangtin set hinhanh='".$tmp_."' where id=".$_SESSION['dangtin']['id_tmp']."");
		}
		}
	}
	if($_POST['pjax']==5){
		$_SESSION['dangtin']['tragop']=$_POST['tragop'];
		$_SESSION['dangtin']['laithu']=$_POST['laithu'];
	}
	if($_POST['pjax']==6){
		$_SESSION['dangtin']['tinhthanh']=$_POST['tinhthanh'];
		$_SESSION['dangtin']['quanhuyen']=$_POST['quanhuyen'];
		$_SESSION['dangtin']['loaitin']=$_POST['loaitin'];
		$_SESSION['dangtin']['goitin']=$_POST['goitin'];
	}
	if($_SESSION['dangtin']['fix']==true){
		$data['kiemduyet']=0;
	}
	$data['id_hang']=$_SESSION['dangtin']['nhasanxuat'];
	$data['id_kieudang']=$_SESSION['dangtin']['kieudang'];
	$data['id_mauxe']=$_SESSION['dangtin']['mauxe'];
	$data['nam']=$_SESSION['dangtin']['nam'];
	$data['loaitin']=(int)$_SESSION['dangtin']['loaitin'];
	$data['goitin']=(int)$_SESSION['dangtin']['goitin'];
	$data['hopso']=(string)$_SESSION['dangtin']['hopso'];
	$data['soghe']=(string)$_SESSION['dangtin']['soghe'];
	$data['dongco']=(string)$_SESSION['dangtin']['dongco'];
	$data['tinhtrang']=(string)$_SESSION['dangtin']['tinhtrang'];
	$data['nhienlieu']=(string)$_SESSION['dangtin']['nhienlieu'];
	$data['socua']=(string)$_SESSION['dangtin']['socua'];
	$data['sokm']=(int)str_replace(',','',$_SESSION['dangtin']['sokm']);
	$data['mausac']=(string)$_SESSION['dangtin']['mausac'];
	$data['giatien']=doubleval(str_replace(',','',$_SESSION['dangtin']['giatien']));
	$data['noidung']=magic_quote($_SESSION['dangtin']['mota']);
	$data['ten']=(string)$_SESSION['dangtin']['ten'];
	$data['tenkhongdau']=changeTitle((string)$_SESSION['dangtin']['ten']);
	$data['quan']=(int)$_SESSION['dangtin']['tinhthanh'];
	$data['huyen']=(int)$_SESSION['dangtin']['quanhuyen'];
	$data['id_user']=(int)$_SESSION['user_w']['id'];
	$data['laithu']=(int)$_SESSION['dangtin']['laithu'];
	$data['tragop']=(int)$_SESSION['dangtin']['tragop'];
	$data['trangthailuu']=2;
	$data['xuatsu']=(int)$_SESSION['dangtin']['xuatsu'];
	$data['dandong']=(int)$_SESSION['dangtin']['dandong'];
	$data['mucdotieuthu']=str_replace(',','',$_SESSION['dangtin']['giatien']);
	$data['hienthi']=1;
	$data['ngaytao']=time();
	$data['hoten']=(string)$_SESSION['user_w']['hoten'];
	$data['dienthoai']=(string)$_SESSION['user_w']['dienthoai'];
	$data['email']=(string)$_SESSION['user_w']['email'];
	$data['matin']=taomarandom('select * from #_dangtin where matin=');
	$data['loaihinh']=changeTitle((string)$_SESSION['user_w']['loaithanhvien']);
	foreach($data as $k=> $v){
		if((string)$v==''){
			echo -1; die();
		}
	}
	$d->setTable('dangtin');
	$d->setWhere('id', (int)$_SESSION['dangtin']['id_tmp']);
	if($d->update($data)){
		unset($_SESSION['dangtin']);
		echo 1;
	}else{
		echo 0;
	}

}
function xoahinh(){
	global $d;
	$d->reset();
	$sql1="select hinhanh FROM table_dangtin where id=".(int)$_POST['id']."";
	$d->query($sql1);
	$name_tmp1=$d->result_array();
	if(!empty($name_tmp1[0]['hinhanh'])){
		$chuoi=explode('|',$name_tmp1[0]['hinhanh']);
	}
	foreach($chuoi as $v){
		if(($v!=(string)$_POST['name'])&& $v!=''){
			$image = $v;
			$arr_img[] = $image;
		}

	}
	$hinhanh=implode('|',$arr_img);
	delete_file(_upload_tmp_l.(string)$_POST['name']);
	$d->query("update table_dangtin set hinhanh='".$hinhanh."' where id=".(int)$_POST['id']."");
	echo md5((string)$_POST['name']);

}
function loadmauxe(){
	global $d;
	$id=(int)$_POST['id'];

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='kieu-dang' and FIND_IN_SET(".$id.",id_thuonghieu) order by stt,id desc";
	$d->query($sql);
	$kieudang=$d->result_array();
	$return='<option></option>';
	foreach($kieudang as $v){
		$return.='<option value="'.$v['id'].'">'.$v['ten'].'</option>';
	}
	$rs['kieudang']=$return;

	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='mau-xe' and FIND_IN_SET(".$id.",id_thuonghieu) order by stt,id desc";
	$d->query($sql);
	$mauxe=$d->result_array();
	$return1='<option></option>';
	foreach($mauxe as $v){
		$return1.='<option value="'.$v['id'].'">'.$v['ten'].'</option>';
	}

	$rs['mauxe']=$return1;
	echo json_encode($rs);

}
function loadmauxe2(){
	global $d;
	$id=(int)$_POST['id'];
	$id_hang=(int)$_POST['id_hang'];
	$d->reset();
	$sql="select ten$lang as ten,tenkhongdau,id from #_product_danhmuc where hienthi=1 and type='mau-xe' and FIND_IN_SET(".$id.",id_kieudang) and id_thuonghieu=".$id_hang." order by stt,id desc";
	$d->query($sql);

	$mauxe=$d->result_array();
	$return1='<option></option>';
	foreach($mauxe as $v){
		$return1.='<option value="'.$v['id'].'">'.$v['ten'].'</option>';
	}

	$rs['mauxe']=$return1;
	echo json_encode($rs);

}
function tinhthanh(){
	global $d;
	$id=(int)$_POST['id'];
	$d->reset();
	$sql="select * from #_place_dist where id_city=".$id."";
	$d->query($sql);
	$mauxe=$d->result_array();
	$return1='<option></option>';
	foreach($mauxe as $v){
		$return1.='<option value="'.$v['id'].'">'.$v['ten'].'</option>';
	}

	$rs['tinhthanh']=$return1;
	echo json_encode($rs);

}
function quenmatkhau(){
	global $d, $row,$config,$company,$row_logo,$config_url,$ip_host,$mail_host,$pass_mail;
	$email=(string)$_POST['email'];
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();

	$d->reset();
	$sql = "select * from table_thanhvien where email='".$email."'";
	$d->query($sql);
	$row = $d->result_array();
	if($d->num_rows()>0){
		$matkhau=ran_pass();
		$data['matkhau']=encrypt_password($matkhau,$config['salt']);
		$d->setTable('thanhvien');
		$d->setWhere('email', $email);
		include_once "phpMailer/class.phpmailer.php";
		$mail = new PHPMailer();
		$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
		$mail->Host       = $ip_host;   // tên SMTP server
		$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
		$mail->Username   = $mail_host; // SMTP account username
		$mail->Password   = $pass_mail;
		$mail->SetFrom($mail_host, $company['ten']);
		$mail->AddAddress($_POST['email'], $company['ten']);
		$mail->Subject    = '[CarOntrade.com] Thiết lập lại mật khẩu tài khoản khách hàng';
		$mail->IsHTML(true);
		$mail->CharSet = "utf-8";
		$body = "<table>
			<tr><td>
				<p><a href='http://".$config_url."'>
					<img src='http://".$config_url."/"._upload_hinhanh_l.$row_logo['photo']."' alt='".$company['ten']."' style='width:476px' />'</a>
				</p>
				<p></p>
			</td></tr>
			<tr><td>
				<p>Xin chào ".$row[0]['hoten'].",</p>
				<p></p>
			</td></tr>
			<tr><td>
				<p>Bạn đã yêu cầu thiết lập lại mật khẩu cho tài khoản của bạn tại CarOntrade.com</p>
				<p></p>
			</td></tr>
			<tr><td>
				<p>Đây là mật khẩu mới của bạn: ".$matkhau." </p>
				<p>Bấm vào <a href='http://".$config_url."/dang-nhap.html'>đây</a> để đăng nhập ! </p>
				<p>Nếu bạn có thắc mắc hay cần sự hỗ trợ từ CarOntrade, vui lòng liên hệ bộ phận hỗ trợ
khách hàng qua địa chỉ email hotrokhachhang@carontrade.com hoặc số điện thoại
hotline 0126 4428 166.</p>
				<p></p>
			</td></tr>
			<tr><td>
			<p>Cám ơn bạn đã sử dụng dịch vụ của CarOntrade.com.</p>
			<p></p>
			<p>Trân trọng,</p>
			<p>".$company['ten']."</p>
		</td></tr><table>";
		$mail->Body = $body;
		if($mail->Send()){
			$d->update($data);
			echo json_encode(array("title"=>"Lấy mật khẩu thành công","thongbao"=>"Kiểm tra email để nhận mật khẩu mới !. Vui lòng kiểm tra trong hộp thư Spam nếu bạn chưa nhận được mail lấy lại mật khẩu.","icon"=>"success"));
		}else{
			echo json_encode(array("title"=>"Lấy mật khẩu thất bại","thongbao"=>"Hệ thống bị lỗi. Vui lòng thử lại sau !","icon"=>"error"));
		}

	}else{
		echo json_encode(array("title"=>"Lấy mật khẩu thất bại","thongbao"=>"Email không tồn tại trong hệ thống!","icon"=>"error"));
	}

}
function danhgiaweb(){
	global $d, $row,$config,$config_url;
	$d->reset();
	$sql = "select id from #_loaidanhgia where type='website' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();
	delete_dl('danhgia',(int)$_POST['id_user'],'website');
	foreach($loaidanhgia as $v){
		$data['id_user']=(int)$_POST['id_user'];
		$data['id_danhgia']=$v['id'];
		$data['type']='website';
		$data['ngaytao']=time();
		$data['diem']=$_POST['usdg_'.$v['id']];
		$d->reset();
		$d->setTable('danhgia');
		$d->insert($data);
	}
	delete_dl('danhgiasao',(int)$_POST['id_user'],'website');
	$data1['giatri']=(int)$_POST['star_ss'];
	$data1['id_user']=(int)$_POST['id_user'];
	$data1['type']='website';
	$d->reset();
	$d->setTable('danhgiasao');
	$d->insert($data1);

}
function danhgiauser(){
	global $d, $row,$config,$config_url;
	$d->reset();
	$sql = "select id from #_loaidanhgia where type='user' order by stt asc";
	$d->query($sql);
	$loaidanhgia = $d->result_array();
	delete_dl1('danhgia',(int)$_POST['id_user'],'user',(int)$_POST['user_danhgia']);
	foreach($loaidanhgia as $k => $v){
		$data['id_user']=(int)$_POST['id_user'];
		$data['id_danhgia']=$v['id'];
		$data['type']='user';
		$data['user_danhgia']=(int)$_POST['user_danhgia'];
		$data['ngaytao']=time();
		$data['diem']=$_POST['star'][$k];
		$d->reset();
		$d->setTable('danhgia');
		$d->insert($data);
	}
	delete_dl1('danhgiasao',(int)$_POST['id_user'],'user',(int)$_POST['user_danhgia']);
	$data1['mota']=magic_quote($_POST['noidung']);
	$data1['id_user']=(int)$_POST['id_user'];
	$data['user_danhgia']=(int)$_POST['user_danhgia'];
	$data1['type']='user';
	$d->reset();
	$d->setTable('danhgiasao');
	$d->insert($data1);

}
function dangnhapthanhvien(){
	global $d, $row,$config,$config_url;
	$email=(string)$_POST['email'];
	$matkhau=encrypt_password((string)$_POST['matkhau'],$config['salt']);
	$sql = "select * from table_thanhvien where email='".$email."' and matkhau='".$matkhau."'";

	$d->query($sql);
	$row = $d->result_array();
	if($d->num_rows()>0){
		if($row[0]['kichhoat']==0){
			echo json_encode(array("title"=>"Đăng nhập thất bại","thongbao"=>"Tài khoản chưa được kích hoạt !","icon"=>"warning","href"=>"//".$config_url."/dang-nhap.html"));
		}elseif($row[0]['dinhchi']==1){
			echo json_encode(array("title"=>"Đăng nhập thất bại","thongbao"=>"Tài khoản bị đình chỉ. Liên hệ Admin để biết thêm chi tiết !","icon"=>"warning","href"=>"//".$config_url."/dang-nhap.html"));
		}else{

			if(!empty($_POST['ghinhotk'])){
				setcookie("name",$email,time() + 604800,"/",$config_url, 0);
				setcookie("matkhau",(string)$_POST['matkhau'],time() + 604800,"/",$config_url, 0);
			}else{
				setcookie("name", "", time()-604800,"/",$config_url, 0);
				setcookie("matkhau", "", time()-604800,"/",$config_url, 0);
			}
			$_SESSION[$login_name_w] = true;
			$_SESSION['user_w']['id'] = $row[0]['id'];
			$_SESSION['user_w']['loaithanhvien'] = $row[0]['loaithanhvien'];
			$_SESSION['user_w']['email'] = $row[0]['email'];
			$_SESSION['user_w']['congty'] = $row[0]['tencongty'];
			$_SESSION['user_w']['hoten'] = $row[0]['hoten'];
			$_SESSION['user_w']['dienthoai'] = $row[0]['dienthoai'];
			echo json_encode(array("title"=>"Đăng nhập thành công","thongbao"=>"Chúc mừng bạn đã đăng nhập thành công !","icon"=>"success","href"=>"//".$config_url));
		}
	}else{
		echo json_encode(array("title"=>"Đăng nhập thất bại","thongbao"=>"Email hoặc mật khẩu không chính xác !","icon"=>"error","href"=>"//".$config_url."/dang-nhap.html"));
	}

}

function dangkythanhvien(){
	global $d, $row,$config,$company,$row_logo,$config_url,$ip_host,$mail_host,$pass_mail;

	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();

	if(empty($_POST['captcha'])){
		echo json_encode(array("code"=>-1,"title"=>"Vui lòng nhập mã bảo vệ !"));
		die();
	}

	if($_POST['loaithanhvien']!='Cá nhân'){
		if($_POST['captcha'] != $_SESSION['key_mg1']){
			echo json_encode(array("code"=>-1,"title"=>"Mã bảo vệ không chính xác !"));
			die();
		}
	}else{
		if($_POST['captcha'] != $_SESSION['key_mg']){
			echo json_encode(array("code"=>-1,"title"=>"Mã bảo vệ không chính xác !"));
			die();
		}
	}
	$data['email']=magic_quote($_POST['email']);
	if(kiemtraemail($data['email'])==false){
		echo json_encode(array("code"=>-1,"title"=>"Email này đã được đăng ký !"));
		die();
	}
	$data['tencongty']=magic_quote($_POST['tencongty']);
	$data['hoten']=magic_quote($_POST['hoten']);
	$data['matkhau']=encrypt_password(magic_quote($_POST['matkhau']),$config['salt']);
	$data['dienthoai']=magic_quote($_POST['phone']);
	$data['cmnd']=magic_quote($_POST['cmnd']);
	$data['masothue']=magic_quote($_POST['masothue']);
	$data['diachi']=magic_quote($_POST['diachi']);
	$data['loaithanhvien']=($_POST['loaithanhvien']);
	$data['nguoigioithieu']=$_POST['nguoigioithieu'];
	$data['magioithieu']=taomarandom('select * from #_thanhvien where magioithieu=');
	$data['kichhoat']=0;
	$data['maxacnhan']=time();

	$d->setTable('thanhvien');
	include_once "phpMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
	$mail->Host       = $ip_host;   // tên SMTP server
	$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
	$mail->Username   = $mail_host; // SMTP account username
	$mail->Password   = $pass_mail;
	$mail->SetFrom($mail_host, $company['ten']);
	$mail->AddAddress($_POST['email'], $company['ten']);
	//$mail->AddReplyTo($_POST['email'],$_POST['hoten']);
	if(!empty($_FILES['file']))
	{
		$mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);
	}
	$mail->Subject    = '[CarOntrade.com] Email kích hoạt tài khoản';
	$mail->IsHTML(true);
	$mail->CharSet = "utf-8";
	$body = "<table>
		<tr><td>
			<p><a href='http://".$config_url."'>
				<img src='http://".$config_url."/"._upload_hinhanh_l.$row_logo['photo']."' alt='".$company['ten']."' style='width:476px' />'</a>
			</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Xin chào ".$_POST['hoten'].",</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Chào mừng bạn đã đến với CarOntrade.</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Vui lòng truy cập vào <b<link</b> bên dưới để kích hoạt tài khoản của bạn.</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p><a href='http://".$config_url."/kich-hoat-tai-khoan/".$data['maxacnhan'].".html'>Bấm vào đây để kích hoạt tài khoản. </a></p>
			<p>
				Dưới dây là Mã Giới Thiệu của riêng bạn, hãy giới thiệu mã này cho bạn bè của bạn khi đăng ký thành viên tại CarOntrade, nhập mã này trong quá trình đăng ký để cả hai cùng nhận được Mã Khuyến Mãi nhé!
			</p>
			<p>Mã: ".$data['magioithieu']."</p>
			<p>Nếu bạn có thắc mắc hay cần sự hỗ trợ từ CarOntrade, vui lòng liên hệ bộ phận hỗ trợ
khách hàng qua địa chỉ email hotrokhachhang@carontrade.com hoặc số điện thoại
hotline 0126 4428 166.</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Cám ơn bạn đã sử dụng dịch vụ của CarOntrade.com.</p>
			<p></p>
			<p>Trân trọng,</p>
			<p>".$company['ten']."</p>
		</td></tr><table>";
	$mail->Body = $body;
	if($mail->Send()){
		$d->insert($data);
		echo json_encode(array("code"=>1,"title"=>"Đăng ký tài khoản thành công !"));
	}
	else{
		echo json_encode(array("code"=>-1,"title"=>"Hệ thống bị lỗi. Vui lòng thử lại sau !"));
		die();
	}


}
function shipping(){
		$price = get_order_total();
		global $d, $row,$config;
		if($$config['phi']==1){
		$sql = "select phivanchuyen from table_place_city where id=".(int)$_POST['id']."";
		}else{
		$sql = "select phivanchuyen from table_place_dist where id=".(int)$_POST['id']."";
		}
		$d->query($sql);
		$row = $d->fetch_array();

		echo json_encode(array("ship"=>myformat($row['phivanchuyen']),"price"=>myformat($price),"all"=>myformat($price+$row['phivanchuyen']),false));
die('a');
}

function deleteCart($id){
	unset($_SESSION['cart'][$id]);
	echo json_encode(array("total"=>myformat(get_order_total()),"qty"=>get_total()));
	die;
}
function updateCart(){

	$color = (int)$_POST['color'];
	$size  = (int)$_POST['size'];
	$product = (int)$_POST['product'];

	foreach($product as $k=>$v){

		$_SESSION['cart'][$k]['qty'] = $v;
		$_SESSION['cart'][$k]['color'] = $color[$k];
		$_SESSION['cart'][$k]['size'] = $size[$k];
	}
	$tmp = array();
	foreach($_SESSION['cart'] as $k=>$v){
		md5($pid.$color.$size);
		$code = md5($v['productid'].$v['color'].$v['size']);

		if(isset($tmp[$code])){
			$tmp[$code]['qty'] = $tmp[$code]['qty']+$v['qty'];
		}else{
			$tmp[$code] = $v;
		}
	}
	$_SESSION['cart'] = $tmp;
}

function addCart(){

	$id = (int)$_POST['id'];
	$qty = (int)$_POST['qty'];

	$color = (int)$_POST['color'];
	$size = (int)$_POST['size'];
	/*if($color){
		$colors = getColorByProductId($id);
		if(count($colors)>0){
			$color = $colors[0]['id_color'];
		}

	}
	if($size){
		$sizes = getSizeByProductId($id);
		if(count($sizes)>0){
			$size = $sizes[0]['id_size'];
		}

	}*/

	addtocart($id,$qty,$color,$size);

	echo get_total();

}

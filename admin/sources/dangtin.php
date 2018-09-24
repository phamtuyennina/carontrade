<?php	if(!defined('_source')) die("Error");

	$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

	$urlcu = "";
	$urlcu .= (isset($_REQUEST['p'])) ? "&p=".addslashes($_REQUEST['p']) : "";
	$urlcu .= (isset($_REQUEST['type'])) ? "&type=".addslashes($_REQUEST['type']) : "";
	//$urlcu .= (isset($_REQUEST['id_user'])) ? "&id_user=".addslashes($_REQUEST['id_user']) : "";

//===========================================================
switch($act){
	case "man":
		get_items();
		$template = "dangtin/items";
		break;
	case "add":
		$template = "dangtin/item_add";
		break;
	case "edit":		
		get_item();		
		$template = "dangtin/item_add";
		break;
	case "save":
		save_item();
		break;
	case "savestt":
		savestt_item();
		break;
	case "delete":
		delete_item();
		break;		

	default:
		$template = "index";
}
//===========================================================
function fns_Rand_digit($min,$max,$num)
	{
		$result='';
		for($i=0;$i<$num;$i++){
			$result.=rand($min,$max);
		}
		return $result;	
	}
//===========================================================
function get_items(){
	global $d, $items, $url_link,$totalRows , $pageSize, $offset,$paging,$urlcu;
	$where =" and trangthailuu=2";
	if($_REQUEST['type']=='daduyet')
	{
		$where.=" and kiemduyet=1";
	}
	if($_REQUEST['type']=='chuaduyet')
	{
		$where.=" and kiemduyet=0";
	}
	if($_REQUEST['type']=='vipham')
	{
		$where.=" and kiemduyet=2";
	}
	if($_REQUEST['id_user']!='')
	{
		$where.=" and id_user=".$_REQUEST['id_user']."";
	}
	if($_REQUEST['key']!='')
	{
		$where.=" and ten like '%".$_REQUEST['key']."%'";
	}
	$where.=" order by stt,id desc";	

	$sql="SELECT count(id) AS numrows FROM #_dangtin where id<>0 $where";
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
	
	$sql = "select * from #_dangtin where id<>0 $where limit $bg,$pageSize";		
	$d->query($sql);
	$items = $d->result_array();
	
	$url_link="index.php?com=dangtin&act=man".$urlcu;

}
//===========================================================
function get_item(){
	global $d, $item,$urlcu;
	$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
	if(!$id)
		transfer("Không nhận được dữ liệu", "index.php?com=dangtin&act=man".$urlcu);
	
	$sql = "select * from #_dangtin where id='".$id."'";
	$d->query($sql);
	if($d->num_rows()==0) transfer("Dữ liệu không có thực","index.php?com=lkweb&act=man".$urlcu);
	$item = $d->fetch_array();
	
}
function guiemail($id_user){
	global $d,$ip_host,$mail_host,$pass_mail,$row_logo,$company,$itemtv,$config_url;
	
	$d->reset();
	$sql = "select * from #_thanhvien where id='".$id_user."'";
	$d->query($sql);
	$itemtv = $d->fetch_array();
	
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();
	
	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();
	
	include_once "phpMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
	$mail->Host       = $ip_host;   // tên SMTP server
	$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
	$mail->Username   = $mail_host; // SMTP account username
	$mail->Password   = $pass_mail;  
	$mail->SetFrom($mail_host, $company['ten']);
	$mail->AddAddress($itemtv['email'], $company['ten']);
	$mail->Subject    = '[CarOntrade.com] Thông báo đăng tin thành công ';
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
			<p>Xin chào ".$itemtv['hoten'].",</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Tin đăng của bạn đã được duyệt hợp lệ và hiển thị lên Sàn.</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Bạn có thể vào trang <a href='http://".$config_url."/thanh-vien/tin-dang-ban'>Quản lý Thành viên</a>, mục “Quản lý tin đang bán” để theo dõi tình trạng tin đăng của mình.</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Nếu bạn có thắc mắc hay cần sự hỗ trợ từ CarOntrade, vui lòng liên hệ bộ phận hỗ trợ khách hàng qua địa chỉ email hotrokhachhang@carontrade.com hoặc số điện thoại hotline 0126 4428 166.</p> 
			<p></p>
		</td></tr>
		<tr><td>
			<p>Cám ơn bạn đã đến với Sàn giao dịch TMĐT CarOntrade.com. </p>
			<p></p>
			<p>Trân trọng,</p>
			<p>".$company['ten']."</p>
		</td></tr><table>";	
	$mail->Body = $body;
	$mail->Send();
}

function emailtuchoi($id_user){
	global $d,$ip_host,$mail_host,$pass_mail,$row_logo,$company,$itemtv,$config_url;
	
	$d->reset();
	$sql = "select * from #_thanhvien where id='".$id_user."'";
	$d->query($sql);
	$itemtv = $d->fetch_array();
	
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();
	
	$d->reset();
	$sql_company = "select *,ten$lang as ten,diachi$lang as diachi from #_company limit 0,1";
	$d->query($sql_company);
	$company= $d->fetch_array();
	
	include_once "phpMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
	$mail->Host       = $ip_host;   // tên SMTP server
	$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
	$mail->Username   = $mail_host; // SMTP account username
	$mail->Password   = $pass_mail;  
	$mail->SetFrom($mail_host, $company['ten']);
	$mail->AddAddress($itemtv['email'], $company['ten']);
	$mail->Subject    = '[CarOntrade.com] Thông báo tin đăng bị từ chối ';
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
			<p>Xin chào ".$itemtv['hoten'].",</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Nội dung tin đăng của bạn đã vi phạm một trong những <a href='http://carontrade.com/quy-dinh-dang-tin.html'>quy định đăng tin</a> của CarOntrade. Đừng
lo lắng, hãy làm theo hướng dẫn dưới đây để chỉnh sửa lại nội dung tin đăng của mình nhé.</p>
			<p></p>
		</td></tr>
		
		
		<tr><td>
			<p>- <b>Bước 1:</b> <a href='http://carontrade.com/dang-nhap.html'>Đăng nhập</a> tài khoản</p>
			<p>- <b>Bước 2:</b> Vào trang  <a href='http://carontrade.com/thanh-vien/tin-dang-ban'>Quản lý Thành viên</a>, nhấp vào mục
			‘Quản lý tin bị từ chối’để xem lí do vì sao tin bạn bị từ chối</p>
			<p>- <b>Bước 3:</b> Nhấp vào icon ‘Sửa tin’ bên góc phải tin đăng để thực hiện chỉnh sửa nội dung</p>
			<p></p>
		</td></tr>
		
		<tr><td>
			<p>Để biết chi tiết hơn, bạn có thể tham khảo thêm Làm thế nào khi tin đăng bị từ chối? tại <a href='http://carontrade.com/tro-giup.htm'>Trợ giúp</a></p>
			<p></p>
		</td></tr>
		
		<tr><td>
			<p>Đừng quên xem lại Quy định đăng tin để tránh tin bị từ chối lần nữa nhé.</p>
			<p></p>
		</td></tr>
		
		<tr><td>
			<p>Nếu bạn có thắc mắc hay cần sự hỗ trợ từ CarOntrade, vui lòng liên hệ bộ phận hỗ trợ khách hàng qua địa chỉ email hotrokhachhang@carontrade.com hoặc số điện thoại hotline 0126 4428 166.</p> 
			<p></p>
		</td></tr>
		<tr><td>
			<p>Cám ơn bạn đã đến với Sàn giao dịch TMĐT CarOntrade.com. </p>
			<p></p>
			<p>Trân trọng,</p>
			<p>".$company['ten']."</p>
		</td></tr><table>";	
	$mail->Body = $body;
	$mail->Send();
}
//===========================================================
function save_item(){
	global $d,$urlcu;
	$file_name = $_FILES['file']['name'];
	if(empty($_POST)) transfer("Không nhận được dữ liệu", "index.php?com=dangtin&act=man".$urlcu);
	$id = isset($_POST['id']) ? themdau($_POST['id']) : "";
	if($id){
		$id =  themdau($_POST['id']);		
		$data['id_hang']=$_POST['id_thuonghieu'];
		$data['id_kieudang']=$_POST['id_kieudang'];
		$data['id_mauxe']=$_POST['id_mauxe'];
		$data['nam']=$_POST['nam'];
		
		$data['hopso']=(string)$_POST['hopso'];
		$data['soghe']=(string)$_POST['soghe'];
		$data['tinhtrang']=(string)$_POST['tinhtrang'];
		$data['nhienlieu']=(string)$_POST['nhienlieu'];
		$data['dongco']=(string)$_POST['dongco'];
		$data['socua']=(string)$_POST['socua'];
		$data['sokm']=(int)str_replace(',','',$_POST['sokm']);
		$data['mausac']=(string)$_POST['mausac'];
		$data['giatien']=doubleval(str_replace(',','',$_POST['giatien']));
		$data['noidung']=magic_quote($_POST['noidung']);
		$data['ghichu']=magic_quote($_POST['ghichu']);
		$data['ten']=(string)$_POST['ten'];
		$data['tenkhongdau']=changeTitle((string)$_POST['ten']);
		$data['quan']=(int)$_POST['quan'];
		$data['huyen']=(int)$_POST['huyen'];
		$data['trangthailuu']=2;
		$data['kiemduyet']=$_POST['kiemduyet'];

		$data['kiemduyet']=$_POST['kiemduyet'];
		$data['kiemduyet']=$_POST['kiemduyet'];

		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['hoten']=$_POST['hoten'];
		$data['linkbaiviet']=$_POST['linkbaiviet'];
		$data['baivietdanhgia	']=$_POST['baivietdanhgia'];
		$data['dienthoai']=$_POST['dienthoai'];
		$data['email']=$_POST['email'];
		$data['title'] = $_POST['title'];
		$data['stt'] = $_POST['stt'];
		$data['ngaykiemduyet'] = time();
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$d->setTable('dangtin');
		$d->setWhere('id', $id);
		if($d->update($data)){	
			if(!empty($_POST['id_user']) && $_POST['kiemduyet']==1){
				//guiemail($_POST['id_user']);
			}
			if(!empty($_POST['id_user']) && $_POST['kiemduyet']==2){
				//emailtuchoi($_POST['id_user']);
			}	
			if(isset($_FILES)){
				 $arr_chuoi = str_replace('"','',$_POST['jfiler-items-exclude-files-0']);
				 $arr_chuoi = str_replace('[','',$arr_chuoi);
				 $arr_chuoi = str_replace(']','',$arr_chuoi);
				 $arr_chuoi = str_replace('\\','',$arr_chuoi);
				 $arr_file_del = explode(',',$arr_chuoi);
				 for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						if(!in_array(($_FILES['files']['name'][$i]),$arr_file_del,true))
						{
							$file['name'] = $_FILES['files']['name'][$i];
							$file['type'] = $_FILES['files']['type'][$i];
							$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$file['error'] = $_FILES['files']['error'][$i];
							$file['size'] = $_FILES['files']['size'][$i];
							$file_name = images_name($_FILES['files']['name'][$i]);
							$photo = upload_photos($file, _format_duoihinh, _upload_tmp,$file_name);
							$arr_img[] = $photo;
						}
					}
				 }
				
				$hinhanh=implode('|',$arr_img);
				$d->reset();
				$sql="select hinhanh FROM #_dangtin where id=".$id."";
				$d->query($sql);
				$name_tmp=$d->result_array();
				if(!empty($name_tmp)){
					if(!empty($hinhanh)){$tmp_=$name_tmp[0]['hinhanh']."|".$hinhanh;}
				}else{if(!empty($hinhanh)) {$tmp_=$hinhanh;}}
				if(!empty($tmp_)){
					$d->query("update table_dangtin set hinhanh='".$tmp_."' where id=".$id."");
				}
				
			}
			redirect("index.php?com=dangtin&act=man".$urlcu);
		}
		else
			transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=dangtin&act=man".$urlcu);
	}else{
		$data['id_hang']=$_POST['id_thuonghieu'];
		$data['id_kieudang']=$_POST['id_kieudang'];
		$data['id_mauxe']=$_POST['id_mauxe'];
		$data['nam']=$_POST['nam'];
		
		$data['hopso']=(string)$_POST['hopso'];
		$data['soghe']=(string)$_POST['soghe'];
		$data['tinhtrang']=(string)$_POST['tinhtrang'];
		$data['nhienlieu']=(string)$_POST['nhienlieu'];
		$data['socua']=(string)$_POST['socua'];
		$data['dongco']=(string)$_POST['dongco'];
		$data['sokm']=(int)str_replace(',','',$_POST['sokm']);
		$data['mausac']=(string)$_POST['mausac'];
		$data['giatien']=doubleval(str_replace(',','',$_POST['giatien']));
		$data['noidung']=magic_quote($_POST['noidung']);
		$data['ten']=(string)$_POST['ten'];
		$data['linkbaiviet']=$_POST['linkbaiviet'];
		$data['baivietdanhgia	']=$_POST['baivietdanhgia'];
		$data['tenkhongdau']=changeTitle((string)$_POST['ten']);
		$data['quan']=(int)$_POST['quan'];
		$data['huyen']=(int)$_POST['huyen'];
		$data['trangthailuu']=2;
		$data['kiemduyet']=$_POST['kiemduyet'];
		$data['ghichu']=magic_quote($_POST['ghichu']);
		$data['hoten']=$_POST['hoten'];
		$data['dienthoai']=$_POST['dienthoai'];
		$data['email']=$_POST['email'];
		$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
		$data['title'] = $_POST['title'];
		$data['stt'] = $_POST['stt'];
		$data['ngaykiemduyet'] = time();
		$data['keywords'] = $_POST['keywords'];
		$data['description'] = $_POST['description'];
		$d->setTable('dangtin');
		if($d->insert($data)){
			$id=mysql_insert_id();
			if(!empty($_FILES)){
				 $arr_chuoi = str_replace('"','',$_POST['jfiler-items-exclude-files-0']);
				 $arr_chuoi = str_replace('[','',$arr_chuoi);
				 $arr_chuoi = str_replace(']','',$arr_chuoi);
				 $arr_chuoi = str_replace('\\','',$arr_chuoi);
				 $arr_file_del = explode(',',$arr_chuoi);
				 for($i=0;$i<count($_FILES['files']['name']);$i++){
					if($_FILES['files']['name'][$i]!=''){
						if(!in_array(($_FILES['files']['name'][$i]),$arr_file_del,true))
						{
							$file['name'] = $_FILES['files']['name'][$i];
							$file['type'] = $_FILES['files']['type'][$i];
							$file['tmp_name'] = $_FILES['files']['tmp_name'][$i];
							$file['error'] = $_FILES['files']['error'][$i];
							$file['size'] = $_FILES['files']['size'][$i];
							$file_name = images_name($_FILES['files']['name'][$i]);
							$photo = upload_photos($file, _format_duoihinh, _upload_tmp,$file_name);
							$arr_img[] = $photo;
						}
					}
				 }
				$hinhanh=implode('|',$arr_img);
				$tmp_=$hinhanh;
				if(!empty($tmp_)){
					$d->query("update table_dangtin set hinhanh='".$tmp_."' where id=".$id."");
				}
				
			}
			redirect("index.php?com=dangtin&act=man".$urlcu);
		}else
			transfer("Lưu dữ liệu bị lỗi", "index.php?com=dangtin&act=man".$urlcu);
	}
}
//===========================================================
function delete_item(){
	global $d,$urlcu;
	
	if(isset($_GET['id'])){
		$id =  themdau($_GET['id']);
		
		$d->reset();
		$sql = "select * from #_dangtin where id='".$id."'";
		$d->query($sql);
		if($d->num_rows()>0){
			$row = $d->fetch_array();
			$arr=explode('|',$row['hinhanh']);
			$arr=array_diff($arr,array(''));
			$arr=array_values($arr);
			foreach($arr as $v){
				delete_file(_upload_tmp.$v);
			}
			$sql = "delete from #_dangtin where id='".$id."'";
			$d->query($sql);
		}
		
		if($d->query($sql))
			redirect("index.php?com=dangtin&act=man".$urlcu);
		else
			transfer("Xóa dữ liệu bị lỗi", "index.php?com=dangtin&act=man".$urlcu);
	}elseif (isset($_GET['listid'])==true){
		$listid = explode(",",$_GET['listid']); 
		for ($i=0 ; $i<count($listid) ; $i++){
			$idTin=$listid[$i]; 
			$id =  themdau($idTin);		
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
			
		} redirect("index.php?com=dangtin&act=man".$urlcu);} else transfer("Không nhận được dữ liệu", "index.php?com=dangtin&act=man".$urlcu);
}

?>

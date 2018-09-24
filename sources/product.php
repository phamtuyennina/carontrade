<?php  if(!defined('_source')) die("Error");

	@$id =   trim(strip_tags(addslashes($_GET['id'])));	
	
	if($id!='')
	{
		$d->reset();
		$sql_lanxem = "UPDATE #_dangtin SET luotxem=luotxem+1  WHERE tenkhongdau ='$id'";
		$d->query($sql_lanxem);
		
		$d->reset();
		$sql_detail = "select *,ten$lang as ten,noidung$lang as noidung from #_dangtin where hienthi=1 and kiemduyet=1 and trangthailuu=2 and tenkhongdau='$id' limit 0,1";
		$d->query($sql_detail);
		$row_detail = $d->fetch_array();	
		if(empty($row_detail['id'])){
			redirect("../404.php");
		}
		$title_cat = $row_detail['ten'];
		$title = $row_detail['title'];	
		$keywords = $row_detail['keywords'];
		$description = $row_detail['description'];
		
		$ar_hinhanh=explode('|',$row_detail['hinhanh']);
		$ar_hinhanh=array_diff($ar_hinhanh,array(''));
		$ar_hinhanh=array_values($ar_hinhanh);
		$images_facebook = 'http://'.$config_url.'/'._upload_tmp_l.$ar_hinhanh[0];
		$title_facebook = $row_detail['ten'];
		$description_facebook = trim(strip_tags($row_detail['noidung']));
		$url_facebook = getCurrentPageURL();
		
	}elseif($com=='xe-dai-ly'){
		$where = " where hienthi=1 and kiemduyet=1 and trangthailuu=2 and loaihinh='dai-ly' order by stt,id desc";
	}elseif($com=='xe-ca-nhan'){
		$where = " where hienthi=1 and kiemduyet=1 and trangthailuu=2 and loaihinh='ca-nhan' order by stt,id desc";
	}
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_dangtin  $where";
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
	$sql = "select *,ten$lang as ten,noidung$lang as noidung from #_dangtin $where limit $bg,$pageSize";		
	$d->query($sql);
	$product = $d->result_array();	
	$url_link = getCurrentPageURL();
	
	
	if(!empty($_POST)){
			$user_ban=info_user($row_detail['id_user']);	
			include_once "phpMailer/class.phpmailer.php";	
			$mail = new PHPMailer();
			$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
			$mail->Host       = $ip_host;   // tên SMTP server
			$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
			$mail->Username   = $mail_host; // SMTP account username
			$mail->Password   = $pass_mail;  
			$mail->SetFrom($mail_host,$_POST['ten_lienhe']);
			$mail->AddAddress($company['email'], $company['ten']);
			$mail->AddAddress($user_ban['email'], $user_ban['hotenten']);
			$mail->AddReplyTo($_POST['email'],$_POST['ten']);

			if(!empty($_FILES['file']))
			{
				$mail->AddAttachment($_FILES['file']['tmp_name'], $_FILES['file']['name']);	
			}

			$mail->Subject    = $row_detail['ten'];
			$mail->IsHTML(true);

			$mail->CharSet = "utf-8";	
				$body = '<table>';
				$body .= '
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th colspan="2">Thư liên hệ từ website <a href="'.$_SERVER["SERVER_NAME"].'">'.$_SERVER["SERVER_NAME"].'</a></th>
				</tr>
				<tr>
					<th colspan="2">&nbsp;</th>
				</tr>
				<tr>
					<th>Họ tên :</th><td>'.$_POST['ten'].'</td>
				</tr>
				<tr>
					<th>Địa chỉ :</th><td>'.$_POST['diachi'].'</td>
				</tr>
				<tr>
					<th>Điện thoại :</th><td>'.$_POST['dienthoai'].'</td>
				</tr>
				<tr>
					<th>Email :</th><td>'.$_POST['email'].'</td>
				</tr>
				
				<tr>
					<th>Tiêu đề :</th><td>'.$row_detail['ten'].'</td>
				</tr>
				<tr>
					<th>Nội dung :</th><td>'.$_POST['noidung'].'</td>
				</tr>';
			$body .= '</table>';
			$mail->Body = $body;
			if($mail->Send())
				transfer(_guilienhethanhcong, getCurrentPageURL());
			else
				transfer(_guilienhethatbai, getCurrentPageURL());
	}
?>
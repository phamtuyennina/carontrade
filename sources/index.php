<?php  if(!defined('_source')) die("Error");

	$title_cat = 'Sản phẩm nỗi bật';
	
	$where = " type='sanpham' and hienthi=1 and noibat=1 order by stt,id desc";
	
	#Lấy sản phẩm và phân trang
	$d->reset();
	$sql = "SELECT count(id) AS numrows FROM #_product where $where";
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
	$sql = "select id,ten$lang as ten,tenkhongdau,thumb,photo,masp,gia,giakm from #_product where $where limit $bg,$pageSize";		
	$d->query($sql);
	$product = $d->result_array();	
	$url_link = getCurrentPageURL();
	
	
if(!empty($_POST['ten_lienhe1'])){
        $data['ten']=(string)$_POST['ten_lienhe1'];
        $data['diachi']=(string)$_POST['diachi_lienhe1'];
        $data['dienthoai']=(string)$_POST['dienthoai_lienhe1'];
        $data['email']=(string)$_POST['email_lienhe1'];
        $data['chude']=(string)$_POST['tieude_lienhe1'];
        $data['noidung']=(string)$_POST['noidung_lienhe1'];
        $data['ngaytao']=time();
        $data['hienthi']=0;
        $data['type']='cauhoi';
        $d->reset();
        $d->setTable('lienhe');
        
        if($d->insert($data)){
           transfer("Cám ơn bạn đã gửi câu hỏi đến CarOntrade.<br/> Câu hỏi của bạn sẽ được CarOntrade phản hồi trong thời gian sớm nhất.", getCurrentPageURL());
        }else{
          transfer(_guilienhethatbai, getCurrentPageURL());
        }       
    }	
	
	if(!empty($_POST['ten'])){
			$user_ban=info_user($row_detail['id_user']);
			include_once "phpMailer/class.phpmailer.php";	
			$mail = new PHPMailer();
			$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
			$mail->Host       = $ip_host;   // tên SMTP server
			$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
			$mail->Username   = $mail_host; // SMTP account username
			$mail->Password   = $pass_mail;  
			$mail->SetFrom($mail_host,$_POST['ten']);
			$mail->AddAddress($company['email'], $company['ten']);
			$mail->AddAddress($user_ban['email'], $user_ban['hoten']);
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
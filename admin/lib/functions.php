<?php if(!defined('_lib')) die("Error");
function send_face($link){
	global $d,$messger,$company;
	require_once _lib.'facebook_php_sdk/facebook.php';
		$facebook = new Facebook(array(
		   'appId' => "338803049964282",
		   'secret' => "373efeb9999b0c2af06f348f842865b1",
		));
		//============================================
			$id_page="624371817906801";
			$token="EAAE0I7txIvoBAOcSmIRm05KJgSbuS8HHix9vOLXTj0Vr93YAZAyXrkix24ZCp9ZCqC4lgqVxopzmoJc0gZCwl0Ih6f5b85HNC1FwZB098SyXS9hpGbfOpOngNZBPCD2PyI7BcxxLs66UlbJtHTEjgnC5t9tLnxoY79huvhq0SCZBgZDZD";
		//============================================
			try{	
				$api = $facebook->api($id_page .'/feed', 'POST', array(
					access_token => $token,
					link => $link,
					message => '',//tieu de status
				 ));
				$messger=1;
			}catch(Exception $e){
				$messger=0;
				echo $e->getMessage();
			}
		echo ($messger);
		die;
}
function Dot2LongIP ($IPaddr)
  {
      if ($IPaddr == "")
      {
      	return 0;
      }
      else {
	      $ip = explode(".", $IPaddr);
	      return ($ip[3] + $ip[2] * 256 + $ip[1] * 256 * 256 + $ip[0] * 256 * 256 * 256);	
      }
  }
	
function getLocationInfoByIp($ip){
		global $d,$row;
    $ipv4=Dot2LongIP($ip);
		$d->reset();
		$sql = "SELECT id,ten FROM table_ip WHERE  numberfrom >= $ipv4 order by numberfrom";
		$d->query($sql);
		$row = $d->fetch_array();

		if(!empty($row['id'])){
			return $row['ten'];
		}
		return '';
}
function getBrowser ($browser)
{   
	$browsertyp = "UnKnown";
	if ($browser)
	{
		if (strpos($browser, "Mozilla/5.0")) $browsertyp = "Mozilla";
		if (strpos($browser, "Mozilla/4")) $browsertyp = "Netscape";
		if (strpos($browser, "Mozilla/3")) $browsertyp = "Netscape";
		if (strpos($browser, "Firefox") || strpos($browser, "Firebird")) $browsertyp = "Firefox";
		if (strpos($browser, "MSIE")) $browsertyp = "Internet Explorer";
		if (strpos($browser, "Opera")) $browsertyp = "Opera";
		if (strpos($browser, "Opera Mini")) $browsertyp = "Opera Mini";			
		if (strpos($browser, "Netscape")) $browsertyp = "Netscape";
		if (strpos($browser, "Camino")) $browsertyp = "Camino";
		if (strpos($browser, "Galeon")) $browsertyp = "Galeon";
		if (strpos($browser, "Konqueror")) $browsertyp = "Konqueror";      
		if (strpos($browser, "Safari")) $browsertyp = "Safari";
		if (strpos($browser, "Chrome")) $browsertyp = "Chrome";      
		if (strpos($browser, "OmniWeb")) $browsertyp = "OmniWeb";
		if (strpos($browser, "Flock")) $browsertyp = "Firefox Flock";
		if (strpos($browser, "Lynx")) $browsertyp = "Lynx";
		if (strpos($browser, "Mosaic")) $browsertyp = "Mosaic";
		if (strpos($browser, "Shiretoko")) $browsertyp = "Shiretoko";
		if (strpos($browser, "IceCat")) $browsertyp = "IceCat";			
		if (strpos($browser, "BlackBerry")) $browsertyp = "BlackBerry";			
		if (strpos($browser, "Googlebot") || strpos($browser, "www.google.com")) $browsertyp = "Google Bot";
		if (strpos($browser, "Yahoo") || strpos($browser, "help.yahoo.com")) $browsertyp = "Yahoo Bot";
		if (strpos($browser, "Pingdom") || strpos($browser, "pingdom.com")) $browsertyp = "Pingdom Bot";
		if (strpos($browser, "coccoc") || strpos($browser, "help.coccoc.com")) $browsertyp = "Coccoc bot";
		if (strpos($browser, "MJ12bot") || strpos($browser, "www.majestic12.co.uk")) $browsertyp = "MJ12 Bot";   
		if (strpos($browser, "Baiduspider") || strpos($browser, "www.baidu.com")) $browsertyp = "Baidu Bot"; 
		if (strpos($browser, "AhrefsBot") || strpos($browser, "ahrefs.com")) $browsertyp = "Ahrefs Bot"; 
	}    
	return $browsertyp;
}  
// Strat func
function getOs ($os)
{
	$ostyp = "UnKnown";
	if ($os)
	{
		if (strpos($os, "Win95") || strpos($os, "Windows 95")) $ostyp = "Windows 95";
		if (strpos($os, "Win98") || strpos($os, "Windows 98")) $ostyp = "Windows 98";
		if (strpos($os, "WinNT") || strpos($os, "Windows NT")) $ostyps = "Windows NT";
		if (strpos($os, "WinNT 5.0") || strpos($os, "Windows NT 5.0")) $ostyp = "Windows 2000";
		if (strpos($os, "WinNT 5.1") || strpos($os, "Windows NT 5.1")) $ostyp = "Windows XP";
		if (strpos($os, "WinNT 6.0") || strpos($os, "Windows NT 6.0")) $ostyp = "Windows Vista";
		if (strpos($os, "WinNT 6.1") || strpos($os, "Windows NT 6.1")) $ostyp = "Windows 7";
		if (strpos($os, "WinNT 6.2") || strpos($os, "Windows NT 6.2")) $ostyp = "Windows 8";
		if (strpos($os, "WinNT 6.3") || strpos($os, "Windows NT 6.3")) $ostyp = "Windows 8";
		if (strpos($os, "WinNT 10.0") || strpos($os, "Windows NT 10.0")) $ostyp = "Windows 10";
		if (strpos($os, "Linux")) $ostyp = "Linux";
		if (strpos($os, "OS/2")) $ostyp = "OS/2";
		if (strpos($os, "Sun")) $ostyp = "Sun OS";
		if (strpos($os, "BB10")) $ostyp = "BlackBerry";
		if (strpos($os, "iPod")) $ostyp = "iPodTouch";
		if (strpos($os, "iPhone")) $ostyp = "iPhone";
		if (strpos($os, "iPad")) $ostyp = "iPad";
		if (strpos($os, "Android")) $ostyp = "Android";			
		if (strpos($os, "Windows Phone")) $ostyp = "Windows Phone";						
		if (strpos($os, "Macintosh") || strpos($os, "Mac_PowerPC")) $ostyp = "Mac OS";
		if (strpos($os, "Yahoo") || strpos($os, "help.yahoo.com")) $ostyp = "Yahoo Bot";
		if (strpos($os, "Googlebot") || strpos($os, "www.google.com")) $ostyp = "Google Bot";
		if (strpos($os, "Pingdom") || strpos($os, "pingdom.com")) $ostyp = "Pingdom Bot";
		if (strpos($os, "coccoc") || strpos($os, "help.coccoc.com")) $ostyp = "Coccoc Bot";
		if (strpos($os, "MJ12bot") || strpos($os, "www.majestic12.co.uk")) $ostyp = "MJ12 Bot";
		if (strpos($os, "Baiduspider") || strpos($os, "www.baidu.com")) $ostyp = "Baidu Bot";
		if (strpos($os, "AhrefsBot") || strpos($os, "ahrefs.com")) $ostyp = "Ahrefs Bot";              
	}
	return $ostyp;
}
function do_Statistics($id_hinhanh) {
	global $d;

//thong ke web counter     
	$domain_ref = trim($_SERVER['HTTP_REFERER']);
	$domain_ref = str_replace("https://", "", $domain_ref);
	$domain_ref = str_replace("http://", "", $domain_ref);
	$domain_ref = str_replace("www.", "", $domain_ref);
	$domain_ref = substr($domain_ref, 0, strpos($domain_ref, "/"));    
	$my_domain = $_SERVER['HTTP_HOST'];
	$my_domain = str_replace("www.", "", $my_domain);    
	if (($domain_ref != $my_domain) && ($domain_ref != 'localhost') && ($domain_ref != '')){      
		$query= "SELECT id,num_click FROM table_counter_website WHERE domain='" . $domain_ref . "' and id_hinhanh=". $id_hinhanh ."";
		$d->query($query);
		if ($d->num_rows()>0){
			$row_ck = $d->fetch_array();
			$num_click = ($row_ck['num_click'] + 1);
			$date_click = time();               
			$idw=$row_ck['id'];
			$sql2="UPDATE table_counter_website SET num_click='$num_click',date_click='$date_click' WHERE id = '$idw' and id_hinhanh=". $id_hinhanh ."";
			$result2=$d->query($sql2); 
		}else{                
			$num_click = 1;
			$date_click = time();       
			$query = "INSERT INTO table_counter_website (domain, num_click,date_click,id_hinhanh) VALUES ('$domain_ref','$num_click', ' $date_click', '$id_hinhanh')";
			$d->query($query);
		}
	}
	//--------------------------------------------------------------------------------

$ip = $_SERVER['REMOTE_ADDR'];
$locktime        =  5;
$locktime        =    $locktime * 60;
$now             =    time();

$query             =    "SELECT COUNT(*) AS visitip FROM table_counter_detail WHERE ip='$ip' AND (date_time+'$locktime')>'$now' and id_hinhanh=".$id_hinhanh."";
	$vip  = $d->fetch_array($d->query($query));
	$items             =    $vip['visitip'];
	
	//insert counter
	 if (empty($items))
	{
		$time = time();
		
		$agent = $_SERVER['HTTP_USER_AGENT'];			
		$browser = getBrowser($agent);
		$os = getOs($agent);
		$date = date("d/m/Y"); 
		$datestamp= strtotime(date("m/d/Y"));

		$sql = "SELECT * FROM table_counter_sum WHERE date_log ='{$date}' and id_hinhanh=".$id_hinhanh."";
		$result = $d->query($sql);
		if ($row = $d->fetch_array($result))
		{
			$query = "UPDATE table_counter_sum SET count=count+1 WHERE id={$row['id']} and id_hinhanh=".$id_hinhanh."";
		} else
		{
			$query = "INSERT INTO table_counter_sum (date_log,datestamp,count,id_hinhanh) VALUES ('{$date}','{$datestamp}',1,'$id_hinhanh')";
		}
	
		$d->query($query);
		$cot_d['date_log'] = $date;
		$cot_d['browser'] = $browser;
		$cot_d['ip'] = $ip;
		$cot_d['os'] = $os;
		$cot_d['quocgia'] = getLocationInfoByIp($ip);
		$cot_d['id_hinhanh'] = $id_hinhanh;
		$cot_d['date_time'] = $time;
		$d->setTable('counter_detail');
		$d->insert($cot_d); 					
	} 			
}
function taomakhuyenmai($str1,$email1,$email2) {
		global $d,$str;
		$d->reset();
		$ma=taomarandom($str1);
		$data['makhuyenmai']=$ma;
		$data['ngaytao']=time();
		$data['email']=$email1.','.$email2;
		$d->setTable('makhuyenmai');
		$d->insert($data); 
		//return $ma;
}
function kiemtratrangthailuu($idtin,$user){
	 global $d;
	 $d->reset();
	 $sql="select id,luutin FROM table_thanhvien where id=".$user." and find_in_set(".$idtin.",luutin)";
	 $d->query($sql);
	 $luutin= $d->result_array();
	 if(!empty($luutin)){
		 return 'daluu';
	 }
	 return '';
}
function taomarandom($str1){
	global $d,$str;
	$str = md5(rand(0, 9999));
	$str = strtoupper(substr($str, 10, 8));
	$d->reset();

	$d->query($str1."'".$str."'"." limit 0,1");
	$code=$d->result_array();
	if(empty($code)){
		return $str;die();
	}else{
		get_code();
	}
}
function giaodien($str){
	switch($str)
	{
		case 'gioi-thieu':
			return 'Giới thiệu';
			break;
		case 'huong-dan-thanh-toan':
			return 'Hướng dẫn thanh toán';
			break;
		case 'huong-dan-dang-tin':
			return 'Hướng dẫn đăng tin';
			break;
		case 'huong-dan-dang-ky-thanh-vien':
			return 'Hướng dẫn đăng ký thành viên';
			break;
		case 'ho-tro-khach-hang':
			return 'Hỗ trợ khách hàng';
			break;
		case 'hop-tac':
			return 'Hợp tác';
			break;
		case 'tuyen-dung':
			return 'Tuyển dụng';
			break;
		case 'lien-he':
			return 'Liên hệ';
			break;
		case 'tim-xe':
			return 'Tim xe';
			break;
		case 'chinh-sach-bao-mat':
			return 'Chính sách bảo mật';
			break;
		case 'tin-tuc':
			return 'Tin tức';
			break;
		case 'danh-gia':
			return 'Đánh giá';
			break;
		case 'video':
			return 'Video';
			break;
		case 'hoi-dap-ve-xe':
			return 'Hỏi đáp về xe';
			break;
		case 'tro-giup':
			return 'Trợ giúp';
			break;
		case 'bai-viet':
			return 'Bài viết trang chủ';
			break;
		case 'dinh-gia-xe':
			return 'Định giá xe';
			break;
		case 'quy-dinh-dang-tin':
			return 'Quy định đăng tin';
			break;
		case 'tro-giup-nguoi-ban':
			return 'Trợ giúp người bán';
			break;
		case 'tro-giup-nguoi-dung':
			return 'Trợ giúp người dùng';
			break;
		case 'ho-tro-khach-hang':
			return 'Hỗ trợ khách hàng';
			break;
		case 'danh-gia-chung-toi':
			return 'Đánh giá chúng tôi';
			break;		
		case 'tim-kiem':
			return 'Tất cả xe';
			break;
		case 'xe-ca-nhan':
			return 'Xe cá nhân';
			break;	
		case 'xe-dai-ly':
			return 'Xe cá nhân';
			break;
		case 'chi-tiet':
			return 'Chi tiết tin đăng';
			break;															
		default: return '';
	}
}
function chuyenngay($str){
	switch($str)
	{
		case 1:
			return 'Tháng Một';
			break;
		case 2:
			return 'Tháng Hai';
			break;
		case 3:
			return 'Tháng Ba';
			break;
		case 4:
			return 'Tháng Tư';
			break;
		case 5:
			return 'Tháng Năm';
			break;
		case 6:
			return 'Tháng Sáu';
			break;
		case 7:
			return 'Tháng Bảy';
			break;
		case 8:
			return 'Tháng Tám';
			break;
		case 9:
			return 'Tháng Chín';
			break;
		case 10:
			return 'Tháng Mười';
			break;
		case 11:
			return 'Tháng Mười Một';
			break;
		case 12:
			return 'Tháng Mười Hai';
			break;				
	}
}
function get_yeuthich_byUser($id){
	global $d, $row;
	$d->reset();
	$sql="select id,luutin FROM table_thanhvien where id=".$id."";
	$d->query($sql);
	$luutin= $d->fetch_array();
	$arr=explode(',',$luutin['luutin']);
	return count($arr);
}
function get_luunhap_byUser($trangthai,$id){
	global $d, $row;
	$d->reset();
	$sql="select count(id) as dem from #_dangtin where trangthailuu=".$id." and id_user=".$id." order by stt,id desc";
	$d->query($sql);
	$row=$d->fetch_array();
	return $row['dem'];
}
function get_tindang_byUser($trangthai,$id){
	global $d, $row;
	$d->reset();
	$sql="select count(id) as dem from #_dangtin where kiemduyet=".$trangthai." and trangthailuu=2 and id_user=".$id."  order by stt,id desc";
	$d->query($sql);
	$row=$d->fetch_array();
	return $row['dem'];
}
function count_tindaduyet($str,$id){
	global $d, $row;
	$d->reset();
	$sql = "select count(id) as dem from table_dangtin where kiemduyet=".$str." and id_user=".$id." and trangthailuu=2";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['dem'];
	
}
function ran_pass(){
	global $d,$str;
	$str = md5(rand(0, 9999));
	$str = strtoupper(substr($str, 10, 8));
	return $str;
}
function GetTenById($table,$type='',$id=0){
	global $d,$row;
	$d->reset();
	$sql="select ten$lang as ten from #_".$table." where type='".$type."' and id=".$id."";
	$d->query($sql);
	$row=$d->fetch_array();
	return $row['ten'];
}
function GetTenByType($table,$type='',$str=0){
	global $d,$row;
	$d->reset();
	$sql="select ten$lang as ten from #_".$table." where type='".$type."' and tenkhongdau='".$str."'";
	$d->query($sql);
	$row=$d->fetch_array();
	return $row['ten'];
}
function demallcar($str){
	global $d,$row;
	if($str=='all'){
		$sql="select count(id) as dem from #_dangtin where hienthi=1 and kiemduyet=1 and trangthailuu=2 order by stt,id desc";
	}else{
		$sql="select count(id) as dem from #_dangtin where tinhtrang='".$str."' and hienthi=1 and kiemduyet=1 and trangthailuu=2 order by stt,id desc";
	}
	$d->query($sql);
	$row=$d->fetch_array();
	return $row['dem'];
}
function getLoaiThanhVienById($id=0){
	global $d,$row;
	$d->reset();
	$sql="select loaithanhvien from #_thanhvien where id='".$id."'";
	$d->query($sql);
	$row=$d->fetch_array();
	
	return $row['loaithanhvien'];
}
function pagesListLimitadmin($url , $totalRows , $pageSize = 5, $offset = 5){
	if ($totalRows<=0) return "";
	$totalPages = ceil($totalRows/$pageSize);
	if ($totalPages<=1) return "";		
	if( isset($_GET["p"]) == true)  $currentPage = $_GET["p"];
	else $currentPage = 1;
	settype($currentPage,"int");	
	if ($currentPage <=0) $currentPage = 1;	
	$firstLink = "<li><a href=\"{$url}\" class=\"left\">Trang đầu</a><li>";
	$lastLink="<li><a href=\"{$url}&p={$totalPages}\" class=\"right\">Trang cuối</a></li>";
	$from = $currentPage - $offset;	
	$to = $currentPage + $offset;
	if ($from <=0) { $from = 1;   $to = $offset*2; }
if ($to > $totalPages) { $to = $totalPages; }
	for($j = $from; $j <= $to; $j++) {
	   if ($j == $currentPage) $links = $links . "<li><a href='#' class='active'>{$j}</a></li>";		
	   else{				
		$qt = $url. "&p={$j}";
		if(!empty($_GET['sort'])){
			$qt = $url. "&sort=".$_GET['sort']."&p={$j}";
		}
		$links= $links . "<li><a href = '{$qt}'>{$j}</a></li>";
	   } 	   
	} //for
	return '<ul class="pages">'.$firstLink.$links.$lastLink.'</ul>';
}
function delete_dl($table,$id_user,$type){
	global $d;
	$sql = "delete from #_".$table." where id_user='".$id_user."' and type='".$type."'";
	$d->query($sql);
}
function delete_dl1($table,$id_user,$type,$id){
	global $d;
	$sql = "delete from #_".$table." where id_user='".$id_user."' and type='".$type."' and user_danhgia=".$id."";
	$d->query($sql);
}
function demsaouser($id_user,$id){
	global $d,$chuoi;		
	$sql = "select sum(diem) as tong from #_danhgia where user_danhgia='".$id_user."' and id_danhgia=".$id." and type='user'";
	$d->query($sql);
	$item = $d->fetch_array();
	return $item['tong'];
}
function count_st($num){
	global $d;
	$d->reset();
	$sql = "select count(id) as countzz from #_danhgiasao where type='website' and giatri=".$num." order by id_user asc";
	$d->query($sql);
	$count_dg = $d->fetch_array();
	return $count_dg['countzz'];	
}
function count_st1($num,$id,$id_user){
	global $d;
	$d->reset();
	$sql = "select count(id) as countzz from #_danhgia where type='user' and diem=".$num." and user_danhgia=".$id_user." and id_danhgia=".$id." order by id_user asc";
	$d->query($sql);
	$count_dg = $d->fetch_array();
	return $count_dg['countzz'];	
}
function count_sao(){
	global $d;
	$d->reset();
	$sql = "select SUM(giatri) as countzz from #_danhgiasao where type='website' order by id_user asc";
	$d->query($sql);
	$count_dg = $d->fetch_array();
	return $count_dg['countzz'];	
}
function get_pes($id){
	global $d;
	$d->reset();
	$sql = "select count(id) as countzz from #_danhgia where type='website' and id_danhgia=".$id;
	$d->query($sql);
	$count_dg = $d->fetch_array();
	
	$d->reset();
	$sql = "select count(id) as count1 from #_danhgia where type='website' and diem=1 and id_danhgia=".$id;
	$d->query($sql);
	$count_dg1 = $d->fetch_array();
	$diem=($count_dg1['count1']*100)/$count_dg['countzz'];
	if(isset($diem)){return 0;}else{return $diem;}
	
}
function encrypt_password($str,$salt){
	return md5('$nina@'.$str.$salt);
}
function file_get_contents_utf8($fn) {
     $content = file_get_contents($fn);
      return mb_convert_encoding($content, 'UTF-8',
          mb_detect_encoding($content, 'UTF-8, ISO-8859-1', true));
}
function cleanInput($input) {
 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Loại bỏ javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Loại bỏ HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Loại bỏ style tags
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Loại bỏ multi-line comments
  );
 
    $output = preg_replace($search, '', $input);
    return $output;
}
function sanitize($input) {
    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = sanitize($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = cleanInput($input);
        $output = mysql_real_escape_string($input);
    }
    return $output;
}
if($_GET['com']=='creat_pass'){dump(md5('$nina@'.'123qwe'.$config['salt']));}

function guicodekhuyenmai($email,$hoten,$makhuyenmai){
	global $d, $row,$config,$company,$row_logo,$config_url,$ip_host,$mail_host,$pass_mail;
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();

	include_once "phpMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
	$mail->Host       = $ip_host;   // tên SMTP server
	$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
	$mail->Username   = $mail_host; // SMTP account username
	$mail->Password   = $pass_mail;  
	$mail->SetFrom($mail_host, $company['ten']);
	$mail->AddAddress($email, $hoten);
	$mail->Subject    = '[CarOntrade.com] Mã Khuyến Mãi giành riêng cho bạn';
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
			<p>Xin chào ".$hoten.",</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Trân thành cám ơn bạn đã đến với CarOntrade!</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Dưới đây là mã khuyến mãi mà CarOntrade dành riêng cho bạn.</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Mã: ".$makhuyenmai."</p>
			<p>
				Để sử dụng, tại phần ‘Xác nhận’ trong mục điền thông tin đăng bán, bạn chọn loại tin ‘Tin Khuyến Mãi’ và nhập mã khuyến mãi để được đăng tin <b>ưu tiên miễn phí</b> nhé.
			</p>
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
	$mail->Send();
}

function thongbaohethan($email,$hoten){
	global $d, $row,$config,$company,$row_logo,$config_url,$ip_host,$mail_host,$pass_mail;
	$d->reset();
	$sql_banner = "select photo$lang as photo from #_background where type='banenr2' limit 0,1";
	$d->query($sql_banner);
	$row_logo = $d->fetch_array();

	include_once "phpMailer/class.phpmailer.php";
	$mail = new PHPMailer();
	$mail->IsSMTP(); 				// Gọi đến class xử lý SMTP
	$mail->Host       = $ip_host;   // tên SMTP server
	$mail->SMTPAuth   = true;       // Sử dụng đăng nhập vào account
	$mail->Username   = $mail_host; // SMTP account username
	$mail->Password   = $pass_mail;  
	$mail->SetFrom($mail_host, $company['ten']);
	$mail->AddAddress($email, $hoten);
	$mail->Subject    = '[CarOntrade.com] Thông báo tin đăng đã hết hạn';
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
			<p>Xin chào ".$hoten.",</p>
			<p></p>
		</td></tr>
		<tr><td>
			<p>Tin đăng của bạn đã hết hạn, nếu bạn vẫn chưa bán được xe, đừng ngần ngại đăng thêm một tin bán mới nhé, <b>hoàn toàn miễn phí!</b></p>
			<p></p>
		</td></tr>
		
		<tr><td>
			<p>Bạn có thể vào trang <a href='http://carontrade.com/thanh-vien/tin-dang-ban'>Quản lý Thành viên </a>, mục 'Bán xe của tôi' để đăng thêm tin mới.</p>
			<p>
				Để sử dụng, tại phần ‘Xác nhận’ trong mục điền thông tin đăng bán, bạn chọn loại tin ‘Tin Khuyến Mãi’ và nhập mã khuyến mãi để được đăng tin <b>ưu tiên miễn phí</b> nhé.
			</p>
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
	$mail->Send();
}
function phanquyen_menu($ten,$com,$act,$type){
	
	global $d,$_GET;
	$l_com = $_SESSION['login']['com'];
	$nhom = $_SESSION['login']['nhom'];
	$d->reset();
	$sql = "select id from #_com_quyen where id_quyen='".$nhom."' and com='".$com."' and type ='".$type."' and find_in_set('".$act."',act)>0  limit 0,1";
	$d->query($sql);
	$com_manager = $d->result_array();
	if(!empty($com_manager) or $l_com=='admin'){		
		if($com==$_GET['com'] && $act==$_GET['act'] && $type==$_GET['type']){$add_class = 'class="this"';}
		if($type=='daduyet'){$a=1;}	
		if($type=='chuaduyet'){$a=0;}
		if($type=='vipham'){$a=2;}	
		if($type=='daduyet' or $type=='chuaduyet' or $type=='vipham'){	
			echo  "<li ".$add_class."><a href='index.php?com=".$com."&act=".$act."&type=".$type."'>".$ten." <i class='".$type."'>". count_hople($a,$_GET['com']) ."</i></a></li>";
		}else{
			echo  "<li ".$add_class."><a href='index.php?com=".$com."&act=".$act."&type=".$type."'>".$ten."</a></li>";
		}
	}
}
function phanquyen_menu2($ten,$com,$act,$type,$loai){
	
	global $d,$_GET;
	$l_com = $_SESSION['login']['com'];
	$nhom = $_SESSION['login']['nhom'];
	$d->reset();
	$sql = "select id from #_com_quyen where id_quyen='".$nhom."' and com='".$com."' and type ='".$type."' and find_in_set('".$act."',act)>0  limit 0,1";
	$d->query($sql);
	$com_manager = $d->result_array();
	if(!empty($com_manager) or $l_com=='admin'){		
		if($com==$_GET['com'] && $act==$_GET['act'] && $type==$_GET['type']){$add_class = 'class="this"';}
		if($type=='daduyet'){$a=1;}	
		if($type=='chuaduyet'){$a=0;}
		if($type=='vipham'){$a=2;}	
		if($type=='daduyet' or $type=='chuaduyet' or $type=='vipham'){	
			echo  "<li ".$add_class."><a href='index.php?com=".$com."&act=".$act."&type=".$type."'>".$ten." <i class='".$type."'>". count_hople($a,$loai) ."</i></a></li>";
		}else{
			echo  "<li ".$add_class."><a href='index.php?com=".$com."&act=".$act."&type=".$type."'>".$ten."</a></li>";
		}
	}
}
function change_loaitin($str){
	switch($str)
	{
		case 'tinthuong':
			return 5;
			break;
		case 'khuyenmai':
			return 4;
			break;
		case 'tietkiem':
			return 3;
			break;
		case 'linhdong':
			return 2;
			break;
		case 'supper':
			return 1;
			break;				
	}
}
function count_hople($act,$com){
	global $d, $row;
	$d->reset();
	$sql = "select count(id) as dem from table_dangtin where kiemduyet=".$act." and trangthailuu=2 and loaitin='".change_loaitin($com)."'";
	$d->query($sql);
	$row = $d->fetch_array();
	return $row['dem'];
	
}

function getCurrentPageURL_CANO() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    $pageURL = str_replace("amp/", "", $pageURL);
    $pageURL = explode("&p=", $pageURL);
    $pageURL = explode("?", $pageURL[0]);
    $pageURL = explode("#", $pageURL[0]);
    $pageURL = explode("index", $pageURL[0]);
    return $pageURL[0];
}
function phanquyen($l_com,$nhom,$com,$act,$type){
	global $d;
	
	if($com=='' or $act=='login' or $act=='logout' or $l_com=='admin'){return false;}

	$d->reset();
	$sql = "select id from #_com_quyen where id_quyen='".$nhom."' and com='".$com."' and type ='".$type."' and find_in_set('".$act."',act)>0 limit 0,1";
	$d->query($sql);
	$com_manager = $d->result_array();

	if(empty($com_manager)){
		return true;
	}else{
		return false;
	}	
}
function kiemtraemail($email){
	 global $d;
	 $d->reset();
	 $sql="select * from #_thanhvien where email='".$email."'";
	 $d->query($sql);
	 $row = $d->result_array();
	 if(empty($row)){return true;}else{return false;}
}
function get_captcha($captcha){
	  global $config;
	  $privatekey = $config['secretkey'];
	  $url = 'https://www.google.com/recaptcha/api/siteverify';
	  $data = array(
		  'secret' => $privatekey,
		  'response' => $captcha,
		  'remoteip' => $_SERVER['REMOTE_ADDR']
	  );
	  $curlConfig = array(
		  CURLOPT_URL => $url,
		  CURLOPT_POST => true,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_POSTFIELDS => $data
	  );
	  $ch = curl_init();
	  curl_setopt_array($ch, $curlConfig);
	  $response = curl_exec($ch);
	  curl_close($ch);
	  $jsonResponse = json_decode($response);
	  if ($jsonResponse->success === true) {
		return true;
	  }
	  else {
		  return false;
	  }
}
function magic_quote($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}		
		return $str;
	}
	if (is_numeric($str)) {
		return $str;
	}	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}
	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return mysql_real_escape_string($str, $id_connect);
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return mysql_escape_string($str);
	}
	else
	{
		return addslashes($str);
	}
}
function isAjaxRequest(){
	if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') 
		return true;
	return false;
}
/*Đóng dấu hình sản phẩm*/
function imagecreatefromfile($image_path) {
    // retrieve the type of the provided image file
    list($width, $height, $image_type) = getimagesize($image_path);
    // select the appropriate imagecreatefrom* function based on the determined
    // image type
	
    switch ($image_type)
    {
      case IMAGETYPE_GIF: return imagecreatefromgif($image_path); break;
      case IMAGETYPE_JPEG: return imagecreatefromjpeg($image_path); break;
      case IMAGETYPE_PNG: return imagecreatefrompng($image_path); break;
      default: return ''; break;
    }
  }
  
  function saveImageWaterMark($img,$img_condau){

	 $image = imagecreatefromfile($img);
	 
 
  if (!$image) die('Unable to open image');
  $info = getimagesize ($img);
 
  if($info[0] > 500){ // neu file anh co kick thuyoc  < 500px lay watermark la file ie-small
  $watermark = imagecreatefromfile($img_condau);
  $info1 = getimagesize ($img_condau); // kick thuoc file watermark
  }else{
	// neu lon hon 500px
  $watermark = imagecreatefromfile($img_condau); // 
  $info1 = getimagesize ($img_condau); // kick thuoc file watermark
 
  }
  if (!$image) die('Unable to open watermark');
  $w0 = $info[0];//chiều dài hình gốc
  $w1 = $info1[0];// chiều dài watermark (hình con dấu)
 	$h0=$info[1];  // chiều cao hình gốc
   $h1 = $info1[1]; // chiều cao watermark (hình con dấu)
  //$watermark_pos_x =0;//($w0-$w1)/2;// canh giữa trái phải // 
  $watermark_pos_x =$w0-$w1 ;// vi tri cach goc phia duoi 
  //$watermark_pos_y = (imagesy($image) - imagesy($watermark))/2;// canh giua tren duoi
  $watermark_pos_y = $h0-$h1;//(imagesy($image) - imagesy($watermark)) - 10;// cach duoi 10px
  imagecopy($image, $watermark,  $watermark_pos_x, $watermark_pos_y, 0, 0,
  imagesx($watermark), imagesy($watermark));
  	// output watermarked image to browser
 	//header('Content-Type: image/jpeg');
 if(end(explode(".",$img)) == "png"){// neu file 
  imagepng($image, $img, 0.9);  // chat luong 0->1 cho file png
  }else{
   imagejpeg($image, $img, 100); // chat luong 0->100 cho file jpg
  }
  // remove the images from memory
  imagedestroy($image);//huy 
  imagedestroy($watermark);//huy 
  }
function ampify($html='') {
    # Replace img, audio, and video elements with amp custom elements
    $html = str_ireplace(array('<img','<video','/video>','<audio','/audio>'),array('<amp-img','<amp-video','/amp-video>','<amp-audio','/amp-audio>'),$html);
    # Add closing tags to amp-img custom element
    $html = preg_replace('/<amp-img(.*?)\/?>/','<amp-img$1 layout="responsive" width="700" height="500"></amp-img>',$html);
    # Whitelist of HTML tags allowed by AMP
    $html = strip_tags($html,'<h1><h2><h3><h4><h5><h6><a><p><ul><ol><li><blockquote><q><cite><ins><del><strong><em><code><pre><svg><table><thead><tbody><tfoot><th><tr><td><dl><dt><dd><article><section><header><footer><aside><figure><time><abbr><div><span><hr><small><br><amp-img><amp-audio><amp-video><amp-ad><amp-anim><amp-carousel><amp-fit-rext><amp-image-lightbox><amp-instagram><amp-lightbox><amp-twitter><amp-youtube>');
    # replace style to w,h
    $html = preg_replace('/(<[^>]+) style=".*?"/i', '$1', $html);
    return $html;
}
function seo_entities($str) {
	$res_2 = htmlentities($str, ENT_QUOTES, "UTF-8");
	$res_2 = str_replace("'","&#039;",$str);
	$res_2 = str_replace('"','&quot;',$str);
	return $res_2;
}

//Get code youtube
function getYoutubeIdFromUrl($url) {
    $parts = parse_url($url);
    if(isset($parts['query'])){
        parse_str($parts['query'], $qs);
        if(isset($qs['v'])){
            return $qs['v'];
        }else if($qs['vi']){
            return $qs['vi'];
        }
    }
    if(isset($parts['path'])){
        $path = explode('/', trim($parts['path'], '/'));
        return $path[count($path)-1];
    }
    return false;
}
function images_name($tenhinh)
	{
		$rand=rand(10,9999);
		$ten_anh=explode(".",$tenhinh);
		$result = changeTitle($ten_anh[0])."-".$rand;
		return $result; 
	}
function getColorById($pid){
	global $d,$lang;
	$d->reset();
	$sql="select ten$lang as ten from #_product_color where id=".$pid."";
	$d->query($sql);
	$tencolor=$d->fetch_array();
	return $tencolor['ten'];
}
function getColorByProductId($pid){
		global $d,$lang;
		
		$d->query("select #_product_color_condition.*,#_product_color.ten$lang as ten,bg_color,text_color from #_product_color_condition,#_product_color where #_product_color.id = #_product_color_condition.id_color and hienthi = 1 and id_product = ".$pid." order by stt desc");
		return $d->result_array();
	}
	function getSizeByProductId($pid){
		global $d;
		
		$d->query("select sc.*,s.ten as ten from #_product_size_condition sc,#_product_size s where sc.id_size = s.id and hienthi = 1 and  id_product = ".$pid." order by stt desc");
		return $d->result_array();
	}
function getSizeById($pid){
	global $d;
	$d->reset();
	$sql="select ten from #_product_size where id=".$pid."";
	$d->query($sql);
	$tensize=$d->fetch_array();
	return $tensize['ten'];
}
function escape_str($str, $id_connect=false)	
{	
	if (is_array($str))
	{
		foreach($str as $key => $val)
		{
			$str[$key] = escape_str($val);
		}
		
		return $str;
	}
	
	if (is_numeric($str)) {
		return $str;
	}
	
	if(get_magic_quotes_gpc()){
		$str = stripslashes($str);
	}

	if (function_exists('mysql_real_escape_string') AND is_resource($id_connect))
	{
		return "'".mysql_real_escape_string($str, $id_connect)."'";
	}
	elseif (function_exists('mysql_escape_string'))
	{
		return "'".mysql_escape_string($str)."'";
	}
	else
	{
		return "'".addslashes($str)."'";
	}
}






// dem so nguoi online 
function count_online(){

	global $d;
	$time = 600; // 10 phut
	$ssid = session_id();

	// xoa het han
	$sql = "delete from #_online where time<".(time()-$time);
	$d->query($sql);
	//
	$sql = "select id,session_id from #_online order by id desc";
	$d->query($sql);
	$result['dangxem'] = $d->num_rows();
	$rows = $d->result_array();
	$i = 0;
	while(($rows[$i]['session_id'] != $ssid) && $i++<$result['dangxem']);
	
	if($i<$result['dangxem']){
		$sql = "update #_online set time='".time()."' where session_id='".$ssid."'";
		$d->query($sql);
		$result['daxem'] = $rows[0]['id'];
	}
	else{
		$sql = "insert into #_online (session_id, time) values ('".$ssid."', '".time()."')";
		$d->query($sql);
		$result['daxem'] = mysql_insert_id();
		$result['dangxem']++;
	}
	
	return $result; // array('dangxem'=>'', 'daxem'=>'')
}

//Lấy ngày
function make_date($time,$dot='.',$lang='vi',$f=false){
	
	$str = ($lang == 'vi') ? date("d{$dot}m{$dot}Y",$time) : date("m{$dot}d{$dot}Y",$time);
	if($f){
		$thu['vi'] = array('Chủ nhật','Thứ hai','Thứ ba','Thứ tư','Thứ năm','Thứ sáu','Thứ bảy');
		$thu['en'] = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
		$str = $thu[$lang][date('w',$time)].', '.$str;
	}
	return $str;
}
function time_stamp($time_ago)
{
	$cur_time=time();
	$time_elapsed = $cur_time - $time_ago;
	$seconds = $time_elapsed ;
	$minutes = round($time_elapsed / 60 );
	$hours = round($time_elapsed / 3600);
	$days = round($time_elapsed / 86400 );
	$weeks = round($time_elapsed / 604800);
	$months = round($time_elapsed / 2600640 );
	$years = round($time_elapsed / 31207680 );
	// Seconds
	if($seconds <= 60)
	{
		echo " Cách đây $seconds giây ";
	}
	//Minutes
	else if($minutes <=60)
	{
		if($minutes==1)
		{
			echo " Cách đây 1 phút ";
		}
		else
		{
			echo " Cách đây $minutes phút";
		}
	}
	//Hours
	else if($hours <=24)
	{
		if($hours==1)
		{
			echo "Cách đây 1 tiếng ";
		}
		else
		{
			echo " Cách đây  $hours tiếng ";
		}
	}
	//Days
	else if($days <= 7)
	{
		if($days==1)
		{
			echo " Ngày hôm qua ";
		}
		else
		{
			echo " Cách đây  $days ngày ";
		}
	}
	//Weeks
	else if($weeks <= 4.3)
	{
		if($weeks==1)
		{
			echo " Cách đây 1 tuần ";
		}
		else
		{
			echo " Cách đây  $weeks tuần";
		}
	}
	//Months
	else if($months <=12)
	{
		if($months==1)
		{
			echo " Cách đây 1 tháng ";
		}
		else
		{
			echo " Cách đây $months tháng";
		}
	}
	//Years
	else
	{
		if($years==1)
		{
			echo " Cách đây 1 năm ";
		}
		else
		{
			echo " Cách đây $years năm ";
		}
	}
}
function backup_db(){
	/* Luu tru tat ca ten Table vao mot mang */
	$allTables = array();
	$result = mysql_query('SHOW TABLES');
	while($row = mysql_fetch_row($result)){
		 $allTables[] = $row[0];
	}
	 
	foreach($allTables as $table){
	$result = mysql_query('SELECT * FROM '.$table);
	$num_fields = mysql_num_fields($result);
	 
	$return.= 'DROP TABLE IF EXISTS '.$table.';';
	$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
	$return.= "\n\n".$row2[1].";\n\n";
	 
	for ($i = 0; $i < $num_fields; $i++) {
	while($row = mysql_fetch_row($result)){
	   $return.= 'INSERT INTO '.$table.' VALUES(';
		 for($j=0; $j<$num_fields; $j++){
		   $row[$j] = addslashes($row[$j]);
		   $row[$j] = str_replace("\n","\\n",$row[$j]);
		   if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; }
		   else { $return.= '""'; }
		   if ($j<($num_fields-1)) { $return.= ','; }
		 }
	   $return.= ");\n";
	}
	}
	$return.="\n\n";
	}
	 
	// Tao Backup Folder
	$folder = 'DB_Backup/';
	if (!is_dir($folder))
	mkdir($folder, 0777, true);
	chmod($folder, 0777);
	 
	$date = date('m-d-Y-H-i-s', time());
	$filename = $folder."db-backup-".$date;
	 
	$handle = fopen($filename.'.sql','w+');
	fwrite($handle,$return);
	fclose($handle);
}
//Alert
function alert($s){
	echo '<script language="javascript"> alert("'.$s.'") </script>';
}

function delete_file($file){
		return @unlink($file);
}

//Upload file
function upload_image($file, $extension, $folder, $newname=''){
	if(isset($_FILES[$file]) && !$_FILES[$file]['error']){
		
		$ext = end(explode('.',$_FILES[$file]['name']));
		$name = basename($_FILES[$file]['name'], '.'.$ext);
		
		if($name!='sitemap')
		{
			$name=changeTitleImage($name).'-'.fns_Rand_digit(0,9,4);
		}
		$newname = $name.'.'.$ext;

		if(strpos($extension, $ext)===false){
			alert('Chỉ hỗ trợ upload file dạng '.$extension);
			return false; // không hỗ trợ
		}
		
		
		if($newname=='' or file_exists($folder.$_FILES[$file]['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$_FILES[$file]['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else
		{
			$_FILES[$file]['name'] = $newname;
		}

		if (!copy($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))	{
			if ( !move_uploaded_file($_FILES[$file]["tmp_name"], $folder.$_FILES[$file]['name']))				        { 
				return false;
			}
		}
		return $_FILES[$file]['name'];
	}
	return false;
}
function upload_photos($file, $extension, $folder, $newname=''){
	if(isset($file) && !$file['error']){
		
		$ext = end(explode('.',$file['name']));
		$name = basename($file['name'], '.'.$ext);
		//alert('Chỉ hỗ trợ upload file dạng '.$ext);
		if(strpos($extension, $ext)===false){
			alert('Chỉ hỗ trợ upload file dạng '.$ext.'-////-'.$extension);
			return false; // không hỗ trợ
		}
		
		if($newname=='' && file_exists($folder.$file['name']))
			for($i=0; $i<100; $i++){
				if(!file_exists($folder.$name.$i.'.'.$ext)){
					$file['name'] = $name.$i.'.'.$ext;
					break;
				}
			}
		else{
			$file['name'] = $newname.'.'.$ext;
		}
		
		if (!copy($file["tmp_name"], $folder.$file['name']))	{
			if ( !move_uploaded_file($file["tmp_name"], $folder.$file['name']))	{
				return false;
			}
		}
		return $file['name'];
	}
	return false;
}
//Tạo hình khác
function thumb_image($file, $width, $height, $folder){	

	if(!file_exists($folder.$file))	return false; // không tìm thấy file
	
	if ($cursize = getimagesize ($folder.$file)) {					
		$newsize = setWidthHeight($cursize[0], $cursize[1], $width, $height);
		$info = pathinfo($file);
		
		$dst = imagecreatetruecolor ($newsize[0],$newsize[1]);
		
		$types = array('jpg' => array('imagecreatefromjpeg', 'imagejpeg'),
					'gif' => array('imagecreatefromgif', 'imagegif'),
					'png' => array('imagecreatefrompng', 'imagepng'));
		$func = $types[$info['extension']][0];
		$src = $func($folder.$file); 
		imagecopyresampled($dst, $src, 0, 0, 0, 0,$newsize[0], $newsize[1],$cursize[0], $cursize[1]);
		$func = $types[$info['extension']][1];
		$new_file = str_replace('.'.$info['extension'],'_thumb.'.$info['extension'],$file);
		
		return $func($dst, $folder.$new_file) ? $new_file : false;
	}
}


function setWidthHeight($width, $height, $maxWidth, $maxHeight){
	$ret = array($width, $height);
	$ratio = $width / $height;
	if ($width > $maxWidth || $height > $maxHeight) {
		$ret[0] = $maxWidth;
		$ret[1] = $ret[0] / $ratio;
		if ($ret[1] > $maxHeight) {
			$ret[1] = $maxHeight;
			$ret[0] = $ret[1] * $ratio;
		}
	}
	return $ret;
}

//Chuyển trang có thông báo
function transfer($msg,$page="index.php")
{
	 $showtext = $msg;
	 $page_transfer = $page;
	 include("./templates/transfer_tpl.php");
	 exit();
}
//Chuyển trang không thông báo
function redirect($url=''){
	echo '<script language="javascript">window.location = "'.$url.'" </script>';
	exit();
}
//Quay lại trang trước
function back($n=1){
	echo '<script language="javascript">history.go = "'.-intval($n).'" </script>';
	exit();
}
//Thay thế ký tự đặc biệt
function chuanhoa($s){
	$s = str_replace("'", '&#039;', $s);
	$s = str_replace('"', '&quot;', $s);
	$s = str_replace('<', '&lt;', $s);
	$s = str_replace('>', '&gt;', $s);
	return $s;
}


function themdau($s){
	$s = addslashes($s);
	return $s;
}

function bodau($s){
	$s = stripslashes($s);
	return $s;
}
//Show mảng
function dump($arr, $exit=1){
	echo "<pre>";	
		var_dump($arr);
	echo "<pre>";	
	if($exit)	exit();
}
//Phân trang
	function paging($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&curPage=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."&curPage=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."&curPage=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."&curPage=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}
function paging_home($r, $url='', $curPg=1, $mxR=5, $mxP=5, $class_paging='')
	{
		if($curPg<1) $curPg=1;
		if($mxR<1) $mxR=5;
		if($mxP<1) $mxP=5;
		$totalRows=count($r);
		if($totalRows==0)	
			return array('source'=>NULL, 'paging'=>NULL);
		$totalPages=ceil($totalRows/$mxR);
		if($curPg > $totalPages) $curPg=$totalPages;
		
		$_SESSION['maxRow']=$mxR;
		$_SESSION['curPage']=$curPg;

		$r2=array();
		$paging="";
		
		//-------------tao array------------------
		$start=($curPg-1)*$mxR;
		$end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
		#echo $start;
		#echo $end;
		
		$j=0;
		for($i=$start;$i<$end;$i++)
			$r2[$j++]=$r[$i];
			
		//-------------tao chuoi------------------
		$curRow = ($curPg-1)*$mxR+1;	
		if($totalRows>$mxR)
		{
			$start=1;
			$end=1;
			$paging1 ="";				 	 
			for($i=1;$i<=$totalPages;$i++)
			{	
				if(($i>((int)(($curPg-1)/$mxP))* $mxP) && ($i<=((int)(($curPg-1)/$mxP+1))* $mxP))
				{
					if($start==1) $start=$i;
					if($i==$curPg){
						$paging1.=" <span>".$i."</span> ";//dang xem
					} 		  	
					else    
					{
						$paging1 .= " <a href='".$url."&p=".$i."'  class=\"{$class_paging}\">".$i."</a> ";	
					}
					$end=$i;	
				}
			}//tinh paging
			//$paging.= "Go to page :&nbsp;&nbsp;" ;
			#if($curPg>$mxP)
			#{
				$paging .=" <a href='".$url."' class=\"{$class_paging}\" >&laquo;</a> "; //ve dau
				
				#$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
				$paging .=" <a href='".$url."&p=".($curPg-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
			#}
			$paging.=$paging1; 
			#if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
			#{
				#$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				$paging .=" <a href='".$url."&p=".($curPg+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
				
				$paging .=" <a href='".$url."&p=".($totalPages)."' class=\"{$class_paging}\" >&raquo;</a> "; //ve cuoi
			#}
		}
		$r3['curPage']=$curPg;
		$r3['source']=$r2;
		$r3['paging']=$paging;
		$r3['total']=$totalRows;
		#echo '<pre>';var_dump($r3);echo '</pre>';
		return $r3;
	}


//Phân trang nằm giữa
function paging_giua($r, $url='', $curPg=1, $mxR=5, $maxP=5, $class_paging='')
    {
        if($curPg<1) $curPg=1;
        if($mxR<1) $mxR=5;
        if($maxP<1) $maxP=5;
        $totalRows=count($r);
        if($totalRows==0)    
            return array('source'=>NULL, 'paging'=>NULL);
        $totalPages=ceil($totalRows/$mxR);
        
        if($curPg > $totalPages) $curPg=$totalPages;
        
        $_SESSION['maxRow']=$mxR;
        $_SESSION['curPage']=$curPg;

        $r2=array();
        $paging="";
        
        //-------------tao array------------------
        $start=($curPg-1)*$mxR;
        $end=($start+$mxR)<$totalRows?($start+$mxR):$totalRows;
        #echo $start;
        #echo $end;
        
        $j=0;
        for($i=$start;$i<$end;$i++)
            $r2[$j++]=$r[$i];
        
        if($totalRows>$mxR){     
        //-------------tao chuoi------------------
        $from = $curPg - 2;
        $to = $curPg + 2;
        if($curPg <= $totalPages && $curPg >= $totalPages-1){$from = $totalPages - 4;}
        if ($from <=0) { $from = 1;   $to = 5; }
        if ($to > $totalPages) { $to = $totalPages; } 
        for($j = $from; $j <= $to; $j++) {
           if ($j == $curPg){
               $paging1.=" <span>".$j."</span> ";
           } 
           else{                            
            $paging1 .= " <a class='paging transitionAll' href='".$url."&p=".$j."'>".$j."</a> ";    
           }       
        } //for
        $paging .=" <a href='".$url."' >&laquo;</a> "; //ve dau
                
                #$paging .=" <a href='".$url."&curPage=".($start-1)."' class=\"{$class_paging}\" >&#8249;</a> "; //ve truoc
                $paging .=" <a href='".$url."&p=".($curPg-1)."' >&#8249;</a> "; //ve truoc
            #}
            $paging.=$paging1; 
            #if(((int)(($curPg-1)/$mxP+1)*$mxP) < $totalPages)  
            #{
                #$paging .=" <a href='".$url."&curPage=".($end+1)."' class=\"{$class_paging}\" >&#8250;</a> "; //ke
                $paging .=" <a href='".$url."&p=".($curPg+1)."' >&#8250;</a> "; //ke
                
                $paging .=" <a href='".$url."&p=".($totalPages)."' >&raquo;</a> "; //ve cuoi        
        }
        $r3['curPage']=$curPg;
        $r3['source']=$r2;
        $r3['paging']=$paging;
        $r3['total']=$totalRows;
        #echo '<pre>';var_dump($r3);echo '</pre>';
        return $r3;
    }

	
//Cắt chuỗi
function catchuoi($chuoi,$gioihan){
// nếu độ dài chuỗi nhỏ hơn hay bằng vị trí cắt
// thì không thay đổi chuỗi ban đầu
if(strlen($chuoi)<=$gioihan)
{
return $chuoi;
}
else{
/*
so sánh vị trí cắt
với kí tự khoảng trắng đầu tiên trong chuỗi ban đầu tính từ vị trí cắt
nếu vị trí khoảng trắng lớn hơn
thì cắt chuỗi tại vị trí khoảng trắng đó
*/
if(strpos($chuoi," ",$gioihan) > $gioihan){
$new_gioihan=strpos($chuoi," ",$gioihan);
$new_chuoi = substr($chuoi,0,$new_gioihan)."...";
return $new_chuoi;
}
// trường hợp còn lại không ảnh hưởng tới kết quả
$new_chuoi = substr($chuoi,0,$gioihan)."...";
return $new_chuoi;
}
}

function stripUnicode($str){
  if(!$str) return false;
   $unicode = array(
     'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
     'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
     'd'=>'đ',
     'D'=>'Đ',
     'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
   	  'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
   	  'i'=>'í|ì|ỉ|ĩ|ị',	  
   	  'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
     'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
   	  'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
     'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
   	  'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
     'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
     'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
   );
   foreach($unicode as $khongdau=>$codau) {
     	$arr=explode("|",$codau);
   	  $str = str_replace($arr,$khongdau,$str);
   }
return $str;
}// Doi tu co dau => khong dau

function changeTitle($str)
{
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = trim($str);
	$str=preg_replace('/[^a-zA-Z0-9\ ]/','',$str); 
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
}
function changeTitleImage($str)
{
	$str = stripUnicode($str);
	$str = mb_convert_case($str,MB_CASE_LOWER,'utf-8');
	$str = trim($str);
	$str = str_replace("  "," ",$str);
	$str = str_replace(" ","-",$str);
	return $str;
}
if(!function_exists("myformat")){
   function myformat($num,$ext='VNĐ',$default = false){
       if($num==0){
         if(!$default){
             return 0;
         }else{
             return myconfig("default_price");
         }
       }else{
           return @number_format($num, 0,'', '.')." ".$ext;
       }
    }
}
//Lấy dường dẫn hiện tại
function getCurrentPageURL() { 
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    $pageURL = str_replace("amp/", "", $pageURL);
	$pageURL = explode("&p=", $pageURL);
	$pageURL = explode("&sort=", $pageURL[0]);
	
    return $pageURL[0];
}
function getCurrentPageURL_AMP() { 
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"]."/amp".$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"]."/amp".$_SERVER["REQUEST_URI"];
    }
	$pageURL = explode("&p=", $pageURL);
    return $pageURL[0];
}

//Tạo hình ảnh kahcs
function create_thumb($file, $width, $height, $folder,$file_name,$zoom_crop='1'){


		$ext = end(explode('.',$file_name));
		$name = basename($file_name, '.'.$ext);
		$name=changeTitleImage($name);
		$file_name = $name.'.'.$ext;

// ACQUIRE THE ARGUMENTS - MAY NEED SOME SANITY TESTS?

$new_width   = $width;
$new_height   = $height;

 if ($new_width && !$new_height) {
        $new_height = floor ($height * ($new_width / $width));
    } else if ($new_height && !$new_width) {
        $new_width = floor ($width * ($new_height / $height));
    }
	
$image_url = $folder.$file;
$origin_x = 0;
$origin_y = 0;
// GET ORIGINAL IMAGE DIMENSIONS
$array = getimagesize($image_url);
if ($array)
{
    list($image_w, $image_h) = $array;
}
else
{
     die("NO IMAGE $image_url");
}
$width=$image_w;
$height=$image_h;

// ACQUIRE THE ORIGINAL IMAGE
$image_ext = trim(strtolower(end(explode('.', $image_url))));
switch(strtoupper($image_ext))
{
     case 'JPG' :
     case 'JPEG' :
         $image = imagecreatefromjpeg($image_url);
		 $func='imagejpeg';
         break;
     case 'PNG' :
         $image = imagecreatefrompng($image_url);
		 $func='imagepng';
         break;
	 case 'GIF' :
	 	 $image = imagecreatefromgif($image_url);
		 $func='imagegif';
		 break;

     default : die("UNKNOWN IMAGE TYPE: $image_url");
}

// scale down and add borders
	if ($zoom_crop == 3) {

		$final_height = $height * ($new_width / $width);

		if ($final_height > $new_height) {
			$new_width = $width * ($new_height / $height);
		} else {
			$new_height = $final_height;
		}

	}

	// create a new true color image
	$canvas = imagecreatetruecolor ($new_width, $new_height);
	imagealphablending ($canvas, false);

	// Create a new transparent color for image
	$color = imagecolorallocatealpha ($canvas, 255, 255, 255, 127);

	// Completely fill the background of the new image with allocated color.
	imagefill ($canvas, 0, 0, $color);

	// scale down and add borders
	if ($zoom_crop == 2) {

		$final_height = $height * ($new_width / $width);
		
		if ($final_height > $new_height) {
			
			$origin_x = $new_width / 2;
			$new_width = $width * ($new_height / $height);
			$origin_x = round ($origin_x - ($new_width / 2));

		} else {

			$origin_y = $new_height / 2;
			$new_height = $final_height;
			$origin_y = round ($origin_y - ($new_height / 2));

		}

	}

	// Restore transparency blending
	imagesavealpha ($canvas, true);

	if ($zoom_crop > 0) {

		$src_x = $src_y = 0;
		$src_w = $width;
		$src_h = $height;

		$cmp_x = $width / $new_width;
		$cmp_y = $height / $new_height;

		// calculate x or y coordinate and width or height of source
		if ($cmp_x > $cmp_y) {

			$src_w = round ($width / $cmp_x * $cmp_y);
			$src_x = round (($width - ($width / $cmp_x * $cmp_y)) / 2);

		} else if ($cmp_y > $cmp_x) {

			$src_h = round ($height / $cmp_y * $cmp_x);
			$src_y = round (($height - ($height / $cmp_y * $cmp_x)) / 2);

		}

		// positional cropping!
		if ($align) {
			if (strpos ($align, 't') !== false) {
				$src_y = 0;
			}
			if (strpos ($align, 'b') !== false) {
				$src_y = $height - $src_h;
			}
			if (strpos ($align, 'l') !== false) {
				$src_x = 0;
			}
			if (strpos ($align, 'r') !== false) {
				$src_x = $width - $src_w;
			}
		}

		imagecopyresampled ($canvas, $image, $origin_x, $origin_y, $src_x, $src_y, $new_width, $new_height, $src_w, $src_h);

    } else {

        // copy and resize part of an image with resampling
        imagecopyresampled ($canvas, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    }
	
$ext = end(explode('.',$file_name));
$file_name = basename($file_name, '.'.$ext);
$new_file=$file_name.fns_Rand_digit(0,9,4).'_'.round($new_width).'x'.round($new_height).'.'.$image_ext;
// SHOW THE NEW THUMB IMAGE
if($func=='imagejpeg') $func($canvas, $folder.$new_file,100);
else $func($canvas, $folder.$new_file,floor ($quality * 0.09));

return $new_file;
}

//Lấy chuỗi ngẫu nhiên
function ChuoiNgauNhien($sokytu){
$chuoi="ABCDEFGHIJKLMNOPQRSTUVWXYZWabcdefghijklmnopqrstuvwxyzw0123456789";
for ($i=0; $i < $sokytu; $i++){
	$vitri = mt_rand( 0 ,strlen($chuoi) );
	$giatri= $giatri . substr($chuoi,$vitri,1 );
}
return $giatri;
} 

function yahoo($nick_yahoo='nina',$icon='1'){
	
	$link = '<a href="ymsgr:sendIM?"'.$nick_yahoo.'"><img src="http://opi.yahoo.com/online?u="'.$nick_yahoo.'"&amp;m=g&amp;t="'.$icon.'""></a>';
	return $link;
}

function check_yahoo($nick_yahoo='nina'){
	$file = @fopen("http://opi.yahoo.com/online?u=".$nick_yahoo."&m=t&t=1","r");
	$read = @fread($file,200);
	
	if($read==false || strstr($read,"00"))
		$img = '<img src="../images/yahoo_offline.png" />';
	else
		$img = '<img src="../images/yahoo_online.png" />';
	return '<a href="ymsgr:sendIM?'.$nick_yahoo.'">'.$img.'</a>';
}

function skype($nick_skype='nina',$icon='1'){
	
	$link = '<a href="skype:"'.$nick_skype.'"?call><img src="http://mystatus.skype.com/bigclassic/"'.$nick_skype.'""></a>';
	return $link;
}

function check_skype($nick_skype='nina'){
	if(strlen(@file_get_contents("http://mystatus.skype.com/bigclassic/".$nick_skype))>2000)
	$img = '<img src="../images/skype_online.png" />';
	else
		$img = '<img src="../images/skype_offline.png" />';
	return '<a href="skype:'.$nick_skype.'?call">'.$img.'</a>';
}

/*
function doc3so($so)
{
    $achu = array ( " không "," một "," hai "," ba "," bốn "," năm "," sáu "," bảy "," tám "," chín " );
    $aso = array ( "0","1","2","3","4","5","6","7","8","9" );
    $kq = "";
    $tram = floor($so/100); // Hàng trăm
    $chuc = floor(($so/10)%10); // Hàng chục
    $donvi = floor(($so%10)); // Hàng đơn vị
    if($tram==0 && $chuc==0 && $donvi==0) $kq = "";
    if($tram!=0)
    {
        $kq .= $achu[$tram] . " trăm ";
        if (($chuc == 0) && ($donvi != 0)) $kq .= " lẻ ";
    }
    if (($chuc != 0) && ($chuc != 1))
    {
            $kq .= $achu[$chuc] . " mươi";
            if (($chuc == 0) && ($donvi != 0)) $kq .= " linh ";
    }
    if ($chuc == 1) $kq .= " mười ";
    switch ($donvi)
    {
        case 1:
            if (($chuc != 0) && ($chuc != 1))
            {
                $kq .= " mốt ";
            }
            else
            {
                $kq .= $achu[$donvi];
            }
            break;
        case 5:
            if ($chuc == 0)
            {
                $kq .= $achu[$donvi];
            }
            else
            {
                $kq .= " năm ";
            }
            break;
        default:
            if ($donvi != 0)
            {
                   $kq .= $achu[$donvi];
            }
            break;
    }
    if($kq=="")
    $kq=0;   
    return $kq;
}
function doctien($number)
{
$donvi=" đồng ";
$tiente=array("nganty" => " nghìn tỷ ","ty" => " tỷ ","trieu" => " triệu ","ngan" =>" nghìn ","tram" => " trăm ");
$num_f=$nombre_format_francais = number_format($number, 2, ',', ' ');
$vitri=strpos($num_f,',');
$num_cut=substr($num_f,0,$vitri);
$mang=explode(" ",$num_cut);
$sophantu=count($mang);
switch($sophantu)
{
    case '5':
            $nganty=doc3so($mang[0]);
            $text=$nganty;
            $ty=doc3so($mang[1]);
            $trieu=doc3so($mang[2]);
            $ngan=doc3so($mang[3]);
            $tram=doc3so($mang[4]);
            if((int)$mang[1]!=0)
            {
                $text.=$tiente['ngan'];
                $text.=$ty.$tiente['ty'];
            }
            else
            {
                $text.=$tiente['nganty'];
            }
            if((int)$mang[2]!=0)
                $text.=$trieu.$tiente['trieu'];
            if((int)$mang[3]!=0)
                $text.=$ngan.$tiente['ngan'];
            if((int)$mang[4]!=0)
                $text.=$tram;
            $text.=$donvi;
            return  $text;
            
            
    break;
    case '4':
            $ty=doc3so($mang[0]);
            $text=$ty.$tiente['ty'];
            $trieu=doc3so($mang[1]);
            $ngan=doc3so($mang[2]);
            $tram=doc3so($mang[3]);
            if((int)$mang[1]!=0)
                $text.=$trieu.$tiente['trieu'];
            if((int)$mang[2]!=0)
                $text.=$ngan.$tiente['ngan'];
            if((int)$mang[3]!=0)
                $text.=$tram;
            $text.=$donvi;
            return $text;
            
            
    break;
    case '3':
            $trieu=doc3so($mang[0]);
            $text=$trieu.$tiente['trieu'];
            $ngan=doc3so($mang[1]);
            $tram=doc3so($mang[2]);
            if((int)$mang[1]!=0)
                $text.=$ngan.$tiente['ngan'];
            if((int)$mang[2]!=0)
                $text.=$tram;
            $text.=$donvi;
            return $text;
    break;
    case '2':
            $ngan=doc3so($mang[0]);
            $text=$ngan.$tiente['ngan'];
            $tram=doc3so($mang[1]);
            if((int)$mang[1]!=0)
                $text.=$tram;
            $text.=$donvi;
            return $text;
                
    break;
    case '1':
            $tram=doc3so($mang[0]);
            $text=$tram.$donvi;
            return $text;
            
    break;
    default:
        echo "Xin lỗi số quá lớn không thể đổi được";
    break;
}
}

function doc_so($so)
{
    $so = preg_replace("([a-zA-Z{!@#$%^&*()_+<>?,.}]*)","",$so);
    if (strlen($so) <= 21)
    {
        $kq = "";
        $c = 0;
        $d = 0;
        $tien = array ( "", " nghìn", " triệu", " tỷ", " nghìn tỷ", " triệu tỷ", " tỷ tỷ" );
        for ($i = 0; $i < strlen($so); $i++)
        {
            if ($so[$i] == "0")
                $d++;
            else break;
        }
        $so = substr($so,$d);
        for ($i = strlen($so); $i > 0; $i-=3)
        {
            $a[$c] = substr($so, $i, 3);
            $so = substr($so, 0, $i);
            $c++;
        }
        $a[$c] = $so;
        for ($i = count($a); $i > 0; $i--)
        {
            if (strlen(trim($a[$i])) != 0)
            {
                if (doc3so($a[$i]) != "")
                {
                    if (($tien[$i-1]==""))
                    {
                        if (count($a) > 2)
                            $kq .= " không trăm lẻ ".doc3so($a[$i]).$tien[$i-1];
                        else $kq .= doc3so($a[$i]).$tien[$i-1];
                    }
                    else if ((trim(doc3so($a[$i])) == "mười") && ($tien[$i-1]==""))
                    {
                        if (count($a) > 2)
                            $kq .= " không trăm ".doc3so($a[$i]).$tien[$i-1];
                        else $kq .= doc3so($a[$i]).$tien[$i-1];
                    }
                    else
                    {
                    $kq .= doc3so($a[$i]).$tien[$i-1];
                    }
                }
            }
        }
        return $kq;
    }
    else
    {
        return "Số quá lớn!";
    }
} 
*/ 


?>

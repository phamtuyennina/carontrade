<?php if(!defined('_lib')) die("Error");

	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	$config_url=$_SERVER["SERVER_NAME"].'/carontrade';	
	
	$config['database']['servername'] = 'localhost';
	$config['database']['username'] = 'root';
	$config['database']['password'] = '';
	$config['database']['database'] = 'carontrade';
	$config['database']['refix'] = 'table_';
	$_SESSION['ckfinder_baseUrl']=$config_url;
	$ip_host = '127.0.0.1';
	$mail_host = 'noreply@carontrade.com';
	$pass_mail = 'zFo5tsfHF9';
	$config['salt']='@#$fd_!34^';
	$config['nobots']='INDEX, FOLLOW';
	$config['map']='10.8537915,106.6261557';
	$config['sitekey']='6Le-kT0UAAAAAHThDeBM16PeYTs-gbDpntH7AmC9';
	$config['secretkey']='6Le-kT0UAAAAAI3r2FcZvXm3vlMsY6Qu0lyOtcw4';
	$config['lang']=array(''=>'Tiếng Việt');
	$config['phi']=0;#1-Thành phố/2-Quận/huyện
	$config['author']['name'] = 'Phạm Quang Tuyên';
	$config['author']['email'] = 'phamtuyen.nina@gmail.com';
	$config['author']['timefinish'] = '11/11/2016';
	
	date_default_timezone_set('Asia/Ho_Chi_Minh');

?>

<?php	
	error_reporting(E_ALL & ~E_NOTICE & ~8192);
	@define ( '_template' , './templates/');
	@define ( '_source' , './sources/');
	@define ( '_lib' , './admin/lib/');
	include_once _lib."config.php";
	include_once _lib."class.database.php";
	$d = new database($config['database']);
	header("Content-Type: application/xml; charset=utf-8"); 
	echo '<?xml version="1.0" encoding="UTF-8"?>'; 
	echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'; 
	 
	function urlElement($url, $pri,$mod) {
	echo '<url>'; 
	echo '<loc>'.$url.'</loc>'; 
	echo '<changefreq>weekly</changefreq>';
	echo '<lastmod>'.$mod.'</lastmod>';
	echo '<priority>'.$pri.'</priority>';
	echo '</url>';
	}

	urlElement('http://'.$config_url,'1.0',date(c));
	
	$arrcom = array("gioi-thieu","hop-tac","tin-tuc","tro-giup","danh-gia-chung-toi","lien-he","tro-giup-nguoi-ban","dinh-gia-xe","quy-dinh-dang-tin","tim-xe","xe-ca-nhan","xe-dai-ly","xe-moi","dang-ky","dang-nhap","kieu-dang","nha-san-xuat","video","chinh-sach-bao-mat","tuyen-dung","lien-he");

	foreach ($arrcom as $k => $v) {
		urlElement('http://'.$config_url.'/'.$v.'.html','1.0',date(c));
	}

	$arrcom_article = array("hop-tac","tin-tuc","tro-giup","video","ho-tro-khach-hang","danh-gia","tro-giup-nguoi-dung");
	for($m = 0, $count_tintuc = count($arrcom_article); $m < $count_tintuc; $m++){
		$d->reset();
		$sql = "select id,ten$lang as ten,tenkhongdau,ngaytao from #_news where type='".$arrcom_article[$m]."'";		
		$d->query($sql);
		$tintuc = $d->result_array();
		foreach($tintuc as $v){
			urlElement('http://'.$config_url.'/'.$arrcom_article[$m].'/'.$v['tenkhongdau'].'.html','0.8',date(c,$v['ngaytao']));
		}
	}
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,ngaytao from #_product where type='loaixe'";		
	$d->query($sql);
	$tintuc = $d->result_array();
	
	foreach($tintuc as $v){
		urlElement('http://'.$config_url.'/nha-san-xuat/'.$v['tenkhongdau'],'0.8',date(c,$v['ngaytao']));
	}
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,ngaytao from #_product where type='kieu-dang'";		
	$d->query($sql);
	$tintuc = $d->result_array();
	
	foreach($tintuc as $v){
		urlElement('http://'.$config_url.'/kieu-dang/'.$v['tenkhongdau'],'0.8',date(c,$v['ngaytao']));
	}
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,ngaytao from #_product where type='mau-xe'";		
	$d->query($sql);
	$tintuc = $d->result_array();
	
	foreach($tintuc as $v){
		urlElement('http://'.$config_url.'/mau-xe/'.$v['tenkhongdau'],'0.8',date(c,$v['ngaytao']));
	}
	
	$d->reset();
	$sql = "select id,ten$lang as ten,tenkhongdau,ngaytao from #_dangtin where hienthi=1 and kiemduyet=1 and trangthailuu=2";		
	$d->query($sql);
	$tintuc = $d->result_array();
	
	foreach($tintuc as $v){
		urlElement('http://'.$config_url.'/chi-tiet/'.$v['tenkhongdau'].'.html','1',date(c,$v['ngaytao']));
	}
	
	echo '</urlset>'; 

?>

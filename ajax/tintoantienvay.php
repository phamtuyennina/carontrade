<?php
	include ("ajax_config.php");	
  $sotienvay=(int)$_REQUEST['amount'];
	$tienvay =$_REQUEST['amount'];
  $sothang=$_REQUEST['totalMonth'];
  $laisuat=$_REQUEST['interest'];
  $loai=$_REQUEST['type'];
  
	$vonphaitra = $sotienvay/$sothang;
	$tonglai = 0;
	$b = array();
	$c = array(
			"Period"=>0,
			"OriginalRemaining"=>number_format($sotienvay,0, ',', '.'),
			"Original"=>'',
			"Profit"=>'',
			"Total"=>''
	);
	array_push($b,$c);

	for($i = 0; $i < $sothang; $i++){
		
		if($loai==2){
			$laiphaitra = $tienvay*$laisuat/100;
		}else{
			$laiphaitra = $sotienvay*$laisuat/100;
		}
		$tienvay = $tienvay-$vonphaitra;
		$vonlai = $vonphaitra+$laiphaitra;
		$tonglai = $tonglai+$laiphaitra;
		$a = array(
				"Period"=>$i+1,
				"OriginalRemaining"=>number_format($tienvay,0, ',', '.'),
				"Original"=>number_format($vonphaitra,0, ',', '.'),
				"Profit"=>number_format($laiphaitra,0, ',', '.'),
				"Total"=>number_format($vonlai,0, ',', '.')
		);
		array_push($b,$a);
	}
	$return['RepaymentSchedules']=$b;
  $return['Amount']=	number_format($sotienvay,0, ',', '.');
	$return['TotalProfit']=	number_format($tonglai,0, ',', '.');
  $return['Total']=	number_format($tonglai+$sotienvay,0, ',', '.');

  echo json_encode($return);
?>

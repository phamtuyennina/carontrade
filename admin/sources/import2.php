<?php	if(!defined('_source')) die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
switch($act){

	
	case "capnhat":		
		$template = "import2/item_add";
		break;
	case "save":
		save();
		break;
	default:
		$template = "index";
}
#====================================
?>
<?php
print_r($_POST);
die();

	@define ( '_lib' , './admin/lib/');
	//@define ( '_source' , './sources/');
	@define ( _upload_folder , './media/upload/' );
	include_once _lib."config.php";
	include_once _lib."constant.php";
	include_once _lib."functions.php";
	//include_once _lib."functions_giohang.php";
	include_once _lib."class.database.php";
	//include_once _lib."file_requick.php";
	$d = new database($config['database']);
    include('class.uploader.php');
	include(_lib.'class.uploader.php');
	
    $uploader = new Uploader();
    $data = $uploader->upload($_FILES['files'], array(
        'limit' => 15, //Maximum Limit of files. {null, Number}
        'maxSize' => 5, //Maximum Size of files {null, Number(in MB's)}
        'extensions' => "jpg|png|gif|JPG|jpeg|JPEG", //Whitelist for file extension. {null, Array(ex: array('jpg', 'png'))}
        'required' => false, //Minimum one file is required for upload {Boolean}
        'uploadDir' => _upload_tmp_l, //Upload directory {String}
        'title' => array('auto', 10), //New file name {null, String, Array} *please read documentation in README.md
        'removeFiles' => true, //Enable file exclusion {Boolean(extra for jQuery.filer), String($_POST field name containing json data with file names)}
        'perms' => null, //Uploaded file permisions {null, Number}
        'onCheck' => null, //A callback function name to be called by checking a file for errors (must return an array) | ($file) | Callback
        'onError' => null, //A callback function name to be called if an error occured (must return an array) | ($errors, $file) | Callback
        'onSuccess' => null, //A callback function name to be called if all files were successfully uploaded | ($files, $metas) | Callback
        'onUpload' => null, //A callback function name to be called if all files were successfully uploaded (must return an array) | ($file) | Callback
        'onComplete' => null, //A callback function name to be called when upload is complete | ($file) | Callback
        'onRemove' => 'onFilesRemoveCallback' //A callback function name to be called by removing files (must return an array) | ($removed_files) | Callback
    ));
    
    if($data['isComplete']){
        $files = $data['data'];
        print_r($_FILES);
    }

    if($data['hasErrors']){
        $errors = $data['errors'];
        print_r($errors);
    }
    
    function onFilesRemoveCallback($removed_files){
        foreach($removed_files as $key=>$value){
            $file = _upload_hinhthem_l . $value;
            if(file_exists($file)){
                unlink($file);
            }
        }
        
        return $removed_files;
    }
?>

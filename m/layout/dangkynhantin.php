<?php
	if(isset($_POST['email_nhantin']))
	{		
		$email_nhantin = $_POST['email_nhantin'];		
		$d->reset();
		$sql_kt_mail="SELECT email FROM table_newsletter WHERE email='".$email_nhantin."'";
		$d->query($sql_kt_mail);
		$kt_mail=$d->result_array();
		if(count($kt_mail)>0)
			alert(_emaildadangky);
		else
		{
			$email_nhantin = trim(strip_tags($email_nhantin));
			$email_nhantin = mysql_real_escape_string($email_nhantin);			
			$sql = "INSERT INTO  table_newsletter (email) VALUES ('$email_nhantin')";	
			if($d->query($sql)== true)
				alert(_guiemailthanhcong);
			else
				alert(_guiemailthatbai);
		}		
	}
?>

<form name="frm_dknt" id="frm_dknt" method="post" action="" >
    <input type="text" name="email_nhantin" id="email_nhantin" value="<?=_nhapemailcuaban?>..." />
    <input type="button" name="submit_nhantin" id="submit_nhantin" onclick="nhantin()" value="Gửi" />
</form>



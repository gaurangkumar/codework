<?php 
//160604
session_start();
require($_SERVER['DOCUMENT_ROOT'].'/var.php');
require(I."db.php");
$return_url = $_GET['r'];
if(isset($_GET['d']) && $_GET['d'] == "send"){
    $qry = mysql_query("SELECT email FROM $t_m WHERE member_id = $member_id");
	$row = mysql_fetch_array($qry);
	$email = $row['email'];
	$rand = rand(100000,999999);
	$code = hash('sha512', $salt.$rand);
	mysql_query("UPDATE $t_m SET code='$code' WHERE email='$email'");
    $veurl = SR."prc/verify/?c=".$code."&r=".SR;  
    $sub = "PicsRay - Email Verification";
	$mailheader = "From:".$pr_mail;
	$mailbody = "<html><head></head><body>\nDear user,\n\nIf this e-mail does not apply to you please ignore it. You have successfully registered on ".SR."\n\nTo verify your email, please click the link below. If you cannot click it, please copy code below and paste it into your web browser's address bar.\n\n <a href=".$veurl."><button>Very Email</button></a>\n\n".$veurl."\n\nThanks,\nThe Administration</body></html>";  
	$mail = mail($email, $sub, $mailbody, $mailheader);
	if($mail){
		$_SESSION["msg"]["type"] = "success";
		$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Verification Email Has Been Sent !';
		header('location: '.$return_url);
		exit();
	}else{
		$_SESSION["msg"]["type"] = "danger";
		$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Email Sending Failed.';
		header('location: '.$return_url);
		exit();
	}
}
if(isset($_GET['c'])){
	$c = $_GET['c'];
    $qry = mysql_query("SELECT email FROM $t_m WHERE code = '$c'") or die("1 ".mysql_error());
	if(mysql_num_rows($qry) == 1){
		$row = mysql_fetch_array($qry);
		$email = $row["email"];
		$qry = mysql_query("UPDATE $t_m SET code = '', verify = 'yes' WHERE email='$email'") or die("2 ".mysql_error());
		if($qry){
			$_SESSION["msg"]["type"] = "success";
			$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Email Successfully Verified. !';
			header('location: '.$return_url);
			exit();
		}else{
			$_SESSION["msg"]["type"] = "danger";
			$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> System Error.';
			header('location: '.$return_url);
			exit();
		}
	}else{
		$_SESSION["msg"]["type"] = "danger";
		$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Invalid Verifiacation Code.';
		header('location: '.$return_url);
		exit();
	}
}?>
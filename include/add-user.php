<?php
//160604
session_start();
require("../var.php");
require(I."db.php");
$return_url = $_POST['return_url'];

//Function to sanitize values received from the form. Prevents SQL injection
function clean($str, $con) {
	$str = @trim($str);
	if(get_magic_quotes_gpc()) {
		$str = stripslashes($str);
	}
	return mysqli_real_escape_string($con, $str);
}

//Sanitize the POST values
$email = clean($_POST['email'], $con);
$fname = clean($_POST['fname'], $con);
$lname = clean($_POST['lname'], $con);
$login = clean($_POST['username'], $con);
$password = clean($_POST['password'], $con);
$cpassword = clean($_POST['repassword'], $con);

$result2 = mysqli_query($con, "SELECT * FROM $t_m WHERE UserName = '".$login."' ");
$num_user = mysqli_num_rows($result2);
if($num_user != 0){
	$_SESSION["msg"]["type"] = "danger";
	$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Username Already Exist. !';
	header('location: '.$return_url);
	exit();
}
	
if($_POST['email']=='' || $_POST['fname']=='' || $_POST['lname']=='' || $_POST['username']=='' || $_POST['password']=='' || $_POST['repassword']==''){
	$_SESSION["msg"]["type"] = "danger";
	$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Please Fill All Info. !';
	header('location: '.$return_url);
	exit();
}else{
	//----------- check email is valid or not -------
	include("is_email.php");
	is_email($email);
	if(is_email($email)=='1'){
		if($password!=$cpassword){
			$_SESSION["msg"]["type"] = "danger";
			$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Password Are Not Same. !';
			header('location: '.$return_url);
			exit();
		}
	
		$result = mysqli_query($con, "SELECT * FROM $t_m WHERE `Email`='$email'");
		if(mysqli_num_rows($result) > 0){
			$_SESSION["msg"]["type"] = "danger";
			$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Email Already Used. !';
			header('location: '.$return_url);
			exit();
		}

		if($_SESSION['captcha']['code'] != $_POST['captcha']){
			$_SESSION["msg"]["type"] = "danger";
			$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Invalid Captcha. !';
			header('location: '.$return_url);
			exit();
		}

		//Create INSERT query
		$password = hash('sha512', $salt.$password);
		$result1 = mysqli_query("INSERT INTO $t_m(`Email`, `UserName`, `Password`, `FirstName`, `LastName`) VALUES ('$email', '$login', '$password', '$fname', '$lname')");

		//Check whether the query was successful or not
		if($result1){
			session_regenerate_id();
			$result2 = mysqli_query($con, "SELECT * FROM $t_m WHERE UserName='$login'");
			$member = mysqli_fetch_array($result2);
			$_SESSION['SESS_MEMBER_ID'] = $member['member_id'];
			$_SESSION['SESS_USER_NAME'] = $member['UserName'];
			$_SESSION['SESS_FIRST_NAME'] = $member['FirstName'];
			$_SESSION['SESS_USER_TYPE'] = $row['usertype'];
			$_SESSION['SESS_PRO_PIC']	= SR.'userpics/default_profile.png';
			
			$rand = rand(100000,999999);
    		$code = hash('sha512', $salt.$rand);
			mysqli_query($con, "UPDATE $t_m SET code='$code' WHERE email='$email'");
    		$veurl = SR."prc/verify/?c=".$code."&r=".SR;  
    		$sub = "PicsRay - Email Verification";
			$mailheader = "From:".$pr_mail;
			$mailbody = "<html><head></head><body>\nDear user,\n\nIf this e-mail does not apply to you please ignore it. You have successfully registered on ".SR."\n\nTo verify your email, please click the link below. If you cannot click it, please copy code below and paste it into your web browser's address bar.\n\n <a href=".$veurl."><button>Very Email</button></a>\n\n".$veurl."\n\nThanks,\nThe Administration</body></html>";  
			$mail = mail($email, $sub, $mailbody, $mailheader);
			if($mail){
				$_SESSION["msg"]["type"] = "success";
				$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Successfully Registered. Verification Email Has Been Sent !';
				header('location: '.$return_url);
				exit();
			}else{
				$_SESSION["msg"]["type"] = "success";
				$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Error : Successfully Registered! But Email Sending Failed.';
				header('location: '.$return_url);
				exit();
			}
		}else{
			$_SESSION["msg"]["type"] = "danger";
			$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Invalid Captcha. !';
			header('location: '.$return_url);
			exit();
		}
	}else{
		$_SESSION["msg"]["type"] = "danger";
		$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Invalid Email. !';
		header('location: '.$return_url);
		exit();
	}
}
?>
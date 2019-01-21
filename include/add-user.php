<?php
/**
 * CodeWork : Freelancing Platform
 * Copyright (c) CodeWork (https://github.com/gaurangkumar/codework)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @package       CodeWork
 * @copyright     Copyright (c) CodeWork (https://github.com/gaurangkumar/codework)
 * @link          
 * @since         1.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Vivek Patel
 *                Priya Patel
 * @filename      index.php
 * @begin         2018-12-21
 * @update        2019-01-21
 */

require("config.php");
require("db.php");

session_start();
print_r($_POST);exit;
$email  = $_POST['email'];
$name   = $_POST['fname'];
$pw     = $_POST['password'];
$cpw    = $_POST['repassword'];

if($_POST['email']==''    ||
   $_POST['name']==''     ||
   $_POST['password']=='' ||
   $_POST['repassword']=='') {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Please Fill All Info !';
	header("location: ../signup.php");
	exit();
}

if($password != $cpassword) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Password Are Not Same !';
    header("location: ../signup.php");
    exit();
}

$result = $mysqli->query("SELECT * FROM users WHERE email = '$email' ");
if($result->num_rows) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Email Already Used. !';
    header("location: ../signup.php");
    exit();
}

$password = md5($password);
$result1 = $mysqli->query("INSERT INTO user (`email`, `password`, `fname`)
VALUES
('$email', '$password', '$fname')");

if($result) {
    $result = $mysqli->query("SELECT * FROM users WHERE email = '$email'");
    $member = $result->fetch_array();

    $_SESSION['SESS_MEMBER_ID']  = $member['id'];
    $_SESSION['SESS_FIRST_NAME'] = $member['fname'];
    $_SESSION['SESS_USER_TYPE']  = $member['usertype'];
    $_SESSION['SESS_PRO_PIC']	 = 'userpics/default_profile.png';

    $_SESSION["msg"]["type"] = "success";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Successfully Registered!';
    header("location: ../index.php");
    exit();
}
else {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Registered Failed!';
    header("location: ../index.php");
    exit();
}
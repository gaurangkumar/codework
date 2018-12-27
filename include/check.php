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
 * @update        2018-12-21
 */

require("config.php");
require("db.php");

session_start();

if($_POST['password']=='' || $_POST['email']==''){
	header('Location: ');
	exit();
}

$email = $_POST['email'];
$password = md5($_POST['password']);

$result = $mysqli->query("SELECT * FROM users WHERE `email` = '$email' AND `password` = '$password' ");

if($result->num_rows) {
    $row = $result->fetch_array();
    $user_id = $row['member_id'];
    if($row['Password'] != $password) {
        //Login Unsuccessful
        $_SESSION["msg"]["type"] = "danger";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i><strong> Wrong Password.</strong> Enter right password or <a href="" class="alert-link">Forget Password</a> !';
        header("Location: ../login.php");
        exit;
    }
    else { 
        //Login Successful
        $remember_me = (isset($_POST['remember_me'])) ? true : false;
        $_SESSION["msg"]["type"] = "success";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Welcome <strong>'.$row['UserName'].'</strong> !';
			
        $_SESSION['SESS_MEMBER_ID']		= $row['member_id'];
        $_SESSION['SESS_USER_NAME']		= $row['UserName'];
        $_SESSION['SESS_FIRST_NAME']	= $row['FirstName'];
        $_SESSION['SESS_USER_TYPE']		= $row['usertype'];

        header("Location: ../index.php");
        exit;
    }
}
else {
    //Login Unsuccessful
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i><strong> Wrong Username.</strong> Enter right username or <a href="" class="alert-link">Signup</a> !';
    header("Location: ../login.php");
    exit;
}

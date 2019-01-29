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
 * @filename      include/check-user.php
 * @begin         2018-12-21
 * @update        2019-01-28
 */

require("config.php");
require("db.php");

//$crypt_expected = crypt('rasmuslerdorf', '$6$rounds=5000$usesomesillystringforsalt$');
//$crypt_given = crypt('apple', '$6$rounds=5000$usesomesillystringforsalt$');
//var_dump(hash_equals($expected, $incorrect));
//password_hash("rasmuslerdorf", PASSWORD_ARGON2ID  , ['cost' => 12])
//print_r($password); PASSWORD_DEFAULT PASSWORD_ARGON2I PASSWORD_ARGON2ID 
//password_verify('rasmuslerdorf', $hash)

$email = $_POST['user-email'];
$user = $_POST['user-type'];
$password = hash('sha256', $_POST['user-password']);

$result = $mysqli->query("SELECT * FROM `$user` WHERE `email` = '$email'");

if($mysqli->errno) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header("location: ../login.php");
    exit;
}

if($result->num_rows) {
    $row = $result->fetch_array();
    $user_id = $row['member_id'];
    if($row['password'] != $password) {
        //Login Unsuccessful
        $_SESSION["msg"]["type"] = "danger";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i><strong> Wrong Password.</strong> !';
        header("Location: ../login.php");
        exit;
    }
    else { 
        //Login Successful
        $remember_me = (isset($_POST['remember_me'])) ? true : false;
        $_SESSION["msg"]["type"] = "success";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Welcome <strong>'.$row['fname'].'</strong> !';
			
        $_SESSION['SESS_MEMBER_ID']		= $row['member_id'];
        $_SESSION['SESS_FIRST_NAME']	= $row['fname'];
        $_SESSION['SESS_USER_TYPE']		= $row['usertype'];

        header("Location: ../index.php");
        exit;
    }
}
else {
    //Login Unsuccessful
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i><strong> Wrong Email!</strong>';
    header("Location: ../login.php");
    exit;
}

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
 * @filename      admin/inc/check.php
 * @begin         2019-02-24
 * @update        2019-02-24
 */

if(empty($_POST['user-email']) || $_POST['user-password']) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> All fields are required!';
    header("location: ../login.php");
    exit;
}
print_r($_POST);exit;

require("config.php");
require("db.php");

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
    $user_id = ($user == 'client') ? $row['cid'] : $row['fid'];
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

        $_SESSION['USER_ID']	= $user_id;
        $_SESSION['USER_NAME']	= $row['name'];
        $_SESSION['USER_TYPE']	= $user;

        header("Location: ../$user.php");
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

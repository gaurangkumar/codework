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
 * @link          http://codework.ml/
 * @since         1.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Vivek Patel
 *                Priya Patel
 * @filename      include/check-user.php
 * @begin         2018-12-21
 * @update        2019-03-03
 */

require("config.php");
require("db.php");

if(empty($_POST['email']) || empty($_POST['password']) || empty($_POST['usertype']) ) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> All fields are required!';
    header("location: ../login.php");
    exit;
}

$user = $_POST['usertype'];
$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);

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

        if($remember_me) {
            setcookie('USER_ID', $user_id);
        }

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

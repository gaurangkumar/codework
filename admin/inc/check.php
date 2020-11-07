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
 *                Krunal Bhavsar
 * @filename      admin/inc/check.php
 */

require("../../include/config.php");
require("../../include/db.php");

if(empty($_POST['email']) || empty($_POST['password'])) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> All fields are required!';
    header("location: ../login.php");
    exit;
}

$email = $_POST['email'];
$password = hash('sha256', $_POST['password']);

$result = $mysqli->query("SELECT * FROM `admin` WHERE `email` = '$email'");

if($mysqli->errno) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header("location: ../login.php");
    exit;
}

if($result->num_rows) {
    $row = $result->fetch_array();
    $user_id = $row['id'];
    if($row['password'] != $password) {
        //Login Unsuccessful
        $_SESSION["msg"]["type"] = "danger";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i><strong> Wrong Password !</strong>';
        header("Location: ../login.php");
        exit;
    }
    else { 
        //Login Successful
        $_SESSION['ADMIN_ID']	= $user_id;
        $_SESSION['ADMIN_NAME']	= $row['name'];

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

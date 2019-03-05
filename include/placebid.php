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
 * @filename      include/placebid.php
 * @begin         2019-03-04
 * @update        2019-03-04
 */
if(!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
    header("Location: login.php");
    exit;
}
$fid = $_SESSION['USER_ID'];

require("config.php");
require("db.php");

if($_POST['pid']=='' || $_POST['msg']=='') {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
	header("location: ../signup.php");
	exit;
}

$pid = $_POST['pid'];
$msg = $_POST['msg'];

if(strlen($msg) < 30) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Message is too short !';
    header("location: ../signup.php");
    exit;
}

$result = $mysqli->query("SELECT * FROM `post_req` WHERE `fid` = $fid AND `pid` = $pid");

if($mysqli->errno) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header("location: ../signup.php");
    exit;
}

if($result->num_rows) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Bid already placed !';
    header("location: ../signup.php");
    exit;
}

$result = $mysqli->query("INSERT INTO `post_req` (`pid`, `fid`, `msg`) VALUES ($pid, $fid, '$msg')");

if($result) {
    header("location: ../projects.php");
    exit;
}
else {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header("location: ../projects.php");
    exit;
}
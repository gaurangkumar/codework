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
 * @filename      include/accept.php
 * @begin         2019-03-10
 * @update        2019-03-11
 */

require("config.php");
require("db.php");

if(!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    $_SESSION["msg"]["type"] = "warning";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Login as client !';
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'client') {
    $_SESSION["msg"]["type"] = "warning";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Login as client !';
    header("Location: login.php");
    exit;
}
$cid = $_SESSION['USER_ID'];

if($_POST['pid']=='' || $_POST['pid']==0) {
    $_SESSION["msg"]["type"] = "warning";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Invalid request !';
    header("Location: client.php");
    exit;
}

$pid = $_POST['pid'];

if($_POST['fid']=='' || $_POST['fid']==0) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Invalid request !';
	header("location: ../projects.php?pid=$pid");
	exit;
}

$fid = $_POST['fid'];

$result = $mysqli->query("SELECT * FROM `post_req` WHERE `fid` = $fid AND `pid` = $pid");

if($mysqli->errno) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header("location: ../projects.php?pid=$pid");
    exit;
}

if(!$result->num_rows) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Unexcepted error found !';
    header("location: ../projects.php?pid=$pid");
    exit;
}

$row = $result->fetch_assoc();

if($row['status'] == 'accepted') {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Request already accepted !';
    header("location: ../projects.php?pid=$pid");
    exit;
}

$result = $mysqli->query("UPDATE `post_req` SET `status` = 'accepted' WHERE `pid` = $pid AND `fid` = $fid");

$res = $mysqli->query("UPDATE `post_prj` SET `fid` = $fid, `status` = 'ongoing' WHERE `pid` = $pid");

if($result) {
    $_SESSION["msg"]["type"] = "success";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Requested successfully !';
    header("location: ../projects.php?pid=$pid");
    exit;
}
else {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header("location: ../projects.php?pid=$pid");
    exit;
}
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
 * @filename      include/upload.php
 */

require("config.php");
require("db.php");

if(!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    $_SESSION["msg"]["type"] = "warning";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Login as freelancer !';
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'freelancer') {
    $_SESSION["msg"]["type"] = "warning";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Login as freelancer !';
    header("Location: login.php");
    exit;
}
$fid = $_SESSION['USER_ID'];

if($_POST['pid']=='' || $_POST['pid']==0) {
    $_SESSION["msg"]["type"] = "warning";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Invalid request !';
    header("Location: freelancer.php");
    exit;
}

$pid = $_POST['pid'];

$file = $_FILES['prj'];
if($_FILES['prj']['name']=='') {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Please select valid file !';
	header("location: ../projects.php?pid=$pid");
	exit;
}

    if(! (file_exists('../user_data') && is_dir('../user_data')) ) {
        mkdir('../user_data');
    }

    $file_path = 'user_data/'.NOW.'-'.$file['name'];

    $f = move_uploaded_file($file['tmp_name'], '../'.$file_path);

    if(!$f) {
        $_SESSION["msg"]["type"] = "danger";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> File is not saved !';
        header("location: ../projects.php?pid=$pid");
        exit;
    }

$result = $mysqli->query("UPDATE `post_prj` SET `file` = '$file_path', `status` = 'completed' WHERE `pid` = $pid");

$result = $mysqli->query("UPDATE `post_req` SET `status` = 'completed' WHERE `pid` = $pid AND `fid` = $fid");

if($result) {
    $_SESSION["msg"]["type"] = "success";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Uploaded successfully !';
    header("location: ../projects.php?pid=$pid");
    exit;
}
else {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header("location: ../projects.php?pid=$pid");
    exit;
}
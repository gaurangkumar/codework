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
 * @filename      include/add-post.php
 * @begin         2019-03-06
 * @update        2019-03-09
 */

require("config.php");
require("db.php");

if(!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
    header("Location: login.php");
    exit;
}
if(!isset($_SESSION['USER_TYPE']) || $_SESSION['USER_TYPE'] != 'client') {
    header("Location: login.php");
    exit;
}

$cid = $_SESSION['USER_ID'];

if($_POST['name']==''    ||
   $_POST['prjtype']=='' ||
   $_POST['about']==''   ||
   $_POST['lang']==''    ||
   $_POST['cost']==''
  ) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
	header("location: ../post.php");
	exit;
}

$name = $_POST['name'];
$prjtype = $_POST['prjtype'];
$about  = $_POST['about'];
$lang = $_POST['lang'];
$cost  = $_POST['cost'];

$result = $mysqli->query("INSERT INTO `post_prj`(`name`, `detail`, `category`, `lang`, `cid`, `status`, `cost`) VALUES ('$name', '$about', '$prjtype', '$lang', $cid, 'Pending', $cost)");

if($result) {
    $_SESSION["msg"]["type"] = "success";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Project posted successfully !';
    header("location: ../client.php");
    exit;
}
else {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header("location: ../client.php");
    exit;
}
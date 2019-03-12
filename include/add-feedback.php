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
 * @filename      include/add-feedback.php
 * @begin         2019-03-13
 * @update        2019-03-13
 */

require("config.php");
require("db.php");

if($_POST['name']==''    ||
   $_POST['email']==''   ||
   $_POST['message']==''
  ) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
	header("location: ../post.php");
	exit;
}

$name    = $_POST['name'];
$email   = $_POST['email'];
$message = $_POST['message'];

$result = $mysqli->query("INSERT INTO `feedback`(`name`, `email`, `msg`) VALUES ('$name', '$email', '$message')");
exit;
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
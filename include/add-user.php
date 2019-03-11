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
 * @filename      index.php
 * @begin         2018-12-21
 * @update        2019-03-11
 */

require("config.php");
require("db.php");
print_r($_POST);exit;
if($_POST['email']==''     ||
   $_POST['name']==''      ||
   $_POST['password']==''  ||
   $_POST['cpassword']=='' ||
   $_POST['usertype']==''
  ) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Please Fill Up All Info !';
	header("location: ../signup.php");
	exit;
}

$name      = $_POST['name'];
$email     = $_POST['email'];
$password  = $_POST['password'];
$cpassword = $_POST['cpassword'];
$usertype  = $_POST['usertype'];
$lang      = $_POST['lang'];
$cv        = $_FILES['cv'];
$id        = $_FILES['id'];

if($password != $cpassword) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Password Are Not Same !';
    header("location: ../signup.php");
    exit;
}

if($usertype != 'freelancer' && $usertype != 'client') {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Select Usertype !';
    header("location: ../signup.php");
    exit;
}

$result = $mysqli->query("SELECT * FROM $usertype WHERE email = '$email' ");

if($mysqli->errno) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Error: '.$mysqli->error;
    header("location: ../signup.php");
	exit;
}

if($result->num_rows) {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Email Already Used !';
    header("location: ../signup.php");
    exit;
}

if($usertype == 'freelancer') {
    if(empty($lang)) {
        $_SESSION["msg"]["type"] = "danger";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Programming Language is not given !';
        header("location: ../signup.php");
        exit;
    }

    if(! (file_exists('../user_data') && is_dir('../user_data')) ) {
        mkdir('../user_data');
    }

    $cv_path = 'user_data/'.NOW.'-'.$cv['name'];
    $id_path = 'user_data/'.NOW.'-'.$id['name'];

    $c = move_uploaded_file($cv['tmp_name'], '../'.$cv_path);
    $i = move_uploaded_file($id['tmp_name'], '../'.$id_path);

    if(!$c || !$i) {
        $_SESSION["msg"]["type"] = "danger";
        $_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i> Files not save !';
        header("location: ../signup.php");
        exit;
    }
}

$password = hash('sha256', $password);

if($usertype == 'freelancer') {
    $result = $mysqli->query("INSERT INTO $usertype (`name`, `email`, `password`, `lang`, `cv`, `id_proof`) VALUES
    ('$name', '$email', '$password', '$lang', '$cv_path', '$id_path')");
}
else {
    $result = $mysqli->query("INSERT INTO $usertype (`name`, `email`, `password`) VALUES
    ('$name', '$email', '$password')");
}

if($result) {
    $result = $mysqli->query("SELECT * FROM $usertype WHERE email = '$email'");
    $member = $result->fetch_array();

    $_SESSION['USER_ID'] = ($usertype == 'client') ? $row['cid'] : $row['fid'];
    $_SESSION['USER_NAME']	= $row['name'];
    $_SESSION['USER_TYPE'] = $row['usertype'];

    header("location: ../$usertype.php");
    exit;
}
else {
    $_SESSION["msg"]["type"] = "danger";
    $_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i> Error: '.$mysqli->error;
    header("location: ../signup.php");
    exit;
}
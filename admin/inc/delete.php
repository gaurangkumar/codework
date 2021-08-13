<?php
/**
 * CodeWork : Freelancing Platform
 * Copyright (c) CodeWork (https://github.com/gaurangkumar/codework).
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) CodeWork (https://github.com/gaurangkumar/codework)
 *
 * @link          http://codework.ml/
 * @since         1.0.0
 *
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Krunal Bhavsar
 * @filename      admin/inc/delete.php
 */
require '../../include/config.php';
require '../../include/db.php';

if (!empty($_GET['cid'])) {
    $mysqli->query("DELETE FROM `client` WHERE `cid` = {$_GET['cid']}");
    header('Location: ../client.php');
    exit;
} elseif (!empty($_GET['fid'])) {
    $mysqli->query("DELETE FROM `freelancer` WHERE `fid` = {$_GET['fid']}");
    header('Location: ../client.php');
    exit;
} elseif (!empty($_GET['fbid'])) {
    $mysqli->query("DELETE FROM `feedback` WHERE `fbid` = {$_GET['fbid']}");
    header('Location: ../client.php');
    exit;
} elseif (!empty($_GET['pid'])) {
    $mysqli->query("DELETE FROM `post_prj` WHERE `pid` = {$_GET['pid']}");
    header('Location: ../client.php');
    exit;
} else {
    $_SESSION['msg']['type'] = 'danger';
    $_SESSION['msg']['msg'] = '<i class="fa fa-warning-circle"></i> Invalid Request!';
    header('location: ../login.php');
    exit;
}

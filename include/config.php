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
 * @filename      var.php
 * @begin         2018-12-21
 * @update        2019-03-03
 */

date_default_timezone_set("Asia/Kolkata");
define('NOW', date('Y-m-d-H-i-s', time()));

session_start();

$host    = 'localhost';
$user    = 'root';
$pass    = '';
$db      = 'codework';

$site    = "CodeWork";

$logo    = "asset/logo.png";
$favicon = "asset/favicon.ico";
$made_by = "GK & Vivek & Priya";

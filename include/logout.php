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
 * @link          
 * @since         1.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Vivek Patel
 *                Priya Patel
 * @filename      index.php
 * @begin         2018-12-21
 * @update        2018-12-21
 */

require("config.php");
require("db.php");

session_start();

unset($_SESSION['SESS_MEMBER_ID']);
unset($_SESSION['SESS_USER_NAME']);
unset($_SESSION['SESS_FIRST_NAME']);
unset($_SESSION['SESS_USER_TYPE']);
unset($_SESSION['SESS_PRO_PIC']);

session_destroy();

header("Location: ../index.php");
exit;
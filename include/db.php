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
 * @filename      include/db.php
 * @begin         2018-12-21
 * @update        2018-12-25
 */

$mysqli = new mysqli($host, $user, $pass, $db);

if($mysqli->connect_errno) {
    $connect_error = 'Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}

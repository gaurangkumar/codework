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
 * @filename      include/header.php
 * @begin         2018-12-21
 * @update        2019-03-09
 */
?>
    <!-- Navigation -->
    <a class="menu-toggle rounded" href="#">
      <i class="fa fa-bars"></i>
    </a>
    <nav id="sidebar-wrapper">
      <ul class="sidebar-nav">
        <li class="sidebar-brand">
          <a class="js-scroll-trigger" href="index.php"><?=$site?></a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php">Home</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#about">About</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#services">Services</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#portfolio">Portfolio</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#team">Team</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="index.php#contact">Contact</a>
        </li>
        <?php
        if(!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
        ?>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="login.php">Login</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="signup.php">Signup</a>
        </li>
        <?php
        }
        else {
        ?>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="<?=$_SESSION['USER_TYPE']?>.php">Dashboard</a>
        </li>
        <li class="sidebar-nav-item">
          <a class="js-scroll-trigger" href="include/logout.php">Logout</a>
        </li>
        <?php
        }
        ?>
      </ul>
    </nav>

    <nav class="col-2 navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="">
        <a class="navbar-brand js-scroll-trigger brand-name" href="index.php"><?=$site?></a>
      </div>
    </nav>

<?php
/**
 * CodeWork : Freelancing Platform
 * Copyright (c) IronPHP (https://github.com/IronPHP/IronPHP)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @package       CodeWork
 * @copyright     Copyright (c) CodeWork (https://github.com/gaurangkumarp/codework)
 * @link          
 * @since         1.0.0
 * @license       MIT License (https://opensource.org/licenses/mit-license.php)
 * @auther        GaurangKumar Parmar <gaurangkumarp@gmail.com>
 *                Vivek Patel
 *                Priya Patel
 * @filename      var.php
 * @begin         2018-12-21
 * @update        2018-12-21
 */

//error_reporting(0);
//error_reporting(E_ALL);

function is_session_started() {
	if ( php_sapi_name() !== 'cli' ) {
		if ( version_compare(phpversion(), '5.4.0', '>=') )
			return (session_status() === PHP_SESSION_ACTIVE) ? TRUE : FALSE;
        else
			return (session_id() === '') ? FALSE : TRUE;
	}
	return FALSE;
}
if ( is_session_started() === FALSE ) session_start();

if(!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) $uri = 'https://';
else $uri = 'http://';

define("S",$_SERVER['HTTP_HOST'],true);
define("SITE",$uri.S);
$uri .= S."/";
define("RT1",$_SERVER['DOCUMENT_ROOT']."/",true);

$ext_dir = str_replace("var.php","",str_replace(RT1,"",str_replace("\\","/",__FILE__)));

define("SR",$uri.$ext_dir,  true);
define("AST",SR."asset/",   true);

define("RT",RT1.$ext_dir,   true);
define("P",RT."prt/",       true);
define("INC",RT."include/", true);
define("C",RT."cdn/",       true);

//set tables for mysql query
$t_a 	= 'admin';
$t_c	= 'cat';
$t_cn	= 'contact';
$t_d	= 'deleted';
$t_dm	= 'download_manager';
$t_e	= 'error';
$t_ip	= 'ip';
$t_m	= 'members';
$t_o	= 'orders';
$t_oi	= 'order_items';
$t_p	= 'photos';
$t_pc	= 'photocomment';
$t_pl	= 'photolike';
$t_r	= 'raw';
$t_s	= 'search';
$t_wp	= 'web_pages';
$t_t	= 'tag';
$t_v	= 'visitors';

$p_self = $page_url_name = $_SERVER['SCRIPT_NAME']; //var used for checking if page is admin, master ...
$page = $_SERVER['PHP_SELF'];
$rtn_uri = str_replace('?'.$_SERVER['QUERY_STRING'],"",$_SERVER['REQUEST_URI']); //var used for return in same page
$ip = $_SERVER['REMOTE_ADDR'];
$php_self = str_replace('@/'.$ext_dir,SR,"@".$rtn_uri); // full uri
$page_uri = str_replace(".php","",$page); //used PHP_SELF bcoz REQUEST_URI gives unexpected result
define("RTN_URI",str_replace('?'.$_SERVER['QUERY_STRING'],"",$page_uri),true);//no dynamic pages
define("IP",$ip,true);
define("PHP_SELF",$php_self,true);

date_default_timezone_set("Asia/Kolkata");
$today = date("Y-m-d")."T".date("h:i:s")."+05:30";

$c = !empty($c) ? $c : 0;
$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";
$mail = "noreplay@".S;
$hs = "localhost";
if(S==$hs) $cred = [$hs, "root", "", "codework"];
else $cred = [$hs, "lasmi01", "gzLd{,JZ4vb3", "codework"];

$pg='';

$debug = true;
$log = '';
$log_file = 'log';
$enable_log = true;

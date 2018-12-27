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

if($caption == ''){
	echo 'No Access To This Resource.';
	//header('Location: '.SR.'/');
	exit();
}
$result = mysql_query("SELECT * FROM `$t_p` WHERE caption = '$caption'")  or die('Error 1 :'.mysql_error());
if(mysql_num_rows($result)==0){
	echo 'Unkown File Download Request.';
	//header('Location: '.SR.'/');
	exit();
}
$row = mysql_fetch_array($result);
$caption = str_replace(' ','-',$row['caption']);
$type = $row['type'];
if($row['type'] == ''){ $type = 'jpg'; }
$pid = $row['photo_id'];
$img = $row['location'];
$file= RT.$img;
$image = $row['location'];
list($image_width, $image_height) = getimagesize($file);
$proportions = $image_width/$image_height; // Screen Ratio
$resolution = $image_width*$image_height/1024/1024; //In MegaPixel
$org_res = $image_width.'x'.$image_height;
echo $caption.' '.$file.' '.$image_width.' '.$image_height;
echo '<br/>';
//-------------aspect resolution -----------------------------------
if ((isset($_POST["resolution"])) && ($_POST["resolution"] == "1")) {
	echo 'res';
	if($_POST["max_height_box"]=="none"){
		// Error reporting:
		error_reporting(E_ALL^E_NOTICE);

		if(!$file) error('Missing parameter!');
		if($file{0}=='.') error('Wrong file!');
		if(file_exists($file)){
			if(!is_bot()){
				mysql_query(" INSERT INTO $t_dm SET `photo_id` ='".mysql_real_escape_string($pid)."' ON DUPLICATE KEY UPDATE `downloads` = `downloads`+1 ")
				or die('Error : '.mysql_error());
				mysql_query(" UPDATE `$t_p` SET `downloads` = `downloads`+1 WHERE `photo_id` = '$pid' ") or die('Error : '.mysql_error());
				header('location: '.$file);
			}
		}
		else{
			error("This file does not exist!");
		}
		exit();
	}
	$res = $_POST["max_height_box"];
	$image_source = imagecreatefromjpeg($file);
	$remote_img = 'temp/'.$caption.'-PicsRay-'.$res.'.'.$type;
	$remote_file = RT.$remote_img;
	imagejpeg($image_source,$remote_file,100);
	chmod($remote_file,0644);
	echo $remote_file;
	echo $_POST["max_height_box"];
	$max_upload = explode("x",$_POST["max_height_box"]);
	$max_upload_width = $max_upload[0];
	$max_upload_height = $max_upload[1];
	echo ' '.$max_upload_width.' X '.$max_upload_height.'<br>';
	$new_width= $max_upload_width; //new image width
	$new_height= $max_upload_height; //new image height
	// get width and height of original image
	list($org_image_width, $org_image_height) = getimagesize($remote_file);
	echo $org_image_width.' '.$org_image_height.' ';

	//creating temp img
	$src_x_diff = $src_y_diff = 0;
	$org_proportion = $org_image_width / $org_image_height;
	$new_proportion = $new_width / $new_height;
	if($org_image_width > $org_image_height){
		if($org_proportion > $new_proportion){
			$image_height = $org_image_height;
			$image_width = $org_image_height * $new_proportion;
			$src_y_diff = ($org_image_height/2)-($image_height/2);
		}else{
			$image_width = $org_image_width;
			$image_height = $org_image_width / $new_proportion;
			$src_y_diff = ($org_image_height/2)-($image_height/2);
		}
	}else{
		if($org_proportion > $new_proportion){
			$image_height = $org_image_width / $new_proportion;
			$image_width = $org_image_width;
			$src_y_diff = ($org_image_height/2)-($image_height/2);
		}else{
			$image_width = $org_image_width;
			$image_height = $org_image_width / $new_proportion;
			$src_x_diff = ($org_image_width/2)-($image_width/2);
		}
	}
	echo $image_width.'x'.$image_height.' '.$src_x_diff.' '.$src_y_diff.' '.$new_width.'x'.$new_height.' ';
	$new_image = imagecreatetruecolor($new_width , $new_height);
	$image_source = imagecreatefromjpeg($remote_file);
	imagecopyresampled($new_image, $image_source, 0, 0, $src_x_diff, $src_y_diff, $new_width, $new_height, $image_width, $image_height);
	imagejpeg($new_image,$remote_file,100);

	//$new_image = imagecreatetruecolor($new_width , $new_height);
	//$new_image = imagecreatetruecolor($max_upload_width , $max_upload_height);
	//$image_source = imagecreatefromjpeg($remote_file);
	
	//imagecopyresampled($new_image, $image_source, 0, 0, 0, 0, $new_width, $new_height, $image_width, $image_height);
	//imagejpeg($new_image,$remote_file,100);
	// Error reporting:
	error_reporting(E_ALL^E_NOTICE);
	if(!$file) error('Missing parameter!');
	if($file{0}=='.') error('Wrong file!');
	if(file_exists($file)){
		if(!is_bot()){
			mysql_query(" INSERT INTO $t_dm SET `photo_id` ='".mysql_real_escape_string($pid)."' ON DUPLICATE KEY UPDATE downloads=downloads+1 ")
			or die(mysql_error());
			mysql_query(" UPDATE `$t_p` SET `downloads` = `downloads`+1 WHERE `photo_id` = '$pid' ") or die('Error : '.mysql_error());
			header('location: '.SR.$remote_img);
		}
	}else{
		error("This file does not exist!");
	}
	//imagedestroy($remote_file);
	exit();
}
//-------------original resolution -----------------------------------
$res = '';
$image_source = imagecreatefromjpeg($file);
$remote_img = 'temp/'.$caption.'-PicsRay-'.$org_res.'.'.$type;
$remote_file = RT.$remote_img;
imagejpeg($image_source,$remote_file,100);
chmod($remote_file,0644);
echo $remote_file;

if(file_exists($remote_file)){
	/* If the visitor is not a search engine, count the download: */
	if(!is_bot()){
		mysql_query(" INSERT INTO $t_dm SET `photo_id` ='".mysql_real_escape_string($pid)."' ON DUPLICATE KEY UPDATE downloads=downloads+1 ") or die('Error 2 :'.mysql_error());
		mysql_query(" UPDATE `$t_p` SET `downloads` = `downloads`+1 WHERE `photo_id` = '$pid' ") or die('Error 3 : '.mysql_error());
		header('location: '.SR.$remote_img);
		exit();
	}
}else{
	die("This file does not exist!");
}

function is_bot(){
	/* This function will check whether the visitor is a search engine robot */
	
	$botlist = array("Teoma", "alexa", "froogle", "Gigabot", "inktomi",
	"looksmart", "URL_Spider_SQL", "Firefly", "NationalDirectory",
	"Ask Jeeves", "TECNOSEEK", "InfoSeek", "WebFindBot", "girafabot",
	"crawler", "www.galaxy.com", "Googlebot", "Scooter", "Slurp",
	"msnbot", "appie", "FAST", "WebBug", "Spade", "ZyBorg", "rabaz",
	"Baiduspider", "Feedfetcher-Google", "TechnoratiSnoop", "Rankivabot",
	"Mediapartners-Google", "Sogou web spider", "WebAlta Crawler","TweetmemeBot",
	"Butterfly","Twitturls","Me.dium","Twiceler");

	foreach($botlist as $bot){
		if(strpos($_SERVER['HTTP_USER_AGENT'],$bot)!==false)
		return true;	// Is a bot
	}
	return false;	// Not a bot
}
?>
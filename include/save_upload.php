<?php
//160603
session_start();
$return_url = $_POST['return_url'];
require_once($_SERVER['DOCUMENT_ROOT'].'/var.php');
require_once(I."db.php");
require_once(I."auth.php");

$thumb_pic = true;
$cthumb_pic = false;
$large_pic = true;
$large_pic_width = 700;
$thumb_pic_width = 300;
$thumb_pic_height = 200;
$cthumb_pic_width = 150;
$cthumb_pic_height = 100;
$table = 'photos';
$dir = "photos/";
$original_pic_folder = $dir.'original/';
$thumb_pic_folder = $dir.'thumb/';
$by_id = $member_id;
$by_name = $member_name;
$about = $_POST['about'];

if(!isset($_POST['table']) || trim($_POST['table'])==""){
	$table2 = "";
}
else{
	$table2 = $_POST['table'];
	if($table2 == "cat"){
		$cthumb_pic = true;
	}
}

if($master_user == true){ 
	$status = 'Public';
}else{
	$status = 'Private';
}
ini_set("memory_limit", "2000000000000"); // for large images so that we do not get "Allowed memory exhausted"

if($_FILES["picture"]["type"]==''){
	$_SESSION["msg"]["type"] = "danger";
	$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i><strong> Please Select Image To Upload !';
	header('Location: '.$return_url);
	exit();
}

if( (isset($_POST["submitted_form"])) && ($_POST["submitted_form"] == "image_upload_form") ){
	if( ($_FILES["picture"]["type"] == "image/jpeg" ||
	$_FILES["picture"]["type"] == "image/pjpeg" ||
	$_FILES["picture"]["type"] == "image/gif" ||
	$_FILES["picture"]["type"] == "image/x-png") &&
	($_FILES["picture"]["size"] < 8388608) ){ //the limit of 8388608 bytes  = 8MB 
		if($_FILES["picture"]["type"] == "image/jpeg" || $_FILES["picture"]["type"] == "image/pjpeg"){	
			$type='jpg';
			$image_source = imagecreatefromjpeg($_FILES["picture"]["tmp_name"]);
		}		
		// if uploaded image was GIF
		if($_FILES["picture"]["type"] == "image/gif"){	
			$type='gif';
			$image_source = imagecreatefromgif($_FILES["picture"]["tmp_name"]);
		}	
		// BMP doesn't seem to be supported so remove it form above image type test (reject bmps)	
		// if uploaded image was BMP
		if($_FILES["picture"]["type"] == "image/bmp"){	
			$type='bmp';
			$image_source = imagecreatefromwbmp($_FILES["picture"]["tmp_name"]);
		}			
		// if uploaded image was PNG
		if($_FILES["picture"]["type"] == "image/x-png"){
			$type='png';
			$image_source = imagecreatefrompng($_FILES["image"]["tmp_name"]);
		}
		
		date_default_timezone_set("asia/kolkata");
		$date = date('Ymd-his');
		if(!isset($_POST['photo_id']) || (trim($_POST['photo_id']) == '')){
			if(!isset($_POST['iname']) || (trim($_POST['iname']) == '')){
				$caption = str_replace(".".$type,"",$_FILES["picture"]["name"]);
			}else{
				$caption = $_POST["iname"];
			}
	
			$caption_old = $caption = ucwords($caption);
			$file_name = str_replace(" ","-",$caption); //removing str, replacing/adding str, full str
			$original_file_name = $file_name."-".$date.".".$type;
			$large_file_name = $file_name."-large-".$date.".".$type;
			$thumb_file_name = $file_name."-thumb-".$date.".".$type;
			$cthumb_file_name = $file_name."-cthumb-".$date.".".$type;
			
			$original_pic_path = $original_pic_folder.$original_file_name;
			$large_pic_path = $thumb_pic_folder.$large_file_name;
			$thumb_pic_path = $thumb_pic_folder.$thumb_file_name;
			$cthumb_pic_path = $thumb_pic_folder.$cthumb_file_name;
		}else{
			//editing later
			$pid = $_POST['photo_id'];
			$result = mysql_query("SELECT * FROM `$t_p` WHERE photo_id = $pid") or die('Error 1 : '.mysql_error());
			$row = mysql_fetch_array($result);
			$file_name = $row['caption'].'.'.$type;
			$caption = $row['caption'];
			$cid = $row['cid'];			
		}
		$remote_file = RT.$original_pic_path;
		$large_file = RT.$large_pic_path;
		$thumb_file = RT.$thumb_pic_path;
		$cthumb_file = RT.$cthumb_pic_path;
		//original image
		imagejpeg($image_source,$remote_file,100);
		chmod($remote_file,0644);
		if(file_exists($remote_file)){
			$remote_file_exist = true;
		}else{
			$remote_file_exist = false;
		}
		$size = filesize($remote_file);
		
		$new_width= $thumb_pic_width; //new image width 288
		$new_height= $thumb_pic_height; //new image height 174
		list($org_image_width, $org_image_height) = getimagesize($remote_file);
		//ratio and resolution			
		$var1 = $org_image_width;
		$var2 = $org_image_height;
		$resolution = ($var1*$var2);
		//-------------------- find ratio from two numbers ------------------------
		for($x=$var2;$x>1;$x--) {
		  	if(($var1%$x)==0 && ($var2 % $x)==0) {
		    	$var1 = $var1/$x;
		    	$var2 = $var2/$x;
			}
		}
		$ratio = $var1.':'.$var2;

		//creating large
	  if($large_pic == true){
		imagejpeg($image_source,$large_file,100);
		chmod($large_file,0644);

		$new_image_width = $large_pic_width; //new img hight
		$perpotion = $org_image_width/$org_image_height;
		$new_image_height = $new_image_width/$perpotion; //new img width
		$new_large_image = imagecreatetruecolor($new_image_width , $new_image_height);//new img
		$image_source = imagecreatefromjpeg($large_file);
		imagecopyresampled($new_large_image, $image_source, 0, 0, 0, 0, $new_image_width, $new_image_height, $org_image_width, $org_image_height);
		imagejpeg($new_large_image,$large_file,100);
		if(file_exists($large_file)){
			$large_file_exist = true;
		}else{
			$large_file_exist = false;
		}
	  }else{
		$large_file_exist = true;
		$large_pic_path = "";
	  }
		//creating thumb
	  if($thumb_pic == true){
		imagejpeg($image_source,$thumb_file,100);
		chmod($thumb_file,0644);

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
		$new_image = imagecreatetruecolor($new_width , $new_height);
		$image_source = imagecreatefromjpeg($thumb_file);
		imagecopyresampled($new_image, $image_source, 0, 0, $src_x_diff, $src_y_diff, $new_width, $new_height, $image_width, $image_height);
		imagejpeg($new_image,$thumb_file,100);

		if(file_exists($thumb_file)){
			$thumb_file_exist = true;
		}else{
			$thumb_file_exist = false;
		}
	  }else{
		$thumb_file_exist = true;
		$thumb_pic_path = "";
	  }
		//creating cthumb
	  if($cthumb_pic == true){
		imagejpeg($image_source,$cthumb_file,100);
		chmod($cthumb_file,0644);

		$new_width= $cthumb_pic_width; //new image width 288
		$new_height= $cthumb_pic_height; //new image height 174

		$src_x_diff = $src_y_diff = 0;
		$org_proportion = $org_image_width / $org_image_height;
		$new_proportion = $new_width / $new_height;
		if($org_image_width > $org_image_height){
			if($org_proportion > $new_proportion){
				$image_width = $org_image_height * $new_proportion;
				$image_height = $org_image_height;
				$src_x_diff = ($org_image_width/2)-($image_width/2);
			}else{
				$image_height = $org_image_width / $new_proportion;
				$image_width = $org_image_width;
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
		$new_image = imagecreatetruecolor($new_width , $new_height);
		$image_source = imagecreatefromjpeg($cthumb_file);
		imagecopyresampled($new_image, $image_source, 0, 0, $src_x_diff, $src_y_diff, $new_width, $new_height, $image_width, $image_height);
		imagejpeg($new_image,$cthumb_file,100);

		if(file_exists($thumb_file)){
			$cthumb_file_exist = true;
		}else{
			$cthumb_file_exist = false;
		}
	  }else{
			$cthumb_file_exist = true;
			$cthumb_pic_path = "";
	  }
	}
}
//check caption is exist or not, if exist change name			
$result1 = mysql_query("SELECT * FROM `$t_p` WHERE `caption` = '$caption'") or die('Error 5 : '.mysql_error());
$num = mysql_num_rows($result1);
$i = 1; $new_caption = '';
while($num > 0){
	$new_caption = $caption.$i;
	$result1 = mysql_query("SELECT * FROM `$t_p` WHERE `caption` = '$new_caption'") or die('Error 5.'.$i.' : '.mysql_error());
	$num = mysql_num_rows($result1);
	$i++;
}

if($new_caption!=''){
	$caption = $new_caption;
}
// --- page ---
$filename = 'pics/'.str_replace(" ","-",strtolower($caption)).'-image.php'; // filename
$filename_s = 'pics/'.str_replace(" ","-",strtolower($caption)).'-image'; // filename
$pic_name = 'pic/'.str_replace(" ","-",strtolower($caption));
$fullfilepath = RT.$filename; // local path
$catfile = RT.'pics/pic.php'; //cat.php file
$i = 1;
while(file_exists($fullfilepath)){
	$filename = 'pics/'.str_replace(" ","-",strtolower($caption)).'-'.$i.'-image.php';
	$filename_s = 'pics/'.str_replace(" ","-",strtolower($caption)).'-'.$i.'-image';
	$pic_name = 'pic/'.str_replace(" ","-",strtolower($caption)).'-'.$i;
	$fullfilepath = RT.$filename; //local path
	$i++;
}
//$copy = copy($catfile,$fullfilepath); //copy
//if($copy){
	$page = $filename_s;
//}
// --- url ---
$url =  $pic_name; // filename

//check cname is exist or not, if exist change name			
if($table2 == "cat"){
	$result1 = mysql_query("SELECT * FROM `cat` WHERE `cname` = '$caption'") or die('Error 6 : '.mysql_error());
	$num = mysql_num_rows($result1);
	$i = 1; $new_caption = '';
	while($num > 0){
		$new_caption = $caption.$i;
		$result1 = mysql_query("SELECT * FROM `cat` WHERE `cname` = '$new_caption'") or die('Error 5.'.$i.' : '.mysql_error());
		$num = mysql_num_rows($result1);
		$i++;
	}
			
	if($new_caption!=''){
		$caption = $new_caption;
	}
	// --- page ---
	$filename = 'cats/'.str_replace(" ","-",strtolower($caption)).'-category.php'; // filename
	$filename_s = 'cats/'.str_replace(" ","-",strtolower($caption)).'-category'; // filename
	$cat_name = str_replace(" ","-",strtolower($caption));
	$fullfilepath = RT.$filename; // local path
	$catfile = RT.'cats/pic.php'; //cat.php file
	$i = 1;
	while(file_exists($fullfilepath)){
		$filename = 'cats/'.str_replace(" ","-",strtolower($caption)).'-'.$i.'-category.php';
		$filename_s = 'cats/'.str_replace(" ","-",strtolower($caption)).'-'.$i.'-category';
		$cat_name = str_replace(" ","-",strtolower($caption)).'-'.$i;
		$fullfilepath = RT.$filename; //local path
		$i++;
	}
	//$copy = copy($catfile,$fullfilepath); //copy
	//if($copy){
		//$page = $filename_s;
	//}
	// --- url ---
	$url2 =  $cat_name; // filename
}

//values for query
$cid = $cat_id = $_POST['category'];
$result = mysql_query("SELECT * FROM `cat` WHERE `cid` = $cid") or die('Error 1 : '.mysql_error());
$row = mysql_fetch_array($result);
	
$cat = $cat_name = $row["cname"];
$original = $original_pic_path;
$large = $large_pic_path;
$thumb = $thumb_pic_path;
$cthumb = $cthumb_pic_path; 
$new_width = $org_image_width;
$new_height = $org_image_height;

if($table2 == "cat" && $cthumb_file_exist){
	$tags = $caption;
	$qry2 = mysql_query("select * from $t_c where cid = $cid ");
	while(mysql_num_rows($qry2) > 0){
		$row2 = mysql_fetch_array($qry2);
		$uc = $row2["upcat"];
		$t = strtolower($row2["cname"]);
		$tags .= ", ".$t;
		$t2 = array();
		$t2 = explode(",",strtolower($row2["tags"]));
		$x = 0;
		while(isset($t2[$x]) && trim($t2[$x])!=""){
			if(stristr($tags,$t2[$x])){
			}else{
				$tags .= ", ".$t2[$x];
			}
			$x++;
		}
		$qry2 = mysql_query("select * from $t_c where cid = $uc ");
	}
	$tags = strtolower($tags);
	$cat_tags = $tags;

	$save = mysql_query("INSERT INTO `$t_c`(`cname`, `cthumb`, `upcat`, `by`, `url`, `tags`) VALUES	('$caption', '$cthumb', '$cid', '$by_id', '$url2', '$tags')");
	if($save){
		echo "cat saved";
		if($cid != 0){
			mysql_query("UPDATE  $t_c SET nosub = nosub + 1 WHERE cid = $cid");
		}
				
		$result = mysql_query("SELECT * FROM `cat` WHERE `cname` = '$caption'") or die('Error 2 : '.mysql_error());
		$row = mysql_fetch_array($result);
		$cat_name = $row["cname"];
		$cat_id = $row["cid"];
		//echo '<br>'.$caption.' '.$cthumb.' '.$cid.' '.$by_id.' '.$url2.' ';
	}else{
		echo "cat not saved.";
		exit();
	}
}


if( $remote_file_exist || $large_file_exist || $thumb_file_exist || $cthumb_file_exist){
	if(isset($_POST["tags"])){ $tags = $_POST["tags"]; }else{ $tags = ""; }
	
	if(trim($tags) != ""){
		$tags .= ", ";
	}
	
	if( !isset($cat_tags) || trim($cat_tags) == ""){
		$result2 = mysql_query("SELECT tags FROM `$t_c` WHERE cid = $cat_id");
		$row3 = mysql_fetch_array($result2);
		if(trim($row3["tags"]) != ""){
			$tags .= $row3["tags"];
		}
	}else{
		$tags .= $cat_tags;
	}
	$tags = strtolower($tags);
	
	$save = mysql_query("INSERT INTO `$t_p` (cid, cat, location, url, thumb, large, by_id, by_name, status, about, caption, width, height, size, resolution, ratio, type, tags) VALUES 
		('$cat_id', '$cat_name', '$original', '$url', '$thumb', '$large', '$by_id', '$by_name', '$status', '$about', '$caption', '$new_width', '$new_height', '$size', '$resolution', '$ratio', '$type', '$tags')");
}

if($save){
	//Image Saved
	$_SESSION["msg"]["type"] = "success";
	$_SESSION["msg"]["msg"] = '<i class="fa fa-info-circle"></i><strong> Uploaded Image Saved !';
	header('Location: '.$return_url);
	exit();
}else{
	//Image Not Saved
	$_SESSION["msg"]["type"] = "danger";
	$_SESSION["msg"]["msg"] = '<i class="fa fa-warning-circle"></i><strong> Uploaded Image Is Not Saved !';
	header('Location:'.$return_url);
	exit();
}
?>
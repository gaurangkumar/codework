<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
require("../include/config.php");
require("../include/db.php");

if(isset($_POST['remove'])
{
	$sql = "DELETE FROM `client` WHERE $"; 
    $result = $mysqli->query($sql);
	$client = $result->num_rows
?>
}

</body>
</html>
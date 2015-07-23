<?
$dbhost = "localhost"; 
$dbname = "db1";  
$dbuser = "root"; 
$dbpass = "";  
 
mysql_connect($dbhost, $dbuser, $dbpass) or die("Помилка MySQL: " . mysql_error());  
mysql_select_db($dbname) or die("Помилка MySQL: " . mysql_error());  
$sql = "UPDATE content SET * WHERE id='".$id."'";
	if ($sql == 'true'){
	print "Статтю оновлено!";
	}
	else{
	print "Стаття не оновлена!!!!";
	}
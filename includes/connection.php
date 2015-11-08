<?php require_once('database_constants.php'); ?>

<?php  

// If this file is included. Include disconnection.php


//<databaseConnection>
$link = mysql_connect(SERVER, USERNAME, PASSWORD);
if(!$link)
{
	echo "ERROR CODE: 1";
	die("סליחה. יש תקלה באתר נא לנסות להיכנס שוב במועד מאוחר יותר." . mysql_error);
}

$db_select = mysql_select_db(DATABASE);
if(!$db_select)
{
	echo "ERROR CODE: 2";
	die("סליחה. יש תקלה באתר נא לנסות להיכנס שוב במועד מאוחר יותר." . mysql_error);
}
//</databaseConnection>
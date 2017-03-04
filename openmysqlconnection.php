<?php 

// mysql begin connection 
$hostnamemysql = "127.0.0.1";
$usernamemysql = "root";
$passwordmysql = "";
$tweetdatabasename = "phptweet"; // your db name

$pleaseconnect = mysql_connect($hostnamemysql,$usernamemysql,$passwordmysql) or die("Fail to connect to database!: ".mysql_error());

mysql_select_db($tweetdatabasename, $pleaseconnect) or die("No Database Selected");


// mysql complete connection


 ?>
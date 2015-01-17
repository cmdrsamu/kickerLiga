<?php
// config files

// Insert here the name of the server of your db:
$servername = "localhost";
// Databaseuser
$dbuser = "root";
// Databasename
$dbname = "kicker";
//Databasepassword
$dbpass = "root";




$db = mysql_connect ("$servername", "$dbuser", "$dbpass");
mysql_select_db ("$dbname", $db);
?>

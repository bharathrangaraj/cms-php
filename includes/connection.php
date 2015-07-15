
<?php
//open connection and select a database
require("constants.php");
error_reporting(E_WARNING|E_ERROR);
$connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
if(!$connection){
    die("cannot connect to page");
}
$db=mysql_select_db(DB_NAME,$connection);
if(!$db){
    die("cannot connect to page");
}
?>
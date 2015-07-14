
<?php
//open connection and select a database
require("constants.php");
$connection=mysql_connect(DB_SERVER,DB_USER,DB_PASS);
$db=mysql_select_db(DB_NAME,$connection);

?>
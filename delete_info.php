<?php
require_once("includes/functions.php");
include("includes/header.php");
?>


<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 19/07/15
 * Time: 6:59 PM
 */
if (intval($_GET['info']) == 0) {
    //header("location:content.php");
    //exit;

}
$id = mysql_prep($_GET['info']);

$query = "DELETE FROM information WHERE id={$id} LIMIT 1";
echo $query;
if (mysql_query($query, $connection)) {
    if (mysql_affected_rows() == 1) {
        header("location:content.php");
    } else {
        mysql_error();
        echo "<br>" . "<a href=\"content.php\">Back to home page</a>";
    }
}



?>
<?php
if (isset($connection)) {
    mysql_close($connection);
}

?>
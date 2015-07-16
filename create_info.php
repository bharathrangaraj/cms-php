
<?php
require_once("includes/functions.php");
include("includes/header.php");
?>

<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 16/07/15
 * Time: 2:18 PM
 */


if(isset($_POST['info']) && isset($_POST['visible']) && isset($_POST['position'])){
    $title=mysql_prep($_POST['info']);
    $visible=mysql_prep($_POST['visible']);
    $position=$_POST['position'];

    if(!empty($title) && !empty($visible) && !empty('$position')){
        $query= "INSERT INTO information ( menu, position, visible) VALUES ( '{$title}', '{$position}', '{$visible}')";
    }
    else{
        $query=NULL;
        header("location:new_info.php?error=\"error in execution\"");
        exit;
    }
    if(mysql_query($query,$connection)){
        header("location:content.php");
        exit;
    }
    else{
        header("location:new_info.php?error=!!error in execution");
    }
}
else{
    header("location:new_info.php?error=!!Fill all the fields");
}
?>
<?php
if(isset($connection)){
    mysql_close($connection);
}

?>
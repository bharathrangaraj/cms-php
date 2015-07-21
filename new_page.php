<<?php
require_once("includes/functions.php");
include("includes/header.php");
include("includes/form_functions.php");
?>
<?php
find_selected_page();
?>
<?php

if(intval($_GET['info'])==0){
    header("location:content.php");

}
if(isset($_POST['submit'])){
    $required_fields=array("menu","position","visible","content");
    $field_with_lengths=array("menu"=>30);

    $errors=array_merge($errors,check_required_fields($required_fields));
    $errors=array_merge($errors,check_maxlength($field_with_lengths));
    $id=mysql_prep($_POST['info']);
    $menu=trim(mysql_prep($_POST['menu']));
    $position=mysql_prep($_POST['position']);
    $visible=mysql_prep($_POST['visible']);
    $content=mysql_prep($_POST['content']);

    if(empty($errors)){
        $query= "INSERT INTO pages ( menu, position, visible, content) VALUES ( '{$title}', '{$position}', '{$visible}','{$content}')";

        if((mysql_query($query,$connection)) && (mysql_affected_rows()==1)){
            $success="information was correctly inserted";
            $new_page_id=mysql_insert_id();
            header("content.php?page={$new_page_id}");
            exit();
        }
        else{
            $error_message="insert failure";
        }

    }
}
?>

<head>

    <title>Main Content</title>
</head>
<div id="content">
    <div id="table">
        <table class="tables">
            <tr>
                <td id="nav2">

                    <?php
                    echo get_navigation1($table1, $table2);
                    ?>
                    <div id="new">
                        <a href="new_info.php">Add new information</a>
                    </div>


                </td>

                <td id="main">
                    <div id="form-content">

                        <form action="new_page.php" method="post" id="form">
                            <h2>Add page:</h2>
                            <?php $new_page="true" ?>

                            <?php include("page_template.php")?>

                            <input type="submit" name="submit" value="Create page">

                        </form><br>
                        <a href="edit_info.php?info=<?php echo $table1[0]?>">Cancel</a>
                        <div >
                            <?php
                            if (!empty($errors)) {
                                echo "<h4 class=\"error\"> You have the following errors </br>".display_errors($errors)."</h4>";
                            }
                            else {
                                echo "<h4 class=\"success\">$success</h4>";
                            }
                            ?>

                        </div>

                    </div>


                </td>

            </tr>
    </div>
    </table>
</div>
</body>

<?php
include("includes/footer.php");
?>


<?php
require_once("includes/functions.php");
include("includes/header.php");
?>
<?php
find_selected_page();
?>
<?php

if(intval($_GET['info'])==0){
 header("location:content.php");

}
if (isset($_POST['submit'])) {
    if (isset($_POST['title']) && isset($_POST['visible']) && isset($_POST['position'])) {
        $title = mysql_prep($_POST['title']);
        $visible = mysql_prep($_POST['visible']);
        $position = mysql_prep($_POST['position']);
        $id = $_POST['info'];

        if (!empty($title) && !empty($visible) && !empty($position)) {

            $error = check_error($title);


            if ($error) {


                header("location:edit_info.php?info=$id&error=The maximum length of info title is 30 characters");
                exit;
            } else {
                echo $error;
                $query = "UPDATE information  SET menu= '{$title}' , position={$position}, visible={$visible} WHERE id={$id}";
                echo $query;


            }


        } else {
            $query = NULL;
            header("location:edit_info.php?error=\"Some values are empty\"");
            exit;
        }


        if (mysql_query($query, $connection)) {
            if(mysql_affected_rows()==1){
                header("location:edit_info.php?success=Successfully updated");
                exit;
            }
            else{
                header("location:edit_info.php?success=No values changed");
            }


        } else {
            header("location:edit_info.php?error=\"error in execution 1\"");
            exit;
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

                        <form action="edit_info.php" method="post" id="form">
                            <h2>Edit things:<?php echo $table1['menu']; ?></h2>

                            <p>
                                Info Title :
                                <input type="text" name="title" value="<?php echo $table1['menu'] ?>" required><br>
                            </p>

                            <p>
                                Position:<select name="position" required>
                                    <?php
                                    $info_set = get_content_menu();
                                    $count = mysql_num_rows($info_set);
                                    for ($i = 1; $i <= $count; $i++) {
                                        echo "<option value=\"$i\"";

                                        if ($table1['position'] == $i) {
                                            echo "selected";
                                        }


                                        echo ">{$i}</option>";
                                    }
                                    ?>
                                </select>
                            </p>

                            <P>
                                Visible:

                                <input type="radio" name="visible" value="0"

                                    <?php if ($table1['visible'] == 0) {
                                        echo "checked";
                                    } ?>
                                       required>No
                                <input type="radio" name="visible" value="1"


                                    <?php if ($table1['visible'] == 1) {
                                        echo "checked";
                                    } ?>


                                       required>Yes
                            </P>
                            <input type="hidden" name="info" value="<?php echo $table1[0] ?>">

                            <input type="submit" name="submit" value="Edit Information">
                            &nbsp; &nbsp;
                            <a href="delete_info.php?info=<?php echo urlencode($table1[0]) ?>" onclick="return confirm('Do you really want to delete this?')">Delete Information</a>

                            <br><br><a href="content.php">Cancel</a>
                        </form>
                        <div >
                            <?php
                            if (isset($_GET['error'])) {
                                echo "<h4 class=\"error\">{$_GET['error']}</h4>";
                            }
                            else if(isset($_GET['success'])){
                                echo "<h4 class=\"success\">{$_GET['success']}</h4>";
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


<?php
require_once("includes/functions.php");
include("includes/header.php");
?>
<?php
find_selected_page();



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
                echo get_navigation($table1,$table2);
                ?>

                </td>

                <td id="main">
                    <div id="form-content">
                        <form action="create_info.php" method="post" id="form">
                            <h2>Add Info</h2>
                            <p>
                                Info Title :
                                <input type="text" name="info" maxlength="30"><br>
                            </p>

                            <p>
                                Position:<select name="position">
                                    <?php
                                    $info_set= get_content_menu();
                                    $count=mysql_num_rows($info_set);
                                    for ($i=$count+1;$i<=$count+3;$i++){
                                       echo " <option value=\"$i\">{$i}</option>";
                                    }
                                    ?>
                                    </select>
                            </p>

                            <P>
                                Visible:

                                <input type="radio" name="visible" value="0">No
                                <input type="radio" name="visible" value="1">Yes
                            </P>

                            <input type="submit" value="add"><br><br>

                            <a href="content.php">Cancel</a>
                        </form>
                        <div class="error">
                            <?php
                             if(isset($_GET['error'])){
                                 echo "<h4>{$_GET['error']}</h4>";
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


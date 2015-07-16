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

                    <br><br>
                    <div id="new">
                        <a href="new_info.php">Add new information</a>
                    </div>

                </td>
                <td id="main">

                    <h1 class="topic">
                        <?php
                        if(!is_null($table1)) {
                            echo $table1['menu'];
                        }elseif(!is_null($table2)) {
                            echo $table2["menu"];
                        }
                        else {
                            echo "select a menu";
                        }

                        ?>
                        <div id="contents">
                            <?php if(!is_null($table2)) {
                                $extract="contents";
                                echo "$table2[$extract]";
                            } ?>

                        </div>




                    </h1>



                </td>
            </tr>
    </div>
    </table>
</div>
</body>

<?php
include("includes/footer.php");
?>


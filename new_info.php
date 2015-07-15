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
                get_navigation($table1,$table2);
                ?>

                </td>

                <td>


                </td>

            </tr>
    </div>
    </table>
</div>
</body>

<?php
include("includes/footer.php");
?>


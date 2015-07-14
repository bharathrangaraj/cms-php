

<?php
require_once("includes/connection.php");
require_once("includes/functions.php");
include("includes/header.php");

?>




<head>

    <title>Main Content</title>
</head>
<div id="content">
    <div id="table">
        <table>
            <tr>
                <td id="nav2">
                    <?php
                    $result= mysql_query("select * from information",$connection);
                    while($row=mysql_fetch_array($result)){
                        echo $row[1]." ".$row[2]."</br>";

                    }


                    ?>


                </td>
                <td id="main">
                    <h2>Main Content</h2>
                </td>
            </tr>

    </div>




    </table>


</div>



</body>

<?php
include("includes/footer.php");
?>


<?php
require_once("includes/functions.php");
include("includes/header.php");
?>
<?php
if(isset($_GET["info"])){
    $table1=$_GET["info"];
    $table2="";
}
else if(isset($_GET["page"])){
    $table2=$_GET["page"];
    $table1="";
}
else{
    $table1="";
    $table2="";
}

?>
<head>

    <title>Main Content</title>
</head>
<div id="content">
    <div id="table">
        <table>
            <tr>
                <td id="nav2">
                    <ul class="menu">
                        <?php

                        $result=get_content_menu();
                        while($row=mysql_fetch_array($result)){

                            echo "<li> <a ";
                            if($row['id']==$table1){
                                echo "class=\"selected\"";

                            }

                                    echo "href=\"content.php?info=".urlencode($row['id'])."\"> {$row['menu']}</a></li>";
                            $result2=get_content_submenu($row[2]);
                            while($row2=mysql_fetch_array($result2)){
                                echo "<ul class=\"submenu\">";
                                echo "<li><a href=\"content.php?page=".urlencode($row2['id'])."\">{$row2['menu']}</a></li>";
                                echo "</ul>";
                            }
                        }
                        ?>
                    </ul>

                </td>
                <td id="main">
                    <h2>Main Content</h2>
                    <?php echo $table1. " ".$table2 ;?></br>
                    
                </td>
            </tr>
    </div>
    </table>
</div>
</body>

<?php
include("includes/footer.php");
?>


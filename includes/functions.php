<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 14/07/15
 * Time: 3:39 PM
 */

require_once("connection.php");


function checkset($to_check){
    if(!$to_check){
        die("cannot connect to page");
    }

}

function get_content_menu(){
    $query="select * from information ORDER BY position ASC";
    global $connection;

    $result= mysql_query($query,$connection);
    checkset($result);
    return $result;
}


function get_content_submenu($value){
    $query="select * from pages where information_id=$value ORDER BY position ASC";
    global $connection;
    $result2=mysql_query($query,$connection);
    checkset($result2);
    return $result2;
}

function get_info($information_id){
    global $connection;
    $query="SELECT *";
    $query.=" FROM information";
    $query.=" WHERE id=$information_id";
    $query.=" LIMIT 1";

    $result=mysql_query($query,$connection);
    //checkset($result);
    if($row=mysql_fetch_array($result)){
        return $row;
    }
    else{
        return NULL;
    }
}

function get_page($page_id){
    global $connection;
    $query="SELECT *";
    $query.=" FROM pages";
    $query.=" WHERE id=$page_id";
    $query.=" LIMIT 1";
    $result=mysql_query($query,$connection);
    //checkset($result);
    if($row=mysql_fetch_array($result)){
        return $row;
    }
    else{
        return NULL;
    }
}


function find_selected_page(){
    global $table1;
    global $table2;
    if(isset($_GET["info"])){
        $table1=get_info($_GET['info']);
        $table2=NULL;
    }
    else if(isset($_GET["page"])){
        $table2=get_page($_GET['page']);
        $table1=NULL;
    }
    else{
        $table1=NULL;
        $table2=NULL;
    }
}

function get_navigation($table1,$table2){
    echo "<ul class=\"menu\">";
    $result=get_content_menu();
    while($row=mysql_fetch_array($result)){
        echo "<li> <a ";
        if($row['id']==$table1['id']){
            echo "class=\"selected\"";
        }
        echo "href=\"content.php?info=".urlencode($row['id'])."\"> {$row['menu']}</a></li>";
        $result2=get_content_submenu($row[2]);
        while($row2=mysql_fetch_array($result2)){
            echo "<ul class=\"submenu\">";
            echo "<li><a ";
            if($row2['id']==$table2['id']){
                echo "class=\"selected\"";
            }
            echo " href=\"content.php?page=".urlencode($row2['id'])."\">{$row2['menu']}</a></li>";
            echo "</ul>";
        }
    }
    echo "</ul>";
}

?>


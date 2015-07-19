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
    $output= "<ul class=\"menu\">";
    $result=get_content_menu();
    while($row=mysql_fetch_array($result)){
        $output.= "<li> <a ";
        if($row['id']==$table1['id']){
            $output.= "class=\"selected\"";
        }
        $output.= "href=\"content.php?info=".urlencode($row['id'])."\"> {$row['menu']}</a></li>";
        $result2=get_content_submenu($row[2]);
        while($row2=mysql_fetch_array($result2)){
            $output.= "<ul class=\"submenu\">";
            $output.= "<li><a ";
            if($row2['id']==$table2['id']){
                $output.= "class=\"selected\"";
            }
            $output.= " href=\"content.php?page=".urlencode($row2['id'])."\">{$row2['menu']}</a></li>";
            $output.=  "</ul>";
        }
    }
    $output.=  "</ul>";

    return $output;
}


function mysql_prep($value){
    $magic_quotes_active=get_magic_quotes_gpc();
    $new_enough_php=function_exists("mysql_real_escape_string");
    if($new_enough_php){
        if($magic_quotes_active){
            $value=stripslashes($value);
        }
        $value=mysql_real_escape_string($value);
    }else{
        if(!$magic_quotes_active){
            $value=addslashes($value);
        }
    }

    return $value;
}

function get_navigation1($table1,$table2){
    $output= "<ul class=\"menu\">";
    $result=get_content_menu();
    while($row=mysql_fetch_array($result)){
        $output.= "<li> <a ";
        if($row['id']==$table1['id']){
            $output.= "class=\"selected\"";
        }
        $output.= "href=\"edit_info.php?info=".urlencode($row['id'])."\"> {$row['menu']}</a></li>";
        $result2=get_content_submenu($row[2]);
        while($row2=mysql_fetch_array($result2)){
            $output.= "<ul class=\"submenu\">";
            $output.= "<li><a ";
            if($row2['id']==$table2['id']){
                $output.= "class=\"selected\"";
            }
            $output.= " href=\"content.php?page=".urlencode($row2['id'])."\">{$row2['menu']}</a></li>";
            $output.=  "</ul>";
        }
    }
    $output.=  "</ul>";

    return $output;
}

function check_error($info){
    $max_length= array("info"=>30);

    if(strlen($info)<=$max_length['info']){
        return 0;
    }
    else{
        return 1;
    }
}

?>


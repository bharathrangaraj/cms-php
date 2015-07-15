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


?>


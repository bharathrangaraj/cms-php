<?php
require_once("includes/functions.php");
include("connection.php");
?>
<?php
/**
 * Created by PhpStorm.
 * User: bharath
 * Date: 19/07/15
 * Time: 8:05 PM
 */


function check_required_fields($fields_array){
    $field_errors=array();
    foreach($fields_array as $field){
        if(!is_int($field) && !isset($field) && empty($field)){
            $errors[]=$field;
        }

    }
    return $field_errors;
}

function check_maxlength($field_length_array){
    $field_errors=array();
    foreach($field_length_array as $field => $maxlength){
        if(strlen(trim($_POST[$field]))>$maxlength){
            $field_errors=$field;
        }
    }
    return $field_errors;
}

function display_errors($field_errors){
    echo "<p class=\"errors\">";
    echo "Review the following fields<br>";
    foreach($field_errors as $errors){
        echo "*"."$errors <br>";
    }
    echo "</p>";
}





?>
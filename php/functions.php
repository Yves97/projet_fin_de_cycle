<?php

    function checkInput($var){

    $var = trim($var);
    $var = stripslashes($var);
    $var = htmlspecialchars($var);
    return $var;
}
function checkArray($arr){
    if(array_key_exists('email',$arr) &&  $arr['email']){
        $arr['email']= email($arr['email']);
    }
    foreach($arr as $key => $val){
        $arr[$key]=checkInput($val);
    }
    return $arr;
}
function password($var){
    $var = password_hash($var,PASSWORD_DEFAULT);
    $var = md5($var);
    $var = crypt($var);
    //$var = password_verify($var);
    return $var;
}

function email($var){
    return filter_var($var,FILTER_VALIDATE_EMAIL);
}

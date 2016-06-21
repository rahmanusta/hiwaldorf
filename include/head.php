<?php

session_start();


if ($_GET['lang']){
	$lang = $_GET['lang'];
    $_SESSION['lang']= $_GET['lang'];
}
else {
    if(isset($_SESSION['lang']))
        $lang = $_SESSION['lang'];
    else {
        $_SESSION['lang']='cn';
        $lang = 'cn';
    }
}

switch($lang){
	case 'en':
		$langChoice='cn';
    break;
	case 'cn':
		$langChoice='en';											
    break;
}

include_once $lang.'.php';
include_once 'seo_'.$lang.'.php';

$host     = $_SERVER['HTTP_HOST'];
$script   = $_SERVER['SCRIPT_NAME'];
$params   = $_SERVER['QUERY_STRING'];
 

$currentUrl = 'http://' . $host . $script;


 ?>

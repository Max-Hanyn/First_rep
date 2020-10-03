<?php

session_start();
if (empty($_SESSION['user'])){
    $_SESSION['user']['roleId'] = 0;
}
if ($_GET['url'] == ''){
    $_GET['url'] = '/';
}

include 'autoload.php';
include 'Routes/Routes.php';
//$user = new UserProfileModel();
//$user->search(1);
//
//
//
//$array1 = [0=>[0=>['1']],1=>[2=>['232']],2=>[0=>['1']],0=>[0=>['1']],];
//print_r(array_unique($array1));
//$input = array("a" => "green", "red", "b" => "green", "blue", "red");
//$result = array_unique($input);
//print_r($result);
<?php

session_start();
if (empty($_SESSION['user'])){
    $_SESSION['user']['roleId'] = RolesModel::ROLE_GUEST_ID;
}
if ($_GET['url'] == ''){
    $_GET['url'] = '/';
}

include 'autoload.php';
include 'Routes/Routes.php';



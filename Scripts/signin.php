<?php
session_start();
include "connection.php";

$email = trim($_POST['email']);
$password = md5(trim($_POST['password']));

$check_data = mysqli_query( $link, "SELECT * FROM users_pofiles WHERE user_id = (SELECT user_id FROM users WHERE email = '$email' AND password = '$password')" );
$user = mysqli_fetch_assoc($check_data);
//echo @count($user);
if(@count($user) > 0) {
    $_SESSION['user'] = $user;
    header("Location: ../profile.php");
}else {
    $_SESSION['wrongData'] = true;
    header('Location: http://phpteam.test/');
}

<?php
session_start();
include "connection.php";
$first_name = trim($_POST['first_name']);
$second_name = trim($_POST['second_name']);
$number = trim($_POST['number']);
$adress = trim($_POST['adress']);
$id = $_SESSION['user']['user_id'];
//echo $first_name;
$query = mysqli_query($link, "UPDATE users_pofiles
SET first_name = '$first_name', second_name = '$second_name', number = '$number', adress = '$adress'
WHERE user_id = '$id'");
$check_data = mysqli_query( $link, "SELECT * FROM users_pofiles WHERE user_id = '$id'" );
$user = mysqli_fetch_assoc($check_data);
//print_r($user);
$_SESSION['user'] = $user;

 header("Location: ../profile.php");
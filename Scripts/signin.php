<?php

$users = [
"maxhanyn@ukr.net" => [
"firstName" => "Max",
"secondName" => "Hanyn",
"password" => "12345"
],

"katok@ukr.net" => [
"firstName" => "Andriy",
"secondName" => "Katok",
"email" => "katok@ukr.net",
"password" => "qwer"
],

"kostyk@ukr.net" => [
"firstName" => "Anton",
"secondName" => "Kostyk",
"email" => "kostyk@ukr.net",
"password" => "kostyk"
]
];


    $email = $_POST['email'];
    $password = $_POST['password'];
$query = http_build_query($_POST);
    if ($users[$email] && $users[$email]['password'] == $password) {
        header('Location: profile.php'."?".$query);
        exit();
    }
    if (!$users[$email]) {
        $isEmailValid = true;

    }
    if ($users[$email]['password'] != $password) {
        $isPasswordValid = true;
    }

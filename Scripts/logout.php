<?php
session_start();
unset($_SESSION['user']);
unset($_COOKIE);
header('Location: http://phpteam.test/');
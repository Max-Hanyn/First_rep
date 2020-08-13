<?php
session_start();
class Controller
{
public function View($viewName){
    include "Views/$viewName.php";
}
public function database(){
    return $link = mysqli_connect('localhost', 'root', '','users_info');
}
}
<?php

class App
{
    public function start()
    {
//        print_r($_GET);
//        echo "<br>";
        if ($_GET['url']=='index.php') {
            echo "Home Page";
        } else {
            $url = explode("/", $_GET['url']);
//             else {
            $controller = $url[0] . "Controller";
            if (file_exists("Controllers/$controller.php")) {
                include "Controllers/$controller.php";
                $cont = new $controller;
                if (empty($url[1])) {
                    $cont->indexAction();
                } else {
                    $action = $url[1] . "Action";
                    $cont->$action($url[2]);
                }
            } else {
                echo "This page doest exist";
            }
        }
    }

//    }
}
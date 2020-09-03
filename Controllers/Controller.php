<?php
session_start();
class Controller
{
    public function view($viewName){
        $test = "hello";

        include "Views/$viewName.php";
    }
    public function checkUserRole($checkRole){
        if (!empty($_SESSION['user']['role'])){
            foreach ($_SESSION['user']['role'] as $role){
                if ($role == $checkRole){
                    return true;
                }
        }

      }
      Route::redirect('forbidden');
    }
    public function isLoggedOut(){
        if(empty($_SESSION['user'])) {
            Route::redirect('login');
        }
    }
    public function isLoggedIn(){
        if(!empty($_SESSION['user'])) {
            Route::redirect('profile');
        }
    }

}
<?php
session_start();
class Controller
{
    public function view($viewName,array $data = null){
        if ($data){

            foreach ($data as $variable){

              $key = array_search($variable,$data);
              $$key = $variable[0];

        }}

        $pageData = $data;
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
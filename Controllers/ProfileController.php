<?php
//session_start();
class ProfileController extends Controller {

    public function __construct()
    {
//        $this->isLoggedOut();
//        $this->checkUserRole('user');

    }

    public function index($id){
        $checkUser = new AuthService();
        $checkUser->checkUserProfile($id);
//        echo '1';
        $this->view('profile');
    }
    public function logout(){
        $_SESSION['user'] = [];
        Route::redirect('login');
    }
    public function check($id){
        echo $id;
    }

    public function checkUser($id,$name){
        echo $id,$name;
    }
}
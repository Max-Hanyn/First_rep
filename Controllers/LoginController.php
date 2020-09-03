<?php
//session_start();

class LoginController extends Controller
{
    public function __construct()
    {
//        $this->isLoggedIn();
    }

    public function index(){

}
public function login(){
    if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = md5(trim($_POST['password']));
    $userModel = new UserModel();

      $user = $userModel->getUser($email,$password);

//      print_r($user);
//      exit();
    if($user){
//        $user = $userModel->getById($userId);
        $_SESSION['user']['id'] = $user['id'];
        if ($user['verified'] == null){
            Route::redirect('verify');
        }
        $_SESSION['user']['roleId'] = $user['role_id'];
        Route::redirect("profile");

    }else{
        $_SESSION['wrongData'] = true;
        Route::redirect('login');


    }


}
    $this->View('login');
    }
}
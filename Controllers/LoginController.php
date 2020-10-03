<?php

class LoginController extends Controller
{

    public function __construct()
    {
        $this->isLoggedIn();
    }


    public function login()
    {

        if (isset($_POST['submit'])) {
            $email = trim($_POST['email']);
            $password = md5(trim($_POST['password']));
            $userModel = new UserModel();
            $user = $userModel->getUser($email, $password);

            if ($user) {
                $userId = $user[0]['id'];
                $_SESSION['user']['id'] = $userId;
                if ($user[0]['verified'] == null) {
                    Route::redirect('verify');
                }
                $_SESSION['user']['roleId'] = $user[0]['role_id'];
                Route::redirect("profile/$userId");

            } else {
                $_SESSION['wrongData'] = true;
                Route::redirect('login');

            }

        }
        $this->View('login');
    }
}
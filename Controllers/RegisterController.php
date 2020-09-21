<?php

class   RegisterController extends Controller
{
    public function __construct()
    {
        $this->isLoggedIn();
    }

    public function registration()
    {

        if (isset($_POST['submit'])) {

            $first_name = trim($_POST['firstName']);
            $second_name = trim($_POST['secondName']);
            $email = trim($_POST['email']);
            $password = md5(trim($_POST['password']));

            if (!ctype_alpha($first_name) || !ctype_alpha($second_name) || empty($email) || empty($password)) {

                $_SESSION['incorrectData'] = true;
                Route::redirect("register");
            }

            $userModel = new UserModel();
            $checkEmail = $userModel->checkUser($email);


            if ($checkEmail == null) {

                $authService = new AuthService();
                $newUserId = $authService->createNewUser($first_name,$second_name,$email, $password);
                $_SESSION['user']['id'] = $newUserId;

                Route::redirect("verify");


            } else {

                $_SESSION['emailExists'] = true;
                Route::redirect("register");
            }
        }
        $this->View('register');
    }
}
<?php
//session_start();

//use Services\AuthService as Auth;

class   RegisterController extends Controller
{
    public function __construct()
    {
//        $this->isLoggedIn();
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
//            print_r($checkEmail);

            if ($checkEmail == null) {

                $authService = new AuthService();
                $newUserId = $authService->createNewUser($first_name,$second_name,$email, $password);
                $_SESSION['user']['id'] = $newUserId;
//                $_SESSION['user']['role'] = [RolesModel::ROLE_USER_ID];
//                $_SESSION['user']['verified'] = false;
//                print_r($_SESSION);
                Route::redirect("verify");
//                if (mysqli_query($link, $query)) {
//                    Route::redirect("");
//                    $_SESSION['registersuccessful'] = true;
//                } else {
//                    echo "Error: " . $query . "<br>" . mysqli_error($link);
//                }
//                $get_user_id = mysqli_fetch_assoc(mysqli_query($link, "SELECT user_id FROM users WHERE ( email = '$email' AND password = '$password')"));
//                $id = $get_user_id['user_id'];
//                $query = mysqli_query($link, "INSERT INTO users_pofiles (first_name , second_name, user_id) VALUES ('$first_name' , '$second_name' , '$id')")
            } else {

                $_SESSION['emailExists'] = true;
                Route::redirect("register");
            }
        }
        $this->View('register');
    }
}
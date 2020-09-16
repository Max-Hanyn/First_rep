<?php
session_start();

class VerifyController extends Controller
{

    public function index(){

//        print_r($_SESSION);
        $this->view('verify');
    }
    public function verify($token){

        $user = new UserModel();
        $userData = $user->select()->where('token',$token)->execute();

//        print_r($userData);
//        print_r($userData);
        if ($userData){

//            print_r($_SESSION);
//            echo "!";
            $user->update(['verified'=>'1','token'=> "null"])->where('token',$token)->execute();
            $userId = $userData[0]['id'];

            if ($_SESSION['user']['roleId'] == RolesModel::ROLE_ADMIN_ID){
                Route::redirect("admin");
            }
            Route::redirect("profile/$userId");

        }

    }
    public function resent(){
        $user = new UserModel();
        $id = $_SESSION['user']['id'];
//        echo $id;
        $userData = $user->select()->where('id',$id)->execute();
//        print_r($userData);
        $email = $userData[0]['email'];
        $token = $userData[0]['token'];
//        echo $token;
//        exit();
//        echo $email;
//        print_r($_SESSION);
        EmailVerifyService::sendMailVerification($email,$token);
        Route::redirect('verify');

    }
}
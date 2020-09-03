<?php


//namespace Services;


class AuthService
{
    /**
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public static function createNewUser($email,$password){

        $newUser = new UserModel();
        $token = EmailVerifyService::createToken();
        EmailVerifyService::sendMailVerification($email,$token);
        return $newUser->addUser($email,$password,$token);
    }




    public function checkUserProfile($profileId){

        if ($_SESSION['user']['id'] == $profileId ){
            return true;
        } else {
            Route::redirect("forbidden");
        }
    }
    public static function loggedIn(){
        if($_SESSION['user']){
            return true;
        }else {

        }

    }
}
<?php


//namespace Services;


class AuthService
{
    /**
     * @param string $email
     * @param string $password
     * @return mixed
     */
    public static function createNewUser($firstName,$secondName,$email,$password){
        $userProfileMode = new UserProfileModel();

        $newUser = new UserModel();
        $token = EmailVerifyService::createToken();
        EmailVerifyService::sendMailVerification($email,$token);
        $id = $newUser->addUser($email,$password,$token);
        $userProfileMode->insert(['first_name' => $firstName,'second_name' => $secondName, 'user_id' => $id])->execute();
        return $id;

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

            Route::redirect('login');

        }

    }
}
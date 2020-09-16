<?php
//session_start();
class ProfileController extends Controller {

    public function __construct()
    {
        AuthService::loggedIn();
//        echo "!";
//        $this->isLoggedOut();
//        $this->checkUserRole('user');

    }

    public function index($id){

      $profileModel = new UserProfileModel();
      $profileData = $profileModel->getProfile($id);
      $roleModel = new RolesModel();
      $role = $roleModel->getUserRole($id);
      $checkUser = new AuthService();
      $checkUser->checkUserProfile($id);

      return $this->view('profile',$profileData[0]);
    }
    public function logout(){
//        echo "!";
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
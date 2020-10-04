<?php

class ProfileController extends Controller {

    public function __construct()
    {
        $this->isLoggedOut();

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

        $_SESSION['user'] = [];
        Route::redirect('login');
    }


    public function skills($id){
        $userSkills = new UserSkillsModel();
        $skills = $userSkills->getUserSkills($id);


        return $this->view('profileSkills',['skills'=>[$skills],'id'=>[$id]]);

    }

}
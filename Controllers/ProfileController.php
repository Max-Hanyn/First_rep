<?php
//session_start();
class ProfileController extends Controller {

    public function __construct()
    {
        AuthService::loggedIn();

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

    public function skills($id){
        $userSkills = new UserSkillsModel();
        $skills = $userSkills->getUserSkills($id);


        if(isset($_GET['name'])){
//            echo "1";
            $name = $_GET['name'];
            $level = $_GET['level'];
            $language = $_GET['language'];
            $userId = $id;
            $userSkills->addSkill($name, $level, $language, $userId);
            $last = $userSkills->getLastInsert($id);
            $_SESSION['last'] = $last;
            echo $last[0]['id'];
            $_GET['name'] = null;
            return;

        }
        if(isset($_GET['id1'])){
//            echo "1";
            $idSkill = $_GET['id1'];
            $name = $_GET['name1'];
            $level = $_GET['level1'];
            $language = $_GET['language1'];
            $userId = $id;
            $userSkills->updateSkill($name,$level,$language,$idSkill);
            return;

        }
        if (isset($_POST['idToDelete'])){
            $userSkills->delete()->where('id',$_POST['idToDelete'])->execute();
            return;

        }

        return $this->view('profileSkills',['skills'=>[$skills],'id'=>[$id]]);

    }
    public function add(){
        print_r($_GET);
    }
}
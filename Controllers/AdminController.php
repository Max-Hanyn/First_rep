<?php


class AdminController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        $userModel = new UserModel();

        $rolesModel = new RolesModel();
        $roles = $rolesModel->select()->execute();
        $users = $userModel->select('users.id,email,token,verified,name')->innerJoin('roles', 'id', 'role_id')->execute();
        $this->view('adminPage', ['users' => [$users], 'roles' => [$roles]]);

    }

    public function edit($id)
    {
        $userProfileModel = new UserProfileModel();
        $massage = [];
        if (isset($_POST['submit'])) {

            $firstName = $_POST['first_name'];
            $secondName = $_POST['second_name'];
            $number = $_POST['number'];
            $adress = $_POST['adress'];
            $userProfileModel->update(['first_name' => $firstName, 'second_name' => $secondName, 'number' => $number, 'adress' => $adress])->where('user_id', $id)->execute();
            $massage[] = ['edited' => true];

        }


        $user = $userProfileModel->getProfile($id);
        $this->view('adminEdit', ['user' => $user, 'massage' => $massage]);
    }

    public function changeRole()
    {
        $userModel = new UserModel();
        $userModel->update(['role_id' => $_POST['role']])->where('id', $_POST['userId'])->execute();
        Route::redirect('admin');

    }

    public function get(){
        $userModel = new UserModel();
        $rolesModel = new RolesModel();
        $roles = $rolesModel->select()->execute();
        $users = $userModel->select('users.id,email,token,verified,name')->innerJoin('roles', 'id', 'role_id')->execute();
        $response = ['roles' => $roles,'users' => $users];
        echo json_encode($response);
        return;
    }
    public function search(){

        $userModel = new UserProfileModel();
        $rolesModel = new RolesModel();
        $roles = $rolesModel->select()->execute();
        $users = $userModel->search($_POST['search']);
        $response = ['roles' => $roles,'users' => $users];
        echo json_encode($response);
        return;

    }
}
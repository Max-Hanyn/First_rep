<?php


class UserListController extends Controller
{

    public function index(){
        $userModel = new UserModel();
        $users = $userModel->select('users.id,email,token,verified,name')->innerJoin('roles','id','role_id')->execute();
        return $this->view('usersList',['users' =>[$users]]);
    }
}
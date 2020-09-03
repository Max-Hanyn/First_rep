<?php
session_start();

class VerifyController extends Controller
{

    public function index(){

        $this->view('verify');
    }
    public function verify($token){

        $user = new UserModel();
        $userData = $user->select()->where('token',$token)->execute();

        if ($userData){

            $user->update(['verified'=>'1','token'=> "null"])->where('token',$token)->execute();

        }

    }
    public function resent(){

    }
}
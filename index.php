<?php

session_start();
if (empty($_SESSION['user'])){
    $_SESSION['user']['roleId'] = '0';
}
if ($_GET['url'] == ''){
    $_GET['url'] = '/';
}
//print_r($_SESSION);
//exit();
include 'autoload.php';
include 'Routes/Routes.php';
//$user = new UserModel();
//$role_id = '123gf';
//$users = $user->select('id,email')->where('role_id',$role_id)->execute();
//print_r($users);
////$user->update(['verified'=>'1','password'=>'pass','token' => '0','email' => 'email'],'43');
////print_r($user->insert(['email'=>'test','password'=>'qwer','token'=>'1234qwer'])->execute());
//$_SESSION['count'] = $_SESSION['count']+1;
//echo $_SESSION['count'];
//exit();

//Route::set('login', 'LoginController.login');
//Route::set('register', 'RegisterController.index');
//Route::set('profile', 'RegisterController.index');
//include "Controllers/App.php";
//$app = new App;
//$app->start();

//$insert = ['id'=>"15",'verify'=>'1'];
////foreach ($insert as $Ins){
////    print_r($Ins);
////}
////print_r($insert);
////test(['verify'=>'1'],'35');
////function test(array $data,$where){
////    print_r($data);
////    $insert = "";
////
////    $values = '';
////    foreach ($data as $datum) {
////
////        $values.= ':'.$datum .",";
////        $insert.= ','. array_search($datum,$data);
////        $sql = ("UPDATE `` ($insert) VALUES ($values WHERE ())");
////    }
//    test(['verify'=>'1','password'=>'pass'],'35');
//    function test(array $data,$where){
////        print_r($data);
//        $insert = "";
//
////        $values = '';
//        foreach ($data as $datum) {
//
////            $values.= ':'.$datum .",";
//            $insert.= array_search($datum,$data)."=:". array_search($datum,$data) . ",";
//
//        }
//    $insert = substr($insert, 0,-1);
//        $sql = ("UPDATE `` SET {$insert} WHERE (id = $where))");
////    $values = ltrim($values,',');
////    $values = substr($values, 0,-1);
//    echo $insert;
//////   echo "    ";
//////    echo $values;
////    $input = function (){
////
////    };
////    $values = function (){
////
////    };
//
//    $sql = ("INSERT INTO `` () VALUES ()");
//}


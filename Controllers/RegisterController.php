<?php
class RegisterController extends Controller
{
    public function indexAction(){
        $this->View('register');
    }


    public function RegistrationAction(){
        $link= $this->database();
        $first_name = trim($_POST['firstName']);
        $second_name = trim($_POST['secondName']);
        if(!ctype_alpha($first_name)) {
            $_SESSION['onlyLettersName'] = true;
            header('Location: http://phpteam.test/register');
        }
        if(!ctype_alpha($second_name)){
            $_SESSION['onlyLettersSecondName'] = true;
            header('Location: http://phpteam.test/register');
        }


        $email  = trim($_POST['email']);
        if (empty($email)){
            header('Location: http://phpteam.test/register');
        }
        $password = md5(trim($_POST['password']));
        $check_email = mysqli_query( $link, "SELECT COUNT('email') as count FROM `users` WHERE ( `email` = '$email' )" );
        $count = mysqli_fetch_assoc($check_email);
        if($count['count'] == 0) {
            $query = "INSERT INTO users (email , password) VALUES ('$email' , '$password')";

            if(mysqli_query($link,$query)){
                header('Location: http://phpteam.test/');
                $_SESSION['registersuccessful'] = true;
            }else{
                echo "Error: " . $query . "<br>" . mysqli_error($link);
            }
            $get_user_id =   mysqli_fetch_assoc(mysqli_query( $link, "SELECT user_id FROM users WHERE ( email = '$email' AND password = '$password')" ));
            $id = $get_user_id['user_id'];
            $query = mysqli_query( $link, "INSERT INTO users_pofiles (first_name , second_name, user_id) VALUES ('$first_name' , '$second_name' , '$id')");
        }else{
            $_SESSION['emailExists'] = true;
            header('Location: http://phpteam.test/register');
        }

    }
}
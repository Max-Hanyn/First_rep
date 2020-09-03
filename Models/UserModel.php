<?php


class UserModel extends ModelBase
{
    protected function getTable()
    {
        return "users";
        // TODO: Implement getTable() method.
    }

    /**
     * @param String $email
     * @return mixed
     */
    public function checkUser(String $email)
    {
        $sql = ("SELECT id FROM `{$this->getTable()}` WHERE ( `email` = :email )");
        $query = $this->link->prepare($sql);
        $query->execute([':email' => $email]);
        return $query->fetch(PDO::FETCH_ASSOC)['id'];

    }
    public function addUser($email,$password,$token){

        $this->insert(['email'=>$email,'password'=>$password,'token'=>$token])->execute();
        return $this->link->lastInsertID();


    }
    public function getUser($email,$password){
        return $this->select()->where("email", $email , "password", $password)->execute();
//        $sql = ("SELECT id FROM `{$this->getTable()}` WHERE ( `email` = :email AND `password` =:password)");
//        $query = $this->link->prepare($sql);
//        $query->execute([
//            ':email' => $email,
//            ':password'=>$password
//            ]);
//        return $query->fetch(PDO::FETCH_ASSOC)['id'];
    }

}
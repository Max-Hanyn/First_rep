<?php


class UserProfileModel extends ModelBase
{

    protected function getTable()
    {
        return 'users_pofiles';
    }

    public function getProfile($id){

       return $this->select()->innerJoin('users','id','user_id')->where('id',$id)->execute();

    }
    public function search($search){
        $sql = ("SELECT DISTINCT users.email, users.id, users.role_id, users.verified, roles.name FROM `users` LEFT JOIN users_skills 
        ON users.id = users_skills.user_id JOIN roles ON users.role_id = roles.id
        WHERE users.email LIKE '%$search%'
        OR users.id LIKE '%$search%' 
        OR roles.name LIKE '%$search%' 
        OR users_skills.level LIKE '%$search%'
        OR users_skills.name LIKE '%$search%'
        OR users_skills.language LIKE '%$search%'
");
        $query = $this->link->prepare($sql);
        $query->execute();
        return $query->fetchall();
//        echo '<pre>';
//        print_r($query->fetchall());
//        echo '</pre>';
    }
}
//SELECT DISTINCT users.email, users.id, users.role_id, users.verified FROM `users` JOIN users_skills
//        ON users.id = users_skills.user_id JOIN roles ON users.role_id = roles.id
//        WHERE users.email LIKE '%$search%'
//        OR users.id LIKE '%$search%'
//        OR users_skills.level LIKE '%$search%'
//        OR users_skills.name LIKE '%$search%'
//        OR users_skills.language LIKE '%$search%'
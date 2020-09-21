<?php


class UserSkillsModel extends ModelBase
{
    protected function getTable()
    {
        return "users_skills";
        // TODO: Implement getTable() method.
    }

    public function addSkill($name, $level, $lang, $userId){
        $this->insert(['name'=>$name,'level'=>$level,'language'=>$lang,'user_id'=>$userId])->execute();
        return $this->link->lastInsertID();
    }
    public function getUserSkills($id){
        return $this->select('users_skills.id , users_skills.name , users_skills.level, users_skills.language')->innerJoin('users','id','user_id')->where('users.id',$id)->execute();
    }
    public function updateSkill($name, $level, $lang, $id){
      $this->update(['name'=>$name,'level'=>$level,'language'=>$lang])->where('id',$id)->execute();
    }
    public function getLastInsert($id){
        $sql = "SELECT * FROM `users_skills` WHERE id = (SELECT MAX(ID) FROM users_skills)";
        $query = $this->link->prepare($sql);
        $query->execute();
        return $query->fetchall();
    }




}
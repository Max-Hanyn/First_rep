<?php


class UserSkillsController
{

    public function add($id){

        $userSkills = new UserSkillsModel();
        $name = $_POST['name'];
        $level = $_POST['level'];
        $language = $_POST['language'];
        $userId = $id;
        $userSkills->addSkill($name, $level, $language, $userId);
        $last = $userSkills->getLastInsert($id);
        print_r(json_encode(['lastInsertId'=> $last[0]['id']]));
        return;
    }

    public function edit(){

        $userSkills = new UserSkillsModel();
        $idSkill = $_POST['id'];
        $name = $_POST['name'];
        $level = $_POST['level'];
        $language = $_POST['language'];
        $userSkills->updateSkill($name,$level,$language,$idSkill);
        return print_r(json_encode($_POST));
    }

    public function delete(){

        $userSkills = new UserSkillsModel();
        $userSkills->delete()->where('id',$_POST['idToDelete'])->execute();
        return;
    }


}
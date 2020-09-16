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
}
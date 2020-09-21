<?php


class Roles
{
private function getRole($roleId){
    $roles = [
        RolesModel::ROLE_GUEST_ID => [RolesModel::ROLE_GUEST_ID],
        RolesModel::ROLE_ADMIN_ID => [RolesModel::ROLE_ADMIN_ID,RolesModel::ROLE_USER_ID,RolesModel::ROLE_GUEST_ID],
        RolesModel::ROLE_USER_ID => [RolesModel::ROLE_USER_ID,RolesModel::ROLE_GUEST_ID],
        RolesModel::ROLE_MODERATOR_ID => [RolesModel::ROLE_MODERATOR_ID,RolesModel::ROLE_USER_ID,RolesModel::ROLE_GUEST_ID],
        ];
    return $roles[$roleId];
}

    static public function checkRole($role)
    {
//        print_r($_SESSION);
////        exit();


        $roles = (new Roles)->getRole( $_SESSION['user']['roleId']);


        foreach ($roles as $permission) {
            if ($permission == $role) {




                return true;
            }


        }
        return false;
    }

}
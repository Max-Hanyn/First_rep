<?php


class UsersRolesModel extends ModelBase
{
    protected function getTable()
    {
        return "users_roles";
        // TODO: Implement getTable() method.
    }

    public function setRole($userId, $roleId)
    {
        $sql = ("INSERT INTO users_roles (user_id,role_id) VALUES (:userId,:roleId) ");
        $query = $this->link->prepare($sql);
        $query->execute([
            ':userId' => $userId,
            ':roleId' => $roleId
        ]);
    }

    public function checkRole($userId, $role)
    {
        $roleModel = new RolesModel();
        $roleId = $roleModel->getRoleByName($role);
        $sql = ("SELECT COUNT(`user_id`) as count FROM `users_roles` WHERE ( `role_id` = :role AND `user_id` = :user)");
        $query = $this->link->prepare($sql);
        $query->execute(
            [':role' => $userId,
                ':user' => $roleId
            ]);
        if ($query->fetch(PDO::FETCH_ASSOC)['count'] >= 1) {
            return true;
        }
        return false;
    }

    public function getRole($userId)
    {
        $sql = ("SELECT role_id FROM `users_roles` WHERE (`user_id` = :user)");
        $query = $this->link->prepare($sql);
        $query->execute([':user' => $userId]);
        return $query->fetchall(PDO::FETCH_COLUMN);
    }
}
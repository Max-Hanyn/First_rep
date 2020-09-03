<?php
//namespace Models;

class RolesModel extends ModelBase
{
    const ROLE_USER_ID = 2;
    const ROLE_ADMIN_ID = 1;
    protected function getTable()
    {
        return "roles";
        // TODO: Implement getTable() method.
    }

    public function getRoleByName($roleName)
    {

        $sql = ("SELECT id FROM `roles` WHERE ( `name` = :name )");
        $query = $this->link->prepare($sql);
        $query->execute([':name' => $roleName]);
        return $query->fetch(PDO::FETCH_ASSOC)['id'];

    }

    public function getRoleById($roleId)
    {
        $sql = ("SELECT `name` FROM `roles` WHERE ( `id` = :id )");
        $query = $this->link->prepare($sql);
        $query->execute([':id' => $roleId]);
        return $query->fetch(PDO::FETCH_ASSOC)['name'];
    }
}
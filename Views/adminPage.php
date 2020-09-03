<?php
include "layouts/header.php";
$userModel = new UserModel();
$userRolesModel = new UsersRolesModel();
$roleModel = new RolesModel();
echo $test;

?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">email</th>
        <th scope="col">roles</th>
    </tr>
    </thead>
    <tbody>

        <?php
//        $allUsers = $userModel->getAllUsers();
        $allUsers = $userModel->getById(35);
        print_r($allUsers);
        foreach ($allUsers as $user){

            ?>
        <tr>
            <td scope="row"><?= $user ?></td>
            <td><?= $user ?></td>
            <td><?php
//                $roles = $userRolesModel->getRole($user['id']);
//                foreach ($roles as $role) {
//                    echo $roleModel->getRoleById($role)." ";
//
//                }
                ?></td>
        </tr>
            <?php
        }
        ?>



    </tbody>
</table>

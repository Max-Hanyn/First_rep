<?php
include "layouts/header.php";
?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">email</th>
        <th scope="col">verification</th>
        <th scope="col">role</th>
    </tr>
    </thead>
    <tbody>

        <?php

        foreach ($users as $user){
            ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?php if($user['verified']){
                echo 'verefied';
                }else{
                ?>
                    <a href="verify/<?php echo $user['token']; ?>">Verify</a>
                <?php

                }   ?></td>
            <td><?= $user['name'] ?>
                <?php
                if ($_SESSION['user']['roleId'] == RolesModel::ROLE_ADMIN_ID){


                ?>
                <form action="admin/changerole" method="post">
                    <p><select size="3"  name="role">
                            <option disabled>Roles</option>

                            <?php
                            foreach ($roles as $role){
                            ?>
                            <option value="<?=$role['id'] ?>"><?=$role['name'] ?>

                                <?php
                                }
                                ?>
                                <input type="hidden" name="userId" value="<?=$user['id'] ?>"">
                        </select></p>
                    <p><input type="submit" value="Add role"></p>
                </form>
                <?php
                }
                ?>

            </td>
            <td><a href="admin/edit/<?php echo $user['id'] ?>">Edit</a></td>
        </tr>
            <?php
        }
        ?>



    </tbody>
</table>

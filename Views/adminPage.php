<?php
include "layouts/header.php";
include "layouts/navigataion.php";

?>
<head>
    <link rel="stylesheet" href="/Views/styles/adminPage.css">
</head>
<script src="/Views/js/adminPage.js"> </script>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="search">
                        <label for="search">Search</label>
                        <input type="text"  id="search">
                    </div>
                </div>
                <div class="card-body">
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

                        foreach ($users as $user) {
                            ?>
                            <tr>
                                <td><?= $user['id'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?php if ($user['verified']) {
                                        echo 'verefied';
                                    } else {
                                        ?>
                                        <a href="verify/<?php echo $user['token']; ?>">Verify</a>
                                        <?php

                                    } ?></td>
                                <td><?= $user['name'] ?>
                                    <?php
                                    if (Roles::checkRole(RolesModel::ROLE_ADMIN_ID)) {


                                        ?>
                                        <form action="admin/changerole" method="post">
                                            <p><select size="3" name="role">
                                                    <option disabled>Roles</option>

                                                    <?php
                                                    foreach ($roles

                                                    as $role){
                                                    ?>
                                                    <option value="<?= $role['id'] ?>"><?= $role['name'] ?>

                                                        <?php
                                                        }
                                                        ?>
                                                        <input type="hidden" name="userId" value="<?= $user['id'] ?>"">
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
                </div>
            </div>
        </div>
    </div>
</div>
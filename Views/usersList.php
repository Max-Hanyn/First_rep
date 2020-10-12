<?php
include "layouts/header.php";
include "layouts/navigataion.php";
?>
<table class="table">
    <thead>
    <tr>

        <th scope="col">email</th>
        <th scope="col">verification</th>
        <th scope="col">role</th>
        <th scope="col">skills</th>
    </tr>
    </thead>
    <tbody>

    <?php

    foreach ($users as $user){
        ?>
        <tr>

            <td><?= $user['email'] ?></td>
            <td><?php if($user['verified']){
                    echo 'verefied';
                }else{
                echo 'not verefied';
                }
                    ?>
                   </td>
            <td><?= $user['name'] ?></td>
            <td><a href="profile/<?php echo $user['id'] ?>/skills">Skills</a></td>

        </tr>
        <?php
    }
    ?>



    </tbody>
</table>
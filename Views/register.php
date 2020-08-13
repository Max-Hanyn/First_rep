<?php
session_start();
if($_SESSION['user']){
    header('Location: ../profile');
}
?>
<?php include "layouts/header.php"; ?>

<body>

<div class="container">
    <form action="/register/registration" method="post">
        <div class="form-group">
            <label for="firstName">First name</label>
            <input name="firstName"  type="text" class="form-control" id="firstName">
            <?php
            if($_SESSION['onlyLettersName']){
                ?>
                <small class = "form-text text-danger"> Name must consist only letters!</small>
                <?php
                $_SESSION['onlyLettersName'] = false;
            }
            ?>
        </div>
        <div class="form-group">
            <label for="secondName">Second name</label>
            <input name="secondName"  type="text" class="form-control" id="secondName">
            <?php
            if($_SESSION['onlyLettersSecondName']){
                ?>
                <small class = "form-text text-danger"> Second name must consist only letters!</small>
                <?php
                $_SESSION['onlyLettersSecondName'] = false;
            }
            ?>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input name="email"  type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <small class="form-text text-muted">Please, input your email!</small>
            <?php
            if($_SESSION['emailExists']){
                ?>
                <small class = "form-text text-danger"> Email already exists!</small>
                <?php
                $_SESSION['emailExists'] = false;
            }
            ?>
                   </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input name="password"  type="password" class="form-control" id="password">
                  </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
    </form>
</div>

</body>
</html>

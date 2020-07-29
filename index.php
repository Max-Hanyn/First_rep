<?php
session_start();
if($_SESSION['user']){
    header('Location: ../profile.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <form action="Scripts/signin.php" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email"  type="email" class="form-control" id="email" aria-describedby="emailHelp">
                <small class="form-text text-muted">Please, input your email!</small>
                <?php
                if($_SESSION['email']){
                    ?>
                <small class = "form-text text-danger"> Your email is invalid!</small>
                <?php
                }
                $_SESSION['email'] = false;
                ?>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input name="password"  type="password" class="form-control" id="password">
                <?php
                if($_SESSION['password']){
                    ?>
                    <small class = "form-text text-danger"> Your password is invalid!</small>
                    <?php
                    $_SESSION['password'] = false;
                }
                ?>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            <a style="text-decoration: none;" href="register.php">Registration</a>
        </form>
    </div>

</body>
</html>


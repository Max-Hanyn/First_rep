
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</head>
<body>
<?php
if (isset($_POST['done'])){
    $email =$_POST['email'];
    echo "<div class='container-fluid text-center mt-5'> Hello, $email </div>";

}else{

?>
    <div class="container">
        <form action="" method="post">
            <div class="form-group">
                <label for="email">Email address</label>
                <input name="email"  type="email" class="form-control" id="email" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">Please, input your email!</small>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password">
            </div>
            <button type="submit" class="btn btn-primary" name="done">Submit</button>
        </form>    </div>
<?php
}
?>
</body>
</html>


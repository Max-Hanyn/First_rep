<?php
include "layouts/header.php";
include "layouts/navigataion.php";
?>
<?php if ($massage['edited'])
{

?>
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Edited</strong>
    </div>
<?php
}
?>

<form action="" method="post">
    <div class="form-group">
        <label for="exampleInputEmail1">First name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name = "first_name" aria-describedby="emailHelp" value="<?=$user['first_name'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Second name</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name = "second_name" aria-describedby="emailHelp" value="<?=$user['second_name'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Address</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name ="adress" aria-describedby="emailHelp" value="<?=$user['adress'] ?>">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Number</label>
        <input type="text" class="form-control" id="exampleInputEmail1"  name ="number" aria-describedby="emailHelp" value="<?=$user['number'] ?>">
    </div>

    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<a href="/admin"> Back</a>
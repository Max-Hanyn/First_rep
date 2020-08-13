<?php
//session_start();
//if (!$_SESSION['user']){
//    header('Location: http://phpteam.test/');
//}
?>
<?php include "layouts/header.php"; ?>
<body>
<br><br><br>

<style>
    body{background:url(https://bootstraptema.ru/images/bg/bg-1.png)}

    #main {
        background-color: #f2f2f2;
        padding: 20px;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -ms-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        border-bottom: 4px solid #ddd;
    }
    #real-estates-detail #author img {
        -webkit-border-radius: 100%;
        -moz-border-radius: 100%;
        -ms-border-radius: 100%;
        -o-border-radius: 100%;
        border-radius: 100%;
        border: 5px solid #ecf0f1;
        margin-bottom: 10px;
    }
    #real-estates-detail .sosmed-author i.fa {
        width: 30px;
        height: 30px;
        border: 2px solid #bdc3c7;
        color: #bdc3c7;
        padding-top: 6px;
        margin-top: 10px;
    }
    .panel-default .panel-heading {
        background-color: #fff;
    }
    #real-estates-detail .slides li img {
        height: 450px;
    }
</style>

<div class="container">
    <div id="main">



        <div class="row" id="real-estates-detail">
            <div class="col-lg-4 col-md-4 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <header class="panel-title">
                            <div class="text-center">
                                <strong>Коричстувач сайта</strong>
                            </div>
                        </header>
                    </div>
                    <div class="panel-body">
                        <div class="text-center" id="author">
                            <img src="">
                            <h3>ПІБ</h3>
                            <small class="label label-warning">Краіїна</small>
                            <p>Короткий опис</p>
                            <p class="sosmed-author">
                                <a href="#"><i class="fa fa-facebook" title="Facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter" title="Twitter"></i></a>
                                <a href="#"><i class="fa fa-google-plus" title="Google Plus"></i></a>
                                <a href="#"><i class="fa fa-linkedin" title="Linkedin"></i></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-8 col-xs-12">
                <div class="panel">
                    <div class="panel-body">
                        <ul id="myTab" class="nav nav-pills">
                            <li class="active"><a href="#detail" data-toggle="tab">Особисті дані </a></li>
                            <li class=""><a href="#contact" data-toggle="tab">Редагувати дані </a></li>
                            <li class=""><a href="../Scripts/logout.php" >Вихід</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <hr>
                            <div class="tab-pane fade active in" id="detail">
                                <h4>История профиля</h4>
                                <table class="table table-th-block">
                                    <tbody>
                                    <tr><td class="active">Ім'я:</td><td><?=$_SESSION['user']['first_name']?></td></tr>
                                    <tr><td class="active">Фамілія:</td><td><?=$_SESSION['user']['second_name']?></td></tr>
                                    <tr><td class="active">Адрес:</td><td><?=$_SESSION['user']['number']?></td></tr>
                                    <tr><td class="active">Номер телефону:</td><td><?=$_SESSION['user']['adress']?></td></tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="contact">
                                <p></p>
                                <form role="form" action="../Scripts/dataUpdate.php" method="post">
                                    <div class="form-group">
                                        <label>Ім'я</label>
                                        <input type="text" name="first_name" class="form-control rounded" value="<?=$_SESSION['user']['first_name']?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Фамілія</label>
                                        <input type="text" name="second_name" class="form-control rounded" value="<?=$_SESSION['user']['second_name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Адрес</label>
                                        <input type="text" name="number" class="form-control rounded" value="<?=$_SESSION['user']['number']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Номер</label>
                                        <input type="text" name="adress" class="form-control rounded" value="<?=$_SESSION['user']['adress']?>" >
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success" data-original-title="" title="">Зберегти</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div><!-- /.main -->
</div><!-- /.container -->

</body>
</html>

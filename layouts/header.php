<?php session_start();?>
<!DOCTYPE html>
<html lang="RU-ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>University</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
    <link href="jumbotron.css" rel="stylesheet">
    <link rel="stylesheet" href="/bootstrap/FortAwesome/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/active.js"></script>
    <script src="js/ajaxlogin.js"></script>
</head>

<body>
<div id="myModal" class="modal fade">
    <div class="modal-dialog ">
        <div class="modal-content">
            <!-- Заголовок модального окна -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">ВХОД</h4>
            </div>
            <!-- Основное содержимое модального окна -->
            <div class="modal-body">
                <form action="#" method="Post" id="formlog">
                    <div id="result" > </div>
                    <h4>Логин (номер зачетной книжки)</h4>
                    <input type="text" size="35" name="login" id="lg" required>
                    <h4>Пароль</h4>
                    <input type="password" size="35" name="password" id="pswd" required>
                    <button class="btn btn-primary q-right" type="submit" id="ajax">ВОЙТИ</button>
                </form>
            </div>
        </div>
    </div>
</div>
<header>
    <div class=" nav navbar-fixed-top">
        <nav class="navbar navbar-inverse " role="navigation" id="tr">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.php"><img id="logo" src="img/logo.png"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" id="mainmenu">

                        <li><a href="index.php">Главная</a></li>
                        <li><a href="prep.php">Преподаватели</a></li>
                        <li><a href="contacts.php">Контакты</a></li>
                    </ul>

                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
        <div class="tr">
            <form action="#" class="navbar-form navbar-right" id="loginform">
                    <?php if(empty($_SESSION['avtorizate'])) {
                            echo "<button type='button' class='btn btn-primary' id='login'>
                                    <span class='glyphicon glyphicon-user'>
                                        <cg>ВОЙТИ</cg>

                                  </button>";
                        }
                        else{
                            $file=$_SESSION['login']=='0'?'admin.php':'students.php';
                            echo "<span class='glyphicon glyphicon-user'>
                                    <cg><a href=$file id='nameuser'> ".$_SESSION['fio']."
                                        </a>
                                    </cg>
                                   </span>";
                        }?>
            </form>
        </div>
    </div>
</header>
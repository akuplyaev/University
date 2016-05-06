<?php session_start();
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
else{
    require_once  'layouts/header.php';
}
?>
    <div class="container-fluid maps">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li ><a href="" id="viewstd">Просмотр студентов</a></li>
                    <li><a href="#">Добавление студентов</a></li>
                    <li><a href="#">Удаление студентов</a></li>
                    <li><a href="#">Изменение пароля студента</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="queryresult">
                    <h2>Выберите действие</h2>
            </div>
        </div>
    </div>
<?php require_once  'layouts/footer.php'; ?>

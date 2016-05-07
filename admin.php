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
                    <li ><a href="" id="view_students_form">Просмотр студентов</a></li>
                    <li><a href="" id="add_students_form">Добавление студентов</a></li>
                    <li><a href="" id="delete_students_form">Удаление студентов</a></li>
                    <li><a href="" id="change_password_form">Изменение пароля студента</a></li>
                </ul>
            </div>
            <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="queryresult">
                    <h2 style="
                        text-align: center;
                        margin-top: 10px;
                        margin-bottom: 20px;">Выберите действие</h2>
            </div>
        </div>
    </div>
<?php require_once  'layouts/footer.php'; ?>

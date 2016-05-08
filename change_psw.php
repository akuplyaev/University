<?php session_start();
require_once 'classes/Students.php';
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
if ($_POST['kod']=="0"){
    echo "<h2 style='text-align: center; margin-top: 10px; margin-bottom: 20px;'>Нет соответствующих прав для изменения пароля админа</h2>";
    return false;
}
$nz=$_POST['kod'];
$password=$_POST['password'];

    if (Students::changePasswordStudents($nz,$password)) {
        echo "<h2 style='text-align: center; margin-top: 10px; margin-bottom: 20px;'>Пароль изменен</h2>";
    }
    else{
    echo "<h2 style='text-align: center; margin-top: 10px; margin-bottom: 20px;'>Ошибка</h2>";
    }
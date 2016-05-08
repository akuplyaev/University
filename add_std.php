<?php session_start();
require_once 'classes/Students.php';
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
$nz=$_POST['nz'];
$fio=$_POST['fio'];
$pol=$_POST['pol'];
$gp=date($_POST['gp']);
$password=$_POST['parol'];
$kod=$_POST['kod'];
try {
    if(Students::addStudent($nz,$fio,$pol,$gp,$kod,$password)==true) {
        header("Location:admin.php");
    }
    else{
        echo "Студент с таким номером зачетной книжки существует";
    }
}
catch (PDOExepction $e){
    echo('Ошибка: ' . $e->getMessage());
}




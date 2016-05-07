<?php session_start();
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
try {
    $db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
        PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
        PDO::ATTR_ERRMODE=>TRUE
    ));
    $db->exec('SET NAMES utf8');
    $queryString = "UPDATE stud set parol=:password WHERE nz=:nz";
    $result = $db->prepare($queryString);
    $result->execute(array(
        ':nz'=>$nz,
        ':password'=>$password
    ));
    echo "<h2 style='text-align: center; margin-top: 10px; margin-bottom: 20px;'>Пароль изменен</h2>";
}
catch (PDOExepction $e){
    echo('Ошибка: ' . $e->getMessage());
}
$db=null;
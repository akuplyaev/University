<?php session_start();
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
if ($_POST['kod']=="0"){
    echo "нет соответствующих прав для изменения пароля админа";
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
    echo "Пароль изменен";
}
catch (PDOExepction $e){
    echo('Ошибка: ' . $e->getMessage());
}
$db=null;
<?php
session_start();
if(isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } 

    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    
try {
$db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
PDO::ATTR_ERRMODE=>TRUE      
));
    $db->exec('SET NAMES utf8');
    $queryString="Select * from stud WHERE nz= :login";
    $result=$db->prepare($queryString);
    $result->bindParam(':login',$login);
    $result->execute();
    $row=$result->fetch();

    if($row==false){
        echo 'неправильный логин';
    }
    elseif($row->parol!=$password){
        echo 'неправильный пароль';
    }
    else{
        $_SESSION['fio']=$row->fio;
        $_SESSION['login']=$row->nz;
        $_SESSION['avtorizate']=true;
        header("Location:index.php ");

    }
    

}
 catch (PDOExepction $e){
     echo('Ошибка: ' . $e->getMessage());
};

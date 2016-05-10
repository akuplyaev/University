<?php session_start();
require_once 'config/Autoload.php';
if(isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
     $user=new User($login,$password);
    if($user->Authorization()){
        $_SESSION['fio']=$user->getFio();
        $_SESSION['login']=$user->login;
        $_SESSION['avtorizate']=true;
    }
    else {
        echo 'Неправильный логин или пароль';
        return;
    }



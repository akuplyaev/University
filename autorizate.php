<?php session_start();
require_once 'classes/Students.php';
if(isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
    if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
    Students::authorization($login,$password);



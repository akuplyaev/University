<?php
session_start();
if (!empty($_SESSION['login']) || isset($_SESSION['login'])) {
    return true;
}
else{
    echo "Пожалуйста авторизируйтесь";
}
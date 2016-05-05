<?php session_start();
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
else{
    require_once  'layouts/header.php';
}
?>
    <div class="container maps">
        <div id="admin">
            <form action="exit.php" method="post">
             <h1>Вы зашли как: <?echo $_SESSION['fio'];?></h1>
                <button type="submit" class="btn btn-primary">
                        ВЫЙТИ
                </button>
            </form>
        </div>
    </div>
<?php require_once  'layouts/footer.php'; ?>

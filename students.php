<?php require_once  'layouts/header.php'; ?>
<div class="container maps">
    <div id="students">
        <h1><?php echo $_SESSION['fio']; ?></h1><br>
        <form action="exit.php" method="post">
        <button type="submit" class="btn btn-primary">
           ВЫЙТИ
        </button>
        </form>
    </div>

</div>
<?php require_once  'layouts/footer.php'; ?>

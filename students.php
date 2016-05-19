<?php session_start();
if(empty($_SESSION['avtorizate'])) {
    header("Location:404.php");
    return false;
}
else{
    require_once  'layouts/header.php';
    require_once 'config/Autoload.php';
}
?>
<div class="container maps">
    <div id="students">
        <h1>Информация о вас</h1><br>
            <table class="table table-hover "
            <thead>
            <tr>
                <th>ФИО</th>
                <th>Пол</th>
                <th>Год поступления</th>
                <th>Код специальности</th>
                <th>Специальность</th>
                <th>Срок обучения(в семестрах)</th>
            </tr>
            <?
             $login=$_SESSION['login'];
            $row=Students::getStudentAllInfo($login);
                    echo "<tr>";
                    echo"<td>".$row->fio."</td>";
                    echo"<td>".($row->pol==1?'мужской':'женский')."</td>";
                    echo"<td>".$row->gp."</td>";
                    echo"<td>".$row->kod."</td>";
                    echo"<td>".$row->nazv."</td>";
                    echo"<td>".$row->srok."</td>";
                    echo "</tr>";
            ?>
            </thead>
            <thbody>
            </thbody>
            </table>
            <div class="container">
            <h1>Список выбранных курсов</h1><br>
                <table class="table table-bordered "
                <thead>
                <tr>
                    <th>Название предмета</th>
                    <th>Преподаватель</th>
                <?
                $row=Subjects::getKursInfo($login);
                foreach($row as $row) {
                    echo "<tr>";
                    echo "<td> $row->nazv</td>";
                    echo "<td> $row->fio</td>";
                    echo "</tr>";
                }
                ?>
                </thead>
                <thbody>
                </thbody>
                </table>
                <a href="kurs.php">Добавить</a>
            </div>
    </div>

</div>
<?php require_once  'layouts/footer.php'; ?>

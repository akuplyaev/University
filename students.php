<?php require_once  'layouts/header.php'; ?>
<div class="container maps">
    <div id="students">
        <h1>Ваша информация</h1><br>
        <form action="exit.php" method="post">
            <table class="table table-bordered"
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
            try {
                $db = new PDO("mysql:dbname=diplom;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE => TRUE
                ));
                $db->exec('SET NAMES utf8');
                $queryString = "Select * from stud INNER JOIN prof WHERE stud.kod=prof.kod and stud.nz=:login";
                $result = $db->prepare($queryString);
                $result->bindParam(':login',$login);
                $result->execute();
                while( $row = $result->fetch()){
                    echo "<tr>";
                    echo"<td>".$row->fio."</td>";
                    echo"<td>".($row->pol==1?'мужской':'женский')."</td>";
                    echo"<td>".$row->gp."</td>";
                    echo"<td>".$row->kod."</td>";
                    echo"<td>".$row->nazv."</td>";
                    echo"<td>".$row->srok."</td>";
                    echo "</tr>";
                }
            }
            catch (PDOExepction $e) {
                echo('Ошибка: ' . $e->getMessage());
            }
            $db=null;
            ?>
            </thead>
            <thbody>
            </thbody>
            </table>
        <button type="submit" class="btn btn-primary">
           ВЫЙТИ
        </button>
        </form>
    </div>

</div>
<?php require_once  'layouts/footer.php'; ?>

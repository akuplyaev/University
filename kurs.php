<?php require_once  'layouts/header.php'; ?>
    <div class="container maps" xmlns="http://www.w3.org/1999/html">
        <h1>Список предметов для выбора</h1>
        <table class="table table-bordered"
            <thead>
                <tr>
                    <th>Название</th>
                    <th>Колличество зачетных часов часов</th>
                    <th>Предыдущий предмет</th>
                </tr>
            </thead>
            <thbody>
                <?php
                    try {
                        $db = new PDO("mysql:dbname=diplom;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                        PDO::ATTR_ERRMODE => TRUE
                        ));
                        $db->exec('SET NAMES utf8');
                        $queryString = "Select * from subj where predyd=0";
                        $result = $db->prepare($queryString);
                        $result->execute();
                        $row = $result->fetchAll();
                        foreach($row as $str){
                            echo "<tr>";
                            echo"<td>".$str->nazv."</td>";
                            echo"<td>".$str->kolze."</td>";
                            echo"<td>".$str->predyd."</td>";
                            echo "</tr>";
                            }
                        }
                    catch (PDOExepction $e) {
                        echo('Ошибка: ' . $e->getMessage());
                        }
                $db=null;
                ?>
            </thbody>
        </table>
    </div>
<?php require_once  'layouts/footer.php'; ?>
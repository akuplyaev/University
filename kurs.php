<?php require_once  'layouts/header.php'; ?>
    <div class="container maps" xmlns="http://www.w3.org/1999/html">
        <h1>Список предметов для выбора</h1>
       <form action="select.php" method="post">
           <div class="row">
               <div class="col-lg-3">
           <select class="form-control input-sm">
           <?
           try {
               $db = new PDO("mysql:dbname=diplom;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
               PDO::ATTR_ERRMODE => TRUE
               ));
               $db->exec('SET NAMES utf8');
               $queryString = "Select * from subj WHERE predyd=0";
               $result = $db->prepare($queryString);
               $result->execute();
               $row=$result->fetchAll();
               foreach($row as $str) {
                   echo "<option>" . $str->nazv . "</option>";
                }
               }
           catch (PDOExepction $e) {
               echo('Ошибка: ' . $e->getMessage());
               }
           $db=null;
               ?>
           </select>
                   <br>
               </div>
           </div>
           <button type="submit" class="btn btn-primary">
               Выбрать
           </button>
       </form>
    </div>
<?php require_once  'layouts/footer.php'; ?>
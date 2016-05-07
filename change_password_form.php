<?php session_start();
if(empty($_SESSION['avtorizate']) || $_SESSION['login']!='0') {
    header("Location:404.php");
    return false;
}
?>
<h2 style="
    text-align: center;
    margin-top: 10px;
    margin-bottom: 20px;
">Изменение пароля</h2>
<form id="frm_chg_psw">
    <div class="input-group">
        <label>Выбрать студента:</label><br>
        <select name="kod">
            <?php
            try {
                $db=new PDO("mysql:dbname=diplom;host=localhost","root","",array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8",
                    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ,
                    PDO::ATTR_ERRMODE=>TRUE
                ));
                $db->exec('SET NAMES utf8');
                $queryString="Select nz,fio from stud";
                $res=$db->prepare($queryString);
                $res->execute();
                $row=$res->fetchAll();
                foreach($row as $str){
                    echo "<option value=$str->nz>".$str->fio."</option>";
                }
            }
            catch (PDOExepction $e){
                echo('Ошибка: ' . $e->getMessage());
            }
            $db=null;
            ?>
        </select>
    </div><br>
    <div class="input-group">
        <input type="text" placeholder="Пароль" name="password" id="psw_chg_input" required>
    </div><br>
    <div class="input-group">
        <script src="/js/change_password_ajax.js"></script>
        <button  id="change_psw">Изменить</button>
    </div>
</form>

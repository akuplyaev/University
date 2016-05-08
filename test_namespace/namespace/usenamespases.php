<?php
namespace connect{
    use \PDO;
    class DbTest{
        static  public function getConnectionTest(){
        $db = new PDO("mysql:dbname=diplom;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => TRUE));
        $db->exec('SET NAMES utf8');
        return $db;
        }
    }
}
namespace Std{
    use connect;
    function getAllStudentsInfoTest()
    {
        $db = connect\DbTest::getConnectionTest();
        $queryString = "Select * from stud INNER JOIN prof WHERE stud.kod=prof.kod GROUP BY stud.nz";
        $result = $db->prepare($queryString);
        $result->execute();
        $row = $result->fetchAll();
        $db = null;
        return $row;
    }

}
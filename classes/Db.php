<?php
    class Db{
        static public function getConnection()
        {
            $db = new PDO("mysql:dbname=diplom;host=localhost", "root", "", array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => TRUE));
            $db->exec('SET NAMES utf8');
            return $db;
        }
    }

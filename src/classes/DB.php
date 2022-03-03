<?php



class DB
{
    public static $instance;

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            try {
                $servername = "mysql-server";
                $username = "root";
                $password = "secret";
                $dbname = "store";

                self::$instance = new PDO("mysql:host=" . $servername . ";dbname=" . $dbname, $username, $password);
                // set the PDO error mode to exception
                self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                return self::$instance;
            } catch (PDOException $e) {
                return $e->getMessage();
            }
        }
        return self::$instance;
    }
}

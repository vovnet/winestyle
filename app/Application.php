<?php

namespace app;


use PDO;
use PDOException;

class Application
{
    public static $app;
    public static $pdo;
    public static $rout;

    public $config;

    public function __construct()
    {
        self::$app = $this;
    }

    public function run($config)
    {
        $this->config = $config;

        $this->connectDB();

        self::$rout = new Route();
        self::$rout->start();
    }

    private function connectDB()
    {
        try {
            $host = $this->config['db']['host'];
            $dbname = $this->config['db']['db'];
            $charset = $this->config['db']['charset'];
            $user = $this->config['db']['user'];
            $pass = $this->config['db']['password'];
            $dsn = "mysql:host=$host;dbname=$dbname;charset";
            self::$pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }
}
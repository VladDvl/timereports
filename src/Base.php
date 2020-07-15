<?php

abstract class Base {
    protected static $DB;

    public function __construct()
    {
        $app = ApplicationRegistry::getInstance();
        $config = $app->getConfig();

        try {
            self::$DB = new \PDO($config['dsn'], $config['user'], $config['password']);
            self::$DB->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo 'MySQL connection error: ' . $e->getMessage();
        }
    }

    public function doStatement($statement)
    {
        try {
            $sth = self::$DB->prepare($statement);
            $sth->closeCursor();
            $sth->execute();
            return $sth;
        } catch (\PDOException $e) {
            echo $e->getMessage();
        }
    }
}

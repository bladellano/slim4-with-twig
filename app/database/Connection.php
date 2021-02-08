<?php

namespace app\database;

use PDO;
use PDOException;

class Connection
{
    private static $pdo = NULL;

    private static $DRIVER = DB_SITE['driver'];
    private static $HOST = DB_SITE['host'];
    private static $DBNAME = DB_SITE['dbname'];
    private static $USER = DB_SITE['username'];
    private static $PASSWD = DB_SITE['passwd'];
    private static $OPTIONS = DB_SITE['options'];

    public static function connection()
    {
        if (static::$pdo) {
            return static::$pdo;
        }
        try {
            static::$pdo = new PDO("" . static::$DRIVER . ":host=" . static::$HOST . ";dbname=" . static::$DBNAME . "", static::$USER, static::$PASSWD, static::$OPTIONS);

            return static::$pdo;
        } catch (PDOException $e) {
            var_dump($e->getMessage());
        }
    }
}

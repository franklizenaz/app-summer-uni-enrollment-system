<?php

require_once __DIR__ . '/../../config/config.php';

use Libsql\Database as LibsqlDatabase;
use Libsql\LibsqlException;

class Database {

    private static $conn = null;

    public static function connection() {

        if (self::$conn === null) {
            try {
                $db = @new LibsqlDatabase(
                    url: DB_URL,
                    authToken: DB_TOKEN
                );
                self::$conn = $db->connect();
            } catch (LibsqlException $e) {
                echo "Connection error: " . $e->getMessage();
                return null;
            }
        }

        return self::$conn;
    }
}

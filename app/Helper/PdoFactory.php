<?php

namespace Helper;

class PdoFactory
{
    public static function create(): \PDO
    {
        try {
            $db = new \PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            die("Error: " . $e->getMessage());
        }
    }
}
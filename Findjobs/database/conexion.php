<?php
class Conexion
{
    private static $conexion;

    public static function getConexion()
    {
        if (!self::$conexion) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "portal";

            $options = array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"
            );

            try {
                self::$conexion = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password, $options);
            } catch (PDOException $e) {
                error_log("Error de conexión: " . $e->getMessage());
            }
        }

        return self::$conexion;
    }
}

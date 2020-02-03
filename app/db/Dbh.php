<?php


class Dbh
{
    /*
     * standard PDO config.
     */
    private $servename;
    private $username;
    private $password;
    private $dbname;
    private $charset;

    public function connect() {
        $this->servename = "localhost";
        $this->username  = "root";
        $this->password  = "";
        $this->dbname    = "gratis_dhenning";
        $this->charset   = "utf8mb4";

        try {
            // data source name
            $dsn = "mysql:host=". $this->servename .";dbname=". $this->dbname .";charset".$this->charset;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }
        catch(PDOException $e) {
            echo "Connecting failed: ".$e->getMessage();
        }
    }
}
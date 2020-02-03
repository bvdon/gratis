<?php
class DbUser extends Dbh
{
    /*
     * many SQL statements could be here. Simply create a DBUser in any class for access to the SQL methods.
     * The nice thing about having all your SQL in one file is that you can easily stub it and run tests
     * from your terminal in PHPStorm.
     */

    private $sql;
    private $sql_insert;
    private $sql_results_arr;
    private $sql_insert_arr;
    private $row;
    private $item_arr;
    private $vehicles_arr;

    public function __construct() {
        $this->sql              = "";
        $this->sql_results_arr  = "";
        $this->sql_insert       = "";
        $this->sql_insert_arr   = [];
        $this->row              = [];
        $this->item_arr         = [];
        $this->vehicles_arr     = [];
        //$this->getVehicles(); // stub to test.
    }

    public function getLoginAuth($loginUsername, $loginPassword) {
        $this->sql = $this->connect()->query("select count(*) from users where username = '".$loginUsername."' and password = '".$loginPassword."'");

        if ($this->sql->fetchColumn() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    public function getVehicles() {
        $this->sql = $this->connect()->query("select autoId,make,model,year,miles,newused,price from vehicles order by autoId");
        while ($this->row = $this->sql->fetch()) {
            $this->item_arr = [
                'autoId'    => $this->row['autoId'],
                'make'      => $this->row['make'],
                'model'     => $this->row['model'],
                'year'      => $this->row['year'],
                'miles'     => $this->row['miles'],
                'newused'   => $this->row['newused'],
                'price'     => $this->row['price']
            ];
            array_push($this->vehicles_arr, $this->item_arr);
        }
        return $this->vehicles_arr;
    }

    public function getVehicle($autoId=1) {
        $this->sql = $this->connect()->query("select autoId,make,model,year,miles,newused,price from vehicles where autoId=".$autoId." order by autoId" );
        while ($this->row = $this->sql->fetch()) {
            $this->item_arr = [
                'autoId'    => $this->row['autoId'],
                'make'      => $this->row['make'],
                'model'     => $this->row['model'],
                'year'      => $this->row['year'],
                'miles'     => $this->row['miles'],
                'newused'   => $this->row['newused'],
                'price'     => $this->row['price']
            ];
        }
        return $this->item_arr;
    }




    /*
     * Initialize tables.
     * Would NOT normally do this within a website app. It would be a separate application.
     *
     * Manually create a database; name it 'gratis-dhenning' or give it
     * a name you prefer and update the 'app/db/Dbh.php' file here: $this->dbname    = "gratis-dhenning";
     * SQL: create database gratis;
     */

    // check to see if a table exists.
    private function getShowTable($tableName) {

        $this->sql = $this->connect()->query("show tables like '".$tableName."'");

        if ($this->sql->rowCount() > 0) {
            return true;
        }
        else {
            return false;
        }
    }

    // create users table
    public function createUsersTable() {
        if (!$this->getShowTable("users")) {
            $this->sql = "create table users (userId int NOT NULL AUTO_INCREMENT PRIMARY KEY, username varchar(16) NOT NULL, password varchar(16) NOT NULL)";
            echo "<BR>Initialize Database Complete. <a href=\'/index.php\'>Refresh screen</a>.<BR><BR>".$this->sql ."<BR><BR>";
            $this->connect()->exec($this->sql);
            $this->insertUsersTable();
        }
    }

    // insert data into users table
    public function insertUsersTable() {
        $this->sql = $this->connect()->query("select count(*) from users");

        // passwords should ALWAYS be hashed before storing in a database. Not for this app :)
        $this->sql_insert_arr = [
            "INSERT INTO users(username, password) VALUES ('dhenning', 'password')",
            "INSERT INTO users(username, password) VALUES ('jfletcher', 'password')",
        ];

        foreach ($this->sql_insert_arr as $this->sql_insert) {
            echo $this->sql_insert ."<BR>";
            $this->connect()->exec($this->sql_insert);
        }
    }

    // create vehicles table
    public function createVehiclesTable() {
        if (!$this->getShowTable("vehicles")) {
            $this->sql = "create table vehicles (autoId int NOT NULL AUTO_INCREMENT PRIMARY KEY, make varchar(16) NOT NULL, model varchar(16) NOT NULL, year varchar(4) NOT NULL, miles varchar(4) NOT NULL, newused varchar(4) NOT NULL, price varchar(16) NOT NULL)";
            echo "<BR>".$this->sql ."<BR><BR>";
            $this->connect()->exec($this->sql);
            $this->insertVehicleTable();
        }
    }

    // insert data into vehicles table
    public function insertVehicleTable() {
        $this->sql = $this->connect()->query("select count(*) from vehicles");

        $this->sql_insert_arr = [
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('BMW', 'X1', '2013', '13k', 'Used', '$10,950')",
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('Nisssan', 'Altima', '2017', '34k', 'Used', '$15,750')",
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('Volkswagon', 'Jetta', '2017', '22k', 'Used', '$17,500')",
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('Nisssan', 'Murano', '2016', '65k', 'Used', '$14,750')",
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('Audi', 'Q7', '2018', '41k', 'Used', '$43,250')",
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('Mercedes-Benz', 'GLA', '2017', '32k', 'Used', '$29,500')",
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('Mercedes-Benz', 'SL-Class', '2007', '42k', 'Used', '$21,900')",
            "INSERT INTO vehicles(make, model, year, miles, newused, price) VALUES ('Mercedes-Benz', 'GLE', '2019', '0k', 'New', '$80,775')"
        ];

        foreach ($this->sql_insert_arr as $this->sql_insert) {
            echo $this->sql_insert ."<BR>";
            $this->connect()->exec($this->sql_insert);
        }

    }
}

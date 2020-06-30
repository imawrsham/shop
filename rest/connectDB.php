<?php
class CreateDb
{
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;


    // class constructor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Productdb",
        $servername = "localhost",
        $username = "root",
        $password = ""
    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

        // create connection
        $this->con = mysqli_connect($servername, $username, $password, $dbname);

        // Check connection
        if (!$this->con) {
            die("Connection failed : " . mysqli_connect_error());
        }


    }

    // get product from the database
    public function getData($data){
        $fields = array_keys($data);
        $values = array_values($data);
        $sql = "SELECT * FROM $this->tablename WHERE (".implode(",",$fields).") = ('".implode("','", $values )."') ";
        $result = mysqli_query($this->con, $sql);
        if (mysqli_num_rows($result) > 0) {
            return $result;
        }
    }

    public function insert($data){
        $fields = array_keys($data);
        $values = array_values($data);
        $sql =  "INSERT INTO $this->tablename(".implode(",",$fields).") VALUES ('".implode("','", $values )."')";
        $result = mysqli_query($this->con, $sql);
        //var_dump($sql);
        return $result;

    }
    public function delete($data){
        $fields = array_keys($data);
        $values = array_values($data);
        $sql = "DELETE FROM $this->tablename WHERE (".implode(",",$fields).") = ('".implode("','", $values )."') ";
        $result = mysqli_query($this->con, $sql);
        return $result;
    }

}

<?php
class DB {
    private $conn ;

    public function __construct()
    {
        $this->conn = mysqli_connect('localhost','root','','chocoShop');
        //$this->conn = mysqli_connect('sql12.freesqldatabase.com','sql12717496','iAkyESjta3','sql12717496');
    }

    public function getConnection()
    {
        if (mysqli_connect_errno()) {
            die('<h1>DB Connection Fail</h1> ' . mysqli_connect_error());
        }
        else
        {
            return $this->conn;
        }
    }
}


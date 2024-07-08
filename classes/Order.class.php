<?php 
require_once("DB.class.php");
class Order {
    private $cOID ;
    private $db ;
    private $conn;

    public function __construct()
    {
        $this->db = new DB ;
        $this->conn = $this->db->getConnection();
        $this->setCurrentOID();
    }

    private function setCurrentOID() {
        $quary = "SELECT `OID` AS OID FROM `order` ORDER BY `OID` DESC LIMIT 1";
        $result = mysqli_query($this->conn,$quary);
        if ($result) {
            if (mysqli_num_rows($result)>0) {
                $row = mysqli_fetch_array($result);
                $this->cOID = $row[0];
            }
            else {
                $this->cOID = 0;
            }
        }else {
            $this->cOID = 0;
        }
    }

    public function getPendingOrders() {
        try {
            $query = "SELECT * FROM `order` where `status`= 1 order by `date` desc";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return $result;
            }
        } catch (\Throwable $th) {
            return $emtyArr = array();
        }
        
    }

    public function getCompletedOrders() {
        try {
            $query = "SELECT * FROM `order` where `status`= 0 order by `date` desc";
            $result = mysqli_query($this->conn, $query);
            if ($result) {
                return $result ;   
            }
        } catch (\Throwable $th) {
            return $emtyArr = array();
        }
        
    }

    public function setOrderComplete($oid) {
        $quary = "update `order` set status = 0 where `OID` = $oid" ;
        $result = mysqli_query($this->conn,$quary);
        if ($result) {
            return true ;
        }
        else {
            return false ;
        }
    }

    public function undoOrderComplete($oid) {
        $quary = "update `order` set status = 1 where `OID` = $oid" ;
        $result = mysqli_query($this->conn,$quary);
        if ($result) {
            return true ;
        }
        else {
            return false ;
        }
    }

    public function getOrderDetailsByOID($oid) {
        $query = "SELECT * FROM `order` where `OID` = $oid";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return $result = mysqli_fetch_row($result);
            
        }
    }

    public function getOrderProductByOID($oid) {
        $query = "SELECT pr.name , pr.price , ort.count from oderproduct ort inner join product pr on pr.code = ort.PID where ort.OID = 1";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return $result ;
        }
    }
}
?>
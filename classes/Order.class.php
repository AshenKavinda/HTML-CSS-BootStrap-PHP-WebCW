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

    public function addOrder($price,$name,$address,$pNo) {
        try {
            $vPrice = mysqli_real_escape_string($this->conn,$price);
            $vName = mysqli_real_escape_string($this->conn,$name);
            $vAddress = mysqli_real_escape_string($this->conn,$address);
            $vPNo = mysqli_real_escape_string($this->conn,$pNo);
            $id = $this->cOID + 1 ;
            $quary = "insert into `order` values($id,$vPrice,NOW(),'$vName','$vAddress',$vPNo,1)";
            $result =mysqli_query($this->conn,$quary);
            if ($result) {
                $this->cOID++ ;
                return $id;
            }else {
                return false;
            }
        } catch (\Throwable $th) {
            return false ;
        } 
    }

    public function addItemsToOrder($oID,$pID,$count) {
        try {
            $quary = "insert into oderproduct values($oID,$pID,$count)";
            $result = mysqli_query($this->conn,$quary);
            if ($result) {
                return true ;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            return false ;
        }
    }

    public function getPendingOrders() {
        try {
            $query = "SELECT * FROM `order` where `status`= 1 order by `OID`";
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
        $query = "SELECT pr.name , pr.price , ort.count from oderproduct ort inner join product pr on pr.code = ort.PID where ort.OID = $oid";
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            return $result ;
        }
    }

    public function getBestSellingProduct() {
        try {
            $quary = "SELECT p.code, p.name, p.price, p.stock,p.image FROM ( SELECT PID, COUNT(PID) AS PID_Count FROM oderproduct GROUP BY PID ORDER BY PID_Count DESC LIMIT 4 ) AS op JOIN product AS p ON op.PID = p.code";
            $result = mysqli_query($this->conn,$quary);
            if ($result) {
                return $result;
            }
            else {
                return 0 ;
            }
            //code...
        } catch (\Throwable $th) {
            return 0;
        }
    }
}
?>
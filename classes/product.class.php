<?php
require_once("DB.class.php");
class product {
    private $db ;
    private $conn;
    private $cItemCode;
    public function __construct()
    {
        $this->db = new DB ;
        $this->conn = $this->db->getConnection();
    }

    public function addProduct($code,$name,$price,$stock,$img) {
        
        try {
            $vCode = mysqli_real_escape_string($this->conn,$code);
            $vName = mysqli_real_escape_string($this->conn,$name);
            $vPrice = mysqli_real_escape_string($this->conn,$price);
            $vStock = mysqli_real_escape_string($this->conn,$stock);
            $vImg = mysqli_real_escape_string($this->conn,$img);
            $quary = "insert into product values($vCode,'$vName',$vPrice,$vStock,'$vImg')";
            $result = mysqli_query($this->conn,$quary);
            if ($result) {
                return true ;
            }
            else {
                return false;
            }
            //code...
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function editProduct($code,$name,$price,$stock,$img) {
        try {
            $vCode = mysqli_real_escape_string($this->conn,$code);
            $vName = mysqli_real_escape_string($this->conn,$name);
            $vPrice = mysqli_real_escape_string($this->conn,$price);
            $vStock = mysqli_real_escape_string($this->conn,$stock);
            $vImg = mysqli_real_escape_string($this->conn,$img);
            $quary = "update product set name='$vName', price=$vPrice, stock=$vStock,image = '$vImg' where code = $vCode ";
            $result = mysqli_query($this->conn,$quary);
            if ($result) {
                return true ;
            }
            else {
                return false;
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function getAllProduct() {
        $quary = "select * from product" ;
        $result = mysqli_query($this->conn,$quary);
        if ($result) {
            return $result ;
        }
    }

    public function getProductByCode($code) {
        $quary = "select * from product where code = '$code'" ;
        $result = mysqli_query($this->conn,$quary);
        if ($result) {
            return $result = mysqli_fetch_row($result) ;
        }
    }

    public function deleteProduct($id) {
        $quary = "delete from product where code = $id";
        $result = mysqli_query($this->conn,$quary);
        if ($result) {
            return true ;
        }
        else {
            return false ;
        }

    } 
} 
?>
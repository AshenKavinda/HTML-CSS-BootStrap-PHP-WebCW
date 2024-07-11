<?php
require_once("DB.class.php");
class SignIn {
    private $conn ;

    public function __construct()
    {
        $db = new DB ;
        $this->conn = $db->getConnection();
    }

    public function isValied($username,$password) {
        $vUsername = mysqli_real_escape_string($this->conn,$username);
        $vPassword = mysqli_real_escape_string($this->conn,$password);

        $quary = "select * from userlogin where username='$vUsername' and password='$vPassword'";
        $result = mysqli_query($this->conn,$quary);
        if ($result) {
            if (mysqli_num_rows($result)>0) {
                return true;
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }


}
?>
<?php
session_start();
require 'connection/connection.php';
include_once 'connection/pdo_connection.php';    // new PDO connection file

class ModelUser {
    
    private $conn; // PDO connection object
    
    public function __construct() {       
       $this->conn = new pdo_connection();
       $this->conn = $this->conn->getConnection();
    }
    
    public function registerUser($name,$surname,$email,$cell,$address,$user_role,$passwd){
      /*  $sql = "INSERT INTO tbluser(user_name ,user_surname ,user_cellno,user_email ,user_password ,user_role,user_address)
                VALUES('$name','$surname','$cell','$email',md5('$passwd'),'$user_role','$address') ";
        $result = mysql_query($sql);
        */
        $sql = $this->conn->prepare("INSERT INTO tbluser(user_name ,user_surname ,user_cellno,user_email ,user_password ,user_role,user_address,temp_var)
                                     VALUES(". $this->conn->quote($name).','. $this->conn->quote($surname).','. $this->conn->quote($cell).','. $this->conn->quote($email).','. $this->conn->quote(md5($passwd)).','. $this->conn->quote($user_role).','. $this->conn->quote($address).','. $this->conn->quote($passwd).") ");
        $result = $sql->execute();
        
       /* if($user_role == 'Client'){
            $u_id = $this->getLastUserId();
            mysql_query("INSERT INTO tblclient(user_id) VALUES('$u_id') ");
        } */
        if($result)
            return 'Yes';
        else
            return 'No';
    }
    public function getLastUserId(){
        $qry = "SELECT MAX(user_id) AS id FROM tbluser";
        $result = mysql_query($qry);
        while($row = mysql_fetch_array($result)){
            $id = $row['id'];
        }
        return $id;
    }
    public function checkUserExists($username,$password){
      /*  $qry = "SELECT * FROM tbluser WHERE user_email = '$username' AND user_password = md5($password) ";
        $result = mysql_query($qry) or die(mysql_error());
        $rowcount = mysql_num_rows($result); */
        
        
        $qry = $this->conn->prepare("SELECT * FROM tbluser WHERE user_email = ".$this->conn->quote($username)." AND temp_var = ".$this->conn->quote($password) );
        $qry->execute();
        $rowcount = $qry->rowCount();
        if($rowcount > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function checkExistingEmail($username){
        $qry = "SELECT * FROM tbluser WHERE user_email = '$username' ";
        $result = mysql_query($qry);
        $rowcount = mysql_num_rows($result);
        
        if($rowcount > 0){
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function loginUser($username, $password) {
        $qry = $this->conn->prepare("SELECT * FROM tbluser WHERE user_email = ".$this->conn->quote($username).' AND temp_var = '.$this->conn->quote($password) );
        $qry->execute();
        
        //$result = mysql_query($qry);
        
      //  if($row = mysql_fetch_array($result) ){
        if($row = $qry->fetch() ){
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['username'] = $row['user_email'];
            $_SESSION['cellno'] = $row['user_cellno'];
            $_SESSION['password'] = $row['user_password'];
            $_SESSION['role'] = $row['user_role'];
            $_SESSION['name'] = $row['user_name'];
            
            if($_SESSION['role'] == 'Driver')
                require 'View/welcome_driver.php';
            else if($_SESSION['role'] == 'Client')
                require 'View/welcome_client.php';               
            else if($_SESSION['role'] == 'Lift Club')
                require 'View/welcomeLiftClub.php';            
            else if($_SESSION['role'] == 'Transport')
                require 'View/welcomeTransportOwner.php'; 
            
        }// End: while
        
    }
    
    public function logout(){
        if (isset($_SESSION['username'])) {
            session_destroy();
            // Delete certain session
            unset($_SESSION['username']);
            // Delete all session variables
            // session_destroy();
            // Jump to login page
            header('Location: indexhome.php');  //go to the index page after logging out
        }
    }
        
}

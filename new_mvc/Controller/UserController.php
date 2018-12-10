<?php
include 'Model/ModelUser.php';
class UserController {
    public $userObj;
    
    public function __construct() {
        $this->loginObj = new ModelUser();
    }
    
    public function execute_user(){
        
        if(isset($_POST['btn_login'])){
            $user = $_POST['user'];
            $pass = $_POST['pass'];
            
           $checkUser = $this->loginObj->checkUserExists($user,$pass);
            
                $this->loginObj->loginUser($user, $pass);
               //include 'View/login.php';
            
            if($checkUser == TRUE){
            }
            else{
                $error = "<p style='color: red'> Your credentials do not match our records, please make sure your password and username are correct. </p>";
                //include 'View/login.php';
            }
        }
        else{
            include 'View/login.php';
        }
    }
}

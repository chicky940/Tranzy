<?php

class RegisterController {
    
    public $userObj;
    
    public function __construct() {
        $this->userObj = new ModelUser();
    }
    
    public function executeUser_registration(){
        
        if(isset($_POST['btn_signUp'])){
            $name = $_POST['txtName'];
            $surname = $_POST['txtSurname'];
            $email = $_POST['txtEmail'];
            $cell = $_POST['txtCellNo'];
            $addr = $_POST['address'];
            $userType = $_POST['user_role'];
            $pass = $_POST['passwd'];
            $confirm_pass = $_POST['confirm_passwd'];
            
            $checkUserExists = $this->userObj->checkExistingEmail($email);
            
            if($pass != $confirm_pass){ // passwords don't match
                $passwdErr = "<p style='color: red'> Passwords don't match. </p>";
                include 'View/register.php';
            }
            else if(strlen($pass) < 6 || strlen($pass) > 15 ){
                $passLengErr = "<p style='color: red'> Password must not be less than 6 & not more than 15 characters long. </p>";
                include 'View/register.php';
            }
            else if($checkUserExists == TRUE){
                $userExists_err = "<p style='color: red'> User already exists, please use a different email address. </p>";
                include 'View/register.php';
            }
            else if(strlen($cell) != 10 ){
                $celNo_lengErr = "<p style='color: red'> Cell number must be 10 characters long. </p>";
                include 'View/register.php';
            }
            else if( $userType == 'null' ){
                $dropdownErr = "<p style='color: red'> Please select user role on the dropdown. </p>";
                include 'View/register.php';         
            }
            else{
                $registered = $this->userObj->registerUser($name, $surname, $email, $cell, $addr, $userType, $pass);
                
                if($registered = 'Yes'){
                    $success_msg = "<p style='color: green'> You have successfully created an account, Thank you. </p>";
                }
                else{
                    $success_msg = "<p  style='color: red'> Couldn't create account, contact administrator. </p>";
                }
                
                include 'View/register.php';
            }
        }
        else{
            include 'View/register.php';
        }
    }
}

<?php

class DriverController {
    public $driverObj;
    
    public function __construct() {
        $this->driverObj = new ModelDriver();
    }
    public function execute_driver() {
        if(isset($_POST['btnSubmit'])){
            $name  = $_POST["txtName"];
            $surname  = $_POST["txtSurname"];
            $email = $_POST["txtEmail"];
            $cellno = $_POST["txtCellNo"];
            $license = $_POST["dropDownLicense"];
            $amount = $_POST["txtAmt"];
            $loc = 1;
            $experience = $_POST["txtExperience"];
            
            $image = $_FILES['ImageSelect']['name'];  //vehicle image.
            
            move_uploaded_file($_FILES['veh_pic']['tmp_name'], 'Images/Drivers/'. $_FILES['ImageSelect']['name']);
            $image_path = './Images/Drivers/'.$image;  
            
            $this->driverObj->InsertDriver($name, $surname, $email, $cellno, $license, $amount, $loc, $experience, $image_path);
            
            $msg = "<p style='color: green'> Added successfully! </p>";
            require './View/AddDriver.php';
        }
        else{
            require './View/AddDriver.php';
        }
    }
}
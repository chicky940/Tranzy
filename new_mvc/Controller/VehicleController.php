<?php
require 'Model/VehicleModel.php';

class VehicleController {
    public $obj;
    
    public function __construct() {
        $this->obj = new VehicleModel();
    }

    public function execute_vehicle() {
        
        if(isset($_POST['btn_addVehicle'])){
            $make  = $_POST["make"];
            $model  = $_POST["model"];
            $year = $_POST["year"];
            $amount = $_POST["amount"];
            
            $image = $_FILES['ImageSelect']['name'];  //vehicle image.
            
            move_uploaded_file($_FILES['veh_pic']['tmp_name'], './Images/Vehicles/'. $_FILES['ImageSelect']['name']);
            $image_path = 'Images/Vehicles/'.$image;  
            
            $this->obj->add_vehicle($make, $model, $year, $amount, $image_path);
            $msg = "<p style='color: green'> Vehicle added successfully! </p>";
            include './View/addVehicle.php';
        }
        else{
            include './View/addVehicle.php';
        }
    }
}

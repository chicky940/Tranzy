<?php
session_start();
require 'connection/connection.php';
//require ("Entities/Vehicle.php");

class VehicleModel {
    public function add_vehicle($make,$model,$year,$amount,$image) {
        $id = $this->getOwnerID();
        $sql = "INSERT INTO tblvehicle(v_make,v_model,v_year,v_amtPerDay ,v_image,to_no) 
                VALUES ('$make', '$model', '$year', '$amount','$image', '$id')";
        mysql_query($sql);
    }
    public function getOwnerID() {
          $sql = "SELECT * FROM tbluser WHERE user_email = '$_SESSION[username]' ";
            $result = mysql_query($sql);

       	    $row = mysql_fetch_array($result);
            $ownerId = $row['user_to'];
            return $ownerId;
    }
}

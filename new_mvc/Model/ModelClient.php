<?php
require 'connection/connection.php';
require ("Entities/Vehicle.php");

class ModelClient{   // inheritance
    public $driverObj;
    public function __construct() {
        $this->driverObj = new ModelDriver();
    }
    
    public function viewDriverdData($id) {
        $sql = "SELECT * FROM tbldriver WHERE dr_no = '$id' ";
        $result = mysql_query($sql);

        while ($row = mysql_fetch_array($result)) 
        {							 
            $driver_arr[$row['dr_no']] = new Driver($row['dr_no'], $row['dr_name'], $row['dr_surname'], $row['dr_email'], $row['dr_cellno'], $row['dr_licenseType'], $row['dr_amount'], $row['loc_no'], $row['dr_experience'], $row['dr_image']);
        }
        
        return $driver_arr;	
    }
    
    public function viewMyDriver(){
        $sql = "SELECT * FROM tbldriver WHERE dr_no = '$id' ";
        $result = mysql_query($sql);

        while ($row = mysql_fetch_array($result)) 
        {							 
            $driver_arr[$row['dr_no']] = new Driver($row['dr_no'], $row['dr_name'], $row['dr_surname'], $row['dr_email'], $row['dr_cellno'], $row['dr_licenseType'], $row['dr_amount'], $row['loc_no'], $row['dr_experience'], $row['dr_image']);
        }
        
        return $driver_arr;
    }
    
    public function hireDriver($drv_id){
        $date = date('Y-m-d');
        $clientno = $this->getClientID();
        mysql_query("INSERT INTO tblhiredriver(dr_no,cl_no,hr_date) VALUES('$drv_id','$clientno','$date' )");
        
                // Then get the info immediately and display it to the client just after they click the "Hire driver" link
        $sql = "SELECT * FROM tbldriver WHERE dr_no = '$drv_id' ";
        $result = mysql_query($sql);

        while ($row = mysql_fetch_array($result)) 
        {
            $driver_arr[$row['dr_no']] = new Driver($row['dr_no'], $row['dr_name'], $row['dr_surname'], $row['dr_email'], $row['dr_cellno'], $row['dr_licenseType'], $row['dr_amount'], $row['loc_no'], $row['dr_experience'], $row['dr_image']);
        }
        
        return $driver_arr;
    }
    
    public function getClientID(){
        $sql = "SELECT cl_no FROM tblclient WHERE user_id = '$_SESSION[u_id]' ";
        $result = mysql_query($sql);

        $row = mysql_fetch_array($result);
        $clientID = $row ['cl_no'];
        return $clientID;
    }
    
   // public function view_vehicles(){
       // $sql = "SELECT V.v_make, V.v_model, V.v_series, V.v_year, V.v_amntPerDay, V.v_image
              // FROM tblvehicle V, tbltransportowner T
               //where T.to_no = V.to_no
               //and T.to_email = '$_SESSION[username]' ";
        
        //$result = mysql_query($sql);

        //while ($row = mysql_fetch_array($result)) 
        //{							 
            //$vehicle_arr[$row['v_no']] = new Vehicle($row['v_no'], $row['v_make'], $row['v_model'], $row['v_year'], $row['v_amtPerDay'], $row['v_image']);
       // }
        //return $vehicle_arr;
   // }
   public function view_vehicles(){
        if($_SESSION['role'] == "Transport") {
            $sql = "SELECT V.v_make, V.v_model, V.v_series, V.v_year, V.v_amtPerDay, V.v_image
                FROM tblvehicle V, tbltransportowner T
                where T.to_no = V.to_no
                and T.to_email = '$_SESSION[username]' ";
        }else {
            $sql = "SELECT * FROM tblvehicle";
        }
        $result = mysql_query($sql);

        while ($row = mysql_fetch_array($result)) 
        {							 
            $vehicle_arr[$row['v_no']] = new Vehicle($row['v_no'], $row['v_make'], $row['v_model'], $row['v_year'], $row['v_amtPerDay'], $row['v_image']);
        }
        return $vehicle_arr;
    }
}
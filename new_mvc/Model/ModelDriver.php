<?php
session_start();
require 'connection/connection.php';
require ("Entities/Driver.php");
require ("Entities/Client.php");

class ModelDriver {
    
    public function getDriverList(){
        
            $sql = "SELECT * FROM tbldriver WHERE dr_cellno = '$_SESSION[cellno]'";
            $result = mysql_query($sql);
            
            while($row = mysql_fetch_array($result)) 
	    {
                 $driver_arr[$row['dr_no']] = new Driver($row['dr_no'], $row['dr_name'], $row['dr_surname'], $row['dr_email'], $row['dr_cellno'], $row['dr_licenseType'], $row['dr_amount'], $row['loc_no'], $row['dr_experience'], $row['dr_image']);
       	    }
            return $driver_arr;	
    }
    public function getDriverfiltList($val){
        
            $sql = "SELECT * FROM tbldriver WHERE dr_licenseType = '$val' ";
            $result = mysql_query($sql);
            
            while($row = mysql_fetch_array($result)) 
	    {
                 $driver_arr[$row['dr_no']] = new Driver($row['dr_no'], $row['dr_name'], $row['dr_surname'], $row['dr_email'], $row['dr_cellno'], $row['dr_licenseType'], $row['dr_amount'], $row['loc_no'], $row['dr_experience'], $row['dr_image']);
       	    }
            return $driver_arr;	
    }
    function InsertDriver($name,$surname,$email, $cell, $license,$amount,$loc,$experience, $image)
    {
        $loc = 1;
        $sql = "INSERT INTO tbldriver (dr_name, dr_surname, dr_email, dr_cellno, dr_licenseType, dr_amount, loc_no, dr_experience, dr_image) 
                VALUES ('$name', '$surname', '$email', '$cell', '$license', '$amount', '$loc', '$experience', '$image')";
        
        mysql_query($sql);
    }
    function GetDriverById($id)
    {
            $sql = "SELECT * FROM tbldriver WHERE dr_no = '$id' ";
            $result = mysql_query($sql);

       	    while ($row = mysql_fetch_array($result)) 
	    {							 
		$driver_arr[$row['dr_no']] = new Driver($row['dr_no'], $row['dr_name'], $row['dr_surname'], $row['dr_email'], $row['dr_cellno'], $row['dr_licenseType'], $row['dr_amount'], $row['loc_no'], $row['dr_experience'], $row['dr_image']);
       	    }
            return $driver_arr;										
			
    }
    function UpdateDriver($name,$surname,$demail,$cell,$license,$amount,$loc,$experience,$id)
    { 
        $sql = "UPDATE tbldriver "
             . "SET dr_name = '$name', dr_surname = '$surname', dr_email='$demail',  dr_cellno='$cell', dr_licenseType='$license', dr_amount='$amount', loc_no='$loc', dr_experience='$experience', dr_image='$image' WHERE dr_no = '$id' ";
        mysql_query($sql);
    }
    function DeleteDriver($id)
    {
                // call procedure
          mysql_query("Call DelDriver('$id')");
    }
    public function getDriverByType($type) {
        $sql = "SELECT * FROM tbldriver WHERE dr_licenseType LIKE '$type' ";
        $result = mysql_query($sql);

        while($row = mysql_fetch_array($result)) 
        {
             $driver_arr[$row['dr_no']] = new Driver($row['dr_no'], $row['dr_name'], $row['dr_surname'], $row['dr_email'], $row['dr_cellno'], $row['dr_licenseType'], $row['dr_amount'], $row['loc_no'], $row['dr_experience'], $row['dr_image']);
        }
        return $driver_arr;	
    }
    
    public function viewMyClients() {
        $sql = "SELECT C.cl_no,C.cl_name,C.cl_surname,C.cl_cellno, C.cl_email, C.cl_date
                FROM tblhiredriver HD, tbldriver D, tblclient C
                WHERE HD.cl_no = C.cl_no
                AND HD.dr_no = D.dr_no
                AND D.dr_email = '$_SESSION[username]' ";
        $result = mysql_query($sql);

        while($row = mysql_fetch_array($result)) 
        {
             $client_arr[$row['cl_no']] = new Client($row['cl_no'], $row['cl_name'], $row['cl_surname'], $row['cl_email'], $row['cl_cellno'],$row['cl_date']);
        }
        return $client_arr;
    }
    public function deleteVehicle($id){
        mysql_query("DELETE FROM tblvehiclefeatures WHERE v_no = '$id' ");
        mysql_query("DELETE FROM tblhirevehicle WHERE v_no = '$id' ");
        mysql_query("DELETE FROM tblvehicle WHERE v_no = '$id' ");
    }
}

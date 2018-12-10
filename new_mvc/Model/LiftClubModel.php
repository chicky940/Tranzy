<?php
session_start();
include 'Entities/Lift_club.php';
class LiftClubModel {
    public $lifclubObj;
    
    public function getLiftClub() {
        $qry = "SELECT distinct LC.lc_no, LC.lc_name,LC.lc_cellno,LC.lc_email,LC.lc_description,LC.lc_maxPassengers,
                LC.lc_amount, LC.lc_DepTime, LC.lc_DesTime, L.loc_town, P.prov_name, LC.lc_date
                FROM tblliftclub LC, tbllocation L, tblprovince P
                WHERE LC.lc_DesNo = L.loc_no
                AND P.prov_no = L.prov_no";
        $result = mysql_query($qry);
        
        while($row = mysql_fetch_array($result)){
            $liftClub_arr[] = new Lift_club($row['lc_no'], $row['lc_name'], $row['$surname'], $row['lc_email'], $row['lc_cellno'], $row['lc_description'], $row['lc_maxPassengers'], $row['lc_amount'], $row['prov_name'], $row['lc_DepTime'], $row['loc_town'], $row['lc_DesTime'], $row['lc_date']);
        }
        return $liftClub_arr;
    }
    public function filterLiftClub($val) {
        $qry = "SELECT distinct LC.lc_no, LC.lc_name,LC.lc_cellno,LC.lc_email,LC.lc_description,LC.lc_maxPassengers,
                LC.lc_amount, LC.lc_DepTime, LC.lc_DesTime, L.loc_town, P.prov_name, LC.lc_date
                FROM tblliftclub LC, tbllocation L, tblprovince P
                WHERE LC.lc_DesNo = L.loc_no
                AND P.prov_no = L.prov_no
                AND L.loc_town LIKE '%$val%' ";
        $result = mysql_query($qry);
        
        while($row = mysql_fetch_array($result)){
            $liftClub_arr[] = new Lift_club($row['lc_no'], $row['lc_name'], $row['$surname'], $row['lc_email'], $row['lc_cellno'], $row['lc_description'], $row['lc_maxPassengers'], $row['lc_amount'], $row['prov_name'], $row['lc_DepTime'], $row['loc_town'], $row['lc_DesTime'], $row['lc_date']);
        }
        return $liftClub_arr;
    }
    
    public function view_LiftClub($id) {
        $qry = "SELECT distinct LC.lc_no, LC.lc_name,LC.lc_cellno,LC.lc_email,LC.lc_description,LC.lc_maxPassengers,
                LC.lc_amount, LC.lc_DepTime, LC.lc_DesTime, L.loc_town, P.prov_name, LC.lc_date
                FROM tblliftclub LC, tbllocation L, tblprovince P
                WHERE LC.lc_DesNo = L.loc_no
                AND P.prov_no = L.prov_no 
                AND LC.lc_no = '$id' ";
        $result = mysql_query($qry);
        
        while($row = mysql_fetch_array($result)){
            $liftClub_arr[] = new Lift_club($row['lc_no'], $row['lc_name'], $row['$surname'], $row['lc_email'], $row['lc_cellno'], $row['lc_description'], $row['lc_maxPassengers'], $row['lc_amount'], $row['prov_name'], $row['lc_DepTime'], $row['loc_town'], $row['lc_DesTime'], $row['lc_date']);
        }
        return $liftClub_arr;
    }
    
    public function join_LiftClub($liftClub_id) {
        $date = date('Y-m-d');
        $sql = "INSERT INTO tbljoinliftclub(lc_no ,cl_no,jlc_date)
                VALUES('$liftClub_id','$_SESSION[u_id]','$date') ";
        mysql_query($sql);
    }
    
public function LiftClub_viewMyClients(){
    $qry = "select U.user_name, U.user_surname, U.user_cellno, U.user_email
            from tbljoinliftclub JLC, tblclient C, tblliftclub LC, tbluser U
            where JLC.cl_no = C.cl_no
            and JLC.lc_no = LC.lc_no
            and U.user_id = C.user_id
            and lc_email = '$_SESSION[username]'";
    $result = mysql_fetch($qry);
    
    while($row = mysql_fetch_array($result)){
        $liftClub_arr[] = new Client($id_, $row['user_name'], $row['user_surname'], $row['user_email'], $row['user_cellno']);
        
    }
    return $liftClub_arr;
}
}

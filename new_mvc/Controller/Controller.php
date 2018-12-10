<?php
session_start();
require 'Controller/DriverController.php';
require 'Controller/UserController.php';
require 'Controller/RegisterController.php';
require 'Controller/VehicleController.php';
require 'Controller/CodeController.php';

require 'Model/ModelClient.php';
require 'Model/ModelDriver.php';
require 'Model/LiftClubModel.php';

class Controller {
    public $controlDrvObj;
    public $modelObj;
    public $userContrl_Obj;
    public $userObj;
    public $registerObj;
    public $clientObj;
    public $liftClubObj;
    public $vehObj;
    
    public function __construct() {
        $this->controlDrvObj = new DriverController();
        $this->modelObj = new ModelDriver();
        $this->userContrl_Obj = new UserController();
        $this->registerObj = new RegisterController();
        $this->vehObj = new VehicleController();
        
        $this->userObj = new ModelUser();
        $this->clientObj = new ModelClient($id, $name, $surname, $email, $cell, $license, $amount, $loc, $experience, $image);
        $this->liftClubObj = new LiftClubModel();        
    }
    
    public function execute_main(){
        if(isset($_GET['home'])){
            require './View/Home.php';
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'login' ) {
            $this->userContrl_Obj->execute_user();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'logout' ) {
            $this->userObj->logout();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'add' ) {
            $this->controlDrvObj->execute_driver();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'edit' ) {
            $driverArr = $this->modelObj->getDriverList();
            require './View/editDriver_view.php';
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'view' ) {
            $driverArr = $this->modelObj->getDriverList();
            require './View/viewDrivers.php';
        } 
        else if(isset($_GET['action']) && $_GET['action'] == 'liftClub' ) {
            $liftClub_arr = $this->liftClubObj->getLiftClub();
            $townnames_arr = $this->liftClubObj->getLiftClub();
            require './View/liftClubs_view.php';
        }
        else if(isset($_GET['btn_filterliftClub']) ){
            $date_val = $_GET['txt_filterLiftClub'];
            $liftClub_arr = $this->liftClubObj->filterLiftClub($_GET['txt_filterLiftClub']);
            $townnames_arr = $this->liftClubObj->getLiftClub();
            require './View/liftClubs_view.php';
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'delete' ) {
            $driverArr = $this->modelObj->getDriverList(); 
            require './View/deleteDriver.php';
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'sign_up' ) {  // User registration
            $this->registerObj->executeUser_registration();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'myClients' ) {
            $clientArr = $this->modelObj->viewMyClients();
            require './View/viewMyClients.php';
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'addVehicle' ) {
            $this->vehObj->execute_vehicle();
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'view_vehicles' ) {
            $vehicle_arr = $this->clientObj->view_vehicles();
            require './View/viewVehicles.php';
        }
        else if(isset($_GET['action']) && $_GET['action'] == 'deleteVehicle' ) {
            $vehicle_arr = $this->clientObj->view_vehicles();
            require './View/deleteVehicle.php';
        }
        else if(isset($_GET['deleteVeh'])){
            $this->modelObj->deleteVehicle($_GET['deleteVeh']);
            
            $vehicle_arr = $this->clientObj->view_vehicles();
            $msg = "<p  style='color:green' > Vehicle removed. </p>";
            require './View/deleteVehicle.php';
        }
        else if(isset($_GET['viewLiftClub'])){
            $liftClub_arr = $this->liftClubObj->view_LiftClub($_GET['viewLiftClub']);
            require './View/liftClub_viewMore.php';
        }
        else if(isset($_GET['joinClub'])){
            $this->liftClubObj->join_LiftClub($_GET['joinClub']);
            $mssg = "<p style='color:green'> You've successfully chosen a lift-club. </p>";
            
            $liftClub_arr = $this->liftClubObj->view_LiftClub($_GET['joinClub']);
            require './View/liftClub_viewMore.php';
        }
        else if(isset($_GET['filterDriver'])){
            $type = $_GET['types'];
            $driverArr = $this->modelObj->getDriverByType($type);
            require './View/viewDrivers.php';
        }
        else if(isset($_GET['hireDriver'])){  // client choosing a driver
            $mssg = "<p style='color: green'> You've successfully chosen a driver. </p>";
            $driverArr = $this->clientObj->hireDriver($_GET['hireDriver']);
            require './View/viewMyDriver_Info.php';
        }
        else if(isset($_GET['delete'])){
            $this->modelObj->DeleteDriver($_GET['delete']);
            $driverArr = $this->modelObj->getDriverList();
            $messg = "<p style='color: green'> Deletd. </p>";
            require './View/deleteDriver.php';
        }
        else if(isset($_GET['update'])){
            $_SESSION['id'] = $_GET['update'];
            $driverArr = $this->modelObj->GetDriverById($_GET['update']);
            require './View/editDriver.php';
        }
        else if(isset($_GET['btnUpdate'])){ 
            $name  = $_GET["txtName"];
            $surname  = $_GET["txtSurname"];
            $email = $_GET["txtEmail"];
            $cellno = $_GET["txtCellNo"];
            $license = $_GET["dropDownLicense"];
            $amount = $_GET["txtAmt"];
            $loc = 1;
            $experience = $_GET["txtExperience"];
            $this->modelObj->UpdateDriver($name, $surname, $email, $cellno, $license, $amount, $loc, $experience,  $_SESSION['id']);
            
            $driverArr = $this->modelObj->GetDriverById($_SESSION['id']);
            $messg = "<p style='color: green'> Successfully updated. </p>";
            require './View/editDriver.php';
        }
        else if (isset($_GET['action']) == 'viewLiftClub_clients') {
            $clientArr = $this->liftClubObj->LiftClub_viewMyClients();
            require '.View/liftClub_clientsView.php';
            
        }
        else{
            require './View/Home.php';
        }
    }
}

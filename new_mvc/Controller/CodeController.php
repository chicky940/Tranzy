<?php

class CodeController {
    
    public $modelObj;
    
    public function __construct() {
        $this->modelObj = new ModelDriver();
    }
    
    public function executeDriverTypes(){
        if(isset($_GET['types']) ){
            $type = $_GET['types'];
            $driverCodeArr = $this->modelObj->getDriverByType($type);
            require 'View/viewDrivers.php';
        }
    }
}

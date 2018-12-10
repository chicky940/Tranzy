<?php

class Vehicle {
    public $veh_id;
    public $veh_make;
    public $veh_model;
    public $veh_year;
    public $veh_amount;
    public $veh_image;
    
    public function __construct($id,$make,$model,$year,$amount,$pic) {
        $this->veh_id = $id;
        $this->veh_make = $make;
        $this->veh_model = $model;
        $this->veh_year = $year;
        $this->veh_amount = $amount;
        $this->veh_image = $pic;
    }
}
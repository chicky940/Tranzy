<?php

class Lift_club {
    public $id;
    public $name;
    public $surname;
    public $cell;
    public $email;
    
    public $description;
    public $max_passengers;
    public $amount;
    public $departure;
    public $depart_time;
    public $destination;
    public $dest_time;
    public $clubDate;
    
    function __construct($id, $name, $surname, $email, $cell, $desc, $max_pass, $fee, $dept, $dpt_time, $dest, $dst_time,$d_date) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->cell = $cell;
        
       $this->description = $desc;
       $this->max_passengers = $max_pass;
     $this->amount = $fee;
     $this->departure = $dept;
     $this->depart_time = $dpt_time;
     $this->destination = $dest;
     $this->dest_time = $dst_time;
     $this->clubDate = $d_date;
    }
}

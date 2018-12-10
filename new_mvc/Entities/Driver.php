<?php

class Driver {
    public $id;
    public $name;
    public $surname;
    public $email;
    public $cell;
    public $license;
    public $amount;
    public $loc;
    public $experience;
    public $image;
    
    function __construct($id, $name, $surname, $email, $cell, $license, $amount, $loc, $experience, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->email = $email;
        $this->cell = $cell;
        $this->license = $license;
        $this->amount = $amount;
        $this->loc = $loc;
        $this->experience = $experience;
        $this->image = $image;
    }

}

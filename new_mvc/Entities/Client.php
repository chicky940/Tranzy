<?php
class Client {
    public $id;
    public $name;
    public $surname;
    public $email;
    public $cell;
    public $clubDate;
    
    function __construct($id_, $name_, $surname_, $email_, $cell_, $date_){
        $this->id = $id_;
        $this->name = $name_;
        $this->surname = $surname_;
        $this->email = $email_;
        $this->cell = $cell_;
        $this->clubDate = $date_;
    }
}

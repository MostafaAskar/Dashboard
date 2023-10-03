<?php
namespace App\Classes;
use App\Interfaces\CrudInterface;
use PDO;
use App\Traits\Validate;

class Employee extends Database{
    // public $dno,$dname,$mgrSSN,$mgrStartDate;

    public function getAll(){
        $result= $this->runDML("SELECT SSN ,Fname FROM employee");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    


}
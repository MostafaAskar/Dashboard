<?php
namespace App\Traits;
Trait Validate{
    public function validate($dno){
        $regux = "/^[0-9]{2}$/";
         return preg_match($regux ,$dno);
       
    }
}
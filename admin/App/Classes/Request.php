<?php

namespace App\Classes;

class Request {


    public function get($key = null){

        return ($key=null) ? $_GET : $_GET[$key];

    }
    public function post($key = null){

        return ($key=null) ? $_POST : $_POST[$key];

    }


}
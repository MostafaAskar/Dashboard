<?php
require_once('../vendor/autoload.php');
use App\Classes\Department;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
}

$dep = new Department();
$dep->destroy($id);
<?php

namespace App\Classes;

use App\Interfaces\CrudInterface;
use PDO;
use App\Traits\Validate;

class Department extends Database implements CrudInterface
{
    use Validate;
    private $dno, $dname, $mgrSSN, $mgrStartDate;

    public function getAll()
    {
        $result = $this->runDML("SELECT departments.Dno,dname,fname,MGRstartDate FROM departments left join employee on departments.MGRSSN=employee.SSN");
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function store()
    {
        // echo $this->validate($this->dno) ;

        if ($this->validate($this->dno)) {
            $this->runDML("INSERT INTO `departments`(`Dno`, `Dname`, `MGRSSN`, `MGRStartDate`) VALUES ('$this->dno','$this->dname','$this->mgrSSN','$this->mgrStartDate' )");
            header("location: index.php");
        } else {
            echo "Not Valid ya sadeeeeeeqeeeee";
            // die();
        }
    }



    public function edit($id)
    {
        $result = $this->runDML("SELECT * FROM departments WHERE Dno=$id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function update($id)
    {

        if ($this->validate($this->dno)) {
            $this->runDML("UPDATE `departments` SET `Dname`='$this->dname',`MGRSSN`='$this->mgrSSN',`MGRStartDate`='$this->mgrStartDate' WHERE Dno=$id");
            header("location: index.php");
        } else {
            echo "Not Valid ya sadeeeeeeqeeeee";
        }
    }
    public function destroy($id)
    {
        $this->runDML("DELETE FROM departments WHERE Dno=$id ");
        header("location: index.php");
    }


    public function show($id)
    {
        $result = $this->runDML("SELECT * FROM departments WHERE Dno=$id");
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function __set($key, $value)
    {

        if (property_exists($this, $key)) {

            $value = trim(htmlspecialchars($value));
            $this->$key = $value;
        } else {
            echo "not valid...";
        }
    }
}

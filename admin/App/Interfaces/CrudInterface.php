<?php
namespace App\Interfaces;
interface CrudInterface{
    public function store();
    public function update($id);
    public function getAll();
    public function destroy($id);
    public function show($id);
}
<?php
namespace App\Interfaces;

interface ModelInterface {
    public function checkModelExists();
    public function tableExists();
    public function createTableExists();
    public function errorTable();
    public function getAllTable();
}

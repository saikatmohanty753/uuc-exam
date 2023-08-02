<?php
namespace App\Interfaces;

interface ApiInterface {
    public function getDeatils($clg_id,$type,$where=array(),$dataType='');
}

<?php
namespace App\Repositories;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Interfaces\ApiInterface;
use App\Models\StudentDetailList;
use Illuminate\Support\Facades\Artisan;

class ApiRepository implements ApiInterface{

    public function __construct()
    {
        define('INNER_URL', 'http://localhost/student-management/public/api');
    }

    public function getDeatils($clg_id,$type,$where=array(),$dataType='')
    {
        $curl = curl_init();
        
        $data = array(
            'clg_id'=>$clg_id,
            'type'=>$type,
            'where'=>(count($where) > 0)?encrypt(json_encode($where)):'',
            'dataType'=>$dataType
        );
        curl_setopt_array($curl, array(
          CURLOPT_URL => INNER_URL.'/students-detail',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS => $data,
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }
}

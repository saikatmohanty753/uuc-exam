<?php
namespace App\Repositories;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Interfaces\ModelInterface;
use App\Models\StudentDetailList;
use Illuminate\Support\Facades\Artisan;

class ModelRepository implements ModelInterface{

    private $clg_id;
    private $modelUser;
    private $modelDetail;
    private $modelApplication;
    private $modelEducation;
    private $modelDocument;
    private $modelAddress;
    private $modelPgExamination;
    private $modelUgExamination;

    private $tableUser;
    private $tableDetail;
    private $tableApplication;
    private $tableEducation;
    private $tableDocument;
    private $tableAddress;
    private $tablePgExamination;
    private $tableUgExamination;
    private $tables = array();
    private $createTable = array();
    private $errorTable = array();
    private $getAll = array();

    public function __construct($clg_id)
    {
        $this->clg_id = $clg_id;
        $this->modelUser = 'Student'.$clg_id.'User';
        $this->modelDetail = 'Student'.$clg_id.'Details';
        $this->modelApplication = 'Student'.$clg_id.'Application';
        $this->modelEducation = 'Student'.$clg_id.'EducationDetails'; // Artisan command call
        $this->modelDocument = 'Student'.$clg_id.'Documents'; // Artisan command call
        $this->modelAddress = 'Student'.$clg_id.'Address';
        $this->modelPgExamination = 'PgExamination'.$clg_id.'Application'; // Artisan command call
        $this->modelUgExamination = 'UgExamination'.$clg_id.'Application'; // Artisan command call

        $this->tableUser = 'student'.$clg_id.'_users';
        $this->tableDetail ='student'.$clg_id.'_details';
        $this->tableApplication ='student'.$clg_id.'_applications';
        $this->tableEducation ='student'.$clg_id.'_education_details';
        $this->tableDocument ='student'.$clg_id.'_documents';
        $this->tableAddress ='student'.$clg_id.'_addresses';
        $this->tablePgExamination ='pg_examination'.$clg_id.'_applications';
        $this->tableUgExamination ='ug_examination'.$clg_id.'_applications';
    }
    public function checkModelExists()
    {
        if (Schema::hasTable($this->tableDetail)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelDetail . '.php';
            $modelTemp = $this->modelTemplate($this->modelDetail,$this->tableDetail);
            if (!File::exists($modelPath)) {
                File::put($modelPath, $modelTemp);
                $this->createTable[0] = $this->modelDetail;
            }else{
                $this->tables[0] = $this->modelDetail;
            }
        }else{
            $this->errorTable[0] = $this->modelDetail;
        }
        if (Schema::hasTable($this->tableUser)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelUser . '.php';
            $modelTemp = $this->modelUserTemplate($this->modelUser,$this->tableUser);
            if (!File::exists($modelPath)) {
                File::put($modelPath, $modelTemp);
                $this->createTable[1] = $this->modelUser;
            }else{
                $this->tables[1] = $this->modelUser;
            }
        }else{
            $this->errorTable[1] = $this->modelUser;
        }

        if (Schema::hasTable($this->tableAddress)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelAddress . '.php';
            $modelTemp = $this->modelAdressTemplate($this->modelAddress,$this->tableAddress);
            if (!File::exists($modelPath)) {
                File::put($modelPath, $modelTemp);
                $this->createTable[2] = $this->modelAddress;
            }else{
                $this->tables[2] = $this->modelAddress;
            }
        }else{
            $this->errorTable[2] = $this->modelAddress;
        }

        if (Schema::hasTable($this->tableApplication)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelApplication . '.php';
            $modelTemp = $this->modelTemplate($this->modelApplication,$this->tableApplication);
            if (!File::exists($modelPath)) {
                File::put($modelPath, $modelTemp);
                $this->createTable[3] = $this->modelApplication;
            }else{
                $this->tables[3] = $this->modelApplication;
            }
        }else{
            $this->errorTable[3] = $this->modelApplication;
        }
        if (Schema::hasTable($this->tableEducation)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelEducation. '.php';
            if (!File::exists($modelPath)) {
                Artisan::call('make:model '.$this->modelEducation);
                $this->createTable[4] = $this->modelEducation;
            }else{
                $this->tables[4] = $this->modelEducation;
            }
        }else{
            $this->errorTable[4] = $this->modelEducation;
        }
        if (Schema::hasTable($this->tableDocument)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelDocument. '.php';
            if (!File::exists($modelPath)) {
                Artisan::call('make:model '.$this->modelDocument);
                $this->createTable[5] = $this->modelDocument;
            }else{
                $this->tables[5] = $this->modelDocument;
            }
        }else{
            $this->errorTable[5] = $this->modelDocument;
        }
        if (Schema::hasTable($this->tablePgExamination)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelPgExamination. '.php';
            if (!File::exists($modelPath)) {
                Artisan::call('make:model '.$this->modelPgExamination);
                $this->createTable[6] = $this->modelPgExamination;
            }else{
                $this->tables[6] = $this->modelPgExamination;
            }
        }
        else{
            $this->errorTable[6] = $this->modelPgExamination;
        }
        if (Schema::hasTable($this->tableUgExamination)) {
            $modelPath = app_path().'/Models'.'/'.$this->modelUgExamination. '.php';
            if (!File::exists($modelPath)) {
                Artisan::call('make:model '.$this->modelUgExamination);
                $this->createTable[7] = $this->modelUgExamination;
            }else{
                $this->tables[7] = $this->modelUgExamination;
            }
        }else{
            $this->errorTable[7] = $this->modelUgExamination;
        }
        return true;
    }

    public function tableExists(){
        return $this->tables;
    }
    public function createTableExists(){
        return $this->createTable;
    }
    public function errorTable()
    {
        return $this->errorTable;
    }
    public function getAllTable(){
        $this->getAll = array(
            'create'=>$this->createTable,
            'exists'=>$this->tables,
            'errors'=>$this->errorTable,
        );
        return $this->getAll;
    }
    public function modelTemplate($modelName,$tableName)
    {
        $modelTemplate = "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Database\Eloquent\Factories\HasFactory;\nuse Illuminate\Database\Eloquent\Casts\Attribute;\n\nclass {$modelName} extends Model\n{\n \nuse HasFactory;\n\n   protected \$table = '{$tableName}';\n public \$applicationStatus; \n public \$present_dis_id;\n\n public function course(){\n return \$this->belongsTo(Course::class, 'course_id', 'id');\n}\n\n public function department(){\n\n return \$this->belongsTo(CourseFor::class, 'department_id', 'id');\n}\n public function districtName(){\n \$clg = District::where('id', \$this->clg_id)->first();\n return \$clg->name;\n} \n public function permanentDis(){\n \$present_address = json_decode(\$this->permanent_address);\n \$district = District::where('id', \$present_address->present_district_id)->first();\n return \$district->district_name;\n } \n public function presentDis(){\n \$present_address = json_decode(\$this->present_address);\n \$district = District::where('id', \$present_address->present_district_id)->first();\n return \$district->district_name;\n} \n public function collegeName(){\n \$clg = College::where('id', \$this->clg_id)->first();\n return \$clg->name;\n }\n public function applicationStatus(){\n \$chk = \$this->status;\n if (\$chk == 1) {\n return \$this->applicationStatus = 'Applied';\n } elseif (\$chk == 2) {\n return  \$this->applicationStatus = 'Approved';\n } elseif (\$chk == 3) {\n return  \$this->applicationStatus = 'Rejected';\n } elseif (\$chk == 4) {\n return  \$this->applicationStatus = 'Application-Backed';\n }elseif (\$chk == 5) {\n return  \$this->applicationStatus = 'Apply';\n }elseif (\$chk == 6) {\n return  \$this->applicationStatus = 'Pending for verification';\n } else {\n return '';\n }\n } \n public function statusColor(){\n \$chk = \$this->status;\n \tif (\$chk == 1) {\n\t return 'primary';\n} elseif (\$chk == 2) {\n \t return  'success';\n \t } elseif (\$chk == 3) {\n \t return  'danger'; } else {\n \treturn  'warning';\n}\n} \n}\n";
        return $modelTemplate;
    }

    public function modelAdressTemplate($modelName,$tableName)
    {
        $modelTemplate = "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Database\Eloquent\Factories\HasFactory;\nuse Illuminate\Database\Eloquent\Casts\Attribute;\n\nclass {$modelName} extends Model\n{\n \nuse HasFactory;\n\n   protected \$table = '{$tableName}';\n public function presentDistrict(){\n return \$this->belongsTo(\District::class, 'present_district_id', 'id');\n}\n\n public function permanentDistrict(){\n return \$this->belongsTo(District::class, 'permanent_district_id', 'id');\n}  \n}\n";
        return $modelTemplate;
    }

    public function modelUserTemplate($modelName,$tableName)
    {
        $modelTemplate = "<?php\n\nnamespace App\Models;\n\nuse Illuminate\Database\Eloquent\Model;\nuse Illuminate\Database\Eloquent\Factories\HasFactory;\nuse Illuminate\Database\Eloquent\Casts\Attribute; \n use Illuminate\Foundation\Auth\User as Authenticatable; \n use Illuminate\Notifications\Notifiable;\nuse Illuminate\Support\Facades\Hash;\nuse Spatie\Permission\Traits\HasRoles; \n\nclass {$modelName} extends Authenticatable\n{\n \nuse HasFactory, Notifiable, HasRoles;\n\n   protected \$table = '{$tableName}';\n public function role():BelongsToMany\n{\n\t return \$this->BelongsToMany(Role::class, 'role_id', 'id');\n}\n public function userdetails(){\n \t return \$this->belongsTo(Role::class, 'role_id', 'id');\n} \n}\n";
        return $modelTemplate;
    }
}

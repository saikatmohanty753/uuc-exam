<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExportExeclSem implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function view():View
    {
        $course_id=$this->data->course_id;
        $sem_id=$this->data->sem_id;
        $batch_id=$this->data->batch_id;
        $course=$this->data->course;
        $total_count=$this->data->total_count;
        $theory=$this->data->theory;
        $practical=$this->data->practical;
        $theory_count=$this->data->theory_count;
        $practical_count=$this->data->practical_count;
        return view('sem_exam.excel_import',compact('course_id','sem_id','batch_id','course','total_count','theory','practical_count','theory_count','practical'));
    }
}

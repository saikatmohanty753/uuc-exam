<?php

namespace App\Http\Controllers;

use App\Models\CourseFor;
use App\Models\StudentDetails;
use DB;
use DataTables;
use Illuminate\Http\Request;

class MarkEntryController extends Controller
{
    public function index(Request $request)
    {
        
        // return $student = DB::table('student_details as sd')->select('ug_app.id as ug_id','ug_app.stu_id as ug_stu_id','ug_app.payment_status as ug_payment_status','ug_app.form_status as ug_form_status','sd.*','pg_app.*','pg_app.id as pg_id','pg_app.stu_id as pg_stu_id','pg_app.payment_status as pg_payment_status','pg_app.form_status as pg_form_status','sd.id as student_id','c.name as course_name','c.id as course_id')
        // ->leftJoin('ug_examination_applications as ug_app','sd.id','ug_app.stu_id')
        // ->leftJoin('pg_examination_applications as pg_app','sd.id','pg_app.stu_id')
        // ->leftJoin('courses as c','c.id','sd.course_id')
        // ->orWhere('ug_app.form_status',2)
        // ->orWhere(['ug_app.payment_status' => 1])
        // ->orWhere('pg_app.form_status',2)
        // ->orWhere('pg_app.payment_status',1)
        // // ->where('up_app.form_status',2)
        // ->get(['batch_year']);
         $student = DB::table('student_details as sd')
        ->leftJoin('ug_examination_applications as ug_app','sd.id','ug_app.stu_id')
        ->leftJoin('pg_examination_applications as pg_app','sd.id','pg_app.stu_id')
        ->leftJoin('courses as c','c.id','sd.course_id')
        ->orWhere('ug_app.form_status',2)
        ->orWhere(['ug_app.payment_status' => 1])
        ->orWhere('pg_app.form_status',2)
        ->orWhere('pg_app.payment_status',1)
        // ->where('up_app.form_status',2)
        ->get('batch_year');

        $department  = CourseFor::get();
        
        
        //dd($collection);
        $collection = collect($student);
        $all_batch_year = $collection->unique('batch_year');

        if($request->ajax())
        {
         $student2 = DB::table('student_details as sd')->select('ug_app.id as ug_id','ug_app.stu_id as ug_stu_id','ug_app.payment_status as ug_payment_status','ug_app.form_status as ug_form_status','sd.*','pg_app.*','pg_app.id as pg_id','pg_app.stu_id as pg_stu_id','pg_app.payment_status as pg_payment_status','pg_app.form_status as pg_form_status','sd.id as student_id','c.name as course_name','c.id as course_id')
        ->leftJoin('ug_examination_applications as ug_app','sd.id','ug_app.stu_id')
        ->leftJoin('pg_examination_applications as pg_app','sd.id','pg_app.stu_id')
        ->leftJoin('courses as c','c.id','sd.course_id')
        ->orWhere('ug_app.form_status',2)
        ->orWhere(['ug_app.payment_status' => 1])
        ->orWhere('pg_app.form_status',2)
        ->orWhere('pg_app.payment_status',1)
        // ->where('up_app.form_status',2)
        ->get();
        
        //return $request;

          dd($student2);

            return DataTables::of($student2)
            ->addIndexColumn()
            ->filter(function ($instance) use ($request) {
                //dd( $request->get('batch_year'));
                if (!empty($request->get('batch_year'))) {
                    $instance->collection = $instance->collection->where('batch_year', $request->get('batch_year'));
                }
                if (!empty($request->get('sem_id'))) {
                    $instance->collection = $instance->collection->where('current_semester', $request->get('sem_id'));
                }
                if (!empty($request->get('dep_val'))) {
                    $instance->collection = $instance->collection->where('department_id', $request->get('dep_val'));
                }
                

             })

            ->addColumn('name', function ($row) {
                //dd($row['name']);
                $name = $row->name;
                return $name;
            })
            ->addColumn('college_name', function ($row) {
                //dd($row['name']); student_id
                $college_name =  StudentDetails::find($row->student_id);
                $college_name =  $college_name->collegeName();

                return $college_name;
            })
            ->rawColumns(['name','college_name'])
            ->make(true);
        }
      
        
        
        return view('mark_entry.index',compact('student','department','all_batch_year'));
    }
}

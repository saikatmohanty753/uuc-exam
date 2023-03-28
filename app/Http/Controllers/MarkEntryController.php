<?php

namespace App\Http\Controllers;

use App\Models\CourseFor;
use App\Models\StudentDetails;
use Illuminate\Http\Request;
use DB;

class MarkEntryController extends Controller
{
    public function index(Request $request)
    {
        // return $student = DB::table('ug_examination_applications as up_app')->select('up_app.*','sd.*')
        // ->join('student_details as sd','sd.id','up_app.stu_id')
        // ->get();
        $student = DB::table('student_details as sd')->select('ug_app.id as ug_id','ug_app.stu_id as ug_stu_id','ug_app.payment_status as ug_payment_status','ug_app.form_status as ug_form_status','sd.*','pg_app.*','pg_app.id as pg_id','pg_app.stu_id as pg_stu_id','pg_app.payment_status as pg_payment_status','pg_app.form_status as pg_form_status','sd.id as student_id','c.name as course_name','c.id as course_id')
        ->leftJoin('ug_examination_applications as ug_app','sd.id','ug_app.stu_id')
        ->leftJoin('pg_examination_applications as pg_app','sd.id','pg_app.stu_id')
        ->leftJoin('courses as c','c.id','sd.course_id')
        ->orWhere('ug_app.form_status',2)
        ->orWhere(['ug_app.payment_status' => 1])
        ->orWhere('pg_app.form_status',2)
        ->orWhere('pg_app.payment_status',1)
        // ->where('up_app.form_status',2)
        ->get();
      
        
        $department  = CourseFor::get();

       
        return view('mark_entry.index',compact('student','department'));



    
    }
    
    public function ugfilter(Request $request){
        // return $request;
        if ($request->ajax()) {
        
            $fromDate = $request->from_date;
            $toDate = $request->to_date;

            if (!empty($fromDate) && !empty($toDate)) {
                /* $from = date('Y', strtotime($fromDate));
                $to = date('Y', strtotime($toDate)); */
                $search_year = $fromDate . '-' . $toDate;
                $student = DB::table('student_details as sd')->select('ug_app.id as ug_id','ug_app.stu_id as ug_stu_id','ug_app.payment_status as ug_payment_status','ug_app.form_status as ug_form_status','sd.*','pg_app.*','pg_app.id as pg_id','pg_app.stu_id as pg_stu_id','pg_app.payment_status as pg_payment_status','pg_app.form_status as pg_form_status','sd.id as student_id','c.name as course_name','c.id as course_id')
                ->leftJoin('ug_examination_applications as ug_app','sd.id','ug_app.stu_id')
                ->leftJoin('pg_examination_applications as pg_app','sd.id','pg_app.stu_id')
                ->leftJoin('courses as c','c.id','sd.course_id')
                ->where('batch_year', 'like', '%' . $search_year . '%')
                ->orWhere('ug_app.form_status',2)
                ->orWhere(['ug_app.payment_status' => 1])
                ->orWhere('pg_app.form_status',2)
                ->orWhere('pg_app.payment_status',1)
                // ->where('up_app.form_status',2)
                ->get();
              
            } else {
             
            }
            return DataTables::of($student)
                ->addIndexColumn()
                ->make();
        }

    }
}

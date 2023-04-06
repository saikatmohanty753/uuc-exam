<?php

namespace App\Http\Controllers;

use App\Models\AcademicCourseStructure;
use App\Models\Course;
use App\Models\CourseFor;
use App\Models\PgExaminationApplication;
use App\Models\User;
use App\Models\Pgstudentmark;
use App\Models\StudentDetails;
use App\Models\UgExaminationApplication;
use App\Models\Ugstudentmark;
use DataTables;
use DB;
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
        // ->get(['batch_year']);C NJMMMJ
        $student = DB::table('student_details as sd')
            ->leftJoin('ug_examination_applications as ug_app', 'sd.id', 'ug_app.stu_id')
            ->leftJoin('pg_examination_applications as pg_app', 'sd.id', 'pg_app.stu_id')
            ->leftJoin('courses as c', 'c.id', 'sd.course_id')
            ->orWhere('ug_app.form_status', 2)
            ->orWhere(['ug_app.payment_status' => 1])
            ->orWhere('pg_app.form_status', 2)
            ->orWhere('pg_app.payment_status', 1)
        // ->where('up_app.form_status',2)
            ->get('batch_year');

        $department = CourseFor::get();
        $course = Course::get();

        //dd($collection);
        $collection = collect($student);

        $all_batch_year = $collection->unique('batch_year');

        if ($request->ajax()) {

            $student2 = DB::table('student_details as sd')->select('ug_app.id as ug_id', 'ug_app.stu_id as ug_stu_id', 'ug_app.payment_status as ug_payment_status', 'ug_app.form_status as ug_form_status', 'sd.*', 'pg_app.*', 'pg_app.id as pg_id', 'pg_app.stu_id as pg_stu_id', 'pg_app.payment_status as pg_payment_status', 'pg_app.form_status as pg_form_status', 'sd.id as student_id', 'c.name as course_name', 'c.id as course_id')
                ->leftJoin('ug_examination_applications as ug_app', 'sd.id', 'ug_app.stu_id')
                ->leftJoin('pg_examination_applications as pg_app', 'sd.id', 'pg_app.stu_id')
                ->leftJoin('courses as c', 'c.id', 'sd.course_id')
                ->orWhere('ug_app.form_status', 2)
                ->orWhere(['ug_app.payment_status' => 1])
                ->orWhere('pg_app.form_status', 2)
                ->orWhere('pg_app.payment_status', 1)
            // ->where('up_app.form_status',2)
                ->get();

            // return $request;

            // dd($student2);

            return DataTables::of($student2)
                ->addIndexColumn()
                ->filter(function ($instance) use ($request) {
                    // dd($instance);
                    //dd( $request->get('batch_year'));
                    if (!empty($request->get('batch_year'))) {
                        $instance->collection = $instance->collection->where('batch_year', $request->get('batch_year'));
                    }
                    if (!empty($request->get('sem_id'))) {
                        $instance->collection = $instance->collection->where('current_semester', $request->get('sem_id'));
                    }
                    if (!empty($request->get('course_val'))) {
                        $instance->collection = $instance->collection->where('course_id', $request->get('course_val'));
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
                    // dd($row['name']); student_id

                    $college_name = StudentDetails::find($row->student_id);
                    $college_name = $college_name->collegeName();

                    return $college_name;
                })
                ->rawColumns(['name', 'college_name'])
                ->make(true);
        }

        return view('mark_entry.index', compact('student', 'department', 'all_batch_year', 'course'));
    }

    public function addmark($id, $course, $sem, $dep_id)
    {

        if ($dep_id == 1) {
            $academic = AcademicCourseStructure::where('course_id', $course)->where('semester', $sem)->where('dep_id', $dep_id)->get();

            $appid = UgExaminationApplication::where('stu_id', $id)->select('id')->first();
            $appid = $appid->id;

            return view('mark_entry.addmark', compact('academic', 'id', 'appid', 'course', 'sem', 'dep_id'));
        } elseif ($dep_id == 2) {

            $academic = AcademicCourseStructure::where('course_id', $course)->where('semester', $sem)->where('dep_id', $dep_id)->get();

            $appid = PgExaminationApplication::where('stu_id', $id)->select('id')->first();
            $appid = $appid->id;

            return view('mark_entry.addmark', compact('academic', 'id', 'appid', 'course', 'sem', 'dep_id'));
        } else {

        }
    }

    public function addmarkstore(Request $request)
    {
       
        if ($request->dep_id == 1) {
            $mark = new Ugstudentmark();
            $mark->stu_id = $request->stu_id;
            $mark->app_id = $request->appid;
            $mark->department_id = $request->dep_id;
            $mark->course_id = $request->course_id;

            $mark->semester = $request->semester;

            $mark->subject_id = json_encode($request->subject_id);
            $mark->secure_mark = json_encode($request->securemark);
//    $mark->practical_mark=$request->stu_id;
            $mark->save();
        } elseif ($request->dep_id == 2) {
            
            $mark = new Pgstudentmark();
            $mark->stu_id = $request->stu_id;
            $mark->app_id = $request->appid;
            $mark->department_id = $request->dep_id;
            $mark->course_id = $request->course_id;

            $mark->semester = $request->semester;

            $mark->subject_id = json_encode($request->subject_id);
            $mark->secure_mark = json_encode($request->securemark);
//    $mark->practical_mark=$request->stu_id;
            $mark->save();
        }else{

        }
        return redirect()->to('/mark-entry-list')->with(['message' => 'Mark Entered Successfully']);

    }

    public function appliedstudentlist(){
       

        // $ugapplied = UgExaminationApplication::where('app_status', '1')->get();
        $ugapplied = UgExaminationApplication::select('student_details.*','course_fors.course_for as dept','colleges.name as clgname','uea.app_status as status')
            ->wherein('uea.app_status', [1 ,2, 3,4])
            ->from('ug_examination_applications as uea')
            ->leftJoin('student_details', 'uea.stu_id', '=', 'student_details.id')
            ->leftJoin('course_fors', 'student_details.department_id', '=', 'course_fors.id')
            ->leftJoin('colleges', 'student_details.clg_id', '=', 'colleges.id')
            
           
            ->get();

            $pgapplied = PgExaminationApplication::select('student_details.*','course_fors.course_for as dept','colleges.name as clgname','uea.app_status as status')
            ->wherein('uea.app_status', [1 ,2, 3,4])
            ->from('pg_examination_applications as uea')
            ->leftJoin('student_details', 'uea.stu_id', '=', 'student_details.id')
            ->leftJoin('course_fors', 'student_details.department_id', '=', 'course_fors.id')
            ->leftJoin('colleges', 'student_details.clg_id', '=', 'colleges.id')
            
           
            ->get();
                     

        
        // $ugstudent=StudentDetails::where('id',);
       
        return view('applied_student.applied_student',compact('ugapplied','pgapplied'));

    }

    public function appliedstudentview($id){
      

        $appliedstu = StudentDetails::where('id',$id)->first();
         $departmentid= $appliedstu->department_id;
         $appliedstu = StudentDetails::where('id',$id)->first();
         $studentdetails = StudentDetails::select('sd.*', 'colleges.name as clg_name', 'course_fors.course_for as departmentname', 'courses.name as coursename', 'student_addresses.*', 'student_education_details.*', 'student_education_details.qualification as qualification', 'student_documents.*', 'prsdis.district_name as present_dis', 'perdis.district_name as per_district')
            ->where('sd.id', $id)
            ->from('student_details as sd')
            ->leftJoin('colleges', 'sd.clg_id', '=', 'colleges.id')
            ->leftJoin('course_fors', 'sd.department_id', '=', 'course_fors.id')
            ->leftJoin('courses', 'sd.course_id', '=', 'courses.id')
            ->leftJoin('student_addresses', 'sd.id', '=', 'student_addresses.student_id')
            ->leftJoin('student_education_details', 'sd.id', '=', 'student_education_details.student_id')
            ->leftJoin('student_documents', 'sd.id', '=', 'student_documents.student_id')
            ->leftJoin('district as prsdis', 'student_addresses.present_district_id', '=', 'prsdis.id')
            ->leftJoin('district as perdis', 'student_addresses.permanent_district_id', '=', 'perdis.id')
            ->first();

            $qualification_details = json_decode($studentdetails->qualification);
         
         if($departmentid==1){
            
            $appstatus=UgExaminationApplication::where('stu_id',$id)->first(['app_status']);
            return view('applied_student.ug_view_applied_student',compact('appliedstu','id','departmentid','appstatus','studentdetails','qualification_details'));
         }else{
           
            $appstatus=PgExaminationApplication::where('stu_id',$id)->first(['app_status']);
            return view('applied_student.pg_view_applied_student',compact('appliedstu','id','departmentid','appstatus','studentdetails','qualification_details'));
         }
        


      

        
        

    }

    public function verifyStudentApplied(Request $request)
  
    {
        // return $request;
      if($request->department_id==1){
        $student = UgExaminationApplication::where('stu_id', $request->id)->first();
        // $student->remarks = $request->remarks;
        $student->app_status = $request->status;
        $student->update();
        return redirect()->back();

      }else{
        $student = PgExaminationApplication::where('stu_id', $request->id)->first();
        // $student->remarks = $request->remarks;
        $student->app_status = $request->status;
        $student->update();
        return redirect()->back();
      }
       

    }
}

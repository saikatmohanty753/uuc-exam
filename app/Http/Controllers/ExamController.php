<?php

namespace App\Http\Controllers;

use App\Models\BseExam;
use App\Models\BseExamine;
use App\Models\CourseFor;
use App\Models\ExamNoticeType;
use App\Models\FeesMaster;
use App\Models\Notice;
use App\Models\SemesterDetails;
use App\Models\StudentAddress;
use App\Models\StudentDetails;
use App\Models\StudentEducationDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

use function Ramsey\Uuid\v1;

class ExamController extends Controller
{
    public function regular_exam_notice()
    {
        // return Auth::user()->clg_user_id;
        // return session()->all();
        
       $courseFor = CourseFor::get(['course_for','id']);
       $ug_regular_notice = Notice::where('notice_type', 2)->whereIn('notice_sub_type',[2])->get();

       return view('exam.regular_exam_notice',compact('courseFor','ug_regular_notice'));
    }

    public function apply_regular_exam($id,$sem_no)
    {
        //return $sem_no;
        $student_details = StudentDetails::find($id);
        $student_address = StudentAddress::where('student_id',$id)->first();
        $student_education = StudentEducationDetails::where('student_id',$id)->first();
        $edu_data = json_decode($student_education->qualification);
        $edu_hsc = $edu_data->hsc;
        $edu_intermediate = $edu_data->intermediate;
        $fee = FeesMaster::all();
        //return $fee[0]->amount;
        return view('exam.regular_exam',compact('student_details','student_address','edu_hsc','edu_intermediate','id','fee','sem_no'));
    }

    public function student_list(Request $request)
    {
       // dd(auth()->user()->clg_user_id);
        $year = now()->year;
        $month = now()->month;
        $ug_totsem = 8;
        $student = StudentDetails::where('department_id','1')->where('batch_year','!=','null')->where('clg_id',auth()->user()->clg_user_id)->get(['batch_year','id']);
        $collection = collect($student);


        
        $all_batch_year = $collection->unique('batch_year');

        // $filtered = $unique->filter(function ($value, $key) {
        //     return $only_year = $value->batch_year != '' ;
        // });

         //$all_batch_year = $filtered->all();
       
         //foreach ($all_batch_year as $key => $value) {
         foreach ($student as $key => $value) {
           //print($value);
          // dd($value);
           //$value->batch_year;
           $explode = explode('-',$value->batch_year);
           //print($explode[0]);
           $batch[] = $explode[0];

           $batch_totl = $year - $batch[$key];

           if($month > 6)
           {
            $semister_left = ($ug_totsem -($batch_totl * 2))-1;
            $sem_strt_frm = ($ug_totsem - $semister_left) + 1;
           }else{
            $semister_left = $ug_totsem -($batch_totl * 2);
            $sem_strt_frm = ($ug_totsem - $semister_left) + 1;
           }

           //dd($semister_left);
           $semi_name = [];
           //$semi_name = collect([]);
           if($semister_left != 0){
            for ( $i= $sem_strt_frm; $i <= $ug_totsem; $i++) {
               // $semi_name[] = $i;
                //$semi_name->push($i);
                if($i%2 != 0){
                    //print $i ;
                    $semi_name[] = $i;
                }
            }
           }
           
          //dd($semi_name);
           //print($batch_totl);
          // $value['stu_id'] = $value->id;
           $value['stu_completed'] = $batch_totl;
           $value['semister_left'] = $semister_left;
           $value['semister_name'] = $semi_name;
           $batch_totl2[] = $value;

         }
        // return 'das';
      //return $batch_totl2;

        $eligible_student = collect($batch_totl2);
          
          $student_list = $eligible_student->filter(function ($value, $key) {
            return  $value['stu_completed'] < 4 ;
          });
        //return $student_list;

        //$student_details = StudentDetails::
        $student_details2 = [];
        foreach ($student_list as $key => $value) {
// return $value;
            //dd($value);
            $student_id = $value->id;
            

            if ($request->ajax()) {
               // return 'ajax';
                $student_details = StudentDetails::where('id',$student_id)->where('batch_year',$request->status)->get(['clg_id','department_id','course_id','name','batch_year']);
            }else{
               // return 'normal';
                $student_details = StudentDetails::where('id',$student_id)->get(['clg_id','department_id','course_id','name','batch_year']);
            }

        //         $student_details->stu_completed = $value->stu_completed;
        //     //return $student_details;

        //         $student_details->semister_left = $value->semister_left;
        //         $student_details->semister_name = $value->semister_name;
        //         $student_details->batch_year = $value->batch_year;
        //         $student_details->student_id = $value->id;
        //    // return $student_details;
       // $student_details2 = [];
        foreach ($student_details as $key2 => $item) {
            $item->stu_completed = $value->stu_completed;
            $item->semister_left = $value->semister_left;
            $item->semister_name = $value->semister_name;
            $item->batch_year = $value->batch_year;
            $item->student_id = $value->id;
            $student_details2[] = $item;
        }

          //  $student_details2[] = $item;
            // $all_student[] = $student_details2;
            
        }

        //return $student_details2;
        

        if ($request->ajax()) {
            return Datatables::of($student_details2)->addIndexColumn()->make(true);
        }else{
            return view('exam.student_list',compact('student_details2','all_batch_year'));
        }
        
        //$student_details2 = StudentDetails::all();

        //return view('exam.student_list',compact('student_details2','all_batch_year'));
    }

    

    public function regular_exam_store(Request $request,$id,$sem_no)
    {
        //return 1;
        //return $request;
        //return $sem_no;
        if($request->fee_paid == 'on'){
            $fee_paid = 1;
        }else{
            $fee_paid = 0;
        }
        

        if ($request->bde_year_hid) {
            //return 1;
            for ($i = 0; $i < count($request->bde_year_hid); $i++) {
                $BseExam = new BseExam();
                $BseExam->stu_id = $id;
                $BseExam->year = $request->bde_year_hid[$i];
                $BseExam->name_of_exam = $request->bde_exam_hid[$i];
                $BseExam->roll_no = $request->bde_roll_no_hid[$i];
                $BseExam->regd_no = $request->bde_regd_no_hid[$i];
                $BseExam->save();
            }
        }
        if ($request->bde_course_hid) {
            //return 1;
            for ($i = 0; $i < count($request->bde_course_hid); $i++) {
                $BseExamine = new BseExamine();
                $BseExamine->stu_id = $id;
                $BseExamine->course = $request->bde_course_hid[$i];
                $BseExamine->theory_practical = $request->bde_theo_prac_hid[$i];
                
                $BseExamine->description = $request->bde_description_hid[$i];
                $BseExamine->save();
            }
        }


        if($request->addmission_exam == 'on'){
            $addmission_exam = 'yes';
        }else{
            $addmission_exam = 'no';
        }

        $student = StudentDetails::find($id);
       // $student->payment_status = $fee_paid;
        $student->addmission_exam = $addmission_exam;
        $student->save();

        $semester_details = DB::table('semester_details')->where('stu_id',$id)->where('semester_no',$sem_no)
        ->update([
            'payment_status' => $fee_paid
        ]);

        return redirect()->route('regular_exam_draft',[$id,$sem_no]);

       // return view('')
    }

    public function regular_exam_draft($id,$sem_no)
    {
        //return $id.'draft';
        //return $sem_no;
        $student_details = StudentDetails::find($id);
        $student_address = StudentAddress::where('student_id',$id)->first();
        $student_education = StudentEducationDetails::where('student_id',$id)->first();
        $edu_data = json_decode($student_education->qualification);
        $edu_hsc = $edu_data->hsc;
        $edu_intermediate = $edu_data->intermediate;
        $fee = FeesMaster::all();
        $bse_exams = BseExam::where('stu_id',$id)->get();
        $semester_details = SemesterDetails::where('semester_no',$sem_no)->first(['payment_status']);
        //$payment_status = $semester_details->payment_status;
        $bse_examines  = BseExamine::where('stu_id',$id)->get();

        return view('exam.regular_exam_draft',compact('student_details','student_address','edu_hsc','edu_intermediate','id','fee','bse_exams','bse_examines','sem_no','semester_details'));

    }

    //delete_student_examine
    public function delete_student_examine(Request $request)
    {   
        // return $request;

        $bse_examines = BseExamine::find($request->exam_id);
        $bse_examines->delete();

        $bse_examines_data = BseExamine::where('stu_id', $request->stu_id)->get();
         return response()->json($bse_examines_data);
    }
    public function delete_student_exam(Request $request)
    {   
        // return $request;

        $bse_exam = BseExam::find($request->exam_id);
        $bse_exam->delete();

        $bse_exam_data = BseExam::where('stu_id', $request->stu_id)->get();
         return response()->json($bse_exam_data);
    }

    public function regular_exam_draft_store(Request $request,$id,$sem_no)
    {
        //return $id;
        if ($request->bde_year_hid) {
            //return 1;
            for ($i = 0; $i < count($request->bde_year_hid); $i++) {
                $BseExam = new BseExam();
                $BseExam->stu_id = $id;
                $BseExam->year = $request->bde_year_hid[$i];
                $BseExam->name_of_exam = $request->bde_exam_hid[$i];
                $BseExam->roll_no = $request->bde_roll_no_hid[$i];
                $BseExam->regd_no = $request->bde_regd_no_hid[$i];
                $BseExam->save();
            }
        }
        if ($request->bde_course_hid) {
            //return 1;
            for ($i = 0; $i < count($request->bde_course_hid); $i++) {
                $BseExamine = new BseExamine();
                $BseExamine->stu_id = $id;
                $BseExamine->course = $request->bde_course_hid[$i];
                $BseExamine->theory_practical = $request->bde_theo_prac_hid[$i];
                
                $BseExamine->description = $request->bde_description_hid[$i];
                $BseExamine->save();
            }
        }


        if($request->addmission_exam == 'on'){
            $addmission_exam = 'yes';
        }else{
            $addmission_exam = 'no';
        }

        if($request->fee_paid == 'on'){
            $fee_paid = 1;
        }else{
            $fee_paid = 0;
        }

        $student = StudentDetails::find($id);
       // $student->payment_status = $fee_paid;
        $student->addmission_exam = $addmission_exam;
        $student->save();

        $semester_details = DB::table('semester_details')->where('stu_id',$id)->where('semester_no',$sem_no)
        ->update([
            'payment_status' => $fee_paid
        ]);

        return redirect()->back();

    }

    public function regular_exam_preview($id)
    {
        //return $id;
        $student_details = StudentDetails::find($id);
        $student_address = StudentAddress::where('student_id',$id)->first();
        $student_education = StudentEducationDetails::where('student_id',$id)->first();
        $edu_data = json_decode($student_education->qualification);
        $edu_hsc = $edu_data->hsc;
        $edu_intermediate = $edu_data->intermediate;
        $fee = FeesMaster::all();
        $bse_exams = BseExam::where('stu_id',$id)->get();
        $bse_examines  = BseExamine::where('stu_id',$id)->get();

        return view('exam.regular_exam_preview',compact('student_details','student_address','student_education','edu_hsc','edu_intermediate','fee','bse_exams','bse_examines','id'));

    }

    public function regular_exam_final(Request $request, $id)
    {
        $student = StudentDetails::find($id);
        $student->status = 9;
        //$student->addmission_exam = $addmission_exam;
        $student->save();
        return redirect()->route('student_list');
    }


    
}

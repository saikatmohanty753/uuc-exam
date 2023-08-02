<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Course;
use App\Models\CourseFor;
use App\Models\EntryExcelFile;
use Excel;
use App\Exports\ExportExeclSem;

class SemExamController extends Controller
{
    public function index(){
        $course_type = DB::table('course_fors')->whereIn('id',[1,2])->where('status', 1)->orderBy('course_for','asc')->get();
        return view('sem_exam.index',compact('course_type'));
    }

    public function sem_mark_ajax(Request $request){
        if(empty($request->course_id) || empty($request->sem_id) || empty($request->batch_id)){
            $html = '<h1 style="color:red">No record Found</h1>';
            return response()->json([$html]);
        }
        $total_count = $practical_count = $theory_count = 0;
        $theory = array();
        $practical = array();
        $m =0;
        $course_id = $request->course_id;
        $sem_id = $request->sem_id;
        $batch_id = $request->batch_id;
        $course = Course::where('id',$course_id)->first();
        $curriculum = DB::table('curriculum_details')->where('course_id',$course_id)->orderBy('id', 'desc');
        if($curriculum->exists())
        {
            $curriculum = $curriculum->first();
            $curriculum_papers = DB::table('curriculum_paper_sem_details')->where('is_verified',1)->where('sem_no',$sem_id)->where('curriculum_id',$curriculum->id)->orderBy('sem_no', 'asc')->get();
            if($curriculum_papers->count() > 0){
                foreach($curriculum_papers as $key=>$paper){
                    $update_curriculum = DB::table('curriculum_detail_logs')->where('unique_key',$paper->unique_key)->where('curriculum_id',$paper->curriculum_id)->where('batch',$batch_id)->where('is_verified',1)->orderBy('id','desc')->first();
                    if(!empty($update_curriculum->paper_type_id) && $update_curriculum->paper_type_id == 1){
                        $theory[$key] = $update_curriculum;
                    }else if($paper->paper_type_id == 1){
                        $theory[$key] = $paper;
                    }
                    if(!empty($update_curriculum->paper_type_id) && $update_curriculum->paper_type_id == 2){
                        $practical[$key] = $update_curriculum;
                    }else if($paper->paper_type_id == 2){
                        $practical[$key] = $paper;
                    }
                    if(!empty($update_curriculum->paper_type_id) && $update_curriculum->paper_type_id == 3){
                        $practical[$key] = $update_curriculum;
                        $theory[$key] = $update_curriculum;
                    }else if($paper->paper_type_id == 3){
                        $practical[$key] = $paper;
                        $theory[$key] = $paper;
                    }
                    $m++;
                }
                $theory_count = 5 * count($theory);
                $practical_count = 5 * count($practical);
                $total_count = (int)$theory_count + (int)$practical_count + 3;
            }
        }
        if($m == 0){
            $html = '<h1 style="color:red">Curriculum not added for '.ordinal($sem_id).' semester</h1>';
            return response()->json([$html]);
        }
        return response()->json([view('sem_exam.sem_mark_ajax',compact('course_id','sem_id','batch_id','course','total_count','theory','practical','theory_count','practical_count'))->render()]);
    }

    public function getCourseList(Request $request)
    {
        $options = '<option value="">Select</option>';
        $opt = '<option value="">Select</option>';
        $sems = '<option value="">Select</option>';
        if(!empty($request->course_type))
        {
            $courseMap = Course::where('course_for',$request->course_type)->orderBy('id','desc')->get();
            if($courseMap->count() > 0)
            {
                foreach($courseMap as $course)
                {
                    $options .= '<option value="'.$course->id.'">'.$course->name.'</option>';
                }
            }

            $course_for = CourseFor::where('id',$request->course_type)->first();
            if(!empty($course_for->course_duration))
            {
                $currentYear = date('Y');
                for($i = $currentYear;$i>=($currentYear - $course_for->course_duration); $i--)
                {
                    $opt .= '<option value="'.($i.'-'.($i+$course_for->course_duration)).'">'.$i.'-'.($i+$course_for->course_duration).'</option>';
                }
            }
        }
        return response()->json(['html'=>$options,'batch'=>$opt]);
    }

    public function getSemsList(Request $request){
        $options = '<option value="">Select</option>';
        if(!empty($request->course_id))
        {
            $sems = DB::table('courses')->where('id',$request->course_id)->orderBy('id','desc')->first();
            if(!empty($sems->total_sem) && $sems->total_sem > 0)
            {
                for($i = 1;$i<= (int)$sems->total_sem; $i++)
                {
                    $options.= '<option value="'.$i.'">'.$i.'</option>';
                }
            }
        }
        return response()->json(['html'=>$options]);
    }

    public function downloadExcel($id='')
    {
        $data = (object) json_decode(decrypt($id));
        return Excel::download(new ExportExeclSem($data),time().'semester('.$data->batch_id.').xlsx');
        #return view('sem_exam.excel_import',compact('course_id','sem_id','batch_id','course','total_count','theory','practical_count','theory_count','practical'));
    }

    public function saveExcelSems(Request $request)
    {
        $request->validate([
            'token_entyp'=>'required',
            'excel_file'=>'required|mimes:xlsx,xls',
        ],[
            'token_entyp.required'=>'Inavlid access',
            'excel_file.required'=>'Please upload a file',
            'excel_file.mimes'=>'Please upload excel file, downloaded from the list below',
        ]);
        if($request->hasFile('excel_file'))
        {
            $file = $request->file('excel_file');
            $file->getClientOriginalExtension();
        }else{
            return back()->with('error','Please upload a file');
        }
        $token_entyp = json_decode(decrypt($request->token_entyp));
        dump($token_entyp);
        dd($request->all());
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\CourseFor;
use App\Models\ExamNoticeType;
use App\Models\Notice;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function regular_exam_notice()
    {
    
       $courseFor = CourseFor::get(['course_for','id']);
       $ug_regular_notice = Notice::where('notice_type', 2)->whereIn('notice_sub_type',[2])->get();

       return view('exam.regular_exam_notice',compact('courseFor','ug_regular_notice'));
    }

    public function apply_regular_exam()
    {
        return view('exam.regular_exam');
    }
    
}

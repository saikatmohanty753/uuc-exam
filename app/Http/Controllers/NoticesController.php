<?php

namespace App\Http\Controllers;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseFor;
use App\Models\Notice;
use Carbon\Carbon;
use App\Models\ExamNoticeType;
use Illuminate\Support\Facades\DB;

class NoticesController extends Controller
{
    function __construct()

    {

        $this->middleware('permission:notice-list|notice-create|notice-edit|notice-delete', ['only' => ['index', 'store']]);

        $this->middleware('permission:notice-create', ['only' => ['create', 'store']]);

        $this->middleware('permission:notice-edit', ['only' => ['edit', 'update']]);

        $this->middleware('permission:notice-delete', ['only' => ['destroy']]);
    }
    public function index()
    {
        $notice = Notice::where('notice_type', '2')->get();
        return view('notices.notices', compact('notice'));
    }

    public function create()
    {
        $course = Course::all();
        $dept = CourseFor::all();
        $examnotice = ExamNoticeType::all();
        return view('notices.add_notice', compact('course', 'dept', 'examnotice'));
    }

    public function store(Request $request)
    {
        $startDate = Carbon::parse($request->start_date);
        $startDate->hour   = 00;
        $startDate->minute = 00;
        $startDate->second = 01;
        $expDate = Carbon::parse($request->exp_date);
        $expDate->hour   = 59;
        $expDate->minute = 59;
        $expDate->second = 59;
        $notice = new Notice();
        $notice->notice_type = 2;
        $notice->notice_sub_type = $request->notice_type;
        $notice->department_id = $request->department;
        // $notice->course_id = $request->course != '' ? implode(',', $request->course) : '';
        $notice->semester = $request->semester != '' ? implode(',', $request->semester) : '';
        $notice->start_date = $startDate;
        $notice->exp_date = $expDate;
        $notice->details = $request->details;
        $notice->save();
        return redirect()->action([NoticesController::class, 'index'])->with('success', 'Notification Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Notice::select('notices.*', 'course_fors.course_for as course', 'courses.name as couse_name')
            ->leftJoin('course_fors', 'notices.department_id', "=", 'course_fors.id')
            ->leftJoin('courses', 'notices.course_id', "=", 'courses.id')
            ->where('notices.id', $id)
            ->first();


        //  $notice = Notice::where('id', $id)->first();
        return view('notices.view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function redirectToNotice(Request $request, $id)
    {
        // return $id;
        /*
            Mid Sem Mark Entry
            Exam Notice
            Result Publish
            Semester Form Fill up
            Other
         */

         $notice = Notice::find($id);
         $dep = $notice->department_id;
         if($notice->notice_type == 2 && $notice->notice_type == 1){

         } elseif($notice->notice_type == 2 && $notice->notice_type == 2){

         } elseif($notice->notice_type == 2 && $notice->notice_type == 3){

         } elseif($notice->notice_type == 2 && $notice->notice_type == 4){

         } elseif($notice->notice_type == 2 && $notice->notice_type == 5){

         }else{

         }
    }
}

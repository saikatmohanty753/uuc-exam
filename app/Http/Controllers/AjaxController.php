<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Notice;
use App\Models\User;
use App\Models\CourseFor;
use App\Models\StudentDetails;
use App\Notifications\ExamNotice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AjaxController extends Controller
{
    public function getCourse(Request $request)
    {
        $course = Course::where('course_for', $request->dep_id)->get();
        return response()->json($course);
    }

    public function publishNotice(Request $request)
    {
        //uuc-Exam-Section = 13
        //College-exam-Section = 17
        //student = 3

        $check = Notice::where([['id', $request->id], ['status', 0]])->count();
        if ($check == 1) {
            Notice::where('status', 0)
                ->where('id', $request->id)
                ->update(['status' => 1, 'published_date' => Carbon::now()]);
            $notice = Notice::find($request->id);
            $status = "Published";
            if ($notice->notice_type == 2) {
                $users = User::whereIn('role_id', [13, 17, 3])->get();
                foreach ($users as $key => $user) {
                    $user->notice_id = $request->id;
                    $user->notify(new ExamNotice());
                }
            }

            // $user->notify(new Notice());
        }

        return response()->json('success');
    }

    public function getSemester(Request $request)
    {
        $semester = CourseFor::where('id', $request->dep_id)->first(['semester']);
        return response()->json($semester->semester);
    }

    public function findByRollNo(Request $request)
    {

        $clgId = Auth::user()->clg_user_id;
        $clg_id = intval(substr($request->roll_no, 0, 3));
        if ($clgId == $clg_id) {
            $data = StudentDetails::where('roll_no', $request->roll_no)->first();
            $data = [
                'type' => 'success',
                'msg' => 'Student Details',
                'data' => $data,
            ];
            return response()->json($data);
        } else {
            $data = [
                'type' => 'error',
                'msg' => 'Student details not found.',
                'data' => '',
            ];
            return response()->json($data);
        }
    }
}

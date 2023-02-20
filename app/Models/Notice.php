<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    use HasFactory;

    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(CourseFor::class, 'department_id', 'id');
    }

    public function noticeType(){
        return $this->belongsTo(ExamNoticeType::class, 'notice_sub_type', 'id');
    }


    public function noticeColor(){
        $chk = $this->notice_sub_type;
        if ($chk == 1) {
            return 'badge-info';
        } elseif ($chk == 2) {
            return 'badge-primary';

        } elseif ($chk == 3) {
            return 'badge-success';

        } elseif ($chk == 4) {
            return 'badge-danger';
        } else {
            return  "warning";
        }
    }
}

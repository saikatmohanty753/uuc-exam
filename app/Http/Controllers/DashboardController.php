<?php

namespace App\Http\Controllers;

use App\Models\College;
use App\Models\CollegeAffiliation;
use App\Models\Course;
use App\Models\RenewalAffiliation;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $chk_role = $this->checkUser(Auth::user()->role_id);
        if ($chk_role == 0) {
            Auth::logout();
            return redirect('/login')->with('error', 'The username and password you entered did not match our records');
        }
        if (Str::lower(Auth::user()->role->name) == 'exam-section') {
            return $this->adminDashboard();
        } elseif (Str::lower(Auth::user()->role->name) == 'uuc-exam-section') {
            return $this->collegeExamSection();
        } elseif (Str::lower(Auth::user()->role->name) == 'college-exam-section') {
            return $this->collegeExamSection();
        } else {
            Auth::logout();
            return redirect('/login')->with('error', 'The username and password you entered did not match our records');
        }
    }

    public function checkUser($id)
    {
        $role = [15];
        return in_array($id, $role) == true ? 1 : 0;
    }

    public function adminDashboard()
    {
        return view('dashboard.admin.index');
    }


    public function collegeExamSection()
    {
        return view('dashboard.college-examination.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Livewire\Notification as LivewireNotification;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClgNoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notification =  Auth::user()->Notifications;
        $noticeIds = [];
        foreach ($notification as $key => $value) {
            $noticeIds[] = [
                'notice_id' => $value['data']['notice_id'],
                'notification_id' => $value->id
            ];
        }
        $notice = [];
        foreach ($noticeIds as $value) {
            $data = Notice::where('id', $value['notice_id'])->where('notice_type', '2')->first();
            if ($data) {
                $data['notification_id'] = $value['notification_id'];
                $notice[] = $data;
            }
        }
        $OtherNotice = [];
       /*  foreach ($noticeIds as $item) {
            $data = Notice::where('id', $item['notice_id'])->where('notice_type', '3')->first();
            if ($data) {
                $data['notification_id'] = $item['notification_id'];
                $OtherNotice[] = $data;
            }
        } */

        return view('publish-notices.index', compact('notice', 'OtherNotice'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $notification_id)
    {
        Auth::user()->Notifications->where('id', $notification_id)->markAsRead();

        $data = Notice::select('notices.*', 'course_fors.course_for as course')
            ->leftJoin('course_fors', 'notices.department_id', "=", 'course_fors.id')
            ->where('notices.id', $id)
            ->first();
        return view('publish-notices.view', compact('data'));
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
}

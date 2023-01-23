<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamNoticeType;

class NoticeTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
          $examnotice = ExamNoticeType::all();
       
        return view('exam_notice.index',compact('examnotice'));
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

        $this->validate($request, [
            'examnotice' => 'required|unique:exam_notice_types,notice_name',
        ]);
      $examnotice=new ExamNoticeType();
      $examnotice->notice_name=$request->examnotice;
      $examnotice->save();
      return redirect()->action([NoticeTypeController::class, 'index'])->with('success', 'Exam Notice Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [
            'examnotice' => 'required|unique:exam_notice_types,notice_name,'. $id,
        ]);
        $examnotice= ExamNoticeType::find($id);
      $examnotice->notice_name=$request->examnotice;
      $examnotice->save();
      return redirect()->route('notice-type.index')
      ->with('success', 'Notice title  updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ExamNoticeType::find($id)->delete();
        return redirect()->route('notice-type.index')
            ->with('success', 'Notice title  deleted successfully');
    }
}

@extends('layouts.app')
@section('content')
    <div class="row">
        {{-- {{dd($departmentid)}} --}}
        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Preview Applied Student
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="logo-2 none-2" style="text-align: center">
                            <a href="login-25.html">
                                <img src="{{ asset('backend/img/logo.jpg') }}" alt="logo">
                            </a>
                        </div>
                        @if ($appstatus->app_status == 3)
                            <div class="alert alert-danger mt-4" role="alert">
                                <p>Application has been rejected.</p>
                                {{-- <p>Please contact the admissions office for further information.</p> --}}
                            </div>
                        @elseif($appstatus->app_status == 2)
                            <div class="alert alert-success mt-4" role="alert">
                                <p>Application has been Verified.</p>
                                {{-- <p>Please contact the admissions office for further information.</p> --}}
                            </div>
                        @endif
                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                            <h6 class="text-light">
                                Personal Information
                            </h6>-
                        </div>
                        
                    </div>
                    <div class="panel-tag border-left-0">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>


                                            <tr>
                                                <th>Course Name:</th>
                                                <td>{{ $studentdetails->coursename }}</td>

                                                <th> Name: </th>
                                                <td>{{ $studentdetails->name }}</td>
                                            </tr>

                                            <tr>
                                                <th>Father's Name:</th>
                                                <td>{{ $studentdetails->father_name }}</td>

                                                <th>Caste Category:</th>
                                                <td>{{ $studentdetails->cast }}</td>


                                            </tr>
                                            <tr>
                                                <th>If Specially
                                                    Abled:</th>
                                                <td>{{ $studentdetails->specially_abled == 1 ? 'Yes' : 'No' }}</td>

                                                <th>Mobile No:</th>
                                                <td>{{ $studentdetails->mobile }}</td>


                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>

                                            <tr>
                                                <th>Email:</th>
                                                <td>{{ $studentdetails->email }}</td>
                                                <th>Mother's Name:</th>
                                                <td>{{ $studentdetails->mother_name }}</td>

                                            </tr>
                                            <tr>
                                                <th>DOB:</th>
                                                <td>{{ $studentdetails->dob }}</td>
                                                <th>Gender:</th>
                                                <td>{{ $studentdetails->gender }}</td>


                                            </tr>
                                            <tr>
                                                <th colspan="2">Aadhar No:</th>
                                                <td>{{ $studentdetails->aadhaar_no }}</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div
                        class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                        <h6 class="text-light">
                            Present Address Information
                        </h6>
                    </div>
                    <div class="panel-tag border-left-0">
                        <div class="row">

                            <div class="col-sm-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        {{-- {{dd($studentdetails)}} --}}
                                        <tbody>

                                            <tr>
                                                <th>State:</th>
                                                <td>{{ $studentdetails->present_state }}</td>
                                                <th>District:</th>
                                                <td>{{ $studentdetails->present_dis }}</td>



                                            </tr>
                                            <tr>
                                                <th>Pincode:</th>
                                                <td>{{ $studentdetails->present_pin_code }}</td>
                                                <th>Present Address:</th>
                                                <td>{{ $studentdetails->present_address }}</td>

                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div
                        class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                        <h6 class="text-light">
                            Permanent Address Information
                        </h6>
                    </div>
                    <div class="panel-tag border-left-0">
                        <div class="row">

                            <div class="col-sm-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>

                                            <tr>
                                                <th>State:</th>
                                                <td>{{ $studentdetails->permanent_state }}</td>
                                                <th>District:</th>
                                                <td>{{ $studentdetails->per_district }}</td>


                                            </tr>
                                            <tr>
                                                <th>Pincode:</th>
                                                <td>{{ $studentdetails->permanent_pin_code }}</td>
                                                <th>Permanent Address:</th>
                                                <td>{{ $studentdetails->permanent_address }}</td>

                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div
                        class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                        <h6 class="text-light">
                            College Information
                        </h6>
                    </div>
                    <div class="panel-tag border-left-0">
                        <div class="row">

                            <div class="col-sm-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>

                                            <tr>
                                                <th>Last Attended College Name:</th>
                                                <td>{{ $studentdetails->clg_name }}</td>
                                                <th>Year of Passing Last Exam:</th>
                                                <td>{{ $studentdetails->year_of_passing }}</td>


                                            </tr>
                                            <tr>
                                                <th>Last Pursued Course Name:</th>
                                                <td>{{ $studentdetails->course_name }}</td>
                                                <th>Migration Certificate is availiable:</th>
                                                <td>{{ $studentdetails->is_migration_cert == 0 ? 'No' : 'Yes' }}</td>
                                            </tr>




                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div
                        class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                        <h6 class="text-light">
                            Qualification Details

                        </h6>
                    </div>
                    <div class="panel-tag border-left-0">
                        <div class="row">

                            <div class="col-sm-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th>Name of the Examinations Passed</th>
                                                <th>University/School/College</th>
                                                <th>Year of Passing</th>
                                                <th>Passing Month</th>
                                                <th>Roll no</th>
                                                <th>Divn. and Distn.</th>
                                                <th>Marks Secured</th>
                                                <th>Maximum Marks</th>
                                                <th>% of Marks</th>
                                            </tr>

                                            <tr>

                                                <td>{{ $qualification_details->hsc->course }}</td>
                                                <td>{{ $qualification_details->hsc->board }}</td>
                                                <td>{{ $qualification_details->hsc->passing_year }} </td>
                                                <td>{{ $qualification_details->hsc->month }}</td>
                                                <td>{{ $qualification_details->hsc->roll }}</td>
                                                <td>{{ $qualification_details->hsc->division }}</td>
                                                <td>{{ $qualification_details->hsc->mark }}</td>
                                                <td>{{ $qualification_details->hsc->total }}</td>
                                                <td>{{ $qualification_details->hsc->percentage }}</td>
                                            </tr>

                                            <tr>

                                                <td>{{ $qualification_details->intermediate->course }}</td>
                                                <td>{{ $qualification_details->intermediate->board }}</td>
                                                <td>{{ $qualification_details->intermediate->passing_year }} </td>
                                                <td>{{ $qualification_details->intermediate->month }}</td>
                                                <td>{{ $qualification_details->intermediate->roll }}</td>
                                                <td>{{ $qualification_details->intermediate->division }}</td>
                                                <td>{{ $qualification_details->intermediate->mark }}</td>
                                                <td>{{ $qualification_details->intermediate->total }}</td>
                                                <td>{{ $qualification_details->intermediate->percentage }}</td>
                                            </tr>


                                            {{-- <tr>

                                        <td>{{ $qualification_details->graduate->course }}</td>
                                        <td>{{ $qualification_details->graduate->board }}</td>
                                        <td>{{ $qualification_details->graduate->passing_year }} </td>
                                        <td>{{ $qualification_details->graduate->month }}</td>
                                        <td>{{ $qualification_details->graduate->roll }}</td>
                                        <td>{{ $qualification_details->graduate->division }}</td>
                                        <td>{{ $qualification_details->graduate->mark }}</td>
                                        <td>{{ $qualification_details->graduate->total }}</td>
                                        <td>{{ $qualification_details->graduate->percentage }}</td>
                                    </tr>

                                    <tr>

                                        <td>{{ $qualification_details->postGraduate->course }}</td>
                                        <td>{{ $qualification_details->postGraduate->board }}</td>
                                        <td>{{ $qualification_details->postGraduate->passing_year }} </td>
                                        <td>{{ $qualification_details->postGraduate->month }}</td>
                                        <td>{{ $qualification_details->postGraduate->roll }}</td>
                                        <td>{{ $qualification_details->postGraduate->division }}</td>
                                        <td>{{ $qualification_details->postGraduate->mark }}</td>
                                        <td>{{ $qualification_details->postGraduate->total }}</td>
                                        <td>{{ $qualification_details->postGraduate->percentage }}</td>
                                    </tr> --}}

                                            <tr>

                                                <td>{{ $qualification_details->other->course }}</td>
                                                <td>{{ $qualification_details->other->board }}</td>
                                                <td>{{ $qualification_details->other->passing_year }} </td>
                                                <td>{{ $qualification_details->other->month }}</td>
                                                <td>{{ $qualification_details->other->roll }}</td>
                                                <td>{{ $qualification_details->other->division }}</td>
                                                <td>{{ $qualification_details->other->mark }}</td>
                                                <td>{{ $qualification_details->other->total }}</td>
                                                <td>{{ $qualification_details->other->percentage }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div
                        class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                        <h6 class="text-light">
                            Document
                        </h6>
                    </div>
                    <div class="panel-tag border-left-0">
                        <div class="row">

                            <div class="col-sm-12">

                                <div class="table-responsive">
                                    <table class="table table-bordered ">
                                        <tbody>


                                            <tr>
                                                <th>Photo :</th>
                                                <th>Aadhaar Card:</th>
                                                <th>HSC Certificate:</th>
                                                <th>Migration Certificate:</th>




                                            </tr>

                                            <tr>
                                                <td><a href="javascript:void(0)"
                                                        onclick="upload_image_view('{{ asset($studentdetails->photo) }}')">
                                                        {{ !empty($studentdetails->photo) ? 'View Upload File' : 'Not Uploaded' }}</a>
                                                </td>

                                                <td><a href="javascript:void(0)"
                                                        onclick="upload_image_view('{{ asset($studentdetails->aadhaar_card) }}')">
                                                        {{ !empty($studentdetails->aadhaar_card) ? 'View Upload File' : 'Not Uploaded' }}</a>
                                                </td>

                                                <td><a href="javascript:void(0)"
                                                        onclick="upload_image_view('{{ asset($studentdetails->hsc_cert) }}')">
                                                        {{ !empty($studentdetails->hsc_cert) ? 'View Upload File' : 'Not Uploaded' }}</a>
                                                </td>

                                                <td><a href="javascript:void(0)"
                                                        onclick="upload_image_view('{{ asset($studentdetails->migration_cert) }}')">
                                                        {{ !empty($studentdetails->migration_cert) ? 'View Upload File' : 'Not Uploaded' }}</a>
                                                </td>
                                            </tr>


                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>


                    @if ($appstatus->app_status == 1)
                        <form action="{{ route('uuc-verify-appliedstu') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <input type="hidden" name="department_id" value="{{ $departmentid }}">
                            <div class="row">
                                <div class="col-sm-12 d-flex">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Remarks</label>
                                            <textarea name="remarks" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Status</label>
                                            <select class="form-control" name="status" id="regStatus">
                                                <option value="">Select</option>
                                                <option value="2">Verified</option>
                                                <option value="3">Rejected</option>
                                                <option value="4">Backed</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div
                                class="panel-content border-faded border-top-0 border-left-0 border-right-0 border-bottom-0 d-flex flex-row justify-content-center">

                                <button class="btn btn-outline-success waves-effect waves-themed ml-4" type="submit">Submit
                                </button>
                            </div>
                        </form>
                        {{-- {{dd($appstatus->app_status)}} --}}
                    @else
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <a href="{{ route('applied_student_list') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    @endif













                </div>
            </div>
        </div>


    </div>



    <!-- // upload image view -->
    <div class="modal fade" id="upload_image_view" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row" id="view_upload_image">
                        {{-- <img src="" alt="Upload_img" class="img-responsive card-img-top" id="view_upload_image">
                        <embed src="" frameborder="0" width="100%" id="view_upload_image" height="400px"> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    function upload_image_view(url)
    {
    
       
        $('#view_upload_image').html('<embed src="' + url +
                '" frameborder="0" width="100%" id="view_upload_image" height="400px">');
                $('#upload_image_view').modal('show');

    }
</script>
@endsection

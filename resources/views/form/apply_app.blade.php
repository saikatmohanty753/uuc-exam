@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Applied Application Details<span
                            class="badge badge-danger position-absolute pos-right">applicationStatus</span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="logo-2 none-2" style="text-align: center">
                            <a href="login-25.html">
                                <img src="{{ asset('backend/img/logo.jpg') }}" alt="logo">
                            </a>
                        </div>
                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-success-500">
                            <h6 class="text-light">
                                Personal Information
                            </h6>
                        </div>
                        <div class="panel-tag border-left-0">
                            <div class="row">
                                <div class="col-sm-6 d-flex">
                                    <div class="table-responsive">
                                        <table class="table table-clean table-sm align-self-end">
                                            <tbody>
                                                {{-- <tr>
                                                    <td>
                                                        Department Name:
                                                    </td>
                                                    <td>
                                                        <strong>PG</strong>
                                                    </td>
                                                </tr> --}}
                                                <tr>
                                                    <td>
                                                        Course Name <strong>: course</strong>
                                                    </td>
                                                    <td>
                                                        Name <strong>: name</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Email <strong>: email</strong>
                                                    </td>
                                                    <td>
                                                        Caste Category<strong>: cast</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        If Specially
                                                        Abled<strong>:Yes</strong>
                                                    </td>
                                                    <td>
                                                        Mobile No<strong>: mobile</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-4 d-flex">
                                    <div class="table-responsive">
                                        <table class="table table-clean table-sm align-self-end">
                                            <tbody>
                                                <tr>

                                                    <td>
                                                        Father's Name<strong>: father_name</strong>
                                                    </td>

                                                    <td>
                                                        Mother's name <strong>: mother_name</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        DOB <strong>: dob</strong>
                                                    </td>
                                                    <td>
                                                        Gender <strong>: gender</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Aadhar No <strong>: aadhaar_no</strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-success-500">
                            <h6 class="text-light">
                                Present Address Information
                            </h6>
                        </div>
                        <div class="panel-tag border-left-0">
                            <div class="row">

                                <div class="col-sm-12 d-flex">

                                    <div class="table-responsive">
                                        <table class="table table-clean table-sm align-self-end">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        State <strong>: present_state</strong>
                                                    </td>
                                                    <td>
                                                        District <strong>:
                                                            district_name</strong>
                                                    </td>
                                                    <td>
                                                        Pincode<strong>: present_pin_code</strong>
                                                    </td>
                                                    <td>

                                                        Present Address<strong>: present_address</strong>
                                                    </td>
                                                </tr>


                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-success-500">
                            <h6 class="text-light">
                                Permanent Address Information
                            </h6>
                        </div>
                        <div class="panel-tag border-left-0">
                            <div class="row">

                                <div class="col-sm-12 d-flex">

                                    <div class="table-responsive">
                                        <table class="table table-clean table-sm align-self-end">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        State <strong>: permanent_state</strong>
                                                    </td>
                                                    <td>
                                                        District <strong>:
                                                            district_name</strong>
                                                    </td>
                                                    <td>
                                                        <strong>Pincode<strong>:
                                                            permanent_pin_code</strong>
                                                    </td>
                                                    <td>

                                                        Permanent Address <strong>:
                                                            permanent_address</strong>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-success-500">
                            <h6 class="text-light">
                                College Information
                            </h6>
                        </div>
                        <div class="panel-tag border-left-0">
                            <div class="row">

                                <div class="col-sm-12 d-flex">

                                    <div class="table-responsive">
                                        <table class="table table-clean table-sm align-self-end">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Last Attended College Name
                                                        <strong>: clg_name</strong>
                                                    </td>
                                                    <td>
                                                        Year of Passing Last Exam
                                                        <strong>: year_of_passing</strong>
                                                    </td>
                                                    <td>
                                                        Last Pursued Course Name
                                                        <strong>: course_name</strong>
                                                    </td>
                                                    <td>
                                                        Migration Certificate is availiable
                                                        <strong>:
                                                            Yes</strong>
                                                    </td>
                                                </tr>



                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-success-500">
                            <h6 class="text-light">
                                Document
                            </h6>
                        </div>
                        <div class="panel-tag border-left-0">
                            <div class="row">

                                <div class="col-sm-12 d-flex">

                                    <div class="table-responsive">
                                        <table class="table table-clean table-sm align-self-end">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        Photo <strong>: <strong>:<a href="javascript:void(0)">
                                                            View Upload File</a></strong></strong>
                                                    </td>
                                                    <td>
                                                        Aadhaar Card <strong>: <strong>:<a href="javascript:void(0)"
                                                                    onclick="upload_image_view('')">
                                                                    View Upload File </a></strong></strong>
                                                    </td>
                                                    <td>
                                                        HSC Certificate<strong>: <strong>:<a href="javascript:void(0)"
                                                                    onclick="upload_image_view('')">
                                                                    View Upload File</a></strong>
                                                        </strong>
                                                    </td>
                                                    <td>
                                                        Migration Certificate
                                                        <strong>:<a href="javascript:void(0)"
                                                                onclick="upload_image_view('')">
                                                                View Upload File</a></strong>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                               

                            </div>
                        </div>

                        <div class="panel-content border-faded border-top-0 border-left-0 border-right-0 border-bottom-0 d-flex flex-row justify-content-center">
                        <a href="{{ url('uuc-admission') }}" class="btn btn-secondary" data-dismiss="modal">Back</a>


                    </div>
                       


                    </div>
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
@endsection

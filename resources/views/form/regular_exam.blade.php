@extends('layouts.app')
@section('content')
    <div class="row">

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                         Regular Examination Application (UG) 
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="none-2 text-center mb-4">
                            <h1 class="subheader-title mb-1">
                                UTKAL UNIVERSITY OF CULTURE, BHUBANESWAR
                            </h1>
                            <h4 style="font-weight:500;">( APPLICATION FORM FOR ADMISSION TO EXAMINATION )</h4>
                            
                        </div>
                       
                        
                        <div class="border rounded p-2 mb-4">
                            <h4>Personal Information</h4>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 col-12" style="display:none;">

                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="course_name">
                                                Name <span class="text-danger">*</span>
                                            </label>
                                            <input name="name" type="text" class="form-control chk_blank"
                                                    id="student_name" placeholder="Enter Full Name">
                                           
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Father's Name <span
                                                    class="text-danger">*</span></label>
                                            <input name="father_name" type="text" class="form-control chk_blank"
                                                id="father_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Mother's name <span
                                                    class="text-danger">*</span></label>
                                            <input name="mother_name" type="text" class="form-control chk_blank"
                                                id="mother_name">
                                        </div>
                                    </div>
                                </div>

                                
                                {{-- <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">DOB (As per HSC Certificate) <span class="text-danger">*</span></label>
                                            <input name="dob" type="text" id="dob"
                                                class="form-control datepicker-2 chk_blank chk_date">
                                        </div>
                                    </div>
                                </div> --}}
                               
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="cast_category">Caste Category <span
                                                    class="text-danger">*</span></label>
                                            {{-- <select class="custom-select form-control chk_blank" id="cast_category"
                                                name="cast_category" id="cast">
                                                <option value="GEN">GEN</option>
                                                <option value="ST">ST</option>
                                                <option value="SC">SC</option>
                                                <option value="OBC">OBC</option>
                                            </select> --}}
                                            <input name="mother_name" type="text" class="form-control chk_blank"
                                                id="mother_name">
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="cast_category">Tribe Name <span
                                                    class="text-danger">*</span></label>
                                            <input name="mobile" type="text"
                                                    class="form-control chk_blank chk_mobile" id="mobile">
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Mobile No <span class="text-danger">*</span></label>
                                            <input name="mobile" type="text"
                                                class="form-control chk_blank chk_mobile" id="mobile">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Address <span class="text-danger">*</span></label>
                                            <textarea name="" id="" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Local Address <span class="text-danger">*</span></label>
                                            <textarea name="" id="" class="form-control" rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                       


                        <div class="border rounded p-2 mb-4">
                            <h4>Marticulation / H.S.C / Equivalent Information</h4>

                            <hr>
                            <div class="row">
                               
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="course_name">Name of School<span
                                                    class="text-danger">*</span></label>
                                        <input name="name" type="text" class="form-control chk_blank"
                                                    id="student_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Passing year <span class="text-danger">*</span></label>
                                            <input name="dob" type="text" id="dob"
                                                class="form-control  chk_blank chk_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Passing Month <span class="text-danger">*</span></label>
                                            {{-- <select class="custom-select select2 form-control" name="course">
                                                <option value="">Select Month</option>
                                                <option value="Jan">Jan</option>
                                                <option value="Feb">Feb.</option>
                                            </select> --}}
                                            <input name="dob" type="text" id="dob"
                                                class="form-control  chk_blank chk_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="student_name">Division <span
                                                    class="text-danger">*</span></label>
                                            <input name="name" type="text" class="form-control chk_blank"
                                                id="student_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Roll No. <span class="text-danger">*</span></label>
                                            <input name="email" type="text" class="form-control chk_blank chk_email"
                                                id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">DOB (As per HSC Certificate) <span class="text-danger">*</span></label>
                                            <input name="dob" type="text" id="dob"
                                                class="form-control chk_blank chk_date">
                                        </div>
                                    </div>
                                </div>
                                

                            </div>
                        </div>


                        <div class="border rounded p-2 mb-4">
                            <h4>+2 / Intermediate Examination in Arts / Science / Commerce or any Equivalent Examination</h4>

                            <hr>
                            <div class="row">
                               
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="course_name">Name of College<span
                                                    class="text-danger">*</span></label>
                                        <input name="name" type="text" class="form-control chk_blank"
                                                    id="student_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Passing year <span class="text-danger">*</span></label>
                                            <input name="dob" type="text" 
                                                class="form-control  chk_blank chk_date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Passing Month <span class="text-danger">*</span></label>
                                            {{-- <select class="custom-select select2 form-control" name="course">
                                                <option value="">Select Month</option>
                                                <option value="Jan">Jan</option>
                                                <option value="Feb">Feb.</option>
                                            </select> --}}
                                            <input name="dob" type="text" 
                                                class="form-control  chk_blank chk_date">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label" for="student_name">Division <span
                                                    class="text-danger">*</span></label>
                                            <input name="name" type="text" class="form-control chk_blank"
                                                id="student_name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Roll No. <span class="text-danger">*</span></label>
                                            <input name="email" type="text" class="form-control chk_blank chk_email"
                                                id="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">DOB (As per HSC Certificate) <span class="text-danger">*</span></label>
                                            <input name="dob" type="text" id="dob"
                                                class="form-control chk_blank chk_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       <form action="#" id="form_dd" method="post">
                        <div class="border rounded p-2 mb-4">
                            <h4>Examination Form Fill up</h4>

                            <hr>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                        <label class="form-label" for="same">Whether he/she has been sent up for admission to the examination:</label>
                                </div>
                                <div class="col-md-6">
                                    <input type="checkbox" name="addmission_exam" id="addmission_exam" class="" required>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Passing year <span class="text-danger">*</span></label>
                                            <input name="passing_year" id="passing_year" type="text" class="form-control yearPicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Passing Month <span class="text-danger">*</span></label>
                                            <select class="custom-select select2 form-control" name="passing_month" id="passing_month">
                                                <option value="">Select Month</option>
                                                <option value="Jan">Jan</option>
                                                <option value="Feb">Feb.</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <div class="panel-tag mb-4">
                                       <b> <code>The year or years in which he/she enrolled previously at the Bachelor Degree Examination. please add the details below</code> </b>
                                    </div> --}}
                                    <div class="fw-700 mb-2 text-success">(a). The year or years in which he/she enrolled previously at the Bachelor Degree Examination. please add the details below:</div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Year <span class="text-danger">*</span></label>
                                            <input name="bde_year" id="bde_year" type="text" 
                                                class="form-control yearPicker">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Name of Examination <span class="text-danger">*</span></label>
                                            <input name="bde_exam" id="bde_exam" type="text" 
                                                class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Roll No. <span class="text-danger">*</span></label>
                                            <input name="bde_roll_no" id="bde_roll_no" type="text" 
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Regd. No. <span class="text-danger">*</span></label>
                                            <input name="bde_regd_no" id="bde_regd_no"  type="text" 
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mt-4">
                                        <div class="form-group input-cont">
                                            <button type="button" id="button_BDE" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Year</th>
                                                <th>Name of Examination</th>
                                                <th>Roll No.</th>
                                                <th>Regd. No.</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addBDE"></tbody>
                                    </table>
                                </div>
                                
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    {{-- <div class="panel-tag mb-4">
                                       <b> <code> Subject in which he/she desires to examined / already examined:</code> </b>
                                    </div> --}}
                                    <div class="fw-700 mb-2 text-success">(b). Subject in which he/she desires to examined / already examined:</div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Course<span class="text-danger">*</span></label>
                                            <select class="custom-select form-control select2" id="bde_course"
                                                name="bde_course">
                                                <option value="">select course</option>
                                                <option value="GEN">Pre-Degree</option>
                                                <option value="ST">1st</option>
                                                <option value="SC">2nd</option>
                                                <option value="OBC">3rd</option>
                                                <option value="OBC">Final Degree</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Theory/Practical<span class="text-danger">*</span></label>
                                            <select class="custom-select form-control" id="bde_theo_prac"
                                                name="bde_theo_prac">
                                                <option value="">select</option>
                                                <option value="Practical">Practical</option>
                                                <option value="Theory">Theory</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">Description<span class="text-danger">*</span></label>
                                            <textarea class="form-control" name="bde_description" id="bde_description"  rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="mt-4">
                                        <div class="form-group input-cont text-center">
                                            <button type="button" id="button_examine" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add More</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Course</th>
                                                <th>Practical/Theory</th>
                                                <th>Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addExamined"></tbody>
                                    </table>
                                </div>
                                
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="fw-700 mb-2 text-success">(C). Amout of Fees Remitted:</div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">(i) Examination fees<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">(ii) Center Charges<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">(iii) Fee for marks<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">(iv) Other fees<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">(v) Enrolment fee<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="mb-2">
                                        <div class="form-group input-cont">
                                            <label class="form-label">(vi) Total<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-group">
                                    <li class="list-group">
                                        <p>I submit the above particulars for consideration by the University authorities to -admit me for the above examination.</p>
                                    </li>
                                    <li class="list-group">
                                        <p>I shall not indulge in any undesirable activities which will affect the prestige of my Institution of
                                            study or of Utkal University of Culture. The University authorities may impose any punishment
                                            for any contravention to rule and regulations in force in the conduct of examination.</p>
                                    </li>
                                </ul>
                            </div>

                            <div class="col-md-12 text-center mt-4">
                                <button type="submit" class="btn btn-success me-1 waves-effect waves-float waves-light">Submit</button>
                            </div>

                        </form>
                            
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
<script>
    $(document).ready(function(){
        
        // add Examined Section
        var countOtherDocRow = 1;
        var counterOtherDocRow = 0;
        
            $('#button_examine').click(function(e) {
                alert('hi');
                e.preventDefault();
                var bde_course = $('#bde_course').val();
                var bde_theo_prac = $('#bde_theo_prac').val();
                var bde_description = $('#bde_description').val();

                
                    var newRow = '<tr>' +
                        '<td>' + bde_course +
                        '<input type="hidden" name="bde_course_hid[]" value="' +
                        bde_course + '"></td>' +

                        '<td>' + bde_theo_prac +
                        '<input type="hidden" name="bde_theo_prac_hid[]" value="' +
                        bde_theo_prac + '"></td>' +

                        '<td>' + bde_description +
                        '<input type="hidden" name="bde_description_hid[]" value="' +
                        bde_description + '"></td>' +

                        
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                        counterOtherDocRow + '">Remove</button></td></tr>';
                    $('#addExamined').append(newRow);
                    countOtherDocRow++;
                    counterOtherDocRow++;
                
            });

            $("#addExamined").on("click", ".remove_field", function(e) {
                // alert('1');
                $(this).parent('td').parent('tr').remove();
                counterOtherDocRow--;
                countOtherDocRow--;
            });


            // End Examined Section


            var countBDE = 1;
            var counterBDERow = 0;
        
            $('#button_BDE').click(function(e) {
                alert('hi');
                e.preventDefault();
                var bde_year = $('#bde_year').val();
                var bde_exam = $('#bde_exam').val();
                var bde_roll_no = $('#bde_roll_no').val();
                var bde_regd_no = $('#bde_regd_no').val();

                
                    var newRow = '<tr>' +
                        '<td>' + bde_year +
                        '<input type="hidden" name="bde_year_hid[]" value="' +
                        bde_year + '"></td>' +

                        '<td>' + bde_exam +
                        '<input type="hidden" name="bde_exam_hid[]" value="' +
                        bde_exam + '"></td>' +

                        '<td>' + bde_roll_no +
                        '<input type="hidden" name="bde_roll_no_hid[]" value="' +
                        bde_roll_no + '"></td>' +

                        '<td>' + bde_regd_no +
                        '<input type="hidden" name="bde_regd_no_hid[]" value="' +
                        bde_regd_no + '"></td>' +

                        
                        '<td><button type="button" class="btn btn-outline-warning waves-effect waves-themed btn-sm remove_field" id="' +
                            counterBDERow + '">Remove</button></td></tr>';
                    $('#addBDE').append(newRow);
                    countBDE++;
                    counterBDERow++;
                
            });

            $("#addBDE").on("click", ".remove_field", function(e) {
                // alert('1');
                $(this).parent('td').parent('tr').remove();
                countBDE--;
                counterBDERow--;
            });




        
    });
</script>
@endsection

@extends('layouts.app')


@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script> --}}

        <style>
            .fh1 {
                font-size: 31px;
                font-weight: 700;
                text-align: center;
            }

            .fh2 {
                font-size: 22px;
                text-align: center;
            }
            .bold{
                font-weight:bold ;
            }
            .exam{
                padding: 20px;
                margin-left: 71px;
            }
            .exam1{
                margin-left: 10px;
            }
            .been{
                margin-left: 43px;
            }
            .been1{
                margin-left: -44px;
            }
            .been2{
                margin-left: -79px;
                padding: 21px;
                
            }
        </style>

    </head>

    <body>

        <div class="main">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <h1 class="fh1">UTKAL UNIVERSITY OF CULTURE, BHUBANESWAR</h1>
                    <h2 class="fh2"><u>APPLICATION FORM FOR ADMISSION TO EXAMINATION</u></h2>
                    <div style="margin-top: 69px;">
                        <span class="bold">1.</span><span class="bold"> Name(to be written in block letters)</span><br>
                        <span class="bold">(Surname first)</span> <input type="text" class="form-control"
                            placeholder="Enter Name"><br><br>

                        <div class="container">

                            <div class="row">
                                <div class="col-sm">
                                    <span class="bold">2.(a) Year and month of passing the Matriculation/H.S.C or any
                                        equivalent examination.</span>
                                    <input type="text" class="form-control" placeholder="Year"
                                        aria-label="Post Graduate Examination in"><br>
                                    <input type="text" class="form-control" placeholder="Month"
                                        aria-label="Post Graduate Examination in">

                                </div>
                                <div class="col-sm">
                                    <span class="bold">(b) Name of the school of (Matriculation/ HSC/Equivalent).</span>
                                    <input type="text" class="form-control" placeholder="Name of the school"
                                        aria-label="Roll Number">
                                    <span class="">Division</span>
                                    <input type="text" class="form-control" placeholder="Division"
                                        aria-label="Roll Number">
                                    <span class="">Roll No.</span>
                                    <input type="text" class="form-control" placeholder="Roll No"
                                        aria-label="Roll Number">
                                </div>
                                <div class="col-sm">
                                    <span class="bold">(c) Date of birth (as per HSC certificate) :</span>
                                    <input type="date" class="form-control" placeholder="Regd.No."
                                        aria-label="Regd.No."><br>

                                </div>
                            </div>
                        </div>
                        <br><br>
                        {{-- <div class="container">

                            <div class="row">
                                <div class="col-sm">
                                    <span class="">3. Year and month of passing the +2/intermediate Examination in
                                        Arts/ Science/ Commerce or any other examination recognized as equivalent there to
                                        :</span>
                                    <input type="text" class="form-control" placeholder="Year"
                                        aria-label="Post Graduate Examination in">

                                </div>
                                <div class="col-sm">
                                    <span class="">Name of the college from which passed the examination</span>
                                    <input type="text" class="form-control" placeholder="Name of the school"
                                        aria-label="Roll Number">


                                </div>
                                <div class="col-sm">
                                    <span class="">Division</span>
                                    <input type="text" class="form-control" placeholder="Division"
                                        aria-label="Regd.No."><br>
                                    <span class="">Roll No.</span>
                                    <input type="text" class="form-control" placeholder="Roll No."
                                        aria-label="Regd.No."><br>

                                </div>
                            </div>
                        </div> --}}
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <span class="bold">3. Year and month of passing the +2/intermediate Examination in
                                        Arts/ Science/ Commerce or any other examination recognized as equivalent there to
                                        :</span>
                                </div>
                                <div class="col-6 bold exam">
                                    Name of the college from which passed the examination
                                </div>
                                <div class="col bold">
                                    <div class="been2">Division</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Year"
                                        aria-label="Post Graduate Examination in">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Name of the school"
                                        aria-label="Roll Number">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Division"
                                        aria-label="Regd.No."><br>
                                    <input type="text" class="form-control" placeholder="Division" aria-label="Regd.No.">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="container">

                            <div class="row">
                                <div class="col-sm">
                                    <span class="bold">4.Name and address of (a) Father/ Mother</span>
                                    <textarea name="" id="" cols="" rows=""></textarea>
                                    <div class="bold">(Both father's and Mother's name shall be given if one is not alive)</div>
                                </div>
                                <div class="col-sm bold">

                                    <label for="">Local Address</label><br>
                                    <textarea name="" id="" cols="" rows=""></textarea>


                                </div>
                                <div class="col-sm">
                                    <span class="bold">Tel No.</span>
                                    <input type="text" class="form-control" placeholder="Tel No."
                                        aria-label="Regd.No."><br>


                                </div>
                            </div>
                        </div>
                        <br><br>
                        {{-- <div class="container">
                       
                        <div class="row">
                            <div class="col-sm">
                                <span class="">5. Whether the candidate belongs to any of the Scheduled Castes/ Tribes, or any backward class/ P.H. (Name of the caste, tribe or community should be mentioned):</span>
                                <input type="text" class="form-control" placeholder="Tel No." aria-label="Regd.No.">
                            </div>
                            <div class="col-sm">
                                
                                <label for="">Local Address</label><br>
                                <input type="text" class="form-control" placeholder="Tel No." aria-label="Regd.No.">
                                   
                                
                            </div>
                            <div class="col-sm">
                                <span class="">Tel No.</span>
                                <input type="text" class="form-control" placeholder="Tel No." aria-label="Regd.No."><br>
                               
                                
                            </div>
                        </div>
                    </div> --}}
                        <div class="container">
                            <div class="row">
                                <div class="col bold">
                                    5. Whether the candidate belongs to any of the Scheduled Castes/ Tribes, or any backward
                                    class/ P.H. (Name of the caste, tribe or community should be mentioned):

                                </div>
                                <div class="col-6 bold">
                                    <div class="been">Whether he/she has been sent up for admission to the examination:</div>
                                </div>
                                <div class="col bold">
                                    <div class="been1">The month and year of admission to course:</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Tel No."
                                        aria-label="Regd.No.">
                                </div>
                                <div class="col-5">
                                    <input type="text" class="form-control" placeholder="Tel No."
                                        aria-label="Regd.No.">
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" placeholder="Tel No."
                                        aria-label="Regd.No.">
                                </div>
                            </div>
                        </div>
                        <br><br>
                        <div class="bold">8. The ear or years in which he/she enrolled previously at the Bachelor Degree Examination.
                            Admit Card, Mark List of each examination should be enclosed.</div><br>
                        <div class="row">
                            <div class="col"><span>Year</span><input type="text" class="form-control"
                                    placeholder="Year" aria-label="Regd.No."></div>
                            <div class="col"><span>Name of Examination</span><input type="text"
                                    class="form-control" placeholder="Name of Examination" aria-label="Regd.No."></div>
                            <div class="col"><span>Roll No.</span><input type="text" class="form-control"
                                    placeholder="Roll No." aria-label="Regd.No."></div>
                            <div class="col"><span>Regd.No.
                                </span><input type="text" class="form-control" placeholder="Regd.No."
                                    aria-label="Regd.No."></div>
                        </div>
                        <br><br>
                        <div class="bold">9. Subject in which he/she desires to examined / already examined:</div><br>


                        <div class="container">
                            <div class="row">
                                <div class="col-sm">
                                    <span class="">Pre-Degree</span>
                                    <input type="text" class="form-control" placeholder="Pre-Degree"
                                        aria-label="Regd.No."><br>

                                </div>
                                <div class="col-sm">
                                    <span class="">1st/2nd/3rd year.</span>
                                    <input type="text" class="form-control" placeholder="1st/2nd/3rd year."
                                        aria-label="Regd.No."><br>

                                </div>
                                <div class="col-sm">
                                    <span class="">Final degree</span>
                                    <input type="text" class="form-control" placeholder="Final degree."
                                        aria-label="Regd.No."><br>

                                </div>
                            </div>
                        </div>
                        <div class="bold">10.Amount of fees remitted:</div><br>
                        <div class="container">

                            <div class="row">

                                <div class="col-sm">
                                    <label for="username" class="font roll1 amt3 bold1">(a) Examination fees</label>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Name of the Subject">
                                    <label for="username" class="font roll1 amt bold1">(b) Center Charges</label>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Name of the Subject">
                                    <label for="username" class="font roll1 bold1">(c) Fee for marks</label>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Name of the Subject">
                                </div>
                                <div class="col-sm">
                                    <label for="username" class="font roll1 amt3 bold1">(d) Other fees</label>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Name of the Subject">
                                    <label for="username" class="font roll1 amt3 bold1">(e) Enrolment fee</label>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Name of the Subject">
                                    <label for="username" class="font roll1 amt3 bold1">(f) Total</label>
                                    <input type="text" class="form-control" placeholder=""
                                        aria-label="Name of the Subject">
                                </div>

                            </div>
                        </div>


                    </div>
                </div>
            </div>

        </div>



    </body>

    </html>
@endsection

@extends('layouts.app')@section('content')
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

            .fh5 {
                font-size: 22px;
                text-align: left;
            }

            .f10 {
                font-size: 27px;
                text-align: left;
                margin-left: 218px;
                margin-top: 10px;
            }

            input {
                outline: 0;
                border-width: 0 0 2px;
                border-color: rgb(2, 2, 2)
            }

            input:focus {
                border-color: green
            }

            .input_border {
                width: 90%;
            }

            .input_border1 {
                width: 20%;
            }

            .input_border5 {
                width: 10%;
            }

            .input_border2 {
                width: 70%;
            }

            .block_7 {
                font-size: 20px;
                margin-left: 34px;
            }

            .block_6 {
                font-size: 20px;
                margin-left: 33px;
            }

            .block_2 {
                font-size: 18px;
                margin-left: 105px;

            }

            .block_3 {
                font-size: 18px;
                margin-left: -39px;
            }

            .block_4 {
                font-size: 18px;
                margin-left: 103px;
            }

            /* .block_11{
        font-size: 18px;
        margin-left: -55px;
        margin-top: 10px;
    } */
            .container {

                text-align: center;
            }

            .verified {

                text-align: center;
                margin-left: -148px;
            }



            .col-6 {
                margin-left: -15px;
                margin-right: -70px;
                padding-left: 117px;
                padding-right: 15px;
            }

            .partmain {
                text-align: center;
                padding-inline: 50px;

                border: 100px;

            }

            /* .colu {
        border: 1px;
        padding: 20px;
      } */
            .colu {
                width: 200px;
                height: 100px;
                text-align: justify;
                border: 1px;
                padding: 20px;
            }

            .row {
                display: flex;
                align-items: flex-start;
                background-color: #FFFFFF;
            }

            .colu1 {
                text-align: justify;
            }

            .guard {
                padding-left: 374px;
            }

            .paper {
                padding-left: 374px;
            }

            .nam {
                margin-left: -190px;
                margin-top: 90px;
            }

            .tex {
                margin-left: 170px;
            }

            .block_10 {
                margin-left: -239px;
            }

            .block_11 {
                margin-left: 316px;
            }

            /* .block_12{
      margin-left: 316px;
    }
    .block_13{
      margin-left: 316px;
    } */
    .bg-white {
    --bs-bg-opacity: 1;
    background-color: rgba(var(--bs-white-rgb),var(--bs-bg-opacity))!important;
}
            .main {
                font: 100;
                align-content: center;
                text-align: justify;
                width: 100%;
                /* background-color: #FFFEFD; */

            }

            .nation {
                margin-left: -262px;
            }

            .font {
                font-size: 15px;
            }

            .roll {
                margin-left: -259px;
            }

            .roll1 {
                margin-left: -216px;
            }

            .roll2 {
                margin-left: -292px;
            }

            .roll3 {
                margin-left: -314px;
            }

            .sub {
                margin-left: -196px;
            }

            .sub1 {
                margin-left: -153px;
            }

            .sub2 {
                margin-left: -12px;
            }

            .sub3 {
                margin-left: -38px;
            }

            .sub5 {
                margin-left: -33px;
            }

            .sub6 {
                margin-left: -100px;
            }

            .sub7 {
                margin-left: -100px;
            }

            .sub8 {
                margin-left: -100px;
            }

            .sub9 {
                margin-left: -207px;
            }

            .sub10 {
                margin-left: 19px;
            }

            .roll5 {
                margin-left: -299px;
            }

            .roll6 {
                margin-left: -319px;
            }

            .post {
                margin-left: -146px;
            }

            .post1 {
                margin-left: -260px;
            }

            .post2 {
                margin-left: -284px;
            }

            .post3 {
                margin-left: 504px;
            }

            .post4 {
                margin-left: 24px;
            }

            .post5 {
                margin-left: -209px;
            }
            .amt{
              margin-left: -147px;
            }
            .amt1{
              margin-left: -117px;
            }
            .amt2{
              margin-left: -251px;
            }
            .amt3{
              margin-left: -181px;
            }
            .bold{
                font-weight: bold;
            }
            .bold1{
                font-weight: 500;
            }
            
            
        </style>
       
    </head>

    <body>
        <div class="main bg-white">
            <div class="card">
                <div class="card-body bg-white">
                    <h1 class="fh2">FORM NO.-17</h1>
                    <h1 class="fh1">UTKAL UNIVERSITY OF CULTURE</h1>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <span class="font post bold1">Post Graduate Examination in</span>
                                <input type="text" class="form-control" placeholder="Post Graduate Examination in"
                                    aria-label="Post Graduate Examination in">
                                <span class="font post5">Whole/Part-1/Part-2</span>
                            </div>
                            <div class="col-sm">
                                <span class="font post1 bold1">Roll Number</span>
                                <input type="text" class="form-control" placeholder="Roll Number"
                                    aria-label="Roll Number">
                            </div>
                            <div class="col-sm">
                                <span class="font post2 bold1">Regd.No.</span>
                                <input type="text" class="form-control" placeholder="Regd.No." aria-label="Regd.No."><br>
                                <div class="font">(To be assigned by the University)</div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col font post4">Verified all particulars</div>
                        <div class="col font post3">Signature of Authorised Official<br>(College of Department level)</div>
                        <div class="w-100"></div>

                    </div>
                    <div>
                        <h1 class="f10">PARTICULARS TO BE FILLED IN BY THE CANDIDATE</h1>
                    </div>
                    <br>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <span class="font sub8 bold">1.Name (To be written in Block letters)<br>(Surname First)</span>
                                <input type="text" class="form-control"
                                    placeholder="Name (To be written in Block letters)" aria-label="Name">

                            </div>
                            <div class="col-sm">
                                <span class="font sub8 bold">2.Name and Address of Father/Mother</span>
                                <textarea class="form-control" placeholder="Name and Address of Father/Mother"></textarea>
                            </div>
                            <div class="col-sm">
                                <label for="" class="font sub9 bold">3.Permanent Address</label>
                                <textarea class="form-control" placeholder="Permanent Address"></textarea>

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <label for="username" class="nation font bold">4. Nationality</label>
                                <input type="text" class="form-control" placeholder="Nationality"
                                    aria-label="Nationality">

                            </div>
                            <div class="col-sm">
                                <span class="font bold">5.(a) Whether the candidate belongs to Scheduled Caste/ Scheduled Tribe
                                    (Name of the Caste or Tribe should be mentioned)(b) Whether Male of Female</span>
                                <input type="text" class="form-control" placeholder="Scheduled Caste/ Scheduled Tribe"
                                    aria-label="Roll Number">
                            </div>
                            <div class="col-sm">
                                <span class="font sub7 bold">6.Date of Birth :(In figures)(In Words)</span>
                                <input type="text" class="form-control" placeholder="Date of Birth"
                                    aria-label="Regd.No."><br>

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm">
                                <label for="username" class="font sub3 bold">7.Year of passing the Matriculation
                                    Examination</label>
                                <input type="text" class="form-control"
                                    placeholder="Year of passing the Matriculation Examination" aria-label="Nationality">

                            </div>
                            <div class="col-sm">
                                <span class="font sub5 bold">8.Year of Graduation (Mention the Faculty of Art/Science/ Commerce
                                    or any other)</span>
                                <input type="text" class="form-control" placeholder="Year of Graduation"
                                    aria-label="Roll Number">
                            </div>
                            <div class="col-sm">
                                <span class="font sub6 bold">9.Session of Admission in P.G. Course</span>
                                <input type="text" class="form-control" placeholder="Session of Admission in P.G. Course"
                                    aria-label="Regd.No."><br>

                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="font sub10 bold">10.Subject and papers to be offered</div>
                    <div class="container">
                        <div class="row">

                            <div class="col-sm">
                                <span class="font sub bold1">(a)Name of the Subject</span>
                                <input type="text" class="form-control" placeholder="Name of the Subject"
                                    aria-label="Name of the Subject">

                            </div>
                            <div class="col-sm">
                                <span class="font sub1 bold1">(b) Name of the paper/papers</span>
                                <span><input type="text" class="form-control" placeholder="Part-I"
                                        aria-label="Roll Number"><input type="text" class="form-control"
                                        placeholder="Part-II" aria-label="Roll Number"><input type="text"
                                        class="form-control" placeholder="Whole" aria-label="Roll Number"></span>
                            </div>
                            <div class="col-sm">
                                <span class="font sub2 bold1">(c)If Whole or part,mention the name of Special paper</span>
                                <span><input type="text" class="form-control" placeholder="Paper-VI(Group)"
                                        aria-label="Roll Number"><input type="text" class="form-control"
                                        placeholder="Paper-VII(Group)" aria-label="Roll Number"></span>
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="font sub10 bold">11.The Year,Month and roll Number of passing the Part-I Examination(incaser of
                        appearing) Part-II Examination</div>
                    <div class="container">
                        <div class="row">

                            <div class="col-sm">
                                <span class="font roll bold1">Roll Number</span>
                                <input type="text" class="form-control" placeholder="Roll Number"
                                    aria-label="Name of the Subject">

                            </div>
                            <div class="col-sm">
                                <span class="font roll5 bold1" >Month</span>
                                <input type="text" class="form-control" placeholder="Month" aria-label="Roll Number">
                               
                            </div>
                            <div class="col-sm">
                                <span class="font roll6 bold1">Year</span>
                                <input type="text" class="form-control" placeholder="Year" aria-label="Roll Number">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    <div class="font sub10 bold">12. The Year, Month and Roll No. of Previous appearance in case of Repeating
                        (after passing)</div>
                    <div class="container">
                        <div class="row">

                            <div class="col-sm">
                                <label for="username" class="font roll1 bold1">Part-I Roll Number:</label>
                                <input type="text" class="form-control" placeholder="Roll Number"
                                    aria-label="Name of the Subject">
                                <label for="username" class="font roll1 bold1">Part-II Roll Number:</label>
                                <input type="text" class="form-control" placeholder="Roll Number"
                                    aria-label="Name of the Subject">
                                <label for="username" class="font roll1 bold1">Whole Roll Number:</label>
                                <input type="text" class="form-control" placeholder="Roll Number"
                                    aria-label="Name of the Subject">

                            </div>
                            <div class="col-sm">
                                <label for="username" class="font roll2 bold1">Month</label>
                                <input type="text" class="form-control" placeholder="Month" aria-label="Roll Number">
                                <label for="username" class="font roll2 bold1">Month</label>
                                <input type="text" class="form-control" placeholder="Month" aria-label="Roll Number">
                                <label for="username" class="font roll2 bold1">Month</label>
                                <input type="text" class="form-control" placeholder="Month" aria-label="Roll Number">
                            </div>
                            <div class="col-sm">
                                <label for="username" class="font roll3 bold1">Year</label>
                                <input type="text" class="form-control" placeholder="Year" aria-label="Roll Number">
                                <label for="username" class="font roll3 bold1">Year</label>
                                <input type="text" class="form-control" placeholder="Year" aria-label="Roll Number">
                                <label for="username" class="font roll3 bold1">Year</label>
                                <input type="text" class="form-control" placeholder="Year" aria-label="Roll Number">
                            </div>
                        </div>
                    </div>
                    <br><br>
                    {{-- <div class="font">13. Amount of Fees remitted :</div>
                      <div class="row">
                        <div class="col font">
                          <label for="">(a) Examination Fees</label><br><br>
                          <label for="">(b) Fee for application form</label><br><br>                
                          <label for="">(c) Centre Charge</label><br><br>                     
                          <label for="">(d) Fees for mark Sheet</label><br><br>
                          <label for="">(e) Re-registration Fees</label><br><br>
                          <label for="">(f) Single paper Fees</label><br><br>
                          <label for="">(g) Fee for Provisional Certificate</label><br><br>
                          <label for="">(h) Late Fee</label><br><br>
                          
                        </div>
                        <div class="col">
                          
                          <input style="width:359px" type="text" class="form-control" aria-label="Last name"><br>
                          <input style="width:359px" type="text" class="form-control"  aria-label="Last name"><br>
                          <input  style="width:359px" type="text" class="form-control"  aria-label="Last name"><br>
                          <input style="width:359px" type="text" class="form-control"  aria-label="Last name"><br>
                          <input style="width:359px" type="text" class="form-control"  aria-label="Last name"><br>
                          <input style="width:359px" type="text" class="form-control"  aria-label="Last name"><br>
                          <input style="width:359px" type="text" class="form-control"  aria-label="Last name"><br>
                          <input style="width:359px" type="text" class="form-control"  aria-label="Last name"><br>
                        </div>
                      </div> --}}
                    {{-- <div class="container"> --}}
                    {{-- <div class="sub10">
                        <div class="font">13. Amount of Fees remitted :</div>
                        <div class="row">
                            <div class="col">(a) Examination Fees</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                            <div class="w-100"></div>
                            <div class="col">(b) Fee for application form</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                        </div>
                        <div class="row">
                            <div class="col">(c) Centre Charge</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                            <div class="w-100"></div>
                            <div class="col">(d) Fees for mark Sheet</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                        </div>
                        <div class="row">
                            <div class="col">(e) Re-registration Fees</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                            <div class="w-100"></div>
                            <div class="col">(f) Single paper Fees</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                        </div>
                        <div class="row">
                            <div class="col">(g) Fee for Provisional Certificate</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                            <div class="w-100"></div>
                            <div class="col">(h) Late Fee</div>
                            <div class="col"><input style="width:359px" type="text" class="form-control"
                                    aria-label="Last name"><br></div>
                        </div>
                    </div> --}}
                    {{-- </div> --}}
                    <div class="font sub10 bold">13. Amount of Fees remitted :</div>
                    <div class="container sub10">
                      
                      <div class="row">
                        
                        <div class="col-sm">
                          <label for="username" class="font roll1 amt3 bold1">(a) Examination Fees Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                                <label for="username" class="font roll1 amt bold1">(b) Fee for application form Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                                <label for="username" class="font roll1 bold1">(c) Centre Charge Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                        </div>
                        <div class="col-sm">
                          <label for="username" class="font roll1 amt3 bold1">(d) Fees for mark Sheet Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                                <label for="username" class="font roll1 amt3 bold1">(e) Re-registration Fees Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                                <label for="username" class="font roll1 amt3 bold1">(f) Single paper Fees Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                        </div>
                        <div class="col-sm">
                          <label for="username" class="font roll1 amt1 bold1">(g) Fee for Provisional Certificate Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                                <label for="username" class="font roll1 amt2 bold1">(h) Late Fee Rs.</label>
                                <input type="text" class="form-control" placeholder=""
                                    aria-label="Name of the Subject">
                               
                        </div>
                      </div>
                    </div>
                    
                    <br><br>
                    <div style="margin-top: 10px;" class="colu1 font sub10 bold">
                        14.I hereby undertake to abide by the decision of the University in regard to my result in case it
                        is
                        found later that my admission is irregular. i,further agree that the Orissa Examination Act-2 of
                        1988 is applicable to me for this examination and i will use blue pen in all my answer scripts.
                    </div>
                    <br><br>
                    <div class="row sub10">
                        <div class="col">
                            <label>Date</label>
                            <input width="50%" type="date" class="form-control font" aria-label="First name">
                        </div>
                        <div class="col">
                            <label class="font">Signature of the candidate(in full) Present Address</label>
                            <input type="text" class="form-control" aria-label="Last name">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
@section('js')
@endsection

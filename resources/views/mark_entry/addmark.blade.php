@extends('layouts.app')
@section('content')
    <div class="row">


        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Mark Entry
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <div class="filter_data mb-4">
                            <div class="row">



                                {{-- <div class="col-md-4">
                                    <input type="submit" class="btn btn-sm btn-success waves-effect waves-themed mt-4"
                                        id="submit">
                                </div> --}}
                            </div>

                        </div>

                        <div class="panel-content">
                           
                            <ul class="nav nav-tabs nav-tabs-clean" role="tablist">
                                <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#tab-home" role="tab">Theory</a></li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-profile" role="tab">Practical</a></li>
                                {{-- <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#tab-time" role="tab">Time</.a></li> --}}
                            </ul>
                            <div class="tab-content p-3">
                                <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="tab-home">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone.</div>
                                <div class="tab-pane fade" id="tab-profile" role="tabpanel" aria-labelledby="tab-profile">Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic. </div>
                                {{-- <div class="tab-pane fade" id="tab-time" role="tabpanel" aria-labelledby="tab-time">Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</div> --}}
                            </div>
                        </div>

                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection

@section('js')
@endsection

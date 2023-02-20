@extends('layouts.app')
@section('content')
    @if ($data->notice_type == 2)
        <div class="card-body">
            <div class="alert alert-primary">
                <div class="d-flex flex-start w-100">
                    <div class="d-flex align-center mr-2 hidden-sm-down">
                        <span class="icon-stack icon-stack-lg">
                            <i class="fa-solid fa-comments-dollar color-primary-400 icon-stack-2x"></i>

                        </span>
                    </div>
                    <div class="d-flex flex-fill">
                        <div class="flex-fill">

                            <span class="h5">{{ $data->noticeType->notice_name }} for {{ $data->course }} from
                                <strong>{{ Carbon\Carbon::parse($data->start_date)->format('d-m-Y') }}</strong> to
                                <strong>{{ Carbon\Carbon::parse($data->exp_date)->format('d-m-Y') }}</strong></span>


                            <h6 class="mt-2">{{ $data->details }}</h6> <a href="{{ $url }}" target="_blank">Click here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @elseif($data->notice_type == 2)

    @elseif($data->notice_type == 3)

    @else
    @endif
@endsection

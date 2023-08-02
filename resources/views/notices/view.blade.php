@extends('layouts.app')
@section('content')
<style>
    .notice_act {
	margin: 60px 0;
	border-top: 1px solid #ccc;
	padding-top: 30px;
}
</style>
    <div class="row">

        <div class="col-xl-12">
            <div id="panel-1" class="panel">
                <div class="panel-hdr">
                    <h2>
                        Preview Application Details
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">

                        <div
                            class="panel-content d-flex py-2 mt-2 border-faded border-left-0 border-right-0 text-muted bg-primary-500">
                            <h6 class="text-light">
                                Notice Details
                            </h6>
                        </div>
                        <div class="panel-tag border-left-0">
                            <div class="row">

                                <div class="col-sm-12">

                                    <div class="table-responsive22">
                                        <table class="table table-bordered m-0 w-100">
                                            
                                                <tr>
                                                    <th> Notice Type</th>
                                                    <td>{{ $data->notice_sub_type != '' ? $data->noticeType->notice_name : '' }}</td>
                                                    <th>Department</th>
                                                    <td >{{ $data->course }}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Start Date</th>
                                                    <td>{{ Carbon\Carbon::parse($data->start_date)->format('d-m-Y') }}</td>
                                                    <th>End Date</th>
                                                    <td>{{ Carbon\Carbon::parse($data->exp_date)->format('d-m-Y') }}</td>
                                                </tr>
                                                
                                                <tr>
                                                    <th>Details</th>
                                                    <td>{{ $data->details }}</td>
                                                    <th>For semesters </th>
                                                    @if ($data->notice_type == 2)
                                                    <td>{{ $data->semester }}</td>
                                                    @endif
                                                </tr>
                                                
                                                {{-- <tr>
                                                    <td style="width:30%;">
                                                        Notice Type <strong>:
                                                            
                                                        </strong>
                                                    </td>
                                                    <td style="width:40%;">
                                                        Department <strong>: {{ $data->course }}</strong>
                                                    </td>
                                                    
                                                    <td style="width:30%;">
                                                        Start date<strong> :
                                                            {{ Carbon\Carbon::parse($data->start_date)->format('d-m-Y') }}</strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    
                                                    <td style="width:30%;">
                                                        End date<strong> :
                                                            {{ Carbon\Carbon::parse($data->exp_date)->format('d-m-Y') }}</strong>
                                                    </td>
                                                    <td style="width:40%;">
                                                        Details <strong>: {{ $data->details }}</strong>
                                                    </td>
                                                    @if ($data->notice_type == 2)
                                                        <td style="width:30%;">
                                                            For semesters <strong>: {{ $data->semester }}</strong>
                                                        </td>
                                                    @endif

                                                </tr> --}}
                                                
                                                
                                            
                                        </table>
                                        @if (Auth::user()->role_id == 12)

                                        <div class="notice_act">
                                            
                                        <form action="{{route('notices.verify',[$data->id])}}" method="post">
                                            @csrf
                                        <div class="row">
                                            <div class="@if ($data->is_verified == 0)col-md-6 @else col-md-4 @endif text-center">
                                                <label class="form-label text-left w-100">Verify</label>
                                                <select name="verify" id="" class="form-control" {{$data->is_verified == 1 ? 'disabled' : ''}} >
                                                    <option value="">Select</option>
                                                    <option value="1" {{$data->is_verified == 1 ? 'selected' : ''}}>verified</option>
                                                    <option value="0" {{$data->is_verified == 0 ? 'selected' : ''}}>Not verified</option>
                                                </select>
                                            </div>
                                            <div class="@if ($data->is_verified == 0)col-md-6 @else col-md-4 @endif mt-4 text-center">
                                                <a href="{{ url('notices/') }}" class="btn btn-secondary btn-sm" data-dismiss="modal">Back</a>
                                                @if ($data->is_verified == 0)
                                                <button type="submit" class="btn btn-primary btn-sm waves-effect waves-themed">Submit</button>
                                                @endif
                                            </div>
                                            <div class="col-md-4 text-right is_pub  @if ($data->is_verified == 0) d-none @endif">
                                                @if ($data->status == 1)
                                                {!! $data->noticeStatus() !!}
                                                @else
                                                <label class="form-label text-right w-100">Publish</label>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox"
                                                        class="custom-control-input publish"
                                                        id="customSwitch"
                                                        {{ $data->status == 1 ? 'checked disabled' : '' }}
                                                        data-id="{{ $data->id }}">
                                                    <label class="custom-control-label publish"
                                                        for="customSwitch"></label>
                                                </div>
                                                @endif
                                                
                                                
                                                {{-- @php
                                                    dd($data->noticeStatus());    
                                                @endphp --}}
                                                
                                                {{-- @if ($data->is_verified == 1)
                                                                @if ($data->status == 0)
                                                                    <div class="custom-control custom-switch">
                                                                        <input type="checkbox"
                                                                            class="custom-control-input publish"
                                                                            id="customSwitch"
                                                                            {{ $data->status == 1 ? 'checked disabled' : '' }}
                                                                            data-id="{{ $data->id }}">
                                                                        <label class="custom-control-label publish"
                                                                            for="customSwitch"></label>
                                                                    </div>
                                                                @else
                                                                    {!! $data->noticeStatus() !!}
                                                                @endif
                                                            @else
                                                                {!! $data->noticeStatus() !!}
                                                            @endif --}}
                                            </div>
                                        </div>
                                    </form>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection


    @section('js')
    <script>
        $('.publish').on('change', function() {
            if ($(this).is(':checked')) {
                var publish = $(this);
                var postData = new FormData();
                postData.append('id', $(this).data('id'));
                var url = "{{ url('publish-notice') }}";

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    async: true,
                    type: "post",
                    contentType: false,
                    url: url,
                    data: postData,
                    processData: false,
                    success: function(response) {
                        publish.prop("checked");
                        publish.prop("disabled");
                        $('.publish').html('Published');
                        $('.is_pub').empty().html('<span class="badge badge-success">Published</span>');
                       
                    }
                });
            }
        });
    </script>
@endsection

@extends('layouts.app')
@section('content')
    <div class="row mt-5">

        <div class="col-xl-12">
            <div class="card">

                <div class="card-header">
                    <h5 class="card-title mb-0">Notice List</h5>
                    <div class="card-actions float-right">
                        @if (Auth::user()->role_id != 12)
                            @can('notice-create')
                                <a class="btn btn-primary btn-sm" href="{{ url('/add-notices') }}">
                                    <i class="fa-solid fa-plus"></i> Create Notice</a>
                            @endcan
                        @endif
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="text-fade table table-bordered display no-footer datatable table-responsive-lg dt-table">
                            <thead>
                                <tr class="text-dark">
                                    <th style="width: 10%;">Sl. No</th>
                                    <th>Notice Type</th>
                                    <th>Department</th>
                                    {{-- <th>Course</th> --}}
                                    {{-- <th>Semester</th> --}}
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Details</th>
                                    <td>Is Verified</td>
                                    <td>Is Published</td>
                                    {{-- <th>Status</th> --}}
                                    <th>Details</th>
                                </tr>
                            </thead>
                          
                            <tbody>
                                @foreach ($notice as $key => $item)
                                    @php
                                        if ($item->notice_type == 1) {
                                            $notice_type = 'Admission Notice';
                                            $color = 'badge-primary';
                                        } elseif ($item->notice_type == 2) {
                                            $notice_type = 'Exam Notice';
                                            $color = 'badge-success';
                                        } else {
                                            $notice_type = 'Other Notice';
                                            $color = 'badge-info';
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ ++$key }}</td>
                                        <td><span class="badge {{ $color }}">{{ $notice_type }}</span></td>
                                        <td>{{ $item->department_id != '' ? $item->department->course_for : '' }}</td>
                                        {{-- <td>{{ $item->course_id != '' ? $item->course->name : 'N/A' }}</td> --}}
                                        {{-- <td>{{ $item->semester != '' ? $item->semester : 'N/A' }}</td> --}}
                                        <td>{{ Carbon\Carbon::parse($item->start_date)->format('d-m-Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->exp_date)->format('d-m-Y') }}</td>
                                        <td>{{ Str::limit($item->details, 150, $end = '.......') }}</td>
                                        <td>
                                            {!! $item->is_verified == 0
                                                ? '<span class="badge badge-warning">Not Verified</span>'
                                                : '<span class="badge badge-success">Verified</span>' !!}
                                        </td>
                                        <td class="ispublish">
                                            {{-- {{ $item->status == 1 ? 'Published' : 'Not Published' }} --}}
                                            @can('notice-edit')
                                                @if ($item->is_verified == 1)
                                                    @if ($item->status == 0)
                                                        {{-- <div class="custom-control custom-switch">
                                                             <input type="checkbox" class="custom-control-input publish"
                                                                id="customSwitch{{ $key }}"
                                                                {{ $item->status == 1 ? 'checked disabled' : '' }}
                                                                data-id="{{ $item->id }}">
                                                            <label class="custom-control-label publish"
                                                                for="customSwitch{{ $key }}"></label>
                                                        </div> --}}
                                                        {!! $item->noticeStatus() !!}
                                                    @else
                                                        {!! $item->noticeStatus() !!}
                                                    @endif
                                                @else
                                                    {!! $item->noticeStatus() !!}
                                                @endif
                                            @else
                                                {!! $item->noticeStatus() !!}
                                            @endcan



                                        </td>
                                        {{-- <td>
                                            <div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input publish"
                                                    id="customSwitch{{ $key }}"
                                                    {{ $item->status == 1 ? 'checked' : '' }}
                                                    data-id="{{ $item->id }}">
                                                <label class="custom-control-label publish"
                                                    for="customSwitch{{ $key }}">{{ $item->status == 1 ? 'Published' : 'Not Publish' }}</label>
                                            </div>
                                        </td> --}}

                                        {{-- <td><a href="{{ url('notice/view/' . $item->id) }}"
                                                class="btn  waves-effect waves-themed btn-outline-success">
                                                <i class="fa-solid fa-eye"></i></a>
                                                <a href="#"
                                                    class="btn  waves-effect waves-themed btn-outline-primary">
                                                    <i class="fa-solid fa-pen-to-square"></i></a>
                                                    <button type="submit" class="btn btn-outline-danger waves-effect waves-themed" id="deleteThis"><i class="fa fa-trash"></i></button>
                                            </td> --}}

                                        <td><a href="{{ url('notice/view/' . $item->id) }}"
                                                class="btn  waves-effect waves-themed btn-outline-primary">
                                                <i class="fa-solid fa-eye"></i></a>

                                            @if (Auth::user()->role_id == 11)
                                                @if ($item->is_verified == 0)
                                                    <a class="btn btn-outline-primary verified-status"
                                                        href="javascript:void(0);" data-id="{{ $item->id }}"><i
                                                            class="fas fa-check-circle"></i></a>
                                                @endif
                                            @endif
                                            @if (Auth::user()->role_id != 12)
                                                @can('notice-edit')
                                                    @if ($item->is_verified == 0)
                                                        <a class="btn btn-outline-primary"
                                                            href="{{ route('notices.edit', $item->id) }}"><i
                                                                class="fa-solid fa-pen-to-square"></i></a>
                                                    @endif
                                                @endcan
                                            @endif

                                            @if (Auth::user()->role_id != 12)
                                                @if ($item->status == 0)
                                                    @if ($item->is_verified == 0)
                                                        @can('notice-delete')
                                                            {!! Form::open([
                                                                'method' => 'GET',
                                                                'route' => ['notices.destroy', $item->id],
                                                                'style' => 'display:inline',
                                                                'id' => 'deleteForm',
                                                            ]) !!}
                                                            {!! Form::button('<i class="fa fa-trash"></i>', [
                                                                'type' => 'submit',
                                                                'class' => 'btn btn-outline-danger delNotice',
                                                                'id' => 'deleteThis',
                                                            ]) !!} {!! Form::close() !!}
                                                        @endcan
                                                    @endif
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
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
                    }
                });
            }
        });
    </script>
@endsection

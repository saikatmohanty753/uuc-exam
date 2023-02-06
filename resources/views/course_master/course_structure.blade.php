@extends('layouts.app')
@section('content')
    <style>
        ul,
        #myUL {
            list-style-type: none;
        }

        #myUL {
            margin: 0;
            padding: 0;
        }

        .caret {
            cursor: pointer;
            -webkit-user-select: none;
            /* Safari 3.1+ */
            -moz-user-select: none;
            /* Firefox 2+ */
            -ms-user-select: none;
            /* IE 10+ */
            user-select: none;
        }

        .caret::before {
            content: "\25B6";
            color: #7d9cb5;
            display: inline-block;
            margin-right: 6px;
        }

        .caret-down::before {
            -ms-transform: rotate(90deg);
            /* IE 9 */
            -webkit-transform: rotate(90deg);
            /* Safari */
            '
    transform: rotate(90deg);
        }

        .nested {
            display: none;
        }

        .active {
            display: block;
        }
    </style>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Stream Wise Course List</h5>
                    <div class="card-actions float-right">

                    </div>
                </div>
                <div class="card-body">
                    <ul id="myUL">
                        @foreach ($data as $key => $item)
                            <li><span class="caret h4 text-info">{{ $item->course_for }}</span>
                                <ul class="nested">

                                    @foreach ($item->courseList as $key => $course)
                                        <li><span class="caret h5">{{ $course->name }}</span>
                                            <ul class="nested">

                                                @for ($i = 1; $i <= $item->semester; $i++)
                                                    <li><span class="caret h5">{{ app\Helpers\Helpers::number($i) }}
                                                            Semester</span>
                                                        <ul class="nested">
                                                            <li><span class="caret h6">Subject 1</span>

                                                            </li>
                                                        </ul>
                                                    </li>
                                                @endfor


                                            </ul>
                                        </li>
                                    @endforeach

                                    {{-- @for ($i = 1; $i <= $item->semester; $i++)
                                        <li><span class="caret h5">{{ app\Helpers\Helpers::number($i) }} Semester</span>
                                            <ul class="nested">
                                                <li><span class="caret h6">Course 1</span>

                                                </li>
                                            </ul>
                                        </li>
                                    @endfor --}}



                                </ul>
                            </li>
                        @endforeach
                    </ul>

                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        var toggler = document.getElementsByClassName("caret");
        var i;

        for (i = 0; i < toggler.length; i++) {
            toggler[i].addEventListener("click", function() {
                this.parentElement.querySelector(".nested").classList.toggle("active");
                this.classList.toggle("caret-down");
            });
        }
    </script>
@endsection

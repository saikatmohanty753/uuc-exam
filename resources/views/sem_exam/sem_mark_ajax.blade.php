<style>
    .box-body {
        padding: 30px;
    }

    .error {
        color: #fd3995;
    }
    .select2-container{
        z-index: 2051;
    }
    th {
        border: 1px solid #000 !important;
    }
    .algin-td{
        vertical-align : middle;
        text-align:center;
    }
</style>
@php
    $dataexcel = array(
        'course_id'=>$course_id,
        'sem_id'=>$sem_id,
        'batch_id'=>$batch_id,
        'course'=>$course,
        'total_count'=>$total_count,
        'theory'=>$theory,
        'practical'=>$practical,
        'theory_count'=>$theory_count,
        'practical_count'=>$practical_count
    );
    $dataexcel = json_encode($dataexcel);
@endphp
<link rel="stylesheet" href="{{ asset('backend/css/datagrid/datatables/datatables.bundle.css') }}">
<div class="row">
    <div class="col-xl-12">
        <div class="panel" id="panel-1">
            <div class="panel-container show">
                <div class="panel-hdr" style="display: none">
                    <h2>Import Excel</h2>
                    <div class="card-actions float-end">
                        <form method="POST" action="{{ route('save-sem-entry-excel') }}" enctype="multipart/form-data">
                            <div class="form-group" style="display: flex">
                                @csrf
                                <input type="hidden" name="token_entyp" value="{{ encrypt($dataexcel) }}" />
                                <input type="file" class="form-control" name="excel_file" required> &nbsp;
                                <a href="{{ route('mark-sem-excel',[encrypt($dataexcel)]) }}" class="btn btn-info btn-sm"><i class="fa fa-download"></i></a> &nbsp;
                                <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="panel-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="text-fade table table-bordered display no-footer table-responsive-lg dt-table ">
                                <thead>
                                    <tr class="text-dark">
                                        <th rowspan="5" class="text-center">Roll No.</th>
                                        <th rowspan="5" class="text-center">Regd. No.</th>
                                        <th colspan="{{ $total_count }}" class="text-center">{{ $course->name.' ('.$batch_id.') '.ordinal($sem_id).' Semester' }}</th>
                                        <th rowspan="5" class="text-center">Total Marks Secured</th>
                                        <th rowspan="5" class="text-center">Result</th>
                                    </tr>
                                    <tr>
                                        <th colspan="{{ $theory_count }}" class="text-center">Theory</th>
                                        <th colspan="{{ $practical_count }}" class="text-center">Practical</th>
                                        <th class="text-center" rowspan="4">Total Grade points</th>
                                        <th class="text-center" rowspan="4">Total Credit Points</th>
                                        <th class="text-center" rowspan="4">SGPA</th>
                                    </tr>
                                    <tr>
                                        @if(isset($theory) && $theory_count > 0)
                                        @foreach($theory as $t)
                                        <th class="text-center" colspan="5">{{ $t->paper_code }}</th>
                                        @endforeach
                                        @endif
                                        @if(isset($practical) && $practical_count > 0)
                                        @foreach($practical as $p)
                                        <th class="text-center" colspan="5">{{ $p->paper_code }}</th>
                                        @endforeach
                                        @endif
                                    </tr>
                                    <tr>
                                        @if(isset($theory) && $theory_count > 0)
                                        @foreach($theory as $t)
                                        <th>Mid Sem</th>
                                        <th>End Sem</th>
                                        <th>Total</th>
                                        <th>GP</th>
                                        <th>CP</th>
                                        @endforeach
                                        @endif
                                        @if(isset($practical) && $practical_count > 0)
                                        @foreach($practical as $p)
                                        <th>Mid Sem</th>
                                        <th>End Sem</th>
                                        <th>Total</th>
                                        <th>GP</th>
                                        <th>CP</th>
                                        @endforeach
                                        @endif
                                    </tr>
                                    <tr>
                                        @if(isset($theory) && $theory_count > 0)
                                        @foreach($theory as $t)
                                        <th class="text-center">{{ $t->theory_mid_sem }}</th>
                                        <th class="text-center">{{ $t->theory_end_sem }}</th>
                                        <th class="text-center">{{ $t->theory_total_sem }}</th>
                                        <th class="text-center">4</th>
                                        <th class="text-center">{{ $t->theory_credit_sem }}</th>
                                        @endforeach
                                        @endif
                                        @if(isset($practical) && $practical_count > 0)
                                        @foreach($practical as $p)
                                        <th class="text-center">{{ $p->prac_mid_sem }}</th>
                                        <th class="text-center">{{ $p->prac_end_sem }}</th>
                                        <th class="text-center">{{ $p->prac_total_sem }}</th>
                                        <th class="text-center">4</th>
                                        <th class="text-center">{{ $p->prac_credit_sem }}</th>
                                        @endforeach
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('backend/js/datagrid/datatables/datatables.bundle.js') }}"></script>
<script src="{{ asset('backend/js/datagrid/datatables/datatables.export.js') }}"></script>
<script type="text/javascript">
    var dataTbaleCUrr = $('.datatable').DataTable({
    });
</script>


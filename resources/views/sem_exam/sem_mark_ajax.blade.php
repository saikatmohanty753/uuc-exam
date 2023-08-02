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
</style>
<link rel="stylesheet" href="{{ asset('backend/css/datagrid/datatables/datatables.bundle.css') }}">
<div class="row">
    <div class="col-xl-12">
        <div class="panel" id="panel-1">
            <div class="panel-container show">
                <div class="panel-content">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="text-fade table table-bordered display no-footer table-responsive-lg dt-table ">
                                <thead>
                                    <tr class="text-dark">
                                        <th rowspan="10" class="text-center">Roll No.</th>
                                        <th rowspan="10" class="text-center">Regd. No.</th>
                                        <th colspan="{{ $total_count }}" class="text-center">{{ $course->name.' ('.$batch_id.') '.ordinal($sem_id).' Semester' }}</th>
                                        <th rowspan="10" class="text-center">Total Marks Secured</th>
                                        <th rowspan="10" class="text-center">Result</th>
                                    </tr>
                                    <tr>
                                        <th colspan="{{ $theory_count }}" class="text-center">Theory</th>
                                        <th colspan="{{ $practical_count }}" class="text-center">Practical</th>
                                        <th class="text-center" rowspan="5">Total Credits</th>
                                        <th class="text-center" rowspan="5">Total Credit Points</th>
                                        <th class="text-center" rowspan="5">SGPA</th>
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
                                        <th>{{ $t->theory_mid_sem }}</th>
                                        <th>{{ $t->theory_end_sem }}</th>
                                        <th>{{ $t->theory_total_sem }}</th>
                                        <th>4</th>
                                        <th>{{ $t->theory_credit_sem }}</th>
                                        @endforeach
                                        @endif
                                        @if(isset($practical) && $practical_count > 0)
                                        @foreach($practical as $p)
                                        <th>{{ $p->prac_mid_sem }}</th>
                                        <th>{{ $p->prac_end_sem }}</th>
                                        <th>{{ $p->prac_total_sem }}</th>
                                        <th>4</th>
                                        <th>{{ $p->prac_credit_sem }}</th>
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


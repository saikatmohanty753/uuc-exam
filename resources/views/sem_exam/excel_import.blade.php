<table border="1" style="border: 1px solid #000">
    <thead>
        <tr>
            <th rowspan="5" style="font-weight: bold;justify-content:center;border: 1px solid #000;text-align:center">Roll No.</th>
            <th rowspan="5" style="font-weight: bold;justify-content:center;border: 1px solid #000">Regd. No.</th>
            <th colspan="{{ $total_count }}" style="font-weight: bold;justify-content:center;border: 1px solid #000;text-align:center">{{ $course->name.' ('.$batch_id.') '.ordinal($sem_id).' Semester' }}</th>
            <th rowspan="5" style="font-weight: bold;justify-content:center;border: 1px solid #000;text-align:center">Total Marks Secured</th>
            <th rowspan="5" style="font-weight: bold;justify-content:center;border: 1px solid #000;text-align:center">Result</th>
        </tr>
        <tr>
            <th colspan="{{ $theory_count }}" style="font-weight: bold;text-align:center;border: 1px solid #000">Theory</th>
            <th colspan="{{ $practical_count }}" style="font-weight: bold;text-align:center;border: 1px solid #000">Practical</th>
            <th style="font-weight: bold;text-align:center;border: 1px solid #000" rowspan="4">Total Grade Points</th>
            <th style="font-weight: bold;text-align:center;border: 1px solid #000" rowspan="4">Total Credit Points</th>
            <th style="font-weight: bold;text-align:center;border: 1px solid #000" rowspan="4">SGPA</th>
        </tr>
        <tr>
            @if(isset($theory) && $theory_count > 0)
            @foreach($theory as $t)
            <th style="font-weight: bold;text-align:center;border: 1px solid #000" colspan="5">{{ $t->paper_code }}</th>
            @endforeach
            @endif
            @if(isset($practical) && $practical_count > 0)
            @foreach($practical as $p)
            <th style="font-weight: bold;text-align:center;border: 1px solid #000" colspan="5">{{ $p->paper_code }}</th>
            @endforeach
            @endif
        </tr>
        <tr>
            @if(isset($theory) && $theory_count > 0)
            @foreach($theory as $t)
            <th style="border: 1px solid #000;font-weight:bold">Mid Sem</th>
            <th style="border: 1px solid #000;font-weight:bold">End Sem</th>
            <th style="border: 1px solid #000;font-weight:bold">Total</th>
            <th style="border: 1px solid #000;font-weight:bold">GP</th>
            <th style="border: 1px solid #000;font-weight:bold">CP</th>
            @endforeach
            @endif
            @if(isset($practical) && $practical_count > 0)
            @foreach($practical as $p)
            <th style="border: 1px solid #000;font-weight:bold">Mid Sem</th>
            <th style="border: 1px solid #000;font-weight:bold">End Sem</th>
            <th style="border: 1px solid #000;font-weight:bold">Total</th>
            <th style="border: 1px solid #000;font-weight:bold">GP</th>
            <th style="border: 1px solid #000;font-weight:bold">CP</th>
            @endforeach
            @endif
        </tr>
        <tr>
            @if(isset($theory) && $theory_count > 0)
            @foreach($theory as $t)
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $t->theory_mid_sem }}</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $t->theory_end_sem }}</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $t->theory_total_sem }}</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">4</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $t->theory_credit_sem }}</th>
            @endforeach
            @endif
            @if(isset($practical) && $practical_count > 0)
            @foreach($practical as $p)
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $p->prac_mid_sem }}</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $p->prac_end_sem }}</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $p->prac_total_sem }}</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">4</th>
            <th style="font-weight: bold;justify-content:center;border: 1px solid #000">{{ $p->prac_credit_sem }}</th>
            @endforeach
            @endif
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

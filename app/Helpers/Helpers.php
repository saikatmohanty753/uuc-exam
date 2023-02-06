<?php

namespace App\Helpers;

use App\Models\Affiliation_feemaster;
use App\Models\AffiliationType;
use Illuminate\Support\Facades\Auth;

class Helpers
{
    public static function number($number)
    {
        $array = ["First", "Second", "Third", "Four", "Fifth", 'Six', 'Seven', 'Eight'];
        return $array[$number - 1];
    }

}

<?php

namespace App\Helpers;

use App\Models\Affiliation_feemaster;
use App\Models\AffiliationType;
use App\Models\ExamNoticeType;
use App\Models\Notice;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Helpers
{
    public static function number($number)
    {
        $array = ["First", "Second", "Third", "Four", "Fifth", 'Six', 'Seven', 'Eight'];
        return $array[$number - 1];
    }


    public static function examNoticeType($id)
    {
        $data = ExamNoticeType::find($id);
        return $data->notice_name;
    }

    public static function noticeTime($id)
    {
        $notice = Notice::whereId($id)->first(['published_date']);
        $publish_date = Carbon::parse($notice->published_date);
        $diffSec = $publish_date->diffInSeconds(Carbon::now());
        if ($diffSec < 60) {
            return $diffSec . ($diffSec > 1 ? ' seconds ' : ' sec');
        } elseif ($diffSec > 60) {
            $diffMin = $publish_date->diffInMinutes(Carbon::now());
            if ($diffMin < 60) {
                return $diffMin . ($diffMin > 1 ? ' minutes ' : ' min');
            } elseif ($diffMin > 60) {
                $diffHour = $publish_date->diffInHours(Carbon::now());
                if ($diffHour < 24) {
                    return $diffHour . ($diffHour > 1 ? ' hours ' : ' hour ');
                } elseif ($diffHour > 24) {
                    $diffDay = $publish_date->diffInDays(Carbon::now());
                    if ($diffDay < 365) {
                        return $diffDay . ($diffDay > 1 ? ' days ' : ' day ');
                    } elseif ($diffDay > 365) {
                        $diffYear = $publish_date->diffInYears(Carbon::now());
                        return $diffYear . ($diffYear > 1 ? ' years ' : ' year ');
                    }
                }
            }
        }
    }
}



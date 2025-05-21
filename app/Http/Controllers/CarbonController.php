<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class CarbonController extends Controller
{
    public function testcarbon()
    {
        // $now = Carbon::now();
        // $today = Carbon::today();
        // $tomorrow = Carbon::tomorrow();
        // $yesterday = Carbon::yesterday();

        // echo $now . '<br>';
        // echo $today->shortLocaleDayOfWeek . '<br>';
        // echo $tomorrow . '<br>';
        // echo $yesterday . '<br>';



        //analysis the string you added to can do any opertaion on it
        // $date = Carbon::parse('2023-05-15 14:30:00');
        // echo $date->shortLocaleDayOfWeek . "<br>";

        // $date1 = Carbon::parse('may 15 2025');
        // echo $date1->shortLocaleDayOfWeek. "<br>";

        // $dateTime = Carbon::parse('May 15 2023 2:30 pm');

        // $addtime = Carbon::now('Africa/Cairo');
        // echo $addtime->addDay();


        // $date = CarbonImmutable::parse('2025/05/03 12:30 pm','Africa/Cairo');
        // echo $date->format('Y M d h:i') . '<br>';
        // echo $date->toDateString() . '<br>';
        // echo $date->toDateTimeString() . '<br>';
        // echo $date->toFormattedDateString() . '<br>';
        // echo $date->diffForHumans() . '<br>';



        //compare between dates
        // $f = CarbonImmutable::parse('2025-04-15');
        // $l = CarbonImmutable::parse('2025-05-15');

        // $date = CarbonImmutable::now();

        // echo $date->isBetween($f , $l); // true (05-05-2025)

        // $date = CarbonImmutable::now();
        // echo $date->year . "<br>";
        // echo $date->month . "<br>";
        // echo $date->day . "<br>";
        // echo $date->hour . "<br>";
        // echo $date->minute . "<br>";
        // echo $date->timestamp . "<br>";


        //check dates
        // $date = CarbonImmutable::now()->setTimezone('Africa/Cairo');

        // echo $date->timezone;

        $f = CarbonImmutable::parse('2001-09-23');
        $now = CarbonImmutable::now();
        // $l = CarbonImmutable::parse('2025-05-15');

        // echo  $f->diffInDays($l) . "<br>";
        // echo  $f->diffInHours($l) . "<br>";
        // echo  $f->diffInWeeks($l) . "<br>";
        // echo  $f->diffInMonths($l) . "<br>";
        // echo  $f->diffInYears($l) . "<br>";

        $age = $f->diffInYears($now);

        echo (int)$age ;


    }
}

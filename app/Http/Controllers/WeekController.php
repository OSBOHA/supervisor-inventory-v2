<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Week;

class WeekController extends Controller
{
    public function __construct()
    {
        $now = Carbon::now();
        define(
            'YEAR_WEEKS',
            array(
                array('title' => 'First week in January', 'date'   => Carbon::parse('first SUNDAY of January')->format('Y-m-d')),
                array('title' => 'The second week in January', 'date' => Carbon::parse('first SUNDAY of January')->addWeek(1)->format('Y-m-d')),
                array('title' => 'Third  week in January', 'date' =>  Carbon::parse('first SUNDAY of January')->addWeek(2)->format('Y-m-d')),
                array('title' => 'Fourth  week in January', 'date' =>  Carbon::parse('last SUNDAY of January')->format('Y-m-d')),

                array('title' => 'First week in Februay', 'date'   => Carbon::parse('first SUNDAY of Feb')->format('Y-m-d')),
                array('title' => 'The second week in Februay', 'date' => Carbon::parse('first SUNDAY of Feb')->addWeek(1)->format('Y-m-d')),
                array('title' => 'Third  week in Februay', 'date' =>  Carbon::parse('first SUNDAY of Feb')->addWeek(2)->format('Y-m-d')),
                array('title' => 'Fourth  week in Februay', 'date' =>  Carbon::parse('last SUNDAY of Feb')->format('Y-m-d')),

                array('title' => 'First week in March', 'date'   => Carbon::parse('first SUNDAY of March')->format('Y-m-d')),
                array('title' => 'The second week in March', 'date' => Carbon::parse('first SUNDAY of March')->addWeek(1)->format('Y-m-d')),
                array('title' => 'Third  week in March', 'date' =>  Carbon::parse('first SUNDAY of March')->addWeek(2)->format('Y-m-d')),
                array('title' => 'Fourth  week in March', 'date' =>  Carbon::parse('last SUNDAY of March')->format('Y-m-d')),
                ));
        
 

    }

    public function create()
    {
        $week = new Week();
        $week->title = $this->search_for_week_title(Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d'), YEAR_WEEKS);
        $week->supervisor_timer = Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        $week->advisor_timer = Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d');
        $val = $this->search_for_week_title(Carbon::now()->startOfWeek(Carbon::SUNDAY)->format('Y-m-d'), YEAR_WEEKS);
        if ($week->save()) {
            return "add week";
        } else {
            return'could not add week';
        }
    }
    public function search_for_week_title($date, $year_weeks)
    {
        foreach ($year_weeks as $val) {
            if ($val['date'] === $date) {
                return $val['title'];
            }
        }
        return NULL;
    }
}

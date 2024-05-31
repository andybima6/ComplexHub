<?php

namespace App\Http\Controllers;

use ArielMejiaDev\LarapexCharts\LarapexChart;

class ChartController extends Controller
{
    public function index()
    {
        $chart = (new LarapexChart)->lineChart()
            ->setTitle('Sample Line Chart')
            ->setSubtitle('Sample subtitle')
            ->addData('Data Set 1', [30, 40, 35, 50, 49, 60, 70, 91, 125])
            ->addData('Data Set 2', [23, 12, 54, 61, 32, 56, 81, 19, 100])
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September']);

        return view('chart', compact('chart'));
    }
}

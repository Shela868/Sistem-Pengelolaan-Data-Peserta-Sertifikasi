<?php

namespace App\Charts;
use App\Models\asesmen;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class adminchart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $asesmen = asesmen::get();

        $label=[
           'Adisucipto, Yogyakarta',
           'Slamet Riyadi, Solo',

        ];
        return $this->chart->barChart()
        ->setTitle('Jumlah Asesmen Berdasarkan Kanwil Yogyakarta')
        // ->setSubtitle('Wins during season 2021.')
        ->addData('Adisucipto, Yogyakarta', [ $asesmen->where('tuk','Yogyakarta')->count()])
        ->addData('Selamet Riyadi, Solo', [ $asesmen->where('tuk','Solo')->count()])
        ->addData('KC Purbalingga', [ $asesmen->where('tuk','Purbalingga')->count()])
        ->addData('Best Kanwil', [ $asesmen->where('tuk','Best Kanwil')->count()])
        // ->addData('Boston', [7, 3, 8, 2, 6, 4])
        ->setXAxis(['TUK']);
    }
}

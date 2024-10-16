<?php

namespace App\Charts;
use App\Models\asesmen;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class surabayachart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $asesmen = asesmen::get();


        return $this->chart->barChart()
        ->setTitle('Jumlah Asesmen Berdasarkan Kanwil Surabaya')
        // ->setSubtitle('Wins during season 2021.')
        ->addData('Sendik Surabaya', [ $asesmen->where('tuk','Sendik')->count()])
        ->addData('Bangkalan', [ $asesmen->where('tuk','Bangkalan')->count()])
        ->addData('Mojokerto', [ $asesmen->where('tuk','Mojokerto')->count()])
        ->addData('Lamongan', [ $asesmen->where('tuk','Lamongan')->count()])
        ->addData('Bojonegoro', [ $asesmen->where('tuk','Bojonegoro')->count()])
        // ->addData('Boston', [7, 3, 8, 2, 6, 4])
        ->setXAxis(['TUK']);
}
}

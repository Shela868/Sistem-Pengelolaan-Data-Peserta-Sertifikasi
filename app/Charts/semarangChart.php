<?php

namespace App\Charts;
use App\Models\asesmen;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class semarangChart
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
        ->setTitle('Jumlah Asesmen Berdasarkan Kanwil Semarang')
        // ->setSubtitle('Wins during season 2021.')
        ->addData('Semarang Mura', [ $asesmen->where('tuk','Semarang')->count()])
        ->addData('Purwodadi', [ $asesmen->where('tuk','Purwodadi')->count()])
        ->addData('Blora', [ $asesmen->where('tuk','Blora')->count()])
        ->addData('Tegal', [ $asesmen->where('tuk','Tegal')->count()])
        ->addData('Pekalongan', [ $asesmen->where('tuk','Pekalongan')->count()])
        ->addData('Kudus', [ $asesmen->where('tuk','Kudus')->count()])
        ->addData('Pati', [ $asesmen->where('tuk','Pati')->count()])
        // ->addData('Boston', [7, 3, 8, 2, 6, 4])
        ->setXAxis(['TUK']);
    }
}

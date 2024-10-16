<?php

namespace App\Charts;
use App\Models\asesmen;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class malangchart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    { $asesmen = asesmen::get();

        return $this->chart->barChart()
        ->setTitle('Jumlah Asesmen Berdasarkan Kanwil Malang')
        // ->setSubtitle('Wins during season 2021.')
        ->addData('Kediri', [ $asesmen->where('tuk','Kediri')->count()])
        ->addData('Nganjuk', [ $asesmen->where('tuk','Nganjuk')->count()])
        ->addData('Madiun', [ $asesmen->where('tuk','Madiun')->count()])
        ->addData('Jember', [ $asesmen->where('tuk','Jember')->count()])
        ->addData('Malang', [ $asesmen->where('tuk','Malang')->count()])
        // ->addData('Boston', [7, 3, 8, 2, 6, 4])
        ->setXAxis(['TUK']);
    }
}

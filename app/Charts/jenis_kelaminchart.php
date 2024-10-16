<?php

namespace App\Charts;
use App\Models\asesmen;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class jenis_kelaminchart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {

        $asesmen = asesmen::get();
        $jumlah = [
            $asesmen->where('jenis_kelamin','L')->count(),
            $asesmen->where('jenis_kelamin','P')->count(),

        ];
        $jenis=[
            'Laki-Laki',
            'Perempuan',


        ];

        return $this->chart->donutChart()
            // ->setTitle('Top 3 scorers of the team.')
            // ->setSubtitle('Season 2021.')
            ->addData($jumlah)
            ->setLabels($jenis)
            ->setColors(['#ffc63b', '#000080']);

    }
}

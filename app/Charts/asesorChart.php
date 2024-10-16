<?php

namespace App\Charts;
use App\Models\asesmen;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class asesorChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart

    {
        $asesmen = asesmen::get();
        $asesor = [
            $asesmen->where('nama_asesor','Agung Yuendro')->count(),
            $asesmen->where('nama_asesor','Agus Saptono')->count(),
            $asesmen->where('nama_asesor','Agus Tri Raharjo')->count(),
            $asesmen->where('nama_asesor','Agustini')->count(),
            $asesmen->where('nama_asesor','Bakri')->count(),
            $asesmen->where('nama_asesor','Dedi Ems')->count(),
            $asesmen->where('nama_asesor','Efendi Hidayat')->count(),
            $asesmen->where('nama_asesor','Elan Nurhadi Purwanto')->count(),
            $asesmen->where('nama_asesor','Endang Sri Watiningsih')->count(),
            $asesmen->where('nama_asesor','Gatot Satrio')->count(),
            $asesmen->where('nama_asesor','Harno')->count(),
            $asesmen->where('nama_asesor','I GST MD Oka Wirawan')->count(),
            $asesmen->where('nama_asesor','Imam Hanafi')->count(),
            $asesmen->where('nama_asesor','Iman Yusuf')->count(),
            $asesmen->where('nama_asesor','Inal Rojid Sihotang')->count(),
            $asesmen->where('nama_asesor','M. Rizkan Gunawan')->count(),
            $asesmen->where('nama_asesor','Paksi Mei Penggalih')->count(),
            $asesmen->where('nama_asesor','Prabowo Ajie')->count(),
            $asesmen->where('nama_asesor','Priyadi')->count(),
            $asesmen->where('nama_asesor','R. Srigati Santoso')->count(),

        ];
        $nama=[
            '1.Agung Yuendro ',
            '2.Agus Saptono',
            '3.Agus Tri Raharjo',
            '4.Agustini',
            '5.Bakri',
            '6.Dedi Ems',
            '7.Efendi Hidayat',
            '8.Elan Nurhadi Purwanto',
            '9.Endang Sri Watiningsih',
            '10.Gatot Satrio',
            '11.Harno',
            '12.I GST MD Oka Wirawan',
            '13.Imam Hanafi',
            '14.Iman Yusuf',
            '15.Inal Rojid Sihotang',
            '16.M. Rizkan Gunawan',
            '17.Paksi Mei Penggalih',
            '18.Prabowo Ajie',
            '19.Priyadi',
            '20.R. Srigati Santoso',

        ];

        return $this->chart->donutChart()
            // ->setTitle('Jumlah Asesmen Berdasarkan Asesor')
            ->addData($asesor)
            ->setLabels($nama);
    }
}

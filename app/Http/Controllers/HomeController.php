<?php

namespace App\Http\Controllers;

use App\Charts\semarangChart;
use App\Models\user;
use App\Models\asesmen;
use App\Models\logadmin;
use Illuminate\Http\Request;
use App\Charts\adminchart;
use App\Charts\asesorChart;
use App\Charts\surabayachart;
use App\Charts\malangchart;
use App\Charts\jenis_kelaminchart;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx\Chart;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(
        Request $request, adminchart $adminchart,
        asesorChart $asesorChart, semarangChart $semarangChart,
        surabayachart $surabayachart, malangchart $malangchart, jenis_kelaminchart $jenis_kelaminchart
    )
    {
        $BK = asesmen::where('keputusan_asesmen', 'BK')->count();
        $K = asesmen::where('keputusan_asesmen', 'K')->count();
        $admin = user::where('role', 'admin')->count();
        $jumlahdata = asesmen::all()->count();
        $asesmen = asesmen::all();
        $user= Auth::user();

        return view(
            'admin.home',
            [
                'asesorChart' => $asesorChart->build(),
                'adminchart' => $adminchart->build(),
                'semarangChart' => $semarangChart->build(),
                'surabayachart' => $surabayachart->build(),
                'malangchart' => $malangchart->build(),
                'jenis_kelaminchart' => $jenis_kelaminchart->build()
            ],

            compact(['K', 'BK', 'jumlahdata', 'admin', 'user'])
        );
    }

    public function logadmin(Request $request)
    {
        $user = Auth::user();
        $activity_log = logadmin::with('user')->limit(8)->orderBy('id', 'DESC')->get();
        return view('admin.logadmin', compact('activity_log', 'user'));
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail_absensi;
use App\Absen;

class PresensiController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->middleware('auth');
        $this->middleware('rule:Admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pil ="-";
        $absen = Detail_absensi::whereDate('created_at',date('Y-m-d',strtotime(now())))->get();
        $hari = array('Monday'  => 'Senin',
                            'Tuesday'  => 'Selasa',
                            'Wednesday' => 'Rabu',
                            'Thursday' => 'Kamis',
                            'Friday' => 'Jumat',
                            'Saturday' => 'Sabtu',
                            'Sunday' => 'Minggu');
                            
        return view('Presensi.presensi',['absen'=>$absen,'hari'=>$hari,'pil'=>$pil]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $hari = array('Monday'  => 'Senin',
        'Tuesday'  => 'Selasa',
        'Wednesday' => 'Rabu',
        'Thursday' => 'Kamis',
        'Friday' => 'Jumat',
        'Saturday' => 'Sabtu',
        'Sunday' => 'Minggu');
        $pil = $request->pilihan;
        if($request->pilihan == "Hari") {
            $absen = Detail_absensi::whereDate('created_at',date('Y-m-d',strtotime($request->date)))->get();
        }else if($request->pilihan == "Bulan") {
            $absen = Detail_absensi::whereMonth('created_at',date('m',strtotime($request->date)))->whereYear('created_at',date('Y',strtotime($request->date)))->get();
        }
        return view('Presensi.presensi',['absen'=>$absen,'hari'=>$hari,'pil'=>$pil]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

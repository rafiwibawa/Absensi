<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Absen;
use App\Detail_absensi;

class KeluarController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->middleware('guest')->except('logout');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Absensi.Keluar.keluar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $user = User::where('barcode',$req->barcode)->first();
        if ($user != Null) {
            $absen = DB::table('absen')->where('id_karyawan',$user->id)->whereDate('created_at',date('Y-m-d',strtotime(now())))->first();
            if($absen == null){
                return redirect('absen/keluar')->with('belum','Belum Absen Masuk');
            }else{
                $detail_absensi=DB::table('detail_absensi')->where('id_absensi',$absen->id)->whereDate('created_at',date('Y-m-d',strtotime(now())))->first();
                if ($detail_absensi->time_in != null && $detail_absensi->time_out == null) {
                    Detail_absensi::where('id_absensi',$absen->id)->update([
                        'time_out' => now(),
                    ]); 
                    return redirect('/absen/keluar')->with('success',$user->name);
                } 
                else if($detail_absensi->time_out != null){
                    return redirect('/absen/keluar')->with('sudah','Sudah Absen');
                }      
            }
        }else{
            return redirect('/absen/keluar')->with('pesan','Gagal Absen, Barcode Tiak Valid !');
           
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

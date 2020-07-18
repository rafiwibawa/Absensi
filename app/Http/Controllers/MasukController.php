<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Absen;
use App\Detail_absensi;

class MasukController extends Controller
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
        return view('Absensi.Masuk.masuk');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req) 
    {
        $user = User::where('barcode',$req->barcode)->first();
        if ( $user != Null) {
            $absen = Absen::where('id_karyawan',$user->id)->first();
            if($absen != null ){
                $absen = DB::table('absen')->where('id_karyawan',$user->id)->whereDate('created_at',date('Y-m-d',strtotime(now())))->first();
                if($absen == null){
                    Absen::create([
                        'id_karyawan' => $user->id,
                    ]);
                    $id = DB::table('absen')->max('id');   
                        Detail_absensi::create([
                        'id_absensi' => $id,
                        'time_in' => now(),
                        ]); 
                     return redirect('absen/masuk')->with('success',$user->name);
                }else{
                    return redirect('/absen/masuk')->with('sudah','Sudah Absen');
                }
            }else{
                Absen::create([
                    'id_karyawan' => $user->id,
                ]);
                $id = DB::table('absen')->max('id');   
                Detail_absensi::create([
                    'id_absensi' => $id,
                    'time_in' => now(),
                ]); 
                return redirect('absen/masuk')->with('success',$user->name);
            }
        }else{
            return redirect('/absen/masuk')->with('pesan','Gagal Absen, Barcode Tiak Valid !');
           
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

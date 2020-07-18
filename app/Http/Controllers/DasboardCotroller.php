<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Detail_absensi;

class DasboardCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin =DB::table('users')
                ->join('jabatan', 'users.id_jabatan','=', 'jabatan.id')
                ->select('users.*' , 'jabatan.level')->where('level',1)->count();

        $user =DB::table('users')
                ->join('jabatan', 'users.id_jabatan','=', 'jabatan.id')
                ->select('users.*' , 'jabatan.level')->where('level',1)->count();
        $bulan = [];
        for ($i=1; $i <= 12; $i++) { 
            $month = Detail_absensi::whereMonth('time_in',$i)->count();
            array_push($bulan,$month);
        }
        return view('Dasboard.dasboard',['admin'=>$admin,'user'=>$user,'bulan'=>$bulan]);
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

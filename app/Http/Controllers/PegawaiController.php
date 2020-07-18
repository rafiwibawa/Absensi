<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Jabatan;
use App\User;

class PegawaiController extends Controller
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
        $user = User::get();
        $jabatan = Jabatan::get();
        return view('Pegawai.pegawai',['jabatan'=>$jabatan,'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $req)
    {
        $id=DB::table('users')->max('id');
        $id+=1;
        User::create([
            'id_jabatan'=>$req->jabatan,
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>Hash::make($req->password),
            'tgl_lahir'=>$req->tgl_lahir,
            'tempat_lahir'=>$req->tempat_lahir,
            'alamat'=>$req->alamat,
            'join_date'=>$req->join,
            'barcode'=>$req->jabatan.date('m',strtotime($req->join)).date('Y',strtotime($req->join)).$id,
        ]);
        return redirect('pegawai')->with('status','Data  Berhasil DiTambah');
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
        DB::table('users')->where('id',$id)->delete();
        return redirect('pegawai')->with('status','Data Pegawai Berhasil DiHapus');
    }
}

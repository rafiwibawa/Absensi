<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Jabatan;

class JabatanController extends Controller
{
    public function __construct()
    {
        date_default_timezone_set("Asia/Jakarta");
        $this->middleware('auth');
        $this->middleware('rule:Admin');
    }

    public function jabatan()
    {
        $jabatan = Jabatan::get();
        return view('Jabatan.jabatan', ['jabatan'=>$jabatan]);
    }

    public function jabatan_input(Request $req)
    {
        Jabatan::create([
            'jabatan'=>$req->jabatan,
        ]);
        return redirect('jabatan')->with('status','Data Jabatan Berhasil DiTambah');
    }

    public function jabatan_edit(Request $req)
    {
        Jabatan::where('id',$req['id'])->update([
            'jabatan' =>$req->jabatan,
        ]);
        return redirect('jabatan')->with('edit','Data User Berhasil DiEdit');
    }

    public function jabatan_hapus($id){
        DB::table('jabatan')->where('id',$id)->delete();
        return redirect('jabatan')->with('hapus','Data Jabatan Berhasil DiHapus');
    }
}

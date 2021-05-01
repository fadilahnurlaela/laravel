<?php

namespace App\Http\Controllers;

use App\Models\Closes;
use App\Models\Comes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class ComesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $masuk = Comes::all();
        return view('comes', compact('user', 'masuk'));
    }

    public function tambah_comes(Request $req)
    {
        $masuk = new Comes;

        $masuk->nama = $req->get('nama');
        $masuk->tanggal = $req->get('tanggal');
        $masuk->jumlah = $req->get('jumlah');

        $masuk->save();

        $notification = array(
            'message' => 'Data barang masuk berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.masuk')->with($notification);
    }
    //proses ajax
    public function getDataComes($id)
    {
        $masuk = Comes::find($id);

        return response()->jsonp($masuk);
    }

    public function update_comes(Request $req)
    {

        $masuk = Comes::find($req->get('id'));

        $masuk->nama = $req->get('nama');
        $masuk->tanggal = $req->get('tanggal');
        $masuk->jumlah = $req->get('jumlah');

        $masuk->save();

        $notification = array(
            'message' => 'Data barang masuk berhasil diedit',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.masuk')->with($notification);
    }

    public function delete_comes(Request $req)
    {
        $masuk = Comes::find($req->get('id'));

        $masuk->delete();

        $notification = array(
            'message' => 'Data barang masuk berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.masuk')->with($notification);
    }
}

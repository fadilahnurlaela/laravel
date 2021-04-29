<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $merek = Brands::all();
        return view('brands', compact('user', 'merek'));
    }

    public function tambah_brand(Request $req)
    {
        $merek = new Brands;

        $merek->brand = $req->get('brand');
        $merek->keterangan = $req->get('keterangan');

        $merek->save();

        $notification = array(
            'message' => 'Data brand berhasil ditambahkan',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.merek')->with($notification);
    }
    //Ajax Processes
    public function getDataBrands($id)
    {
        $merek = Brands::find($id);

        return response()->json($merek);
    }

    public function update_brands(Request $req)
    {
        $merek = Brands::find($req->get('id'));

        $merek->brand = $req->get('brand');
        $merek->keterangan = $req->get('keterangan');

        $merek->save();

        $notification = array(
            'message' => 'Data Brand berhasil diedit',
            'alert-type' => 'success'
        );


        return redirect()->route('admin.merek')->with($notification);
    }
    public function delete_brands(Request $req)
    {
        $merek = Brands::find($req->get('id'));

        $merek->delete();
        $notification = array(
            'message' => 'Data Brand Berhasil di Hapus',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.merek')->with($notification);
    }
}

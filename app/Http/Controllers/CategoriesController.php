<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class CategoriesController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $kategori = Categories::all();
        return view('categories', compact('user', 'kategori'));
    }

    public function tambah_categories(Request $req)
    {
        $kategori = new Categories;

        $kategori->nama = $req->get('nama');
        $kategori->keterangan = $req->get('keterangan');

        $kategori->save();

        $notification = array(
            'message' => 'Data kategori berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kategori')->with($notification);
    }
    //proses ajax
    public function getDataCategories($id)
    {
        $kategori = Categories::find($id);

        return response()->jsonp($kategori);
    }

    public function update_categories(Request $req)
    {

        $kategori = Categories::find($req->get('id'));

        $kategori->nama = $req->get('nama');
        $kategori->keterangan = $req->get('keterangan');

        $kategori->save();

        $notification = array(
            'message' => 'Data kategori berhasil diedit',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.kategori')->with($notification);
    }

    public function delete_categories(Request $req)
    {
        $kategori = Categories::find($req->get('id'));

        $kategori->delete();

        $notification = array(
            'message' => 'Data kategori berhasil dihapus',
            'alert-type' => 'success'
        );
        return redirect()->route('admin.kategori')->with($notification);
    }
}

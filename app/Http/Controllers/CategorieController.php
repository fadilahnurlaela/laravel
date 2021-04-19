<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CategorieController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $categories = Categorie::all();
        return view('categories', compact('user', 'categories'));
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
    public function store(Request $req)
    {
        $categories = new Categorie;

        $categories->nama = $req->get('nama');
        // $categories->jenis = $req->get('jenis');
        $categories->keterangan = $req->get('keterangan');

        $categories->save();

        $notification = array(
            'message' => 'Data Obat berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories')->with($notification);
    }


    public function show(Categorie $categories)
    {
        //
    }

    public function edit(Categorie $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Drug  $book
     * @return \Illuminate\Http\Response
     */

    public function update(Request $req)
    {
        $categories = Categorie::find($req->get('id'));

        $categories->nama = $req->get('nama');
        // $categories->jenis = $req->get('jenis');
        $categories->keterangan = $req->get('keterangan');

        $categories->save();

        $notification = array(
            'message' => 'Data sepatu berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $book
     * @return \Illuminate\Http\Response
     */
    public function getDataCategorie($id)
    {
        $categories = Categorie::find($id);

        return response()->json($categories);
    }
    public function destroy(Request $req)
    {
        $categories = Categorie::find($req->id);
        // Storage::delete('public/cover_drug/'.$req->get('old_cover'));
        $categories->delete();

        $notification = array(
            'message' => 'Data sepatu berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.categories')->with($notification);
    }
}

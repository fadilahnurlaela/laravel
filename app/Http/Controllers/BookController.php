<?php

namespace App\Http\Controllers;

use App\Models\Book;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\Category;

class BookController extends Controller
{

    public function index()
    {
        $user = Auth::user();
        $books = Book::all();
        return view('book', compact('user', 'books'));
    }


    public function create()
    {
        //
    }


    public function store(Request $req)
    {
        $books = new Book;

        $books->nama = $req->get('nama');
        $books->categories = $req->get('categories');
        $books->brands = $req->get('brands');
        $books->stok = $req->get('stok');
        $books->harga = $req->get('harga');



        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_book_' . time() . '.' . $extension;

            $req->file('cover')->storeAs(
                'public/cover_book',
                $filename
            );

            $books->cover = $filename;
        }

        $books->save();

        $notification = array(
            'message' => 'Barang berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    public function submit_Book(Request $req)
    {
        $books = new Book;

        $books->nama = $req->get('nama');
        $books->categories = $req->get('categories');
        $books->brands = $req->get('brands');
        $books->stok = $req->get('stok');
        $books->harga = $req->get('harga');

        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_book' . time() . '.' . $extension;
            $req->file('cover')->storeAs(
                'public/cover_book',
                $filename
            );

            $books->cover = $filename;
        }
        $books->save();

        $notification = array(
            'message' => 'Barang berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    public function show(Book $books)
    {
        //
    }

    public function edit(Book $books)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */

    public function update(Request $req)
    {
        $books = Book::find($req->get('id'));

        $books->nama = $req->get('nama');
        $books->categories = $req->get('categories');
        $books->brands = $req->get('brands');
        $books->stok = $req->get('stok');
        $books->harga = $req->get('harga');


        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_book_' . time() . '.' . $extension;

            $req->file('cover')->storeAs(
                'public/cover_book',
                $filename
            );

            Storage::delete('public/cover_book/' . $req->get('old_cover'));

            $books->cover = $filename;
        }

        $books->save();

        $notification = array(
            'message' => 'Barang berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function getDataBook($id)
    {
        $books = Book::find($id);

        return response()->json($books);
    }
    public function destroy(Request $req)
    {
        $books = Book::find($req->id);
        Storage::delete('public/cover_Book/' . $req->get('old_cover'));
        $books->delete();

        $notification = array(
            'message' => 'Barang berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    public function delete_Book(Request $req)
    {
        $books = Book::find($req->get('id'));

        storage::delete('public/cover_book/' . $req->get('old_cover'));

        $books->delete();

        $notification = array(
            'message' => 'Barang Berhasil Dihapus',
            'alert-type' => 'succes'
        );

        return redirect()->route('admin.books')->with($notification);
    }
}

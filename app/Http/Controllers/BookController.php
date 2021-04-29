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
        $book = new Book();

        $book->nama = $req->get('nama');
        $book->categories = $req->get('categories');
        $book->brands = $req->get('brands');
        $book->stok = $req->get('stok');
        $book->harga = $req->get('harga');


        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_book_' . time() . '.' . $extension;

            $req->file('cover')->storeAs(
                'public/cover_book',
                $filename
            );

            $book->cover = $filename;
        }

        $book->save();

        $notification = array(
            'message' => 'Data Sepatu berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    public function submit_book(Request $req)
    {
        $book = new Book;

        $book->nama = $req->get('nama');
        $book->kategori = $req->get('kategori');
        $book->merek = $req->get('merek');
        $book->harga = $req->get('harga');
        $book->stok = $req->get('stok');
        $book->categories = $req->get('categories');
        $book->brands = $req->get('brands');

        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_book' . time() . '.' . $extension;
            $req->file('cover')->storeAs(
                'public/cover_book',
                $filename
            );

            $book->cover = $filename;
        }
        $book->save();

        $notification = array(
            'message' => 'Data Sepatu berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }


    public function show(Book $book)
    {
        //
    }


    public function edit(Book $book)
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
        $book = Book::find($req->get('id'));

        $book->nama = $req->get('nama');
        $book->categories = $req->get('categories');
        $book->brands = $req->get('brands');
        $book->stok = $req->get('stok');
        $book->harga = $req->get('harga');


        if ($req->hasFile('cover')) {
            $extension = $req->file('cover')->extension();

            $filename = 'cover_book_' . time() . '.' . $extension;

            $req->file('cover')->storeAs(
                'public/cover_book',
                $filename
            );

            Storage::delete('public/cover_book/' . $req->get('old_cover'));

            $book->cover = $filename;
        }

        $book->save();

        $notification = array(
            'message' => 'Data Sepatu berhasil diubah',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Drug  $book
     * @return \Illuminate\Http\Response
     */
    public function getDataBook($id)
    {
        $book = Book::find($id);

        return response()->json($book);
    }
    public function destroy(Request $req)
    {
        $book = Book::find($req->id);
        Storage::delete('public/cover_book/' . $req->get('old_cover'));
        $book->delete();

        $notification = array(
            'message' => 'Data Sepatu berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.books')->with($notification);
    }

    public function delete_book(Request $req)
    {
        $book = Book::find($req->get('id'));

        storage::delete('public/cover_book/' . $req->get('old_cover'));

        $book->delete();

        $notification = array(
            'message' => 'Data Sepatu Berhasil Dihapus',
            'alert-type' => 'succes'
        );

        return redirect()->route('admin.books')->with($notification);
    }
}

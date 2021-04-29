<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Book;
use PDF;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user();
        return view('home', compact('user'));
    }

    // public function submit_book(Request $req)
    // {
    //     $book = new Book;

    //     $book->nama = $req->get('nama');
    //     $book->kategori = $req->get('kategori');
    //     $book->merek = $req->get('merek');
    //     $book->harga = $req->get('harga');
    //     $book->stok = $req->get('stok');

    //     if ($req->hasFile('cover')) {
    //         $extension = $req->file('cover')->extension();

    //         $filename = 'cover_buku_' . time() . '.' . $extension;
    //         $req->file('cover')->storeAs(
    //             'public/cover_buku',
    //             $filename
    //         );

    //         $book->cover = $filename;
    //     }
    //     $book->save();

    //     $notification = array(
    //         'message' => 'Data sepatu berhasil ditambahkan',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.books')->with($notification);
    // }

    // public function update_book(Request $req)
    // {
    //     $book = Book::find($req->get('id'));

    //     $book->nama = $req->get('nama');
    //     $book->kategori = $req->get('kategori');
    //     $book->merek = $req->get('merek');
    //     $book->harga = $req->get('harga');
    //     $book->stok = $req->get('stok');

    //     if ($req->hasFile('cover')) {
    //         $extension = $req->file('cover')->extension();

    //         $filename = 'cover_buku' . time() . '.' . $extension;
    //         $req->file('cover')->storeAs(
    //             'public/cover_buku',
    //             $filename
    //         );
    //         Storage::delete('public/cover_buku/' . $req->get('old_cover'));

    //         $book->cover = $filename;
    //     }
    //     $book->save();

    //     $notification = array(
    //         'message' => 'Data sepatu berhasil diubah',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('admin.books')->with($notification);
    // }

    // public function delete_book(Request $req)
    // {
    //     $book = Book::find($req->get('id'));

    //     storage::delete('public/cover_buku/' . $req->get('old_cover'));

    //     $book->delete();

    //     $notification = array(
    //         'message' => 'Data sepatu Berhasil Dihapus',
    //         'alert-type' => 'succes'
    //     );

    //     return redirect()->route('admin.books')->with($notification);
    // }
    // public function print_books()
    // {
    //     $books = Book::all();

    //     $pdf = PDF::loadview('print_books', ['books' => $books]);
    //     return $pdf->download('data_buku.pdf');
    // }
}

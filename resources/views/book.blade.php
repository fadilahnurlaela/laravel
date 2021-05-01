@extends('adminlte::page')

@section('title', 'Pengelolaan Barang')

@section('content_header')
<h1>Pengelolaan Barang</h1>
@stop

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Pengelolaan Barang')}}

                    {{-- <button class="btn btn-secondary float-right" data-toggle="modal"><a href="{{ route('admin.print.books') }}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a></button> --}}
                </div>
                <div class="card-body">
                    <button class="btn btn-primary float-left" data-toggle="modal" data-target="#tambahBookModal"><i class="fa fa-plus"></i> Tambah Data</button>
                    <div class="btn-group mb-5" role="group" aria-label="Basis Example">
                    </div>
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA </th>
                                <th>KATEGORI</th>
                                <th>MEREK</th>
                                <th>STOK</th>
                                <th>HARGA</th>
                                <th>COVER</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($books as $books)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $books->nama }}</td>
                                <td>{{ $books->categories }}</td>
                                <td>{{ $books->brands }}</td>
                                <td>{{ $books->stok }}</td>
                                <td>{{ $books->harga }}</td>

                                <td>
                                    @if($books->cover !== null)
                                    <img src="{{asset('storage/cover_book/'.$books->cover) }}" width="100px" />
                                    @else
                                    [gambar tidak tersedia]
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-books" class="btn" data-toggle="modal" data-target="#editBookModal" data-id="{{ $books->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" id="btn-delete-books" class="btn" data-toggle="modal" data-target="#deleteBookModal" data-id="{{ $books->id }}" data-cover="{{ $books->cover }}"><i class="fa fa-trash"></i></button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.books.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" required />
                    </div>
                    <div class="form-group">
                        <label for="categories">Kategori Id</label>
                        <input type="text" class="form-control" name="categories" id="categories" required />
                    </div>
                    <div class="form-group">
                        <label for="brands">Brand Id</label>
                        <input type="text" class="form-control" name="brands" id="brands" required />
                    </div>
                    <div class="form-group">
                        <label for="stok">Jumlah</label>
                        <input type="text" class="form-control" name="stok" id="stok" required />
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" required />
                    </div>

                    <div class="form-group">
                        <label for="cover">Gambar</label>
                        <input type="file" class="form-control" name="cover" id="cover" />
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.books.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="edit-nama" required />
                            </div>
                            <!-- <div class="form-group">
                                <label for="edit-kategori">Kategori</label>
                                <input type="text" class="form-control" name="kategori" id="edit-kategori" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-merek">Brand</label>
                                <input type="text" class="form-control" name="merek" id="edit-merek" required />
                            </div> -->
                            <div class="form-group">
                                <label for="edit-categories">Kategori Id</label>
                                <input type="text" class="form-control" name="categories" id="edit-categories" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-brands">Brand Id</label>
                                <input type="text" class="form-control" name="brands" id="edit-brands" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-stok">Jumlah</label>
                                <input type="text" class="form-control" name="stok" id="edit-stok" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-harga">Harga</label>
                                <input type="text" class="form-control" name="harga" id="edit-harga" required />
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="image-area"></div>
                            <div class="form-group">
                                <label for="edit-cover">Gambar</label>
                                <input type="file" class="form-control" name="cover" id="edit-cover" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="edit-id" />
                <input type="hidden" name="old_cover" id="edit-old-cover" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteBookModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data tersebut?
                <form method="post" action="{{ route('admin.books.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="delete-id" value="" />
                <input type="hidden" name="old_cover" id="delete-old-cover" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            {{-- <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBookModal"><i class="fa fa-plus"></i>Tambah Data</button>
            <a href="{{ route('admin.print.books') }}" target="_blank" class="btn btn-danger"></i> Cetak PDF</a>
            <hr /> --}}
            </form>
        </div>
    </div>
</div>
</div>

@stop
@section('css')
<style>
    input[type=text],
    select,
    textarea {
        width: 100%;
        /* Full width */
        padding: 12px;
        /* Some padding */
        border: 1px solid #ccc;
        /* Gray border */
        border-radius: 4px;
        /* Rounded borders */
        box-sizing: border-box;
        /* Make sure that padding and width stays in place */
        margin-top: 6px;
        /* Add a top margin */
        margin-bottom: 16px;
        /* Bottom margin */
        resize: vertical
            /* Allow the user to vertically resize the textarea (not horizontally) */
    }
</style>
@stop
@section('js')
<script>
    $(function() {


        $(document).on('click', '#btn-edit-books', function() {
            let id = $(this).data('id');

            $('#image-area').empty();

            $.ajax({
                type: "get",
                url: baseurl + '/admin/ajaxadmin/dataBook/' + id,
                dataType: 'json',
                success: function(res) {
                    $('#edit-nama').val(res.nama);
                    $('#edit-kategori').val(res.kategori);
                    $('#edit-merek').val(res.merek);
                    $('#edit-categories').val(res.categories);
                    $('#edit-brands').val(res.brands);
                    $('#edit-stok').val(res.stok);
                    $('#edit-harga').val(res.harga);

                    $('#edit-id').val(res.id);
                    $('#edit-old-cover').val(res.cover);

                    if (res.cover !== null) {
                        $('#image-area').append(
                            "<img src='" + baseurl + "/storage/cover_book/" + res.cover + "' width='200px'/>"
                        );
                    } else {
                        $('#image-area').append('[Gambar tidak tersedia]');
                    }
                },
            });
        });

    });

    $(document).on('click', '#btn-delete-books', function() {
        let id = $(this).data('id');
        let cover = $(this).data('cover');
        $('#delete-id').val(id);
        $('#delete-old-cover').val(cover);
        console.log("hallo");
    });
</script>
@stop
@section('js')
<script>

</script>
@stop
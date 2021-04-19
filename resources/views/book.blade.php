@extends('adminlte::page')

@section('title', 'Pengelolaan Barang')

@section('content_header')
<h1>MANAGEMENT OF VANS SHOES</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('vans shoes') }}
                    <button class="btn btn-primary float-right" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus"></i>Tambah Data</button>
                    <button class="btn btn-secondary float-right" data-toggle="modal"><a href="{{ route('admin.print.books') }}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a></button>
                </div>
                <div class="card-body">
                    <table id="table-data" class="table table-borderer display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>N0</th>
                                <th>NAMA BARANG</th>
                                <th>KATEGORI</th>
                                <th>MEREK</th>
                                <th>HARGA</th>
                                <th>STOK</th>
                                <th>FOTO</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($books as $book)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$book->nama}}</td>
                                <td>{{$book->kategori}}</td>
                                <td>{{$book->merek}}</td>
                                <td>{{$book->harga}}</td>
                                <td>{{$book->stok}}</td>
                                <td>
                                    @if($book->cover !== null)
                                    <img src="{{ asset('storage/cover_buku/'.$book->cover) }}" width="100px" />
                                    @else
                                    [Gambar tidak tersedia]
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-buku" class="btn btn-success" data-toggle="modal" data-target="#editBukuModal" data-id="{{ $book->id }}">Edit</button>
                                        <button type="button" id="btn-delete-buku" class="btn btn-danger" data-toggle="modal" data-target="#deleteBukuModal" data-id="{{ $book->id }}" data-cover="{{ $book->cover }}">Hapus</button>
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

<div class="modal fade" id="tambahBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.book.submit') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Barang</label>
                        <input type="text" class="form-control" name="nama" id="nama" required />
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <input type="text" class="form-control" name="kategori" id="kategori" required />
                    </div>
                    <div class="form-group">
                        <label for="merek">Merek</label>
                        <input type="text" class="form-control" name="merek" id="merek" required />
                        <!-- <input min="1" type="number" id="datepicker" class="form-control" name="merek" id="merek" required /> -->
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" required />
                    </div>
                    <div class="form-group">
                        <label for="stok">Stok</label>
                        <input type="text" class="form-control" name="stok" id="stok" required />
                    </div>
                    <div class="form-group">
                        <label for="cover">Foto</label>
                        <input type="file" class="form-control" name="cover" id="cover" />
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="editBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Sepatu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route('admin.book.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="edit-nama">Nama</label>
                                <input type="text" class="form-control" name="nama" id="edit-nama" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-kategori">kategori</label>
                                <input type="text" class="form-control" name="kategori" id="edit-kategori" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-merek">merek</label>
                                <!-- <input min="1" type="number" id="datepicker" class="form-control" name="merek" id="edit-merek" required /> -->
                                <input type="text" class="form-control" name="merek" id="edit-merek" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-harga">harga</label>
                                <input type="text" class="form-control" name="harga" id="edit-harga" required />
                            </div>
                            <div class="form-group">
                                <label for="edit-stok">stok</label>
                                <input type="text" class="form-control" name="stok" id="edit-stok" required />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group" id="image-area"></div>
                            <div class="form-group">
                                <label for="edit-cover">foto</label>
                                <input type="file" class="form-control" name="cover" id="edit-cover" />
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="edit-id" />
                <input type="hidden" name="old_cover" id="edit-old-cover" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="deleteBukuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Sepatu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin akan menghapus data tersebut?
                <form method="post" action="{{ route('admin.book.delete') }}" enctype="multipart/form-data">
                    @csrf
                    @method('DELETE')
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" id="delete-id" value="" />
                <input type="hidden" name="old_cover" id="delete-old-cover" />
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
            <!-- <div class="card-body"> -->
            <!-- <button class="btn btn-primary" data-toggle="modal" data-target="#tambahBukuModal"><i class="fa fa-plus"></i>Tambah Data</button>
                <a href="{{ route('admin.print.books') }}" target="_blank" class="btn btn-danger"></i> Cetak PDF</a> -->
            <!-- <hr /> -->
            </form>
            <!-- </div> -->
        </div>
    </div>
</div>

@stop
@section('js')
<script>
    $(function() {
        // $("#datepicker").datepicker({
        //     format: "yyyy", // Notice the Extra space at the beginning
        //     viewMode: "years",
        //     minViewMode: "years"
        // });
        $(document).on('click', '#btn-delete-buku', function() {
            let id = $(this).data('id');
            let cover = $(this).data('cover');
            $('#delete-id').val(id);
            $('#delete-old-cover').val(cover);
            console.log("hallo");
        });

        $(document).on('click', '#btn-edit-buku', function() {
            let id = $(this).data('id');

            $('#image-area').empty();

            $.ajax({
                type: "get",
                url: baseurl + '/admin/ajaxadmin/dataBuku/' + id,
                dataType: 'json',
                success: function(res) {
                    $('#edit-nama').val(res.nama);
                    $('#edit-kategori').val(res.kategori);
                    $('#edit-merek').val(res.merek);
                    $('#edit-harga').val(res.harga);
                    $('#edit-stok').val(res.stok);
                    $('#edit-id').val(res.id);
                    $('#edit-old-cover').val(res.cover);

                    if (res.cover !== null) {
                        $('#image-area').append(
                            "<img src='" + baseurl + "/storage/cover_buku/" + res.cover + "' width='200px'/>"
                        );
                    } else {
                        $('#image-area').append('[Gambar tidak tersedia]');
                    }
                },
            });
        });

    });
</script>
@stop
@section('js')
<script>

</script>
@stop
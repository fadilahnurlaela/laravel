@extends('adminlte::page')

@section('title', 'Pengelolaan Sepatu')

@section('content_header')
<h1>Pengelolaan User</h1>
@stop

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{ __('Pengelolaan User')}}

                    {{-- <button class="btn btn-secondary float-right" data-toggle="modal"><a href="{{ route('admin.print.drugs') }}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a></button> --}}
                </div>
                <div class="card-body">
                    <button class="btn btn-primary float-left" data-toggle="modal" data-target="#tambahUserModal"><i class="fa fa-plus"></i> Tambah Data</button>
                    <div class="btn-group mb-5" role="group" aria-label="Basis Example">
                    </div>
                    <table id="table-data" class="table table-bordered display nowrap" style="width:100%">
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>NAMA</th>
                                <th>USERNAME</th>
                                <th>EMAIL</th>
                                <th>PASSWORD</th>
                                <th>ROLES</th>
                                <th>PHOTO</th>
                                <th>AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no=1; @endphp
                            @foreach($users as $pengguna)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pengguna->name }}</td>
                                <td>{{ $pengguna->username }}</td>
                                <td>{{ $pengguna->email }}</td>
                                <td>{{ $pengguna->password }}</td>
                                <td>{{ $pengguna->roles_id }}</td>

                                <td>
                                    @if($pengguna->cover !== null)
                                    <img src="{{asset('storage/photo_user/'.$drug->cover) }}" width="100px" />
                                    @else
                                    [gambar tidak tersedia]
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" id="btn-edit-pengguna" class="btn" data-toggle="modal" data-target="#editUserModal" data-id="{{ $pengguna->id }}"><i class="fa fa-edit"></i></button>
                                        <button type="button" id="btn-delete-pengguna" class="btn" data-toggle="modal" data-target="#deleteUserModal" data-id="{{ $pengguna->id }}" data-cover="{{ $pengguna->photo }}"><i class="fa fa-trash"></i></button>
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
</div>
</div>
<div>

    <div class="modal fade" id="tambahUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pengguna.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" id="name" required />
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" id="username" required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" name="password" id="password" required />
                        </div>
                        <div class="form-group">
                            <label for="roles_id">Roles</label>
                            <input type="text" class="form-control" name="roles_id" id="roles_id" required />
                        </div>

                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" id="photo" />
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

    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{ route('admin.pengguna.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="edit-name">Nama</label>
                                    <input type="text" class="form-control" name="name" id="edit-name" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-username">Username</label>
                                    <input type="text" class="form-control" name="username" id="edit-username" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-email">Email</label>
                                    <input type="text" class="form-control" name="email" id="edit-email" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-password">Password</label>
                                    <input type="text" class="form-control" name="password" id="edit-password" required />
                                </div>
                                <div class="form-group">
                                    <label for="edit-roles_id">Roles</label>
                                    <input type="text" class="form-control" name="roles_id" id="edit-roles_id" required />
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="image-area"></div>
                                <div class="form-group">
                                    <label for="edit-photo">Photo</label>
                                    <input type="file" class="form-control" name="photo" id="edit-photo" />
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="edit-id" />
                    <input type="hidden" name="old_photo" id="edit-old-photo" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Data Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah anda yakin akan menghapus data tersebut?
                    <form method="post" action="{{ route('admin.pengguna.delete') }}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="id" id="delete-id" value="" />
                    <input type="hidden" name="old_photo" id="delete-old-photo" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </div>
                {{-- <div class="card-body">
            <button class="btn btn-primary" data-toggle="modal" data-target="#tambahDrugModal"><i class="fa fa-plus"></i>Tambah Data</button>
            <a href="{{ route('admin.print.drugs') }}" target="_blank" class="btn btn-danger"></i> Cetak PDF</a>
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


        $(document).on('click', '#btn-edit-pengguna', function() {
            let id = $(this).data('id');

            $('#image-area').empty();

            $.ajax({
                type: "get",
                url: baseurl + '/admin/ajaxadmin/dataUser/' + id,
                dataType: 'json',
                success: function(res) {
                    $('#edit-name').val(res.name);
                    $('#edit-username').val(res.username);
                    $('#edit-email').val(res.email);
                    $('#edit-password').val(res.password);
                    $('#edit-roles_id').val(res.roles_id);

                    $('#edit-id').val(res.id);
                    $('#edit-old-photo').val(res.photo);

                    if (res.photo !== null) {
                        $('#image-area').append(
                            "<img src='" + baseurl + "/storage/photo_pengguna/" + res.photo + "' width='200px'/>"
                        );
                    } else {
                        $('#image-area').append('[Gambar tidak tersedia]');
                    }
                },
            });
        });

    });

    $(document).on('click', '#btn-delete-pengguna', function() {
        let id = $(this).data('id');
        let photo = $(this).data('photo');
        $('#delete-id').val(id);
        $('#delete-old-photo').val(photo);
        console.log("hallo");
    });
</script>
@stop
@section('js')
<script>

</script>
@stop
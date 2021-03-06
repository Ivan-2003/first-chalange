@extends('backend.layouts.master')
@section('title', 'Admin | Dasboard Admin')
@section('content')
    <div class="container-fluid">
        <a href="{{ route('home-admin') }}" class="btn btn-primary" style="border-radius: 5rem">Back To Admin</a>
        <a href="{{ route('users-create') }}" class="btn btn-primary" style="border-radius: 5rem">Tambah User</a>
        <br>
        <br>
        @if (Session::has('sukses'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <p>{{ Session::get('sukses') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @if (Session::has('gagal'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>{{ Session::get('gagal') }}</p>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
            {{-- <div class="card-body">
                <form action="{{ url('dasboard/users') }}" method="GET">
                    <div class="col-lg-4">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span> &nbsp;&nbsp;
                            <input type="text" class="form-control"
                                value="{{ isset($search['email']) ? $search['email'] : '' }}" name="email" />
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form> --}}
                <form action="{{ url('dasboard/users') }}" method="GET">
                <div class="row gutter-10">
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Nama</span>
                            <input type="text" class="form-control" value="{{ isset($filters['nama']) ? $filters['nama'] : "" }}" name="nama"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Phone</span>
                            <input type="text" class="form-control" value="{{ isset($filters['phone']) ? $filters['phone'] : "" }}" name="phone"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Umur</span>
                            <input type="text" class="form-control" value="{{ isset($filters['umur']) ? $filters['umur'] : "" }}" name="umur"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Alamat</span>
                            <input type="text" class="form-control" value="{{ isset($filters['Alamat']) ? $filters['Alamat'] : "" }}" name="Alamat"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group">
                            <span class="input-group-addon">Email</span>
                            <input type="text" class="form-control" value="{{ isset($filters['email']) ? $filters['email'] : "" }}" name="email"/>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                </form>
                <br><br><br>
                <table id="" class="table table-striped table-bordered ftd">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Umur</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($dataUser) > 0)
                            @foreach ($dataUser as $d)
                                <tr>
                                    <td>{{ $d->id }}</td>
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->FullName }}</td>
                                    <td>{{ $d->umur }}</td>
                                    <td>{{ $d->alamat }}</td>
                                    <td>{{ $d->email }}</td>
                                    <td>
                                        <a href="{{ route('users-edit', $d->id) }}" class="btn btn-warning"
                                            style="border-radius: 5rem">EDIT</a>
                                        <form action="{{ route('users-delete', $d->id) }}" class="d-inline" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('delete') }}
                                            <button class="btn btn-danger"
                                                onclick="return confirm('ANDA YAKIN INGIN MENGHAPUS ?')"
                                                style="border-radius: 5rem">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="7" style="text-align: center;">Tidak Ada Data.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $dataUser->links() }}
            </div>
        </div>
    </div>
@endsection
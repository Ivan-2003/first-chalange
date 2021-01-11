@extends('backend.layouts.master')
@section('title', 'Admin | Create-User')
@section('content')
    <div class="container mt-3">
        <form action="{{route('users-store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama"><strong>Nama</strong></label>
                <input type="text" class="form-control" name="nama">
                @if ($errors->has('nama'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="umur"><strong>Umur</strong></label>
                <input type="number" class="form-control" name="umur">
                @if ($errors->has('umur'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('umur') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" name="alamat">
                @if ($errors->has('alamat'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email"><strong>email</strong></label>
                <input type="text" class="form-control" name="email">
                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <button class="btn btn-success" type="submit"
                onclick="return confirm('Anda Yakin Sudah Benar ?')" id="btn1">Upload</button>
            <a href="{{ route('table-dataUsers') }}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
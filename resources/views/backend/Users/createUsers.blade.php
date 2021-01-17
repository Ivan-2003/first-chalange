@extends('backend.layouts.master')
@section('title', 'Admin | Create-User')
@section('content')
    

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
    <div class="container mt-3">
        <form action="{{route('users-store')}}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="nama"><strong>Nama</strong></label>
                <input type="text" class="form-control" name="nama" value="{{ old('nama') }}">
                @if ($errors->has('nama'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="country_code"><strong>Country Kode</strong></label>
                <input type="number" class="form-control" name="country_code" value="{{ old('country_code') }}">
                @if ($errors->has('country_code'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('country_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone"><strong>Phone</strong></label>
                <input type="number" class="form-control" name="phone" value="{{ old('phone') }}">
                @if ($errors->has('phone'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="umur"><strong>Umur</strong></label>
                <input type="number" class="form-control" name="umur" value="{{ old('umur') }}">
                @if ($errors->has('umur'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('umur') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" name="alamat" value="{{ old('alamat') }}">
                @if ($errors->has('alamat'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email"><strong>email</strong></label>
                <input type="text" class="form-control" name="email"  value="{{ old('email') }}">
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
{{-- @extends('backend.layouts.master')
@section('title', 'Admin | Edit-Data Users')
@section('content') --}}
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
</head>

<body>
    <div class="container mt-3">
        <form action="{{ route('users-update', $EditdataUser->id) }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group">
                <input type="hidden" name="id" value="{{ $EditdataUser->id }}}}">
                <label for="nama"><strong>nama</strong></label>
                <input type="text" class="form-control" name="nama" value="{{ $EditdataUser->nama }}">
                @if ($errors->has('nama'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('nama') }}</strong>
                    </span>
                @endif
            </div><div class="form-group">
                <label for="country_code"><strong>Country Kode</strong></label>
                <input type="text" class="form-control" name="country_code" value="{{ $EditdataUser->country_code }}">
                @if ($errors->has('country_code'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('country_code') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="phone"><strong>Phone</strong></label>
                <input type="text" class="form-control" name="phone" value="{{ $EditdataUser->phone }}">
                @if ($errors->has('phone'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="umur"><strong>Umur</strong></label>
                <input type="text" class="form-control" name="umur" value="{{ $EditdataUser->umur }}">
                @if ($errors->has('umur'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('umur') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="alamat"><strong>Alamat</strong></label>
                <input type="text" class="form-control" name="alamat" value="{{ $EditdataUser->alamat }}">
                @if ($errors->has('alamat'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('alamat') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="email"><strong>Email</strong></label>
                <input type="text" class="form-control" name="email" value="{{ $EditdataUser->email }}">
                @if ($errors->has('email'))
                    <span class="help-block text-danger">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-success"
                onclick="return confirm('Anda Yakin Sudah Benar ?')">Upload</button>
            <a href="{{ route('table-dataUsers') }}" class="btn btn-primary">Back</a>
        </form>
    </div>
{{-- @endsection --}}
  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="../assets/js/stisla.js"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <script src="../assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
</body>
</html>
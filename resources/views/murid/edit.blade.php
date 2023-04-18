@extends('layouts.app')
@section('content')

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Data Murid Kelas A</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class=" form-row">
            <div class="col-lg-12">
                <h3>Edit Data Murid</h3>
            </div>
        </div>
        <br>

        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops! </strong> Ada permasalahan inputanmu.<br>
                <ul>
                @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
             @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{route('murid.update',$murid->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group row">
                <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
                <div class="col-sm-10">
                    <input type="text" name="full_name" class="form-control" id="full_name" value="{{$murid->full_name}}" placeholder="Full Name">
                </div>
            </div>
            <div class="form-group row">
                <label for="notelp" class="col-sm-2 col-form-label">No Telephone</label>
                <div class="col-sm-10">
                    <input type="text" name="notelp"  class="form-control" id="notelp" value="{{$murid->notelp}}" placeholder="NIM Mahasiswa">
                </div>
            </div>
            <div class="form-group row">
                <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                <div class="col-sm-10">
                    <select id="kota" name="kota"class="form-control">
                        <option {{$murid->kota == 'Jakarta' ? 'selected' : ''}} value="Jakarta"> Jakarta</option>
                        <option {{$murid->kota == 'Bandung' ? 'selected' : ''}} value="Bandung"> Bandung</option>
                        <option {{$murid->kota == 'Bali' ? 'selected' : ''}} value="Bali"> Bali</option>
                        <option {{$murid->kota == 'Surabaya' ? 'selected' : ''}} value="Surabaya"> Surabaya</option>
                        <option {{$murid->kota == 'Semarang' ? 'selected' : ''}} value="Semarang"> Semarang</option>
                    </select>
                </div>
            </div>
             <hr>
                <div class="form-group">
                    <a href="{{route('murid.index')}}" class="btn btn-success">Kembali</a>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
        </form>

    </div>
    </body>
</html>
    
@endsection
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
                <h3>Detail Murid Kelas A</h3>
            </div>
        </div>
        <br>

        <div class="form-group row">
            <label for="full_name" class="col-sm-2 col-form-label">Code</label>
            <div class="col-sm-10">
                {{$murid->kode}} 
            </div>
        </div>
        <div class="form-group row">
            <label for="full_name" class="col-sm-2 col-form-label">Full Name</label>
            <div class="col-sm-10">
                {{$murid->full_name}} 
            </div>
        </div>
        <div class="form-group row">
            <label for="notelp" class="col-sm-2 col-form-label">No Telephone</label>
            <div class="col-sm-10">
                {{$murid->notelp}}
            </div>
        </div>
        <div class="form-group row">
            <label for="kota" class="col-sm-2 col-form-label">Kota</label>
            <div class="col-sm-10">
                 {{$murid->kota}}
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-12">
                <a href="{{route('murid.index')}}" class="btn  btn-success">Kembali</a>
            </div>
        </div>

    </div>
</body>
</html>

@endsection
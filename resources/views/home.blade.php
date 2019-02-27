@extends('layout')

@section('main')
<div class="header-section" id="content" tabindex="-1"> 
    <div class="container"> 
        <h1>Upload Image and Resize</h1> 
        <p>Select your image and put new size in it.</p> 
    </div>
</div>

<div class="container content-container">
    @if (session('message'))
    <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <div class="row">
        <div class="col-md-10">
            <form method="post" enctype="multipart/form-data" action="image">
                <div class="form-group">
                    <label for="imagen_1">Imagen 1</label>
                    <input type="file" class="form-control" id="imagen_1" name="imagen_1" placeholder="Imagen 1">
                </div>
                <div class="form-group">
                    <label for="imagen_2">Imagen 2</label>
                    <input type="file" class="form-control" id="imagen_2" name="imagen_2" placeholder="Imagen 2">
                </div>

                <div class="form-group">
                    <label for="height">Fecha</label>
                    <input type="text" class="form-control" id="fecha" name="fecha" placeholder="MM/dd/YYYY">
                </div>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

</div>

@stop
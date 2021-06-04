@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Exportar a un Archivo de Excel los CLIENTES registrado</h5>
                <div class="card-body">
                    <a href="clientes/exportExcel" class="btn btn-primary">Exportar a Excel</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Importar Clientes</h5>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data" action="{{route('clientes.import')}}">
                        @csrf
                        <div class="form-group">
                            <label for="file">Indique el Archivo Excel</label>
                            <input type="file" name="file" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Subir Archivo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-12">

            
        </div>
    </div>
</div>
@endsection

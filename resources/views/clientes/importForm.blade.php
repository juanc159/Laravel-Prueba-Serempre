@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Importar Clientes</div>
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
    </div>
</div>

@endsection

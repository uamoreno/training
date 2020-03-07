@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="/notebooks"><i class="fas fa-home" ></i> </a></li>
    <li class="breadcrumb-item active" aria-current="page">Modificar Notebook</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Modificar Notebook</h1>
            </div>
        </div>


        <div class="row">
            <div class="col">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $er)
                                <li>{{ $er }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/notebooks/{{$notebook->id}}" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="name">Nombre del notebook</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ @old("name",$notebook->name) }}" />
                    </div>

                    <div class="form-group">
                        <label for="max_notes">M&aacute;xima cantidad de hojas</label>
                        <input type="text" class="form-control" id="max_notes" name="max_notes" value="{{ @old("max_notes",$notebook->max_notes) }}" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Grabar" />
                        <a href="/notebooks" class="btn btn-danger">Volver</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection

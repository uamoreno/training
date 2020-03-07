@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item "><a href="/notebooks"><i class="fas fa-home" ></i> </a></li>
    <li class="breadcrumb-item " ><a href="/notebooks/{{ $notebook->id }}/notes">{{ $notebook->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tomar nota</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Nueva Nota</h1>
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

                <form action="/notebooks/{{ $notebook->id }}/notes" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="title">T&iacute;tulo</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{@old("title")}}" />
                    </div>

                    <div class="form-group">
                        <label for="description">Descripci&oacute;n</label>
                        <input type="text" class="form-control" id="description" name="description" value="{{@old("description")}}" />
                    </div>

                    <div class="form-group">
                        <label for="Tiene una fecha l&iacute;mite">Tiene una fecha l&iacute;mite</label>
                        <input type="checkbox" name="has_duedate" value="1" onchange="if(this.checked){document.getElementById('div_duedate').style.display=''}else{document.getElementById('div_duedate').style.display='none'}">
                    </div>

                    <div class="form-group" id='div_duedate' style='display:none'>
                        <label for="Fecha l&iacute;mite">Fecha l&iacute;mite</label>
                        <input type="text" class="form-control datepicker" id="duedate" name="duedate" value="{{@old("duedate")}}" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Grabar" />
                        <a href="/notebooks/{{ $notebook->id }}/notes" class="btn btn-danger">Volver</a>
                    </div>

                </form>
            </div>
        </div>

    </div>
@endsection

@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item "><a href="/notebooks"><i class="fas fa-home" ></i> </a></li>
    <li class="breadcrumb-item " ><a href="/notebooks/{{ $note->id }}/notes">{{ $note->notebook->name }}</a></li>
    <li class="breadcrumb-item active" aria-current="page">Editar nota</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Editar Nota </h1>
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

                <form action="/notebooks/{{ $note->notebook->id }}/notes/{{ $note->id }}" method="post">
                    @csrf
                    @method("put")
                    <div class="form-group">
                        <label for="title">T&iacute;tulo</label>
                        <input type="text" value="{{ @old("title",$note->title) }}" class="form-control" id="title" name="title" />
                    </div>

                    <div class="form-group">
                        <label for="description">Descripci&oacute;n</label>
                        <input type="text" value="{{ @old("title",$note->description) }}" class="form-control" id="description" name="description" />
                    </div>

                    <div class="form-group">
                        <label for="Tiene una fecha l&iacute;mite">Tiene una fecha l&iacute;mite</label>
                        <input type="checkbox" name="has_duedate[]" value="1" @if($note->has_duedate==1) checked='checked' @endif onchange="if(this.checked){document.getElementById('div_duedate').style.display=''}else{document.getElementById('div_duedate').style.display='none'}" />
                    </div>

                    <div class="form-group" id="div_duedate" style="display:@if($note->has_duedate==0) none @endif">
                        <label for="Fecha l&iacute;mite">Fecha l&iacute;mite</label>
                        <input type="text" value="{{ @old("title",$note->duedate) }}" class="form-control datepicker" id="duedate" name="duedate" />
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Grabar" />
                        <a href="/notebooks/{{ $note->notebook->id }}/notes" class="btn btn-danger">Volver</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <script type="text/javascript">
        $('.datepicker').datepicker({
        format: 'mm-dd-yyyy'
        });
    </script>


@endsection

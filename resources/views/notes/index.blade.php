@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="/notebooks"><i class="fas fa-home" ></i> </a></li>
    <li class="breadcrumb-item active" aria-current="page">{{ $notebook->name }}</li>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>{{ $notebook->name }}</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-2">
                <a href="/notebooks/{{ $notebook->id }}/notes/create" class="btn btn-primary"><i class="fas fa-book" ></i> Tomar nota </a>
            </div>
            <div class="col-2">
                    <a href="/notebooks" class="btn btn-secondary"><i class="fas fa-arrow" ></i> Regresar </a>
                </div>
        </div>
        <br/>
        <div class="row" id="cards-container">

                @if(count($notes)>0)
                    @include("notes.cards")
                @else
                    <div class="alert alert-info">
                       No pierdas esa nota importante, Toma nota...
                    </div>
                @endif

        </div>

    </div>

    <script>

        function borrar(id){
            if(confirm('Borrar la  nota')){
            $.ajax({
                    url:"/notebooks/{{ $notebook->id }}/notes/remove",
                    type:"POST",
                    data:{  "_token": "{{ csrf_token() }}",
                            "id":id
                    },
                    success:function(notes){
                        $("#cards-container").html(notes);
                    }
                });
            }
        }

    </script>

@endsection

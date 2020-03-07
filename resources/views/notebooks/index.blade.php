@extends('layouts.base')

@section('breadcrumb')
    <li class="breadcrumb-item active"><a href="/notebooks"><i class="fas fa-home" ></i> </a></li>
@endsection

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Mis Notebooks</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <a href="/notebooks/create" class="btn btn-primary"><i class="fas fa-book" ></i> Nuevo notebook </a>
            </div>
        </div>
        <br/>
        <div class="row">
            <div class="col">
                @if(count($notebooks)>0)
                <div id="table-container">
                    @include("notebooks.table")
                </div>
                @else
                    <div class="alert alert-info">
                        No tienes ning&uacute;n notebook abierto. <br/>
                        Crea uno para empezar a tomar notas dentro de &eacute;l
                    </div>
                @endif
            </div>
        </div>

    </div>

         <script>
           function borrar(id){
               if(confirm('Borrar este notebook y sus notas')){
                $.ajax({
                        url:"/notebooks/remove",
                        type:"POST",
                        data:{  "_token": "{{ csrf_token() }}",
                                "id":id
                        },
                        success:function(notebooks){
                           $("#table-container").html(notebooks);
                        }
                    });
               }
            }


        </script>

@endsection

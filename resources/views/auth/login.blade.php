@extends('layouts.login')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-6">

            <div class="panel panel-defalt">
                <div class="panel-heading">
                    <h1 class="panel-title">Bienvenido a notas para e-training</h1></div>
            </div>
            <div class="panel-body">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                        <div class="form-group {{ $errors->has('national_id') ? 'has-error':'' }} " >
                                <label for="national_id">Documento: </label>
                                <input type="text" name="national_id" id="national_id" />
                                {!! $errors->first('national_id','<div class="help-block">:message</div>') !!}
                            </div>

                            <div class="form-group {{ $errors->has('password') ? 'has-error':'' }}">
                                <label for="password">Password: </label>
                                <input type="password" name="password" id="password">
                                {!! $errors->first('password','<span class="help-block">:message</span>') !!}

                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary btn-block">Acceder</button>
                            </div>
                </form>
            </div>
        </div>
    </div>

@endsection

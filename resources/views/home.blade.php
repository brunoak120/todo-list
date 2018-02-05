@extends('layouts.app')

@section('content')
    <div role="main" class="col-md-9 col-md-push-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Bem vindo</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <h3>Olá {{ auth()->user()->name }} seja bem vindo a aplicação Todo list, use o menu para ter acesso as funcionalidades.</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

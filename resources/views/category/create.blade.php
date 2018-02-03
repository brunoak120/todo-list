@extends('layouts.app')

@section('content')
    <div role="main" class="col-md-9 col-md-push-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h3>Adicionar uma categoria</h3>
                        @include('errors._check_form')
                        @include('flash::message')
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => ['category.store'], 'method' => 'post']) !!}
                                <section>
                                    <label for="name">Categoria</label>
                                    {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nome da categoria', 'autofocus', 'required']) !!}
                                </section>
                                <section>
                                    <button type="submit" class="btn btn-primary">
                                        Salvar
                                    </button>
                                </section>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

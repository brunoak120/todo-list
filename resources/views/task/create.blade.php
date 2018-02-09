@extends('layouts.app')

@push('styles')
    {!! Html::style('js/datepicker/css/bootstrap-datepicker3.css') !!}
@endpush

@push('scripts')
    {!! Html::script('js/datepicker/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('js/datepicker/locales/bootstrap-datepicker.pt-BR.min.js') !!}
    {!! Html::script('js/datepickerConfig.js') !!}
@endpush

@section('content')
    <div role="main" class="col-md-9 col-md-push-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h3>Adicionar uma tarefa</h3>
                        @include('errors._check_form')
                        @include('flash::message')
                        <div class="row">
                            <div class="col-md-12">
                                {!! Form::open(['route' => ['task.store'], 'method' => 'post']) !!}
                                <div class="row">
                                    <div class="col-md-12">
                                        <label>Categoria</label>
                                        {!! Form::select('category_id',[null => 'Escolha uma categoria']+$categories->toArray(), null, ['class' => 'form-control', 'required']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="title">Tafera</label>
                                        {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Título da tarefa', 'autofocus', 'required']) !!}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="content">Descrição</label>
                                        {!! Form::textarea('content',null,['class' => 'text-area form-control', 'placeholder' => 'Descrição da tarefa', 'required']) !!}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="started">Intervalo de datas</label>
                                        <div class="input-group input-daterange">
                                            {!! Form::text('started',null,['class' => 'calendar form-control', 'placeholder' => 'Data inicial', 'required']) !!}
                                            <div class="input-group-addon">até</div>
                                            {!! Form::text('stopped',null,['class' => 'calendar form-control', 'placeholder' => 'Data final', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">
                                            Salvar
                                        </button>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

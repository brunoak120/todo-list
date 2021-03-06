@extends('layouts.app')

@push('styles')
    {!! Html::style('js/datepicker/css/bootstrap-datepicker3.css') !!}
@endpush

@push('scripts')
    {!! Html::script('js/datepicker/js/bootstrap-datepicker.min.js') !!}
    {!! Html::script('js/datepicker/locales/bootstrap-datepicker.pt-BR.min.js') !!}
    {!! Html::script('js/datepickerConfig.js') !!}
    {!! Html::script('js/main.js') !!}
    {!! Html::script('js/task.js') !!}
@endpush

@section('content')
    <div role="main" class="col-md-9 col-md-push-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h3>Gerenciador de tarefas</h3>
                        @include('errors._check_form')
                        @include('flash::message')
                        <div class="row">
                            <div class="col-md-12">
                                <label for="started">Filtrar por data</label>
                                <div class="input-group input-daterange">
                                    {!! Form::text('started',null,['class' => 'calendar form-control', 'placeholder' => 'Data inicial', 'id' => 'started']) !!}
                                    <div class="input-group-addon">até</div>
                                    {!! Form::text('stopped',null,['class' => 'calendar form-control', 'placeholder' => 'Data final', 'id' => 'stopped']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Filtrar por categoria</label>
                                {!! Form::select('category_id',[null => 'Filtrar todas categorias']+$categories->toArray(), null, ['class' => 'form-control', 'id' => 'category_id']) !!}
                            </div>
                            <div class="col-md-6">
                                <label>Filtrar por status</label>
                                {!! Form::select('status',[null => 'Filtrar todos status', '0' => 'Pendente', '1' => 'Relizada'], null, ['class' => 'form-control', 'id' => 'status']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="filterFields btn btn-primary">
                                    Filtrar
                                </button>
                            </div>
                        </div>
                        </br>
                        <div class="row">
                            <div class="mainDiv col-md-12">
                                <ul class="list-group">
                                    @if(count($tasks) == 0)
                                        <div class="alert alert-warning">
                                            <h4><strong>Nenhuma tarefa inserida nesse contexto.</strong></h4>
                                        </div>
                                    @endif
                                    @foreach($tasks as $task)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="checkbox">
                                                                <label>
                                                                    <input class="changeStatus raitola"
                                                                           data-status="{{ $task->status }}"
                                                                           data-name="{{ $task->title }}"
                                                                           data-id="{{ $task->id }}"
                                                                           @if($task->status)
                                                                           checked
                                                                           @endif
                                                                           type="checkbox">{{ $task->title }}

                                                                </label></div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <a title="Ver" data-id="{{ $task->id }}"
                                                               class="seeItem btn btn-primary btn">
                                                                <i class="glyphicon glyphicon-search"></i>
                                                            </a>
                                                            <a title="Remover" data-id="{{ $task->id }}"
                                                               class="removeItem btn btn-danger btn">
                                                                <i class="glyphicon glyphicon-trash"></i>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </li>
                                            </div>
                                        </div>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @include('task._show_modal')
                </div>
            </div>
        </div>
    </div>
@endsection

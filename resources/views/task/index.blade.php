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
                                    {!! Form::text('started',null,['class' => 'calendar form-control', 'placeholder' => 'Data inicial', 'required']) !!}
                                    <div class="input-group-addon">até</div>
                                    {!! Form::text('stopped',null,['class' => 'calendar form-control', 'placeholder' => 'Data final', 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label>Filtrar por categoria</label>
                                {!! Form::select('category_id',[null => 'Escolha uma categoria']+$categories->toArray(), null, ['class' => 'form-control', 'required']) !!}
                            </div>
                            <div class="col-md-6">
                                <label>Filtrar por status</label>
                                {!! Form::select('status',[null => 'Escolha um status', '0' => 'Pendente', '1' => 'Relizada'], null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Filtrar
                                </button>
                            </div>
                        </div>
                        </br>
                        <ul class="list-group">
                            @if(count($tasks) == 0)
                                <div class="alert alert-warning">
                                    <h4> <strong>Nenhuma tarefa inserida nesse contexto.</strong></h4>
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{!! $error !!}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @foreach($tasks as $task)
                                <div class="row">
                                    <div class="col-md-12">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-md-9">
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
                                                <div class="col-md-3">
                                                    <a title="Editar" data-id="{{ $task->id }}"
                                                       class="editItem btn btn-primary btn">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                    </a>
                                                    <a title="Remover" data-id="{{ $task->id }}"
                                                       class="seeItem btn btn-danger btn">
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
                    @include('task._show_modal')
                    <!-- Modal -->
                    <div id="editCategoryModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;
                                    </button>
                                    <h4 class="modal-title">Editar Tarefa</h4>
                                </div>
                                <div class="modal-body">
                                    {!! Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Nome da categoria', 'required', 'id' => 'name']) !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="updateItem btn btn-primary" data-dismiss="modal">
                                        Salvar
                                    </button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

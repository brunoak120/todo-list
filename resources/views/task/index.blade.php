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
                        <h3>Gerenciador de tarefas</h3>
                        @include('errors._check_form')
                        @include('flash::message')
                        <ul class="list-group">
                            @foreach($tasks as $task)
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label><input data-id="{{ $task->id }}" type="checkbox">{{ $task->title }}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

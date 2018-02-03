@extends('layouts.app')

@push('styles')
    {!! Html::style('css/datatables.min.css') !!}
@endpush
@push('scripts')
    {!! Html::script('js/datatables.min.js') !!}
    {!! Html::script('js/tables.js') !!}
    {!! Html::script('js/main.js') !!}
    {!! Html::script('js/category.js') !!}
@endpush

@section('content')
    <div role="main" class="col-md-9 col-md-push-3">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h3>Listar categorias</h3>
                        @include('errors._check_form')
                        @include('flash::message')
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table tabelaDatatable table-striped">
                                    <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody align="center">
                                    @foreach($categories as $category)
                                        <tr>
                                            <td data-name="{{ $category->name }}">{{ $category->name }}</td>
                                            <td>
                                                <a title="Editar" data-id="{{ $category->id }}"
                                                   class="editItem btn btn-primary btn">
                                                    <i class="glyphicon glyphicon-pencil"></i>
                                                </a>
                                                <a title="Remover" data-id="{{ $category->id }}"
                                                   class="removeItem btn btn-danger btn">
                                                    <i class="glyphicon glyphicon-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <!-- Modal -->
                                <div id="editCategoryModal" class="modal fade" role="dialog">
                                    <div class="modal-dialog">

                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                                <h4 class="modal-title">Editar Categoria</h4>
                                            </div>
                                            <div class="modal-body">
                                                {!! Form::text('name',null,['class' => 'form-control', 'placeholder' => 'Nome da categoria', 'required', 'id' => 'name']) !!}
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
            </div>
        </div>
    </div>
@endsection

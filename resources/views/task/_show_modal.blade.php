<div id="showTaskModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;
                </button>
                <h4 class="modal-title">Detalhes da Tarefa</h4>
            </div>
            <div class="modal-body">
                <label for="title">Titulo da tarefa</label>
                {!! Form::text('title',null,['class' => 'form-control', 'id' => 'title', 'readonly' => 'true']) !!}
            </div>
            <div class="modal-body">
                <label for="content">Descrição da tarefa</label>
                {!! Form::textarea('content',null,['class' => 'text-area form-control', 'id' => 'content', 'readonly' => 'true']) !!}
            </div>
            <div class="modal-body">
                <label for="started">Intervalo de datas</label>
                <div class="input-group">
                    {!! Form::text('started',null,['class' => 'form-control','id' => 'seeStarted', 'readonly' => 'true']) !!}
                    <div class="input-group-addon">até</div>
                    {!! Form::text('stopped',null,['class' => 'form-control','id' => 'seeStopped', 'readonly' => 'true']) !!}
                </div>
            </div>
        </div>
    </div>
</div>
<nav class="col-md-3 col-md-pull-9">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" align="center">Menu</div>
                <div class="panel-body">
                    <ul class="nav nav-sidebar">
                        <li><a href="{{ route('task.index') }}">Gerenciar Tarefas</a></li>
                        <li><a href="{{ route('task.create') }}">Adicionar Tarefa</a></li>
                        <li><a href="{{ route('category.create') }}">Adicionar Categorias</a></li>
                        <li><a href="{{ route('category.index') }}">Listar Categorias</a></li>
                        <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
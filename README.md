
# Tecnologias usadas

 - [Framework PHP Laravel 5.5](https://laravel.com/docs/5.5/)
 - [Framework Bootstrap 3.3](http://getbootstrap.com/docs/3.3/)
 - [JQuery, AJAX](http://api.jquery.com/)
 - [SweetAlertJS](https://sweetalert.js.org/guides/#installation)
 - [Padrão de Projeto Repository](https://github.com/andersao/l5-repository)
 - [Plugin Flash Alert](https://github.com/laracasts/flash)
 - [Single Element CSS Spinners](https://github.com/lukehaas/css-loaders)
 - [DataTables, Table plug-in for jQuery](https://datatables.net/)

# Funcionalidades da aplicação

 - CRUD das tarefas
 - CRUD das categorias
 - Filtro das tarefas por categoria, data inicial, data final e status

# Como executar este projeto

Para executar a aplicação será necessário seguir os passos abaixo:

 - Após da aplicação ser baixada, dentro do diretorio usando um bash usar o comando "composer update"
 - Criar um novo arquivo ".env" seguindo o exemplo do arquivo ".env.example"
 - Editar o aquivo ".env" criado colocando as informações da base de dados
 - Criar um banco de dados com o mesmo nome que foi usado no arquivo ".env"
 - Com a bash aberta dentro do diretorio raiz gerar as migrations com comando "php artisan migrate"

# Fluxo da aplicação

A seguir será mostrado a seguencia de passos para utilizar a aplicação.

## Usuário

### Criando usuários

 - Na página inicial, clicar em "Registrar"
 - Preencha os campos com suas informações
 - Clique em registrar
 - O usuário será redirecionado para página inicial da aplicação
 
### Acessando a aplicação

 - Na página inicial, clicar em "Entrar"
 - Entre com e-mail e senha e clique em entrar
 - O usuário será redirecionado para página inicial da aplicação

## Categorias

### Criando categorias

 - No menu clicar na opção "Adicionar Categoria"
 - Nesta página preencher o campo "categoria" com o nome desejado
 - Clicar na opção Salvar
 - Um feedback será apresentado
 
### Listando categorias

 - Ao clicar na opção "Listar Categorias" no menu lateral será exibido as categorias já cadastradas 
 com suas respectivas opções de comando.
    
### Removendo categorias

 - Dentro da listagem das categorias, clicar no botão vermelho da categoria que o 
 usuário deseja remover.
 - Será exibido a mensagem "Você tem certeza que deseja remover essa categoria?" clique o usuário
  deverá clicar na opção "Confirmar" para efetuar a remoção.
 - O usuário receberá o feedback da ação
 
### Editando categorias
 - Dentro da listagem das categorias será necessário clicar no botão azul da categoria que o
 usuário deseja editar.
 - Será aberto um modal com um input para ser editado, assim, o usuário deverá alterar e clicar na
 opção Salvar
 - O usuário receberá o feedback da ação
 
## Tarefas
 Será necessário ter ao menos uma categoria para usar essa funcionalidade

### Criando tarefas

 - No menu clicar na opção "Adicionar Tarefa"
 - Selecionar a categoria da tarefa, escrever um titulo, descrição, e datas (Caso for um dia especifico selecione apenas a data inicial. A data final será prenchida automáticamente)
 - Clicar no botão salvar
 - O usuário receberá um feedback da ação.
 
### Listando as tarefas

 - No menu clique na opção "Gerenciar Tarefas"

### Removendo tarefas

 - Dentro do menu de gerenciamento, clique no botão vermelho da tarefa que deseja remover.
 - Será exibido uma mensagem "Você tem certeza que deseja remover essa tarefa?"
 - Clique em confirmar para remover
 - Uma mensagem de feedback será exibida
 
### Ver tarefa

 - Dentro do menu de gerenciamento, clique no botão azul
 - Será exibido um modal com as informações da tarefa
 
### Filtrar tarefas

 - Dentro do menu de gerenciamento, preencha os campos desejaveis para o filtro.
 - Será carregado as informações desejadas.
 
 Obs: Nessa funcionalidade o usuário pode se sentir livre para selecionar os filtros como desejar.
 
### Mudar Status da tarefa

 - Dentro do menu de gerenciamento, clicar no checkbox da tarefa
 - A tarefa será atualizada e será enviado um feedback ao usuário
 
## License
 
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
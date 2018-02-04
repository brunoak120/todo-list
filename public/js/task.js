$(document).on("click", '.changeStatus', function () {
    var id = $(this).attr("data-id");
    var status = parseInt($(this).attr("data-status"));
    var newStatus = status === 0 ? 1 : 0;

    var request = $.ajax({
        type: "POST",
        url: "/alterar-status-tarefa",
        dataType: "json",
        data: {
            id: id,
            status: newStatus
        }
    });

    request.done(function (data) {
        if (data === true) {
            swal("Tarefa atualizada com sucesso", "", "success").then(function (value) {
                location.reload();
            });
        } else {
            swal("Não foi possivel atualizar a tarefa", "", "error");
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível atualizar a tarefa", "", "error");
    })
});

function removeTask(id) {
    var request = $.ajax({
        type: "DELETE",
        url: "/remove-tarefa",
        dataType: "json",
        data: {
            id: id
        }
    });

    request.done(function (data) {
        console.log(data);
        if (data === true) {
            swal("Tarefa removida com sucesso", "", "success").then(function (value) {
                location.reload();
            });
        } else {
            swal("Não foi possivel remover a tarefa", "", "error");
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível remover a tarefa", "", "error");
    })
}

/**
 * @description listener that gets action to remove a category
 */
$(document).on("click", ".removeItem", function () {
    var id = $(this).data('id');
    swal({
        title: "Você tem certeza que deseja remover essa tarefa?",
        text: "Cuidado! Quando deletado a tarefa não será possivel recuperá-la!",
        icon: "warning",
        buttons: {
            cancel: {
                text: "Cancelar",
                visible: true,
                value: false
            },
            confirm: {
                text: "Confirmar",
                visible: true,
                value: true
            }
        }
    }).then(function (value) {
        if (value) {
            removeTask(id);
        }
    });
});

/**
 * @description
 */
$(document).on("click", ".editItem", function () {
    id = $(this).data('id');
    var inputName = $(this).closest('tr').find('td[data-name]').data('name');

    $('#name').val(inputName);
    $('#editCategoryModal').modal('show');
});

/**
 * @description
 */
$(document).on("click", ".updateItem", function () {
    var name = $('#name').val();
    var request = $.ajax({
        type: "POST",
        url: "/editar-tarefa",
        dataType: "json",
        data: {
            id: id,
            name: name
        }
    });

    request.done(function (data) {
        if (data === true) {
            swal("Tarefa atualizada com sucesso", "", "success").then(function (value) {
                location.reload();
            });
        } else {
            swal("Não foi possivel atualizar a tarefa", "", "error");
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível atualizar a tarefa", "", "error");
    })
});

/**
 * @description
 */
$(document).on("click", ".seeItem", function () {
    id = $(this).data('id');
    var request = $.ajax({
        type: "GET",
        url: "/ver-tarefa",
        dataType: "json",
        data: {
            id: id
        }
    });

    request.done(function (data) {
        if (data === false) {
            swal("Não foi possivel encontrar tarefa.", "", "error");
        } else {
            console.log(data);
            $('#showTaskModal').modal('show');
            $('#title').val(data.title);
            $('#content').val(data.content);
            $('#seeStarted').val(data.started);
            $('#seeStopped').val(data.stopped);
            $('#status').val(data.status);
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível buscar a tarefa.", "", "error");
    })
});

$(document).on("click", ".filterFields", function () {
    started = $("#started").val();
    stopped = $("#stopped").val();
    category_id = $("#category_id").val();
    status = $("#status").val();
    var request = $.ajax({
        type: "POST",
        url: "/filtar-tarefas",
        dataType: "json",
        data: {
            started: started,
            stopped: stopped,
            category_id: category_id,
            status: status
        }
    });

    request.done(function (data) {
        if (data === false) {
            $(".mainDiv").children('div .list-group').remove();
            $(".mainDiv").append('<ul class="list-group">');
            $(".list-group").append("<div class='alert alert-warning'>\n" +
                "                                            <h4><strong>Nenhuma tarefa inserida nesse contexto.</strong></h4>\n" +
                "                                        </div>");
            $(".mainDiv").append('</ul>');
        } else {
            console.log(data);
            $(".mainDiv").children('div .list-group').remove();
            $(".mainDiv").append('<ul class="list-group">');
            $.each(data, function (index) {
                var checked = data[index].status == 1 ? 'checked' : '';
                $(".list-group").append(
                    '<div class="row">' +
                    '   <div class="col-md-12">\n' +
                    '       <li class="list-group-item">\n' +
                    '           <div class="row">\n' +
                    '               <div class="col-md-9">\n' +
                    '                   <div class="checkbox">' +
                    '                       <label>' +
                    '                           <input class="changeStatus raitola"' +
                    '                           data-status="' + data[index].status + '"' +
                    '                           data-name="' + data[index].title + '"\n' +
                    '                           data-id="' + data[index].id + ' " ' + checked + '' +
                    '                           type="checkbox">' + data[index].title + '' +
                    '                       </label></div>' +
                    '           </div>' +
                    '           <div class="col-md-3">\n' +
                    '               <a title="Editar" data-id="' + data[index].id + '"\n' +
                    '                   class="editItem btn btn-warning btn">\n' +
                    '                   <i class="glyphicon glyphicon-pencil"></i>\n' +
                    '               </a>\n' +
                    '               <a title="Remover" data-id="' + data[index].id + '"\n' +
                    '                   class="seeItem btn btn-primary btn">\n' +
                    '                   <i class="glyphicon glyphicon-search"></i>\n' +
                    '               </a>\n' +
                    '               <a title="Remover" data-id="' + data[index].id + '"\n' +
                    '                   class="removeItem btn btn-danger btn">\n' +
                    '                   <i class="glyphicon glyphicon-trash"></i>\n' +
                    '               </a>\n' +
                    '           </div>' +
                    '       </li>\n' +
                    '   </div>\n' +
                    '</div>');
                console.log(data[index]);
            });
            $(".mainDiv").append('</ul>');
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível buscar a tarefa.", "", "error");
    })
});
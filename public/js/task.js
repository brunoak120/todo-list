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
            swal("Categoria removida com sucesso", "", "success").then(function (value) {
                location.reload();
            });
        } else {
            swal("Não foi possivel remover a categoria", "", "error");
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível remover a categoria", "", "error");
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
            swal("Categoria atualizada com sucesso", "", "success").then(function (value) {
                location.reload();
            });
        } else {
            swal("Não foi possivel atualizar a categoria", "", "error");
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível atualizar a categoria", "", "error");
    })
});

/**
 * @description
 */
/*$(document).on("click", ".seeItem", function () {
    id = $(this).data('id');
    var inputName = $(this).closest('tr').find('td[data-name]').data('name');

    $('#name').val(inputName);
    $('#editCategoryModal').modal('show');
});*/

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
            $('#started').val(data.started);
            $('#stopped').val(data.stopped);
        }
    });

    request.fail(function (data) {
        console.error(data);
        swal("Não foi possível atualizar a categoria", "", "error");
    })
});
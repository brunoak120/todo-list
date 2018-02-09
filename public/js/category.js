/** @description global category id*/
var id;

/**
 * @description remove category function
 * @param id
 */
function removeCategory(id) {
    var request = $.ajax({
        type: "DELETE",
        url: "/remove-categoria",
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
        title: "Você tem certeza que deseja remover essa categoria?",
        text: "Cuidado! Quando deletado a categoria, todas as tarefas relacionadas a ela também serão removidas!",
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
            removeCategory(id);
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
        url: "/editar-categoria",
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

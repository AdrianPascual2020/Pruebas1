let tableTask;
$(function(){
    let taskBox = $('#tableTask');
    tableTask = taskBox.DataTable({
        language: {url: "/json/datatable/spanish.json"},
        processing: true,
        serverSide: true,
        ajax: {
            url: taskBox.data('get'),
            type: "POST"
        },
        columns: [
            { data: 'id', name: 'id'},
            { data: 'name', name: 'name'},
            { data: 'categories', name: 'categories'},
            { data: 'action', name: 'action', orderable: false, searchable: false, className: 'text-right'}
        ],
        dom: 'tipr',
        order: [[ 0, "desc" ]]
    });

});

function resetValues(withInputs = false)
{
    let form = $('form.form-create-task');
    form.find('.is-invalid').removeClass('is-invalid');
    form.find('.invalid-feedback').text('');
    if (withInputs) {
        form.trigger('reset');
    }
}

function createTask(element)
{
    let form = $('form.form-create-task');
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),
        beforeSend: () => {
            element.prop('disabled', true);
            resetValues();
        }
    }).always(() => {
        element.prop('disabled', false);
    }).fail((response) => {
        switch(response.status) {
            case 422:
                $.each(response.responseJSON.errors, (key, item) => {
                    // form.find('.'+key+'_error').text(item[0]);
                    // form.find('[name="'+key+'"]').addClass('is-invalid');
                    // Podriamos marcar los campos como erroneos, etc..
                });
            break;
            default:
                // aqui podemos mandar notificacion
                break;
        }
    }).done(() => {
        tableTask.ajax.reload(null, false);
        resetValues(true);
        //también podriamos mandar notificacion de que se ha realizado correctamente
    });
}

function deleteTask(element, taskId)
{
    $.ajax({
        url: element.data('delete'),
        type: element.data('method'),
        data: {id:taskId},
        beforeSend: () => {
            element.prop('disabled', true);
        }
    }).always(() => {
        element.prop('disabled', false);
    }).fail((response) => {
        switch(response.status) {
            case 422:
                $.each(response.responseJSON.errors, (key, item) => {
                    // form.find('.'+key+'_error').text(item[0]);
                    // form.find('[name="'+key+'"]').addClass('is-invalid');
                    // Podriamos marcar los campos como erroneos
                });
                break;
            default:
                // aqui podemos mandar notificacion
                break;
        }
    }).done(() => {
        tableTask.ajax.reload(null, false);
        //también podriamos mandar notificacion de que se ha realizado correctamente
    });
}

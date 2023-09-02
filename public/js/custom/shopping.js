$(document).ready(function () {
    $('.toast').toast('hide');
    /*    $('#add_item_form').ajaxForm({
            target: '#message_target',
            dataType: 'json',
            success: function (data) {
                $('.toast-body').html(data['message']);
                $('.toast').toast('show');

                if (data['status'] == 'success') {
                    listItems();
                    return true;
                }
            },
            error: function (data) {
                $.each(data.responseJSON.errors, function (key, errors) {
                    $('.toast-body').html(errors);
                    $('.toast').toast('show');
                });
            }
        });*/
});

function addItem() {
    const name = $('#item').val();

    const validate = validateName(name);
    if (validate == false) {
        return false;
    }

    $.ajax({
        url: "/shopping-items",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            name: name
        },
        cache: false,
        success: function (data) {
            $('.toast-body').html(data.message);
            $('.toast').toast('show');
            if (data.status == 'success') {
                listItems();
                return true;
            }
            return false;
        },
        error: function (data) {
            $.each(data.responseJSON.errors, function (key, errors) {
                $('.toast-body').html(errors);
                $('.toast').toast('show');
            });
        }
    });
}


function listItems() {
    $.ajax({
        url: "/shopping-items",
        type: "GET",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {},
        cache: true,
        success: function (data) {
            if (data.status == 'success') {
                let html = '';
                data.response.forEach((value, key) => {
                    html += `
        <tr>
            <td><input type="checkbox" class="form-check" ${value.status_id == 2 ? 'checked' : ''} data-id="${value.id}" onclick="checkedItem(this)"></td>
            <td class="${value.status_id == 2 ? 'checked' : ''}">${value.name}</td>
            <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditItem"
                                    data-id="${value.id}" data-name="${value.name}"
                                    onclick="editItem(this)">Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modalDeleteItem"
                     data-id="${value.id}" data-name="${value.name}" onclick="deleteItem(this)">Delete</button>
            </td>
        </tr>
    `;
                });
                $('#shopping_table tbody').html(html);
                return true;
            }
        },
        error: function (data) {
            $.each(data.responseJSON.errors, function (key, errors) {
                $('.toast-body').html(errors);
                $('.toast').toast('show');
            });
        }
    });
}

function validateName(name) {
    const nameRegex = /^[a-zA-Z][a-zA-Z0-9]*$/;
    if (name === undefined || name.trim() === "" || !nameRegex.test(name)) {
        $('.toast-body').html('The item name field is invalid');
        $('.toast').toast('show');
        return false;
    }
}


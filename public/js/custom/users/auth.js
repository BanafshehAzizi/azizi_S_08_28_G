$(document).ready(function () {
    $('.toast').toast('hide');
});

function login() {
    const username = $('#username').val();
    const password = $('#password').val();

    const username_validation = validateUsername(username);
    if (username_validation == false) {
        return false;
    }

    const password_validation = validatePassword(password);
    if (password_validation == false) {
        return false;
    }

    $.ajax({
        url: "/shopping_list/api/v1/login",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            username: username,
            password:password
        },
        cache: false,
        success: function (data) {
            console.log(data);
            $('.toast-body').html(data.message);
            $('.toast').toast('show');
            if (data.status == 'success') {
                const token = data.response.token;
                localStorage.setItem('token', token);
                window.location.href = '/shopping_list/api/v1/shopping-list';
                return true;
            }
            return false;
        },
        error: function (data) {
            console.log(data);
            $.each(data.responseJSON.errors, function (key, errors) {
                $('.toast-body').html(errors);
                $('.toast').toast('show');
            });
        }
    });
}

function validateUsername(username) {
    const usernameRegex = /^[a-zA-Z][a-zA-Z0-9]*$/;
    if (username === undefined || username.trim() == "" || username.trim() == null || !usernameRegex.test(username)) {
        $('.toast-body').html('The username field is invalid');
        $('.toast').toast('show');
        return false;
    }
    return true;
}

function validatePassword(password) {
    const passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}$/;
    if (password === undefined || password.trim() === "" || !passwordRegex.test(password)) {
        $('.toast-body').html('The password field is invalid');
        $('.toast').toast('show');
        return false;
    }
    return true;
}
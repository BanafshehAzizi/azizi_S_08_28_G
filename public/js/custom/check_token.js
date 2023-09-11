$(document).ready(function () {

    if (!hasToken()) {
        window.location.href = '/shopping_list/api/v1/login';
        return false;
    }

});

function hasToken() {
    return localStorage.getItem('token');
}
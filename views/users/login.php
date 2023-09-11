<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سبد خرید</title>
    <link href="/shopping_list/public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="/shopping_list/public/css/custom/shopping.css" rel="stylesheet">
    <script src="/shopping_list/public/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="/shopping_list/public/js/bootstrap/bootstrap.min.js"></script>
    <script src="/shopping_list/public/js/jquery/jquery.form.min.js"></script>
</head>
<body>
<header>
    <div class="toast align-items-center text-white bg-primary border-0 position-fixed" role="alert"
         aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
        </div>
    </div>
</header>
<main class="container-fluid mt-3">
    <section class="row justify-content-center text-center mb-3">
        <div class="col-md-6">
            <h1 class="mb-3">Login</h1>
            <form id="add_item_form" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Username" id="username" required>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" id="password" required>
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-primary" type="button" id="register" onclick="login()">Login</button>
                </div>
            </form>
        </div>
    </section>
</main>
<script src="/shopping_list/public/js/custom/users/auth.js"></script>
</body>
</html>
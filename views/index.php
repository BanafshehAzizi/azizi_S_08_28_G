<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>سبد خرید</title>
    <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet">
    <script src="public/js/jquery/jquery-3.7.1.min.js"></script>
    <script src="public/js/bootstrap/bootstrap.min.js"></script>
    <script src="public/js/jquery/jquery.form.min.js"></script>
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
            <img src="public/images/shopping-cart-Icon.svg" alt="shopping cart">
            <h1 class="mb-3">Shooping List</h1>

            <form id="add_item_form" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="item" id="item">
                    <button class="btn btn-primary" type="button" id="add_item" onclick="addItem()">Add</button>
                </div>
            </form>
        </div>
    </section>
    <section class="row justify-content-center text-center">
        <div class="col-md-6">

            <table id="shopping_table" class="table table-bordered align-items-center">
                <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>operations</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($items as $item) { ?>
                    <tr>
                        <td><input type="checkbox"
                                   class="form-check" <?php if ($item['status_id'] == 2) echo "checked" ?> data-id="<?php echo $item['id'] ?>" onclick="checkedItem(this)"></td>
                        <td class="<?php if ($item['status_id'] == 2) echo "checked"; ?>"><?php echo $item['name'] ?></td>
                        <td>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modalEditItem"
                                    data-id="<?php echo $item['id'] ?>" data-name="<?php echo $item['name'] ?>"
                                    onclick="editItem(this)">Edit
                            </button>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#modalDeleteItem" data-id="<?php echo $item['id'] ?>"
                                    data-name="<?php echo $item['name'] ?>" onclick="deleteItem(this)">Delete
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</main>
<div style="display: none;" class="modal fade" id="modalDeleteItem" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title modalDeleteItemLabel" id="">Delete</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure to delete item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="confirmDeleteItem"
                        onclick="confirmDeleteItem(this)">Yes
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
            </div>
        </div>
    </div>
</div>

<div style="display: none;" class="modal fade" id="modalEditItem" tabindex="-1" role="dialog"
     aria-labelledby="editModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title w-100 font-weight-bold modalEditItemLabel">Edit item</h4>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form mb-5">
                    <label data-error="wrong" id="editItem-label" data-success="" for="orangeForm-name">item
                        name</label>
                    <input type="text" name="name" id="editItemName" class="form-control">
                </div>
                <div id="edit-error-message" class="text-danger"></div>
            </div>
            <div class="modal-footer d-flex">
                <button type="button" class="btn btn-primary" id="confirmEditItem" onclick="confirmEditItem(this)">
                    edit
                </button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
            </div>
        </div>
    </div>
</div>
<script src="public/js/custom/shopping.js"></script>
</body>
</html>
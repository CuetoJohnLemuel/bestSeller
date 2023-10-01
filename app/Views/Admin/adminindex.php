<?= $this->include('Admin/top') ?>


<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable with default features</h3> <span><button type="button"
                                    style="float: right;" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal-default">
                                    <i class="fas fa-plus"></i> Add Product
                                </button></span>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Code</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Description</th>
                                        <th>Category</th>
                                        <th>Date Created</th>
                                        <th>Date Updated</th>
                                        <th class="text-center">Action</th>
                                        <th class="text-center">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($menu as $menu): ?>
                                    <tr>
                                        <th class="text-center" ><img class="img-fluid" style="width: 90px; height: 70px;" src="<?= base_url($menu['productImage']) ?>" alt=""></th>
                                        <th><?= $menu['code'] ?></th>
                                        <th><?= $menu['productName'] ?></th>
                                        <th><?= $menu['quantity'] ?></th>
                                        <th><?= $menu['productPrice'] ?></th>
                                        <th><?= $menu['productDescription'] ?></th>
                                        <th><?= $menu['productCategory'] ?></th>

                                        <th><?=date('F d, Y h:i:s A', strtotime($menu['createdAt']))?></th>
                                        <th><?=date('F d, Y h:i:s A', strtotime($menu['updatedAt']))?></th>
                                        <td class="text-center" style="cursor: pointer; font-size: 15px;"> <a href="#"
                                                data-toggle="modal" data-target="#editModal"
                                                data-id="<?= $menu['id'] ?>" 
                                                data-code="<?= $menu['code'] ?>"
                                                data-price="<?= $menu['productPrice'] ?>"
                                                data-category="<?= $menu['productCategory'] ?>"
                                                data-quantity="<?= $menu['quantity'] ?>"
                                                data-name="<?= $menu['productName'] ?>"
                                                data-des="<?= $menu['productDescription'] ?>"><i
                                                    class="fas fa-edit"></i></a></td>
                                        

                                        <td class="text-center" style="cursor: pointer; font-size: 15px;">
                                            <a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?= $menu['id'] ?>">
                                                <i class="fas fa-trash"></i> <!-- Add the delete button icon here -->
                                            </a>
                                        </td>


                                            
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<aside class="control-sidebar control-sidebar-dark">
</aside>
</div>
<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <form action="saveProduct" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="quantity">Product Category</label>
                                    <select class="form-control" id="productCategory" name="productCategory">
                                        <option value="Shoes">Shoes</option>
                                        <option value="T-Shirts">Shirt</option>
                                        <option value="Bags">Bags</option>
                                        <option value="Jeans">Jeans</option>
                                        <option value="Jacket">Jacket</option>
                                        <option value="Shorts">Shorts</option>
                                    </select>
                                </div>


                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="code">Product Code</label>
                                    <input type="text" class="form-control" id="code" name="code"
                                        >
                                </div>
                            </div>

                            <div class="col-md-3">
                            <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" id="quantity" name="quantity"
                                >
                        </div>
                            </div>


                        </div>

                      
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" name="productPrice"
                                placeholder="Enter product price">
                        </div>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="name" name="productName"
                                placeholder="Enter product name">
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Product Description</label>
                            <input type="text" class="form-control" id="productDescription" name="productDescription"
                                placeholder="Enter product description">
                        </div>
                        <div class="form-group">
                            <label for="productImage">Product Image</label>
                            <input type="file" class="form-control" id="productImage" name="productImage"
                                accept=".jpg, .jpeg, .png">
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <form action="<?= site_url("/editProduct"); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Product Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="quantity">Product Category</label>
                            <select class="form-control" id="edit_category" name="productCategory">
                                <option value="Shoes">Shoes</option>
                                <option value="T-Shirts">Shirt</option>
                                <option value="Bags">Bags</option>
                                <option value="Jeans">Jeans</option>
                                <option value="Jacket">Jacket</option>
                                <option value="Shorts">Shorts</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" class="form-control input-field" name="id" id="edit_id" />
                            <label for="code">Product Code</label>
                            <input type="text" class="form-control" id="edit_code" name="code">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" id="edit_quantity" name="quantity">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="edit_price" name="productPrice">
                        </div>
                        <div class="form-group">
                            <label for="name">Product Name</label>
                            <input type="text" class="form-control" id="edit_name" name="productName">
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Product Description</label>
                            <input type="text" class="form-control" id="edit_description" name="productDescription">
                        </div>

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <form action="<?= site_url("/deleteProduct"); ?>" method="post">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Product</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this product?</p>
                    <input type="hidden" class="form-control input-field" name="id" id="delete_id" />
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </form>
    </div>
</div> 
<script>
$(document).ready(function() {
    $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');
        var code = button.data('code');
        var quantity = button.data('quantity'); // Add this line
        var price = button.data('price'); // Add this line
        var category = button.data('category'); // Add this line
        var productName = button.data('name'); // Change to 'name'
        var productDescription = button.data('des'); // Change to 'des'

        var modal = $(this);
        modal.find('#edit_id').val(id);
        modal.find('#edit_code').val(code);
        modal.find('#edit_price').val(price);
        modal.find('#edit_quantity').val(quantity); // Add this line
        modal.find('#edit_category').val(category); // Add this line
        modal.find('#edit_name').val(productName);
        modal.find('#edit_description').val(productDescription);
    });
});
</script>

<script>
$(document).ready(function() {
    $('#deleteModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var id = button.data('id');

        var modal = $(this);
        modal.find('#delete_id').val(id);
    });
});
</script>

<?= $this->include('Admin/end') ?>

</body>

</html>
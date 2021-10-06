<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.css">

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Product</title>
  </head>
  <body>
    <h1 style="text-align:center">All Product</h1>
    @if($errors->any())
        <div class="noti-alert pad no-print">
            <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                <ul style="margin-bottom: 0rem">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    @if (session('error'))
        <div class="noti-alert pad no-print">
            <div class="alert bg-danger alert-dismissible mb-2" role="alert">
                {{ session('error') }}
            </div>
        </div>
    @endif
    <div class="content-body">
        <section id="drag-area">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-head">
                            <div class="card-header text-end">
                                <button  type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#add-product">
                                    Add Product
                                </button>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <table id="basic-datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th> ID</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($allProducts as  $key => $product)
                                        <tr>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->price}}</td>
                                            <td>
                                                <button title="Edit" type="button"
                                                    data-name="{{$product->name}}"
                                                    data-price="{{$product->price}}"
                                                    data-action='{{ route('products.update', [ $product->id ]) }}'
                                                    type="button" class="btn btn-success" 
                                                    data-bs-toggle="modal" data-bs-target="#edit-product"
                                                    >Edit</button>
                                                <form method="POST" action='{{ route('products.destroy', [ $product->id ]) }}'>
                                                    @csrf
                                                    @method('DELETE')
                                                    <br><button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!--create Modal -->
    <div class="modal fade" id="add-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topModalLabel">Product</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form  action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="row justify-content-md-center">
                            <div class="col">
                                <div class="form-body">
                                    <div class="form-group">
                                        <input type="text" name="name" id="name" placeholder="Enter Product Name">
                                    </div>
                                    <div class="form-group">
                                        <br>
                                        <input type="text" name="price" id="price" placeholder="Enter Product Price">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--Edit Modal -->
    <div class="modal fade" id="edit-product" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="topModalLabel">Edit Product</h4>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="update_product_form" action="">
                        @csrf
                        @method('PATCH')
                        <div class="row justify-content-md-center">
                            <div class="col">
                                <div class="form-body">
                                    <div class="form-group">
                                        <input type="text" name="name" id="update_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="price" id="update_price" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
  </body>
  <script>
    $(document).ready( function () {
        $('#basic-datatable').DataTable();

        $('#edit-product').on('show.bs.modal', function(e) {
            console.log("ok");
            let btn   = $(e.relatedTarget);
            let modal = $(e.target);

            let name   = btn.data('name');
            let price  = btn.data('price');
            let action = btn.data('action');

            $('#update_name').val(name);
            $('#update_price').val(price);
            $('#update_product_form').attr('action',action);
        });
    });
</script>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Products</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link href="css/app.css" type="text/css" rel="stylesheet" />
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>

</head>
<body class="container">
<div id="app">


<div class="row">
    <form class="col-md-8 col-md-offset-2 product-form" action="PUT">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="productName">Product Name</label>
            <input type="text" class="form-control" id="productName" placeholder="Product Name" v-model="productName">
        </div>
        <div class="form-group">
            <label for="quantityInStock">Quantity In Stock</label>
            <input type="text" class="form-control" id="quantityInStock" placeholder="Quantity In Stock" v-model="quantityInStock">
        </div>
        <div class="form-group">
            <label for="pricePerItem">Price Per Item</label>
            <input class="form-control" type="text" id="pricePerItem" placeholder="Price Per Item" v-model="pricePerItem">
        </div>
        <button type="submit" class="btn btn-default" v-on:click.prevent="saveProduct">Save</button>
    </form>
</div>
    <br />
    <div class="row">
        <div class="col-md-8 col-md-offset-2 products-container">
            <table class="table table-bordered products-list">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity In Stock</th>
                    <th>Price Per Item</th>
                    <th>Date Time Submitted</th>
                    <th>Total Value Number</th>
                </tr>
                <tr class="product-item" v-for="product in products">
                    <td>@{{ product.product_name }}</td>
                    <td>@{{ product.quantity }}</td>
                    <td>@{{ product.price }}</td>
                    <td>@{{ product.updated_at }}</td>
                    <td>@{{ product.quantity * product.price }}</td>
                </tr>
                <tr>
                    <td>Total</td><td>@{{ total }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<script src="js/app.js"></script>

</body>
</html>
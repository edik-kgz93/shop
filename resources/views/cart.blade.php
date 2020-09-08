<!doctype html>
<html>
<head>
    <title>Test project</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--CSS only-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- JavaScript -->
    <script src="{{asset('javascript/script.js')}}"></script>
    <!-- Jquery 3.5. -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body class="ml-3">
<h3 class="mb-3">NOTEBOOK</h3>
<h4>Cart</h4>
<table style="width:100%">
    <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th></th>
        <th>Sum</th>
    </tr>
    @foreach($cart_products as $product)
        <tr>
            <td><?php echo($product->name); ?></td>
            <td>
                <div class="row" class="d-1px">
                    <form action="/cart/minusform" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="form_quantity" value="<?php echo($product->quantity); ?>">
                        <input type="hidden" name="cart_minus_form_id" value="<?php echo($product->id); ?>">
                        <input type="submit" value="-">
                    </form>
                <div id="cart_quantity<?php echo($product->id); ?>"><?php echo($product->quantity); ?></div>
                    <form action="/cart/plusform" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="cart_form_quantity" value="<?php echo($product->quantity); ?>">
                        <input type="hidden" name="cart_plus_form_id" value="<?php echo($product->id); ?>">
                        <input type="submit" value="+">
                    </form>
                </div>
            </td>
            <td><?php echo($product->price); ?></td>
            <td>
                <form action="/cart/delete" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="cart_delete_form_id" value="<?php echo($product->id); ?>">
                    <input type="submit" value="Remove from cart">
                </form>
            </td>
            <td id="sum<?php echo($product->id); ?>"><?php echo($product->quantity*$product->price); ?></td>
        </tr>
    @endforeach
    <tr>
        <th>Allsum</th>
        <td></td>
        <td></td>
        <th><?php echo($allsum); ?></th>
    </tr>
</table>
</body>
</html>

<!DOCTYPE html>
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
<h4>Cartajax</h4>
<a href="/">Collection</a>
<table style="width:100%">
    <tr>
        <th>Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th></th>
        <th>Sum</th>
    </tr>
    @foreach($cart_products as $product)
        <tr id="row<?php echo($product->id); ?>">
            <td><?php echo($product->name); ?></td>
            <td>
                <div class="row">
                    <button onclick="minus_ajax(<?php echo($product->id); ?>,<?php echo($product->quantity); ?>,<?php echo($product->price); ?>)">-</button>
                    <div id="cart_ajax_quantity<?php echo($product->id); ?>"><?php echo($product->quantity); ?></div>
                    <button onclick="plus_ajax(<?php echo($product->id); ?>,<?php echo($product->quantity); ?>,<?php echo($product->price); ?>)">+</button>
                </div>
            </td>
            <td><?php echo($product->price); ?></td>
            <td>
                <button onclick="deleteajax(<?php echo($product->id); ?>)">Remove from cart</button>
            </td>
            <td id="sum<?php echo($product->id); ?>"><?php echo($product->quantity*$product->price); ?></td>
        </tr>
    @endforeach
    <tr>
        <th>Allsum</th>
        <td></td>
        <td></td>
        <td></td>
        <th>
            <div id="allsum"><?php echo($allsum); ?></div>
        </th>
    </tr>
</table>
</body>
</html>

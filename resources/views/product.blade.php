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
    <h5><?php echo($product[0]->name); ?></h5>
    <p><?php echo($product[0]->price); ?></p>
    <div class="row">
        <button onclick="minus()">-</button>
        <div id="quantity">1</div>
        <button onclick="plus()">+</button>
    </div>
    <form action="/cart" method="post">
        {{ csrf_field() }}
        <input type="hidden" id="form_quantity" name="form_quantity" value="1">
        <input type="hidden" name="id" value="<?php echo($product[0]->id); ?>">
        <input type="submit" value="Добавить в корзину (PHP)">
    </form>
    <a href="/cart">Cart</a>
</body>
</html>

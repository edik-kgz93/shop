<!doctype html>
<html>
<head>
    <title>Test project</title>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--CSS only-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body class="ml-3">
    <h3 class="mb-3">NOTEBOOK</h3>
    <div class="row">
        @foreach ($collection as $product)
            <div class="col-3">
                <h5><?php echo($product->name); ?></h5>
                <p><?php echo($product->price); ?></p>
                <a href="/product/<?php echo($product->id); ?>"><button>Перейти</button></a>
            </div>
        @endforeach
    </div>
</body>
</html>

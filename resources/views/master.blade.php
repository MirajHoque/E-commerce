<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- csrf token meta for ajax-->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- font awesome cdn-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- SweetAlert2-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>E-commerce</title>
</head>
<body>

    {{ View::make('header') }}
    @yield('content')
    {{ View::make('footer') }}

</body>

<style>
    .custom-logIn{
        height: 500px;
        padding-top: 100px;
    }
    img.slider-image{
        height: 450px;
        width: 100%;
    }
    .custom-product{
        height: 600px;
    }
    .slider-text{
        background-color: #35443585;
    }
    .trending-image{
        height: 100px;
        width: 180px;
    }
    .trending-item{
        float: left;
        width: 20%;
    }
    .trending-wrapper{
        margin: 30px;
    }
    .trending-text{
        margin-left: 20px;
        margin-right: 30px;
    }
    .details-image{
        height: 200px;
    }
    .col-md-6 > .details-image{
        height: 125px;
        width: 200px;
    }
    .cart-list-divider{
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px;
    }

    .cart-image{
        height: 100px;
        width: 180px;
    }

    

</style>
</html>
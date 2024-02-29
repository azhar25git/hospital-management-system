<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">

    <title>@yield('page_title')</title>

    <link rel="stylesheet" href="../assets/css/maicons.css">

    <link rel="stylesheet" href="../assets/css/bootstrap.css">

    <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="../assets/css/theme.css">
</head>

<body>
    <!-- Back to top button -->
    <div class="back-to-top"></div>

    @include('partials.header')

    @session('message')
        <div class="alert alert-success p-4" role="alert" id="alert">
            {{ $value }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" id="alert-btn-user">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endsession

    @yield('page_content')

    @include('partials.footer')

    <script src="../assets/js/jquery-3.5.1.min.js"></script>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="../assets/vendor/wow/wow.min.js"></script>

    <script src="../assets/js/theme.js"></script>

    @yield('page_script')

</body>

</html>

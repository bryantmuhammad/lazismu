<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="_token" content="{{ csrf_token() }}" />
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lazismu</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/user/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/user/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/user/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/user/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/user/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="/user/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/user/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/user/css/style.css" type="text/css">

    <style>
        .text-titik {
            white-space: nowrap;
            width: 100%;
            overflow: hidden;
            text-overflow: ellipsis;
            display: inline-block;
        }

        .aktivkategori {
            color: black !important;
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    {{-- <div id="preloder">
        <div class="loader"></div>
    </div> --}}

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__text">
            <p>SALURKAN DONASIMU DISINI!</p>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 text-center">
                        <div class="header__top__left">
                            <p>SALURKAN DONASIMU DISINI!</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="header__logo">
                        <h3>Lazismu</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="{{ Request::is('/') ? 'active' : '' }}"><a href="/">Home</a></li>
                            <li class="{{ Request::is('program') ? 'active' : '' }}"><a href="/program">Program</a>
                            </li>
                            <li class="{{ Request::is('visimisi') ? 'active' : '' }}"><a
                                    href="{{ route('user.visimisi') }}">Visi & Misi</a></li>
                            <li class="{{ Request::is('tentangkami') ? 'active' : '' }}"><a
                                    href="{{ route('user.tentangkami') }}">Tentang Kami</a></li>
                        </ul>
                    </nav>
                </div>

            </div>
            <div class="canvas__open"><i class="fa fa-bars"></i></div>
        </div>
    </header>
    <!-- Header Section End -->

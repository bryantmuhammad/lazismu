@extends('user.layout.main')
@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="hero__slider owl-carousel">
            <div class="hero__items set-bg" data-setbg="/user/img/banner2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero__items set-bg" data-setbg="/user/img/banner.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 col-md-8">
                            <div class="hero__text">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Product Section Begin -->
    <section class="product spad mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Silahkan pilih program donasi yang Anda inginkan</span>
                        <h2>SALURKAN DONASIMU DISINI!</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <ul class="filter__controls">
                        <li class="active" data-filter="*">Semua</li>
                        @foreach ($kategoris as $kategori)
                            <li data-filter=".{{ $kategori->nama_kategori }}">{{ $kategori->nama_kategori }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="row product__filter">
                @foreach ($programs as $program)
                    <div class="col-lg-4 col-md-6 col-sm-6 mix {{ $program->kategori->nama_kategori }}">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/' . $program->foto) }}"></div>
                            <div class="blog__item__text" style="border: 1px solid rgb(145, 144, 144);">
                                <span><img src="/user/img/icon/calendar.png" alt=""> 16 February 2020</span>
                                <span>{{ $program->kategori->nama_kategori }}</span>
                                <h5 class="text-titik">{{ $program->nama_program }}</h5>
                                <a href="{{ route('program.detail', $program->id_program) }}">Baca Lebih Lanjut</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->
@endsection

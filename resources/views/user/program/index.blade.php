@extends('user.layout.main')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Program</h4>
                        <div class="breadcrumb__links">
                            <a href="/">Home</a>
                            <span>Program</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">


                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Kategori</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    <li><a href="/program"
                                                            class="{{ Request::is('program') ? 'aktivkategori' : '' }}">Semua</a>
                                                    </li>
                                                    @foreach ($kategoris as $kategori)
                                                        <li><a href="/program/kategori/{{ $kategori->id_kategori }}"
                                                                class="{{ request('kategori') == $kategori->id_kategori ? 'aktivkategori' : '' }}">{{ $kategori->nama_kategori }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of {{ $programs->count() }} results</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($programs as $program)
                            <div class="col-lg-4 col-md-6 col-sm-6">
                                <a href="{{ route('program.detail', $program->id_program) }}">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg"
                                            data-setbg="{{ asset('storage/' . $program->foto) }}">

                                        </div>
                                        <div class="product__item__text">
                                            <h6>{{ $program->nama_program }}</h6>
                                            <h5>{{ $program->pemasukan->count() }} Donasi</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach

                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            {{ $programs->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
@endsection

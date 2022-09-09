@extends('user.layout.main')
@section('content')
    <!-- Shop Details Section Begin -->
    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{ $program->nama_program }}</h2>
                        <ul>
                            <li>{{ $program->kategori->nama_kategori }}</li>
                            <li>{{ $program->created_at->isoFormat('dddd, D MMMM Y') }}</li>
                            <li> {{ count($donaturs) }} Donatur</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="{{ asset("storage/{$program->foto}") }}" alt="Foto Program" height="500">
                    </div>

                </div>

            </div>
        </div>
    </section>

    <section class="shop-details" style="margin-top:-100px;">
        <div class="product__details__content">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">

                        <div class="product__details__text">
                            <h3>@currency($total)</h3>
                            <p>Dana Terus Dikumpul</p>
                            <a href="{{ route('donasi', $program->id_program) }}" class="primary-btn">Tunaikan Sekarang</a>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="product__details__tab">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#tabs-5" role="tab">Deskripsi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#tabs-6" role="tab">Donatur</a>
                                </li>

                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tabs-5" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        {!! $program->keterangan !!}
                                    </div>
                                </div>
                                <div class="tab-pane" id="tabs-6" role="tabpanel">
                                    <div class="product__details__tab__content">
                                        @foreach ($donaturs as $donatur)
                                            <div class="product__details__tab__content__item">
                                                <h5>{{ $donatur->nama_donatur }}</h5>
                                                <p>{{ $donatur->created_at->isoFormat('dddd, D MMMM Y') }}</p>
                                                <p>@currency($donatur->jumlah_pemasukan)</p>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Details Section End -->

    <!-- Related Section Begin -->
    <section class="related spad">
        <div class="container">

        </div>
    </section>
    <!-- Related Section End -->
@endsection

@extends('user.layout.main')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Invoice</h4>
                        <div class="breadcrumb__links">
                            <a href="./">Beranda</a>
                            <span>Invoice {{ $pemasukan->id_pemasukan }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="#" id="formdonasi">
                    @csrf
                    <input type="hidden" name="id_program" value="{{ $pemasukan->program->id_program }}">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="checkout__order">
                                <img src="{{ asset("storage/{$pemasukan->program->foto}") }}" alt="" height="410"
                                    width="100%">
                                <h4 class="order__title mt-2">{{ $pemasukan->program->nama_program }}</h4>
                                <ul class="checkout__total__all">
                                    <li>No Pembayaran <span style="color:black;">{{ $pemasukan->id_pemasukan }}</span></li>
                                    <li>Jenis Pembayaran <span
                                            style="color:black;">{{ $pemasukan->pembayaran->jenis_pembayaran }}</span></li>
                                    <li>Jenis Bank <span
                                            style="color:black;">{{ $pemasukan->pembayaran->jenis_bank }}</span></li>
                                    <li>Va Number <span style="color:black;">{{ $pemasukan->pembayaran->va_number }}</span>
                                    </li>
                                    <li>Cara Membayar <span><a target="_blank" href="{{ $pemasukan->pembayaran->pdf }}">Klik
                                                Disini</a></span>
                                    </li>
                                    <li>Jumlah Donasi <span style="color:black;">@currency($pemasukan->jumlah_pemasukan)</span></li>
                                </ul>
                                <p>Bantu program {{ $pemasukan->program->nama_program }} mencapai target </p>
                            </div>
                        </div>

                    </div>
                    <div class="row">

                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection

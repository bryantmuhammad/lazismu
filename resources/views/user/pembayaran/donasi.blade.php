@extends('user.layout.main')
@section('content')
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Donasi</h4>
                        <div class="breadcrumb__links">
                            <a href="./">Beranda</a>
                            <span>Donasi</span>
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
                    <input type="hidden" name="id_program" value="{{ $program->id_program }}">
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">{{ $program->nama_program }}</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Nama<span>*</span></p>
                                        <input type="text" id="nama_donatur" class="is-invalid" name="nama_donatur"
                                            value="{{ old('nama_donatur') }}">
                                        @error('nama_donatur')
                                            <label id="name-error" class="error" for="name"
                                                style="color:red;">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" class="is-invalid" name="email" value="{{ old('email') }}"
                                            placeholder="example@gmail.com">
                                        @error('email')
                                            <label id="name-error" class="error" for="name"
                                                style="color:red;">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="diff-acc">
                                    Sembunyikan Nama Saya (Hamba Allah)
                                    <input type="checkbox" id="diff-acc" name="hidden_name">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input">
                                <p>Nominal Donasi<span>*</span></p>
                                <input type="number" class="is-invalid" name="jumlah_pemasukan"
                                    value="{{ old('jumlah_pemasukan') }}">
                                @error('jumlah_pemasukan')
                                    <label id="name-error" class="error" for="name"
                                        style="color:red;">{{ $message }}</label>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Pesan Untuk Program Ini</p>
                                <input type="text" class="is-invalid" name="catatan" value="{{ old('catatan') }}"
                                    placeholder="Semoga Berkah">
                                @error('catatan')
                                    <label id="name-error" class="error" for="name"
                                        style="color:red;">{{ $message }}</label>
                                @enderror
                            </div>


                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <img src="{{ asset("storage/{$program->foto}") }}" alt="" height="210"
                                    width="100%">
                                <h4 class="order__title mt-2">{{ $program->nama_program }}</h4>
                                <button type="submit" id="submitdonasi" class="site-btn">Selanjutnya</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection

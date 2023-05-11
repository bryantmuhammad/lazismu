@extends('admin.layouts.main')
@section('content')
<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Tambah Penerimaan</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></div>
                <div class="breadcrumb-item">Tambah Penerimaan</div>
            </div>
        </div>

        <div class="section-body">

            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                        <form class="" id="formadmins" method="POST" action="{{ route('admin.store.pemasukan') }}">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="program">Program</label>
                                            <select name="id_program" id="id_program" class="form-control">

                                                @foreach ($programs as $program)
                                                <option value="{{ $program->id_program }}">{{ $program->nama_program }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nama Donatur</label>
                                            <input type="text" value="{{ old('nama_donatur') }}" name="nama_donatur"
                                                id="nama_donatur"
                                                class="form-control @error('nama_donatur') is-invalid @enderror"
                                                required>
                                            @error('nama_donatur')
                                            <label id="nama_donatur-error" class="error" for="nama_donatur">{{
                                                $message }}</label>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Email Donatur</label>
                                            <input type="email" value="{{ old('email') }}" name="email" id="email"
                                                class="form-control @error('email') is-invalid @enderror" required>
                                            @error('email')
                                            <label id="email-error" class="error" for="email">{{
                                                $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Jumlah Pemasukan</label>
                                            <input type="number" value="{{ old('jumlah_pemasukan') }}"
                                                name="jumlah_pemasukan" id="jumlah_pemasukan"
                                                class="form-control @error('jumlah_pemasukan') is-invalid @enderror"
                                                required>
                                            @error('jumlah_pemasukan')
                                            <label id="jumlah_pemasukan-error" class="error" for="jumlah_pemasukan">{{
                                                $message }}</label>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="catatan">Catatan</label>
                                            <textarea name="catatan" id="catatan" cols="30" rows="10"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <button class="btn btn-primary" type="submit" name="submit">Tambah
                                            Pemasukan</button>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
@endsection
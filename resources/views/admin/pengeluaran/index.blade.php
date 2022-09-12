@extends('admin.layouts.main')
@section('content')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>Pengeluaran</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                    <div class="breadcrumb-item">Pengeluaran</div>
                </div>
            </div>

            <div class="section-body">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Program</label>
                                <select name="program" id="program" class="form-control">
                                    <option value="0" {{ !request('program') ? 'selected' : '' }}>Semua</option>
                                    @foreach ($programs as $program)
                                        <option value="{{ $program->id_program }}"
                                            {{ request('program') == $program->id_program ? 'selected' : '' }}>
                                            {{ $program->nama_program }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" value="{{ old('tanggalawal', request('tanggalawal')) }}"
                                    name="tanggalawal" id="tanggalawal"
                                    class="form-control @error('tanggalawal') is-invalid @enderror">
                                @error('tanggalawal')
                                    <label id="nama_produk-error" class="error" for="nama_produk">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Awal</label>
                                <input type="date" value="{{ old('tanggalakhir', request('tanggalakhir')) }}"
                                    name="tanggalakhir" id="tanggalakhir"
                                    class="form-control @error('tanggalakhir') is-invalid @enderror">
                                @error('tanggalakhir')
                                    <label id="nama_produk-error" class="error" for="nama_produk">{{ $message }}</label>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12 mb-4">
                        <button class="btn btn-success" type="submit">Cari</button>
                        @if (request('tanggalakhir') && request('tanggalawal'))
                            <a class="btn btn-info"
                                href="/admin/laporan/pemesanan?cetak=true&tanggalawal={{ request('tanggalawal') }}&tanggalakhir={{ request('tanggalakhir') }}"
                                target="_blank" class="btn btn-info">
                                <i class="fa fa-print"></i>
                            </a>
                        @else
                            <a href="/admin/laporan/pemesanan?cetak=true" target="_blank" class="btn btn-info">
                                <i class="fa fa-print"></i>
                            </a>
                        @endif
                    </div>
                </form>
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">


                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordered table-custom table-md">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="15%">Tanggal</th>
                                                <th class="text-center" width="30%">Program</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Debit</th>
                                                <th class="text-center">Kredit</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemasukans as $pemasukan)
                                                <tr>
                                                    <td class="text-center" rowspan="2">
                                                        {{ $pemasukan->created_at->isoFormat('D MMMM Y') }}</td>
                                                    <td class="text-center" rowspan="2">
                                                        {{ $pemasukan->program->nama_program }}</td>

                                                    <td class="text-left">
                                                        {{ $pemasukan->pengeluaran->nama_pengeluaran }}
                                                    </td>
                                                    <td class="text-center">-</td>
                                                    <td class="text-center">@currency($pemasukan->jumlah_pemasukan)</td>

                                                </tr>
                                                <tr>
                                                    <td class="text-left" style="padding-left: 80px;">
                                                        {{ $pemasukan->nama_donatur . ' - ' . $pemasukan->pembayaran->jenis_pembayaran . ' - ' . $pemasukan->pembayaran->jenis_bank }}
                                                    </td>
                                                    <td class="text-center">@currency($pemasukan->jumlah_pemasukan)</td>
                                                    <td class="text-center">-</td>
                                                </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3" class="text-center"><b>Total</b></td>
                                                <td class="text-center"><b>@currency($total)</b></td>
                                                <td class="text-center"><b>@currency($total)</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>






    </div>
@endsection

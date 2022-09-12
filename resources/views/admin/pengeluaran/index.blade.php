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
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">


                        <div class="card">
                            {{-- <div class="card-header">
                                <a href="{{ route('program.create') }}">
                                    <button class="btn btn-primary float-right">Tambah Program</button>
                                </a>
                            </div> --}}
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

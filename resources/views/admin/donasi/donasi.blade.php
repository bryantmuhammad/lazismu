@extends('admin.layouts.main')
@section('content')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>Penerimaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                    <div class="breadcrumb-item">Penerimaan</div>
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
                                    <table id="mytable" class="table table-striped table-md">
                                        <thead>
                                            <tr>
                                                <th class="text-center" width="30%">Program</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Jumlah Donasi</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pemasukans as $pemasukan)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $pemasukan->program->nama_program }}</td>
                                                    <td class="text-center">{{ $pemasukan->nama_donatur }}</td>
                                                    <td class="text-center">@currency($pemasukan->jumlah_pemasukan)</td>
                                                    <td class="text-center">
                                                        @if ($pemasukan->status)
                                                            <button class="btn btn-danger"
                                                                data-id="{{ $pemasukan->id_pemasukan }}"
                                                                onclick="tambahPengeluaran($(this).data('id'))"
                                                                data-toggle="modal"
                                                                data-target="#exampleModalCenter">Pengeluaran</button>
                                                        @else
                                                            <button class="btn btn-info">Belum Membayar</button>
                                                        @endif

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>



        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengeluaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ route('pengeluaran.store') }}" method="post" id="formadmin"
                        enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="modal-body">
                            <div class="row">
                                <input type="hidden" name="id_pemasukan" id="id_pemasukan">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label>Nama Pengeluaran</label>
                                        <input type="text" value="{{ old('nama_pengeluaran') }}" name="nama_pengeluaran"
                                            id="nama_pengeluaran"
                                            class="form-control @error('nama_program') is-invalid @enderror" required>
                                        @error('nama_program')
                                            <label id="nama_program-error" class="error"
                                                for="nama_program">{{ $message }}</label>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Tambah Pengeluaran</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
@endsection

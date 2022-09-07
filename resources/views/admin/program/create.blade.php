@extends('admin.layouts.main')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Program</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('program.index') }}">Program</a></div>
                    <div class="breadcrumb-item">Tambah Program</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="" id="formadmins" method="post" action="{{ route('program.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nama Program</label>
                                                <input type="text" value="{{ old('nama_program') }}" name="nama_program"
                                                    id="nama_program"
                                                    class="form-control @error('nama_program') is-invalid @enderror"
                                                    required>
                                                @error('nama_program')
                                                    <label id="nama_program-error" class="error"
                                                        for="nama_program">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <select name="id_kategori" id="id_kategori" class="form-control">
                                                    @foreach ($kategoris as $kategori)
                                                        @if ($kategori->id_kategori == old('id_kategori'))
                                                            <option value="{{ $kategori->id_kategori }}" selected>
                                                                {{ $kategori->nama_kategori }}</option>
                                                        @else
                                                            <option value="{{ $kategori->id_kategori }}">
                                                                {{ $kategori->nama_kategori }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Keterangan</label>
                                                <input id="keterangan" name="keterangan" type="hidden" name="content">
                                                <trix-editor input="keterangan"></trix-editor>
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="email">Foto Program</label>
                                                <input type="file" onchange="previewImage()" class="form-control"
                                                    name="foto" id="image">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="email">Preview Foto</label>
                                                <br>
                                                <img class="img-preview img-fluid" alt="Preview Image"
                                                    style="width: 150px;height:130px;">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit" name="submit">Tambah
                                            Program</button>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

@extends('admin.layouts.main')
@section('content')
    <div class="main-content">

        <section class="section">
            <div class="section-header">
                <h1>Program</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                    <div class="breadcrumb-item">Program</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">

                    <div class="col-12 col-md-12 col-lg-12">


                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('program.create') }}">
                                    <button class="btn btn-primary float-right">Tambah Program</button>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="mytable" class="table table-bordered table-md">
                                        <thead>

                                            <tr>
                                                <th class="text-center">Nama Program</th>
                                                <th class="text-center">Keterangan</th>
                                                <th class="text-center">Foto Program</th>
                                                <th class="text-center">Action</th>
                                            </tr>

                                        </thead>
                                        <tbody>
                                            @foreach ($programs as $program)
                                                <tr>
                                                    <td class="text-center">{{ $program->nama_program }}</td>
                                                    <td class="text-center">{!! $program->keterangan !!}</td>
                                                    <td class="text-center">
                                                        <a href="{{ asset('storage/' . $program->foto) }}" target="_blank">
                                                            <img src="{{ asset('storage/' . $program->foto) }}"
                                                                alt="Foto Program" width="130" height="110">
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <button class="btn btn-success" data-id="{{ $program->id_program }}"
                                                            onclick="editProgram($(this).data('id'))" data-toggle="modal"
                                                            data-target="#exampleModalCenter">
                                                            <i class="fa fa-pen"></i>
                                                        </button>

                                                        <form class="d-inline"
                                                            action="{{ route('program.destroy', $program->id_program) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button onclick="return false"
                                                                class="btn btn-danger button-delete">
                                                                <i class="fa fa-trash"></i> </button>
                                                        </form>
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
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Program</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" method="post" id="formadmin" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label>Nama Program</label>
                                        <input type="text" value="{{ old('nama_program') }}" name="nama_program"
                                            id="nama_program"
                                            class="form-control @error('nama_program') is-invalid @enderror" required>
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
                                        <input type="file" onchange="previewImage()" class="form-control" name="foto"
                                            id="image">
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
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-primary">Edit Kategori</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

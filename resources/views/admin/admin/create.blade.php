@extends('admin.layouts.main')
@section('content')
    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Admin</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('user.index') }}">Admin</a></div>
                    <div class="breadcrumb-item">Tambah Admin</div>
                </div>
            </div>

            <div class="section-body">

                <div class="row">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form class="" id="formadmins" method="post" action="{{ route('user.store') }}">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Nama Admin</label>
                                                <input type="text" value="{{ old('name') }}" name="name"
                                                    id="name" class="form-control @error('name') is-invalid @enderror"
                                                    required>
                                                @error('name')
                                                    <label id="name-error" class="error"
                                                        for="name">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input class="form-control @error('email') is-invalid @enderror"
                                                    type="email" name="email" id="email" value="{{ old('email') }}"
                                                    required>
                                                @error('email')
                                                    <label id="email-error" class="error"
                                                        for="email">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input class="form-control @error('password') is-invalid @enderror"
                                                    type="password" name="password" id="password" required>
                                                @error('password')
                                                    <label id="password-error" class="error"
                                                        for="password">{{ $message }}</label>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="nohp">Role</label>
                                                <select name="role" id="role" class="form-control">
                                                    @foreach ($roles as $role)
                                                        @if ($role->name == old('role'))
                                                            <option value="{{ $role->name }}" selected>{{ $role->name }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $role->name }}">{{ $role->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="card-footer text-right">
                                        <button class="btn btn-primary" type="submit" name="submit">Tambah Admin</button>
                                    </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </div>
@endsection

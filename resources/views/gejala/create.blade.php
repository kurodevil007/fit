@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Gejala
        </div>
        <div class="card-body">
            <form action="{{ route('gejala.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama') }}">
                    @error('nama')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penyebab">Penyebab</label>
                    <input type="text" name="penyebab" id="penyebab"
                        class="form-control @error('penyebab') is-invalid @enderror" value="{{ old('penyebab') }}">
                    @error('penyebab')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="solusi">Solusi</label>
                    <input type="text" name="solusi" id="solusi"
                        class="form-control @error('solusi') is-invalid @enderror" value="{{ old('solusi') }}">
                    @error('solusi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    {{-- <label for="keterangan">Keterangan</label> --}}
                    <button type="submit" class="btn btn-primary btn-icon"><i class="fa fa-paper-plane"></i>
                        Simpan</button>
                    <a href="{{ route('gejala.index') }}" class="btn btn-danger btn-icon float-right"><i
                            class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

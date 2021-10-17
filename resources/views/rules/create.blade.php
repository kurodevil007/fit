@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Tambah Rules
        </div>
        <div class="card-body">
            <form action="{{ route('rules.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" id="kode" class="form-control @error('kode') is-invalid @enderror"
                        value="{{ old('kode') }}">
                    @error('kode')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="penyakit">Penyakit</label>
                    <select name="penyakit_id" id="penyakit"
                        class="form-control @error('penyakit_id') is-invalid @enderror">
                        @foreach ($penyakit as $item)
                        <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->keterangan }}
                        </option>
                        @endforeach
                    </select>
                    @error('penyakit_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
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
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" cols="5" rows="5"
                        class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan') }}</textarea>
                    @error('keterangan')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-icon"><i class="fa fa-paper-plane"></i>
                        Simpan</button>
                    <a href="{{ route('rules.index') }}" class="btn btn-danger btn-icon float-right"><i
                            class="fa fa-arrow-left"></i> Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

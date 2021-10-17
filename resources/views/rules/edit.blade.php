@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Rules : {{ $rule->nama }} ({{ $rule->kode }})
        </div>
        <div class="card-body">
            <p class="mb-2">Penyakit : {{ $rule->penyakit->nama }} ({{ $rule->penyakit->kode }})</p>
            <form action="{{ route('rules.update', ['rule' => $rule->kode]) }}" method="post">
                <input type="hidden" name="kode" value="{{ $rule->kode }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <div class="form-group">
                        <label for="gejala">Gejala</label>
                        <select multiple name="gejala[]" id="penyakit"
                            class="form-control @error('gejala') is-invalid @enderror">
                            @foreach ($gejala as $item)
                            <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->penyebab }}
                            </option>
                            @endforeach
                        </select>
                        @error('gejala')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

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

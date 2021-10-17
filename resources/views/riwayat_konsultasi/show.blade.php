@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Riwayat Konsultasi kode : {{ $konsultasi->kode }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <p class="mb-2">Tanggal Konsultasi : {{ $konsultasi->created_at->isoFormat('LL') }}</p>
                <p class="mb-2">Gejala :</p>
                <div>
                    @foreach (json_decode($konsultasi->gejala) as $gejala => $param)
                    <p>{{ $gejala }} : <b>{{ $param == 1 ? 'Ya' : 'Tidak' }}</b></p>
                    <hr>
                    @endforeach
                </div>
                <p class="mb-2 mt-2">hasil :</p>
                <div>
                    @foreach (json_decode($konsultasi->hasil) as $param)
                    <p>{{ $param->nama }}</p>
                    <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

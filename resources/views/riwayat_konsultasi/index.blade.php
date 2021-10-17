@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Riwayat Konsultasi untuk : {{ auth()->user()->nama }}
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayat as $nomor => $item)
                        <tr>
                            <td>{{ $nomor + 1 }}</td>
                            <td>{{ $item->created_at->isoFormat('LL') }}</td>
                            <td>{{ $item->konsultasi_kode }}</td>
                            <td><a href="{{ route('riwayat_konsultasi.show', ['riwayat_konsultasi' => $item->konsultasi_kode]) }}"
                                    class="btn btn-primary btn-icon"><i class="fa fa-eye"></i> Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            Pilih gejala yang anda rasakan~
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('konsultasi.store') }}" method="post">
                    @csrf
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gejala</th>
                                <th>Keluhan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gejala as $nomor => $item)
                            <tr>
                                <td>{{ $nomor + 1 }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <input type="radio" name="keluhan[{{ $item->nama }}|{{ $item->id }}]" value="1"
                                        checked> Ya
                                    <input type="radio" name="keluhan[{{ $item->nama }}|{{ $item->id }}]" value="0">
                                    Tidak
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">
                                    <button type="submit" class="btn btn-primary btn-icon">
                                        <i class="fa fa-hospital-o"></i> Periksa
                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

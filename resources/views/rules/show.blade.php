@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            Rules : {{ $rule->nama }} ({{ $rule->kode }})
        </div>
        <div class="card-body">
            <p class="mb-2">Penyakit : {{ $rule->penyakit->nama }} ({{ $rule->penyakit->kode }})</p>
            <p class="mb-2">Gejala :</p>
            <div>
                @foreach ($rule->rules_gejala as $item)
                <p class="text-bold"><b>{{ $item->nama }}</b></p>
                <p>Penyebab : {{ $item->penyebab }}</p>
                <p>Solusi : {{ $item->solusi }}</p>
                <hr>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="table-responsive">
        <div class="card border border-success">
            <div class="card-header">Gejala</div>
            <div class="card-body">
                <a href="{{ route('gejala.create') }}" class="btn btn-success btn-icon mb-2"><i class="fa fa-plus"></i>
                    Tambah Gejala</a>
                <table class="table table-bordered" id="table" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Penyebab</th>
                            <th>Solusi</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gejala as $nomor => $item)
                        <tr>
                            <td>{{ $nomor + 1 }}</td>
                            <td>{{ $item['nama'] }}</td>
                            <td>{{ $item['penyebab'] }}</td>
                            <td>{{ $item['solusi'] }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('gejala.show', ['gejala' => $item['id']]) }}"
                                        class="btn btn-primary btn-icon"><i class="fa fa-eye"></i></a>
                                    <button onclick="return confirm('Yakin akan menghapus data?')"
                                        form="frm-del-{{ $item['id'] }}" class="btn btn-danger btn-icon"><i
                                            class="fa fa-trash"></i></button>
                                </div>

                                <form id="frm-del-{{ $item['id'] }}"
                                    action="{{ route('gejala.destroy', ['gejala' => $item['id']]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="kode" value="{{ $item['kode'] }}">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Keterangan</th>
                            <th>#</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $('#table tfoot th').not(':first').not(':last').each(function() {
    var title = $(this).text();
    $(this).html('<input type="text" class="form-control" placeholder="Cari ' + title + '...    " />');
});

$('#table').dataTable({
    initComplete: function() {
        this.api().columns().every(function() {
            var that = this;
            $('input', this.footer()).on('keyup change clear', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });
    }
});
</script>
@endsection

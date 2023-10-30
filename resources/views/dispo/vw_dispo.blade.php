@extends('layouts.template')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Data Disposisi Surat</h1>
    </div>

    <div class="card">
        <div class="card-header">
            <h4>Data Disposisi Surat</h4>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>No Surat</th>
                        {{-- <th>Perihal</th> --}}
                        {{-- <th>Instansi Pengirim</th>
                        <th>Tanggal Surat</th>
                        <th>Tanggal Surat diterima</th>
                       
                        <th>Lampiran Jumlah</th>
                        <th>Klasifikasi</th>
                        <th>Jabatan</th> --}}
                        <th>Catatan</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispo as $dispo)
                        <tr>
                            <td>{{ $dispo->No_surat_id }}</td>
                            <td>{{ $dispo ->catatan }}</td>
                            <td>{{ $dispo ->foto_id }}</td>
                            {{-- <td>{{ $surat->foto }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@extends('layouts.template')
@section('content')
    
<section class="section">
    <div class="section-header">
        <h1>Surat Keluar</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
            <div class="breadcrumb-item">Surat Keluar</div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('vw_sk.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
    
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-2">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">No Surat</th>
                                <th class="text-center">Instansi Pengirim</th>
                                <th class="text-center">Tanggal Surat</th>
                                <th class="text-center">Klasifikasi</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sks as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $item->no_surat}}</td>
                                <td class="text-center">{{ $item->instansi_pengirim }}</td>
                                <td class="text-center">{{\Carbon\Carbon::parse ($item->Tgl_surat)->isoFormat('D MMMM Y') }}</td>
                                <td class="text-center">{{ $item->kls ? $item->kls->klasifikasi : 'Tidak ada klasifikasi' }}</td>
                                <td class="text-center">
                                    <div class="btn-group center">
                                        <form action="{{ route('vw_sk.edit', $item->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-warning mr-2">
                                                <i class="fas fa-pencil-alt"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('vw_sk.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mr-2"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <button type="button" class="btn btn-primary mr-2" data-toggle="modal"
                                            data-target="#viewModal{{ $item->id }}">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</section>

@foreach ($sks as $item)
<!-- Modal -->
<div class="modal fade" id="viewModal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="viewModalLabel{{ $item->id }}">
                    <img src="{{ asset('dist/assets/img/dishub.jpg') }}" alt="Logo Dinas Perhubungan" class="mr-2" style="max-width: 30px;">
                    Detail Surat Masuk
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered custom-table">
                    <tr>
                        <th>No Surat</th>
                        <td>{{ $item->no_surat }}</td>
                    </tr>
                    <tr>
                        <th>Instansi Pengirim</th>
                        <td>{{ $item->instansi_pengirim }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Surat</th>
                        <td>{{ $item->tgl_surat }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Surat diterima</th>
                        <td>{{ $item->tgl_surat_di_terima }}</td>
                    </tr>
                    <tr>
                        <th>Perihal</th>
                        <td>{{ $item->perihal }}</td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <td>{{ $item->jenis }}</td>
                    </tr>
                    <tr>
                        <th>Klasifikasi</th>
                        <td>{{ $item->kls ? $item->kls->klasifikasi : 'Tidak ada klasifikasi' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Lampiran</th>
                        <td>{{ $item->lampiran_jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Foto / File</th>
                        <td class="text-center">
                            <a href="{{ asset('fotosk/'.$item->foto ) }}" target="_blank" rel="noppener noreferrer">
                                <i class="fas fa-file-pdf"></i> Lihat Dokumen
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer justify-content-center">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

@endforeach

<script>
$(document).ready(function () {
    // Inisialisasi modal Bootstrap pada saat dokumen siap
    $('.modal').modal();
});


</script>
@endsection

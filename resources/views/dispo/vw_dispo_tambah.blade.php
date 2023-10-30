@extends('layouts.template')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Disposisi | {{ $suratMasuk->No_surat }} | </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
            <div class="breadcrumb-item">Disposisi</div>
            <div class="breadcrumb-item">Tambah Disposisi</div>
          </div>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Detail Surat Masuk</h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered custom-table">
                    <tr>
                        <th>No Surat</th>
                        <td>{{ $suratMasuk->No_surat }}</td>
                    </tr>
                    <tr>
                        <th>Instansi Pengirim</th>
                        <td>{{ $suratMasuk->Instansi_pengirim }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Surat</th>
                        <td>{{ $suratMasuk->Tgl_surat }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Surat Diterima</th>
                        <td>{{ $suratMasuk->Tgl_surat_di_terima }}</td>
                    </tr>
                    <tr>
                        <th>Perihal</th>
                        <td>{{ $suratMasuk->Perihal }}</td>
                    </tr>
                    <tr>
                        <th>Klasifikasi</th>
                        <td>{{ $suratMasuk->kls ? $suratMasuk->kls->klasifikasi : 'Tidak ada klasifikasi' }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Lampiran</th>
                        <td>{{ $suratMasuk->Lampiran_jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Foto / File</th>
                        <td class="text-center">
                            <a href="{{ route('baca-pdf', $suratMasuk->id) }}" target="_blank" rel="noopener noreferrer">
                                <i class="fas fa-file-pdf"></i> Lihat Dokumen
                            </a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    {{-- tambah --}}
    <div class="section-body">
        <div class="card">
           
            <div class="card-body">
                <form action="{{ route('vw_disposisi.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jabatan_id">Disposisi Pegawai</label>
                                <select class="form-control" id="jabatan_id" name="jabatan_id">
                                    <option disabled selected>-- Pilih Jabatan --</option>
                                    @foreach($jabatans as $jabatan)
                                        <option value="{{ $jabatan->id }}">{{ $jabatan->jabatan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="No_surat_id">No Surat</label>
                                <textarea class="form-control" id="No_surat_id" name="No_surat_id" readonly>{{ $suratMasuk->No_surat }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- <div class="form-group">
                        <label for="foto_id">Foto</label>
                        <input type="file" class="form-control-file" id="foto_id" name="foto_id">
                    </div>
                   
                        <div class="form-group">
                        <th>Foto / File</th>
                        <td class="text-center">
                            <a href=""  target="_blank" rel="noppener noreferrer">
                                <i class="fas fa-file-pdf"></i> Lihat Dokumen
                            </a>
                        </td>
                        </div>
                         --}}
                   


                    <div class="form-group">
                        <label for="catatan">Catatan</label>
                        <textarea class="form-control" id="catatan" name="catatan"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Simpan Disposisi</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

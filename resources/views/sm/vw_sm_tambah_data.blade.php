@extends('layouts.template')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Form Tambah Data</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('vw_sm.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_surat"><i class="fas fa-file-alt"></i> No Surat</label>
                                <input type="text" class="form-control" id="no_surat" name="No_surat">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="instansi_pengirim"><i class="fas fa-building"></i> Instansi Pengirim</label>
                                <input type="text" class="form-control" id="instansi_pengirim" name="Instansi_pengirim">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="klasifikasi_id"><i class="fas fa-list"></i> Klasifikasi</label>
                                <select class="form-control" id="klasifikasi_id" name="kls_id">
                                    <option disabled selected>--Pilih Klasifikasi--</option>
                                    @foreach($klasifikasis as $klasifikasi)
                                        <option value="{{ $klasifikasi->id }}">{{ $klasifikasi->klasifikasi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_surat"><i class="fas fa-calendar"></i> Tanggal Surat</label>
                                <input type="date" class="form-control" id="Tgl_surat" name="Tgl_surat">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_surat_di_terima"><i class="fas fa-calendar"></i> Tanggal Diterima</label>
                                <input type="date" class="form-control" id="tgl_surat_di_terima" name="Tgl_surat_di_terima">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="perihal"><i class="fas fa-align-left"></i> Perihal</label>
                        <textarea class="form-control" id="perihal" name="Perihal"></textarea>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis"><i class="fas fa-list"></i> Jenis</label>
                                <select class="form-control" id="jenis" name="jenis">
                                    <option disabled selected>--Pilih Jenis--</option>
                                    <option value="Fotocopy">Fotocopy</option>
                                    <option value="Asli">Asli</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="lampiran_jumlah"><i class="fas fa-hashtag"></i> Jumlah Lampiran</label>
                                <input type="number" class="form-control" id="lampiran_jumlah" name="Lampiran_jumlah">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="foto"><i class="fas fa-image"></i> Foto</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                        <a href="{{ route('vw_sm.index') }}" class="btn btn-danger"><i class="fas fa-times"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

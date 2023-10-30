@extends('layouts.template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Form Tambah Data</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('vw_klasifikasi.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode"><i class="fas fa-barcode"></i> Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode">
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="klasifikasi"><i class="fas fa-tags"></i> Klasifikasi</label>
                                <input type="text" class="form-control" id="klasifikasi" name="klasifikasi">
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="keterangan"><i class="fas fa-info-circle"></i> Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4"></textarea>
                    </div>
    
                    <!-- Existing form fields here -->
                   
                    <!-- Continue adding other form fields -->
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center mb-3">
                            <a href="{{ route('vw_klasifikasi.index') }}" class="btn btn-primary btn-block"><i class="fas fa-times"></i> Batal</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan</button>
                        </div>
                    </div>
                    
                    
                </form>
            </div>
        </div>
    </div>
    
</section>
@endsection

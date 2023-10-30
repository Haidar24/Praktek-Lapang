@extends('layouts.template')

@section('content')
    
<section class="section">
    <div class="section-header">
        <h1>Edit Data Klasifikasi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item"><a href="/">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="{{ route('vw_klasifikasi.index') }}">Klasifikasi</a></div>
            <div class="breadcrumb-item active">Edit Data</div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('vw_klasifikasi.update', $kls->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kode"><i class="fas fa-barcode"></i> Kode</label>
                                <input type="text" class="form-control" id="kode" name="kode" value="{{ $kls->kode }}"> 
                            </div>
                        </div>
                    
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="klasifikasi"><i class="fas fa-tags"></i> Klasifikasi</label>
                                <input type="text" class="form-control" id="klasifikasi" name="klasifikasi" value= "{{ $kls->klasifikasi }}" >
                            </div>
                        </div>
                    </div>
    
                    <div class="form-group">
                        <label for="keterangan"><i class="fas fa-info-circle"></i> Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="4">{{ $kls->keterangan }}</textarea>
                    </div>
                    
                    
                    <!-- Add more input fields here for other attributes -->
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <a href="{{ route('vw_klasifikasi.index') }}" class="btn btn-primary btn-block"><i class="fas fa-times"></i> Batal Perubahan</a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-save"></i> Simpan Perubahan</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

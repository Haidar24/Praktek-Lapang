@extends('layouts.template')
@section('content')

<section class="section">
    <div class="section-header">
        <h1>Laporan Surat Masuk</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
            <div class="breadcrumb-item">Laporan Surat Masuk</div>
          </div>
    </div>

      
      <div class="card">
        <div class="card-header" text-center>
            <h4 >MASUKAN TANGGAL YANG INGIN ADA CETAK</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <div class="input-group">
                        <input type="date" class="form-control" id="tglawal" name="tglawal" placeholder="Start Date">
                        <div class="input-group-prepend">
                            <span class="input-group-text">to</span>
                        </div>
                        <input type="date" class="form-control" id="tglakhir" name="tglakhir" placeholder="End Date">
                    </div>
                </div>
                <div class="text-center">
                    <button onclick="generateReport()" class="btn btn-primary col-md-4">
                        Cetak Laporan <i class="fas fa-print"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <script>
        function generateReport() {
            var tglawal = document.getElementById('tglawal').value;
            var tglakhir = document.getElementById('tglakhir').value;
            var url = 'cetak/' + tglawal + '/' + tglakhir;
            window.open(url, '_blank');
        }
    </script>
    
</section> 
    



@endsection
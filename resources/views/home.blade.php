@extends('layouts.template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Admin</h4>
                    </div>
                    <div class="card-body">
                        {{ $JumlahPetugas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-newspaper"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>User</h4>
                    </div>
                    <div class="card-body">
                        {{ $JumlahUser }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Surat Masuk</h4>
                    </div>
                    <div class="card-body">
                        {{ $JumlahSuratM }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-envelope-open-text"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Surat Keluar</h4>
                    </div>
                    <div class="card-body">
                        {{ $JumlahSuratK }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-warning text-white text-center">
                    <h5 class="mb-0">Surat Masuk Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Instansi Pengirim</th>
                                    <th>Tanggal Surat</th>
                                    <th>Perihal</th>
                                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataTerbaru as $data)
                                <tr>
                                    <td>{{ $data->No_surat }}</td>
                                    <td>{{ $data->Instansi_pengirim }}</td>
                                    <td>{{\Carbon\Carbon::parse ($data->Tgl_surat)->isoFormat('D MMMM Y') }}</td>
                                    <td>{{ $data->Perihal }}</td>
                                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-success text-white text-center">
                    <h5 class="mb-0">Surat Keluar Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No Surat</th>
                                    <th>Instansi Pengirim</th>
                                    <th>Tanggal Surat</th>
                                    <th>Perihal</th>
                                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataTerbaruSk as $data)
                                <tr>
                                    <td>{{ $data->no_surat }}</td>
                                    <td>{{ $data->instansi_pengirim }}</td>
                                    <td>{{\Carbon\Carbon::parse ($data->Tgl_surat)->isoFormat('D MMMM Y') }}</td>
                                    <td>{{ $data->perihal }}</td>
                                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-header bg-info text-white text-center">
            <h5 class="mb-0">Grafik Surat Perbulan</h5>
        </div>
        <div class="card-body">
            <canvas id="myChart"></canvas>

        </div>
    </div>
</section>


{{-- Js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    //tambah
    var bulanAngka = {!! json_encode($suratMasukData->pluck('bulan')) !!};
var namaBulan = bulanAngka.map(function(bulan) {
    return getNamaBulan(bulan);
});
    // Data yang ingin Anda tampilkan pada grafik
    var data = {
    labels: namaBulan, //menggunakan nama bulan
    datasets: [{
        label: 'Surat Masuk',
        data:  {!! $suratMasukData->pluck('total_lampiran') !!}, // Menggunakan data dari SuratMasuk
        backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)'
        ],
        borderWidth: 1
    }, {
        label: 'Surat Keluar',
        data:  {!! json_encode($suratKeluarData->pluck('total_lampiran')) !!}, // Menggunakan data dari SuratKeluar
        backgroundColor: [
            'rgba(255, 159, 64, 0.2)',
            'rgba(75, 192, 192, 0.2)',
            'rgba(255, 205, 86, 0.2)',
            'rgba(153, 102, 255, 0.2)',
            'rgba(54, 162, 235, 0.2)'
        ],
        borderColor: [
            'rgba(255, 159, 64, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(255, 205, 86, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(54, 162, 235, 1)'
        ],
        borderWidth: 1
    }]
};
// Fungsi untuk mengonversi angka bulan menjadi nama bulan
function getNamaBulan(angka) {
    var namaBulan = [
        "Januari", "Februari", "Maret", "April", "Mei", "Juni",
        "Juli", "Agustus", "September", "Oktober", "November", "Desember"
    ];
    return namaBulan[angka - 1];
}

    // Pengaturan konfigurasi grafik
    var options = {
        responsive: true,
        maintainAspectRatio: false
    };

    // Membuat grafik
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie', // Ganti jenis grafik sesuai kebutuhan (bar, line, pie, dll.)
        data: data,
        options: options
    });
</script>



@endsection

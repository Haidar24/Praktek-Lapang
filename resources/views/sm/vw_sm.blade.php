@extends('layouts.template')
@section('content')
    
<section class="section">
    <div class="section-header">
        <h1>Surat Masuk</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
            <div class="breadcrumb-item">Surat Masuk</div>
          </div>
    </div>

    <div class="col-12">
      <div class="card">
          <div class="card-header">
            <a href="{{ route('vw_sm.create') }}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah Data
          </a>
          </div>
          <div class="card-body">
              <div class="table-responsive">
                  <table class="table table-striped" id="table-2">
                      <thead>
                          <tr>
                              <th class="text-center">No</th>  
                              <th class="text-center">Nomor Surat</th>
                              <th class="text-center">Instansi Pengirim</th>
                              <th class="text-center">Tanggal Surat</th>
                              <th class="text-center">Klasifikasi</th>
                              <th class="text-center">Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($sms as $index => $item)
                          <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $item->No_surat}}</td>
                            <td class="text-center">{{ $item->Instansi_pengirim }}</td>
                            <td class="text-center">{{\Carbon\Carbon::parse ($item->Tgl_surat)->isoFormat('D MMMM Y') }}</td>
                            <td class="text-center">{{ $item->kls ? $item->kls->klasifikasi : 'Tidak ada klasifikasi' }}</td>
                            <td class="text-center">
                              <div class="btn-group d-flex justify-content-center">
                                <a href="{{ route('vw_disposisi.show', $item->id) }}" class="btn btn-primary mr-2">Disposisi Surat</a>

                          
                                  <a href="#" data-toggle="dropdown" class="btn btn-warning dropdown-toggle" aria-expanded="false">Options</a>
                                  <div class="dropdown-menu">
                                      <a href="#" class="dropdown-item has-icon" data-toggle="modal" data-target="#viewModal{{ $item->id }}">
                                          <i class="fas fa-eye"></i> View
                                      </a>
                                      <a href="{{ route('vw_sm.edit', $item->id) }}" class="dropdown-item has-icon"><i class="far fa-edit"></i> Edit</a>
                                      <div class="dropdown-divider"></div>
                                      <a href="{{ route('vw_sm.destroy', $item->id) }}" class="dropdown-item has-icon text-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                          <i class="far fa-trash-alt"></i> Delete
                                      </a>
                                  </div>
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
</div>



<!-- Modal -->
@foreach ($sms as $item )
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
              <td>{{ $item->No_surat }}</td>
            </tr>
            <tr>
              <th>Instansi Pengirim</th>
              <td>{{ $item->Instansi_pengirim }}</td>
            </tr>
            <tr>
              <th>Tanggal Surat</th>
              <td>{{ $item->Tgl_surat }}</td>
            </tr>
            <tr>
              <th>Tanggal Surat diterima</th>
              <td>{{ $item->Tgl_surat_di_terima }}</td>
            </tr>
            <tr>
              <th>Perihal</th>
              <td>{{ $item->Perihal }}</td>
            </tr>
            <tr>
              <th>Klasifikasi</th>
              <td>{{ $item->kls ? $item->kls->klasifikasi : 'Tidak ada klasifikasi' }}</td>
            </tr>
            <tr>
              <th>Jumlah Lampiran</th>
              <td>{{ $item->Lampiran_jumlah }}</td>
            </tr>
            <tr>
              <th>Foto / File</th>
              <td class="text-center">
                  <a href="{{ route('baca-pdf', $item->id) }}"  target="_blank" rel="noppener noreferrer">
                      <i class="fas fa-file-pdf"></i> Lihat Dokumen
                  </a>
              </td>
          </tr>
          <tr>
            @if(isset($item->scannedText)) <!-- Pastikan teks yang dipindai ada -->
                <th>Hasil Pemindaian PDF</th>
                <td>{{ $item->scannedText }}</td>
            @else
                <th>Tidak ada teks yang dipindai</th>
                <td>-</td>
            @endif
        </tr>
        <tr>
            @if(isset($item->classification)) <!-- Pastikan klasifikasi ada -->
                <th>Klasifikasi</th>
                <td>{{ $item->classification }}</td>
            @else
                <th>Belum Diklasifikasikan</th>
                <td>-</td>
            @endif
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

@extends('layouts.template')
@section('content')
    
<section class="section">
    <div class="section-header">
        <h1>Pengguna</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ route('home.index') }}">Dashboard</a></div>
            <div class="breadcrumb-item">Pengguna</div>
        </div>
    </div>
    
    <div class="col-12">
      <div class="card">
          <div class="card-header d-flex justify-content-between align-items-center">
            <a href="{{ route('vw_jabatan.create') }}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah Data
            </a>
          </div>
          
          <div class="card-body p-0">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Jabatan</th>
                              <th class="text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                         @foreach ($item as $index => $jabatan)
                          <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td class="text-center">{{ $jabatan->jabatan }}</td>    
                            <td class="text-center">
                                <form action="{{ route('vw_jabatan.destroy', $jabatan->id) }}" method="POST" style="display: inline-block">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                </form>
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
@endsection

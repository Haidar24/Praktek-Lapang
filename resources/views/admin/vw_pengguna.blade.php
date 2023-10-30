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
            <a href="{{ route('vw_p_tambah') }}" class="btn btn-primary">
              <i class="fas fa-plus"></i> Tambah Data
          </a>
          </div>
          
          <div class="card-body p-0">
              <div class="table-responsive">
                  <table class="table table-striped">
                      <thead>
                          <tr>
                              <th class="text-center">No</th>
                              <th class="text-center">Nama</th>
                              <th class="text-center">Email</th>
                              <th class="text-center">Password</th>
                              <th class="text-center">Level</th>
                              <th class="text-center">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach ($Users as $index => $item )
                          <tr>
                            <td class="text-center">{{ $index + 1}}</td>
                            <td class="text-center">{{ $item->name }}</td>
                            <td class="text-center">{{ $item->email }}</td>
                            <td class="text-center">{{ $item->password }}</td>
                            <td class="text-center">{{ $item->level }}</td>
                            <td>
                              <div class="btn-group">
                                <form action="{{ route('vw_pengguna.destroy', $item->id) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="btn btn-danger mr-2"
                                      onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?') "><i class="fas fa-trash"></i></button>
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
@endsection
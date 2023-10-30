@extends('layouts.template')

@section('content')
    
<section class="section">
    <div class="section-header">
        <h1>Klasifikasi</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
            <div class="breadcrumb-item">Klasifikasi</div>
        </div>
    </div>

    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <a href="{{ route('vw_klasifikasi.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Kode </th>
                                <th class="text-center">Klasifikasi</th>
                                <th class="text-center">keterangan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kls as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="text-center">{{ $item->kode }}</td>
                                <td class="text-center">{{ $item->klasifikasi }}</td>
                                <td class="text-center">{{ $item->keterangan }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <form action="{{ route('vw_klasifikasi.edit', $item->id) }}" method="GET">
                                            @csrf
                                            <button type="submit" class="btn btn-warning mr-2">Edit</button>
                                        </form>
                                        <form action="{{  route('vw_klasifikasi.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger mr-2" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
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
@endsection

@extends('layouts.template')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Hasil Pemindaian PDF</h1>
    </div>

    <div class="section-body">
        <div class="card">
            <div class="card-body">
                <h5>Hasil Pemindaian</h5>
                <hr>
                <div>
                    <p>{{ $scannedText }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

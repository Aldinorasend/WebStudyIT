@extends('layouts.admin')

@section('title', 'Download Sertifikat')

@section('content')
    <div class="container">
        <h2>Download Sertifikat</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Form untuk generate PDF -->
        <form action="{{ route('admin.sertif.generate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="certificate_name" class="form-label">Nama Sertifikat</label>
                <input type="text" class="form-control" name="certificate_name" required>
            </div>
            <div class="mb-3">
                <label for="recipient_name" class="form-label">Nama Penerima</label>
                <input type="text" class="form-control" name="recipient_name" required>
            </div>
            <button type="submit" class="btn btn-primary">Generate PDF</button>
        </form>

        <h3 class="mt-5">Daftar Sertifikat Tersedia</h3>
        <div class="list-group">
            @foreach ($files as $file)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        {{ $file->name }}
                        <span class="badge bg-secondary ms-2">PDF</span>
                    </div>
                    <div>
                        <a href="{{ route('admin.sertif.download', $file->id) }}" 
                           class="btn btn-success btn-sm me-2">
                            Download
                        </a>
                        <form action="{{ route('admin.sertif.destroy', $file->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('title','Dashboard Admin Tampil Articel')

@extends('dashboard.layouts.main')
@section('conten')

<div class="card border-light shadow-sm">
    <div class="card-header bg-primary text-white">
        <h4 class="card-title mb-0">Detail Artikel</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped">
            <tbody>
                <tr>
                    <th>Judul</th>
                    <td>{{ $articel->title }}</td>
                </tr>
                <tr>
                    <th>Penulis</th>
                    <td>{{ $articel->user->name }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $articel->slug }}</td>
                </tr>
                <tr>
                    <th>Kategori</th>
                    <td>{{ $articel->category->name }}</td>
                </tr>
                <tr>
                    <th>Views</th>
                    <td>{{ $articel->views }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{ $articel->status }}</td>
                </tr>
                <tr>
                    <th>Tanggal Publikasi</th>
                    <td>{{ $articel->publis_data }}</td>
                </tr>
                <tr>
                    <th>Gambar</th>
                    <td >
                        <img src="{{ asset('storage/images/'.$articel->img) }}" alt="Gambar Artikel" class="img-fluid rounded shadow-sm mb-3 mt-3" style="max-height: 200px; max-width: 100%; object-fit: cover;">
                    </td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>
                        <div class="border p-3 rounded bg-light">
                            {!! nl2br($articel->desc) !!}
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="mt-4 d-flex justify-content-between align-items-center">
            <a href="{{ route('articel.index') }}" class="btn btn-primary btn-lg">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <form action="{{ route('articel.destroy',$articel->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-lg">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>

@endsection
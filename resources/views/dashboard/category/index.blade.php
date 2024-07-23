@section('title','Dashboard Kategory')
@extends('dashboard.layouts.main')
@section('conten')

<div class="table-responsive">
    <div class="card-header">
  <a href="{{ route('category.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Category</a>
    </div>
    <div class="card-body">
        <form action="{{ route('category.index') }}" method="GET" class="d-flex justify-content-end">
            <div class="input-group mb-3" style="max-width: 300px;">
                <input type="text" class="form-control" placeholder="Search Category" name="search" value="{{ request('search') }}">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </div>
        </form>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $categori)
                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $categori->name }}</td>
                <td>{{ $categori->slug }}</td>
                <td>{{ $categori->created_at }}</td>
                <td class="d-flex align-items-center align-middle">
                    <a href="{{ route('category.edit', $categori->id) }}" class="btn btn-icon btn-primary me-2"><i class="far fa-edit"></i> Edit</a>
                    <form action="{{ route('category.destroy', $categori->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-exclamation-triangle"></i> Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@push('js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session('success'))
<script>
    Swal.fire({
        title: "Selamat!",
        text: "{{ session('success') }}",
        icon: "success"
    });
</script>
<script>
    document.querySelectorAll('.btn-danger').forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            Swal.fire({
                title: "Apakah Anda Yakin?",
                text: "Data akan terhapus",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    this.closest('form').submit();
                }
            });
        });
    });
</script>
@endif
@endpush

@endsection
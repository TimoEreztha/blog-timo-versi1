@section('title','Dashboard Kategory')
@extends('dashboard.layouts.main')
@section('conten')

<div class="table-responsive">
  
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
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($configs as $config)
                
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $config->name }}</td>
                <td>{{ $config->value }}</td>
                <td class="d-flex align-items-center align-middle">
                    <a href="{{ route('config.edit', $config->id) }}" class="btn btn-icon btn-primary me-2"><i class="far fa-edit"></i> Edit</a>
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
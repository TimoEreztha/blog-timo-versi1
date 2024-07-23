@section('title','Dashboard Admin Articel')
@extends('dashboard.layouts.main')
@section('conten')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="table-responsive">
    <div class="card-header" style="display: flex; justify-content: space-between;">
        <a href="{{ route('articel.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Articel</a>
    </div>
    <div class="card-body">
     
    </div>
    <div style="float:  right; margin-top: -20px;">
        <form action="{{ route('articel.index') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ old('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-striped" id="table-1">
        <thead>
            <tr>
                <th>No</th>
                <th>Title</th>
                <th>Penulis</th>
                <th>Name Category</th>
                <th>Views</th>
                <th>Status</th>
                <th>Publish Data</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $articel)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $articel->title }}</td>
                <td>{{ $articel->user->name }}</td>
                <td>{{ $articel->category->name }}</td>
                <td>{{ $articel->views }}</td>
                @if ($articel->status == 'publish')
                     <td><div class="badge badge-primary">{{ $articel->status }}</div></td> 
                     @else
                        <td><div class="badge badge-danger">{{ $articel->status }}</div></td> 
                @endif
                <td>{{ $articel->publis_data }}</td>
                <td class="d-flex align-items-center justify-content-center">
                    <a href="{{ route('articel.show',$articel->id) }}" class="btn btn-info mr-1">View</a>
                    <a href="{{ route('articel.edit',$articel->id) }}" class="btn btn-warning mr-1">Edit</a>
                    <form action="{{ route('articel.destroy',$articel->id) }}" method="POST" class="m-0 p-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="card-footer clearfix">
    <div class="dataTables_paginate paging_simple_numbers">
     {{ $data->appends(['search' => $search])->links() }}
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

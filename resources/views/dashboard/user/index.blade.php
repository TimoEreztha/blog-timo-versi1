@section('title','Dashboard Users')
@extends('dashboard.layouts.main')
@section('conten')

<div class="table-responsive">
    <div class="card-header">
    @if (auth()->user()->role == 'admin')
        
    <a href="{{ route('users.create') }}" class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i> Tambah Users</a>
    @endif
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
                <th>email</th>
                <th>Created At</th>
       
                    
                <th>Action</th>
       
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
    
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at }}</td>
                @if (auth()->user()->role == 'admin')          
                <td class="d-flex align-items-center align-middle">
                    <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-exclamation-triangle"></i> Delete</button>
                    </form>
                    <a href="{{ route('users.edit',$user->id) }}" class="btn btn-icon btn-primary me-2"><i class="far fa-edit"></i> Edit</a>
                </td>
               
               
            </tr>
             
           
                @endif
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
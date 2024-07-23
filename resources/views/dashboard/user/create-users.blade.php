@section('title','Dashboard Tambah Kategory')
@extends('dashboard.layouts.main')

@section('conten')
<div class="card">
    <div class="card-header">
        <h4>Create Users</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name',$user->name) }}" required>
                @error('name')
                    <div class="alert color-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email',$user->email) }}" required>
                @error('email')
                    <div class="alert color-danger">{{ $message }}</div>
                @enderror
            </div>
          
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                @error('password')
                    <div class="alert color-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation') }}" required>
                @error('password_confirmation')
                    <div class="alert color-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Tambah</button>
            <a href="{{ route('category.index') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>

<script>
    document.getElementById('name').addEventListener('input', function() {
        let name = this.value;
        let slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });
</script>



@endsection
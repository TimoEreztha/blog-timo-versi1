@section('title','Dashboard Edit Kategory')
@extends('dashboard.layouts.main')

@section('conten')
<div class="card">
    <div class="card-header">
        <h4>Edit Config</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('config.update', $config->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $config->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="value">value</label>
                <input type="text" class="form-control @error('value') is-invalid @enderror" id="value" name="value" value="{{ old('value', $config->value) }}" required>
                @error('value')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('config.index') }}" class="btn btn-danger">Cancel</a>
        </form>
    </div>
</div>



@endsection
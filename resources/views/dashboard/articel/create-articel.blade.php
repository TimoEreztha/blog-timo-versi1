@section('title','Dashboard Admin Tambah Articel')
@extends('dashboard.layouts.main')
@section('conten')

<div class="card">
    <div class="card-header">
        <h4>Tambah Artikel Baru</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('articel.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required autofocus>
                        @error('title')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ old('slug') }}" required>
                        @error('slug')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Kategori</label>
                        <select class="form-control @error('categories_id') is-invalid @enderror" id="categories_id" name="categories_id" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('categories_id')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="img">Gambar</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img" required>
                        <img id="img-preview" src="#" alt="Preview" style="display: none; max-width: 100px; max-height: 100px; margin-top: 10px;">
                        @error('img')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="">Pilih Status</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                        @error('status')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="publis_data">Tanggal Publikasi</label>
                        <input type="date" class="form-control @error('publis_data') is-invalid @enderror" id="publis_data" name="publis_data" value="{{ old('publis_data') }}" required>
                        @error('publis_data')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea class="form-control @error('desc') is-invalid @enderror" id="editor" name="desc" rows="3" style="height:100%">{{ old('desc') }}</textarea>
                @error('desc')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Tambah Artikel</button>
            </div>
        </form>
    </div>
</div>
{{-- link ckeditor --}}
@push('js')
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
{{-- untuk ckeditor --}}
<script>
    CKEDITOR.replace('editor', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        clipboard_handleImages:false
    });
</script>
{{-- agar slugnya sama dengan title --}}
<script>
    document.getElementById('title').addEventListener('input', function() {
        let name = this.value;
        let slug = name.toLowerCase().replace(/ /g, '-').replace(/[^\w-]+/g, '');
        document.getElementById('slug').value = slug;
    });
</script>
{{-- untuk menampilkan gambar --}}
<script>
    document.getElementById('img').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('img-preview').setAttribute('src', e.target.result);
                document.getElementById('img-preview').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
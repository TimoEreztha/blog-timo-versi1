
@section('title','Dashboard Admin Edit Articel')
@extends('dashboard.layouts.main')
@section('conten')
    

<div class="card">
    <div class="card-header">
        <h4>Ubah Artikel</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('articel.update',$articel->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <input type="hidden" name="oldImg" value="{{ $articel->img }}">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="title">Judul</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $articel->title }}" required autofocus>
                        @error('title')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" value="{{ $articel->slug }}" required>
                        @error('slug')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="categories_id">Kategori</label>
                        <select class="form-control @error('categories_id') is-invalid @enderror" id="categories_id" name="categories_id" required>
                            <option value="{{ $articel->categories_id }}" selected>{{ $articel->category->name }}</option>
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
                        <input type="file" class="form-control @error('img') is-invalid @enderror" id="img" name="img">
                        <div class="mt-3">
                            Gambar Lama <br>
                               <img id="img-preview" src="{{ asset('storage/images/'.$articel->img) }}"  width="100px" >
                         
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="{{ $articel->status }}" selected>{{ ucfirst($articel->status) }}</option>
                            <option value="publish">Publish</option>
                            <option value="draft">Draft</option>
                        </select>
                        @error('status')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="publis_data">Tanggal Publikasi</label>
                        <input type="date" class="form-control @error('publis_data') is-invalid @enderror" id="publis_data" name="publis_data" value="{{ $articel->publis_data }}" required>
                        @error('publis_data')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="desc">Deskripsi</label>
                <textarea class="form-control @error('desc') is-invalid @enderror" id="editor" name="desc" rows="3" >{{ $articel->desc }}</textarea>
                @error('desc')
                    <div class="alert text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Update Artikel</button>
            </div>
        </form>
    </div>
</div>

@push('js')
   
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('editor', {
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token={{csrf_token()}}',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token={{csrf_token()}}',
        clipboard_handleImages:false
    });
</script>
@endpush
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
@endsection
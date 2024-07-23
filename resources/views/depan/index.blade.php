@extends('depan.template')
@section('content')

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4 shadow" data-aos="fade-in">
                <a href="{{ url('/p', $posts_terbaru->slug) }}">
                    <img class="card-img-top" src="{{ asset('storage/images/' . $posts_terbaru->img) }}" alt="..." />
                </a>
                <div class="card-body">
                    <div class="small text-muted">{{ $posts_terbaru->publis_data }}</div>
                    <div class="small text-muted"><b>Penulis : </b>{{ $posts_terbaru->user->name }}</div>
                    <div class="small text-muted"><b>Category : </b>{{ $posts_terbaru->category->name }}</div>
                    <h2 class="card-title">{{ $posts_terbaru->title }}</h2>
                    <p class="card-text">{!! Str::limit($posts_terbaru->desc, 150, '...') !!}</p>
                    <a class="btn btn-primary" href="{{ url('/p', $posts_terbaru->slug) }}">Read more →</a>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
            <div class="row">
                @foreach ($post_data as $post)
                    <div class="col-md-6">
                        <div class="card mb-4 shadow" data-aos="fade-up">
                            <a href="{{ url('/p', $post->slug) }}">
                                <img class="card-img gambar-post" src="{{ asset('storage/images/' . $post->img) }}" alt="..."  >
                            </a>
                            <div class="card-body">
                                <div class="small text-muted">
                                    <span class="ml-3">{{ $post->publis_data }}</span><br>
                                    <span class="ml-3">views {{ $post->views }}x</span><br>
                                    <span class="ml-3"><b>Penulis : </b>{{ $post->user->name }}</span>
                                </div>
                                <a href="{{ $post->category->slug }}" class="small text-muted"><b>Category : </b>{{ $post->category->name }}</a>
                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                <p class="card-text">{!! Str::limit($post->desc, 150, '...') !!}</p>
                                <a class="btn btn-primary" href="{{ url('/p', $post->slug) }}">Read more →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination-->
            <div class="d-flex justify-content-center">
                {{ $post_data->links() }}
            </div>
        </div>
        <!-- Side widgets-->
        @include('depan.layouts.widget')
    </div>
</div>
<!-- Footer-->
@endsection

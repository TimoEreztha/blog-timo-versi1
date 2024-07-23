@extends('depan.template')
@section('content')
    
<!-- Page content-->
<div class="container">
    <div class="row">
            {{-- <form action="{{ route('search') }}" method="POST">
                    @csrf
                      <div class="input-group mb-2">
                        <input class="form-control" type="text" name="search" placeholder="Serach Artikel..."  / value="{{ $view }}">
                        <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                    </div>
                  </form>
                  @if ($view)
                      <h1 class="text-center">Data Tidak Ditemukan</h1>
                 
<div class="text-center mb-5">

    <a href="{{ route('view') }}" class="btn btn-primary ">BACK</a>
</div>
                    
                  @else
                      
                  @endif --}}
                @foreach ($categorys as $post)
                    <div class="col-3">
                        <div class="card mb-4 shadow" data-aos="fade-up">
                                   <a href="{{ url('/p',$post->slug) }}"><img class="card-img-top equal-image-size gambar2" src="{{ asset('storage/images/'.$post->img) }}" alt="..." / ></a>
                            <div class="card-body">
                                <div class="small text-muted">
                                      <span class="ml-3">{{ $post->publis_data }}</span><br> 
                       <span class="ml-3">views {{ $post->views }}</span> <br>
                       <span class="ml-3"><b>Penulis :</b> {{ $post->views }}x</span> 
                                 
                                </div>
                                <a href="{{ $post->category->slug }}" class="small text-muted"><b>Category : </b>{{ $post->category->name }}</a>
                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                <p class="card-text">{!! Str::limit($post->desc, 50, '...') !!}</p>
                                <a class="btn btn-primary" href="{{ url('/p',$post->slug) }}">Read more →</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
    
          
            <!-- Pagination-->
            <div class="d-flex justify-content-center">
                {{ $categorys->links() }}
            </div>
        </div>
    </div>
</div>

<!-- Footer-->
@endsection

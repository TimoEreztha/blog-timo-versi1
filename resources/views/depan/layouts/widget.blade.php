<div class="col-lg-4" data-aos="fade-left">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <div class="card-body">
            <form action="{{ route('search') }}" method="POST">
                @csrf
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search Artikel..." value="{{ old('search') }}">
                    <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <ul class="list-unstyled mb-0">
                        @foreach ($categorys as $category)
                        <li><a href="{{ route('category.articel', $category->slug) }}">{{ $category->name }} ({{ $category->count() }})</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Articel Populer</div>
        <div class="card-body">
            @foreach ($post_populer as $post)
                <div class="mb-3">
                       <a href="{{ url('/p', $post->slug) }}" class="post">
                        <h6 class="mt-2 ">{{ $post->title }}</h6>
                    </a>
                    <a href="{{ url('/p', $post->slug) }}">
                        <div class="card-img-top" style="background-image: url('{{ asset('storage/images/'.$post->img) }}'); background-size: cover; background-position: center; height: 200px; border-radius: 5px;"></div>
                    </a>
            
                </div>
            @endforeach
        </div>
    </div>
</div>

<style>
    .card-img-top {
        width: 100%;
        height: auto;
        display: block;
          
    }
    .post {
        text-decoration: none;
    }
    .mb-3 a {
        color: black;
    }
    

</style>

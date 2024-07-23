@extends('depan.template')
@section('content')

<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8" data-aos="fade-up">
            <!-- Featured blog post-->
            <div class="card mb-4">
                <a href=""><img class="card-img-top gambar" src="{{ asset('storage/images/'.$show->img) }}" alt="..." height="500" width="500"></a>
                <div class="card-body">
                    <div class="small text-muted">
                       <span class="ml-3">{{ $show->publis_data }}</span><br> 
                       <span class="ml-3">views {{ $show->views }}x</span> <br>
                       <span class="ml-3"><b>Penulis : </b> {{ $show->user->name }}</span> 
                    </div>
                    <div class="small text-muted">
                       <a href="{{ route('category.articel',$show->category->slug) }}"> <b>Category :</b> {{ $show->category->name }}</a>
                    </div>
                    <h2 class="card-title">{{ $show->title }}</h2>
                    <p class="card-text">{!! $show->desc !!}</p>
                </div>
                <!-- Share to Facebook -->
                
            </div>
       
            <div class="mb-3">
                
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}" class="btn btn-primary" target="_blank" title="Share on Facebook">
             <i class="fa-brands fa-facebook-f"></i>
            </a>
            <a href="https://api.whatsapp.com/send?text={{ url()->current() }}" class="btn btn-success" target="_blank" title="Share on WhatsApp">
                <i class="fab fa-whatsapp"></i>
            </a>
</div>
            <!-- Share to WhatsApp -->
        
        </div>
        <!-- Side widgets-->
        @include('depan.layouts.widget')
    </div>
</div>
<!-- Footer-->
@endsection

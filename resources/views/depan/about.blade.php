@extends('depan.template')
@section('content')
    
<!-- Page content-->
<div class="container">
    <div class="row">
        <!-- Blog entries-->
        <div class="col-lg-8">
            <!-- Featured blog post-->
            <div class="card mb-4 shadow">
                <a href=""><img class="card-img-top gambar" src="{{ asset('storage/images/timo2.jpg') }}" alt="..." height="500" width="500"></a>
                <div class="card-body">
                    <div class="small text-muted">{{ date('D-M-Y') }}</div>
                    <h2 class="card-title">{{ 'TENTANG SAYA' }}</h2>
                    <p class="card-text">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet obcaecati tenetur molestias eligendi sint eum possimus qui libero, totam, dolorem fugiat enim! Recusandae culpa, inventore ab unde aperiam doloribus eos?    
                            </p>
                            <p>
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Architecto fugit ipsa dolore sequi praesentium et magnam, tenetur accusamus placeat asperiores quos ab nesciunt odit, officia illo aliquid, neque laborum quae.</p>
                                <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem ab quisquam rerum est porro qui ipsam aperiam doloribus perspiciatis accusamus officia minima ipsum sequi consequatur, aspernatur illum inventore eveniet reprehenderit!</p>
                    </p>
                </div>
            </div>
            <!-- Nested row for non-featured blog posts-->
       
            <!-- Pagination-->
         
        </div>
        <!-- Side widgets-->
        @include('depan.layouts.widget')
    </div>
</div>
<!-- Footer-->
@endsection

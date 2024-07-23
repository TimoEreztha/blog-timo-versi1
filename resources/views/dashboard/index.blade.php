@section('title','Dashboard Admin')
@extends('dashboard.layouts.main')
@section('conten')
  <div class="row">
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Total Articel</h4>
                  </div>
                  <div class="card-body">
                   <h4>{{ $total_articel }}</h4>
                  </div>
                  <div class="card-footer">
                               <a href="{{ route('articel.index') }}" class="btn btn-primary">View</a>
                  </div>
                </div>
              </div>
              <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Total Category</h4>
                  </div>
                  <div class="card-body">
                  <h4>{{ $total_category }}</h4>
                  </div>
                  <div class="card-footer">
                    <a href="{{ route('category.index') }}" class="btn btn-primary">View</a>
                  </div>
                </div>
              </div>
             <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4 >Articel Terbaru</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Title</th>
                          <th scope="col">Category</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($populer_articel as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->title }}</td>
                          <td>{{ $item->category->name }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
             <div class="col-6">
                <div class="card">
                  <div class="card-header">
                    <h4 >Articel Terbaru</h4>
                  </div>
                  <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Title</th>
                          <th scope="col">Category</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($populer_articel as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->title }}</td>
                          <td>{{ $item->category->name }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
  </div>
@endsection
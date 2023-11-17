@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card">
                    <img src="{{ Storage::url($blog->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$blog->title}}</h5>
                      <p class="card-text">{!!$blog->content!!}</p>
                      <a href="/blogs" class="btn btn-primary">Back</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
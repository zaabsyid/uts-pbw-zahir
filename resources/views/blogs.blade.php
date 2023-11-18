@extends('layout.app')

@section('content')
    <div class="container" style="margin-top: 20px;>
        <div class="row">
            <div class="col">
                @foreach ($blogs as $blog)
                <div class="card" style="width: 18rem;">
                    <img src="{{ Storage::url($blog->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">{{$blog->title}}</h5>
                      {{-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> --}}
                      <a href="/blogs/{{$blog->id}}/detail" class="btn btn-primary">Baca Blog</a>
                    </div>
                  </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
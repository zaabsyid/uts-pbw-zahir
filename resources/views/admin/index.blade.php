@extends('admin.admins.app')

@section('content')
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Data Blog</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Image</th>
              <th>Content</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($blogs as $blog)
              <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$blog->title}}</td>
                <td><img src="{{ Storage::url($blog->image) }}" alt="" style="height:40px; width:60px; object-fit: cover;"></td>
                <td>{!!$blog->content!!}</td>
                <td><a href="/blog/{{$blog->id}}/edit" class="btn btn-md btn-warning">Edit</a> <a href="/blog/{{$blog->id}}/delete" class="btn btn-md btn-danger">Delete</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
@endsection
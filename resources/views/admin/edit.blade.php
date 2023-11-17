@extends('admin.admins.app')

@section('content')
<div class="col-md-12">
  <!-- general form elements -->
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Add Blog</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/blog/{{$blog->id}}" method="POST" enctype="multipart/form-data">
        @method('put')
      @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Title" name="title" value="{{$blog->title}}">
          @error('title')
          <div class="invalid-feedback">
            Judul tidak boleh kosong
          </div>
          @enderror
        </div>
        {{-- <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <input type="text" class="form-control @error('description') is-invalid @enderror" id="exampleInputPassword1" placeholder="Description" name="description">
          @error('description')
          <div class="invalid-feedback">
            Judul tidak boleh kosong
          </div>
          @enderror
        </div> --}}
        <div class="form-group">
          <label>Content</label>
          <textarea class="form-control @error('content') is-invalid @enderror" rows="3" placeholder="Enter ..." name="content">{!!$blog->content!!}</textarea>
          @error('content')
          <div class="invalid-feedback">
            Judul tidak boleh kosong
          </div>
          @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Image</label>
          <div class="input-group">
            <div class="custom-file">
              <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="exampleInputFile" name="image">
              @error('image')
          <div class="invalid-feedback">
            Judul tidak boleh kosong
          </div>
          @enderror
              <label class="custom-file-label" for="exampleInputFile">Choose file</label>
            </div>
            <div class="input-group-append">
              <span class="input-group-text">Upload</span>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->

      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
  </div>
  <!-- /.card -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
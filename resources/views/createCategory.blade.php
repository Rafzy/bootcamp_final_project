@extends('templates.main')

@section('container')
  <h1 class="m-3">Create Category</h1>
    <form enctype="multipart/form-data" action = "{{ route('store_category') }}" method="POST">
        @csrf
        <div class="m-3">
          <label for="category_name" class="form-label">Category Name</label>
          <input type="text" class="form-control" id="category_name" name = "category_name" value = "{{ old('category_name') }}">
          @error('category_name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary m-3">Submit</button>
      </form>
@endsection
@extends('templates.main')

@section('container')
<div class="card">
@foreach($categories as $category)
    <div class="card-body d-flex justify-content-between">
      {{ $category->category_name }}
      <a href="{{ route('show_category', ['category' => $category->id]) }}" class="btn btn-success">Show</a>
    </div>
@endforeach
</div>
@endsection
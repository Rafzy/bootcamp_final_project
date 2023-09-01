@extends('templates.main')

@section('container')
<div class="d-flex row">
@foreach ($items as $item)
<div class="card m-5" style="width: 18rem;">
    <img src= "{{ asset('/storage/item_images/' . $item->item_image) }}"  class="card-img-top" alt="{{ $item->item_name }}">
    <div class="card-body">
      <h5 class="card-title">{{ $item->item_name }}</h5>
      <p class="card-text">Category: {{ $item->category->category_name }}</p>
      <p class="card-text">Price: Rp.{{ $item->item_price }}</p>
      <p class="card-text">Count: {{ $item->item_count }}</p>
      <a href="{{ route('edit_item', ['item' => $item->id]) }}" class="btn btn-warning">Edit Item</a>
      <form action="{{ route('delete_item', ['id' => $item->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
  </div>
@endforeach
</div>
@endsection
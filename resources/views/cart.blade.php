@extends('templates.main')

@section('container')
<div class="d-flex row">
@foreach($carts as $cart)
<div class="card m-3" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">{{ $cart->item_name }}</h5>
      <h6 class="card-subtitle mb-2 text-muted">Category: {{ $cart->category->category_name }}</h6>
      <p class="card-text">Price: Rp.{{ $cart->item_price }}</p>
      <form action="{{ route('delete_cart') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
      </form>
    </div>
  </div>
@endforeach
</div>
<p class="ms-3">Total Price: Rp.{{ $total_price }}</p>
@endsection
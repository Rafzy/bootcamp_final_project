@extends('templates.main')

@section('container')
  <h1 class="m-3">Edit Item</h1>
    <form enctype="multipart/form-data" action = "{{ route('update_item', ['item' => $item->id]) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="m-3">
          <label for="item_name" class="form-label">Item Name</label>
          <input type="text" class="form-control" id="item_name" name = "item_name" value = "{{ $item->item_name }}">
          @error('item_name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="m-3">
          <label for="category_id" class="form-label">Item Category</label>
          <select class="form-select" aria-label="Default select example" name = 'category_id'>
            <option selected>Open this select menu</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>                
            @endforeach
          </select>
          @error('category_id')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="m-3">
          <label for="item_price" class="form-label">Item Price</label>
          <input type="number" class="form-control" id="item_price" name = "item_price" value = "{{ $item->item_price}}">
          @error('item_price')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="m-3">
          <label for="item_count" class="form-label">Item Count</label>
          <input type="number" class="form-control" id="item_count" name = "item_count" value = "{{ $item->item_count }}">
          @error('item_count')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="m-3">
          <label for="item_image" class="form-label">Item Image</label>
          <input type="file" class="form-control" id="item_image" name = "item_image" value = "{{ $item->item_image }}">
          @error('item_image')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary m-3">Submit</button>
      </form>
@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class itemController extends Controller
{
    public function create(){

        return view('createItem',[
            'title' => 'Create Item',
            'categories' => Category::all()]);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'item_name' => 'required|min:5|max:80',
            'category_id' => 'required',
            'item_price' => 'required',
            'item_count' => 'required',
            'item_image' => 'required|mimes:jpg, png'
        ]);
        $extension = $request->file('item_image')->getClientOriginalExtension();
        $filename = $request->item_name.'-'.$request->category_id.'.'.$extension;
        $request->file('item_image')->storeAs('/public/item_images', $filename);
        Item::create([
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'item_price' => $request->item_price,
            'item_count' => $request->item_count,
            'item_image' => $filename
        ]);

        return redirect('/');
    }

    public function index(){
        return view('welcome',[
            'title' => 'Homepage',
            'items' => Item::all()
        ]);
    }

    public function edit(Item $item){
        return view('edit',[
            'title' => 'Edit Item',
            'item' => $item,
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Item $item){
        $validated = $request->validate([
            'item_name' => 'required|min:5|max:80',
            'category_id' => 'required',
            'item_price' => 'required',
            'item_count' => 'required',
            'item_image' => 'required|mimes:jpg, png'
        ]);
        $extension = $request->file('item_image')->getClientOriginalExtension();
        $filename = $request->item_name.'-'.$request->category_id.'.'.$extension;
        $request->file('item_image')->storeAs('/public/item_images', $filename);
        $item->update([
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'item_price' => $request->item_price,
            'item_count' => $request->item_count,
            'item_image' => $filename
        ]);

        return redirect(route('index'));
    }

    public function delete($id){
        Item::destroy($id);
        return redirect(route('index'));
    }

    public function editCatalog(){
        return view('editCatalog', [
            'title' => 'Edit Catalog',
            'items' => Item::all()
        ]);
    }


}

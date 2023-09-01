<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Item;
use Illuminate\Http\Request;

class cartController extends Controller
{
    public function addCart(Item $item){
        Cart::create([
            'user_id' => auth()->user()->id,
            'category_id' => $item->category_id,
            'item_name' => $item->item_name,
            'item_price' => $item->item_price,
            'item_count' => 1,
            'item_image' => $item->item_image
        ]);

        $item->update([
            'item_count' => ($item->item_count - 1)
        ]);

        if($item->item_count == 0){
            Item::destroy($item->id);
        }

        return redirect('/');
    }

    public function index(){
        $carts = auth()->user()->carts;
        $total_price = 0;
        foreach ($carts as $cart) {
            $total_price += $cart->item_price;
        }
        return view('cart', [
            'carts' => $carts, 
            'total_price' => $total_price,
            'title' => 'Your Cart'
        ]);
    }

    public function delete($id){
        Cart::destroy($id);
        return redirect(route('show_cart'));
    }
}

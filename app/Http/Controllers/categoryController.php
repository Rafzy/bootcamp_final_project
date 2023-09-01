<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoryController extends Controller
{
    public function create(){
        return view('createCategory',[
            'title' => 'Create Category'
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'category_name' => 'required'
        ]);
        Category::create([
            'category_name' => $request->category_name
        ]);
        return redirect(route('index'));
    }

    public function index(){
        $categories = Category::all();
        return view('categories', [
            'categories' => $categories,
            'title' => 'Categories'
        ]);
    }

    public function show(Category $category){
        return view('showCategory',[
            'category' => $category,
            'title' => 'Show Category'
        ]);
    }
}

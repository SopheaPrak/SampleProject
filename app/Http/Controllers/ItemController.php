<?php

namespace App\Http\Controllers;

use App\Item;
use App\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create()
    {
        $categories = Category::all();
        // print($categories);
        return view('admin.item.itemCreate', compact('categories'));
    }

    public function store()
    {
        // dd(request()->all());
        $data = request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'sale_price' => 'required',
            'purchase_price' => 'required',
            'quantity' => 'required',
            'enabled' => 'boolean',
        ]);

        Item::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'sale_price' => $data['sale_price'],
            'purchase_price' => $data['purchase_price'],
            'quantity' => $data['quantity'],
            'enabled' => $data['enabled'],
        ]);

        return redirect('home');
    }

    public function show(){
        $items = Item::orderBy('id')->get();
        
        return view('admin.item.itemIndex', compact('items'));
    }

    public function edit(Item $item)
    {
        $categories = Category::all();

        return view('admin.item.itemEdit', compact('item', 'categories'));
    }

    public function update(Item $item)
    {
        $data = request()->validate([
            'name' => 'required',
            'description' => 'nullable',
            'category_id' => 'required',
            'sale_price' => 'required',
            'purchase_price' => 'required',
            'quantity' => 'required',
            'enabled' => 'boolean',
        ]);
  
        $item->update($data);

        return redirect("/i");
    }

    public function destroy(Item $item)
    {
        $item->delete();
        return redirect('/i');
    }
}

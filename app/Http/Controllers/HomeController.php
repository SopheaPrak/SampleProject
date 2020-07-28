<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use App\Category;
use App\Invoice;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $itemCount = Item::where('enabled', 1)->count();
        $categoryCount = Category::where('enabled', 1)->count();
        $invoiceCount = Invoice::count();
        return view('home', compact('itemCount', 'categoryCount', 'invoiceCount'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
use App\Item;
use App\Invoice_item;
use App\Invoice_total;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $customers = Customer::all();
        $items = Item::all();
        return view('admin.invoice.invoiceCreate', compact('customers', 'items'));
    }

    public function store()
    {
        // dd(request()->all());
        $data = request()->validate([
            'amount' => 'required',
            'currency' => 'required',
            'customer_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            // 'total' => 'required',
            // 'total_amount' => 'required',
        ]);

        Invoice::create([
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'customer_id' => $data['customer_id'],
        ]);

        Invoice_item::create([
            'item_id' => $data['item_id'],
            'quantity' => $data['quantity'],
            'price' => $data['price'],
            'total' => $data['price'],
        ]);

        Invoice_total::create([
            'total_amount' => $data['quantity'],
        ]);

        return redirect('/iv');
    }

    public function show(){
        $invoices = Invoice::orderBy('id')->get();
        
        return view('admin.invoice.invoiceIndex', compact('invoices'));
    }

    public function edit(Invoice $invoice)
    {
        $customers = Customer::all();
        $items = Item::all();

        return view('admin.invoice.invoiceEdit', compact('invoice', 'customers', 'items'));
    }

    public function update(Invoice $invoice)
    {
        $data = request()->validate([
            // 'invoice_number' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'customer_id' => 'required',
            // 'invoice_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            // 'total' => 'required',
            // 'total_amount' => 'required',
        ]);
  
        $invoice->update($data);

        return redirect("/iv");
    }

    public function destroy(invoice $invoice)
    {
        $invoice->delete();
        return redirect('/iv');
    }
}

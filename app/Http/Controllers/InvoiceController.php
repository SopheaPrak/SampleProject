<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Invoice;
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
        return view('admin.invoice.invoiceCreate', compact('customers'));
    }

    public function store()
    {
        $data = request()->validate([
            'invoice_number' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'customer_id' => 'required',
            'invoice_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',
            'total_amount' => 'required',
        ]);

        Invoice::create([
            'invoice_number' => $data['invoice_number'],
            'amount' => $data['amount'],
            'currency' => $data['currency'],
            'customer_id' => $data['customer_id'],
        ]);

        // Invoice_item::create([
        //     'invoice_id' => $data['invoice_id'],
        //     'item_id' => $data['item_id'],
        //     'quantity' => $data['quantity'],
        //     'price' => $data['price'],
        //     'total' => $data['total'],
        // ]);

        // Invoice_total::create([
        //     'invoice_id' => $data['invoice_id'],
        //     'total_amount' => $data['total_amount'],
        // ]);

        return redirect('/iv');
    }

    public function show(){
        $invoices = Invoice::orderBy('id')->get();
        
        return view('admin.invoice.invoiceIndex', compact('invoices'));
    }

    public function edit(Invoice $invoice)
    {
        return view('admin.invoice.invoiceEdit', compact('invoice'));
    }

    public function update(Invoice $invoice)
    {
        $data = request()->validate([
            'invoice_number' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'customer_id' => 'required',
            'invoice_id' => 'required',
            'item_id' => 'required',
            'quantity' => 'required',
            'price' => 'required',
            'total' => 'required',
            'total_amount' => 'required',
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

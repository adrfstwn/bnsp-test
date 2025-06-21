<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::filter($request)->paginate(10);

        return view('product.list', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(ProductRequest $request)
    {
        $data = $request->all();

        Product::create($data);

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);

        return view('product.edit', compact('data'));
    }

    public function update(ProductRequest $request, $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);

        $product->update($data);

        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        $data = Product::findOrFail($id);
        $data->delete();

        return redirect()->route('product.index');
    }

    public function export($id)
    {
        $product = Product::findOrFail($id);
        $pdf = Pdf::loadView('product.pdf', compact('product'));

        return $pdf->download('product_' . $product->name . '.pdf');
    }

}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::orderBy('created_at', 'desc')
            ->when($request->input('name'), function ($query, $name) {
                return $query->where('name', 'like', '%' . $name . '%');
            })
            ->paginate(10);

        return view('pages.products.index', compact('products'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('pages.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|unique:products',
            'price' => 'required|integer',
            'hpp' => 'required|integer',
            'stock' => 'required|integer',
            'barcode' => '',
            'category_id' =>'required|integer',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
        ]);

        $filename = time() . '.' . $request->image->extension();
        //$request->image->storeAs('public/products', $filename);
        $request->file('image')->move(public_path('uploads/products'), $filename);

        $data = $request->all();
        $data['image'] = $filename;
        $data['category_id'] = $request->category_id;
        $data['is_best_seller'] = $request->is_best_seller;
        $data['is_available'] = $request->is_available;
        //barcode default value 0
        if ($request->barcode == null) {
            $data['barcode'] = 0;
        } else
            $data['barcode'] = $request->barcode;

        Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product successfully created');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = \App\Models\Category::all();
        return view('pages.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|min:3|unique:products,name,' . $id,
            'price' => 'required|integer',
            'hpp' => 'required|integer',
            'stock' => 'required|integer',
            'category_id' =>'required|integer',
        ]);

        $imagePath = Product::find($id)->image;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,webp|max:2048'
            ]);

            if (Storage::exists(public_path('uploads/products/' . $imagePath))) {
                Storage::delete(public_path('uploads/products/'. $imagePath));
            }

            $imagePath = time() . '.' . $request->image->extension();
            //$request->image->storeAs('public/products', $imagePath);
            $request->file('image')->move(public_path('uploads/products'), $imagePath);
        }

        $data = $request->all();
        $product = Product::findOrFail($id);
        $data['image'] = $imagePath;
        $data['category_id'] = $request->category_id;
        $data['is_best_seller'] = $request->is_best_seller;
        $data['is_available'] = $request->is_available;
        if ($request->barcode == null) {
            $data['barcode'] = 0;
        } else
            $data['barcode'] = $request->barcode;
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product successfully updated');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product successfully deleted');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //create view for category
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //buat validate ctegory dengan nama
        $request->validate([
            'name' => 'required|max:50',
            'image' =>'required|image|mimes:png,jpg,jpeg,webp|max:2048'
            //image
        ]);

        $filename = time() . '.' . $request->image->extension();
        //$request->image->storeAs('public/products', $filename);
        $request->file('image')->move(public_path('uploads/category'), $filename);

        $data = $request->all();
        $data['image'] = $filename;
        $category = Category::create($data);

        return redirect()->route('category.index')->with('success', 'Category Created');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //edit category by id with compact syntax
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:png,jpg,jpeg,webp'
        ]);

        $imagePath = Category::find($id)->image;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:png,jpg,jpeg,webp'
            ]);

            if (File::exists('uploads/category/' . $imagePath)) {
                File::delete('uploads/category/' . $imagePath);
            }

            $imagePath = time() . '.' . $request->image->extension();
            $request->image->storeAs('public/products', $imagePath);
            $request->file('image')->move(public_path('uploads/category'), $imagePath);
        }

        $data = $request->all();
        $data['image'] = $imagePath;
        //category update
        $category = Category::findOrFail($id);
        $category->update($data);

        return redirect()->route('category.index')->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //delete category by id
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('category.index')->with('success', 'Category Deleted');
    }
}

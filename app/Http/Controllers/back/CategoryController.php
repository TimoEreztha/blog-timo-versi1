<?php

namespace App\Http\Controllers\Back;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $search = request('search');
        $categories = Category::latest()->paginate(10);
        if ($search) {
            $categories = Category::where('name', 'like', '%' . $search . '%')->latest()->paginate(10);
        }
  
        return view('dashboard.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
        ]);
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];
        Category::create($data);
        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::find($id);
        return view('dashboard.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $id,
        ]);
        $data = [
            'name' => $request->name,
            'slug' => $request->slug,
        ];
        Category::where('categories_id',$id)->update($data);
        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        
        // Hapus relasi terlebih dahulu
        $category->articel()->delete(); // Ganti 'relatedModel' dengan nama model yang berelasi
        
        $category->delete();
        
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}
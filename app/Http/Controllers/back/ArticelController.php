<?php

namespace App\Http\Controllers\back;

use App\Models\Articel;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ArticelRequest;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateArticelRequest;

class ArticelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mendapatkan data dari query string pencarian
        $search = $request->query('search');

        // Query untuk mengambil data dengan atau tanpa pencarian
        $query = Articel::query();

        if (!empty($search)) {
            $query->where('title', 'like', "%$search%")
            ->orWhere('status', 'like', "%$search%")
                ->orWhereHas('category', function ($q) use ($search) {
                    $q->where('name', 'like', "%$search%");
                })
            ->orWhere('publis_data', 'like', "%$search%");
        } 
        
       $data = $query->with('user')->paginate(10);
        return view('dashboard.articel.index', [
            'data' => $data,
            'search' => $search 
        ]);
    }

    public function create()
    {
        return view('dashboard.articel.create-articel',[
            'categories' => Category::get()
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticelRequest $request)
    {
        $validatedData = $request->validated();

        $articel = new Articel();
        $articel->title = $validatedData['title'];
        $articel->slug = $validatedData['slug'];
        $articel->desc = $validatedData['desc'];
        
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $articel->img = $imageName;
        }
        $articel->user_id = auth()->user()->id;
        $articel->status = $validatedData['status'];
        $articel->publis_data = $validatedData['publis_data'];
        $articel->categories_id = $validatedData['categories_id'];
        
        $articel->save();

        return redirect()->route('articel.index')->with('success', 'Artikel berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('dashboard.articel.show',
    [
      "articel" => Articel::findOrFail($id)
    ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view(
            'dashboard.articel.edit',[
                "articel" => Articel::findOrFail($id),
                "categories" => Category::get()
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticelRequest $request, string $id)
    {
      $validatedData = $request->validated();

        $articel = Articel::find($id);
        $articel->title = $validatedData['title'];
        $articel->slug = $validatedData['slug'];
        $articel->desc = $validatedData['desc'];
        
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            Storage::delete('public/images/'.$request->oldImg);
            $articel->img = $imageName;
        } else {
            $articel->img = $request->oldImg;
        }
        $articel->user_id = auth()->user()->id;
        $articel->status = $validatedData['status'];
        $articel->publis_data = $validatedData['publis_data'];
        $articel->categories_id = $validatedData['categories_id'];
        
        $articel->update();

        return redirect()->route('articel.index')->with('success', 'Artikel berhasil update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $articel = Articel::findOrFail($id);
       $articel->delete();
       return redirect()->route('articel.index')->with('success','Articel berhasil dihapus');
       

    }
}
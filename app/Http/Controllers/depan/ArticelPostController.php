<?php

namespace App\Http\Controllers\depan;

use App\Models\Articel;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticelPostController extends Controller
{
    public function show($slug)
    {
        $show = Articel::with('user')->where('slug', $slug)->firstOrFail();
        $show->increment('views');
        $categorys = Category::latest()->get();
        return view('depan.show', compact('show', 'categorys'));
    }
    public function view()
    {
        $search = request('search');
        $query = Articel::query();
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('desc', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhereHas('category', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%');
                });
        }
        
        $views = $query->whereStatus('publish')->with(['category','user'])->latest()->paginate(10);
        $view = $search;
        return view('depan.view', compact('views','view'));
    }
}
